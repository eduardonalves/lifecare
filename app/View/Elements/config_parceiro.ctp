<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_filtro_parceiro');
	$this->end();

?>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	<h1>Filtro Parceiro de Negócio</h1>
</header>

<section>
	<header>Campos da Tabela</header>

	<section class="coluna-modal">
		<div class="c">
			
			<?php
				echo $this->Form->create('Configparceiro');
			?>	
			
			<?php
				echo $this->Form->input('id',array('type'=>'hidden','value' => $configparceiro['Configparceiro']['id']));
			?>
		
			<?php 
				if($configparceiro['Configparceiro']['nome']==1){
						echo $this->Form->input('nome', array('value' => 1, 'checked' =>'checked', 'label'=>' Parceiro de Negócio'));
					} else{
						echo $this->Form->input('nome', array('label' => ' Parceiro de Negócio'));
					}
					
				if($configparceiro['Configparceiro']['cnpj']==1){
						echo $this->Form->input('cnpj', array('value' => 1, 'checked' =>'checked', 'label'=>' CNPJ/CPF'));
					} else{
						echo $this->Form->input('cnpj', array('label' => ' CNPJ/CPF'));
					}
					
				if($configparceiro['Configparceiro']['endereco']==1){
						echo $this->Form->input('endereco', array('value' => 1, 'checked' =>'checked', 'label'=>' endereco'));
					} else{
						echo $this->Form->input('endereco', array('label' => ' endereco'));
					}
				
				if($configparceiro['Configparceiro']['telefone']==1){
						echo $this->Form->input('telefone', array('value' => 1, 'checked' =>'checked', 'label'=>' telefone'));
					} else{
						echo $this->Form->input('telefone', array('label' => ' telefone'));
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

<pre>
<?php print_r($configparceiro); ?>
</pre>
