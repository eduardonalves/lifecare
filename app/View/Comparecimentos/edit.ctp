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
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}else{
			$data= " / / ";
		}
		return $data;
	}
	
	$hoje = date('Y-m-d');
	$hojeMesmo = date('d/m/Y');
	
	$falta = 0;
	$externo = 0;
	$presente = 0;
	$folga = 0;
	$atestado = 0;
	foreach($registro as $contagem){
		
		if($contagem['Comparecimento']['status'] == 'FALTA'){
			$falta++;
		}
		if($contagem['Comparecimento']['status'] == 'EXTERNO'){
			$externo++;
		}
		if($contagem['Comparecimento']['status'] == 'PRESENTE'){
			$presente++;
		}
		if($contagem['Comparecimento']['status'] == 'FOLGA'){
			$folga++;
		}
		if($contagem['Comparecimento']['status'] == 'ATESTADO'){
			$atestado++;
		}
		
	}
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
				<ul class="ul-Contagem">
					<?php
						echo "<li>Presentes: " . $presente . "</li>";
						echo "<li>Faltas: " . $falta . "</li>";
						echo "<li>Externo: " . $externo . "</li>";
					?>
				</ul>
				<ul class="ul-Contagem" style="margin-left:80px;">
					<?php
						echo "<li>Folga: " . $folga . "</li>";
						echo "<li>Atestado: " . $atestado . "</li>";
					?>
				</ul>
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
						if($dataTabela == 'hoje'){ //TABELA DE HOJE
					?>
							<?php 
								echo $this->element('paginador_superior'); 
							?>
							<table>
						<thead>
							<th>Nome do Funcionário</th>
							<th>Cargo</th>
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
							?>			
									
									<tr>
										<td>
											<?php 
												echo $this->Form->create('Comparecimento',array('id'=>'comparecimentoEditForm'.$i));
												echo $presenca['Funcionario']['nome']; 
												echo $this->Form->input('Comparecimento.id',array('id'=>'idComparecimento'.$i,'value'=>$presenca['Comparecimento']['id'],'type'=>'hidden'));
											?>
										</td>
								
										<td>
											<?php
												echo $presenca['Funcionario']['Cargo']['nome']; 
											?>
										</td>
								
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
									$i++;
									}
								?>
						</tbody>
						</table>		
						<?php 
							echo $this->element('paginador_inferior');
													
							}else if($dataTabela == 'passada'){ //TABELA DO PASSADO
						?>
							<?php 
								echo $this->element('paginador_superior'); 
							?>
							<table>
								<thead>
									<th>Nome do Funcionário</th>
									<th>Cargo</th>
									<th>Data</th>
									<th>Status</th>
								</thead>
								
								<tbody>
									<?php
										foreach($registro as $presenca){	
									?>	
										<tr>
											<td>
												<?php 
													echo $presenca['Funcionario']['nome']; 
												?>
											</td>
											
											<td>
												<?php 
													echo $presenca['Funcionario']['Cargo']['nome'];  
												?>
											</td>
											
											<td>
												<?php 
													echo formatDateToView($presenca['Comparecimento']['date']); 
												?>
											</td>
											<td>
												<?php 
													echo $presenca['Comparecimento']['status']; 
												?>
											</td>
										</tr>
									<?php	
										}
									?>							
								</tbody>
							</table>		
							<?php 
								echo $this->element('paginador_inferior');
							?>
						<?php
							}else{
								echo "<table><tbody><tr><td>Sem resultados para a data informada.</td></tr></tbody></table>";
							}							
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


