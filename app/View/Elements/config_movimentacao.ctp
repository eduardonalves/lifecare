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
				echo $this->Form->input('id',array('type'=>'hidden','value' => $configconta['Configconta']['id']));
				//echo $this->Form->input('identificacao',array('value' => $configconta['Configconta']['identificacao']));
			?>
					
			<div class='esconder'>	
				<?php //echo $this->Form->input('user_id',array('class'=>'esconder','label'=>'')); ?>
			</div>
		
			<?php 
				
		
				if($configconta['Configconta']['identificacao']==1){
						echo $this->Form->input('identificacao', array('value' => 1, 'checked' =>'checked', 'label'=>' Identificação'));
					} else{
						echo $this->Form->input('identificacao', array('label' => 'Identificação'));
					}
				
				if($configconta['Configconta']['data_emissao']==1){
						echo $this->Form->input('data_emissao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data Emissão'));
					} else{
						echo $this->Form->input('data_emissao', array('label' => 'Data Emissão'));
					}
				
					
				if($configconta['Configconta']['data_quitacao']==1){
						echo $this->Form->input('data_quitacao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data Quitação'));
					} else{
						echo $this->Form->input('data_quitacao', array('label' => 'Data Quitação'));
					}
					
			
				if($configconta['Configconta']['valor']==1){
						echo $this->Form->input('valor', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor'));
					} else{
						echo $this->Form->input('valor', array('label' => 'Valor'));
					}
				
				if($configconta['Configconta']['parceirodenegocio_id']==1){
						echo $this->Form->input('parceirodenegocio_id', array('type'=>'checkbox','value' => 1, 'checked' =>'checked', 'label'=>'Parceiro de Negócios'));
					} else{
						echo $this->Form->input('parceirodenegocio_id', array('type'=>'checkbox','label' => 'Parceiro de Negócios'));
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
