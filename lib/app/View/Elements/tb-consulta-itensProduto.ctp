<?php

	//Inicio de consultas itens de produtos
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'itensdoproduto'){
						
	?>
	
	<?php echo $this->element('paginador_superior');?>
	
	<div class="tabelas" id="itensdoproduto">
		<table cellpadding="0" cellspacing="0">
				<tr>
					<th class="colunaProduto">Ações</th>
						<?php 
					//Inicio da checagem das colunas de produtos
					if(isset($configprod)){ ?>
						

					
				<?php  // #### TH PRODUTO
						 
							foreach($configprod as $campo=>$campoLabel)
						 {
							 
							 echo "<th class=\"colunaProduto $campo\">" . $this->Paginator->sort('Produto.'.$campo, $campoLabel) . "</th>";
							 
						 }

				 ?>
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>							 
						<th  class="colunaProdutoIten"><?php echo $this->Paginator->sort('Produtoiten.qtde','Qtd. Item');?></th>
						<th  class="colunaProdutoIten"><?php echo $this->Paginator->sort('Produtoiten.valor_unitario','Valor Unitário(R$)');?></th>
						<th  class="colunaProdutoIten"><?php echo $this->Paginator->sort('Produtoiten.valor_total','Valor Total(R$)');?></th>
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>
				
				<?php // ##### TH NOTA
					
					foreach($confignot as $campo=>$campoLabel)
					{
						echo "<th class='colunaES $campo'>". $this->Paginator->sort('Nota.'.$campo, $campoLabel) ."</th>";
						
					}

						
				?>
					
				</tr>

			<?php foreach ($produtoitens as $produtoiten): ?>
		
				<tr>
					<td class="actions">
							<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'produtos','action' => 'view', $produtoiten['Produto']['id']))); ?>
							<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar','url'=>array('controller' => 'produtos','action' => 'edit', $produtoiten['Produto']['id']))); ?>
					</td>
					
						
						<?php // ##### TD'S PRODUTOO
							$produtoiten['Produto']['ativo'] = ($produtoiten['Produto']['ativo']==true) ? 'ATIVO' : 'INATIVO';
							$produtoiten['Produto']['bloqueado'] = ($produtoiten['Produto']['bloqueado']===true) ? 'BLOQUEADO' : 'NÃO BLOQUEADO';

						 	foreach($configprod as $campo=>$campoLabel)
						 	{
								/*
								if($campo!="nivel")
								{
								echo "<td class='$campo'>" . h($produtoiten['Produto'][$campo]) . "&nbsp;</td>";
								}else{
								echo "<td class='$campo'>" . $this->Html->image('semaforo-icon-' . strtolower($produtoiten['Produto']['nivel']) . '-16x16.png', array('alt' => '-'.$produtoiten['Produto']['nivel'], 'title' => '-')) . "&nbsp;</td>";
								}
								*/
								
								if($campo=="nivel"){
									echo "<td>" . $this->Html->image('semaforo-' . strtolower($produtoiten['Produto']['nivel']) . '-12x12.png', array('alt' => '-'.$produtoiten['Produto']['nivel'], 'title' => '-')) . "&nbsp;</td>";
									
								}else if($campo == "composicao"){
									//echo "<td class=\"$campo\">" . h($produto['Produto'][$campo]) . "&nbsp;</td>";
									echo "<td class=\"$campo\"><span title=\"". $produtoiten['Produto']['composicao']. "\">" . h($produtoiten['Produto'][$campo]) . "&nbsp;</span></td>";	
									
								}else if($campo == "descricao"){
									//echo "<td class=\"$campo\">" . h($produto['Produto'][$campo]) . "&nbsp;</td>";
									echo "<td class=\"$campo\"><span title=\"". $produtoiten['Produto']['descricao']. "\">" . h($produtoiten['Produto'][$campo]) . "&nbsp;</span></td>";	
								}else{
									echo "<td class=\"$campo\">" . h($produtoiten['Produto'][$campo]) . "&nbsp;</td>";
								}
								
							}

						?>
						<?php //###### ATENCAO PRA PRODUTO ITEN ?>
							<td><?php echo h($produtoiten['Produtoiten']['qtde']); ?>&nbsp;</td>
							<td><?php echo h($produtoiten['Produtoiten']['valor_unitario']); ?>&nbsp;</td>
							<td><?php echo h($produtoiten['Produtoiten']['valor_total']); ?>&nbsp;</td>
						<?php //###### ATENCAO PRA PRODUTO ITEN ?>
			
						
				<?php // #### TD'S NOTA
				
					foreach($produtoiten['Nota'] as $key=>$value){		
						if ( strstr($key, "data") ) {
							$produtoiten['Nota'][$key] = $this->Time->format($produtoiten['Nota'][$key],'%d/%m/%Y');
						}		
					}	
						
					
					foreach($confignot as $campo=>$campoLabel)
					{
						if($campo == "descricao"){
							echo "<td class=\"$campo\"><span title=\"". $produtoiten['Nota']['descricao']. "\">" . h($produtoiten['Nota'][$campo]) . "&nbsp;</span></td>";
						}else{
							echo "<td class='$campo'>". h($produtoiten['Nota'][$campo]) ."</td>";
						}
					}
					
					
				?>

		</tr>

			<?php endforeach; 
			}?>
		</table>
		
		<?php echo $this->element('paginador_inferior');?>
	</div>	
		
	
	<?php
			
		}
	}
	//Fim de consultas de itens de  produtos
		
	?>
