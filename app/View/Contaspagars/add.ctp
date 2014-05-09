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
	    echo $this->element('parceirodeNegoicos_add',array('modal'=>'add-parceiroFornecedor'));
	    echo $this->element('centro_custo',array('modal'=>'add-centro_custo'));
	    echo $this->element('tipo_conta',array('modal'=>'add-tipodeConta'));
	$this->end();
	

?>

<script>
	 $(document).ready(function() {
	 	
	 	$("#ContaspagarIdentificacao").change(function(){
		
			var urlAction = "<?php echo $this->Html->url(array("controller" => "Contaspagars", "action" => "verificaidentificacao"),true);?>";
			
		    var dadosForm = $("#ContaspagarAddForm").serialize();
		    
		    $('.loaderAjaxIdentificacao').show();
		    
		    $.ajax({
				type: "POST",
				url: urlAction,
				data:  dadosForm,
				dataType: 'json',
				success: function(data) {
				    console.debug(data);
				     $('.loaderAjaxIdentificacao').hide();
					if(data == 'existe'){
					   
					    $('#msgValidaIdentificacao').show();
					    
					}else{
						$('#msgValidaIdentificacao2').show();
						
					}
				}
			});
		});	
	 });
</script>
<header>

	<?php echo $this->Html->image('emitir-title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption34">Cadastrar Conta a Pagar</h1>
</header>

<?php echo $this->Form->create('Contaspagar'); ?>

<div class="fieldset-total" style="border:none">

<section> <!---section superior--->

	<header>Dados Gerais da Movimentação</header>

	<section class="coluna-esquerda">
		<?php
		    echo $this->Form->input('identificacao',array('type'=>'text','label'=>'Identificação:','class'=>'tamanho-medio desabilita','tabindex' => '100','maxlength'=>'150'));
		?>
		<span id="msgValidaIdentificacao" class="Msg tooltipMensagemErroTopo" style="display:none">Identificacao existente</span>
		<span id="msgValidaIdentificacao2" class="Msg tooltipMensagemErroTopo" style="display:none">Identificacao liberada para cadastro</span>
		<div class="loaderAjaxIdentificacao" style="display:none">
				<?php
					
					echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
																 'title'=>'Carregando',
																 'class'=>'loaderAjaxCategoria',
																 ));
				?>
				<span>Verificando aguarde...</span>
		</div>	
		<?php
		    echo $this->Form->input('status',array('label' => 'Status:','value' => 'VERDE','type' => 'hidden'));
		    echo $this->Form->input('user_id',array('type' => 'hidden','value' => $userid));

		?>

	    <div class="tela-resultado">	    
		<?php	
		     echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
									     'title'=>'Preencher',
										 'class'=>'bt-preencherConta',
										 'id'=>'bt-preencherFornecedor'
										 ));
		?>

		<div class="input autocompleteFornecedor conta">
			<span id="msgValidaParceiro" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Fornecedor</span>
		    <label id="SpanPesquisarFornecedor">Buscar Fornecedor<span class="campo-obrigatorio">*</span>:</label>
		    <select class="tamanho-medio limpa" id="add-fornecedor">
			<option id="optvazioForn"></option>
			<option value="add-parceiroFornecedor">Cadastrar</option>

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
	    
	    
<!-- Tipo de Conta -->
	<div class="tela-resultado">   
		<?php
		    echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
										 'title'=>'Preencher Tipo de Conta',
										     'class'=>'bt-TipoConta',
										     'id'=>'bt-preencherTipoConta'
										     ));
		?>
		
		
		
		<div class="input autocompleteTipoConta contas">
		    <span id="msgValidaTipoConta" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Tipo Conta</span>
		    <label>Tipo de Conta:</label>
		    <select class="tamanho-medio" id="add-tipoConta">
			    <option id="optvazioForn"></option>
			    <option value="add-tipodeConta">Cadastrar</option>
			    <?php
			       foreach($tipoconta as $tipoConta)
				{
					if($tipoConta['Tipodeconta']['tipo'] == "DESPESA"){
							
						echo "<option id='".$tipoConta['Tipodeconta']['id']."'value='".$tipoConta['Tipodeconta']['nome']."' data-tipo='".$tipoConta['Tipodeconta']['tipo']."' >";
						echo $tipoConta['Tipodeconta']['nome'];
						echo "</option>";
					}
				}
			    ?>
		    </select>
		</div>
	</div>
		
<!-- CENTRO DE CUSTO -->
	<div class="tela-resultado">   
		<?php
		    echo $this->html->image('preencher2.png',array('alt'=>'Preencher',
										 'title'=>'Preencher Centro de Custo',
										     'class'=>'bt-centroCusto',
										     'id'=>'bt-preencherCentreCusto'
										     ));
		?>		
		<div class="input autocompleteCentroCusto contas">
		    <span id="msgValidaCentroCusto" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Centro Custo</span>
		    <label>Centro de Custo:</label>
		    <select class="tamanho-medio" id="add-custo">
			    <option id="optvazioForn"></option>
			    <option value="add-centroCusto">Cadastrar</option>
			    <?php
			       foreach($centrocusto as $centro)
				{
				    echo "<option id='".$centro['Centrocusto']['id']."' data-limite='".$centro['Centrocusto']['limite']."' data-limite_usado='".$centro['Centrocusto']['limite_usado']."' value='".$centro['Centrocusto']['nome']."' >";
				    echo $centro['Centrocusto']['nome'];
				    echo "</option>";
				}
			    ?>
		    </select>
		</div>
	</div>
	    
	<?php
		echo $this->Form->input('descricao',array('label' => 'Observação:', 'type' => 'textarea','class' => 'textAreaConta','tabindex' => '104'));
	?>

	</section>
		
	<section class="coluna-central" >
		<?php		
		    echo $this->Form->input('data_emissao',array('type'=>'text','label'=>'Data de Emissão<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno obrigatorio desabilita forma-data','tabindex' => '101'));
		    echo '<span id="msgDataEmissao" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Emissão</span>';
		    echo '<span id="msgDataEmissaoInvalida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>';
		    echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'hidden','value'=>'A PAGAR'));
		    echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','class'=>'nomeParceiro tamanho-medio borderZero','allowEmpty' => 'false','readonly'=>'readonly','title'=>'Campo Obrigatório','onfocus' => 'this.blur()'));		
		    echo  $this->Form->input('tipodeconta_id', array('type' => 'hidden'));
		    echo $this->Form->input('tipoconta', array('id'=>'tipoConta','type'=>'text','label'=>'Tipo Conta:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
		    echo $this->Form->input('centrocusto', array('id'=>'nomeCusto','type'=>'text','label'=>'N. Custo:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
		    //echo $this->Form->input('imagem',array('label'=>'Imagem','class'=>'tamanho-medio desabilita'));
		    echo $this->Form->input('valor',array('type'=>'text','label'=>'Valor Total:','class'=>'tamanho-medio clickValor dinheiro_duasCasas borderZero ContaspagarValor','readonly'=>'readonly','onFocus'=>'this.blur();'));
		    echo $this->Form->input('cpf_cnpj', array('type'=>'text','class'=>'borderZero tamanho-medio ','label'=>'CPF/CNPJ:','readonly'=>'readonly','onfocus' => 'this.blur()'));
		    echo  $this->Form->input('parceirodenegocio_id', array('type' => 'hidden'));
			echo  $this->Form->input('status', array('type' => 'hidden', 'value' => 'VERDE'));
		?>
		
		<div class="centrocusto">
		<?php
			echo  $this->Form->input('centrocusto_id', array('type' => 'hidden'));
		   // echo $this->Form->input('centrocusto', array('id'=>'limitecusto','type'=>'text','label'=>'Limite:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
		   // echo $this->Form->input('centrocusto', array('id'=>'limite_usado','type'=>'text','label'=>'Limite Atual:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
		
		?>
		</div>
	
	</section>
</section><!---Fim section superior--->

<section> <!---section meio--->

	<header>Dados da(s) Parcela(s)</header>

	<section class="coluna-esquerda">
		<?php
		echo $this->Form->input('Pagamento.0.tipo_pagamento',array('label'=>'Tipo de Pagamento<span class="campo-obrigatorio">*</span>:','type' => 'select','class'=>'desabilita obrigatorio','tabindex' => '105','options'=>array('A Vista' =>'A Vista' ,'A Prazo' =>'A Prazo')));
		echo '<span id="msgTipoPagamento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Tipo Pagamento</span>';	
		?>
	</section>
	
	<section class="coluna-central">
		<?php

		echo $this->Form->input('Pagamento.0.forma_pagamento',array('type'=>'select','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita','tabindex' => '106', 'options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEBITO' => 'Débito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));

		?>	
	</section>
	
	<section class="coluna-direita">
		<?php
		echo $this->Form->input('Pagamento.0.numero_parcela',array('type'=>'text','label'=>'Numero de Parcelas:','class'=>'tamanho-pequeno desabilita borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' => '0'));	
		?>
	</section>
</section><!--fim Meio-->

	<div class="fieldset tela-resultado-field">	
		<section class="coluna-esquerda">
			<?php
			echo $this->Form->input('parcela_parcela',array('type'=>'text','label'=>'Parcela:','id' => 'ContaspagarParcela','class'=>'tamanho-pequeno desabilita borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));	
			echo $this->Form->input('valor_parcela',array('type'=>'text','label'=>'Valor<span class="campo-obrigatorio">*</span>:','id' => 'valorPagar','class'=>'tamanho-pequeno dinheiro_duasCasas desabilita obrigatorio','tabindex' => '109'));
			echo '<span id="msgContaValor" class="Msg-tooltipDireita" style="display:none">Preencha o campo Valor</span>';	
			echo $this->Form->input('agencia_parcela',array('type'=>'text','label'=>'Agência:','id' => 'ContaspagarAgencia','class'=>'tamanho-pequeno desabilita','tabindex' => '112','maxlength' => '25'));
			?>
		</section>

		<section class="coluna-central">
			<?php
				echo $this->Form->input('identificacao_documento_parcela',array('label' => 'Identificação:','id' => 'identificacaoPagar','class' => 'tamanho-medio desabilita','tabindex' => '107'));
				echo $this->Form->input('conta_parcela',array('type'=>'text','label'=>'Conta:','id' => 'ContaspagarConta','class'=>'tamanho-pequeno desabilita','tabindex' => '110'));
				echo $this->Form->input('periodocritico_parcela',array('label' => 'Periodo Crítico<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno desabilita obrigatorio Nao-Letras','id' =>'PagarPeriodocritico','tabindex' => '113','maxlength' => '25'));
				echo '<span id="msgPeriodoCritico" class="Msg-tooltipDireita" style="display:none">Preencha o campo Periodo Critico</span>';
			?>	
		</section>

		<section class="coluna-direita">
			<?php
				echo $this->Form->input('data_vencimento_parcela',array('type'=>'text','label'=>'Data de Vencimento<span class="campo-obrigatorio">*</span>:','id' => 'ContaspagarDataVencimento','class'=>'tamanho-pequeno desabilita obrigatorio forma-data','tabindex' => '108'));
				echo '<span id="msgDataVencimento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Vencimento</span>';
				echo '<span id="msgDataVencimentoInvalida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>';	
				echo $this->Form->input('desconto_parcela',array('type'=>'text','label'=>'Desconto:','id' => 'ContaspagarDesconto','class'=>'tamanho-pequeno desabilita dinheiro_duasCasas','tabindex' => '111'));	
				echo $this->Form->input('banco_parcela',array('type'=>'text','label'=>'Banco:','id' => 'ContaspagarBanco','class'=>'tamanho-medio desabilita','tabindex' => '114','maxlength' => '50'));					
			?>
		</section>
		
		<?php
			echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
											'title'=>'Adicionar',
											'class'=>'bt-direita',
											'id'=>'bt-adicionarConta-pagar'
			));
			echo $this->html->image('botao-concluir-edicao.png',array('alt'=>'Editar',
						 'title'=>'Editar Conta',
						 'id'=>'bt-editarConta-pagar',
						 'class'=>'bt-direita'
			));

			echo '<span id="msgValidaParcela" class="Msg-tooltipDireita" style="display:none">Adicione parcelas a tabela</span>';  
		?>		
	</div>
</div>	
	
	<div>
		<table id="tabela-conta-pagar" cellpadding="0" cellspacing="0">
			<thead>
					<th><?php echo ('Parcela'); ?></th>
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
	
	    <div style="border:none; dispĺay: block;">
			<section class="coluna-direita">
			<?php
				echo $this->Form->input('valor',array('type'=>'text','label'=>'Valor Total:','class'=>'tamanho-medio clickValor dinheiro_duasCasas borderZero ContaspagarValor','readonly'=>'readonly','onFocus'=>'this.blur();'));
				
				echo $this->html->image('botao-confirmar.png',array(
										'alt'=>'Confirmar',
										'title'=>'Confirmar',
										'id'=>'bt-confirmarPagar',
										'class'=>'bt-confirmar'
				));
			?>
			</section>
	    </div>
	    
	    <?php
	
	    echo $this->form->submit('botao-salvar.png',array(
							    'class'=>'bt-salvarConta',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'id'=>'btn-salvarContaPagar'
	    ));
	
	    echo $this->html->image('voltar.png',array(
						    'alt'=>'Voltar',
						    'title'=>'Voltar',
						    'id'=>'bt-voltarPagar',
						    'class'=>'bt-voltar voltar'
	    ));
	    ?>
	
	    <?php
	    echo $this->Form->end();
	?>	

	<!-- </form> 
	</section> -->
</footer>
