<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_filtro_movimentacao');
	$this->end();

?>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	<h1>Filtro Movimentação</h1>
</header>

<section>
	<header>Campos da Tabela</header>

	<section class="coluna-modal">
		<div class="">
			
			<?php
				echo $this->Form->create('Configconta');
			?>	
			
			<?php
				//echo $this->Form->input('identificacao',array('value' => $configconta['Configconta']['id']));
			?>
					
			<div class='esconder'>	
				<?php //echo $this->Form->input('user_id',array('class'=>'esconder','label'=>'')); ?>
			</div>
		
			<?php 
				
				if($configconta['Configconta']['data_emissao']==1){
						echo $this->Form->input('data_emissao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data de Emissão'));
					} else{
						echo $this->Form->input('data_emissao', array('label' => 'Data de Emissão'));
					}
					/*
				if($configlote['Configlote']['data_quitacao']==1){
						echo $this->Form->input('data_fabricacao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data Fabricacao'));
					} else{
						echo $this->Form->input('data_fabricacao', array('label' => 'Data Fabricacao'));
					}
				
					
				if($configlote['Configlote']['estoque']==1){
						echo $this->Form->input('estoque', array('value' => 1, 'checked' =>'checked', 'label'=>'Qtd. Atual'));
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
						echo $this->Form->input('status', array('value' => 1, 'checked' =>'checked', 'label'=>'Status Validade'));
					} else{
						echo $this->Form->input('status', array('label' => 'Status Validade'));
					}
					* */
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
