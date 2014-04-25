<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_filtro_parcela');
	$this->end();

?>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	<h1>Filtro Dados das Parcelas</h1>
</header>

<section>
	<header>Campos da Tabela</header>

	<section class="coluna-modal">
		<div class="">
			
			<?php
				echo $this->Form->create('Configparcela');
				
				echo $this->Form->input('id',array('type'=>'hidden','value' => $configparcela['Configparcela']['id']));
				
				if($configparcela['Configparcela']['parcela']==1){
						echo $this->Form->input('parcela', array('value' => 1, 'checked' =>'checked', 'label'=>' Parcela'));
					} else{
						echo $this->Form->input('parcela', array('label' => ' Parcela'));
					}
				
				if($configparcela['Configparcela']['identificacao_documento']==1){
						echo $this->Form->input('identificacao_documento', array('value' => 1, 'checked' =>'checked', 'label'=>'Identificação'));
					} else{
						echo $this->Form->input('identificacao_documento', array('label' => ' Identificação'));
					}
				
				if($configparcela['Configparcela']['data_vencimento']==1){
						echo $this->Form->input('data_vencimento', array('value' => 1, 'checked' =>'checked', 'label'=>'Data do Vencimento'));
					} else{
						echo $this->Form->input('data_vencimento', array('label' => 'Data do Vencimento'));
					}
				
				if($configparcela['Configparcela']['valor']==1){
						echo $this->Form->input('valor', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor'));
					} else{
						echo $this->Form->input('valor', array('label' => 'Valor'));
					}
					
				if($configparcela['Configparcela']['periodocritico']==1){
						echo $this->Form->input('periodocritico', array('type'=>'checkbox','value' => 1, 'checked' =>'checked', 'label'=>'Período Crítico'));
					} else{
						echo $this->Form->input('periodocritico', array('type'=>'checkbox', 'label' => 'Período Crítico'));
					}
					
				if($configparcela['Configparcela']['desconto']==1){
						echo $this->Form->input('desconto', array('type'=>'checkbox', 'value' => 1, 'checked' =>'checked', 'label'=>'Desconto'));
					} else{
						echo $this->Form->input('desconto', array('type'=>'checkbox','label' => 'Desconto'));
					}
					
				if($configparcela['Configparcela']['banco']==1){
						echo $this->Form->input('banco', array('value' => 1, 'checked' =>'checked', 'label'=>'Banco'));
					} else{
						echo $this->Form->input('banco', array('label' => 'Banco'));
					}
					
				if($configparcela['Configparcela']['agencia']==1){
						echo $this->Form->input('agencia', array('value' => 1, 'checked' =>'checked', 'label'=>'Agência'));
					} else{
						echo $this->Form->input('agencia', array('label' => 'Agência'));
					}
					
				if($configparcela['Configparcela']['conta']==1){
						
						echo $this->Form->checkbox('Configparcela.conta', array('type'=>'checkbox', 'value' => 1, 'checked' =>'checked', 'label'=>'Conta'));
						echo $this->Form->label('Configparcela.conta', 'Conta');
				} else{
						
						echo $this->Form->checkbox('Configparcela.conta', array('type'=>'checkbox', 'label' => 'Conta'));
						echo $this->Form->label('Configparcela.conta', 'Conta');
					}
					
				if($configparcela['Configparcela']['status']==1){
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
