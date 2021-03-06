<?php 
	$this->start('css');
		echo $this->Html->css('table');
	    echo $this->Html->css('compras_cotacaos.css');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('compras.js');
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

    <h1 class="menuOption41">Consulta de Cotação</h1>
</header>

<section>
	
	<!-- INICIO COTAÇÕES -->
	<header>Dados da Cotação</header>	
		<section class="coluna-esquerda">
			
			<?php
				//echo $this->Form->input('Comoperacao.user_id',array('type'=>'hidden','value'=>$userid));
				echo $this->Form->input('Comoperacao.data_inici',array('label'=>'Data de Início:','class'=>'tamanho-pequeno inputData borderZero','type'=>'text', 'value'=>h(formatDateToView($cotacao['Cotacao']['data_inici'])),'disabled'=>'disabled'));
				echo $this->Form->input('Comoperacao.forma_pagamento',array('type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno desabilita borderZero', 'value'=>h($cotacao['Cotacao']['forma_pagamento']),'disabled'=>'disabled'));
			?>
			
		</section>
		
		<section class="coluna-central">
			
			<?php
				if($cotacao['Cotacao']['tipo'] == "COTACAO"){
					$tipoOperacao = "Cotação";
				}else{
					$tipoOperacao = "Pedido";
				}
				
				echo $this->Form->input('Comoperacao.data_fim',array('label'=>'Data de Fim:','class'=>'tamanho-pequeno inputData borderZero','type'=>'text','value'=>h(formatDateToView($cotacao['Cotacao']['data_fim'])),'disabled'=>'disabled')); 
				echo $this->Form->input('Comoperacao.prazo_pagamento',array('label'=>'Prazo de Pagamento:','class'=>'tamanho-pequeno borderZero','type'=>'text','value'=>$cotacao['Cotacao']['prazo_pagamento'],'disabled'=>'disabled'));


			?>
			
		</section>
		
		<section class="coluna-direita">

			<?php
				echo $this->Form->input('Comoperacao.id',array('label'=>'Código:','class'=>'tamanho-pequeno borderZero','type'=>'text','value'=>$cotacao['Cotacao']['id'],'disabled'=>'disabled')); 
				echo $this->Form->input('Comoperacao.status',array('label'=>'Status:','type'=>'text','class'=>'tamanho-pequeno borderZero','value'=>$cotacao['Cotacao']['status'],'disabled'=>'disabled'));	
				
			?>

		</section>
	
	<!-- INICIO PRODUTOS -->
	<header>Produtos da Cotação</header>	
	<section>
		<!-- $cotacao['Produto']['data_inici'])-->
			<section class="tabela_fornecedores_view">
				<table id="tbl_produtos" >
					<thead>
						<th>Nome do Produto</th>
						<th>Quantidade</th>									
						<th>Unidade</th>									
						<th>Observação</th>									
					</thead>
					
					<?php 
						foreach($itens as $produtos){
							echo '<tr><td>'. $produtos['Produto']['nome'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['qtde'] .'</td>';
							echo '<td>'. $produtos['Produto']['unidade'] .'</td>';
							echo '<td>'. $produtos['Comitensdaoperacao']['obs'] .'</td></tr>';
						}
					?>
				</table>
			</section>
	</section>
	
	<!-- INICIO FORNECEDOR -->
	<header>Fornecedores da Cotação</header>	
	<section>
			<section class="tabela_fornecedores_view">
				<table id="tbl_fornecedores" >
					<thead>
						<th>Nome do Fornecedor</th>
						<th>CPF/CNPJ</th>								
					</thead>
					
					<?php 
						foreach($cotacao['Parceirodenegocio'] as $parceiro){
							echo '<tr><td>'. $parceiro['nome'] .'</td>';
							echo '<td>'. $parceiro['cpf_cnpj'] .'</td></tr>';
						}
					?>
				</table>
			</section>
	</section>
	
	<!-- INICIO DAS RESPOSTAS DA COTAÇÃO -->
	<header>Respostas da Cotação</header>	
	<section>
			<section class="tabela_fornecedores_view">
				<table id="tbl_fornecedores" >
					<thead>
						<th>Ações</th>
						<th>Fornecedor</th>
						<th>Data Resposta</th>								
						<th>Valor</th>								
						<th>Forma Pagamento</th>								
						<th>Obs. Pagamento</th>								
						<th>Prazo Entrega</th>								
						<th>Status</th>								
														
					</thead>
					
					<?php 
						$j=0;
						foreach($resposta as $respostas){
							if($respostas['Comresposta']['status'] != 'DESCARTADA'){
							echo "<tr>";
							echo "<td>";
								echo "<a href='myModal_add-view_itens".$j."' class='bt-showmodal'>"; 
									echo $this->Html->image('listar.png',array('alt'=>'Visualizar Itens da Resposta','class' => 'bt-visualizarParcela img-lista','title'=>'Visualizar Itens da Resposta'));
								echo "</a>";
							
								//MODAL DOS ITENS DAS RESPOSTAS
							?>
						<div class="modal fade" id="myModal_add-view_itens<?php echo $j; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-body">
						
								<header class="cabecalho">
								<?php 
									echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
									echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 

								?>	
								<h1>Produtos da Resposta</h1>
								</header>
				
								<section>
									<header>Produtos</header>
				
									<section class="coluna-modal">
										<table>
											<thead>
												<tr>
													<th>Produto</th>
													<th>Quantidade</th>
													<th>r Unitário</th>
													<th>Valor Total</th>
													<th>Fabricante</th>
													<th>Obs</th>											
												</tr>											
											</thead>
												
											<?php
												foreach($respostas['Comitensresposta'] as $itens){
													
													echo "<tr>";
														echo "<td>". $itens['produto_nome'] ."</td>";
														echo "<td>". $itens['qtde'] ."</td>";
														echo "<td class='labelTd itenUnit'>". converterMoeda($itens['valor_unit']) ."</td>";
														echo "<td>". converterMoeda($itens['valor_total']) ."</td>";
														echo "<td>". $itens['fabricante'] ."</td>";
														echo "<td>". $itens['obs'] ."</td>";	
													echo "</tr>";
												}									
											?>
										</table>
									</section>
								</section>
							</div>
						</div>
							
																
						<?php
							echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Resposta','class' => '','title'=>'Visualizar Resposta','url'=>array('controller'=>'Comrespostas','action'=>'view',$respostas['Comresposta']['id'])));

							echo $this->Form->postLink($this->Html->image('pedido-acao.png',array('id'=>'bt-cancelar','alt' =>__('Fazer Pedido'),'title' => __('Fazer Pedido'))), array('controller' => 'Pedidos','action' => 'addResposta',$respostas['Comresposta']['id']	),array('escape' => false, 'confirm' => __('Tem certeza que deseja fazer pedido dessa resposta?', $respostas['Comresposta']['id'])));
							
							if($respostas['Comresposta']['status'] != 'DESCARTADA'){
								echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'bt-cancelar','alt' =>__('Descartar Resposta'),'title' => __('Descartar Resposta'))), array('controller' => 'Comrespostas','action' => 'descartarCotacao',$respostas['Comresposta']['id'],$cotacao['Cotacao']['id']),array('escape' => false, 'confirm' => __('Tem certeza que deseja descartar resposta?', $respostas['Comresposta']['id'])));
							}	
							
							echo "</td>";
								echo "<td>". $respostas['Parceirodenegocio']['nome']."</td>";
								formatDateToView($respostas['Comresposta']['data_resposta']);
								echo "<td>". $respostas['Comresposta']['data_resposta']."</td>";
								echo "<td>". converterMoeda($respostas['Comresposta']['valor']) ."</td>";
								echo "<td>". $respostas['Comresposta']['forma_pagamento']."</td>";
								echo "<td>". $respostas['Comresposta']['obs_pagamento']."</td>";
								echo "<td>". $respostas['Comresposta']['prazo_entrega']."</td>";
								echo "<td>". $respostas['Comresposta']['status']."</td>";			
							echo "</tr>";
							}
						$j++;
						}
						
					?>
				</table>
			</section>
	</section>
	
</section>

<footer>

	<?php
		if($cotacao['Cotacao']['status'] != 'CANCELADO'){
			echo $this->Form->postLink($this->Html->image('botao-excluir2.png',array('id'=>'bt-cancelar','class'=>'bt-esquerda','alt' =>__('Cancelar Cotação'),'title' => __('Cancelar Cotação'))), array('controller' => 'Cotacaos','action' => 'cancelarCotacao',$cotacao['Cotacao']['id']),array('escape' => false, 'confirm' => __('Tem certeza que deseja cancelar esta Cotação?', $cotacao['Cotacao']['id'])));
		}


	?>

</footer>


<script type="text/javascript">
	$(document).ready(function(){
	    $(".bt-showmodal").click(function(){
		nome = $(this).attr('href');
		$('#'+nome).modal('show');
			    
	    });	
		
	});
</script>
