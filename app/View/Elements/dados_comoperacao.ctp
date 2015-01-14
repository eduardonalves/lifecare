<section> <!---section Baixo--->	
<header class="">Últimos Pedidos</header>
			<table>
				<thead>			
					<th>Ações</th>
					<th>Código</th>
					<th>Valor</th>
					<th>Data Inicial</th>
					<th>Data Final</th>
					<th>Forma Pagamento</th>
					<th>Prazo Entrega</th>
					<th>Prazo Pagamento</th>
					<th>Status</th>	
				</thead>

				<?php
				$j=0;
					
					foreach($opercaoParceiro as $pedidos){
						echo '<tr><td>';
							echo "<a href='myModal_add-view_operacoes".$j."' class='bt-showmodal'>"; 
								echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Itens da Operação','class' => 'bt-visualizarParcela img-lista','title'=>'Visualizar Itens da Operação'));
							echo "</a>";
						?>
								
						<div class="modal fade" id="myModal_add-view_operacoes<?php echo $j; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-body">
					
							<header class="cabecalho">
							<?php 
								echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
								echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 

							?>	
								<h1>Visualização dos Produtos</h1>
							</header>
			
							<section>
							<header>Produtos</header>
			
								<section class="coluna-modal">
									<table>
									<thead>
										<tr>
										<th>Produto</th>
										<th>Quantidade</th>
										<th>Valor Unitário</th>
										<th>Valor Total</th>
										<th>Obs</th>
										
										</tr>											
									</thead>
											
									<?php
										foreach($pedidos['Comitensdaoperacao'] as $itens){
											echo "<tr>";
												echo "<td>". $itens['produto_nome'] ."</td>";
												echo "<td>". $itens['qtde'] ."</td>";
												echo "<td>". $itens['valor_unit'] ."</td>";
												echo "<td>". $itens['valor_total'] ."</td>";
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
						echo '</td>';
						
						echo '<td>'. $pedidos['Comoperacao']['codcotacao'] .'</td>';
						echo '<td>'. $pedidos['Comoperacao']['valor'] .'</td>';
							formatDateToView($pedidos['Comoperacao']['data_inici']);
							formatDateToView($pedidos['Comoperacao']['data_fim']);
						echo '<td>'. $pedidos['Comoperacao']['data_inici'] .'</td>';
						echo '<td>'. $pedidos['Comoperacao']['data_fim'] .'</td>';
						echo '<td>'. $pedidos['Comoperacao']['forma_pagamento'] .'</td>';
						echo '<td>'. $pedidos['Comoperacao']['prazo_entrega'] .'</td>';
						echo '<td>'. $pedidos['Comoperacao']['prazo_pagamento'] .'</td>';
						echo '<td>'. $pedidos['Comoperacao']['status'] .'</td>';
						echo '</tr>';
						
						$j++;
					}
					
				?>
			</table>
<script type="text/javascript">
	$(document).ready(function(){
	    $(".bt-showmodal").click(function(){
		nome = $(this).attr('href');
		$('#'+nome).modal('show');
			    
	    });	
		
	});
</script>
