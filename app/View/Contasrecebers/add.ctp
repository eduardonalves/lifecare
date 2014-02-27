<?php	    
	$this->start('css');
	echo $this->Html->css('contas_receber');
	echo $this->Html->css('table');
	$this->end();	
?>

<header>

    <?php echo $this->Html->image('financeiro_title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
     
    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption33">Cadastrar Contas a Receber</h1>
    
    <?php echo $this->Form->create('Conta'); ?>

</header>

<section> <!---section superior--->

	<header>Dados Gerais da movimentação</header>

	<section class="coluna-esquerda">
	    <?php 
		echo $this->Form->input('identificacao',array('label' => 'Identificação:','class' => 'tamanho-medio'));
		echo $this->Form->input('valor',array('label' => 'Valor:','class' => 'tamanho-pequeno'));
		echo $this->Form->input('status',array('label' => 'Status:','class' => 'tamanho-pequeno'));
	    ?>
	    
	</section>

	<section class="coluna-central" >
	    <?php 
		echo $this->Form->input('data_emissao',array('label' => 'Data Emissão','type' => 'text','class' => 'tamanho-pequeno'));
		echo $this->Form->input('cliente',array('label' => 'Cliente:','type' => 'select','class' => 'tamanho-pequeno'));
		echo $this->Form->input('periodo_critico',array('label' => 'Período Crítico','class' => 'tamanho-pequeno'));
	    ?>
	</section>

	<section class="coluna-direita" >
	    <?php 
		echo $this->Form->input('data_vencimento',array('label' => 'Data Vencimento:','class' => 'tamanho-pequeno'));
		echo $this->Form->input('descricao',array('label' => 'Descrição:', 'type' => 'textarea','class' => ''));
	    ?>
	</section>

</section><!---Fim section superior--->


<section> <!---section BAIXO--->

	<header class="">Dados da(s) Parcela(s)</header>
		
	<section class="coluna-esquerda">
	    <?php 
		echo $this->Form->input('Pagamento.tipo_pagamento',array('label'=>'Tipo de Pagamento:','type' => 'select','class' => 'tamanho-pequeno'));
	    ?>
	</section>

	<section class="coluna-central" >
	    <?php
		echo $this->Form->input('Pagamento.forma_pagamento',array('label' => 'Forma de Pagamento:','class' => 'tamanho-pequeno'));
		?>    
	</section>

	<section class="coluna-direita" >
	    <?php
		echo $this->Form->input('Pagamento.numero_parcela',array('label' => 'Número de Parcelas:','class' => 'tamanho-pequeno borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()'));
	    ?>
	</section>
	
</section><!--fim BAIXO-->


<div class="fieldset ">
    
	<section class="coluna-esquerda">
	    <?php
		echo $this->Form->input('Parcela.parcela',array('label' => 'Parcela:','class' => 'tamanho-pequeno borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()'));
		echo $this->Form->input('Parcela.valor',array('label' => 'Valor:','class' => 'tamanho-pequeno'));
		echo $this->Form->input('Parcela.agencia',array('label' => 'Agencia:','class' => 'tamanho-pequeno'));
	    ?>    
	</section>

	<section class="coluna-central" >
	    <?php
		echo $this->Form->input('Parcela.identificacao_documento',array('label' => 'Identificação:','class' => 'tamanho-pequeno'));
		echo $this->Form->input('Parcela.periodocritico',array('label' => 'Periodo Crítico','class' => 'tamanho-pequeno'));
		echo $this->Form->input('Parcela.conta',array('label' => 'Conta','class' => 'tamanho-pequeno'));
	    ?>
	</section>

	<section class="coluna-direita" >
	    <?php
		echo $this->Form->input('Parcela.data_vencimento',array('label' => 'Data vencimento', 'type' => 'text','class' => 'tamanho-pequeno'));
		echo $this->Form->input('Parcela.desconto',array('label' => 'Desconto','class' => 'tamanho-pequeno'));
		echo $this->Form->input('Parecela.banco',array('label' => 'Banco','class' => 'tamanho-medio'));
	    ?>
	    
	</section>
	
	<?php
	    echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
							     'title'=>'Adicionar Conta',
							     'id'=>'',
							     'class'=>'bt-direita'
							     ));
	?>
	

</div>

<div>
	<table id="tabela-principal" cellpadding="0" cellspacing="0">
	    <tr>
		<th><?php echo ('Parcela'); ?></th>
		<th><?php echo ('Identificação'); ?></th>
		<th><?php echo ('Data de Vencimento'); ?></th>
		<th><?php echo ('Valor'); ?></th>
		<th><?php echo ('Periodo Crítico'); ?></th>
		<th><?php echo ('Banco'); ?></th>
		<th><?php echo ('Agência'); ?></th>
		<th><?php echo ('Conta'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	    </tr>
	</table>
	
	
</div>


<footer>
    	
	<?php
		
	    echo $this->form->submit( 'botao-salvar.png',array('class'=>'bt-salvarConta','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarContaReceber')); 

	    echo $this->Form->end();	
	?>
</footer>






<!--
<div class="contas form">

	<fieldset>
		<legend><?php// echo __('Add Conta'); ?></legend>
	<?php
		//
		//
		//
		//
		//echo $this->Form->input('imagem');
		//
		//echo $this->Form->input('parceirodenegocio_id');
	?>
	</fieldset>
<?php //echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>

		<li><?php// echo $this->Html->link(__('List Contas'), array('action' => 'index')); ?></li>
		<li><?php// echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php// echo $this->Html->link(__('List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
