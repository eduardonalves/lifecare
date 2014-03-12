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
				echo $this->Form->input('identificacao',array('value' => $configCont['identificacao'],'type'=>'hidden'));
			?>
					
			<div class='esconder'>	
				<?php //echo $this->Form->input('user_id',array('class'=>'esconder','label'=>'')); ?>
			</div>
		
			<?php 
				
				if($configCont['identificacao']==1){
						echo $this->Form->input('identificacao', array('value' => 1, 'checked' =>'checked', 'label'=>'Identificação'));
					} else{
						echo $this->Form->input('identificacao', array('label' => 'Identificação'));
					}
										
										
				if($configCont['descricao']==1){
						echo $this->Form->input('descricao', array('value' => 1, 'checked' =>'checked', 'label'=>'Descrição'));
					} else{
						echo $this->Form->input('descricao', array('label' => 'Descrição'));
					}
				
				if($configCont['data_quitacao']==1){
						echo $this->Form->input('data_quitacao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data Quitação'));
					} else{
						echo $this->Form->input('data_quitacao', array('label' => 'Data Quitação'));
					}	
				
				if($configCont['data_emissao']==1){
						echo $this->Form->input('data_emissao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data de Emissão'));
					} else{
						echo $this->Form->input('data_emissao', array('label' => 'Data de Emissão'));
					}					
						
				
				if($configCont['valor']==1){
						echo $this->Form->input('valor', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor'));
					} else{
						echo $this->Form->input('valor', array('label' => 'Valor'));
					}
					
				if($configCont['status']==1){
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
