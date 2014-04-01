<?php 
		
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);

	}
?>
   
<?php
	$this->start('css');
	echo $this->Html->css('comprovante_view');
	echo $this->Html->css('zoomer');
	
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
	echo $this->Html->script('zoomer.js');
		
?>
		
<?php
	$this->end();
?>

<script>
    $(document).ready(function(){
	$('.zoomImagem').zoomer();
    });
</script>

<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Upload Conta</h1>
	 
</header>

<section>
	<header class="header">Visualizar Comprovante</header>

	    <div class='zoomImagem'>
		<img src="/lifecare/app/webroot/files/<?php  echo $conta['Conta']['imagem'] ?>">

	    </div>

	
</section>


</div>

</div>
