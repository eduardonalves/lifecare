<?php 
	$this->start('css');
		echo $this->Html->css('table');
	    echo $this->Html->css('compras_pedido');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('pedido_addResposta.js');
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
			$valorMoeda= $valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = $valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
		
?>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption45">Fazer Pedido de Cotação</h1>
	
</header>

<section>
		<header>Informações do Pedido</header>
		<?php echo $this->Form->create('Pedido',array('id'=>'PedidoAddForm','url'=>array('controller'=>'Pedidos','action'=>'add')));?>
		<section>
			<!-- INICIO COTAÇÕES -->
			<section class="coluna-esquerda">
				<?php
					echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$userid));
					echo $this->Form->input('tipo',array('type'=>'hidden','value'=>'PEDIDO'));	
					echo $this->Form->input('status',array('type'=>'hidden','value'=>'ABERTO'));	

					if($comresposta['Comoperacao']['vale'] == 0){
						$tipo = 'Comum';					
					}else if($comresposta['Comoperacao']['vale'] == 1){
						$tipo = 'Vale';
					}else if($comresposta['Comoperacao']['vale'] == 0){
						
					}
						
					echo $this->Form->input('vale',array('value'=> $comresposta['Comoperacao']['vale'],'type'=>'hidden'));
					echo $this->Form->input('Vazio.vazio',array('value'=> $tipo,'type'=>'text','label'=>'Tipo:','class'=>'tamanho-pequeno borderZero','readonly'=>'readonly','onfocus'=>'this.blur();'));
					echo $this->Form->input('forma_pagamento',array('value'=> $comresposta['Comresposta']['forma_pagamento'],'type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno borderZero','readonly'=>'readonly','onfocus'=>'this.blur();'));

				?>
			</section>
			
			<section class="coluna-central">
				<?php
					$datahoje = date('Y-m-d');
					echo $this->Form->input('data_inici',array('value'=>formatDateToView($datahoje),'label'=>'Data de Início:','class'=>'tamanho-pequeno borderZero','type'=>'text','readonly'=>'readonly','onfocus'=>'this.blur();'));
					echo $this->Form->input('prazo_entrega',array('value'=>$comresposta['Comresposta']['prazo_entrega'],'label'=>'Prazo de Entrega:','class'=>'borderZero tamanho-pequeno','type'=>'text','readonly'=>'readonly','onfocus'=>'this.blur();'));


				?>
			</section>
			
			<section class="coluna-direita">
				<?php
					echo $this->Form->input('prazo_pagamento',array('value'=> $comresposta['Comoperacao']['prazo_pagamento'],'label'=>'Prazo de Pagamento:','class'=>'tamanho-pequeno borderZero','type'=>'text','readonly'=>'readonly','onfocus'=>'this.blur();'));

				?>
			</section>
		</section>
		
		<div style="clear:both;"></div>
		
		<!-- INICIO FORNECEDOR -->	
		<section class="coluna-Fornecedor_Pedido">
			<header>Informações do Fornecedor</header>
			<section class="coluna-esquerda">	
				<div class="segmento-esquerdo">
						
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Nome do Fornecedor:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Parceirodenegocio']['nome'],array('class'=>'valor'));?>	</div>
												<?php echo $this->Form->input('Parceirodenegocio.parceirodenegocio_id',array('type'=>'hidden','value'=>$comresposta['Parceirodenegocio']['id']));?>
													
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Telefone 1:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['telefone1'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Endereço:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['tipo'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Número:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['numero'],array('class'=>'valor'));?>	</div>
						</div>
						
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['bairro'],array('class'=>'valor'));?>	</div>
						</div>
				</div>
			</section>
	
			<section class="coluna-central">
					
				<div class="segmento-esquerdo">
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Parceirodenegocio']['cpf_cnpj'],array('class'=>'valor'));?>	</div>
						</div>
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Telefone 2:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['telefone2'],array('class'=>'valor'));?>	</div>
						</div>
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['cep'],array('class'=>'valor'));?>	</div>
						</div>
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['cidade'],array('class'=>'valor'));?>	</div>
						</div>
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['uf'],array('class'=>'valor'));?>	</div>
						</div>
				</div>

			</section>
	
			<section class="coluna-direita">
					<div class="segmento-esquerdo">
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','E-mail:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['email'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Celular:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['telefone3'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['logradouro'],array('class'=>'valor'));?>	</div>
						</div>
						
			
					</div>

			</section>
	
		<!-- INICIO PRODUTOS -->
		<section class="coluna-Produto_Pedido">
			
				<header>Produtos</header>
				<div class="confirma">
					<section class="coluna-esquerda">
						
							<div class="input autocompleteProduto conta" style="width: 355px;">
								<span id="msgValidaProduto" class="Msg tooltipMensagemErroTopo" style="display:none">Escolha os Produtos</span>
								<label id="SpanPesquisarFornecedor">Buscar Produto<span class="campo-obrigatorio">*</span>:</label>
								<select class="tamanho-medio limpa" id="add-produtos">
									<option></option>
									<option value="add-produto">Cadastrar</option>

									<?php
										foreach($produtos as $produto)
										{
											echo "<option id='".$produto['Produto']['id']."' data-nome='".$produto['Produto']['nome']."' data-unidade='".$produto['Produto']['unidade']."'>";
											echo $produto['Produto']['nome'];
											echo "</option>";
										}
									?>

								</select>
							</div>		
					
					
						<?php	
							echo $this->html->image('botao-adicionar2.png',array('alt'=>'Adicionar',
													 'title'=>'Adicionar',
													 'class'=>'bt-addItens_Pedido',
													 'id'=>'bt-adicionarProduto'
													 ));
						?>			
					
						<?php			
							echo $this->Form->input('vazio.vazio',array('label'=>'Quantidade<span class="campo-obrigatorio">*</span>:','id'=>'produtoQtd','class'=>'Nao-Letras confirmaInput tamanho-pequeno','type'=>'text','maxlength'=>'15'));		
							echo '<span id="msgQtdVazia" class="Msg-tooltipDireita" style="display:none;">Preencha a Quantidade</span>';
							echo $this->Form->input('vazio.vazio',array('label'=>'','id'=>'produtoUnid','class'=>'produtoUnid_Pedido tamanho-pequeno borderZero','type'=>'text','disabled'=>'disabled'));
						?>
					</section>
					
					<section class="coluna-central">
						<?php
							
								
							echo $this->Form->input('vazio.vazio',array('label'=>'Valor:','id'=>'produtoValor','class'=>'confirmaInput tamanho-pequeno dinheiro_duasCasas','type'=>'text','maxlength'=>'15'));		
							echo $this->Form->input('vazio.vazio',array('label'=>'Observação:','id'=>'produtoObs','class'=>'confirmaInput tamanho-medio','type'=>'textarea','maxlength'=>'99'));		
							echo $this->Form->input('vazio.vazio',array('id'=>'moduloCompras','type'=>'hidden','value'=>1));
							echo $this->Form->input('vazio.vazio',array('id'=>'validaProd','type'=>'hidden','value'=>0));	
						?>
					</section>
				</div>
			
				<section class="tabela_fornecedores">
					<table id="tbl_produtos" >
						<thead>
							<th>Nome do Produto</th>
							<th style="width: 150px;">Obs. Pedido</th>									
							<th style="width: 150px;">Obs. Item</th>									
							<th>Fabricante</th>
							<th style="width: 80px !important;">Quantidade</th>
							<th>Unidade</th>
							<th style="width: 150px;">Valor Unitário</th>
							<th>Valor Total</th>
							<span id="msgValidaConfirmaProduto" class="Msg tooltipMensagemErroTopo" style="display:none;top: 180px;left: 263px;">Confirme as Informações do Produto</span>
							<th class="confirma">Ações</th>	
				
						</thead>
								
					<?php
						$j = 0;
						foreach( $comresposta['Comitensresposta'] as $prodList ){
							
							echo "<tr class='produtoTr_".$j."'>";
								echo "<td class='whiteSpace'><span title='".$prodList['produto_nome']."'>";
									echo $prodList['produto_nome'];
									echo "</span>";
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.produto_id',array('type'=>'hidden','value'=>$prodList['id']));
								echo "</td>";
								
								echo "<td class='whiteSpace'><span title='".$prodList['obs_operacao']."'>";
									echo $prodList['obs_operacao'];
								echo "</span></td>";
								
								echo "<td class='whiteSpace'><span title='".$prodList['obs']."'>";
									echo $prodList['obs'];
									echo "</span>";
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.obs',array('type'=>'hidden','value'=>$prodList['obs']));
								echo "</td>";
							
								echo "<td>";
									echo $prodList['fabricante'];
								echo "</td>";
							
								echo "<td>";
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.qtde',array('value'=>$prodList['qtde'],'label'=>'','id'=>'itenQtd'.$j,'class'=>'qtdE tamanho-pequeno borderZero','type'=>'text','style'=>'text-align:center;','readonly'=>'readonly','onfocus'=>'this.blur();'));
									echo '<span id="msgValidaQtde'.$j.'" class="Msg-tooltipDireita" style="display:none;left: 62.5%;">Preencha a Quantidade do Produto</span>';
								echo "</td>";
							
								echo "<td>";
									echo $prodList['produto_unidade'];
								echo "</td>";
							
								echo "<td>";
									echo "R$ ". converterMoeda($prodList['valor_unit']);
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.valor_unit',array('type'=>'hidden','id'=>'vU'.$j,'value'=>$prodList['valor_unit']));
								echo "</td>";
								
								echo "<td>";
									echo "<span id='spanValTotal".$j."'>R$ ". converterMoeda($prodList['valor_total']) ."</span>";
									echo $this->Form->input('Comitensdaoperacao.'.$j.'.valor_total',array('type'=>'hidden','value'=>$prodList['valor_total']));
								echo "</td>";
								
								echo "<td class='confirma'>";
									echo "<span id='spanStatus".$j."' class='fechado' style='display:none;'></span>";
									echo "<img title='Editar' alt='Editar' src='/lifecare/app/webroot/img/botao-tabela-editar.png' id='editi".$j."' class='btnEditi' />";
									echo "<img title='Confirmar' alt='Confirmar' src='/lifecare/app/webroot/img/bt-confirm.png' id='confir".$j."' class='btnConfirm' style='display:none;' />";
									echo "<img title='Remover' alt='Remover' src='/lifecare/app/webroot/img/lixeira.png' id='excluirP_".$j."' class='btnRemoveProdu'/>";
								echo "</td>";
							
								
							echo "</tr>";	
						$j++;	
						}					
					//~ ?>
					
					</table>
				</section>
		</section>
			
	
		<section id="area_inputHidden"></section>
	
		<section id="area_inputHidden_Produto"></section>
	
</section>

<footer>
	<?php
		
		 echo $this->form->submit('botao-salvar.png',array(
							    'class'=>'bt-salvar',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',						    
	    ));
		
		echo $this->Form->end();
	?>	
</footer>




