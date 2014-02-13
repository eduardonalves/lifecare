<?php 
	$this->start('css');
	echo $this->Html->css('view');
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
		<?php
		echo $this->Form->create('Produto');
	    
		echo $this->Form->input('Código:', array('type'=>'text','value'=>h($produto['Produto']['codigo']),'disabled','class'=>'input'));
		
		echo $this->Form->input('Código EAN:', array('type'=>'text','value'=>h($produto['Produto']['codigoEan']),'disabled','class'=>'input'));
		
		echo $this->Form->input('Nome:', array('type'=>'text','value'=>h($produto['Produto']['nome']),'disabled','class'=>'input'));
		
		echo $this->Form->input('Composição:', array('type'=>'text','value'=>h($produto['Produto']['composicao']),'disabled','class'=>'input'));
		
		echo $this->Form->input('Dosagem:', array('type'=>'text','value'=>h($produto['Produto']['dosagem']),'disabled','class'=>'input'));
		
		echo $this->Form->input('Unidade:', array('type'=>'text','value'=>h($produto['Produto']['Unidade']),'disabled','class'=>'input'));
		
		echo $this->Form->input('Categoria:', array('type'=>'text','value'=>h($produto['Categoria']),'disabled','class'=>'input'));
        
		echo $this->Form->input('Fabricante:', array('type'=>'text','value'=>h($produto['Produto']['fabricante']),'disabled','class'=>'input'));
		
		echo $this->Form->input('Descrição:', array('type'=>'text','value'=>h($produto['Produto']['descricao']),'disabled','class'=>'input'));
		
		?>
		</section>
		<section>
		<fieldset>
	<legend>
			Dados do Tributário
		</legend>
		
	<?php
		
		echo $this->Form->input('NCM:', array('type'=>'text','value'=>h($produtoiten['Produtoiten']['ncm_sh']),'disabled','class'=>'tamanho-pequeno'));
				
		echo $this->Form->input('CFOP:', array('type'=>'text','value'=>h($produtoiten['cfop']),'disabled','class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('ICMS:', array('type'=>'text','value'=>h($produtoiten['valor_icms']),'disabled','class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('Código Selo IPI:', array('type'=>'text','value'=>h($tributo['codigo_selo_ipi']),'disabled','class'=>'tamanho-pequeno'));
		
			echo $this->Form->input('Quantidade Selo IPI:', array('type'=>'text','value'=>h($tributo['qtde_selo_ipi']),'disabled','class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('IPI:', array('type'=>'text','value'=>h($tributo['al_ipi']),'disabled','class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('CST:', array('type'=>'text','value'=>h($tributo['al_cst']),'disabled','class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('PIS:', array('type'=>'text','value'=>h($tributo['al_pis']),'disabled','class'=>'tamanho-pequeno'));
		
		echo $this->Form->input('COFINS:', array('type'=>'text','value'=>h($tributo['al_confins']),'disabled','class'=>'tamanho-pequeno'));
		
		
	?>
</fieldset>
		
	</section>
	</section>
	
	
	<section class="lateral a-direita">
	<section>
		<fieldset>
	<legend>Dados do Estoque</legend>
	
		<?php
		
	    echo $this->Form->input('Estoque Atual:', array('type'=>'text','value'=>h($estoque),'disabled','class'=>'tamanho-pequeno'));
		?>
		<span><?php echo $this->html->image('consultas.png');?></span>
		
		<?php
		
		
		echo "<br />";
		echo $this->Form->input('Compras Total:', array('type'=>'text','value'=>'adicionar','disabled','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Qtd. Vendida:', array('type'=>'text','value'=>'adicionar','disabled','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Pedidos a  Receber:', array('type'=>'text','value'=>'adicionar','disabled','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Pedidos a Entregar:', array('type'=>'text','value'=>'adicionar','disabled','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Estoque Mínimo:', array('type'=>'text','value'=>h($produto['Produto']['estoque_minimo']),'disabled','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Estoque Ideal:', array('type'=>'text','value'=>'Adicionar','disabled','class'=>'tamanho-pequeno'));
		echo "<br />";
		echo $this->Form->input('Bloqueado:', array('type'=>'text','value'=>'adicionar','disabled','class'=>'tamanho-pequeno')); 		
		echo "<br />";
	    echo $this->Form->input('Status:', array('type'=>'text','value'=>h($produto['Produto']['status']),'disabled','class'=>'tamanho-pequeno'));
		
		echo $this->Form->end();
		
	?>
	
	<table>
		<tr>
			<td>Lote:</td>
			<td>Data Val.:</td>
			<td>Qtd.:</td>
			<td>Posição Estoque.:</td>
			<td></td>			
		</tr>
		
		<tr class="tr">
			<td>23</td>
			<td>10/11/2013</td>
			<td>100</td>
			<td>AB2J</td>
			<td>...</td>
		</tr>
		
		<tr class="tr">
			<td>27</td>
			<td>01/01/2014</td>
			<td>50</td>
			<td>AB2J</td>
			<td>...</td>
		</tr>
		
		<tr class="tr">
			<td>31</td>
			<td>20/11/2015</td>
			<td>150</td>
			<td>AB2J</td>
			<td>...</td>
		</tr>
		
		<tr class="tr">
			<td>45</td>
			<td>10/11/2015</td>
			<td>200</td>
			<td>AB2J</td>
			<td>...</td>
		</tr>
		
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
	
	?>
	
</footer>
