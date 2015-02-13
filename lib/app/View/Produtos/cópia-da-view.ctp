<?php 
	$this->start('css');
	echo $this->Html->css('view_produtos');
	$this->end();
?>

<header>
	
	<?php 
		echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar'));
	?>

	<h1 class="menuOption1">Consultas</h1>

	<script>
		$('img').tooltip();
	</script>
	
</header>

<section><!--SECTION SUPERIOR--> 
	<header>Visualizar Detalhes do Produto</header>
	<section class="coluna-esquerda">
		<div class="coluna-content">

			<?php				
				echo $this->Form->create('Produto');
				
				echo $this->Form->input('Produto.codigo', array('type'=>'text','label'=>'Código:','value'=>h($produto['Produto']['codigo']),'class'=>'','id'=>'','disabled'=>'disabled'));
				
				echo $this->Form->input('Produto.codigoEan', array('type'=>'text','label'=>'Código EAN:','value'=>h($produto['Produto']['codigoEan']),'class'=>'','disabled'=>'disabled'));
				
				echo $this->Form->input('Produto.nome', array('type'=>'text','label'=>'Nome:','value'=>h($produto['Produto']['nome']),'class'=>'','id'=>'','disabled'=>'disabled'));
				
				echo $this->Form->input('Produto.composicao', array('type'=>'text','label'=>'Composição:','value'=>h($produto['Produto']['composicao']),'class'=>'','id'=>'','disabled'=>'disabled'));
				
				echo $this->Form->input('Produto.dosagem', array('type'=>'text','label'=>'Dosagem:','value'=>h($produto['Produto']['dosagem']),'class'=>'','id'=>'','disabled'=>'disabled'));
				
				echo $this->Form->input('Produto.unidade', array('type'=>'text','label'=>'Unidade:','value'=>h($produto['Produto']['unidade']),'class'=>'','id'=>'','disabled'=>'disabled'));
				
				?>
				
				<div class="input text">
					<label>Categorias:</label>
					<div class="coluna-categorias">

				<?php
				

				$categorias = $produto['Categoria'];

				for($i=0; $i<count($categorias); $i++)
				{
					echo $this->Form->input('categoria['.$i.']', array('type'=>'text','div'=>false, 'label'=>false,'value'=>h($categorias[$i]['nome']),'class'=>'input text','id'=>'','disabled'=>'disabled'));
				}

				?>					
					</div>
				</div>
				
				<?php

				echo $this->Form->input('Produto.fabricante', array('type'=>'text','label'=>'Fabricante:','value'=>h($produto['Produto']['fabricante']),'class'=>'','id'=>'','disabled'=>'disabled'));
				
				echo $this->Form->input('Produto.descricao', array('type'=>'textarea','label'=>'Descrição:','value'=>h($produto['Produto']['descricao']),'class'=>'textarea-view','id'=>'','disabled'=>'disabled'));
			?>

		</div>	
	</section>
		
	<section class="coluna-central" >
		<fieldset>
			<legend>Dados do Tributário</legend>

			<div class="coluna-content">

				<?php		
					foreach($produto['Tributo'] as $tributo){

						echo $this->Form->input('Tributo.ncm', array('type'=>'text','label'=>'NCM:','value'=>h($tributo['ncm']),'class'=>'','id'=>'','disabled'=>'disabled'));
	
						echo $this->Form->input('Tributo.cfop', array('type'=>'text','label'=>'CFOP:','value'=>h($tributo['cfop']),'class'=>'','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_icms', array('type'=>'text','label'=>'ICMS:','value'=>h($tributo['al_icms']),'class'=>'','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.codigo_selo_ipi', array('type'=>'text','label'=>'Código Selo IPI:','value'=>h($tributo['codigo_selo_ipi']),'class'=>'','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.qtde_selo_ipi', array('type'=>'text','label'=>'Quantidade Selo IPI:','value'=>h($tributo['qtde_selo_ipi']),'class'=>'','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_ipi', array('type'=>'text','label'=>'IPI:','value'=>h($tributo['al_ipi']),'class'=>'','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_cst', array('type'=>'text','label'=>'CST:','value'=>h($tributo['al_cst']),'class'=>'','id'=>'','disabled'=>'disabled'));
						
						echo $this->Form->input('Tributo.al_pis', array('type'=>'text','label'=>'PIS:','value'=>h($tributo['al_pis']),'class'=>'','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_confins', array('type'=>'text','label'=>'COFINS:','value'=>h($tributo['al_confins']),'class'=>'','id'=>'','disabled'=>'disabled'));
					}						
				?>

			</div>
		</fieldset>
	</section>

	<section class="coluna-direita" >
		<fieldset>
			<legend>Dados do Estoque</legend>

			<div class="coluna-content">

				<?php
					echo $this->Form->input('Estoque Atual:', array('type'=>'text','value'=>h($estoque),'class'=>'','id'=>'','disabled'=>'disabled'));
				?>

				<span><?php echo $this->html->image('semaforo-bomba	.png');?></span>

				<?php
					/* Não implementado */
					/*
					echo $this->Form->input('Compras Total', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Qtd. Vendida', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Pedidos a  Receber', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Pedidos a Entregar', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					*/
					
					echo $this->Form->input('Produto.estoque_minimo', array('type'=>'text','label'=>'Estoque Mínimo:','value'=>h($produto['Produto']['estoque_minimo']),'','class'=>'','disabled'=>'disabled'));
					
					/*
					echo $this->Form->input('Estoque Ideal', array('type'=>'text','value'=>'Adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Bloqueado', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled')); 		
					*/
					
					echo $this->Form->input('Produto.ativo', array('type'=>'text','label'=>'Status:','value'=>( $produto['Produto']['ativo'] ? "Ativo" : "Inativo" ),'class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->end();
				?>

			</div>

			<table align="center">
				<tr>
					<th>Lote:</th>
					<th>Data Val.:</th>
					<th>Qtd.:</th>
					<th>Posição Estoque.:</th>
					<th></th>
				</tr>

				<?php
					foreach($lotes as $lote){
				?>

				<tr>
					<td><?php echo $lote['Lote']['numero_lote'];  ?></td>
					<td><?php echo $lote['Lote']['data_validade']; ?></td>
					<td><?php echo $lote['Lote']['estoque']; ?></td>
					<td style="text-align: center;">
						<div id="posicoes-lote-<?php echo $lote['Lote']['id']; ?>" class="posicoes-estoque">

							<?php
								foreach($lote['Posicaoestoque'] as $posicao){
							?>

								<?php echo $this->Html->image('listar.png', array('title'=>h($posicao['descricao']),'rel'=>'tooltip')); ?>

								<br />

							<?php
								}
							?>

						</div>
					</td>
					<td style="border:none !important"><img src="" class="semaforo-<?php echo strtolower($lote['Lote']['status']); ?>" /></td>			
				</tr>

				<?php
					}
				?>
			</table>
		</fieldset>
	</section>
</section><!---Fim section-superior--->
		
<footer>
	<?php	
		echo $this->html->image('botao-voltar.png',array('alt'=>'Voltar',
														 'title'=>'Voltar',
														 'class'=>'bt-voltar',
														 'url'=>array('action'=>'view',
														 $produto['Produto']['id'])));

		echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',
													 $produto['Produto']['id'])));
	?>
</footer>
