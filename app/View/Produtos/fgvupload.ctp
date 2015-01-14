<?php 
	$this->start('css');
		echo $this->Html->css('fgvupload.css');

	$this->end();

	$this->start('modais');
		echo $this->element('categoria_add', array('modal'=>'add-categoria'));
	$this->end();
	
	
?>
	<?php 
		$this->start('css');

			echo $this->Html->css('saidas');
			echo $this->Html->css('table');
			echo $this->Html->css('jquery-ui/jquery.ui.all.css');
			echo $this->Html->css('jquery-ui/custom-combobox.css');

		$this->end();
	?>

	<?php 
		$this->start('script');

			echo $this->Html->script('jquery-ui/jquery.ui.core.js');
			echo $this->Html->script('jquery-ui/jquery.ui.widget.js');
			echo $this->Html->script('jquery-ui/jquery.ui.button.js');
			echo $this->Html->script('jquery-ui/jquery.ui.position.js');
			echo $this->Html->script('jquery-ui/jquery.ui.menu.js');
			echo $this->Html->script('jquery-ui/jquery.ui.autocomplete.js');
			echo $this->Html->script('jquery-ui/jquery.ui.tooltip.js');
			echo $this->Html->script('jquery-ui/custom-combobox.js');

		$this->end();
	?>
<header>
    <img title="Cadastrar" alt="Cadastrar" id="cadastrar-titulo" src="/lifecare/img/titulo-cadastrar.png">
    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption46">Atualizar Dados FGV</h1>
	
</header>
<section>
	<header>
		Carregar nova planilha
	</header>

	<?php echo $this->Form->create('Produto', array('enctype'=>'multipart/form-data',
		'url' => array('controller' => 'produtos', 'action' => 'fgvupload')
	));?>
	
		<div class="input file">
			<?php
			echo $this->Form->input('', array('label'=>array('text'=>'Selecione o arquivo (xls):','style'=>'width:150px'), 'id'=>'doc_file', 'class'=>'campo-buscar', 'type'=>'file', 'name'=>'doc_xls'));
			echo $this->Form->input('', array('id'=>'valor', 'label'=>false,'div'=>false, 'type'=>'text', 'name'=>'planilha'));

			?>
			<a id="teste" href="#"><img class="upload-fgv" style="margin-left:10px" src="../img/botao-buscar2.png"/></a>
		</div>

		<div class="submit">
			<input id="bt-submit" type="image" src="../img/botao-confirmar.png"/>
		</div>
		
	<?php
	
	echo $this->Form->end();
	?>

</section>
