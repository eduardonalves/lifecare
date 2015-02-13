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
				
				echo $this->Form->input('id',array('type'=>'hidden','value' => $configconta['Configconta']['id']));

				if($configconta['Configconta']['identificacao']==1){
						echo $this->Form->input('identificacao', array('value' => 1, 'checked' =>'checked', 'label'=>' Identificação'));
					} else{
						echo $this->Form->input('identificacao', array('label' => ' Identificação'));
					}
					
				
					
				if($configconta['Configconta']['descricao']==1){
						echo $this->Form->input('descricao', array('value' => 1, 'checked' =>'checked', 'label'=>'Observação'));
					} else{
						echo $this->Form->input('descricao', array('label' => 'Observação'));
					}
					
				if($configconta['Configconta']['data_quitacao']==1){
						echo $this->Form->input('data_quitacao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data de Quitação'));
					} else{
						echo $this->Form->input('data_quitacao', array('label' => 'Data de Quitação'));
					}
					
				if($configconta['Configconta']['data_emissao']==1){
						echo $this->Form->input('data_emissao', array('value' => 1, 'checked' =>'checked', 'label'=>'Data de Emissão'));
					} else{
						echo $this->Form->input('data_emissao', array('label' => 'Data de Emissão'));
					}
			
					
					
				if($configconta['Configconta']['valor']==1){
						echo $this->Form->input('valor', array('value' => 1, 'checked' =>'checked', 'label'=>' Valor'));
					} else{
						echo $this->Form->input('valor', array('label' => ' Valor'));
					}
					
				if($configconta['Configconta']['centrocusto_id']==1){
						echo $this->Form->input('Configconta.centrocusto_id', array('type'=>'checkbox', 'value' => 1, 'checked' =>'checked', 'label'=>'Centro de Custo'));
					} else{
						echo $this->Form->input('Configconta.centrocusto_id', array('type'=>'checkbox', 'label' => ' Centro de Custo'));
					}
				
				if($configconta['Configconta']['tipodeconta_id']==1){
						echo $this->Form->input('Configconta.tipodeconta_id', array('type'=>'checkbox', 'value' => 1, 'checked' =>'checked', 'label'=>'Tipo de Conta'));
					} else{
						echo $this->Form->input('Configconta.tipodeconta_id', array('type'=>'checkbox', 'label' => 'Tipo de Conta'));
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
