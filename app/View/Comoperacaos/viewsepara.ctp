<?php
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('separacao');
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
					$status_estoque = 'Separação';
				}else if($comoperacao['Comoperacao']['status_estoque'] == 'SEPARADO'){
					$status_estoque = 'Separado';
				}
				
				$autorizado_por = '';
				if(!empty($vendedor['Comoperacao']['autorizado_por'])){ $autorizado_por = $vendedor['Comoperacao']['autorizado_por'];}
			
			?>
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Status:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',$status_estoque,array('class'=>'valor'));?>	</div>
			</div>
			
			<div class="conteudo-linha">
				<div class="linha"><?php echo $this->Html->Tag('p','Autorização:',array('class'=>'titulo'));?></div>
				<div class="linha2"><?php echo $this->Html->Tag('p',$autorizado_por,array('class'=>'valor'));?>	</div>
			</div>	
		</div>
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
											<td>Quantidade</td>
											<td>Trocar Lote</td>
											<td>Confirmar Lote</td>
										</tr>
									</thead>
									
									<tbody>
										<?php											
											foreach($comoperacao['Produto'][$j]['lotes'] as $lote){
										?>				
												<tr>
													<td><?php echo $lote['Lote']['numero_lote']?></td>
													<td><?php echo $lote['Lote']['estoque']?></td>
													<td>Botão</td>
													<td>Botão</td>
												
												
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
	
	<div style="clear:both;"></div>
	<br />
<pre>
	<?php
		print_r($comoperacao['Produto'][1]['lotes']);
	?>
</pre>
	
