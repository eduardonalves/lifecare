<?php 
		
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);

	}
?>
   
<?php
	$this->start('css');
	   echo $this->Html->css('modal_cobranca_add');
	$this->end();
	
?>



<?php 
	$this->start('script');
	//	echo $this->Html->script('jquery-ui/jquery.ui.core.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.widget.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.position.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.menu.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.autocomplete.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.tooltip.js');
	//	echo $this->Html->script('jquery-ui/custom-combobox.js');
	echo $this->Html->script('picklist-autoselect.js');
		
?>
		
<?php
	$this->end();
?>


<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Adicionar Observação</h1>
	 
</header>

<section>
	<header class="header">Observação de Cobrança</header>
	
	<section>
	    <?php
		echo $this->Form->create('ObsCobranca'); 
		echo $this->Form->input('parcela_id',array('type' => 'hidden'));
		echo $this->Form->input('conta_id',array('type' => 'hidden','value' =>$conta['Conta']['id']));
		echo $this->Form->input('user_id',array('type' => 'hidden','value' =>$conta['Conta']['user_id']));
		echo $this->Form->input('data',array('label' => 'Data:', 'type' => 'text', 'id' => 'datObsCobranca', 'class' => 'tamanho-pequeno forma-data'));
		echo $this->Form->input('obs',array('label' => 'Observação:', 'type' => 'textarea','id' => 'obsCobranca', 'class' => 'tamanho-medio'));
		
		echo $this->form->submit( 'botao-salvar.png' ,  array('class' => 'bt-direita','id' => 'bt-salvarCobranca', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
		echo $this->Form->end();
	    ?>
    
	</section>
	
</section>

</div>

</div>
