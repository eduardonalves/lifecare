<?php
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('comparecimento');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('comparecimento');
	$this->end();
	
	$hoje = date('Y-m-d');
	$hojeMesmo = date('d/m/Y');
?>
<header>
	<?php
		echo $this->Html->image('titulo-gerenciar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); 
	?>
<h1 class="menuOption51">Controle Presencial</h1>

</header>


<section>
	<header>Data de Hoje: <?php echo $hojeMesmo; ?></header>
		
		<section style="display:inline-flex;"> <!-- FILTRO INICIO -->
			<?php
				echo $this->Search->create();
			?>
			
			<div class="coluna-esquerda filtro-funcionario filtro-cor-verde">
				<span class="filtro-titulo">Busca pelo Funcinário</span>
				<?php 
					echo $this->Search->input('funcionario', array('label'=>'Nome:','class' => 'select-box tamanho-medio combo-autocomplete'));
					echo "<br>";
					
					echo $this->Search->input('cargo', array('label'=>'Cargo:','class' => 'select-box tamanho-medio combo-autocomplete'));
				?>
			</div>
			
			<div class="coluna-central filtro-comparecimento filtro-cor-amarelo">
				<span class="filtro-titulo">Busca pela Presença</span>
				<?php
					echo $this->Search->input('status',array('label'=>'Status:','class'=>'tamanho-medio'));
					echo $this->Search->input('data',array('label'=>'Data:','class'=>'tamanho-medio'));	
				?>
			</div>
			
			<div class="coluna-direita filtro-comparecimento filtro-cor-neutro">
				<span class="filtro-titulo">Contagem da Pesquisa</span>
				
			</div>		
			
			<footer>
				<?php
					echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar')); 
					echo $this->Search->end();
				?>
			</footer>
			
		</section> <!-- FILTRO FIM -->

		
		<section> <!-- TABELA DE RESULTADO INICIO -->
		<div class="areaTabela">
			<?php 
				echo $this->element('paginador_superior'); 
			?>
			<table>
					<thead>
						<th>Nome do Funcionário</th>
						<th class="th-status">Presente</th>
						<th class="th-status">Externo</th>
						<th class="th-status">Falta</th>
						<th class="th-status">Folga</th>
						<th class="th-status">Atestado</th>
					</thead>
					
					<tbody>
						<?php
							$i = 0;
							foreach($registro as $presenca){							
								if($presenca['Comparecimento']['date'] == $hoje ){										
						?>			
								
									<tr>
						<td><?php 
							echo $this->Form->create('Comparecimento',array('id'=>'comparecimentoEditForm'.$i));
								echo $presenca['Funcionario']['nome']; 
								//echo $this->Form->input('Funcionario.'.$i.'.funcionario_id',array('type'=>'hidden','value'=>$presenca['Funcionario']['id']));
								echo $this->Form->input('Comparecimento.id',array('id'=>'idComparecimento'.$i,'value'=>$presenca['Comparecimento']['id'],'type'=>'hidden'));
							?></td>
						<?php
							echo $this->Form->input('Comparecimento.status',array(
																				'data-id'=>'Id'.$i,
																				'class'=>'updateStatus',
																				'label'=>false,
																				'fieldset'=>false,
																				'legend'=>false,
																				'div'=>false,
																				'type'=>'radio',	
																				'before'=>'<td class="td-status">',
																				'after'=>'</td>',
																				'between'=> '',
																				'separator'=>'</td><td class="td-status">',
																				'value'=>$presenca['Comparecimento']['status'],
																				'options'=>array('PRESENTE'=>'','EXTERNO'=>'','FALTA'=>'','FOLGA'=>'','ATESTADO'=>'')
																				));		
							echo $this->Form->end();
							

						?>
					</tr>
						
						<?php
								}else{
									
								} 
								$i++;
							}
						?>
					</tbody>
			</table>		
			<?php 
		
				echo $this->element('paginador_inferior');
			?>
			</div>
		</section> <!-- TABELA DE RESULTADO FIM -->
		


</section>

<script>
	$(document).ready(function(){
		$('body').on('click','.updateStatus	',function(){
					
				var id = $(this).attr('data-id');
				var nId = id.substr(2);
				var valor =  $("#idComparecimento"+nId).val();
								
				var urlAction = "<?php echo $this->Html->url(array("controller" => "Comparecimentos", "action" => "edit"));?>/"+valor+"/";
				var dadosForm = $("#comparecimentoEditForm"+nId).serialize();
				
				alert(urlAction);
				//$('.loaderAjaxIdentificacao').show();
				
				$.ajax({
					type: "POST",
					url: urlAction,
					data:  dadosForm,
					dataType: 'json'
				}).done(function(data){
						console.log('adicionado');		
				});	
		});
	
	});

</script>

<!-- 
<div style="clear:both;"></div>

<pre>
<?php
	
print_r($registro);
	
?>
</pre>
-->
