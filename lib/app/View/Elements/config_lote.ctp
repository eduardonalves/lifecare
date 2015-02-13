<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_filtro_lote');
	$this->end();

?>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	<h1>Filtro Lote</h1>
</header>

<section>
	<header>Campos da Tabela</header>

	<section class="coluna-modal">
		<div class="configlotes form">
			
			<?php
				echo $this->Form->create('Configlote');
			?>	
			
			<?php
					
				echo $this->Form->input('id',array('value' => $configlote['Configlote']['id']));
			?>
					
			<div class='esconder'>	
				<?php echo $this->Form->input('user_id',array('class'=>'esconder','label'=>'')); ?>
			</div>
		
			<?php
				
				if($configlote['Configlote']['numero_lote']==1){
						echo $this->Form->input('numero_lote', array('value' => 1, 'checked' =>'checked', 'label'=>'Número Lote'));
					} else{
						echo $this->Form->input('numero_lote', array('label' => 'Número Lote'));
					}
					
				if($configlote['Configlote']['data_fabricacao']==1){
						echo $this->Form->input('data_fabricacao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data Fabricacao'));
					} else{
						echo $this->Form->input('data_fabricacao', array('label' => 'Data Fabricacao'));
					}
				
					
				if($configlote['Configlote']['estoque']==1){
						echo $this->Form->input('estoque', array('value' => 1, 'checked' =>'checked', 'label'=>'Qtd. Estoque'));
					} else{
						echo $this->Form->input('estoque', array('label' => 'Qtd. Estoque'));
					}
				
								
				
				if($configlote['Configlote']['fabricante']==1){
						echo $this->Form->input('fabricante', array('value' => 1, 'checked' =>'checked', 'label'=>'Fabricante'));
					} else{
						echo $this->Form->input('fabricante', array('label' => 'Fabricante'));
					}
				
				if($configlote['Configlote']['data_validade']==1){
						echo $this->Form->input('data_validade', array('value' => 1, 'checked' =>'checked', 'label'=>'Data Validade'));
					} else{
						echo $this->Form->input('data_validade', array('label' => 'Data Validade'));
					}
				
				if($configlote['Configlote']['status']==1){
						echo $this->Form->input('status', array('value' => 1, 'checked' =>'checked', 'label'=>'Status'));
					} else{
						echo $this->Form->input('status', array('label' => 'Status'));
					}
			?>
		</div>
		
	</section>
	
</section>

	<div  id="msgModalLot" class="msgModal">Campo Obrigatório.</div>
	
<footer>
	<?php
		echo $this->form->end( 'botao-salvar.png' ,  array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>
