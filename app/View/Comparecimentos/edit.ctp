<?php
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('comparecimento');
	$this->end();
?>
<header>
	<?php
		echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); 
	?>
<h1 class="menuOption51">Controle Presencial</h1>

</header>


<section>
	<header></header>

</section>

<pre>
<?php
	
print_r($registro);
	
?>
</pre>

<?php

echo $this->Search->create();
echo $this->Search->input('status');
echo $this->Search->end(__('Filter', true));
?>
