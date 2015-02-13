<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}

?>
			
<?php 
	$this->start('css');
	echo $this->Html->css('modal_categoria');
	$this->end();
	
?>

<?php 
	$this->start('css');

	//	echo $this->Html->css('entradas');
		echo $this->Html->css('table');
	//	echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	//	echo $this->Html->css('jquery-ui/custom-combobox.css');
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
		
		if(isset($allCategorias))
		{
		?>
		<script type="text/javascript">
		var availableTagsCategorias;
		 $(function() {
			availableTagsCategorias = [
			<?php
			$jsArray = '';
			foreach($allCategorias as $cat)
			{ 

				$jsArray .= ($jsArray=='') ? '"' . $cat . '"' : "," . '"' . $cat . '"';
				
			}
			echo $jsArray;
			?>
			];
			$( ".nome-categoria" ).autocomplete({
			source: availableTagsCategorias
			});
		});
		
		</script>

		<?php
		
		}
		?>
		
<?php
	$this->end();
?>


<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Cadastrar Categoria</h1>
</header>

<section>
	<header>Dados da Categoria</header>
	
	<section class="coluna-modal">
		<div>
		
		<?php

			echo $this->Form->create('Categoria', array('url'=>array('controller'=>'Categorias', 'action'=>'add'), 'class'=>'modal-form'));
			echo "<div class=\"ui-widget\">";
			echo $this->Form->input('Categoria.nome', array('class'=>'nome-categoria','type'=>'text', 'label'=>'Categoria:', 'div'=>false , 'maxlength' => '20' ));
			echo "</div>";
			
			?>
	
		</div>
		
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit( 'botao-salvar.png' ,  array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>

</div>

</div>
