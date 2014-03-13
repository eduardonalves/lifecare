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

	$this->start('modais');
	    echo $this->element('parceiroFornecedor_add',array('modal'=>'add-parceiroFornecedor'));
	$this->end();	

?>


<header>

	<?php echo $this->Html->image('financeiro_title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption34">Cadastrar Conta a Pagar</h1>
	
</header>

<?php echo $this->Form->create('Conta'); ?>

<div class="fieldset-total" style="border:none">
    	
<section> <!---section superior--->

	<header>Dados Gerais da Movimentação</header>

	<section class="coluna-esquerda">
		<?php
			echo $this->Form->input('identificacao',array('type'=>'text','label'=>'Identificação:','class'=>'tamanho-medio'));
			echo $this->Form->input('valor',array('type'=>'text','label'=>'Valor:','class'=>'tamanho-pequeno'));
			echo $this->Form->input('status',array('label' => 'Status:','type' => 'select','options'=>array('','Aberto','Pago','Pago parcialmente','Atrasado','Cobrança','Protesto')));

			 echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
										 'title'=>'Preencher',
										     'class'=>'bt-preencherConta',
										     'id'=>'bt-preencherFornecedor'
										     ));
		?>

		<div class="input autocompleteFornecedor ">
		    <label id="SpanPesquisarFornecedor">Buscar Fornecedor<span class="campo-obrigatorio">*</span>:</label>
		    <select class="tamanho-medio limpa" id="add-fornecedor">
			<option id="optvazioForn"></option>
			<option value="add-parceiroFornecedor">Cadastrar</option>
			<?php
			    foreach($allFornecedores as $allFornecedore)
			    {
				    echo "<option id='".$allFornecedore['Fornecedore']['nome']."' class='".$allFornecedore['Fornecedore']['cpf_cnpj']."' rel='".$allFornecedore['Fornecedore']['tipo']."' value='".$allFornecedore['Fornecedore']['id']."' >";
				    echo $allFornecedore['Fornecedore']['nome'];
				    echo "</option>";
			    }

			?>
		    </select>
		</div>
				
	</section>
		
	<section class="coluna-central" >
		<?php		
		    echo $this->Form->input('data_emissao',array('type'=>'text','label'=>'Data de Emissão:','class'=>'tamanho-pequeno forma-data'));
		    //echo $this->Form->input('parceirodenegocio_id',array('label'=>'Parceiro de Negócio:','class'=>'tamanho-medio'));	
		    echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'select'));
		    echo $this->Form->input('periodo_critico',array('label' => 'Período Crítico:','class' => 'tamanho-pequeno'));
		    echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','class'=>'tamanho-medio borderZero','allowEmpty' => 'false','readonly'=>'readonly','title'=>'Campo Obrigatório'));		
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
		    echo $this->Form->input('data_quitacao',array('type'=>'text','label'=>'Data Validade:','class'=>'tamanho-pequeno forma-data'));
		    //echo $this->Form->input('imagem',array('label'=>'Imagem','class'=>'tamanho-medio'));
		    echo $this->Form->input('descricao',array('label' => 'Descrição:', 'type' => 'textarea','class' => 'textAreaConta'));
		    echo $this->Form->input('cpf_cnpj', array('type'=>'text','required'=>'false','class'=>'borderZero tamanho-medio','label'=>'CPF/CNPJ:','readonly'=>'readonly'));
		?>
		
	</section>
</section><!---Fim section superior--->

<section> <!---section meio--->

	<header>Dados da(s) Parcela(s)</header>

	<section class="coluna-esquerda">
		<?php
		echo $this->Form->input('Pagamento.tipo_pagamento',array('label'=>'Tipo de Pagamento:','type' => 'select','options'=>array('','A Vista','A Prazo')));	
		?>
	</section>
	
	<section class="coluna-central">
		<?php
		echo $this->Form->input('forma_pagamento',array('type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno'));
		?>	
	</section>
	
	<section class="coluna-direita">
		<?php
		echo $this->Form->input('numero_parcelas',array('type'=>'text','label'=>'Numero de Parcelas:','class'=>'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));	
		?>
	</section>
</section><!--fim Meio-->

    <div class="fieldset">
	
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->input('parcela',array('type'=>'text','label'=>'Parcela:','class'=>'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));	
			echo $this->Form->input('valor',array('type'=>'text','label'=>'Valor:','class'=>'tamanho-pequeno','id'=>'valorPagar'));	
			echo $this->Form->input('agencia',array('type'=>'text','label'=>'Agência:','class'=>'tamanho-pequeno'));	
		?>
	</section>

		
	<section class="coluna-central">
		<?php
			echo $this->Form->input('identificacao',array('type'=>'text','label'=>'Identificação:','class'=>'tamanho-pequeno','id'=>'identificacaoPagar'));
			echo $this->Form->input('periodo_critico',array('type'=>'text','label'=>'Periodo Crítico:','class'=>'tamanho-pequeno'));
			echo $this->Form->input('conta',array('type'=>'text','label'=>'Conta:','class'=>'tamanho-pequeno'));
		?>	
	</section>

			
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('data_vencimento',array('type'=>'text','label'=>'Data de Vencimento:','class'=>'tamanho-pequeno forma-data'));	
			echo $this->Form->input('desconto',array('type'=>'text','label'=>'Desconto:','class'=>'tamanho-pequeno'));	
			echo $this->Form->input('banco',array('type'=>'text','label'=>'Banco:','class'=>'tamanho-medio'));					
		?>
	</section>
	<?php
		echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
																'title'=>'Adicionar',
																'class'=>'bt-direita',
																'id'=>'bt-adicionarConta-pagar'
																));
		echo $this->html->image('botao-editar2.png',array('alt'=>'Editar',
				     'title'=>'Editar Conta',
				     'id'=>'bt-editarConta-pagar',
				     'class'=>'bt-direita'
				     ));
	?>		
    </div>
</div>	
	<div>
		<table id="tabela-conta-pagar" cellpadding="0" cellspacing="0">
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
		
		echo $this->form->submit( 'botao-salvar.png',array('class'=>'bt-salvarConta','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarContaPagar')); 
			
		echo $this->Form->end();	
	?>	

	<!-- </form> 
	</section> -->
</footer>
