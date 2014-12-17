<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('view_produtos');
	echo $this->Html->css('table');
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
	
	function converterMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
	
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
					<div class="linha"><?php echo $this->Html->Tag('p','Código Barras:',array('class'=>'titulo '));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['codigoEan'],array('class'=>'valor codigoean')); ?></div>
				</div>
				
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Registo Anvisa:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['registro'],array('class'=>'valor'));?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['nome'],array('class'=>'valor')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome  Comercial:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['nomeComercial'],array('class'=>'valor')); ?></div>
				</div>
				<br />
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Princípio Ativo:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['principioAtivo'],array('class'=>'valor')); ?></div>
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
				</div>
				
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Corredor:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['corredor'],array('class'=>'valor'));?></div>
				</div>	
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Código FGV:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Produto']['codigoFGV'],array('class'=>'valor'));?></div>
				</div>	
				<div class="conteudo-linha">	
					<div class="linha"><?php echo $this->Html->Tag('p','Preço FGV:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p', converterMoeda($produto['Produto']['precoFGV']),array('class'=>'valor'));?></div>
				</div>					
			</div>					
		</div>
	</section>
		
	<section class="coluna-central" >
		<fieldset>
			<legend>Dados ICMS</legend>
				<span id="sanfona1" class="bt-sanfona" style="background: rgb(193, 234, 193);text-align:center;font-size: 14px;display:block;border-radius:4px; color: #000; padding: 3px;"> Mostrar </span>
				<div class="sanfona1 filhide" style="display:none;">
					<?php if(!empty($icms['Situacaotribicm']['descricao'])){ ?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Situação Trib. ICMS:',array('class'=>'titulo')); ?></div>
							<div class="linha2" style="width: 140px;"><?php echo $this->Html->Tag('p',$icms['Situacaotribicm']['descricao'],array('class'=>'valor-descricao')); ?></div>					
						</div>					
					<?php } ?>
					<?php if(!empty($modalidadebc['Modalidadebc']['descricao'])){?>
						<div class="conteudo-linha">
							<?php $modbc = ''; if(!empty($modalidadebc['Modalidadebc']['descricao'])) { $modbc = $modalidadebc['Modalidadebc']['descricao'];}  ?>
							<div class="linha"><?php echo $this->Html->Tag('p','Modalidade BC:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$modbc,array('class'=>'valor')); ?></div>					
						</div>	
					<?php } ?>
					<?php if(!empty($modalidadebcst['Modalidadebc']['descricao'])){?>			
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<?php $modbcst = ''; if(!empty($modalidadebcst['Modalidadebc']['descricao'])) { $modbcst = $modalidadebcst['Modalidadebcst']['descricao'];}  ?>
							<div class="linha"><?php echo $this->Html->Tag('p','Modalidade BC ST:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$modbcst,array('class'=>'valor')); ?></div>					
						</div>	
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['aliq_icms'])){?>			
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Aliquota ICMS:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['aliq_icms'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['margemvaloradic'])){ ?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Margem Valor Adic. :',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['margemvaloradic'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['reducaobasecalcst'])){ ?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Redução Base Calc. ST:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['reducaobasecalcst'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['precounitpautast'])){ ?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Preço Unit. Pauta St:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['precounitpautast'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['alq_icmsst'])){ ?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Aliquota ICMS ST:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['alq_icmsst'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['motivodesoneracao_id'])){?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Motivo Desoneração:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['motivodesoneracao_id'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['percentualbcoppropria'])){ ?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Percentual BCO Própria:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['percentualbcoppropria'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
					<?php if(!empty($produto['Icm'][0]['reducaobasecalc'])){ ?>
						<div class="conteudo-linha" style="margin-bottom: 25px;">
							<div class="linha"><?php echo $this->Html->Tag('p','Redução Base Calc.:',array('class'=>'titulo')); ?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Icm'][0]['reducaobasecalc'],array('class'=>'valor')); ?></div>					
						</div>
					<?php } ?>
				</div>
		</fieldset>
		
		<fieldset>
			<legend>Dados IPI</legend>
			<span id="sanfona2" class="bt-sanfona" style="background: rgb(193, 234, 193);text-align:center;font-size: 14px;display:block;border-radius:4px; color: #000; padding: 3px;"> Mostrar </span>
			<div class="sanfona2 filhide" style="display:none;">
				
				<?php if(!empty($ipi['Situacaotribipi']['descricao'])){?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Situação Trib.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$ipi['Situacaotribipi']['descricao'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Ipi'][0]['classe_enquadramento'])){?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Classe Enquadramento:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Ipi'][0]['classe_enquadramento'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Ipi'][0]['cnpj_produtor'])){?>
					<div class="conteudo-linha" >
						<div class="linha"><?php echo $this->Html->Tag('p','CNPJ Produtor:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Ipi'][0]['cnpj_produtor'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Ipi'][0]['codigo_selo'])){?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Código Selo IPI:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Ipi'][0]['codigo_selo'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Ipi'][0]['qtd_selo'])){ ?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Quantidade Selo IPI:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Ipi'][0]['qtd_selo'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Ipi'][0]['aliq_ipi'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Aliquota IPI:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Ipi'][0]['aliq_ipi'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Ipi'][0]['valorporunid'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Valor por Unid.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Ipi'][0]['valorporunid'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Ipi'][0]['tipodecalculo'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Tipo de Calc.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Ipi'][0]['tipodecalculo'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				
				</div>
			
		</fieldset>		
		
		<fieldset>
			<legend>Dados COFINS</legend>
			<span id="sanfona3" class="bt-sanfona" style="background: rgb(193, 234, 193);text-align:center;font-size: 14px;display:block;border-radius:4px; color: #000; padding: 3px;"> Mostrar </span>
			<div class="sanfona3" style="display:none;">
				<?php if(!empty($cofin['Situacaotribcofin']['descricao'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Situação Trib.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$cofin['Situacaotribcofin']['descricao'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Cofin'][0]['tipodecalculo'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Tipo de Calc.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Cofin'][0]['tipodecalculo'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Cofin'][0]['tipodecalsubtrib'])){ ?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Tipo de Calc. Subst. Trib:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Cofin'][0]['tipodecalsubtrib'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Cofin'][0]['valorunitcofins'])){ ?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Valor Unt. Cofins.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Cofin'][0]['valorunitcofins'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Cofin'][0]['valunidcofinsst'])){ ?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Valor Unit. Confins ST:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Cofin'][0]['valunidcofinsst'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Cofin'][0]['aliq_cofins'])){ ?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Aliquota COFINS:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Cofin'][0]['aliq_cofins'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Cofin'][0]['aliq_cofinsst'])){ ?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Aliquota COFINS ST:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Cofin'][0]['aliq_cofinsst'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
			
			</div>
		</fieldset>
		
		<fieldset>
			<legend>Dados PIS</legend>
			<span id="sanfona4" class="bt-sanfona" style="background: rgb(193, 234, 193);text-align:center;font-size: 14px;display:block;border-radius:4px; color: #000; padding: 3px;"> Mostrar </span>
			<div class="sanfona4" style="display:none;">
				
				<?php if(!empty($pis['Situacaotribpi']['descricao'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Situação Trib.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$pis['Situacaotribpi']['descricao'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Pi'][0]['alq_pis'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Aliquota PIS.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Pi'][0]['alq_pis'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Pi'][0]['alq_pisst'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Alquiota PIS ST.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Pi'][0]['alq_pisst'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Pi'][0]['tipodecalculo'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Tipo de Calc.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Pi'][0]['tipodecalculo'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Pi'][0]['tipodecalsubtrib'])){ ?>
					<div class="conteudo-linha" style="margin-bottom: 25px;">
						<div class="linha"><?php echo $this->Html->Tag('p','Tipo de Calc. Subst. Trib:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Pi'][0]['tipodecalsubtrib'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Pi'][0]['valundtrib'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Valor Und. Trib.:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Pi'][0]['valundtrib'],array('class'=>'valor')); ?></div>					
					</div>
				<?php } ?>
				<?php if(!empty($produto['Pi'][0]['valunidpisst'])){ ?>
					<div class="conteudo-linha">
						<div class="linha"><?php echo $this->Html->Tag('p','Valor Und. Trib. ST:',array('class'=>'titulo')); ?></div>
						<div class="linha2"><?php echo $this->Html->Tag('p',$produto['Pi'][0]['valunidpisst'],array('class'=>'valor')); ?></div>					
					</div>	
				<?php } ?>		
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

			<table align="center" class="tbl_lote">
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
	<?php
		if(isset($telaAbas)){
			
	?>
	<div style="clear:both;"></div>
	
	<section>
	<header>Pedidos do Produto</header>
		<table>
			<thead>
				<th>Ações</th>
				<th>Código Operação</th>
				<th>Data Operação</th>
				<th>Fornecedor</th>
				<th>Preço</th>
			</thead>		
		
			<?php		
				foreach($itensOp as $operacaos){
					
					echo "<tr>";
						echo "<td>";
							echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Pedido','class' => '','title'=>'Visualizar Pedido','url'=>array('controller'=>'Pedidos','action'=>'view',$operacaos['Comoperacao']['id'])));
						echo "</td>";
						
						echo "<td>";
							echo $operacaos['Comoperacao']['id'];
						echo "</td>";
					
						echo "<td>";
							echo formatDateToView($operacaos['Comoperacao']['data_inici']);
						echo "</td>";
						
						echo "<td class='whiteSpace'><span title='";echo $operacaos['Parceirodenegocio'][0]['nome']; echo "'>";
							echo $operacaos['Parceirodenegocio'][0]['nome'];
						echo "</span></td>";
						
						$i=0;
						foreach($operacaos['Comitensdaoperacao'] as $itens ){
							if($itens['produto_id'] ==  $id && $i == 0){
								echo "<td>";
									echo converterMoeda($itens['valor_unit']);
								echo "</td>";
								$i++;
							}									
						}				
					echo "</tr>";						
				}				
			?>
	</table>
	</section>
	<?php
		}
	?>
<footer>
	<script>
		$(document).ready(function(){
			var sonfstatus1 = false;
			var sonfstatus2 = false;
			var sonfstatus3 = false;
			var sonfstatus4 = false;
			$('#sanfona1').click(function(){
				if(sonfstatus1 != true){ sonfstatus1 = false; }
				$('.sanfona1').toggle(function(){
					if(sonfstatus1 == false){
						$('#sanfona1').text('Esconder');
						sonfstatus1 = true;
					}else{
						$('#sanfona1').text('Mostrar');
						sonfstatus1 = false;
					}
				});
				$('.sanfona2').hide();
				$('.sanfona3').hide();
				$('.sanfona4').hide();				
				$('#sanfona2').text('Mostrar');
				$('#sanfona3').text('Mostrar');
				$('#sanfona4').text('Mostrar');
			});
			$('#sanfona2').click(function(){
				if(sonfstatus2 != true){ sonfstatus2 = false; }
				$('.sanfona2').toggle(function(){
					if(sonfstatus2 == false){
						$('#sanfona2').text('Esconder');
						sonfstatus2 = true;
					}else{
						$('#sanfona2').text('Mostrar');
						sonfstatus2 = false;
					}
				});
				$('.sanfona1').hide();
				$('.sanfona3').hide();
				$('.sanfona4').hide();	
				$('#sanfona1').text('Mostrar');
				$('#sanfona3').text('Mostrar');
				$('#sanfona4').text('Mostrar');			
			});
			$('#sanfona3').click(function(){
				if(sonfstatus3 != true){ sonfstatus3 = false; }
				$('.sanfona3').toggle(function(){
					if(sonfstatus3 == false){
						$('#sanfona3').text('Esconder');
						sonfstatus3 = true;
					}else{
						$('#sanfona3').text('Mostrar');
						sonfstatus3 = false;
					}
				});
				$('.sanfona2').hide();
				$('.sanfona1').hide();
				$('.sanfona4').hide();
				$('#sanfona2').text('Mostrar');
				$('#sanfona1').text('Mostrar');
				$('#sanfona4').text('Mostrar');				
			});
			$('#sanfona4').click(function(){
				if(sonfstatus4 != true){ sonfstatus4 = false; }
				$('.sanfona4').toggle(function(){
					if(sonfstatus4 == false){
						$('#sanfona4').text('Esconder');
						sonfstatus4 = true;
					}else{
						$('#sanfona4').text('Mostrar');
						sonfstatus4 = false;
					}
				});
				$('.sanfona2').hide();
				$('.sanfona3').hide();
				$('.sanfona1').hide();
				$('#sanfona2').text('Mostrar');
				$('#sanfona3').text('Mostrar');
				$('#sanfona1').text('Mostrar');				
			});
		});
	</script>
	<?php
		if(isset($telaAbas)){
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',
													 $produto['Produto']['id'],'layout'=>'compras','abas'=>'41')));
		}else{
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',
													 $produto['Produto']['id'])));
		}
	?>
</footer>
