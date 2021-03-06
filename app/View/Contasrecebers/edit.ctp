<?php	    
	$this->start('css');
	    echo $this->Html->css('contas_pagar');
	    echo $this->Html->css('table');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
	$this->start('script');
	    echo $this->Html->script('funcoes_contas_pagar_edit.js');
	    echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	$this->end();

	$this->start('modais');
	    echo $this->element('parceirodeNegoicos_add',array('modal'=>'add-parceiroFornecedor'));
	    echo $this->element('centro_custo',array('modal'=>'add-centro_custo'));
	    echo $this->element('tipo_conta',array('modal'=>'add-tipodeConta'));
	$this->end();
	
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}else{
			$data= " / / ";
		}
		return $data;
	}

?>

<div class="fieldset-total" style="border:none">
	
<header>

<script>
	$(document).ready(function(){			
		$('#TipodecontaTipo').val("RECEITA");		
	});
</script>


	<?php echo $this->Html->image('emitir-title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption33">Editar Conta a Receber</h1>
</header>

<section> <!---section superior--->

	<header>Editar Dados Gerais da Movimentação</header>

	<section class="coluna-esquerda">
		<?php
			
			echo $this->Form->create('Contasreceber');
			echo $this->Form->input('Contasreceber.id',array('value'=> $contareceber['Contasreceber']['id'],'type' => 'hidden'));
			echo $this->Form->input('Contasreceber.identificacao',array('value'=>h($contareceber['Contasreceber']['identificacao']),'type'=>'text','label'=>'Identificação:','class'=>'tamanho-medio desabilita','tabindex' => '1','maxlength'=>'150'));
		    echo $this->Form->input('Contasreceber.status',array('label' => 'Status:','value' => h($contareceber['Contasreceber']['status']),'type' => 'hidden'));
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
		    <label id="SpanPesquisarFornecedor">Buscar Fornecedor:</label>
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
		echo $this->Form->input('descricao',array('value'=>h($contareceber['Contasreceber']['descricao']),'label' => 'Observação:', 'type' => 'textarea','class' => 'textAreaConta','tabindex' => '104'));
	?>

	</section>
		
	<section class="coluna-central" >
		<?php		
			formatDateToView($contareceber['Contasreceber']['data_emissao']);
			
		    echo $this->Form->input('data_emissao',array('value'=>h($contareceber['Contasreceber']['data_emissao']),'type'=>'text','label'=>'Data de Emissão<span class="campo-obrigatorio">*</span>:','class'=>'Emissao tamanho-pequeno obrigatorio desabilita inputData','tabindex' => '101'));
		    echo '<span id="msgDataEmissao" class="Msg-tooltipDireita" style="display:none">Preencha o campo Data de Emissão</span>';
		    echo '<span id="msgDataEmissaoInvalida" class="Msg-tooltipDireita" style="display:none">Preencha a data corretamente</span>';
		  
		    echo $this->Form->input('tipo',array('value'=>h($contareceber['Contasreceber']['tipo']),'label' => 'Tipo:','type' => 'hidden'));
		    echo $this->Form->input('nome', array('value'=>h($contareceber['Parceirodenegocio']['nome']),'type'=>'text','label'=>'Nome:','class'=>'nomeParceiro tamanho-medio borderZero','allowEmpty' => 'false','readonly'=>'readonly','title'=>'Campo Obrigatório','onfocus' => 'this.blur()'));		
		    echo $this->Form->input('tipoconta', array('value'=>h($contareceber['Tipodeconta']['nome']),'id'=>'tipoConta','type'=>'text','label'=>'Tipo Conta:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
		    echo $this->Form->input('centrocusto', array('value'=>h($contareceber['Centrocusto']['nome']),'id'=>'nomeCusto','type'=>'text','label'=>'N. Custo:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
			
			//CAMPOS HIDDEN ID
			echo  $this->Form->input('tipodeconta_id', array('type' => 'hidden'));
		    echo  $this->Form->input('centrocusto_id', array('type' => 'hidden'));
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
		  	
		    //echo $this->Form->input('imagem',array('label'=>'Imagem','class'=>'tamanho-medio desabilita'));
		    echo $this->Form->input('valor',array('value'=>h(number_format($contareceber['Contasreceber']['valor'], 2, ',', '.')),'type'=>'text','label'=>'Valor Total:','class'=>'tamanho-medio clickValor dinheiro_duasCasas borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
		    echo $this->Form->input('cpf_cnpj', array('value'=>h($contareceber['Parceirodenegocio']['cpf_cnpj']),'type'=>'text','class'=>' borderZero tamanho-medio ','label'=>'CPF/CNPJ:','readonly'=>'readonly','onfocus' => 'this.blur()'));
		    echo  $this->Form->input('parceirodenegocio_id', array('type' => 'hidden'));
			echo  $this->Form->input('status', array('type' => 'hidden', 'value' => 'VERDE'));
		?>
		
		<div class="centrocusto">
		<?php
			
		   // echo $this->Form->input('centrocusto', array('id'=>'limitecusto','type'=>'text','label'=>'Limite:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
		   // echo $this->Form->input('centrocusto', array('id'=>'limite_usado','type'=>'text','label'=>'Limite Atual:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()'));
		
		?>
		</div>
	
	</section>
</section><!---Fim section superior--->

<section> <!---section meio--->

	<header>Editar Dados da(s) Parcela(s)</header>

	<section class="coluna-esquerda">
		<?php
		foreach($contareceber['Pagamento'] as $pagamento){
				$idPagamento = $pagamento['id'];
				echo $this->Form->input('Pagamento.'.$idPagamento.'.id',array('value'=>$pagamento['id'],'type'=>'hidden'));
				echo $this->Form->input('Pagamento.'.$idPagamento.'.parceirodenegocio_id',array('value'=>$contareceber['Contasreceber']['parceirodenegocio_id'],'type'=>'hidden'));
				//echo $this->Form->input('Pagamento.'.$idPagamento.'.tipo_pagamento',array('label'=>'Tipo de Pagamento<span class="campo-obrigatorio">*</span>:','type' => 'select','class'=>'desabilita obrigatorio','tabindex' => '105','options'=>array('A Vista' =>'A Vista' ,'A Prazo' =>'A Prazo')));
				echo $this->Form->input('vazio',array('label'=>'Tipo de Pagamento:','type' => 'text','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onfocus' => 'this.blur()','value'=>$pagamento['tipo_pagamento']));
				?>
			</section>
			
			<section class="coluna-central">
				<?php

				echo $this->Form->input('Pagamento.'.$idPagamento.'.forma_pagamento',array('type'=>'select','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita','tabindex' => '106','default' => $pagamento['forma_pagamento'], 'options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEPOSITO' => 'Depósito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));

				?>	
			</section>
			
			<section class="coluna-direita">
				<?php
				echo $this->Form->input('Pagamento.'.$idPagamento.'.numero_parcela',array('type'=>'text','label'=>'Numero de Parcelas:','class'=>'tamanho-pequeno desabilita borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' => $pagamento['numero_parcela']));	
				?>
			</section>
	<?php
		}
		?>
</section><!--fim Meio-->
	
	<div>
		<table id="tabela-conta-pagar" cellpadding="0" cellspacing="0">
			<thead>
					<th><?php echo ('Parcela'); ?></th>
					<th><?php echo ('Vencimento'); ?></th>
					<th><?php echo ('Pagamento'); ?></th>
					<th><?php echo ('Valor'); ?></th>
					<th><?php echo ('Juros'); ?></th>
					<th><?php echo ('Identificação'); ?></th>
					<th><?php echo ('Periodo Crítico'); ?></th>
					<th><?php echo ('Desconto'); ?></th>
					<th><?php echo ('Duplicata'); ?></th>
					<th><?php echo ('Obs Pagto.'); ?></th>
					<th class="actions"><span id='msgFlag' class='Msg tooltipMensagemErroTopo' style='display:none'>Conclua as Ediçoes</span><?php echo __('Ações'); ?></th>
			</thead>
			
			<?php
				$princ_cont = 0;
				$tab = 5;
					
				foreach($contareceber['Parcela'] as $parcelareceber){
						if($parcelareceber['status'] == "CINZA"){ //VERIFICA SE A PARCELA FOI QUITADA 
							echo $this->Form->input('Parcela.'.$princ_cont.'.id',array('value'=>$parcelareceber['id'],'type'=>'hidden'));
							echo "<tr class=\"linhaParcela$princ_cont\">";
							
								echo "<td>". $parcelareceber['parcela']."</td>";
								
									formatDateToView($parcelareceber['data_vencimento']);
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.data_vencimento',array('value'=>$parcelareceber['data_vencimento'],'type'=>'text','label'=>'','id' => 'ContaspagarDataVencimento'.$princ_cont,'class'=>'vencimento'.$princ_cont.'  inputData tamanho-pequeno borderZero','tabindex' => ''. $tab+1 .'','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
									echo '<span id="msgDataVazia'.$princ_cont.'" class="Msg-tooltipDireita" style="display:none;left: 160px;width: 133px;">Preencha a Data de Vencimento</span>';  
									echo '<span id="msgValidaDataVencimento'.$princ_cont.'" class="Msg-tooltipDireita" style="display:none;left: 160px;width: 133px;">Data de Vencimento não pode ser Menor que a de Emissão</span>';  

								echo "</td>";
								
									formatDateToView($parcelareceber['data_pagamento']);
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.data_pagamento',array('value'=>$parcelareceber['data_pagamento'],'type'=>'text','label'=>'','id' => 'ContaspagarDataPagamento'.$princ_cont,'class'=>'inputData tamanho-pequeno borderZero inputData','tabindex' => '108','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
								echo "</td>";
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.valor',array('value'=>number_format( $parcelareceber['valor'], 2, ',', '.'),'type'=>'text','label'=>'','id' => 'valorPagar'.$princ_cont,'class'=>'valorParcelaSoma tamanho-pequeno dinheiro_duasCasas borderZero','tabindex' => '109','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
									echo '<span id="msgValorVazia'.$princ_cont.'" class="Msg-tooltipDireita" style="display:none;left: 355px;width: 133px;">O valor da Parcela não Pode ser Zero</span>';  
								echo "</td>";
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.juros',array('value'=>number_format($parcelareceber['juros'], 2, ',', '.'),'type'=>'text','label'=>'','id' => 'valorJuros'.$princ_cont,'class'=>'valorJurosSoma tamanho-pequeno dinheiro_duasCasas borderZero','tabindex' => '109','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
								echo "</td>";
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.identificacao_documento',array('value'=>$parcelareceber['identificacao_documento'],'label' => '','id' => 'documento'.$princ_cont,'class' => 'tamanho-pequeno borderZero','tabindex' => '110','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
								echo "</td>";

								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.periodocritico',array('value'=>$parcelareceber['periodocritico'],'label' => '','class' => 'tamanho-pequeno Nao-Letras borderZero','id' =>'critico'.$princ_cont,'tabindex' => '115','maxlength' => '25','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));						
								echo "</td>";
								
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.desconto',array('value'=>number_format($parcelareceber['desconto'], 2, ',', '.'),'type'=>'text','label'=>'','id' => 'desconto'.$princ_cont,'class'=>'valorDesconto tamanho-pequeno dinheiro_duasCasas borderZero','tabindex' => '109','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));					 
								echo "</td>";
								
								echo "<td>";
									if($parcelareceber['duplicata'] == 1){
										//echo $this->Form->input('Parcela.'.$princ_cont.'.duplicata',array('value'=>$parcelaspagar['duplicata'],'type'=>'text','label'=>'','id' => 'obs'.$princ_cont,'class'=>'tamanho-pequeno desabilita borderZero','tabindex' => ''. $tab+10 .'','maxlength' => '25','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
										echo $this->Form->input('vazio.duplicata', array(
																			'label' => '', 'id' => 'dupli'.$princ_cont,
																			'type' => 'select',
																			'class'=>'tamanho-pequeno  borderZero',
																			'allowEmpty' => 'false', 'disabled'=>'disabled','readonly'=>'readonly', 'onFocus'=>'this.blur();',				
																			'default'=>array('1'=>'Ok'), 'options' => array('1' => 'Ok', '0' => 'Dupli')   
																		));
									}else if($parcelareceber['duplicata'] == 0){
										echo $this->Form->input('vazio.duplicata', array(
																			'label' => '', 'id' => 'dupli'.$princ_cont,
																			'type' => 'select',
																			'class'=>'tamanho-pequeno borderZero',
																			'allowEmpty' => 'false', 'disabled'=>'disabled', 'readonly'=>'readonly', 'onFocus'=>'this.blur();',				
																			'default'=>array('0'=>'Dupli'), 'options' => array('0' => 'Dupli','1' => 'Ok')   
																		));
									}
									echo $this->Form->input('Parcela.'.$princ_cont.'.duplicata',array('type'=>'hidden','id'=>'duplica'.$princ_cont));
								echo "</td>";	
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.descricao',array('value'=>$parcelareceber['descricao'],'type'=>'text','label'=>'','id' => 'descri'.$princ_cont,'class'=>'tamanho-pequeno desabilita borderZero','maxlength' => '254','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
								echo "</td>";
							
								echo "<td>";
									echo $this->Html->image('botao-tabela-editar.png', array('id' => 'btnEditar'.$princ_cont, 'class'=>'btnEditar', 'alt' => 'Editar', 'title' => 'Editar'));
									echo $this->Html->image('bt-confirm.png', array('id' => 'btnEditarOk'.$princ_cont, 'class'=>'btnEditarOk', 'alt' => 'Concluir', 'title' => 'Concluir','style'=>'display:none'));							
								echo "</td>";										
							echo "</tr>";
							$princ_cont++;	
							
						}else{ //PARCELA QUE NAO FOI QUITADA NAO PODE EDITAR DATA DE PAGAMENTO
							
							echo $this->Form->input('Parcela.'.$princ_cont.'.id',array('value'=>$parcelareceber['id'],'type'=>'hidden'));
							echo "<tr class=\"linhaParcela$princ_cont\">";
							
								echo "<td>". $parcelareceber['parcela']."</td>";
								
									formatDateToView($parcelareceber['data_vencimento']);
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.data_vencimento',array('value'=>$parcelareceber['data_vencimento'],'type'=>'text','label'=>'','id' => 'ContaspagarDataVencimento'.$princ_cont,'class'=>'vencimento'.$princ_cont.'  inputData tamanho-pequeno borderZero','tabindex' => ''. $tab+1 .'','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
									echo '<span id="msgDataVazia'.$princ_cont.'" class="Msg-tooltipDireita" style="display:none;left: 160px;width: 133px;">Preencha a Data de Vencimento</span>';  
									echo '<span id="msgValidaDataVencimento'.$princ_cont.'" class="Msg-tooltipDireita" style="display:none;left: 160px;width: 133px;">Data de Vencimento não pode ser Menor que a de Emissão</span>';  

								echo "</td>";
								
									formatDateToView($parcelareceber['data_pagamento']);
								echo "<td>";
									//echo $parcelareceber['data_pagamento'];
								echo "</td>";
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.valor',array('value'=>number_format( $parcelareceber['valor'], 2, ',', '.'),'type'=>'text','label'=>'','id' => 'valorPagar'.$princ_cont,'class'=>'valorParcelaSoma tamanho-pequeno dinheiro_duasCasas borderZero','tabindex' => '109','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
									echo '<span id="msgValorVazia'.$princ_cont.'" class="Msg-tooltipDireita" style="display:none;left: 355px;width: 133px;">O valor da Parcela não Pode ser Zero</span>';  
								echo "</td>";
								
								echo "<td>";
									//echo number_format($parcelareceber['juros'], 2, ',', '.');
								echo "</td>";
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.identificacao_documento',array('value'=>$parcelareceber['identificacao_documento'],'label' => '','id' => 'documento'.$princ_cont,'class' => 'tamanho-medio borderZero','tabindex' => '110','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
								echo "</td>";

								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.periodocritico',array('value'=>$parcelareceber['periodocritico'],'label' => '','class' => 'tamanho-pequeno Nao-Letras borderZero','id' =>'critico'.$princ_cont,'tabindex' => '115','maxlength' => '25','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));						
								echo "</td>";
								
								
								echo "<td>";
									echo $this->Form->input('Parcela.'.$princ_cont.'.desconto',array('value'=>number_format($parcelareceber['desconto'], 2, ',', '.'),'type'=>'text','label'=>'','id' => 'desconto'.$princ_cont,'class'=>'valorDesconto tamanho-pequeno dinheiro_duasCasas borderZero','tabindex' => '109','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));					 
								echo "</td>";
								
								echo "<td>";
									if($parcelareceber['duplicata'] == 1){
										//echo $this->Form->input('Parcela.'.$princ_cont.'.duplicata',array('value'=>$parcelaspagar['duplicata'],'type'=>'text','label'=>'','id' => 'obs'.$princ_cont,'class'=>'tamanho-pequeno desabilita borderZero','tabindex' => ''. $tab+10 .'','maxlength' => '25','allowEmpty' => 'false','readonly'=>'readonly','onFocus'=>'this.blur();'));
										echo $this->Form->input('vazio.duplicata', array(
																			'label' => '', 'id' => 'dupli'.$princ_cont,
																			'type' => 'select',
																			'class'=>'tamanho-pequeno  borderZero',
																			'allowEmpty' => 'false', 'disabled'=>'disabled','readonly'=>'readonly', 'onFocus'=>'this.blur();',				
																			'default'=>array('1'=>'Ok'), 'options' => array('1' => 'Ok', '0' => 'Dupli')   
																		));
									}else if($parcelareceber['duplicata'] == 0){
										echo $this->Form->input('vazio.duplicata', array(
																			'label' => '', 'id' => 'dupli'.$princ_cont,
																			'type' => 'select',
																			'class'=>'tamanho-pequeno borderZero',
																			'allowEmpty' => 'false', 'disabled'=>'disabled', 'readonly'=>'readonly', 'onFocus'=>'this.blur();',				
																			'default'=>array('0'=>'Dupli'), 'options' => array('0' => 'Dupli','1' => 'Ok')   
																		));
									}
									echo $this->Form->input('Parcela.'.$princ_cont.'.duplicata',array('type'=>'hidden','id'=>'duplica'.$princ_cont));
								echo "</td>";	
								
								echo "<td>";
									//echo $parcelareceber['descricao'];
								echo "</td>";
							
								echo "<td>";
									echo $this->Html->image('botao-tabela-editar.png', array('id' => 'btnEditar'.$princ_cont, 'class'=>'btnEditar', 'alt' => 'Editar', 'title' => 'Editar'));
									echo $this->Html->image('bt-confirm.png', array('id' => 'btnEditarOk'.$princ_cont, 'class'=>'btnEditarOk', 'alt' => 'Concluir', 'title' => 'Concluir','style'=>'display:none'));							
								echo "</td>";										
							echo "</tr>";
							$princ_cont++;	
							
						}
				}
			?>			
			
		</table>
	</div>

<footer>
		
	<?php
	
	    echo $this->form->submit('botao-salvar.png',array(
							    'class'=>'bt-salvarEditConta',
							    'alt'=>'Salvar Edição',
							    'title'=>'Salvar Edição',
							    'id'=>'btn-salvarEditPagar'
	    ));

	    echo $this->Form->end();	
	?>	

	<!-- </form> 
	</section> -->
</footer>


