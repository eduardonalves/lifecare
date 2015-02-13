<?php 
	$this->start('css');
	echo $this->Html->css('ProdutosView');
	$this->end();
?>


<header>
	<?php 
		echo $this->Html->image('consultas.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar'));
	 ?>
	 <h1>Consultar</h1>
	 
	 <script>
		$('img').tooltip();
	 </script>
</header>

<section><!--SECTION SUPERIOR--> 
	<header>Produto</header>
			
		<section class="coluna-esquerda">
		<div class="descricao">
		<?php
		echo $this->Form->create('Produto');
	    
		echo $this->Form->input('Código:', array('type'=>'text','label'=>'Código','value'=>h($produto['Produto']['codigo']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Código EAN:', array('type'=>'text','label'=>'Código EAN','value'=>h($produto['Produto']['codigoEan']),'class'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Nome:', array('type'=>'text','value'=>h($produto['Produto']['nome']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Composição:', array('type'=>'text','value'=>h($produto['Produto']['composicao']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Dosagem:', array('type'=>'text','value'=>h($produto['Produto']['dosagem']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Unidade:', array('type'=>'text','value'=>h($produto['Produto']['Unidade']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Categoria:', array('type'=>'text','value'=>h($produto['Categoria']),'class'=>'','id'=>'','disabled'=>'disabled'));
        
		echo $this->Form->input('Fabricante:', array('type'=>'text','value'=>h($produto['Produto']['fabricante']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Descrição:', array('type'=>'text','value'=>h($produto['Produto']['descricao']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
		?>
		
			</div>	
			</section>
			
			<section class="coluna" >
				<fieldset>
	<legend>
			Dados do Tributário
		</legend>
		<div>
	<?php		
	
		foreach($produto['Tributo'] as $tributo){
			echo $this->Form->input('NCM:', array('type'=>'text','label'=>'NCM:','value'=>h($tributo['ncm']),'class'=>'','id'=>'','disabled'=>'disabled'));
				
			echo $this->Form->input('CFOP:', array('type'=>'text','label'=>'CFOP:','value'=>h($tributo['cfop']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
			echo $this->Form->input('ICMS:', array('type'=>'text','label'=>'ICMS:','value'=>h($tributo['al_icms']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
			echo $this->Form->input('Código Selo IPI:', array('type'=>'text','label'=>'Código Selo IPI:','value'=>h($tributo['codigo_selo_ipi']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
			echo $this->Form->input('Quantidade Selo IPI:', array('type'=>'text','label'=>'Quantidade Selo IPI:','value'=>h($tributo['qtde_selo_ipi']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
			echo $this->Form->input('IPI:', array('type'=>'text','label'=>'IPI:','value'=>h($tributo['al_ipi']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
			echo $this->Form->input('CST:', array('type'=>'text','label'=>'CST:','value'=>h($tributo['al_cst']),'class'=>'','id'=>'','disabled'=>'disabled'));
			
			echo $this->Form->input('PIS:', array('type'=>'text','label'=>'PIS:','value'=>h($tributo['al_pis']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
			echo $this->Form->input('COFINS:', array('type'=>'text','label'=>'COFINS:','value'=>h($tributo['al_confins']),'class'=>'','id'=>'','disabled'=>'disabled'));
		}
		
	?>
</div>
</fieldset>
			</section>
		
			<section class="coluna-direita" >
				<fieldset>
	<legend>Dados do Estoque</legend>
		<div>
		<?php
		
	    echo $this->Form->input('Estoque Atual:', array('type'=>'text','value'=>h($estoque),'class'=>'','id'=>'','disabled'=>'disabled'));
		?>
		
		<span><?php echo $this->html->image('consultas.png');?></span>
		
		<?php
		
		
		
		echo $this->Form->input('Compras Total:', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Qtd. Vendida:', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Pedidos a  Receber:', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Pedidos a Entregar:', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Estoque Mínimo:', array('type'=>'text','value'=>h($produto['Produto']['estoque_minimo']),'','class'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Estoque Ideal:', array('type'=>'text','value'=>'Adicionar','class'=>'','id'=>'','disabled'=>'disabled'));
		
		echo $this->Form->input('Bloqueado:', array('type'=>'text','value'=>'adicionar','class'=>'','id'=>'','disabled'=>'disabled')); 		
		
	    echo $this->Form->input('Status:', array('type'=>'text','value'=>h($produto['Produto']['ativo']),'class'=>'','id'=>'','disabled'=>'disabled'));
		
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
		foreach($lotes as $lote)
		{
			?>

		<tr>
			<td><?php echo $lote['Lote']['numero_lote'];  ?></td>
			<td><?php echo $lote['Lote']['data_validade']; ?></td>
			<td><?php echo $lote['Lote']['estoque']; ?></td>
			<td style="text-align: center;">
				<div id="posicoes-lote-<?php echo $lote['Lote']['id']; ?>" class="posicoes-estoque">
				
				<?php
				
					foreach($lote['Posicaoestoque'] as $posicao)
					{
				?>
					
					<?php echo $this->Html->image('listar.png', array('title'=>h($posicao['descricao']),'rel'=>'tooltip'));
		 ?> <br />

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
