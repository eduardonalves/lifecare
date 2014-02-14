<?php

	//Inicio de consultas de Lotes
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'lotes'){
			
			
	?>
	
	<?php echo $this->element('paginador_superior');?>
	
	<div class="tabelas" id="itensdoproduto">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th class="colunaProduto">Ações</th>
				
				<?php 
					//Inicio da checagem das colunas do lote
					if(isset($configlot)){ ?>
				
				<?php 
						 
							foreach($configprod as $campo=>$campoLabel)
						 {
							 
							 echo "<th class=\"colunaProduto $campo\">" . $this->Paginator->sort('Produto.'.$campo, $campoLabel) . "</th>";
							 
						 }

						 ?>	
				
				<?php
					
					foreach($configlot as $campo=>$campoLabel)
					{
						echo "<th class='colunaLote $campo'>". $this->Paginator->sort($campo, $campoLabel) ."</th>";
						
					}
						
				?>
			</tr>


			<?php foreach ($lotes as $lote): ?>
		
				<tr>
					<td class="actions">
							<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'produtos','action' => 'view', $lote['Produto']['id']))); ?>
							<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar','url'=>array('controller' => 'produtos','action' => 'edit', $lote['Produto']['id']))); ?>
					</td>
					<?php 
							$lote['Produto']['ativo'] = ($lote['Produto']['ativo']==true) ? 'Ativo' : 'Inativo';
							$lote['Produto']['bloqueado'] = ($lote['Produto']['bloqueado']===true) ? 'Sim' : 'Não';

						 	foreach($configprod as $campo=>$campoLabel){

								if($campo=="nivel"){
									echo "<td>" . $this->Html->image('semaforo-' . strtolower($lote['Produto']['nivel']) . '-12x12.png', array('alt' => '-'.$lote['Produto']['nivel'], 'title' => '-')) . "&nbsp;</td>";
									
								}else if($campo == "composicao"){
									//echo "<td class=\"$campo\">" . h($produto['Produto'][$campo]) . "&nbsp;</td>";
									echo "<td class=\"$campo\"><span title=\"". $lote['Produto']['composicao']. "\">" . h($lote['Produto'][$campo]) . "&nbsp;</span></td>";	
									
								}else if($campo == "descricao"){
									//echo "<td class=\"$campo\">" . h($produto['Produto'][$campo]) . "&nbsp;</td>";
									echo "<td class=\"$campo\"><span title=\"". $lote['Produto']['descricao']. "\">" . h($lote['Produto'][$campo]) . "&nbsp;</span></td>";	
								
								}else if($campo == "dosagem"){	
									echo "<td class=\"$campo\"><span title=\"". $lote['Produto']['dosagem']. "\">" . h($lote['Produto'][$campo]) . "&nbsp;</span></td>";	
								
								}else if($campo == "codigo"){	
									echo "<td class=\"$campo\"><span title=\"". $lote['Produto']['id']. "\">" . h($lote['Produto']['id']) . "&nbsp;</span></td>";	
								
								}else if($campo == "codigo"){	
									echo "<td class=\"$campo\"><span title=\"". $lote['Produto']['id']. "\">" . h($lote['Produto']['id']) . "&nbsp;</span></td>";	
								
								}
						
								else{
									echo "<td class=\"$campo\">" . h($lote['Produto'][$campo]) . "&nbsp;</td>";
								}
							}
						?>
					
					<?php
					
					foreach($lote['Lote'] as $key=>$value)
					{
						if ( strstr($key, "data") ) {
							$lote['Lote'][$key] = $this->Time->format($lote['Lote'][$key],'%d/%m/%Y');
						}
						
					}
					
						foreach($configlot as $campo=>$campoLabel)
						{

							if($campo == 'status') {
								echo "<td class='$campo'>".$this->Html->image('semaforo-icon-' . strtolower($lote['Lote']['status']) . '-16x16.png', array('alt' => 'Status de estoque: '.$lote['Lote']['status'], 'title' => 'Status de estoque')). "</td>";
							}else if($campo == "fabricante"){	
									echo "<td class=\"$campo\"><span title=\"". $lote['Lote']['parceirodenegocio_id']. "\">" . h($lote['Fabricante']['nome']) . "&nbsp;</span></td>";	
								
								
							}else{
								echo "<td class='$campo'>". h($lote['Lote'][$campo]) ."</td>";
							}
						}
					?>
				
			
				</tr>

			<?php endforeach; ?>
			
			
			<?php } //Fim IF ?>
		</table>
		
		<?php echo $this->element('paginador_inferior');?>
	</div>	
	
	
	
	<?php
			
		}
	}
	//Fim de consultas de lotes
	
	?>
	
	

