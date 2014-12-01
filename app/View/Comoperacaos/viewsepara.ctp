<?php
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('separacao');
	$this->end();
	
	$this->start('script');
		echo $this->Html->script('separacaoLotes.js');
		
		?>
		
		<script>
		
		$(window).load( function (){
			
			$(".orglote").on('click', function(){
				
				var $id = $(this).attr('data-lotesoperacao-id');
				
				$.ajax({
					url: urlInicio+"Comoperacaos/checkLote/"+$id,
					}).done(function($data) {
						
						$('.td-status-com-' + $id).html($data);
						$('.valorseparado').html('Separado');
						
				});
				
			});
			
		});

		</script>
		
		<?php
	$this->end();
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}
		return $data;
	}

?>

<header>
	<?php echo $this->Html->image('ico-separa-verde.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>
		
	<h1 class="menuOption26">Separação de Produtos</h1>
</header>

<section>
	<header> Dados da Venda</header>
	<section class="coluna-esquerda">
		<div class="segmento-esquerdo">
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Código:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',$comoperacao['Comoperacao']['id'],array('class'=>'valor'));?>	</div>
			</div>	
			
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Cliente:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',$comoperacao['Parceirodenegocio'][0]['nome'],array('class'=>'valor'));?>	</div>
			</div>	
			
		</div>
	</section>
	
	<section class="coluna-central">
		<div class="segmento-esquerdo">
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Data:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',formatDateToView($comoperacao['Comoperacao']['data_inici']),array('class'=>'valor'));?>	</div>
			</div>
			<?php 
				$vendedor_nome = '';
				if(!empty($vendedor['Vendedor']['nome'])){ $vendedor_nome = $vendedor['Vendedor']['nome'];}
			?>
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Vendedor:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',$vendedor_nome,array('class'=>'valor'));?>	</div>
			</div>	
		</div>
	</section>
	
	<section class="coluna-direita">
		<div class="segmento-esquerdo">
			<?php
				if($comoperacao['Comoperacao']['status_estoque'] == 'SEPARACAO'){
					$status_estoque = 'SEPARAÇÃO';
				}else{
					$status_estoque = $comoperacao['Comoperacao']['status_estoque'];
				}
				
				$autorizado_por = '';
				if(!empty($vendedor['Comoperacao']['autorizado_por'])){ $autorizado_por = $vendedor['Comoperacao']['autorizado_por'];}
			
			?>
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Status:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',$status_estoque,array('class'=>'valor valorseparado'));?>	</div>
			</div>
			
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Autorização:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',$autorizado_por,array('class'=>'valor'));?>	</div>
			</div>	
		</div>
		<?php
			//echo $this->Form->postLink($this->Html->image('bt-confirm-entrega.png',array('style'=>'float:right;margin-right:5px;margin-top:25px;cursor:pointer;','alt' =>__('Confirmar Entrega'),'title' => __('Confirmar Entrega'))), array('controller' => 'Comoperacaos','action' => 'confirmaentrega', $comoperacao['Comoperacao']['id']),array('escape' => false, 'confirm' => __('Confirma entrega de Produtos da nota # %s?', $comoperacao['Comoperacao']['id'])));
			echo "<a href='myModal_add-confirma_entrega' class='bt-showmodal'>";
				echo $this->Html->image('bt-confirm-entrega.png',array('style'=>'float:right;margin-right:5px;margin-top:25px;','alt'=>'Organizar Lotes','class' => 'orglotes img-lista','id'=>'Orglote','title'=>'Organizar Lotes'));
			echo "</a>";
		
		?>
	</section>
</section>

<section>
	<header>Produtos da Venda</header>
	<table>
		<thead>
			<tr>
				<td>Ações</td>
				<td>Lotes</td>
				<td>Produto</td>
				<td>Quantidade</td>
				<td>Observação</td>
			</tr>
		</thead>
		<tbody>
			<?php 			
				$j = 0;
				foreach($comoperacao['Comitensdaoperacao']  as $itens){
					 
			?>
				<tr>
					<td><?php echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Produto','title'=>'Visualizar Produto','url'=>array('controller' => 'Produtos','action' => 'view', $itens['produto_id'])));  ?></td>
					<td  id="TDICOLote<?php echo $j;?>" ><?php  //LOTES
							echo $this->Html->image('listar.png',array('alt'=>'Lotes','class' => 'bt-lotes img-lista','id'=>'lote'.$j,'title'=>'Visualizar Lista de Produtos'));
						?>
					</td>
					<td><?php echo $itens['produto_nome']; ?></td>
					<td><?php echo $itens['qtde']; ?></td>
					<td><?php echo $itens['obs']; ?></td>
				</tr>
				<tr style="display:none;" id="linhaLote<?php echo $j;?>" > 
					<td class="tdLote" colspan="5">
						<span class="triangulo" id="tri<?php echo $j;?>"></span>
						<section class="corpoTd">
								<table class="tabela-simples">
									<thead>
										<tr>
											<td>Lote</td>
											<td>Qtd. Estoque</td>
											<td>Status</td>
											<td>Completar Lote</td>
											<td>Confirmar Lote</td>
										</tr>
									</thead>
									
									<tbody>
										<?php											
											foreach($itens['lotes'] as $lote){
										?>				
												<tr>
													<td><?php echo $lote['Lote']['numero_lote']?></td>
													<td><?php echo $lote['Comlotesoperacao']['qtde']?></td>
													<td class="td-status-com-<?php echo $lote['Comlotesoperacao']['id']; ?>"><?php echo $lote['Comlotesoperacao']['status_estoque']; ?></td>
													<td>
														<span id="msgQtdMaior<?php echo $j;?>" class="Msg-tooltipDireita msgAviso hideMsg" style="display:none;">Quantidade Inserida maior que a Quantidade no Estoque.</span>
														<?php
															if($lote['Comlotesoperacao']['status_estoque'] != "OK"){
																//VERIFICA O TIPO DO USUARIO CASO NÂO TENHA PERMISSÂO NÂO PODE MODIFICAR O LOTE
																if($usuario['Role']['alias'] == 'admin' || $usuario['Role']['alias'] == 'gestor' || $usuario['Role']['alias'] == 'gerente'){
																	echo $this->Html->image('bt-completarLote.png',array('alt'=>'Completar','class' => 'completar','id'=>'completar'.$j,'title'=>'Completar'));
																}else{//SE NÂO TIVER PERMISSÂO MOSTRA OS TRAÇOS NO LUGAR DO BOTÂO.
																	echo "----"; 
																}
																	echo "<div id='encontrada".$j."' style='display:none;'>";
																echo $this->Form->input('vazio.qtd_encontrada',array('label'=>'Qtd. Encontrada:','id'=>'encontradaInput'.$j,'class'=>'q-ip tamanho-pequeno qtdEncontrada'));

																echo "<a href='myModal_add-troca_lote".$j."' class='bt-showmodal'>";
																	echo $this->Html->image('bt-ok.png',array('alt'=>'Organizar Lotes','data-produtoId'=>$itens['produto_id'],'class' => 'orglotes img-lista','id'=>'Orglote'.$j,'title'=>'Organizar Lotes'));
																echo "</a>";

																	echo $this->Html->image('bt-XLote.png',array('alt'=>'Cancelar','class' => 'cancelCompleta','id'=>'cancelCompleta'.$j,'title'=>'Cancelar'));

																echo "</div>";
																
																// HIDDENS' PARA ENVIAR PARA O MODAL
																	echo $this->Form->input('vazio.qtd_operacao',array('value'=> $lote['Comlotesoperacao']['qtde'],'id' => 'vazio-qtd_operacao'.$j, 'type' => 'hidden'));
																	echo $this->Form->input('vazio.qtd_achada',array('value'=> $lote['Comlotesoperacao']['qtde'],'id' => 'vazio-qtd_achada'.$j, 'type' => 'hidden'));
																	echo $this->Form->input('vazio.comloteitem',array('value'=> $lote['Comlotesoperacao']['id'], 'id' => 'vazio-comloteitem'.$j, 'type' => 'hidden'));
																	echo $this->Form->input('vazio.comoperacao_id',array('value'=> $comoperacao['Comoperacao']['id'], 'id' => 'vazio-comoperacaoid'.$j, 'type' => 'hidden'));
																	echo $this->Form->input('vazio.lote_id',array('value'=>$lote['Comlotesoperacao']['lote_id'] ,'id'=>'vazio-loteid'.$j,'type'=>'hidden'));
																	echo $this->Form->input('vazio.produto_id',array('value'=> $itens['produto_id'] ,'id'=>'vazio-produtoid'.$j,'type'=>'hidden'));
																	echo $this->Form->input('vazio.comitensdeoperacao',array('value'=>$lote['Comlotesoperacao']['comitensdaoperacao_id'] ,'id'=>'vazio-comitensdaoperacaoid'.$j,'type'=>'hidden'));																
																	//echo $this->Form->input('vazio.qtde',array('value'=>$lote['Comlotesoperacao']['qtde'] ,'id'=>'vazio-qtde'.$j,'type'=>'hidden'));
																	echo $this->Form->input('vazio.tipo',array('id'=>'vazio-tipo'.$j,'value'=>'SAIDA','type'=>'hidden'));
																// HIDDENS' PARA ENVIAR PARA O MODAL
															}else{
																echo "OK";
															}
														?>													
													</td>
													<td>
														<?php
															if($lote['Comlotesoperacao']['status_estoque'] != "OK"){
																//if($usuario['Role']['alias'] == 'admin' || $usuario['Role']['alias'] == 'gestor' || $usuario['Role']['alias'] == 'gerente'){
																	echo $this->Html->image('bt-confirmaLote.png',array('style'=>'cursor:pointer','data-lotesoperacao-id'=>$lote['Comlotesoperacao']['id'], 'alt'=>'Organizar Lotes','class' => 'orglote img-lista','id'=>'Orglote'.$j,'title'=>'Organizar Lotes'));
																//}else{
																//	echo "----";
																//}
															}else{
																echo "OK";
															}
														?>
														
													</td>											
												</tr>										
										<?php
											}
										?>									
									</tbody>	
								</table>
						</section>					
					</td> 
				</tr>
			<?php $j++; } ?>				
		</tbody>	
	</table>
</section>

	
<script type="text/javascript">
	$(document).ready(function(){
	    $(".bt-showmodal").click(function(){
			nome = $(this).attr('href');
			$('#'+nome).modal('show');
	    });

	    $( ".bt-lotes" ).click(function() {			
			var n = $(this).attr('id');
			n = n.substring(4);
			$( "#linhaLote"+n ).slideToggle( "fast");
			$( "#linhaLote"+n+" td" ).css('display','table-cell');
			//$( "corpoTd" ).fadeIn( "slow" );			
		});
		
	});
</script>	
	
	<div class="loaderAjaxCarregarLoteDIV" style="display:none">

		<?php echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando','title'=>'Carregando','class'=>'loaderAjaxCarregarLote',)); ?>

		<span>Carregando lotes aguarde...</span>
	</div>	
	
<?php // MODAL DE TROCAR DE LOTE ##############################################################################################################?>
	<div class="modal fade" id="myModal_add-troca_lote" tabindex="-1" class="modal-Completalote" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body modal-body-Completalote">
		<?php
			echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
		?>
			<header class="cabecalho">
			<?php 
				echo $this->Html->image('completaLote.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
			?>	
				<h1>Completar Lotes</h1>
			</header>

			<section>
			<header>Informações dos Lote</header>
			</section>
			
			<section class="coluna-modal">
				<section class="coluna_esquerda_modal">
					
					<div id="carregaSelect">					
					</div>
					
					
					<div>
						
						
					</div>

				</section>
			</section>
		</div>
	</div>

<!-- Confirma Entrega ############################################################################ -->

	<div class="modal fade" id="myModal_add-confirma_entrega" tabindex="-1" class="modal-Completalote" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body modal-body-confirma_entrega">
		<?php
			echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
		?>
			<header class="cabecalho">
			<?php 
				echo $this->Html->image('caminhao.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
			?>	
				<h1>Entrega de Produtos</h1>
			</header>

			<section>
			<header>Confirmar Entrega</header>
			</section>
			
			<section class="conteudo-modal-entrega">
					<?php
						echo $this->Form->create('Comoperacoes');
							echo $this->Form->input('data_entrega',array('id'=>'entredaDate','class'=>'tamanho-pequeno','label'=>'Data de Entrega:','type'=>'text'));
							echo $this->form->submit('botao-confirmar.png',array('class' => 'bt-confirmar', 'alt' => 'Faturar', 'title' => 'Faturar'));
						echo $this->Form->end();						
					?>
			</section>
		</div>
	</div>


