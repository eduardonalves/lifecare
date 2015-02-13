
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

	<?php echo $this->element('form_importar_saida_xml'); ?>

