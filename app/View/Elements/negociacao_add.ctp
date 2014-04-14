<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}

	$this->start('css');
	    echo $this->Html->css('modal_negociacao');
	    echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_modal_negociacao.js');
	$this->end();
?>

<script>
</script>

<header>
    <?php echo $this->Html->image('financeiro_title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
     
    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption33">Negociação</h1>
</header>

<?php echo $this->Form->create('Negociacao',array('controller' => 'Negociacao','action' => 'add')); ?>

<div class="fieldset-total" style="border:none">
    
    <section> <!---section superior--->

	    <header>Dados Gerais da Movimentação</header>
	    
	    <section class="coluna-esquerda">
		<?php
			echo $this->Form->input('conta_id',array('type' => 'hidden','value' => $conta['Conta']['id']));
			echo $this->Form->input('valor',array('label' => 'Valor Total:','onFocus' => 'this.blur()','class' => 'tamanho-medio clickValor borderZero','readonly' => 'readonly','type' => 'text'));
			
		?>		
	    </section>

	    <section class="coluna-central" >
		<?php
		    $data_atual = date("d/m/Y", strtotime("now"));
		    echo $this->Form->input('data',array('label' => 'Data Negociação<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno borderZero','id'=> 'negociacaoDataEmissao','readonly' => 'readonly','onFocus' => 'this.blur()','tabindex' => '101','value'=>$data_atual));
		    echo $this->Form->input('status',array('label' => 'Tipo:','type' => 'hidden','value'=>'ABERTO'));
		    
		?>
	    </section>

	    <section class="coluna-direita" >
		<?php
		    echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-medio borderZero','readonly' => 'readonly','title'=>'Campo Obrigatório','onFocus' => 'this.blur()','value'=>h($conta['Parceirodenegocio']['nome'])));
		    echo $this->Form->input('parceirodenegocio_id',array('type' => 'hidden','value' => $conta['Parceirodenegocio']['id']));
		    echo $this->Form->input('user_id',array('type' => 'hidden','value' => $userid));
		    
		   
		?>
	    </section>

    </section><!---Fim section superior--->


    <section> <!---section BAIXO--->

	    <header class="">Dados da(s) Parcela(s)</header>
		    
	    <section class="coluna-esquerda">
		<?php 
		    echo $this->Form->input('tipo_pagamento',array('label'=>'Tipo de Pagamento<span class="campo-obrigatorio">*</span>:','type' => 'select','class'=>'desabilita obrigatorio desabilidado','tabindex' => '104', 'options'=> array('A Vista' =>'A Vista' ,'A Prazo' =>'A Prazo')));
		    echo '<span id="msgTipoPagamento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Tipo Pagamento</span>';
		?>
	    </section>

	    <section class="coluna-central" >
		<?php

		    echo $this->Form->input('forma_pagamento',array('label' => 'Forma de Pagamento:','class' => 'tamanho-pequeno desabilita', 'type' => 'select' ,'tabindex' => '105', 'options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEBITO' => 'Débito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale')));

		    ?>    
	    </section>

	    <section class="coluna-direita" >
		<?php
		    echo $this->Form->input('numero_parcela',array('label' => 'Número de Parcelas:','class' => 'tamanho-pequeno desabilita borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()', 'type' => 'text','value' => '0'));
		    
		?>
	    </section>
	    
    </section><!--fim BAIXO-->


    <div class="fieldset tela-resultado-field">
	
	    <section class="coluna-esquerda">
		<?php
		    echo $this->Form->input('parcela_parcela',array('label' => 'Parcela:','id' =>'ContasreceberParcela','class' => 'tamanho-pequeno desabilita borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()'));
		    echo $this->Form->input('valor_parcela',array('label' => 'Valor<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno obrigatorio desabilita dinheiro_duasCasas','id' => 'valorConta-receber', 'type' => 'text','tabindex' => '108'));
		    echo '<span id="msgContaValor" class="Msg-tooltipDireita" style="display:none">Preencha o campo Valor</span>';	
		    echo $this->Form->input('agencia_parcela',array('label' => 'Agencia:','id' => 'ContasreceberAgencia','class' => 'tamanho-pequeno desabilita','tabindex' => '111'));
		     echo $this->Form->input('periodocritico_parcela',array('label' => 'Periodo Crítico<span class="campo-obrigatorio">*</span>:','id' => 'ContasreceberPeriodocritico','class' => 'obrigatorio tamanho-pequeno desabilita','tabindex' => '114'));
		     echo '<span id="msgPeriodoCritico" class="Msg-tooltipDireita" style="display:none">Preencha o campo Periodo Critico</span>';
		    echo $this->Form->input('Parcela.0.status',array('label' => 'Tipo:','type' => 'hidden','value'=>'VERDE'));
		     
		     
		?>    
	    </section>

	    <section class="coluna-central" >
		<?php
		    echo $this->Form->input('codigodebarras_parcela',array('label' => 'Código de Barras:','id' => 'ContasreceberCodigodeBarras','class' => 'tamanho-medio desabilita','maxlength' => '46','tabindex' => '106'));
		    echo $this->Form->input('identificacao_documento_parcela',array('label' => 'Identificação:','id' => 'ContasreceberIdentificacaoDocumento','class' => 'tamanho-medio desabilita','tabindex' => '109'));		   
		    
		    echo $this->Form->input('conta_parcela',array('label' => 'Conta:','id' => 'ContasreceberConta','class' => 'tamanho-pequeno desabilita','tabindex' => '112'));
		?>
	    </section>

	    <section class="coluna-direita" >
		<?php

		    echo $this->Form->input('data_vencimento_parcela',array('label' => 'Data vencimento<span class="campo-obrigatorio">*</span>:', 'type' => 'text','class' => 'tamanho-pequeno obrigatorio desabilita forma-data','id' => 'dataVencimento-receber','tabindex' => '107'));

		    echo '<span id="msgDataVencimento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Vencimento</span>';
		    echo '<span id="msgDataVencimentoInvalida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>';
		    echo $this->Form->input('desconto_parcela',array('label' => 'Desconto:','id' => 'ContasreceberDesconto','class' => 'tamanho-pequeno desabilita dinheiro_duasCasas','tabindex' => '110'));
		    echo $this->Form->input('banco_parcela',array('label' => 'Banco:','id' =>'ContasreceberBanco','class' => 'tamanho-medio desabilita','tabindex' => '113'));
		   
		?>
	    </section>
	    
	    <?php
			echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
									 'title'=>'Adicionar Conta',
									 'id'=>'bt-adicionarConta-receber',
									 'class'=>'bt-direita'
			));

			echo $this->html->image('botao-concluir-edicao.png',array('alt'=>'Editar',
								 'title'=>'Editar Conta',
								 'id'=>'bt-editarConta-receber',
								 'class'=>'bt-direita'
			));

			echo '<span id="msgCpfCnpj" class="Msg-tooltipDireita" style="display:none">Adicione parcelas a tabela</span>';  
	    ?>
    </div>
    
</div>

<div>
	<table id="tabela-conta-receber" cellpadding="0" cellspacing="0">
	    <thead>
		<th><?php echo ('Parcela'); ?></th>
		<th><?php echo ('Código de Barras'); ?></th>
		<th><?php echo ('Data de Vencimento'); ?></th>
		<th><?php echo ('Valor'); ?></th>
		<th><?php echo ('Identificação'); ?></th>
		<th><?php echo ('Periodo Crítico'); ?></th>
		<th><?php echo ('Desconto'); ?></th>
		<th><?php echo ('Agência'); ?></th>
		<th><?php echo ('Conta'); ?></th>
		<th><?php echo ('Banco'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	    </thead>
	</table>
</div>

<footer>    	
	<?php
	    echo $this->form->submit('botao-salvar.png',array(
							    'class'=>'bt-salvarConta',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'id'=>'btn-salvarContaReceber'
	    ));

	    echo $this->html->image('voltar.png',array(
						    'alt'=>'Voltar',
						    'title'=>'Voltar',
						    'id'=>'bt-voltarReceber',
						    'class'=>'bt-voltar voltar'
	    ));
	
	    echo $this->html->image('botao-confirmar.png',array(
							    'alt'=>'Confirmar',
							    'title'=>'Confirmar',
							    'id'=>'bt-confirmarReceber',
							    'class'=>'bt-confirmar'
	    ));

	    echo $this->Form->end();
	    
	?>
</footer>
