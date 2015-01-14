<?php
	//Inicio de consultas de itens do Lotes
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'itensdolote'){
?>
	
	<?php echo $this->element('paginador_superior');?>
	
	<div class="tabelas" id="itensdoproduto">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th class="colunaProduto actions"><?php echo __('Ações'); ?></th>
				
								
				<?php //Inicio da checagem das colunas de produtos
					if(isset($configprod)){ ?>
						
						
						 <?php 
						 
							foreach($configprod as $campo=>$campoLabel){
								echo "<th class=\"colunaProduto $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "</th>";
							}
				//.................................................................................................
						?>
				
						
										
				<?php
					
					foreach($configlot as $campo=>$campoLabel)
					{
						echo "<th class=\"colunaLote $campo\">". $this->Paginator->sort($campo, $campoLabel) ."</th>";
					}
				//.................................................................................................		
				?>
				
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>							 
						<th  class="colunaLoteIten"><?php echo $this->Paginator->sort('Loteiten.qtde','Qtd. Movimentação');?></th>
						<th  class="colunaLoteIten"><?php echo $this->Paginator->sort('Loteiten.valor_unitario','Unitário(R$)');?></th>
						<th  class="colunaLoteIten"><?php echo $this->Paginator->sort('Loteiten.valor_total','Total(R$)');?></th>
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>
			
				<?php
					
					foreach($confignot as $campo=>$campoLabel)
					{
						echo "<th class=\"colunaES $campo\">". $this->Paginator->sort($campo, $campoLabel) ."</th>";
					}
				//.................................................................................................		
				?>
						
				<?php foreach ($loteitens as $loteiten): ?>
		
				<tr>
					<td class="actions">
							<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'produtos','action' => 'view', $loteiten['Produto']['id']))); ?>
							<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar','url'=>array('controller' => 'produtos','action' => 'edit', $loteiten['Produto']['id']))); ?>
					</td>
					
		
					 <?php 
							$loteiten['Produto']['ativo'] = ($loteiten['Produto']['ativo']==true) ? 'ATIVO' : 'INATIVO';
							$loteiten['Produto']['bloqueado'] = ($loteiten['Produto']['bloqueado']===true) ? 'BLOQUEADO' : 'NÃO BLOQUEADO';
					 
							foreach($loteiten['Lote'] as $key=>$value){
								if ( strstr($key, "data") ) {
									$loteiten['Lote'][$key] = $this->Time->format($loteiten['Lote'][$key],'%d/%m/%Y');
								}
						
							}
							foreach($loteiten['Nota'] as $key=>$value){
								if ( strstr($key, "data") ) {
									$loteiten['Nota'][$key] = $this->Time->format($loteiten['Nota'][$key],'%d/%m/%Y');
								}
						
							}					 
					 
						 	foreach($configprod as $campo=>$campoLabel)
						 	{
								/*
								if($campo!="nivel")
								{
								echo "<td class=\"$campo\">" . h($loteiten['Produto'][$campo]) . "&nbsp;</td>";
								}else{
								echo "<td class=\"$campo\">" . $this->Html->image('semaforo-' . strtolower($loteiten['Produto']['nivel']) . '-12x12.png', array('alt' => '-'.$loteiten['Produto']['nivel'], 'title' => '-')) . "&nbsp;</td>";
								}
								*/
								if($campo=="nivel"){
									echo "<td>" . $this->Html->image('semaforo-' . strtolower($loteiten['Produto']['nivel']) . '-12x12.png', array('alt' => '-'.$loteiten['Produto']['nivel'], 'title' => '-')) . "&nbsp;</td>";
									
								}else if($campo == "composicao"){
									//echo "<td class=\"$campo\">" . h($produto['Produto'][$campo]) . "&nbsp;</td>";
									echo "<td class=\"$campo\"><span title=\"". $loteiten['Produto']['composicao']. "\">" . h($loteiten['Produto'][$campo]) . "&nbsp;</span></td>";	
									
								}else if($campo == "descricao"){
									//echo "<td class=\"$campo\">" . h($produto['Produto'][$campo]) . "&nbsp;</td>";
									echo "<td class=\"$campo\"><span title=\"". $loteiten['Produto']['descricao']. "\">" . h($loteiten['Produto'][$campo]) . "&nbsp;</span></td>";	
								}else{
									echo "<td class=\"$campo\">" . h($loteiten['Produto'][$campo]) . "&nbsp;</td>";
								}
								
							}
				//.................................................................................................	
						?>
					
						
					<?php
					
						foreach($configlot as $campo=>$campoLabel)
						{
							/*
							if($campo == 'status') {
								echo "<td class=\"$campo\">".$this->Html->image('semaforo-icon-' . strtolower($loteiten['Lote']['status']) . '-16x16.png', array('alt' => 'Status de estoque: '.$loteiten['Lote']['status'], 'title' => 'Status de estoque')). "</td>";
							}
							else{
								echo "<td class=\"$campo\">". h($loteiten['Lote'][$campo]) ."</td>";
							}
							*/
							
							if($campo == 'status') {
								echo "<td class='$campo'>".$this->Html->image('semaforo-icon-' . strtolower($loteiten['Lote']['status']) . '-16x16.png', array('alt' => 'Status de estoque: '.$loteiten['Lote']['status'], 'title' => 'Status de estoque')). "</td>";
							}
							else{
								echo "<td class='$campo'>". h($loteiten['Lote'][$campo]) ."</td>";
							}
						}
				//.................................................................................................	
					?>		
					
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>
							<td><?php echo h($loteiten['Loteiten']['qtde']); ?>&nbsp;</td>
							<td><?php echo h($loteiten['Produtoiten']['valor_unitario']); ?>&nbsp;</td>
							<td><?php echo h($loteiten['Produtoiten']['valor_total']); ?>&nbsp;</td>
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>
					
						
				<?php
					
					foreach($confignot as $campo=>$campoLabel)
					{
						//echo "<td class=\"$campo\">". h($loteiten['Nota'][$campo]) ."</td>";
						
						if($campo == "descricao"){
							echo "<td class=\"$campo\"><span title=\"". $loteiten['Nota']['descricao']. "\">" . h($loteiten['Nota'][$campo]) . "&nbsp;</span></td>";
						}else{
							echo "<td class='$campo'>". h($loteiten['Nota'][$campo]) ."</td>";
						}
						
					}
						
				//.................................................................................................			
					?>
				</tr>
				
				<?php endforeach; }?>
			
			
			
		</table>
		
		<?php echo $this->element('paginador_inferior');?>
	</div>	
		
	<?php
			
		}
	}
	//Fim de consultas de itens do lote
?>
