<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		echo $this->Html->script('http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js');
		echo $this->Html->script('funcoes_parceiro.js');
	$this->end();
?>

<script>
	window.onload = function(){
		new dgCidadesEstados({
			estado: document.getElementById('Endereco0Uf'),
			cidade: document.getElementById('Endereco0Cidade')
		});
	}
</script>

<?php echo $this->element('parceirodeNegoicos_add'); ?>

