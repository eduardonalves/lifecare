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
    <h1 class="menuOption33">Cadastrar Contas a Receber</h1>
    
    

</header>

<?php echo $this->Form->create('Conta'); ?>

<div class="fieldset-total" style="border:none">
    
    <section> <!---section superior--->

	    <header>Dados Gerais da movimentação</header>
	    
	    <section class="coluna-esquerda">
		<?php 
		    echo $this->Form->input('identificacao',array('label' => 'Identificação:','class' => 'tamanho-medio'));
		    echo $this->Form->input('valor',array('label' => 'Valor:','class' => 'tamanho-pequeno dinheiro_duasCasas', 'type' => 'text'));
<<<<<<< HEAD

=======
>>>>>>> parent of fb6b800... Alteracoes Consultas
		    echo $this->Form->input('status',array('label' => 'Status:','type' => 'select','options'=>array('','Aberto','Pago','Pago parcialmente','Atrasado','Cobrança','Protesto')));
		
		    echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
										 'title'=>'Preencher',
<<<<<<< HEAD
										     'class'=>'bt-preencherConta',
										     'id'=>'bt-preencherCliente'
										     ));

=======
										     'class'=>'bt-preencher',
										     'id'=>'bt-preencherCliente'
										     ));
>>>>>>> parent of fb6b800... Alteracoes Consultas
		?>
		
		<div class="input autocompleteCliente">
		    <label>Buscar Cliente<span class="campo-obrigatorio">*</span>:</label>
		    <select class="tamanho-medio" id="add-cliente">
			    <option id="optvazioForn"></option>
			    <option value="add-parceiroCliente">Cadastrar</option>
			    <?php
				    foreach($allClientes as $allCliente)
				    {
					    echo "<option id='".$allCliente['Cliente']['nome']."' class='".$allCliente['Cliente']['cpf_cnpj']."' rel='".$allCliente['Cliente']['tipo']."' value='".$allCliente['Cliente']['id']."' >";
					    echo $allCliente['Cliente']['nome'];
					    echo "</option>";
				    }

			    ?>
		    </select>
		</div>
		
		
	    </section>

	    <section class="coluna-central" >
		<?php 
		    echo $this->Form->input('data_emissao',array('label' => 'Data Emissão:','type' => 'text','class' => 'tamanho-pequeno forma-data'));
		    echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'select'));
		    echo $this->Form->input('periodo_critico',array('label' => 'Período Crítico:','class' => 'tamanho-pequeno'));
		    echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-medio borderZero','allowEmpty' => 'false','readonly'=>'readonly','title'=>'Campo Obrigatório'));
		?>
	    </section>

	    <section class="coluna-direita" >
		<?php 
		    echo $this->Form->input('data_vencimento',array('label' => 'Data Vencimento:','class' => 'tamanho-pequeno forma-data'));
<<<<<<< HEAD

		    echo $this->Form->input('descricao',array('label' => 'Descrição:', 'type' => 'textarea','class' => 'textAreaConta'));
		    echo $this->Form->input('cpf_cnpj', array('type'=>'text','required'=>'false','class'=>'borderZero tamanho-medio','label'=>'CPF/CNPJ:','readonly'=>'readonly'));

=======
		    echo $this->Form->input('descricao',array('label' => 'Descrição:', 'type' => 'textarea','id' => 'textAreaConta'));
		    echo $this->Form->input('cpf_cnpj', array('type'=>'text','required'=>'false','class'=>'borderZero tamanho-medio','label'=>'CPF/CNPJ:','readonly'=>'readonly'));
>>>>>>> parent of fb6b800... Alteracoes Consultas
		?>
	    </section>

    </section><!---Fim section superior--->


    <section> <!---section BAIXO--->

	    <header class="">Dados da(s) Parcela(s)</header>
		    
	    <section class="coluna-esquerda">
		<?php 
		    echo $this->Form->input('Pagamento.tipo_pagamento',array('label'=>'Tipo de Pagamento:','type' => 'select','options'=>array('','A Vista','A Prazo')));
		?>
	    </section>

	    <section class="coluna-central" >
		<?php
		    echo $this->Form->input('Pagamento.forma_pagamento',array('label' => 'Forma de Pagamento:','class' => 'tamanho-pequeno', 'type' => 'text'));
		    ?>    
	    </section>

	    <section class="coluna-direita" >
		<?php
		    echo $this->Form->input('Pagamento.numero_parcela',array('label' => 'Número de Parcelas:','class' => 'tamanho-pequeno borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()', 'type' => 'text'));
		?>
	    </section>
	    
    </section><!--fim BAIXO-->


    <div class="fieldset ">
	
	    <section class="coluna-esquerda">
		<?php
		    echo $this->Form->input('parcela',array('label' => 'Parcela:','class' => 'tamanho-pequeno borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()'));
		    echo $this->Form->input('valor',array('label' => 'Valor:','class' => 'tamanho-pequeno dinheiro_duasCasas','id' => 'valorConta-receber', 'type' => 'text'));
		    echo $this->Form->input('agencia',array('label' => 'Agencia:','class' => 'tamanho-pequeno'));
		?>    
	    </section>

	    <section class="coluna-central" >
		<?php
		    echo $this->Form->input('identificacao_documento',array('label' => 'Identificação:','class' => 'tamanho-pequeno'));
		    echo $this->Form->input('periodocritico',array('label' => 'Periodo Crítico:','class' => 'tamanho-pequeno'));
		    echo $this->Form->input('conta',array('label' => 'Conta:','class' => 'tamanho-pequeno'));
		?>
	    </section>

	    <section class="coluna-direita" >
		<?php
		    echo $this->Form->input('data_vencimento',array('label' => 'Data vencimento:', 'type' => 'text','class' => 'tamanho-pequeno forma-data','id' => 'dataVencimento-receber'));
		    echo $this->Form->input('desconto',array('label' => 'Desconto:','class' => 'tamanho-pequeno dinheiro_duasCasas'));
		    echo $this->Form->input('banco',array('label' => 'Banco:','class' => 'tamanho-medio'));
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
						     'id'=>'bt-alterarConta-receber',
						     'class'=>'bt-direita'
						     ));
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
		<th><?php echo ('Banco'); ?></th>
		<th><?php echo ('Agência'); ?></th>
		<th><?php echo ('Conta'); ?></th>
		<th class="actions"><?php echo __('Ações'); ?></th>
	    </thead>
	</table>
	
	
</div>


<footer>
    	
	<?php
		
	    echo $this->form->submit( 'botao-salvar.png',array('class'=>'bt-salvarConta','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarContaReceber')); 

	    echo $this->Form->end();	
	?>
</footer>
