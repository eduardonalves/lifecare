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
?>
<header>
	<?php
		echo $this->Html->image('titulo-gerenciar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); 
	?>
<h1 class="menuOption51">Controle Presencial</h1>

</header>


<section>
	<header></header>
		
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
					//echo $this->Search->end(__('Filter', true));
				?>
			</footer>
			
		</section> <!-- FILTRO FIM -->

		
		<section> <!-- TABELA DE RESULTADO INICIO -->
			
			<table>
					<thead>
						<th>Nome do Funcionário</th>
						<th>Presente</th>
						<th>Externo</th>
						<th>Falta</th>
						<th>Folga</th>
						<th>Atestado</th>
					</thead>
					
					<tbody>
						<?php
							$i = 0;
							foreach($registro as $presenca){
						?>
							<tr>
								
								<td><?php echo $presenca['Funcionario']['nome']; ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								
								
							</tr>
						
						<?php 
						}
						?>
					</tbody>
			</table>		
			
		</section> <!-- TABELA DE RESULTADO FIM -->



</section>


<div style="clear:both;"></div>

<pre>
<?php
	
print_r($registro);
	
?>
</pre>

<?php

echo $this->Search->create();
echo $this->Search->input('status');
echo $this->Search->input('data');
echo $this->Search->input('funcionario', array('class' => 'select-box'));
echo $this->Search->input('cargo', array('class' => 'select-box'));
echo $this->Search->end(__('Filter', true));
?>
