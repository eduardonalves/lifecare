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
							
								echo "<th id=\"$campo\" class=\"colunaProduto $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
							}
				//.................................................................................................
						?>
				
						
										
				<?php
					
					foreach($configlot as $campo=>$campoLabel)
					{
						echo "<th id=\"$campo\" class=\"colunaLote setaOrdena $campo\">". $this->Paginator->sort($campo, $campoLabel) ."<div id='indica-ordem' class='posicao-seta'></div></th></th>";
					}
				//.................................................................................................		
				?>
				
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>							 
						<th id="qtde" class="colunaLoteIten setaOrdena qtde"><?php echo $this->Paginator->sort('Loteiten.qtde','Qtd. Movimentação');?><div id='indica-ordem' class='posicao-seta'></div></th>
						<th id="valor_unitario" class="colunaLoteIten setaOrdena valor_unitario"><?php echo $this->Paginator->sort('Loteiten.valor_unitario','Unitário(R$)');?><div id='indica-ordem' class='posicao-seta'></div></th>
						<th id="valor_total" class="colunaLoteIten setaOrdena valor_total"><?php echo $this->Paginator->sort('Loteiten.valor_total','Total(R$)');?><div id='indica-ordem' class='posicao-seta'></div></th>
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>
			
				<?php
					
					foreach($confignot as $campo=>$campoLabel)
					{
						if($campo=='parceirodenegocio_id'){
							echo "<th id=\"$campo\" class=\"colunaES setaOrdena parceiro\">". $this->Paginator->sort('parceiro') ."<div id='indica-ordem' class='posicao-seta'></div></th>";
						}else{
							echo "<th id=\"$campo\" class=\"colunaES setaOrdena $campo\">". $this->Paginator->sort($campo, $campoLabel) ."<div id='indica-ordem' class='posicao-seta'></div></th>";
						}
						
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
							$loteiten['Produto']['ativo'] = ($loteiten['Produto']['ativo']==true) ? 'Ativo' : 'Inativo';
							$loteiten['Produto']['bloqueado'] = ($loteiten['Produto']['bloqueado']===true) ? 'Sim' : 'Não';
					 
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
								}else if($campo == "dosagem"){
	
									echo "<td class=\"$campo\"><span title=\"". $loteiten['Produto']['dosagem']. "\">" . h($loteiten['Produto'][$campo]) . "&nbsp;</span></td>";	
								
								}else if($campo == "codigo"){
	
									echo "<td class=\"$campo\"><span title=\"". $loteiten['Produto']['id']. "\">" . h($loteiten['Produto']['id']) . "&nbsp;</span></td>";	
								
								}
								else{
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
							<?php 
							    $ponto = $loteiten['Produtoiten']['valor_unitario'];
							    $virgula = str_replace('.',',',$ponto);
							?>
							<td><?php echo h($loteiten['Produtoiten']['valor_unitario']); ?>&nbsp;</td>
							<?php 
							    $ponto = $loteiten['Produtoiten']['valor_total'];
							    $virgula = str_replace('.',',',$ponto);
							?>
							<td><?php echo h($virgula); ?>&nbsp;</td>
				<?php //###### ATENCAO PRA PRODUTO ITEN ?>
					
						
				<?php
					
					foreach($confignot as $campo=>$campoLabel)
					{
						//echo "<td class=\"$campo\">". h($loteiten['Nota'][$campo]) ."</td>";
						
						if($campo == "descricao"){
							echo "<td class=\"$campo\"><span title=\"". $loteiten['Nota']['descricao']. "\">" . h($loteiten['Nota'][$campo]) . "&nbsp;</span></td>";
						}else if($campo == "parceirodenegocio_id"){
							echo "<td class=\"$campo\"><span title=\"". $loteiten['Nota']['parceiro']. "\">" . h($loteiten['Nota']['parceiro']) . "&nbsp;</span></td>";
						}else if($campo == "tipo"){
							if($loteiten['Nota']['tipo']=="SAIDA"){
								echo "<td class=\"$campo\"><span title=\"". $loteiten['Nota']['tipo']. "\">" . $this->Html->link($loteiten['Nota']['tipo'], array('controller' => 'saidas', 'action' => 'view', $loteiten['Nota']['id'])). "&nbsp;</span></td>";
							}else{
								echo "<td class=\"$campo\"><span title=\"". $loteiten['Nota']['tipo']. "\">" . $this->Html->link($loteiten['Nota']['tipo'], array('controller' => 'entradas', 'action' => 'view', $loteiten['Nota']['id'])). "&nbsp;</span></td>";
							}
							
							
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
