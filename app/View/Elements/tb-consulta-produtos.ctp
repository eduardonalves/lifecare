<?php
	//Inicio de consulta de Produtos
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'produtos'){
?>
	
	<?php echo $this->element('paginador_superior');?>

	<div class="tabelas" id="produtos">
		
		<table cellpadding="0" cellspacing="0">
			<tr>
					<th class="colunaProduto">Ações</th>
					
					<?php 
					//Inicio da checagem das colunas de produtos
					if(isset($configprod)){ ?>
						
						
						 <?php 
						 
							foreach($configprod as $campo=>$campoLabel)
						 {
							 
							 echo "<th id=\"$campo\" class=\"colunaProduto comprimentoMinimo $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
							 
						 }

						 ?>

			</tr>

			<?php 

			foreach ($produtos as $produto): 

			?>
		
				<tr>
						<td class="actions">
							<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'produtos','action' => 'view', $produto['Produto']['id']))); ?>
							<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar','url'=>array('controller' => 'produtos','action' => 'edit', $produto['Produto']['id']))); ?>
						</td>
						
						 <?php 

							$produto['Produto']['ativo'] = ($produto['Produto']['ativo']==true) ? 'Ativo' : 'Inativo';
							$produto['Produto']['bloqueado'] = ($produto['Produto']['bloqueado']===true) ? 'Sim' : 'Não';


						 	foreach($configprod as $campo=>$campoLabel){							
								if($campo=="nivel"){
									echo "<td>" . $this->Html->image('semaforo-' . strtolower($produto['Produto']['nivel']) . '-12x12.png', array('alt' => '-'.$produto['Produto']['nivel'], 'title' => '-')) . "&nbsp;</td>";
									
								}else if($campo == "composicao"){
									echo "<td class=\"$campo\"><span title=\"". $produto['Produto']['composicao']. "\">" . h($produto['Produto'][$campo]) . "&nbsp;</span></td>";	
									
								}else if($campo == "descricao"){
	
									echo "<td class=\"$campo\"><span title=\"". $produto['Produto']['descricao']. "\">" . h($produto['Produto'][$campo]) . "&nbsp;</span></td>";	
								
								}else if($campo == "dosagem"){
	
									echo "<td class=\"$campo\"><span title=\"". $produto['Produto']['dosagem']. "\">" . h($produto['Produto'][$campo]) . "&nbsp;</span></td>";	
								
								}else if($campo == "preco_venda"){
									
									$varlor =  h($produto['Produto']['preco_venda']);
									$varlor = str_replace(".", ",",$varlor);
										
									echo "<td class=\"$campo\">".$varlor."</td>";	
								
								}else if($campo == "codigo"){
	
									echo "<td class=\"$campo\"><span title=\"". $produto['Produto']['id']. "\">" . h($produto['Produto']['id']) . "&nbsp;</span></td>";	
								
								}else if($campo == "categoria"){
									if(count ($produto['Categoria']) == 0){
											$produto['Categoria'] = array(0 => '-');
										}else{
											$categoria = "";
											foreach($produto['Categoria'] as $key=>$cat)
											{
												$categoria .= ($categoria=='') ? $cat['nome'] : "<br />" . $cat['nome'];

											}
											
										}
										
									echo "<td class=\"$campo\"><span title=\"". $categoria. "\">" . $categoria . "&nbsp;</span></td>";								
								}else{
									
									echo "<td class=\"$campo\">" . $produto['Produto'][$campo] . "&nbsp;</td>";
								}
								
							}						
							
						?>
				</tr>

			<?php 

			endforeach; ?>
		</table>
		
		<?php echo $this->element('paginador_inferior');?>
	</div>
	
	
	<?php
			}
		}
	}
	//fim de Consulta de produtos
	
	?>
	

