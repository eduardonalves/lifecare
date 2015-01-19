<?php
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('comparecimento');
	$this->end();
?>
<header>
	<?php
		echo $this->Html->image('titulo-gerenciar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); 
	?>
<h1 class="menuOption51">Controle Presencial</h1>

</header>


<section>
	<header></header>

</section>


<div style="clear:both;"></div>

<pre>
<?php
	
print_r($registro);
	
?>
</pre>

<?php

echo $this->Search->create();
echo $this->Search->input('status');
echo $this->Search->input('data');
echo $this->Search->input('funcionario', array('class' => 'select-box'));
echo $this->Search->input('cargo', array('class' => 'select-box'));
echo $this->Search->end(__('Filter', true));
?>
