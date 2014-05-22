<?php	    
	$this->start('css');
		echo $this->Html->css('contas_receber');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_contas_receber.js');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	$this->end();

	$this->start('modais');
		echo $this->element('parceirodeNegoicos_add',array('modal'=>'add-parceiroCliente'));
		echo $this->element('centro_custo',array('modal'=>'add-centro_custo'));
		echo $this->element('tipo_conta',array('modal'=>'add-tipodeConta'));
	$this->end();	
?>

<script>
	$(document).ready(function() {
	 	$("#ContasreceberIdentificacao").change(function(){
		
			var urlAction = "<?php echo $this->Html->url(array("controller" => "Contasrecebers", "action" => "verificaidentificacao"),true);?>";
			
		    var dadosForm = $("#ContasreceberAddForm").serialize();
		    
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
				echo $this->Form->input('identificacao',array('id' => 'ContasreceberIdentificacaoConta', 'label' => 'Identificação<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio desabilita','tabindex' => '100','maxlength'=>'50'));
				echo '<span id="msgIdentificacaoConta" class="msg erroTop" style="display:none">Preencha o campo Identificação</span>';
			?>

			<span id="msgValidaIdentificacao" class="Msg tooltipMensagemErroTopo" style="display:none">Identificacao existente</span>
			<span id="msgValidaIdentificacao2" class="Msg tooltipMensagemErroTopo" style="display:none">Identificacao liberada para cadastro</span>
			<div class="loaderAjaxIdentificacao" style="display:none">

				<?php echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando','title'=>'Carregando','class'=>'loaderAjaxCategoria',)); ?>
				
				<span>Verificando aguarde...</span>
			</div>

			<?php
				echo $this->Form->input('status',array('label' => 'Status:','value' => 'VERDE','type' => 'hidden'));
				echo $this->Form->input('user_id',array('type' => 'hidden','value' => $userid));
			?>
			
			<!-- CLIENTE -->
			<div class="tela-resultado">   
				
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher Cliente','class'=>'bt-preencherConta','id'=>'bt-preencherCliente')); ?>
				
				<div class="input autocompleteCliente contas">
					<span id="msgValidaParceiro" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Cliente</span>
					<label>Buscar Cliente<span class="campo-obrigatorio">*</span>:</label>
					<select class="tamanho-medio" id="add-cliente">
						<option id="optvazioForn"></option>
						<option value="add-parceiroCliente">Cadastrar</option>

						<?php
							foreach($parceirodenegocios as $parceirodenegocio){
								echo "<option id='".$parceirodenegocio['Parceirodenegocio']['nome']."' class='".$parceirodenegocio['Parceirodenegocio']['cpf_cnpj']."' rel='".$parceirodenegocio['Parceirodenegocio']['tipo']."' value='".$parceirodenegocio['Parceirodenegocio']['id']."' >";
								echo $parceirodenegocio['Parceirodenegocio']['nome'];
								echo "</option>";
							}
						?>

					</select>
				</div>
			</div>

			<!-- TIPO DE CONTA -->	
			<div class="tela-resultado">   
				
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher Tipo de Conta','class'=>'bt-TipoConta','id'=>'bt-preencherTipoConta')); ?>
				
				<div class="input autocompleteTipoConta contas">
					<label>Tipo de Conta:</label>
					<select class="tamanho-medio" id="add-tipoConta">
						<option id="optvazioForn"></option>
						<option value="add-tipodeConta">Cadastrar</option>
						
						<?php
							foreach($tipoconta as $tipoConta){	
								if($tipoConta['Tipodeconta']['tipo'] == "RECEITA"){
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
				
				<?php echo $this->html->image('preencher2.png',array('alt'=>'Preencher','title'=>'Preencher Centro de Custo','class'=>'bt-centroCusto','id'=>'bt-preencherCentreCusto')); ?>		
				
				<div class="input autocompleteCentroCusto contas">
					<label>Centro de Custo:</label>
					<select class="tamanho-medio" id="add-custo">
						<option id="optvazioForn"></option>
						<option value="add-centroCusto">Cadastrar</option>
						<?php
						   foreach($centrocusto as $centro){
								echo "<option id='".$centro['Centrocusto']['id']."' data-limite='".$centro['Centrocusto']['limite']."' data-limite_usado='".$centro['Centrocusto']['limite_usado']."' value='".$centro['Centrocusto']['nome']."' >";
								echo $centro['Centrocusto']['nome'];
								echo "</option>";
							}
						?>
					</select>
				</div>
			</div>
		
			<?php echo $this->Form->input('descricao',array('label' => 'Observação:', 'type' => 'textarea','class' => 'textAreaConta','tabindex' => '103','maxlength' => '100')); ?>
		
	    </section>

	    <section class="coluna-central" >

			<?php 
				echo $this->Form->input('data_emissao',array('label' => 'Data de Emissão<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno obrigatorio desabilita inputData','tabindex' => '101'));
				echo '<span id="msgDataEmissao" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Emissão</span>';
				echo '<span id="msgDataEmissaoInvalida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>';
				echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'hidden','value'=>'A RECEBER'));
				echo $this->Form->input('parceiro', array('type'=>'text','label'=>'Nome:','class'=>'nomeParceiro tamanho-medio borderZero','readonly'=>'readonly','title'=>'Campo Obrigatório','onfocus' => 'this.blur()'));
				echo  $this->Form->input('tipodeconta_id', array('type' => 'hidden'));
				echo $this->Form->input('tipoconta', array('id'=>'tipoConta','type'=>'text','label'=>'Tipo Conta:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
				echo $this->Form->input('centrocusto', array('id'=>'nomeCusto','type'=>'text','label'=>'N. Custo:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
			?>

	    </section>

	    <section class="coluna-direita" >
			
			<?php
				echo $this->Form->input('valor',array('label' => 'Valor Total:','class' => 'tamanho-medio clickValor dinheiro_duasCasas borderZero ContasreceberValor','readonly'=>'readonly','onFocus'=>'this.blur();', 'type' => 'text'));
				echo $this->Form->input('cpf_cnpj', array('type'=>'text','class'=>'borderZero tamanho-medio','label'=>'CPF/CNPJ:','readonly'=>'readonly','onfocus' => 'this.blur()'));
				echo  $this->Form->input('parceirodenegocio_id', array('type' => 'hidden'));
				echo  $this->Form->input('status', array('type' => 'hidden', 'value' => 'VERDE'));
			?>
			
			<div class="centrocusto">

				<?php echo  $this->Form->input('centrocusto_id', array('type' => 'hidden')); ?>

			</div>
		</section>
	</section><!---Fim section superior--->

    <section> <!---section BAIXO--->
	    <header class="">Dados da(s) Parcela(s)</header>
		    
	    <section class="coluna-esquerda">
			
			<?php 
				echo $this->Form->input('Pagamento.0.tipo_pagamento',array('label'=>'Tipo de Pagamento<span class="campo-obrigatorio">*</span>:','type' => 'select','class'=>'desabilita obrigatorio desabilidado','tabindex' => '104', 'options'=> array('A Vista' =>'A Vista' ,'A Prazo' =>'A Prazo')));
				echo '<span id="msgTipoPagamento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Tipo Pagamento</span>';
			?>
			
	    </section>

	    <section class="coluna-central" >
			
			<?php echo $this->Form->input('Pagamento.0.forma_pagamento',array('label' => 'Forma de Pagamento:','class' => 'tamanho-pequeno desabilita', 'type' => 'select' ,'tabindex' => '105', 'options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEBITO' => 'Débito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale'))); ?>    
	    
	    </section>

	    <section class="coluna-direita" >
		
			<?php echo $this->Form->input('Pagamento.0.numero_parcela',array('label' => 'Número de Parcelas:','class' => 'tamanho-pequeno desabilita borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()', 'type' => 'text','value' => '0')); ?>
	    
	    </section>
    </section><!--fim BAIXO-->

    <div class="fieldset tela-resultado-field">
	    <section class="coluna-esquerda">

			<?php
				echo $this->Form->input('parcela_parcela',array('label' => 'Parcela:','id' =>'ContasreceberParcela','class' => 'tamanho-pequeno desabilita borderZero','readonly' => 'readonly', 'onfocus' => 'this.blur()'));
				echo $this->Form->input('valor_parcela',array('label' => 'Valor<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno obrigatorio desabilita dinheiro_duasCasas','id' => 'valorConta-receber', 'type' => 'text','tabindex' => '108'));
				echo '<span id="msgContaValor" class="Msg-tooltipDireita" style="display:none">Preencha o campo Valor</span>';	
				 
				echo $this->Form->input('duplicata_parcela', array('label' => 'Duplicata<span class="campo-obrigatorio">*</span>:', 'id' => 'ContasreceberDupli','type' => 'select','class'=>'tamanho-pequeno ','options' => array('vazio'=>'','1' => 'Ok', '0' => 'Dupli')));
				echo '<span id="msgDuplicata" class="Msg-tooltipDireita" style="display:none;top:55px;">Selecione a Duplicata</span>';
			?>
			
	    </section>

	    <section class="coluna-central" >
			
			<?php
				//echo $this->Form->input('codigodebarras_parcela',array('label' => 'Código de Barras:','id' => 'ContasreceberCodigodeBarras','class' => 'tamanho-medio desabilita','maxlength' => '46','tabindex' => '106'));
				echo $this->Form->input('identificacao_documento_parcela',array('label' => 'Identificação<span class="campo-obrigatorio">*</span>:','id' => 'ContasreceberIdentificacaoDocumento','class' => 'tamanho-medio desabilita','tabindex' => '106','maxlength'=>'50'));		   
				echo '<span id="msgIdentificacaoParcela" class="Msg-tooltipDireita" style="display:none;left:313px;z-index:1;">Preencha o campo Identificação</span>';
				echo $this->Form->input('desconto_parcela',array('label' => 'Desconto:','id' => 'ContasreceberDesconto','class' => 'tamanho-pequeno desabilita dinheiro_duasCasas','tabindex' => '110'));
			?>
			
	    </section>

	    <section class="coluna-direita" >
			
			<?php
				echo $this->Form->input('data_vencimento_parcela',array('label' => 'Data de vencimento<span class="campo-obrigatorio">*</span>:', 'type' => 'text','class' => 'tamanho-pequeno obrigatorio desabilita inputData','id' => 'dataVencimento-receber','tabindex' => '107'));
				echo '<span id="msgDataVencimento" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Vencimento</span>';
				echo '<span id="msgDataVencimentoInvalida" class="Msg-tooltipDireita" style="display:none">Data de Vencimento não pode ser menor que Data de Emissão</span>';
				echo $this->Form->input('periodocritico_parcela',array('label' => 'Período Crítico<span class="campo-obrigatorio">*</span>:','id' => 'ContasreceberPeriodocritico','class' => 'obrigatorio tamanho-pequeno desabilita Nao-Letras','tabindex' => '112','maxlength' => '25'));
				echo '<span id="msgPeriodoCritico" class="Msg-tooltipDireita" style="display:none">Preencha o campo Periodo Critico</span>';

			?>
		
	    </section>
	    
	    <?php
			echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar','title'=>'Adicionar Conta','id'=>'bt-adicionarConta-receber','class'=>'bt-direita'));
			echo $this->html->image('botao-concluir-edicao.png',array('alt'=>'Editar','title'=>'Editar Conta','id'=>'bt-editarConta-receber','class'=>'bt-direita'));
			echo '<span id="msgValidaParcela" class="Msg-tooltipDireita" style="display:none">Adicione parcelas a tabela</span>';  
	    ?>
    </div>
</div>

<div>
	<table id="tabela-conta-receber" cellpadding="0" cellspacing="0">
	    <thead>
		
			<th><?php echo ('Parcela'); ?></th>
			<th><?php echo ('Data de Vencimento'); ?></th>
			<th><?php echo ('Valor'); ?></th>
			<th><?php echo ('Identificação'); ?></th>
			<th><?php echo ('Periodo Crítico'); ?></th>
			<th><?php echo ('Desconto'); ?></th>
			<th><?php echo ('Duplicata'); ?></th>
			<th class="actions"><?php echo __('Ações'); ?></th>
		   
	    </thead>
	</table>	
</div>

<footer>
    <div style="border:none; dispĺay: block;">
		<section class="coluna-direita">
		
			<?php
				echo $this->Form->input('valor',array('type'=>'text','label'=>'Valor Total:','class'=>'tamanho-medio clickValor dinheiro_duasCasas borderZero ContasreceberValor','readonly'=>'readonly','onFocus'=>'this.blur();'));
				echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar','title'=>'Confirmar','id'=>'bt-confirmarReceber','class'=>'bt-confirmar'));
			?>

		</section>
	</div>
    
	<?php
	    echo $this->form->submit('botao-salvar.png',array('class'=>'bt-salvarConta','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarContaReceber'));
	    echo $this->html->image('voltar.png',array('alt'=>'Voltar','title'=>'Voltar','id'=>'bt-voltarReceber','class'=>'bt-voltar voltar'));

		echo $this->Form->end();
	?>
</footer>

<!-------------------- MODAL QUITAR PARCELA -------------------->
<div class="modal fade" id="myModal_add_quitar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-body">
		
		<?php echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;')); ?>

		<header id="cabecalho">
			
			<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Quitar', 'alt' => 'Quitar', 'title' => 'Quitar')); ?><h1>Quitar Parcela</h1>
			
		</header>

		<section>
			<header>Dados do Pagamento da Parcela</header>
			<section class="coluna-modal">
				<div>
					
					<?php
						echo $this->Form->input('vazio.data_pagamento', array('id'=>'vazioPagamento','class'=>'tamanho-pequeno inputData','type'=>'text', 'label'=>'Data do pagamento <span class="campo-obrigatorio">*</span>:'));
						echo '<span id="msgQuitarData" class="Msg-tooltipDireita" style="display:none;">Preencha a Data de Pagamento</span>';

						echo $this->Form->input('vazio.descricao',array('id'=>'vazioDescricao','label' => 'Observação:','class'=>'tamanho-grande','type' => 'textarea','style'=>'display: inline'));
					
						echo $this->Form->input('vazio.juros',array('id'=>'vazioJuros','label' => 'Juros:','class'=>'tamanho-grande dinheiro_duasCasas','type' => 'text', 'style'=>'display: inline'));
					?>

				</div>
			</section>
		
			<footer>

				<?php echo $this->Html->image('botao-salvar.png', array('id' =>'bt_quitaParcela','style'=>'cursor:pointer;', 'alt' => 'Quitar', 'title' => 'Quitar')); ?>								

			</footer>			 
		</section>
	</div>
</div>
