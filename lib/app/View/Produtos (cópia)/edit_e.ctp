<?php 
	$this->start('css');
	echo $this->Html->css('ProdutosEdit');
	$this->end();
?>


<header>
	<?php 
		echo $this->Html->image('consultas.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar'));
	 ?>
	 <h1>Consultar</h1>
</header>

<section>
	<header>Editar Produto</header>
	
	<section class="lateral a-esquerda">
	<section class="sction">
		<?php echo $this->Form->create('Produto'); ?>
		
		<fieldset id="borda">
		<?php
	    
		// echo $this->Form->input('Código', array('type'=>'text','value'=>h($produto['Produto']['codigo']),'class'=>'input'));
		echo $this->Form->input('Produto.id', array('type' =>'hidden'));
		
		echo $this->Form->input('Produto.codigoEan', array('type'=>'text','value'=>h($produto['Produto']['codigoEan']),'class'=>'tamanho-medio'));
		
		echo $this->Form->input('Produto.nome', array('type'=>'text','value'=>h($produto['Produto']['nome']),'class'=>'input'));
		
		echo $this->Form->input('Produto.composicao', array('type'=>'text','value'=>h($produto['Produto']['composicao']),'class'=>'input'));
		
		echo $this->Form->input('Produto.dosagem', array('type'=>'text','value'=>h($produto['Produto']['dosagem']),'class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('Produto.Unidade', array('type'=>'text','value'=>h($produto['Produto']['Unidade']),'class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('Produto.Categoria', array('type'=>'text','value'=>h($produto['Categoria']),'class'=>'tamanho-medio'));
        
		echo $this->Form->input('Produto.fabricante', array('type'=>'text','value'=>h($produto['Produto']['fabricante']),'class'=>'input'));
		
		echo $this->Form->input('Produto.descricao', array('type'=>'text','value'=>h($produto['Produto']['descricao']),'class'=>'input'));
		
		?>
		</section>
		
		<section>
	<fieldset>
	<legend>
			Dados do Tributário
		</legend>
		
	<?php
		
		foreach($produto['Tributo'] as $tributo){
			//echo $this->Form->input('Tributo.0.id', array('type'=>'text','value'=>h($tributo['id'])));
			
			echo $this->Form->input('Tributo.id', array('type'=>'text','value'=>h($tributo['id']), 'type' => 'hidden'));
			
			echo $this->Form->input('Tributo.cfop:', array('type'=>'text','value'=>h($tributo['cfop']),'class'=>'tamanho-pequeno'));
			
			echo $this->Form->input('Tributo.al_icms:', array('type'=>'text','value'=>h($tributo['al_icms']),'class'=>'tamanho-pequeno'));
			
			echo $this->Form->input('Tributo.al_ipi:', array('type'=>'text','value'=>h($tributo['al_ipi']),'class'=>'tamanho-medio'));
			
			echo $this->Form->input('Tributo.NCM:', array('type'=>'text','value'=>h($tributo['ncm']),'class'=>'tamanho-pequeno'));
				
			echo $this->Form->input('Tributo.codigo_selo_ipi:', array('type'=>'text','value'=>h($tributo['codigo_selo_ipi']),'class'=>'tamanho-medio'));
		
			echo $this->Form->input('Tributo.qtde_selo_ipi:', array('type'=>'text','value'=>h($tributo['qtde_selo_ipi']),'class'=>'tamanho-medio'));
		
			echo $this->Form->input('Tributo.al_cst:', array('type'=>'text','value'=>h($tributo['al_cst']),'class'=>'tamanho-medio'));
			
			echo $this->Form->input('Tributo.al_pis:', array('type'=>'text','value'=>h($tributo['al_pis']),'class'=>'tamanho-medio'));
		
			echo $this->Form->input('Tributo.al_confins:', array('type'=>'text','value'=>h($tributo['al_confins']),'class'=>'tamanho-medio'));
		}
		
	?>
	</fieldset>	


		
	</section>
	</section>
	
	
	<section class="lateral a-direita">
	<section>
	<fieldset>
	<legend>Dados do Estoque</legend>
	
		<?php
		
	   // echo $this->Form->input('Estoque Atual:', array('type'=>'text','value'=>h($estoque),'disabled','class'=>'tamanho-pequeno'));
		?>
		
		<?php
		
		/*
		echo "<br />";
		echo $this->Form->input('Compras Total:', array('type'=>'text','value'=>'adicionar','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Qtd. Vendida:', array('type'=>'text','value'=>'adicionar','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Pedidos a  Receber:', array('type'=>'text','value'=>'adicionar','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Pedidos a Entregar:', array('type'=>'text','value'=>'adicionar','class'=>'tamanho-pequeno'));
		echo "<br />";*/
		
		echo $this->Form->input('Produto.estoque_minimo', array('type'=>'text','value'=>h($produto['Produto']['estoque_minimo']),'class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('produto.estoque_desejado', array('type'=>'text','value'=>'Adicionar','class'=>'tamanho-pequeno'));
		/*echo "<br />";
		echo $this->Form->input('Bloqueado', array('type'=>'text','value'=>'adicionar','class'=>'tamanho-pequeno')); 		
		echo "<br />";*/
	    echo $this->Form->input('Produto.ativo', array('type'=>'text','value'=>h($produto['Produto']['ativo']),'class'=>'tamanho-pequeno'));

		
	?>
	
	<table>

		<tr>
			<th>Lote:</th>
			<th>Data Val.:</th>
			<th>Qtd.:</th>
			<th>Posição Estoque.:</th>
			
		</tr>
		
		<?php
		foreach($lotes as $lote)
		{
			?>

		<tr>
			<td><?php echo $this->Form->input('', array('type'=>'text','value'=>h($lote['Lote']['numero_lote']),'class'=>'tamanho-pequeno'));  ?></td>
			<td><?php echo $this->Form->input('', array('type'=>'text','value'=>h($lote['Lote']['data_validade']),'class'=>'tamanho-pequeno')); ?></td>
			<td><?php echo $this->Form->input('', array('type'=>'text','value'=>h($lote['Lote']['estoque']),'class'=>'tamanho-pequeno')); ?></td>
			<td><?php echo $this->Form->input('', array('type'=>'text','value'=>h($lote['Lote']['id']),'class'=>'tamanho-pequeno')); ?></td>
		</tr>	
	
		<?php
		}
		?>
	
	</table>
</fieldset>	
	
	</section>
		
	</section>
	
</section>
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

	echo $this->Form->submit('botao-salvar.png');
	
	?>
</fieldset>
</footer>

