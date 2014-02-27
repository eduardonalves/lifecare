<?php
	$this->start('css');
	echo $this->Html->css('table');	
	echo $this->Html->css('dashboard');
	echo $this->Html->css('chartfx');
	echo $this->Html->css('table');
	$this->end();

	$this->start('script');	
	echo $this->Html->script('Chart.min.js');
	echo $this->Html->script('Chart.js');	
	echo $this->Html->script('dashboard.js');
	$this->end();
?>


<header>
	<h1 class="menuOption12">Dashboard</h1>
</header>

<section class="section-superior"> <!-- INICIO SUPERIOR -->
		
	<section class="dashboard-esquerda">
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Compra/Venda</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>			
			</div>
			
				<canvas id="income" width="380" height="240" class="grafico-ajuste"></canvas>
					
		</div>
	</section>	
	
	<section class="dashboard-central">	
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Vendas - Etilefrina</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>			
			</div>
			
			<canvas id="countries" width="380" height="240" class="grafico-ajuste"></canvas>		
		</div>
	</section>
	
	<section class="dashboard-direita">	
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Faturamente/Despesa</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>			
			</div>
			
			<canvas id="buyers" width="380" height="240" class="grafico-ajuste"></canvas>		
		</div>
	</section>

</section><!-- ## FIM SECTION SUPERIOR -->



<section class="section-inferior"><!-- ## INICIO SECTION INFERIOR -->
	<section class="dashboard-esquerda">
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash2.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Data de Validade</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>
			</div>	
				<div class="div-tabela-rolagem">
					<table class="tb-dataValidade">
						<tr>
							<th> </th>
							<th>Lote</th>
							<th>Nome</th>
							<th>Qtd</th>
							<th>Dt. Validade</th>
						</tr>

						<?php
							foreach($lotes as $lote){
						?>

						<tr>
							<td><?php echo $this->Html->image('semaforo-icon-' . strtolower($lote['Lote']['status']) . '-16x16.png', array('alt' => 'Status de estoque: '.$lote['Lote']['status'], 'title' => 'Status de estoque')); ?></td>
							<!-- <td style="border:none !important"><img src="" class="semaforo-<?php echo strtolower($lote['Lote']['status']); ?>" /></td>-->
							<td><?php echo $lote['Lote']['numero_lote'];  ?></td>
							<td><?php echo $lote['Produto']['nome'];  ?></td>
							<td><?php echo $lote['Lote']['estoque']; ?></td>
							<td><?php echo $lote['Lote']['data_validade']; ?></td>
							
						</tr>

						<?php
							}
						?>
				</table>
			</div>	
			</div>		
		</div>
	</section>	
	
	<section class="dashboard-central">	
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash2.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Contas a Pagar</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>			
			</div>
			<div class="div-tabela-rolagem">
				<table class="">

							<tr>
								<th>    </th>
								<th>NFe</th>
								<th>Fornecedor</th>
								<th>Data Vcto</th>
								<th>Valor</th>
							</tr>
							
								<tr>
								<td>teste</td>
								<td>teste</td>
								<td>teste</td>
								<td>teste</td>
								<td>teste</td>
										
							
							</tr>
							
							<tr>
								<td>teste</td>
								<td>teste</td>
								<td>teste</td>
								<td>teste</td>
								<td>teste</td>
									
							
							</tr>
							
				</table>
			</div>		
		</div>
	</section>
	
	<section class="dashboard-direita">	
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash2.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Nível de Estoque</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>			
			</div>
			<div class="div-tabela-rolagem">
				<table class="tabela-lote">
							<tr>
								<th> </th>
								<th>Nome</th>
								<th>Estoque Min.</th>
								<th>Estoque Atual</th>
							</tr>

							<?php
								foreach($produtos as $produto){
							?>

							<tr>
								<td><?php echo $this->Html->image('semaforo-' . strtolower($produto['Produto']['nivel']) . '-12x12.png', array('alt' => '-'.$produto['Produto']['nivel'], 'title' => '-')); ?></td>
								<!-- <td style="border:none !important"><img src="" class="semaforo-<?php echo strtolower($produto['Produto']['nivel']); ?>" /></td>-->
								<td><?php echo $produto['Produto']['nome'];  ?></td>
								<td><?php echo $produto['Produto']['estoque_minimo']; ?></td>								
								<td><?php echo $produto['Produto']['estoque']; ?></td>
								
							</tr>

							<?php
								}
							?>
						</table>	
			</div>		
		</div>
	</section>

</section><!-- ## FIM SECTION INFERIOR -->


