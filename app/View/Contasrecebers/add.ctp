<?php	    
	$this->start('css');
	   // echo $this->Html->css('contas_receber');
	    echo $this->Html->css('table');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
	    echo $this->Html->script('funcoes_contas_receber.js');
	    echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	$this->end();

	$this->start('modais');
	    echo $this->element('parceiroCliente_add',array('modal'=>'add-parceiroCliente'));
	$this->end();	
?>
    
<header>

    <?php echo $this->Html->image('financeiro_title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
     
    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption33">Cadastrar Conta a Receber</h1>
    
    

</header>

<?php echo $this->Form->create('Contasreceber'); ?>

<div class="fieldset-total" style="border:none">
    
    <section> <!---section superior--->

	    <header>Dados Gerais da Movimentação</header>
	    
	    <section class="coluna-esquerda">
		<?php 
		    echo $this->Form->input('identificacao',array('label' => 'Identificação:','class' => 'tamanho-medio desabilita'));
		    echo $this->Form->input('status',array('label' => 'Status:','value' => 'VERDE','type' => 'hidden'));
		    echo $this->Form->input('user_id',array('type' => 'hidden','value' => $userid));
		?>
	<div class="tela-resultado">   
		<?php
		    echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
										 'title'=>'Preencher',
										     'class'=>'bt-preencherConta',
										     'id'=>'bt-preencherCliente'
										     ));
		?>
		
		<div class="input autocompleteCliente">
		    <label>Buscar Cliente<span class="campo-obrigatorio">*</span>:</label>
		    <select class="tamanho-medio" id="add-cliente">
			    <option id="optvazioForn"></option>
			    <option value="add-parceiroCliente">Cadastrar</option>
			    <?php
			       foreach($parceirodenegocios as $parceirodenegocio)
				{
				    echo "<option id='".$parceirodenegocio['Parceirodenegocio']['nome']."' class='".$parceirodenegocio['Parceirodenegocio']['cpf_cnpj']."' rel='".$parceirodenegocio['Parceirodenegocio']['tipo']."' value='".$parceirodenegocio['Parceirodenegocio']['id']."' >";
				    echo $parceirodenegocio['Parceirodenegocio']['nome'];
				    echo "</option>";
				}
			    ?>
		    </select>
		</div>
	</div>
		<?php
		    echo '<span id="msgAutoComplete" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Fornecedor</span>';
		    echo $this->Form->input('descricao',array('label' => 'Descrição:', 'type' => 'textarea','class' => 'textAreaConta'));
		?>
		
	    </section>

	    <section class="coluna-central" >
		<?php 
		    echo $this->Form->input('data_emissao',array('label' => 'Data de Emissão<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno obrigatorio desabilita forma-data'));
		    echo '<span id="msgDataEmissao" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Emissão</span>';
		    echo '<span id="msgDataEmissaoInvalida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>';
		    echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'hidden','value'=>'A RECEBER'));
		    echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','title'=>'Campo Obrigatório','onfocus' => 'this.blur()'));
		?>
	    </section>

	    <section class="coluna-direita" >
		<?php
		    echo $this->Form->input('valor',array('label' => 'Valor Total:','class' => 'tamanho-pequeno dinheiro_duasCasas borderZero','readonly'=>'readonly','onFocus'=>'this.blur();', 'type' => 'text'));
		    echo $this->Form->input('cpf_cnpj', array('type'=>'text','class'=>'borderZero tamanho-medio','label'=>'CPF/CNPJ:','readonly'=>'readonly','onfocus' => 'this.blur()'));
		    echo  $this->Form->input('parceirodenegocio_id', array('type' => 'hidden'));
			echo  $this->Form->input('status', array('type' => 'hidden', 'value' => 'VERDE'));
		?>
	    </section>

    </section><!---Fim section superior--->


    <section> <!---section BAIXO--->

	    <header class="">Dados da(s) Parcela(s)</header>
		    
	    <section class="coluna-esquerda">
		<?php 
		    echo $this->Form->input('Pagamento.0.tipo_pagamento',array('label'=>'Tipo de Pagamento<span class="campo-obrigatorio">*</span>:','type' => 'select','class'=>'desabilita obrigatorio desabilidado', 'options'=> array('A Vista' =>'A Vista' ,'A Prazo' =>'A Prazo')));
		    echo '<span id="msgTipoPagamento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Tipo Pagamento</span>';
		?>
	    </section>

	    <section class="coluna-central" >
		<?php
		    echo $this->Form->input('Pagamento.0.forma_pagamento',array('label' => 'Forma de Pagamento:','class' => 'tamanho-pequeno desabilita', 'type' => 'select', 'options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEBITO' => 'Débito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));
		    ?>    
	    </section>

	    <section class="coluna-direita" >
		<?php
		    echo $this->Form->input('Pagamento.0.numero_parcela',array('label' => 'Número de Parcelas:','class' => 'tamanho-pequeno desabilita borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()', 'type' => 'text','value' => '0'));
		?>
	    </section>
	    
    </section><!--fim BAIXO-->


    <div class="fieldset tela-resultado-field">
	
	    <section class="coluna-esquerda">
		<?php
		    echo $this->Form->input('parcela_parcela',array('label' => 'Parcela:','id' =>'ContasreceberParcela','class' => 'tamanho-pequeno desabilita borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()'));
		    echo $this->Form->input('valor_parcela',array('label' => 'Valor<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno obrigatorio desabilita dinheiro_duasCasas','id' => 'valorConta-receber', 'type' => 'text'));
		    echo '<span id="msgContaValor" class="Msg-tooltipDireita" style="display:none">Preencha o campo Valor</span>';	
		    echo $this->Form->input('agencia_parcela',array('label' => 'Agencia:','id' => 'ContasreceberAgencia','class' => 'tamanho-pequeno desabilita'));
		?>    
	    </section>

	    <section class="coluna-central" >
		<?php
		    echo $this->Form->input('identificacao_documento_parcela',array('label' => 'Código de Barras:','id' => 'ContasreceberIdentificacaoDocumento','class' => 'tamanho-pequeno desabilita'));
		    echo $this->Form->input('periodocritico_parcela',array('label' => 'Periodo Crítico<span class="campo-obrigatorio">*</span>:','id' => 'ContasreceberPeriodocritico','class' => 'obrigatorio tamanho-pequeno desabilita'));
		    echo '<span id="msgPeriodoCritico" class="Msg-tooltipDireita" style="display:none">Preencha o campo Periodo Critico</span>';
		    echo $this->Form->input('conta_parcela',array('label' => 'Conta:','id' => 'ContasreceberConta','class' => 'tamanho-pequeno desabilita'));
		?>
	    </section>

	    <section class="coluna-direita" >
		<?php

		    echo $this->Form->input('data_vencimento_parcela',array('label' => 'Data vencimento<span class="campo-obrigatorio">*</span>:', 'type' => 'text','class' => 'tamanho-pequeno obrigatorio desabilita forma-data','id' => 'dataVencimento-receber'));

		    echo '<span id="msgDataVencimento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Vencimento</span>';
		    echo '<span id="msgDataVencimentoInvalida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>';
		    echo $this->Form->input('desconto_parcela',array('label' => 'Desconto:','id' => 'ContasreceberDesconto','class' => 'tamanho-pequeno desabilita dinheiro_duasCasas'));
		    echo $this->Form->input('banco_parcela',array('label' => 'Banco:','id' =>'ContasreceberBanco','class' => 'tamanho-medio desabilita'));
		?>
		
	    </section>
	    
	    <?php
		echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
								 'title'=>'Adicionar Conta',
								 'id'=>'bt-adicionarConta-receber',
								 'class'=>'bt-direita'
		));

		echo $this->html->image('botao-editar2.png',array('alt'=>'Editar',
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
		<th><?php echo ('Identificação'); ?></th>
		<th><?php echo ('Data de Vencimento'); ?></th>
		<th><?php echo ('Valor'); ?></th>
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
	
	    echo $this->form->submit( 'botao-salvar.png',array(
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
