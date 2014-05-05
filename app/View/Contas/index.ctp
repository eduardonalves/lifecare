<?php
	$this->start('css');
		echo $this->Html->css('consulta_financeiro');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_consulta_financeiro.js');
	$this->end();

	$this->start('modais');
		echo $this->element('config_movimentacao', array('modal'=>'add-config_movimentacao'));
		echo $this->element('config_parceiro', array('modal'=>'add-config_parceiro'));
		echo $this->element('config_parcela', array('modal'=>'add-config_parcela'));
		echo $this->element('quicklink_addfinanceiro', array('modal'=>'add-quicklink'));

	$this->end();
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}else{
			$data= " / / ";
		}
		return $data;
	}
?>
<script>
$(document).ready(function() {
	var usoInicioPhp = '<?php ?>' ;
	var usoGet = '$_GET["ql"]';

	
    });
</script>
<?php
	if(isset($pageReload)){
		if($pageReload=='Reload'){
?>
<script type="text/javascript">
    $(document).ready(function() {
	    setTimeout(function(){
		    location.reload();
	    }, 2000);

    });	
</script>


<?php
		}
	}
?>

<header> <!---header--->

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->	
	<h1 class="menuOption31">Consultas</h1>

</header> <!---Fim header--->

<section> <!---section superior--->
	<header>Consulta por Movimentação e/ou Parceiro de Negócios</header>
	
	<fieldset class="filtros">
		<?php

		    $ql= $_GET['ql'];
		    if($ql ==''){
			$ql=0;
		    }
			echo $this->Form->input('nome',array('required'=>'false','type'=>'select','label'=>'Pesquisa Rápida:','id'=>'quick-select', 'options' => $quicklinksList,'default'=>$ql));
		?>
		
		<a href="add-quicklink" class="bt-showmodal">
			
			<?php	
				echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar'));
			?>
		
		</a>
		<?php
			    echo $this->Form->end();

			    if(isset($_GET['ql']) && $_GET['ql']!=''){
				    echo $this->Form->postLink($this->Html->image('botao-excluir2.png',array('id'=>'quick-editar','alt' =>__('Delete'),'title' => __('Delete'))), array('controller' => 'quicklinks','action' => 'delete',  $_GET['ql']),array('escape' => false, 'confirm' => __('Deseja excluir?')));
			    }
			?>
			
		<div class="content-filtros">

			<!------------------ Dados da Movimentação ------------------>
			<section id="filtro-movimentacao" class="coluna-esquerda">
				<span id="titulo">Dados da Movimentação</span>
				
				<a href="add-config_movimentacao" class="bt-showmodal">
				
					<?php
						echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração Movimentação', 'title' => 'Configuração Movimentação'));
					?>
				
				</a>
				
				<?php	
					echo $this->Search->create();
					echo "<div class='tipoMovimentacao'>";	
					echo $this->Form->input('', array(
					    'type' => 'select',
					    'class' => 'operacao',
					    'multiple' => 'checkbox',
					    'options' => array('REECEBER' => 'Recebimento', 'PAGAR' => 'Pagamento'),   
					));
					//FAZER O JAVASCRIPT PARA RECEBER O TIPO DE MOVIMENTAÇÃO SEMELHANTE AO DE SELEÇÃO DE ENTRADA E SAIDA(CONSULTA ESTOQUE)
					echo $this->Search->input('tipoMovimentacao', array('type' => 'hidden'));
					echo "</div>";
					
					echo $this->Search->input('identificacao', array('label' => 'Número do Documento:','class'=>'tamanho-medio input-alinhamento'));
				?>
				
				<div class="inputSearchData divMarginLeft">
					<?php
						echo $this->Search->input('data_emissao', array('label' => 'Emissão:','class'=>'', 'type' => 'text'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>

				<div class="inputSearchData divMarginLeft" >
					<?php
						echo $this->Search->input('data_quitacao', array('label' => 'Quitação:','class'=>'', 'type' => 'text'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
						
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('status_conta', array('label' => 'Status:','class'=>''));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('nomeCentroCusto', array('label' => 'Centro de Custo:','class'=>'tamanho-medio input-alinhamento'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('nomeTipodeconta', array('label' => 'Receita/Despesa:','class'=>'tamanho-medio input-alinhamento'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<div class="divMarginLeft" >
					<?php
						echo $this->Search->input('descricao', array('label' => 'Obs:','class'=>'tamanho-medio input-alinhamento'));
						//echo $this->html->tag('span','a',array('class'=>'a-data'));
					?>
				</div>
				
				<?php
					echo $this->Html->image('expandir.png', array('id'=>'bt-expandir', 'alt'=>'', 'title'=>''));
				?>
			</section>
			
			
			<!------------------ FILTRO Das Parcelas ------------------>
			<section id="filtro-parceiro" class="coluna-central">
				
				<?php
					echo $this->Form->input('', array('label' => 'Dados das Parcelas','type'=>'checkbox', 'id' => 'checkparcela' , 'value' => 'parcelas'));
					?>

					<a href="add-config_parcela" class="bt-showmodal">
				
						<?php
							echo $this->Html->image('botao-tabela-configuracao.png', array('id' => 'bt-configuracao', 'alt' => 'Configuração Parcela', 'title' => 'Configuração Parcela'));
						?>
				
					</a>
				
				<div class="formaPagamento">
					<?php
						echo $this->Search->input('forma_pagamento', array('label' => 'Forma de Pagamento:','class'=>'tamanho-medio input-alinhamento'));
					?>
				</div>	
				<div class="inputSearchValor">
					<?php
						echo $this->Search->input('valor', array('type'=>'text','label' => 'Valor:','class'=>'tamanho-medio dinheiro_duasCasas'));
					?>
				</div>
				<div class="inputSearchData">
					<?php	
						echo $this->Search->input('data_vencimento', array('type'=>'text','label' => 'Vencimento:','class'=>''));									
					?>
				</div>
				<div id="msgFiltroParcela" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>

			<!------------------ FILTRO Do Parceiro ------------------>
			<section id="filtro-parcela" class="coluna-direita">
				<div class="boxParceiro">
					<span>Dados do Parceiro de Negócio</span>
				</div>
			
				<div class="informacoesParceiro">
					
				<?php
					echo $this->Search->input('nome', array('label' => 'Nome:','class'=>'tamanho-medio input-alinhamento combo-autocomplete'));
					echo $this->Search->input('cpf_cnpj',array('type'=>'text','class' => 'tamanho-medio ','id' => 'cpf_cnpj','style'=>'background:#EBEAFC;','disabled'=>'disabled','label'=>'', 'div' => array('class' => 'input text divCpfCnpj')));
					echo "<div id='idcpf'><input id='inputcpf' type='radio'   name='CPFCNPJ' value='cpf'><label class='label-cpf'>CPF /</label></div><div id='idcnpj'><input id='inputcnpj' type='radio' name='CPFCNPJ' value='cnpj'><label class='label-cnpj'>CNPJ:</label></div>";
					//echo $this->Search->input('cpf_cnpj', array('label' => 'CPF/CNPJ:','class'=>'tamanho-medio input-alinhamento'));
					echo $this->Search->input('statusParceiro', array('type'=>'select','label' => 'Status:','class'=>'tamanho-medio input-alinhamento'));
					
				?>
				</div>
				<div id="msgFiltroParceiro" class="msgFiltro">Habilite o filtro antes de pesquisar.</div>
			</section>
			
		
			
			<footer>
				<?php echo $this->Form->submit('botao-filtrar.png',array('id'=>'quick-filtrar')); ?>
			</footer>	

		</div>
			
		<?php echo $this->Form->end(); ?>

	</fieldset>	
	
</section>

<!------------------ CONSULTA ------------------>

<div class="areaTabela">

	
<?php echo $this->element('paginador_superior');?>

<div class="tabelas" id="contas">

<table cellpadding="0" cellspacing="0">
<?php 
//Inicio da checagem das colunas de contas
	if(isset($_GET['parametro']) && $_GET['parametro']=='contas'){
    		if(isset($configCont)){ ?>
				<tr>
				    <th class="colunaConta">Ações</th>									
					<?php 
				     
					    foreach($configCont as $campo=>$campoLabel)
					    {
						if($campo=='parcelas'){
							 //echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\"  style='background-color:#FFFAE7'>" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
						}else if($campo == 'parceirodenegocio_id' ){
							//echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\" style='background-color:#c9f0e8'>" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
			
						}else if($campo == 'parceirodenegocio_id' || $campo == 'nome_parceiro' || $campo == 'cnpj_parceiro' || $campo == 'status_parceiro'){
							echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\" style='background-color:#c9f0e8'>" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
			
						}else{
							 echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
						}
					     
					    }
			
					?>
				</tr>
			
				<?php 
				$j=0;
				
				foreach ($contas as $conta): ?>
			
			    <tr>
					<td class="actions">
					    <?php 
							echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Conta','title'=>'Visualizar Conta','url'=>array('controller' => 'contas','action' => 'view', $conta['Conta']['id'])));
							
							echo "<a href='myModal_add-view_parcelas".$j."' class='bt-showmodal'>"; 
							echo $this->Html->image('listar.png',array('alt'=>'Visualizar Lista de Parcelas','class' => 'bt-visualizarParcela','title'=>'Visualizar Lista de Parcelas'));
							echo "</a>";
						
							echo $this->html->image('parceiro.png',array('alt'=>'Visualizar Parceiro de Negócio','title'=>'Visualizar Parceiro de Negócio',
							'url'=>array('controller'=>'Parceirodenegocios','action'=>'view',$conta['Conta']['parceirodenegocio_id'])));
						?>
						
						<div class="modal fade" id="myModal_add-view_parcelas<?php echo $j; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-body">
						<?php
							echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;')); 
						?>
							<header id="cabecalho">
							<?php 
								echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
							?>	
								<h1>Visualização das Parcelas</h1>
							</header>
			
							<section>
							<header>Parcelas</header>
			
							<section class="coluna-modal">
								<table>
								<thead>
								    <tr>
									<th>Identificação do Documento</th>
									<th>Data de Vencimento</th>
									<th>Data de Pagamento</th>
									<th>Período Crítico</th>
									<th>Valor</th>
									<th>Desconto</th>																	
									<th>Código de Barras</th>																	
									<th>Parcela</th>																	
									<th>Banco</th>																	
									<th>Agência</th>																	
									<th>Conta</th>																	
									<th>Status</th>		
								    </tr>											
								</thead>
										
								<?php
								
									foreach($conta['Parcela'] as $parcela){
									echo "<tr><td>";
										echo $parcela['identificacao_documento'];															
									echo "</td>";	
									
									echo "<td>";
										formatDateToView($parcela['data_vencimento']);
										echo $parcela['data_vencimento'];															
									echo "</td>";
									
									echo "<td>";
										formatDateToView($parcela['data_pagamento']);
										echo $parcela['data_pagamento'];															
									echo "</td>";
									
									echo "<td>";
										echo $parcela['periodocritico'];															
									echo "</td>";
									
									echo "<td>R$ ";
										echo number_format($parcela['valor'], 2, ',', '.');  															
									echo "</td>";
									
									echo "<td>";
										echo number_format($parcela['desconto'], 2, ',', '.');
									echo "</td>";
									
									echo "<td>";
										echo $parcela['codigodebarras'];
									echo "</td>";
									
									echo "<td>";
										echo $parcela['parcela'];
									echo "</td>";
									
									echo "<td>";
										echo $parcela['banco'];
									echo "</td>";
								
									echo "<td>";
										echo $parcela['agencia'];
									echo "</td>";
									
									echo "<td>";
										echo $parcela['conta'];
									echo "</td>";
									
									echo "<td>";
										echo $this->Html->image('semaforo-' . strtolower($parcela['status']) . '-12x12.png', array('alt' => '-'.$parcela['status'], 'title' => '-'));
									echo "</td>";


									echo "</tr>";												
									}
								?>

								</table>
							</section>
							</section>
						</div>	
						</div>
					</td>
					    
					<?php 
												
				    foreach($configCont as $campo=>$campoLabel){							
						if($campo=="status"){
						    echo "<td class='status'>" . $this->Html->image('semaforo-' . strtolower($conta['Conta']['status']) . '-12x12.png', array('alt' => $conta['Conta']['status'], 'title' => $conta['Conta']['status'])) . "&nbsp;</td>";
						    //Monter uma tabela dentro de um modal
						}else if($campo=="status_parceiro"){
						    echo "<td class='status_parceiro'>" . $this->Html->image('semaforo-' . strtolower($conta['Conta']['status_parceiro']) . '-12x12.png', array('alt' =>$conta['Conta']['status_parceiro'], 'title' => $conta['Conta']['status_parceiro'])) . "&nbsp;</td>";
						    //Monter uma tabela dentro de um modal
						}else if($campo=="parceirodenegocio_id"){
						    //echo "<td class='statusParceiro'>"; 
						    //echo $this->html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar','title'=>'Visualizar',
							//'url'=>array('controller'=>'Parceirodenegocios','action'=>'view',$conta['Conta']['parceirodenegocio_id'])));
						    //echo "</a></td>";
						
						}else if($campo=="valor"){
							echo "<td class=\"$campo\">R$ " . number_format($conta['Conta'][$campo], 2, ',', '.') . "&nbsp;</td>";
						}else{
							echo "<td class=\"$campo\">" . $conta['Conta'][$campo] . "&nbsp;</td>";
						}
							$j=$j+1;
					}						
					?>
			</tr>
			
				<?php endforeach; ?>
		<? } ?>

<?php
    }
	//fim de Consulta de contas
?>	
<?php 
//Inicio da checagem das colunas de parcelas
	if(isset($_GET['parametro']) && $_GET['parametro']=='parcelas'){
    		if(isset($configparcela)){ ?>
				<tr>
				    <th class="colunaConta">Ações</th>									
					<?php 
					    foreach($configparc as $campo => $campoLabel){
							if($campo=='parcelas'){
								 //echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\"  style='background-color:#FFFAE7'>" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
							}else if($campo == 'cnpj_cpf' ){
								echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\" style='background-color:#c9f0e8'>" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
							}else if($campo == 'parceirodenegocio_id' || $campo == 'nome_parceiro' || $campo == 'cnpj_parceiro' || $campo == 'status_parceiro'){
								echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\" style='background-color:#c9f0e8'>" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
							}else{
								echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
							}
						}
						foreach($configCont as $campo=>$campoLabel){
							if($campo == 'parceirodenegocio_id' || $campo == 'nome_parceiro' || $campo == 'cnpj_parceiro' || $campo == 'status_parceiro'){
								echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\" style='background-color:#c9f0e8'>" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
				
							}else{
								 echo "<th id=\"$campo\" class=\"colunaConta comprimentoMinimo $campo\">" . $this->Paginator->sort($campo, $campoLabel) . "<div id='indica-ordem' class='posicao-seta'></div></th>";
							}
						     
					    }
					?>
				</tr>
			
	<?php } ?>
	<?php
		$j=0;
		foreach ($parcelas as $parcela): 
			
	?>
	<tr>
		<td class="actions">
		    <?php 
				echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Conta','title'=>'Visualizar Conta','url'=>array('controller' => 'contas','action' => 'view', $parcela['Conta'][0]['id'])));
			
				echo $this->html->image('parceiro.png',array('alt'=>'Visualizar Parceiro de Negócio','title'=>'Visualizar Parceiro de Negócio',
				'url'=>array('controller'=>'Parceirodenegocios','action'=>'view',$parcela['Conta'][0]['parceirodenegocio_id'])));
			?>
			
		</td>
		<?php
		
		    foreach($configparc as $campo=>$campoLabel){
		    	if($campo=="status"){
				    echo "<td class='status'>" . $this->Html->image('semaforo-' . strtolower($parcela['Parcela']['status']) . '-12x12.png', array('alt' => $parcela['Parcela']['status'], 'title' => $parcela['Parcela']['status'])) . "&nbsp;</td>";
				    //Monter uma tabela dentro de um modal
				}else if($campo=="obs"){
					echo "<td class=\"$campo\">" . $parcela['Conta'][0]['descricao'] . "&nbsp;</td>";   
				}else{
					echo "<td class=\"$campo\">" . $parcela['Parcela'][$campo] . "&nbsp;</td>";
				}
				
		    	
			}
			foreach($configCont as $campo=>$campoLabel){							
						if($campo=="status"){
						    echo "<td class='status'>" . $this->Html->image('semaforo-' . strtolower($parcela['Conta'][0]['status']) . '-12x12.png', array('alt' => $parcela['Conta'][0]['status'], 'title' => $parcela['Conta'][0]['status'])) . "&nbsp;</td>";
						    //Monter uma tabela dentro de um modal
						}else if($campo=="cnpj_parceiro "){
						 	echo "<td class=\"$campo\">" . $parcela['Parcela']['cnpj_parceiro'] . "&nbsp;</td>";   
						}else if($campo=="parceirodenegocio_id"){
						   echo "<td class=\"$campo\">" . $parcela['Parcela']['parceirodenegocio_id'] . "&nbsp;</td>"; 
						}else if($campo=="cnpj_parceiro"){
						   echo "<td class=\"$campo\">" . $parcela['Parcela']['cnpj_parceiro'] . "&nbsp;</td>"; 
						}else if($campo=="nome_parceiro"){
						   echo "<td class=\"$campo\">" . $parcela['Parcela']['nome_parceiro'] . "&nbsp;</td>"; 
						}else if($campo=="status_parceiro"){
						   
						   echo "<td class='status'>" . $this->Html->image('semaforo-' . strtolower($parcela['Parcela']['status_parceiro'] ) . '-12x12.png', array('alt' => $parcela['Parcela']['status_parceiro'] , 'title' => $parcela['Parcela']['status_parceiro'] )) . "&nbsp;</td>";
						}else if($campo=="tipodeconta_id"){
							 echo "<td class=\"$campo\">" . $parcela['Parcela']['tipodeconta_id'] . "&nbsp;</td>"; 
						}else if($campo=="centrocusto_id"){
							 echo "<td class=\"$campo\">" . $parcela['Parcela']['centrocusto_id'] . "&nbsp;</td>"; 
						}else if($campo=="parcela"){
							 
						}else if($campo=="valor"){
							echo "<td class=\"$campo\">R$ " . number_format($parcela['Conta'][0][$campo], 2, ',', '.') . "&nbsp;</td>";
						}else{
							
							echo "<td class=\"$campo\">" . $parcela['Conta'][0][$campo] . "&nbsp;</td>";
						}
							
							
			}
		?>
	</tr>	
								    
	<?php endforeach; ?>
	

<?php
    }
	//fim de Consulta de parcelas
?>	
	    </table>
		<?php echo $this->element('paginador_inferior');?>
	    </div>
							
	
	

</div>
<script type="text/javascript">
	$(document).ready(function(){
	    $(".bt-showmodal").click(function(){
		nome = $(this).attr('href');
		$('#'+nome).modal('show');
			    
	    });	
		
	});
</script>

   
