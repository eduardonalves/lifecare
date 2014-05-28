<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('view_produtos');
	$this->end();
	
?>

<script>/*
	var width = screen.width;

	if(width<1366){
		$("#nav-lateral").css("position","absolute");
	}

	var classMenuNumber = $('h1').attr('class');

	var optionLateral = classMenuNumber[classMenuNumber.length - 1];
	var optionSuperior = classMenuNumber[classMenuNumber.length - 2];

	$(".item").removeClass("selected");
	$("#menu li").removeClass("active");

	$("ul li:nth-child(" + optionLateral + ")").addClass("selected");
	$("#menu li:nth-child(" + optionSuperior + ")").addClass("active");*/
</script>

<header>
	
	<?php 
		echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar'));
	?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	    <?php
		if(isset($telaAbas)){
			echo '<h1 class="menuOption'.$telaAbas.'">Consultas</h1>';
		}else{
			echo '<h1 class="menuOption21">Consultas</h1>';
		}
    ?>

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
			?>
			
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Código:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['id'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">		
					<div class="linha"><?php echo $this->Html->Tag('p','Código EAN:',array('class'=>'titulo '));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['codigoEan'],array('class'=>'valor codigoean')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['nome'],array('class'=>'valor')); ?></div>
				</div>
				
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Composição:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['composicao'],array('class'=>'valor')); ?></div>
				</div>
				
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Dosagem:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['dosagem'],array('class'=>'valor'));?></div>
				</div>
				
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Unidade:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php //echo $this->Html->Tag('p',$tiposUnidades[$produto['Produto']['unidade']],array('class'=>'valor')); 
											echo $this->Html->Tag('p',$produto['Produto']['unidade'],array('class'=>'valor')); ?></div>
				</div>
				
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Categorias:',array('class'=>'titulo')); ?></div>
					<div class="linha2">
						<?php	
								$categorias = $produto['Categoria'];

									for($i=0; $i<count($categorias); $i++)
									{
										echo $this->Html->Tag('p',$categorias[$i]['nome'],array('class'=>'valor'));
										//echo $this->Form->input('categoria['.$i.']', array('type'=>'text','div'=>false, 'label'=>false,'value'=>h($categorias[$i]['nome']),'class'=>'input text','id'=>'','disabled'=>'disabled'));
									}

						?>
						</div>
				</div>	
				<!--
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Fabricante:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['fabricante'],array('class'=>'valor')); ?></div>
				</div>
				-->
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Descrição:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['descricao'],array('class'=>'valor-descricao')); ?></div>
					<div style="clear:both"></div>
				</div>
					
			</div>					
		</div>	
	</section>
		
	<section class="coluna-central" >
		<fieldset>
			<legend>Dados do Tributário</legend>

			<div class="coluna-content">

				<?php		
					foreach($produto['Tributo'] as $tributo){

						echo $this->Form->input('Tributo.ncm', array('type'=>'text','label'=>'NCM:','value'=>h($tributo['ncm']),'class'=>'ncm','id'=>'','disabled'=>'disabled'));
	
						echo $this->Form->input('Tributo.cfop', array('type'=>'text','label'=>'CFOP:','value'=>h($tributo['cfop']),'class'=>'cfop','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_icms', array('type'=>'text','label'=>'ICMS:','value'=>h($tributo['al_icms']),'class'=>'icms','id'=>'','disabled'=>'disabled'));
						
						echo $this->Form->input('Produto.preco_venda',array('type'=>'text','value'=>h($produto['Produto']['preco_venda']), 'class'=>'tamanho-pequeno dinheiro', 'label'=>'Preço de Venda:','disabled'=>'disabled'));
						
						echo $this->Form->input('Tributo.codigo_selo_ipi', array('type'=>'text','label'=>'Código Selo IPI:','value'=>h($tributo['codigo_selo_ipi']),'class'=>'s-ipi','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.qtde_selo_ipi', array('type'=>'text','label'=>'Quantidade Selo IPI:','value'=>h($tributo['qtde_selo_ipi']),'class'=>'q-ip','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_ipi', array('type'=>'text','label'=>'IPI:','value'=>h($tributo['al_ipi']),'class'=>'ipi','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_cst', array('type'=>'text','label'=>'CST:','value'=>h($tributo['al_cst']),'class'=>'ipi','id'=>'','disabled'=>'disabled'));
						
						echo $this->Form->input('Tributo.al_pis', array('type'=>'text','label'=>'PIS:','value'=>h($tributo['al_pis']),'class'=>'ipi','id'=>'','disabled'=>'disabled'));
					
						echo $this->Form->input('Tributo.al_confins', array('type'=>'text','label'=>'COFINS:','value'=>h($tributo['al_confins']),'class'=>'ipi','id'=>'','disabled'=>'disabled'));
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
					echo $this->Html->image('semaforo-icon-' . strtolower($produto['Produto']['nivel']) . '-16x16.png', array('alt' => 'Status de estoque: '.$produto['Produto']['nivel'], 'title' => 'Status de estoque'));
				
				?>

				<?php
					/* Não implementado */
					/*
					echo $this->Form->input('Compras Total', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Qtd. Vendida', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Pedidos a  Receber', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Pedidos a Entregar', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
					*/
					
					echo $this->Form->input('Produto.estoque_minimo', array('type'=>'text','label'=>'Estoque Mínimo:','value'=>h($produto['Produto']['estoque_minimo']),'','class'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Produto.estoque_desejado', array('type'=>'text','label'=>'Estoque Ideal:','value'=>h($produto['Produto']['estoque_desejado']),'class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->input('Produto.periodocriticovalidade', array('type'=>'text','label'=>'Período Crítico:','class'=>'', 'value'=>h($produto['Produto']['periodocriticovalidade']),'disabled'=>'disabled'));
					if($produto['Produto']['bloqueado']==1){
						echo $this->Form->input('Produto.bloqueado', array('type'=>'text','label'=>'Produto Bloqueado:','value'=>'Sim','class'=>'','id'=>'','disabled'=>'disabled'));
					}
					if($produto['Produto']['bloqueado']==0){
						echo $this->Form->input('Produto.bloqueado', array('type'=>'text','label'=>'Produto Bloqueado:','value'=>'Não','class'=>'','id'=>'','disabled'=>'disabled'));
					}
					
					echo $this->Form->input('Produto.ativo', array('type'=>'text','label'=>'Status de Visualização:','value'=>( $produto['Produto']['ativo'] ? "Ativo" : "Inativo" ),'class'=>'','id'=>'','disabled'=>'disabled'));
					
					echo $this->Form->end();
				?>

			</div>

			<table align="center">
				<tr>
					<th>Lote:</th>
					<th>Data Val.:</th>
					<th>Qtd.:</th>
					<!--<th>Posição Estoque.:</th>-->
					<th></th>
				</tr>

				<?php
					foreach($lotes as $lote){
				?>

				<tr>
					<td><?php echo $lote['Lote']['numero_lote'];  ?></td>
					<td><?php echo date('d/m/Y',strtotime($lote['Lote']['data_validade'])); ?></td>
					<td><?php echo $lote['Lote']['estoque']; ?></td>
					<!--<td style="text-align: center;">
						<div id="posicoes-lote-<?php //echo $lote['Lote']['id']; ?>" class="posicoes-estoque">

							<?php//
								//foreach($lote['Posicaoestoque'] as $posicao){
							?>

								<?php //echo $this->Html->image('listar.png', array('title'=>h($posicao['descricao']),'rel'=>'tooltip')); ?>

								<br />

							<?php
								//}
							?>

						</div>
					</td>-->
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
		if(isset($telaLayout) && isset($telaAbas))
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$produto['Produto']['id'],'layout' => $telaLayout,'abas' => '41')));
		else
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$produto['Produto']['id'])));
													 
    ?>
</footer>


