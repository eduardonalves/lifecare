<?php
	$this->start('css');
		echo $this->Html->css('consulta_vendas');
		echo $this->Html->css('separacao');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();
	
	$this->start('script');
		echo $this->Html->script('separacao');
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
		
	<h1 class="menuOption26">Consulta Separação</h1>
</header>

<section>
	<header></header>
	
	<section> <!-- INICIO SECTION FILTROS -->

		<fieldset class="filtros">
			
			<div class="content-filtros"> <!-- INICIO BLOCOS DOS FILTROS -->
			
				<!------------------ Dados da Operação ------------------>
				<section id="filtro-operacao" class="coluna-esquerda">
					<span  class="boxTitulo">Dados da Operação</span>
					
					<?php echo $this->Search->create();	?>
					
					<div class="informacoesOperacao">
						<?php echo $this->Search->input('tipoOperacao', array('type' => 'hidden','value'=>'PDVENDA')); ?>
						
						<div class="inputSearchData">
						<?php
							echo $this->Search->input('data_inici', array('label' => 'Data de Início:','class'=>'', 'type' => 'text'));
						?>
						</div>
		
						<div class="inputSearchData Datas">
						<?php
							echo $this->Search->input('data_entrega', array('label' => 'Data de Entrega:','class'=>'', 'type' => 'text'));
						?>
						</div>
					
						<div class="statusSelect" >
							<?php
								echo $this->Search->input('status_operacao', array('label' => 'Status:','class'=>'tamanho-medio'));
							?>
						</div>
						
						<div class="statusSelect" >
							<?php
								echo $this->Search->input('status_estoque', array('label' => 'Status Estoque:','class'=>'tamanho-medio'));
							?>
						</div>
					</div>
				</section>
				
				<!------------------ Filtro Do Produto ------------------>
				<section id="filtro-produto" class="coluna-central">
					<span class="boxTitulo">Dados do Produto</span>
					
					<div class="informacoesProduto">
						<?php
							echo $this->Search->input('produtoNome', array('label' => 'Nome:','class'=>'input-alinhamento tamanho-medio combo-autocomplete'));
						?>
					</div>
				</section>		
				
				<footer>
					<?php echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar-compras')); ?>
				</footer>
			
			</div> <!------- FIM BLOCOS DOS FILTROS ------>
			
			<?php echo $this->Form->end(); ?>
		</fieldset>		
		
	
	</section> <!-- FIM SECTION FILTROS -->
	
	<!-- PAGINADOR 1 SUPERIOR -->	
	<?php  echo $this->element('paginador_superior'); ?>
			
			<!-- INCIO TABELA -->
				<div class="areaTabela">
					<table cellpadding="0" cellspacing="0" style="font-size: 12px !important;">
						<tr>
							<th class="colunaConta">Ações</th>
							<th class="colunaConta">Código</th>
							<th class="colunaConta">Cliente</th>
							<th class="colunaConta">Data Inicial</th>
							<th class="colunaConta">Data Entrega</th>
							<th class="colunaConta">Vendedor</th>
							<th class="colunaConta">Autorização</th>
							<th class="colunaConta">Status</th>							
							<th class="colunaConta">Status Estoque</th>							
						</tr>
						
						<?php							
							$j=0;
							foreach ($comoperacaos as $comoperacao):						
						?>
								<tr>
									<td>
										<?php 
											echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Produtos para Separar','title'=>'Visualizar Produtos para Separar','url'=>array('controller' => 'Comoperacaos','action' => 'viewsepara', $comoperacao['Comoperacao']['id']))); 
										?>
									</td>
									<td><?php echo $comoperacao['Comoperacao']['id'] ?></td>
									<td><?php if(!empty($comoperacao['Parceirodenegocio'][0]['nome'])){ echo $comoperacao['Parceirodenegocio'][0]['nome']; }?></td>
									<td><?php echo formatDateToView($comoperacao['Comoperacao']['data_inici']); ?></td>
									<td><?php echo formatDateToView($comoperacao['Comoperacao']['data_entrega']); ?></td>
									<td><?php if(!empty($comoperacao['Comoperacao']['vendedor_nome'])){ echo $comoperacao['Comoperacao']['vendedor_nome']; }?></td>
									<td><?php echo $comoperacao['Comoperacao']['autorizado_por'] ?></td>
									<td><?php echo $comoperacao['Comoperacao']['status'] ?></td>
									<td><?php echo $comoperacao['Comoperacao']['status_estoque'] ?></td>
								</tr>
						<?php endforeach; ?>
					</table>				
				</div>			
			<!-- FIM TABELA -->
	
	
	<!-- PAGINADOR 2 INFERIOR -->
	<?php echo $this->element('paginador_inferior');?>

</section>

