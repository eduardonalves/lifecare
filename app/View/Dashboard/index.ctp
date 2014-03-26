<script>
	var urlInicio = '<?php echo Router::url("/", true)?>';
</script>	
<?php
	$this->start('css');
	echo $this->Html->css('table');	
	echo $this->Html->css('dashboard');
	//echo $this->Html->css('chartfx');
	echo $this->Html->css('table');
	$this->end();

	$this->start('script');	
	echo $this->Html->script('Chart.min.js');
	echo $this->Html->script('ChartNew.js');	
	echo $this->Html->script('faturamentoDespesas.js');
	echo $this->Html->script('contasPeriodo.js');
	$this->end();
	
	$dia = date("d");
	$mes = date("M");
	$ano = date("Y");	
	$mesTexto = array("Jan" => "Janeiro", "Feb" => "Fevereiro", "Mar" => "Março", "Apr" => "Abril", "May" => "Maio", "Jun" => "Junho", "Jul" => "Julho", "Aug" => "Agosto", "Nov" => "Novembro", "Sep" => "Setembro", "Oct" => "Outubro", "Dec" => "Dezembro");
?>


<header>
	<h1 class="menuOption12">Dashboard</h1>
</header>

<section class="section-superior"> <!-- INICIO SUPERIOR -->
		
	<section class="dashboard-esquerda">
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Faturamento/Despesa</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>			
			</div>
			
			
	<div class="menuAnos">
		<span title="Escolha o Dia" id="diaEscolha"><?php echo $dia;?></span> de
		<span title="Escolha o Mês" id="mesEscolha"><?php echo $mesTexto[$mes];?></span> de 
		<span title="Escolha o Ano" id="anoEscolha"><?php echo $ano;?></span>				
	</div>

<div width="380" height="240" style="display:none;" class="dataButao diaDiv">
					<span class="carregaDia">Todos</span>
					<span class="carregaDia">01</span>
					<span class="carregaDia">02</span>
					<span class="carregaDia">03</span>
					<span class="carregaDia">04</span>
					<span class="carregaDia">05</span>
					<span class="carregaDia">06</span>
					<span class="carregaDia">07</span>
					<span class="carregaDia">08</span>
					<span class="carregaDia">09</span>
					<span class="carregaDia">10</span>
					<span class="carregaDia">11</span>
					<span class="carregaDia">12</span>
					<span class="carregaDia">13</span>
					<span class="carregaDia">14</span>
					<span class="carregaDia">15</span>
					<span class="carregaDia">16</span>
					<span class="carregaDia">17</span>
					<span class="carregaDia">18</span>
					<span class="carregaDia">19</span>
					<span class="carregaDia">20</span>
					<span class="carregaDia">21</span>
					<span class="carregaDia">22</span>
					<span class="carregaDia">23</span>
					<span class="carregaDia">24</span>
					<span class="carregaDia">25</span>
					<span class="carregaDia">26</span>
					<span class="carregaDia">27</span>
					<span class="carregaDia">28</span>
					<span class="carregaDia">29</span>
					<span class="carregaDia">30</span>
					<span class="carregaDia">31</span>
									
				</div>
				
				<div width="400" height="240" style="display:none;" class="dataButao mesDiv">
					<span class="carregaMes">Todos</span>
					<span class="carregaMes">Janeiro</span>
					<span class="carregaMes">Fevereiro</span>
					<span class="carregaMes">Março</span>
					<span class="carregaMes">Abril</span>
					<span class="carregaMes">Maio</span>
					<span class="carregaMes">Junho</span>
					<span class="carregaMes">Julho</span>
					<span class="carregaMes">Agosto</span>
					<span class="carregaMes">Setembro</span>
					<span class="carregaMes">Outubro</span>
					<span class="carregaMes">Novembro</span>
					<span class="carregaMes">Dezembro</span>
				</div>
				<div width="380" height="240" style="display:none;" class="dataButao anoDiv">
					<?php					
						
						$i=0;
						foreach($anosModel as $i => $anosArray){
								echo "<span class='carregaAno'>".$anosArray[$i]['YEAR(`Parcela`.`data_vencimento`)']."</span>";
						}	
						
						
					?>						
				</div>
				
				<div class="loaderAjaxGrafico" style="display:none">
						<?php
							
							echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
																		 'title'=>'Carregando',
																		 'class'=>'',
																		 ));
						?>
						<span>Carregando Gráfico aguarde...</span>
					</div>
				
				
				<div id="loadGrafico">	
					<canvas id="income" width="380" height="240" class="grafico-ajuste"></canvas>
				</div>
				
		</div>
	</section>	
	
	<section class="dashboard-central">	
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Contas por Período</span>
				<?php echo $this->Html->image('botao-tabela-configuracao.png',array('class'=>'bt-config'));?>			
			</div>
			
			<div class="menuEntreDatas">
				<input id="dataInicial" class="forma-data tamanho-pequeno" />
				<span>a</span>
				<?php 
					echo "<span id='periodoDIA' style='display:none;'>".$dia."</span>"; 
					echo "<span id='periodoMes' style='display:none;'>".$mes."</span>"; 
					echo "<span id='periodoAno' style='display:none;'>".$ano."</span>"; 
				;?>
				<input id="dataFinal" class="forma-data tamanho-pequeno" value=""/>
				<span id="btCarregar" style="cursor:pointer;">Carregar Gráfico</span>
				<span id="btCarregar2" style="cursor:pointer;">Carregar2</span>
							
			</div>			
			
			<div class="loaderAjaxGrafico" style="display:none">
					<?php
						echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
																		'title'=>'Carregando',
																		 'class'=>'',
																		 ));
					?>
					<span>Carregando Gráfico aguarde...</span>
			</div>
			
			<div id="loadPeriodo">
				<canvas id="graficoPeriodo" width="380" height="240" class="grafico-ajuste"></canvas>		
			</div>
		</div>
	</section>
	
	<section class="dashboard-direita">	
		<div class="div-board">
			<div class="div-titulo">
				<?php echo $this->Html->image('icon-dash.png',array('class'=>'bt-icon'));?>
				<span class="span-titulo">Metas</span>
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


<div><!-- Hidden do grafico de Faturamento/Despesas -->
<!-- ## RECEBER -->
<input type="hidden" id="totalJanReceber" value="<?php echo $totalJanReceber; ?>" />
<input type="hidden" id="totalFevReceber" value="<?php echo $totalFevReceber; ?>" />
<input type="hidden" id="totalmarReceber" value="<?php echo $totalmarReceber; ?>" />
<input type="hidden" id="totalabrReceber" value="<?php echo $totalabrReceber; ?>" />
<input type="hidden" id="totalmaiReceber" value="<?php echo $totalmaiReceber; ?>" />
<input type="hidden" id="totaljunReceber" value="<?php echo $totaljunReceber; ?>" />
<input type="hidden" id="totaljulReceber" value="<?php echo $totaljulReceber; ?>" />
<input type="hidden" id="totalagoReceber" value="<?php echo $totalagoReceber; ?>" />
<input type="hidden" id="totalsetReceber" value="<?php echo $totalsetReceber; ?>" />
<input type="hidden" id="totaloutReceber" value="<?php echo $totaloutReceber; ?>" />
<input type="hidden" id="totalnovReceber" value="<?php echo $totalnovReceber; ?>" />
<input type="hidden" id="totaldezReceber" value="<?php echo $totaldezReceber; ?>" />

<!-- ## PAGAR-->
<input type="hidden" id="totalJanPagar" value="<?php echo $totalJanPagar; ?>" />
<input type="hidden" id="totalFevPagar" value="<?php echo $totalFevPagar; ?>" />
<input type="hidden" id="totalmarPagar" value="<?php echo $totalmarPagar; ?>" />
<input type="hidden" id="totalabrPagar" value="<?php echo $totalabrPagar; ?>" />
<input type="hidden" id="totalmaiPagar" value="<?php echo $totalmaiPagar; ?>" />
<input type="hidden" id="totaljunPagar" value="<?php echo $totaljunPagar; ?>" />
<input type="hidden" id="totaljulPagar" value="<?php echo $totaljulPagar; ?>" />
<input type="hidden" id="totalagoPagar" value="<?php echo $totalagoPagar; ?>" />
<input type="hidden" id="totalsetPagar" value="<?php echo $totalsetPagar; ?>" />
<input type="hidden" id="totaloutPagar" value="<?php echo $totaloutPagar; ?>" />
<input type="hidden" id="totalnovPagar" value="<?php echo $totalnovPagar; ?>" />
<input type="hidden" id="totaldezPagar" value="<?php echo $totaldezPagar; ?>" />
</div>

<div><!-- Hidden do grafico de Contas por Periodo -->
<!-- ## RECEBER -->
<input type="hidden" id="totalJanReceberP" value="<?php echo $totalJanReceberP; ?>" />
<input type="hidden" id="totalFevReceberP" value="<?php echo $totalFevReceberP; ?>" />
<input type="hidden" id="totalmarReceberP" value="<?php echo $totalmarReceberP; ?>" />
<input type="hidden" id="totalabrReceberP" value="<?php echo $totalabrReceberP; ?>" />
<input type="hidden" id="totalmaiReceberP" value="<?php echo $totalmaiReceberP; ?>" />
<input type="hidden" id="totaljunReceberP" value="<?php echo $totaljunReceberP; ?>" />
<input type="hidden" id="totaljulReceberP" value="<?php echo $totaljulReceberP; ?>" />
<input type="hidden" id="totalagoReceberP" value="<?php echo $totalagoReceberP; ?>" />
<input type="hidden" id="totalsetReceberP" value="<?php echo $totalsetReceberP; ?>" />
<input type="hidden" id="totaloutReceberP" value="<?php echo $totaloutReceberP; ?>" />
<input type="hidden" id="totalnovReceberP" value="<?php echo $totalnovReceberP; ?>" />
<input type="hidden" id="totaldezReceberP" value="<?php echo $totaldezReceberP; ?>" />

<!-- ## PAGAR-->
<input type="hidden" id="totalJanPagarP" value="<?php echo $totalJanPagarP; ?>" />
<input type="hidden" id="totalFevPagarP" value="<?php echo $totalFevPagarP; ?>" />
<input type="hidden" id="totalmarPagarP" value="<?php echo $totalmarPagarP; ?>" />
<input type="hidden" id="totalabrPagarP" value="<?php echo $totalabrPagarP; ?>" />
<input type="hidden" id="totalmaiPagarP" value="<?php echo $totalmaiPagarP; ?>" />
<input type="hidden" id="totaljunPagarP" value="<?php echo $totaljunPagarP; ?>" />
<input type="hidden" id="totaljulPagarP" value="<?php echo $totaljulPagarP; ?>" />
<input type="hidden" id="totalagoPagarP" value="<?php echo $totalagoPagarP; ?>" />
<input type="hidden" id="totalsetPagarP" value="<?php echo $totalsetPagarP; ?>" />
<input type="hidden" id="totaloutPagarP" value="<?php echo $totaloutPagarP; ?>" />
<input type="hidden" id="totalnovPagarP" value="<?php echo $totalnovPagarP; ?>" />
<input type="hidden" id="totaldezPagarP" value="<?php echo $totaldezPagarP; ?>" />
</div>




<?php //echo $this->element('sql_dump'); ?>
