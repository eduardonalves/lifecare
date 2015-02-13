<?php

	//Inicio de consultas itens de produtos
	if(isset($_GET['parametro'])){
		if($_GET['parametro'] == 'notas'){
			
			
	?>
	
	<?php echo $this->element('paginador_superior');?>
	
	<div class="tabelas" id="itensdoproduto">
		<table cellpadding="0" cellspacing="0">
				<tr>
					
				<?php 
					//Inicio da checagem das colunas da nota
					if(isset($confignot)){ ?>
					
				
				<?php
					
					foreach($confignot as $campo=>$campoLabel)
					{
						echo "<th class='colunaLote'>". $this->Paginator->sort($campo, $campoLabel) ."</th>";
						
					}
						
				?>
			</tr>
			
			<?php foreach ($notas as $nota): ?>
		
				<tr>
					<td class="actions">
							<?php echo $this->Html->image('botao-tabela-visualizar.png',array('title'=>'Visualizar','url'=>array('controller' => 'produtos','action' => 'view', $nota['Produto']['id']))); ?>
							<?php echo $this->Html->image('botao-tabela-editar.png',array('title'=>'Editar','url'=>array('controller' => 'produtos','action' => 'edit', $nota['Produto']['id']))); ?>
					</td>
					
									<?php
					
					foreach($confignot as $campo=>$campoLabel)
					{
						echo "<td class='colunaLote'>". $this->Paginator->sort($campo, $campoLabel) ."</td>";
						
					}
						
				?>
				</tr>
				
				<?php endforeach; ?>
			
			
			<?php } //Fim IF ?>
		</table>
		
		<?php //echo $this->element('paginador_inferior');?>
	</div>	
	
<?php
			
		}
	}
	//Fim de consultas de lotes
	
?>
