<?php
	$this->start('css');
	    echo $this->Html->css('contas_pagar');
	    echo $this->Html->css('table');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
		
	$this->start('script');
	    echo $this->Html->script('funcoes_contas_pagar.js');
	    echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	$this->end();
?>


<header>
	<h1>Resposta de Cotação</h1>
</header>

<section>
	
	<header>Informações do Fornecedor</header>
	
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->create('Resposta');
			echo $this->Form->input('parceirodenegocio_id',array('type'=>'hidden','value'=>$parceirodenegocios['Parceirodenegocio']['id']));
			echo $this->Form->input('Vazio.nome',array('label'=>'Nome do Fornecedor:','type'=>'text','value'=>$parceirodenegocios['Parceirodenegocio']['nome'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			//echo $this->Form->input('',array());
		?>
	</section>
	
	<section class="coluna-central">
		<?php
			echo $this->Form->input('Vazio.cpf_cnpj',array('label'=>'CPF/CNPJ:','type'=>'text','value'=>$parceirodenegocios['Parceirodenegocio']['cpf_cnpj'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));

		?>
	</section>
	
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Vazio.email',array('label'=>'E-mail:','type'=>'text','value'=>$parceirodenegocios['Contato'][0]['email'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));

		?>
	</section>
	
	<header>Informações da Operação</header>
	<section class="coluna-esquerda"></section>
	<section class="coluna-central"></section>
	<section class="coluna-direita"></section>
	
	<header>Produtos da Cotação</header>
	
</section>

<footer>

</footer>
<br>




<pre>
	<h3>Parceiro</h3>
<?php
	print_r($parceirodenegocios);
?>
</pre>

<pre>
	<h3>Operacao</h3>
<?php
	print_r($comoperacao);
?>
</pre>

<pre>
	<h3>Itens</h3>
<?php
	print_r($itensDaOperacao);
?>
</pre>
