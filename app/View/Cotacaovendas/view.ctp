<?php 
	$this->start('css');
		echo $this->Html->css('table');
	    echo $this->Html->css('compras');
	    echo $this->Html->css('jquery-ui/jquery.ui.all');
	    echo $this->Html->css('jquery-ui/custom-combobox');
		echo $this->Html->css('PrintArea');
		echo $this->Html->css('modal_imprimirpedido');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('compras.js');
		echo $this->Html->script('jquery.PrintArea.js');
	$this->end();
	
	
	$this->start('modais');
	    echo $this->element('parceirodeNegoicos_add',array('modal'=>'add-parceiroFornecedor'));
	    echo $this->element('produtos_add',array('modal'=>'add-produtos'));
	    echo $this->element('categoria_add', array('modal'=>'add-categoria'));
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
	function converterMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
?>

<header>
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <h1 class="menuOption51">Consulta da Cotação</h1>
</header>

<div>
<section>
	
	<header>Dados da Empresa</header>
	
	<!-- INFORMAÇÕES DA EMPRESA-->
		
		<section class="coluna-esquerda" style="float: left;">
			<?php
				echo $this->Form->input('Vazio.nomeEmpresa',array('value'=>$empresa['Empresa']['nome_fantasia'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Nome da Empresa:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.telefone',array('value'=>$empresa['Empresa']['telefone'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Telefone:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.uf',array('value'=>$empresa['Empresa']['uf'],'disabled'=>'disabled','class'=>'tamanho-pequeno borderZero','label'=>'UF:','type'=>'text','id'=>''));
			?>
		</section>
		
		<section class="coluna-central" style="float: left;">
			<?php
				echo $this->Form->input('Vazio.cnpj',array('value'=>$empresa['Empresa']['cnpj'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'CNPJ:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.endereco',array('value'=>$empresa['Empresa']['endereco'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Endereço:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.cidade',array('value'=>$empresa['Empresa']['cidade'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Cidade:','type'=>'text','id'=>''));
			?>
		</section>
		
		<section class="coluna-direita" style="float: left;">
			<?php
				echo $this->Form->input('Vazio.razao',array('value'=>$empresa['Empresa']['razao'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Razão:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.complemento',array('value'=>$empresa['Empresa']['complemento'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Complemento:','type'=>'text','id'=>''));
				echo $this->Form->input('Vazio.bairro',array('value'=>$empresa['Empresa']['bairro'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Bairro:','type'=>'text','id'=>''));

			?>
		</section>
	
	<section>
	<header>Dados do Vendedor</header>
		<section  class="coluna-esquerda">
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$vendedor['Vendedor']['nome'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
		</section>		
		
		<section  class="coluna-central">
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','CPF:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$vendedor['Vendedor']['cpf'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
		</section>		
		
	<header>Dados do Cliente</header>
	
	<!-- INFORMAÇÕES DA FOrnecedor-->
		
		<section  class="coluna-esquerda" style="float: left;">
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['nome'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
			
			<?php
				//echo $this->Form->input('Vazio.input',array('label'=>'Nome:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['nome'],'disabled'=>'disabled'));

					echo $this->Form->input('Vazio.input',array('label'=>'E-mail:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Contato'][0]['email'],'disabled'=>'disabled','style'=>'display: none;'));
					echo "
					<div class='whiteSpace' style='min-width: 185px !important; font-size: 13px; margin: 12px 0px 0px 0px;'>
						<span title='".$parceirodenegocio['Contato'][0]['email']."'>".$parceirodenegocio['Contato'][0]['email']."</span>
					</div>";

			?>
		</section>
		
		<section  class="coluna-central" style="float: left;">
			<?php
				echo $this->Form->input('Vazio.input',array('label'=>'CPF/CNPJ:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Parceirodenegocio']['cpf_cnpj'],'disabled'=>'disabled'));	
				echo $this->Form->input('Vazio.input',array('label'=>'Telefone 1:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Contato'][0]['telefone1'],'disabled'=>'disabled'));		
			?>
		</section>
		
		<section  class="coluna-direita" style="float: left;">
			
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Status Faturamento:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['status'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
				<div class="segmento-esquerdo">
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Telefone 2:',array('class'=>'titulo'));?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Contato'][0]['telefone2'],array('class'=>'valor'));?>	</div>
					</div>
				</div>
		
		</section>
		
		<section>
			<?php 
				foreach($parceirodenegocio['Endereco'] as $endereco){				
			?>
			<fieldset style="padding:5px; margin-top:5px;">
				<legend><h5 style="color:#676767;"><?php echo "Endereço " . strtolower($endereco['tipo']); ?></h5></legend>
				
				<section class="coluna-esquerda">
					<?php
					//	echo $this->Form->input('Vazio.input',array('label'=>'Tipo Endereço:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['tipo'],'disabled'=>'disabled'));	
						echo $this->Form->input('Vazio.input',array('label'=>'UF:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['uf'],'disabled'=>'disabled'));	
						echo $this->Form->input('Vazio.input',array('label'=>'Cidade:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Endereco'][0]['cidade'],'disabled'=>'disabled'));	
					?>
				</section>
				
				<section class="coluna-central">
					<?php
						echo $this->Form->input('Vazio.input',array('label'=>'Bairro:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['bairro'],'disabled'=>'disabled'));				
						echo $this->Form->input('Vazio.input',array('label'=>'CEP:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$parceirodenegocio['Endereco'][0]['cep'],'disabled'=>'disabled'));	
					?>					
				</section>
				
				<section class="coluna-direita">
					<?php
						echo $this->Form->input('Vazio.input',array('label'=>'Número:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$endereco['numero'],'disabled'=>'disabled'));	
					?>
					<div style="clear:both;"></div>
					<div class="segmento-esquerdo" style="margin-top: -10px;">
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['logradouro'],array('class'=>'valor'));?>	</div>
						</div>
					</div>
				</section>
			
			</fieldset>		
			
			<?php
				}
			?>	
		</section>
		
	<header>Dados da Cotação</header>
	
	<!-- INICIO PEDIDOS -->
	<fieldset>
		<legend>Dados da Cotação</legend>
		<section class="coluna-esquerda" style="float: left;">
			
			<?php
				//echo $this->Form->input('Comoperacao.user_id',array('type'=>'hidden','value'=>$userid));

				echo $this->Form->input('Comoperacao.id',array('label'=>'Código:','class'=>'tamanho-medio borderZero','type'=>'text','value'=>$cotacaovenda['Cotacaovenda']['id'],'disabled'=>'disabled'));
				echo $this->Form->input('Comoperacao.forma_pagamento',array('type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-medio desabilita borderZero', 'value'=>h($cotacaovenda['Cotacaovenda']['forma_pagamento']),'disabled'=>'disabled'));
				
			?>
			
		</section>
		
		<section class="coluna-central" style="float: left;">
			
			<?php
				if($cotacaovenda['Cotacaovenda']['tipo'] == "COTACAO"){
					$tipoOperacao = "Cotação";
				}else{
					$tipoOperacao = "cotacaovenda";
				}
				
				echo $this->Form->input('Comoperacao.total_venda',array('type'=>'text','label'=>'Total da Cotação:','class'=>'tamanho-medio desabilita borderZero', 'value'=>h(converterMoeda($cotacaovenda['Cotacaovenda']['valor'])),'disabled'=>'disabled'));

				//echo $this->Form->input('Comoperacao.prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'tamanho-medio borderZero','type'=>'text','value'=>$cotacaovenda['cotacaovenda']['prazo_pagamento'],'disabled'=>'disabled'));
				//echo $this->Form->input('Comoperacao.prazo_entrega',array('label'=>'Prazo de Entrega:','class'=>'tamanho-medio borderZero','type'=>'text','value'=>$cotacaovenda['cotacaovenda']['prazo_entrega'],'disabled'=>'disabled'));


			?>
			
		</section>
		
		<section class="coluna-direita" style="float: left;">

			<?php
				echo $this->Form->input('Comoperacao.data_inici',array('label'=>'Data da Cotação:','class'=>'tamanho-medio inputData borderZero','type'=>'text', 'value'=>h(formatDateToView($cotacaovenda['Cotacaovenda']['data_inici'])),'disabled'=>'disabled'));
				//echo $this->Form->input('Comoperacao.status',array('label'=>'Status:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>$cotacaovenda['cotacaovenda']['status'],'disabled'=>'disabled'));	
				//echo $this->Form->input('Comoperacao.data_entrega',array('label'=>'Previsão de Entrega:','type'=>'text','class'=>'tamanho-medio borderZero','value'=>formatDateToView($cotacaovenda['cotacaovenda']['data_entrega']),'disabled'=>'disabled'));	
			//	if(isset($cotacaovenda['cotacaovenda']['recebimento'])) echo $this->Form->input('Comoperacao.recebimento',array('type'=>'text','label'=>'Data de Recebimento:','class'=>'tamanho-medio desabilita borderZero', 'value'=>h(formatDateToView($cotacaovenda['cotacaovenda']['recebimento'])),'disabled'=>'disabled'));

			?>

		</section>
	</fieldset>
	
	<!-- INICIO PRODUTOS -->
				<table id="tbl_produtos" >
					<thead>
						<th>Nome do Produto</th>
						<th>Quantidade</th>									
						<th>Unidade</th>									
						<th>Valor Unitário</th>									
						<th>Valor Total</th>									
						<th>Observação</th>									
					</thead>
					
					<?php 
						foreach($itens as $produtos){
							echo '<tr><td>'. $produtos['Produto']['nome'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['qtde'] .'</td>';
							echo '<td>'. $produtos['Produto']['unidade'] .'</td>';
							echo '<td>';
								echo converterMoeda($produtos['Comitensdaoperacao']['valor_unit']);
							echo '</td>';
							echo '<td>';
								echo converterMoeda($produtos['Comitensdaoperacao']['valor_total']); 
							echo '</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['obs'] .'</td></tr>';
						}
					?>
				</table>


</section>
</div>

<footer>

	<?php
		
		if($cotacaovenda['Cotacaovenda']['status'] != 'CANCELADO'){


			echo $this->Html->image('bt-cancel.png',array('id'=>'','style'=>'float:right;cursor:pointer;','alt' =>'Cancelar Venda','title' => 'Cancelar Venda'));
			
			if($cotacaovenda['Cotacaovenda']['status_gerencial'] == 'PENDENTE'){
				
				echo $this->Form->postLink($this->Html->image('bt-autorizar-cotacao.png',array('style'=>'float:right;margin-right:5px;cursor:pointer;','alt' =>__('Autorizar Cotação'),'title' => __('Autorizar Cotação'))), array('controller' => 'Cotacaovendas','action' => 'setAutorizacaoCotacao', $cotacaovenda['Cotacaovenda']['id']),array('escape' => false, 'confirm' => __('Tem certeza que deseja autorizar esta Cotação # %s?', $cotacaovenda['Cotacaovenda']['id'])));

			}elseif ($cotacaovenda['Cotacaovenda']['status_gerencial'] == 'OK'){
				
				if ($hasPedido <= 0 ){

					echo $this->Form->postLink($this->Html->image('bt-transvenda.png',array('style'=>'float:right;margin-right:5px;cursor:pointer;','alt' =>__('Transformar em Venda'),'title' => __('Transformar em Venda'))), array('controller' => 'Pedidovendas','action' => 'converteEmPedido', $cotacaovenda['Cotacaovenda']['id']),array('escape' => false, 'confirm' => __('Tem certeza que deseja Transformar esta Cotação em Venda # %s?', $cotacaovenda['Cotacaovenda']['id'])));
					
				}
			
			}

		
			
			echo $this->html->image('botao-imprimir.png',array('alt'=>'Confirmar',
									'title'=>'Imprimir',
									'id'=>'confirmaImprimir',
									'class'=>'confirmaImprimir bt-confirmar',
									'style'=>'margin-right: 5px;'
									));
		
			?>

				<div class="modal fade" id="myModal_add-confirma" role="dialog" aria-hidden="true">
						<div class="modal-body">
					
							<header class="cabecalho">
							<?php 
								echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
								echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 

							?>	
							<h1>Recebimento da Cotação</h1>
							</header>
			
							<section>
								<header>Data do Recebimento da Cotação</header>
								<div class="recebimentoData">
									<?php
										echo $this->Form->create('cotacaovenda',array('action'=>'confirmarEntrega',$cotacaovenda['Cotacaovenda']['id']));
										echo $this->Form->input('cotacaovenda.id',array('value'=>$cotacaovenda['Cotacaovenda']['id'],'type'=>'hidden'));
										echo $this->Form->input('cotacaovenda.recebimento',array('id'=>'dataRecebimento','label'=>'Data do Recebimento:','type'=>'text','class'=>'tamanho-pequeno inputData','onfocusout' => 'javascript: validaData()'));
										echo "<span id='spanDataInvalida' class='Msg Msg-tooltipDireita' style='display:none; margin-left: 250px; z-index: 1;'>Data do Recebimento não pode ser menor que a Data Inicial</span>";
									?>
								</div>
								<footer>
									<?php
										echo $this->Html->image('botao-salvar.png',array(
																	'class'=>'bt-salvar',
																	'alt'=>'Salvar',
																	'title'=>'Salvar',
																	'onclick'=>'javascript: submitRecebimento()'
										));
										
										echo $this->Form->end();
									?>
								</footer>
								
							</section>
						</div>
				</div>
				
				<div class="modal fade" id="myModal_imprimir" role="dialog" aria-hidden="true" style="">
					<div class="modal-body">
					
						<header class="cabecalho">
							<?php 
								echo $this->Html->image('titulo-consultar.png', array('id' => 'imprimir', 'alt' => 'Imprimir', 'title' => 'Imprimir'));
								echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right'));
							?>
							<h1>Impressão da Cotação</h1>
						</header>
						
						<section>
							<header>Confirmar Impressão</header>
							<div id="impressao" class="impressao">
									<fieldset>
										<legend>Dados da Empresa</legend>
										<section>
										<section class="coluna-esquerda">
											<div class="segmento-esquerdo">															
												<div class="conteudo-linha">
													<div class="linha"><?php echo $this->Html->Tag('p','Empresa:',array('class'=>'titulo'));?></div>
													<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['nome_fantasia'],array('class'=>'valor'));?>	</div>
												</div>
														
												<div class="conteudo-linha">
													<div class="linha"><?php echo $this->Html->Tag('p','Razão:',array('class'=>'titulo'));?></div>
													<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['razao'],array('class'=>'valor'));?>	</div>
												</div>
													
												<div class="conteudo-linha">
													<div class="linha"><?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo'));?></div>
													<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['telefone'],array('class'=>'valor'));?>	</div>
												</div>
												
												<div class="conteudo-linha">
														<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?></div>
														<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['uf'],array('class'=>'valor'));?>	</div>
												</div>
												
											</div>													
										</section>
										
										<section class="coluna-central" style="width: 255px !important; margin-left: 16px !important;">
											<div class="segmento-central">															
												<div class="conteudo-linha">
													<div class="linha"><?php echo $this->Html->Tag('p','Endereço:',array('class'=>'titulo'));?></div>
													<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['endereco'],array('class'=>'valor'));?>	</div>
												</div>
															
												<div class="conteudo-linha">
													<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?></div>
													<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['cidade'],array('class'=>'valor'));?>	</div>
												</div>
															
												<div class="conteudo-linha">
													<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?></div>
													<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['bairro'],array('class'=>'valor'));?>	</div>
												</div>
												
												<div class="conteudo-linha">
														<div class="linha"><?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo'));?></div>
														<div class="linha2"><?php echo $this->Html->Tag('p',$empresa['Empresa']['complemento'],array('class'=>'valor'));?>	</div>
												</div>
											</div>
										</section>
											
									</section>
									</fieldset>
									
									<fieldset>
										<legend>Dados do Vendedor</legend>
										<section>
											<section class="coluna-esquerda">
												<div class="segmento-direita">															
														<div class="conteudo-linha">
															<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo'));?></div>
															<div class="linha2"><?php echo $this->Html->Tag('p',$vendedor['Vendedor']['nome'],array('class'=>'valor'));?>	</div>
														</div>	
												</div>	
											</section>
											<section class="coluna-central">
												<div class="segmento-direita">															
														<div class="conteudo-linha">
															<div class="linha"><?php echo $this->Html->Tag('p','CPF:',array('class'=>'titulo'));?></div>
															<div class="linha2"><?php echo $this->Html->Tag('p',$vendedor['Vendedor']['cpf'],array('class'=>'valor'));?>	</div>
														</div>	
												</div>	
											</section>
										</section>
									</fieldset>
									<fieldset>
										<legend>Dados do Cliente</legend>
									<section>
											<section class="coluna-esquerda">
												<div class="segmento-direita">															
														<div class="conteudo-linha">
															<div class="linha"><?php echo $this->Html->Tag('p','Fornecedor:',array('class'=>'titulo'));?></div>
															<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['nome'],array('class'=>'valor'));?>	</div>
														</div>	
										
														<?php if(isset($parceirodenegocio['Contato'][0]['email'])){?>														
															<div class="conteudo-linha">
																<div class="linha"><?php echo $this->Html->Tag('p','E-mail:',array('class'=>'titulo'));?></div>
																<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Contato'][0]['email'],array('class'=>'valor', 'style'=>'width: 300px;'));?>	</div>
															</div>													
														<?php }?>
															
														<div class="conteudo-linha">
															<div class="linha"><?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo'));?></div>
															<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Contato'][0]['telefone1'],array('class'=>'valor'));?>	</div>
														</div>	
															
														<?php if(isset($parceirodenegocio['Contato'][0]['telefone2'])){?>														
															<div class="conteudo-linha">
																<div class="linha"><?php echo $this->Html->Tag('p','Telefone 2:',array('class'=>'titulo'));?></div>
																<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Contato'][0]['telefone2'],array('class'=>'valor'));?>	</div>
															</div>													
														<?php }?>
														
														<?php if(isset($parceirodenegocio['Endereco'][0]['complemento']) && $parceirodenegocio['Endereco'][0]['complemento'] != ''){?>														
															<div class="conteudo-linha">
																<div class="linha"><?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo'));?></div>
																<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Endereco'][0]['complemento'],array('class'=>'valor'));?>	</div>
															</div>													
														<?php }?>
												</div>
											</section>

											<section class="coluna-central" style="width: 255px !important; margin-left: 16px !important;">
												<div class="segmento-direita">	
													<div class="conteudo-linha">
														<div class="linha"><?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?></div>
														<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Endereco'][0]['cep'],array('class'=>'valor'));?>	</div>
													</div>	
															
													<div class="conteudo-linha">
														<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo'));?></div>
														<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Endereco'][0]['logradouro'],array('class'=>'valor'));?>	</div>
													</div>	
															
													<div class="conteudo-linha">
														<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?></div>
														<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Endereco'][0]['cidade'],array('class'=>'valor'));?>	</div>
													</div>	
															
													<div class="conteudo-linha">
														<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?></div>
														<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Endereco'][0]['bairro'],array('class'=>'valor'));?>	</div>
													</div>
													
													<?php if(isset($parceirodenegocio['Endereco'][0]['numero']) && $parceirodenegocio['Endereco'][0]['numero'] != ''){?>														
														<div class="conteudo-linha">
															<div class="linha"><?php echo $this->Html->Tag('p','Número:',array('class'=>'titulo'));?></div>
															<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Endereco'][0]['numero'],array('class'=>'valor'));?>	</div>
														</div>													
													<?php }?>
													
													<div class="conteudo-linha">
															<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?></div>
															<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Endereco'][0]['uf'],array('class'=>'valor'));?>	</div>
													</div>
													
												</div>
											</section>
									</section>
									</fieldset>
									<fieldset>
										<legend>Dados da Cotação</legend>
									<section>
											<section class="coluna-esquerda">
													<div class="segmento-esquerdo">															
															<div class="conteudo-linha">
																<div class="linha"><?php echo $this->Html->Tag('p','Código:',array('class'=>'titulo'));?></div>
																<div class="linha2"><?php echo $this->Html->Tag('p',$cotacaovenda['Cotacaovenda']['id'],array('class'=>'valor'));?>	</div>
															</div>
																													
															<div class="conteudo-linha">
																<div class="linha"><?php echo $this->Html->Tag('p','Forma de Pagamento:',array('class'=>'titulo'));?></div>
																<div class="linha2"><?php echo $this->Html->Tag('p',$cotacaovenda['Cotacaovenda']['forma_pagamento'],array('class'=>'valor'));?>	</div>
															</div>
					
															
													</div>													
											</section>
											
											<section class="coluna-central" style="width: 255px !important; margin-left: 16px !important;">
													<div class="segmento-esquerdo">		
														
														
															<div class="conteudo-linha">
																<div class="linha"><?php echo $this->Html->Tag('p','Data da Cotação:',array('class'=>'titulo'));?></div>
																<div class="linha2"><?php echo $this->Html->Tag('p',$cotacaovenda['Cotacaovenda']['data_inici'],array('class'=>'valor'));?>	</div>
															</div>
																											
															<div class="conteudo-linha">
																<div class="linha"><?php echo $this->Html->Tag('p','Total da Cotação:',array('class'=>'titulo'));?></div>
																<div class="linha2"><?php echo $this->Html->Tag('p',$cotacaovenda['Cotacaovenda']['valor'],array('class'=>'valor'));?>	</div>
															</div>
													
															
													</div>
											</section>
									</section>
									</fieldset>
													<table id="tbl_produtos" >
														<thead>
															<th>Nome do Produto</th>
															<th>Quantidade</th>
															<th>Unidade</th>
															<th>Valor Unitário</th>
															<th>Valor Total</th>
															<th>Observação</th>
														</thead>
														
														<?php 
															foreach($itens as $produtos){
																echo '<tr><td>'. $produtos['Produto']['nome'] .'</td>';
																echo '<td>'. $produtos['Comitensdaoperacao']['qtde'] .'</td>';
																echo '<td>'. $produtos['Produto']['unidade'] .'</td>';
																echo '<td>';
																	echo converterMoeda($produtos['Comitensdaoperacao']['valor_unit']);
																echo '</td>';
																echo '<td>';
																	echo converterMoeda($produtos['Comitensdaoperacao']['valor_total']); 
																echo '</td>';
																echo '<td>'. $produtos['Comitensdaoperacao']['obs'] .'</td></tr>';
															}
														?>
													</table>
								</div>
								<footer>
									<?php
										echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar',
											'title'=>'Imprimir',
											'id'=>'imprimir',
											'class'=>'bt-confirmar imprimir',
											'style'=>'margin-right: 5px;'
											));
										
										echo $this->Form->end();
									?>
								</footer>
								
							</section>
					</div>
				</div>
	<?php
		}
	
	?>

	
	
	
</footer>

<script type="text/javascript">
	$(document).ready(function(){
	    $(".bt-showmodal").click(function(){
		nome = $(this).attr('href');
		$('#'+nome).modal('show');
	    });
	    
		$('.confirmaImprimir').click(function(){
			$('#myModal_imprimir').modal('show');
		});
		
		$('.imprimir').click(function(){
			var options = {mode: "iframe", popClose : false, };
			
			$('#impressao').css('padding','30px');
			$('#impressao th').css('background-color','initial');
			$('#impressao').css('min-height','200px');
			
			$( '#impressao' ).printArea(options);
		});
	    
		
	});
	
	/** Validação Data Início e Confirmação ao Confirmar cotacaovenda **************************************************/
	
	function validaData(){
		if($("#dataRecebimento").val() != '' || validacaoEntreDatas($("#ComoperacaoDataInici").val(),$("#dataRecebimento").val(),"#spanDataInvalida")){
				$("#dataRecebimento").val("");
				$("#dataRecebimento").addClass('shadow-vermelho');
		}
	}
	
	function submitRecebimento(){
		if($("#dataRecebimento").val() != '' || validacaoEntreDatas($("#ComoperacaoDataInici").val(),$("#dataRecebimento").val(),"#spanDataInvalida")){
				$("#dataRecebimento").val("");
				$("#dataRecebimento").addClass('shadow-vermelho');
		}
		else{
			document.forms['cotacaovenda'].submit();
			}
		}
	
</script>

