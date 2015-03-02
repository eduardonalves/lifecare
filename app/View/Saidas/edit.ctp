<?php
	echo $this->Html->css('rh.css');
	echo $this->Html->css('saidas_view.css');
	echo $this->Html->css('table.css');
	echo $this->Html->css('PrintArea.css');
	echo $this->Html->css('faturamento-saida-edit.css');
	echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	echo $this->Html->css('jquery-ui/custom-combobox.css');
	echo $this->Html->script('jquery.PrintArea.js');
	echo $this->Html->script('funcoes_faturamento.js');
	echo $this->Html->script('jquery-ui/jquery.ui.button.js');


	function convertMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}

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
	<h1 class="menuOption61"></h1>
</header>

<!-- ######### DADOS DO EMITENTE ######### -->
<section>		
	<header>Emitente</header>
	<section class="coluna-esquerda">
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Razão:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['razao'],array('class'=>'valor'));?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','CRT:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['crt'],array('class'=>'valor'));?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['uf'],array('class'=>'valor'));?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['bairro'],array('class'=>'valor'));?>	
			</div>
		</div>
	</section>

	<section class="coluna-central">		
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Nome Fant.:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['nome_fantasia'],array('class'=>'valor'));?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Inscri. Estadual:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['ie'],array('class'=>'valor'));?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['cep'],array('class'=>'valor'));?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','nº / Comple.:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					if($emitente['Empresa']['numero'] != '' && $emitente['Empresa']['complemento'] != ''){
						$nComplemento = $emitente['Empresa']['numero'] . ', ' . $emitente['Empresa']['complemento'];
					}else{
						if($emitente['Empresa']['numero'] == ''){
							$nComplemento = $emitente['Empresa']['complemento'];
						}else if($emitente['Empresa']['complemento'] == ''){
							$nComplemento = $emitente['Empresa']['numero'];
						}
					}
					echo $this->Html->Tag('p', $nComplemento ,array('class'=>'valor'));
				 ?>	
			</div>
		</div>
	</section>

	<section class="coluna-direita">		
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','CNPJ:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Empresa']['cnpj'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cod. Municipio:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Cmunfg']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>	
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Empresa']['cidade'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Endereço:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Empresa']['endereco'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>
	</section>
</section>


<!-- ##### DADOS DO DESTINATÁRIO ##### -->
<section>
	<?php		
		if(empty($cliContato)){
			$cliContato['Contato']['telefone1'] = '';
			$cliContato['Contato']['email'] = '';
		}

		if(empty($cliEndereco)){
			$cliEndereco['Endereco']['logradouro'] = '';
	        $cliEndereco['Endereco']['numero'] = '';
			$cliEndereco['Endereco']['complemento'] = '';
			$cliEndereco['Endereco']['bairro'] = '';
			$cliEndereco['Endereco']['cep'] = '';
			$cliEndereco['Endereco']['uf'] = '';
			$cliEndereco['Endereco']['cidade'] = '';
		}
	?>
		<header>Dados do Destinatário</header>
		<section class="coluna-esquerda">
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Destinatário:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['nome'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Nome Fantasia:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['nomeFantasia'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['cpf_cnpj'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Ins. Estadual:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['ie'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliContato['Contato']['telefone1'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
		</section>
		<section class="coluna-central">
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','E-mail:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliContato['Contato']['email'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['logradouro'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Número:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['numero'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['complemento'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['bairro'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
		</section>
		<section class="coluna-direita">				
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['cep'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['uf'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['cidade'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
		</section>
</section>

<!-- ######### DADOS DA NOTA ######### -->
<section>	
	<header>Dados da Nota</header>
	<span id="msgCamposTotal" style="display:none;clear:both;" class='msgValidaModal'>Todos os Campos são Obrigatórios!</span>	
<?php echo $this->Form->create('Saida',array('id'=>'formularioNota')); ?>
<fieldset style="clear:both;padding-bottom:10px;">
	<legend style="margin-bottom:10px;">Cabeção da Nota Fiscal</legend>
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('nota_fiscal',array('label'=>'Nº nota<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio validaNota','type'=>'text'));
			echo $this->Form->input('codnota',array('label'=>'Cod. Nota<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio validaNota','type'=>'text'));

			echo $this->Form->input('ds',array('value'=>$saida['Saida']['tpemis'],'type'=>'hidden','id'=>'tpEmisHide'));
			echo $this->Form->input('tpemis',array('id'=>'auxTpEmis','label'=>'Tipo de Emi. NF-e<span class="campo-obrigatorio">*</span>:','type'=>'select','class'=>'tamanho-medio validaNota','options'=>array('1'=>'Normal','2'=>'Contingência FS', '3'=>'Contingência SCAN','4'=>'Contingência DPEC','5'=>'Contingência FS - DA','6'=>'Contingência SVC - AN','7'=>'Contingência SVC - RS')));			
			
			echo $this->Form->input('data',array('value'=>formatDateToView($saida['Saida']['data']),'label'=>'Data Emissão<span class="campo-obrigatorio">*</span>:','class'=>'validaNota tamanho-medio inputData','type'=>'text'));
			echo $this->Form->input('data_entrada',array('value'=>formatDateToView($saida['Saida']['data_entrada']),'label'=>'Data Entrada<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio inputData validaNota','type'=>'text'));
			echo $this->Form->input('data_saida',array('value'=>formatDateToView($saida['Saida']['data_saida']),'label'=>'Data Saída<span class="campo-obrigatorio">*</span>:','class'=>'validaNota tamanho-medio inputData','type'=>'text'));
				echo $this->Form->input('cep',array('type'=>'text','id'=>'cep','label'=>'Cep<span class="campo-obrigatorio">*</span>:','class'=>'validaNota tamanho-medio inputCep'));
			echo $this->Form->input('cmunfg',array('type'=>'text','label'=>'Cód. Muni. FG<span class="campo-obrigatorio">*</span>:','id'=>'ibge','class'=>'validaNota borderZero tamanho-medio','readonly'=>'readonly','onfocus'=>'this.blur();'));
				

		?>
	</section>
	<section class="coluna-central">
		<?php
	
			echo $this->Form->input('serie',array('label'=>'Série<span class="campo-obrigatorio">*</span>:','type'=>'text','class'=>'validaNota tamanho-pequeno','maxlength'=>'3'));
			
			echo $this->Form->input('ds',array('value'=>$saida['Saida']['tpimp'],'type'=>'hidden','id'=>'tpImpHide'));
			echo $this->Form->input('ds',array('value'=>$saida['Saida']['finnfe'],'type'=>'hidden','id'=>'finNfeHide'));
			
			echo $this->Form->input('tpimp',array('id'=>'auxTpImp','label'=>'Impressão<span class="campo-obrigatorio">*</span>:','type'=>'select','class'=>'validaNota tamanho-pequeno','options'=>array('1'=>'Retrato','2'=>'Paisagem')));
			echo $this->Form->input('finnfe',array('id'=>'auxFinNfe','label'=>'Fin. Emi. da NF-e<span class="campo-obrigatorio">*</span>:',''=>'Finalidade de emissão da NF-e','type'=>'select','options'=>array('1'=>'NF-e normal','2'=>'NF-e complementar','3'=>'NF-e de ajuste'),'class'=>'tamanho-medio validaNota'));


			echo $this->Form->input('ds',array('value'=>$saida['Saida']['natop_id'],'type'=>'hidden','id'=>'natopIdHide'));

			echo $this->Form->input('ds',array('value'=>$saida['Saida']['cuf_id'],'type'=>'hidden','id'=>'cufidHide'));
		?>
			<!-- NATOP ###################### -->


			<div style="clear:both;"> 
				<label>Natureza Operação<span class="campo-obrigatorio">*</span>:</label>
				<select id="auxNatopId" name="data[Saida][natop_id]" class="tamanho-medio validaNota">		
					<?php
						foreach($natops as $natop){								
							echo "<option value='".$natop['Natop']['id']."'>";
								echo $natop['Natop']['descricao'];
							echo "</option>";
						}
					?>
				</select>
			</div>

			<!-- CÒDIGO UF cUF -->			
			<div style="clear:both;"> 
				<label>Código UF<span class="campo-obrigatorio">*</span>:</label>
				<select id="auxcufid" name="data[Saida][cuf_id]" class="tamanho-medio validaNota">			
					<?php
						foreach($cufs as $cuf){								
							echo "<option value='".$cuf['cuf']['id']."'>";
								echo $cuf['cuf']['codigo'].' - '.$cuf['cuf']['descricao'];
							echo "</option>";
						}
					?>
				</select>
			</div>

			<!-- TRANSPORTADORA -->
			<input type="hidden" id="auxId" value="<?php echo $saida['Saida']['transportadore_id']; ?>">
			<div class="input autocompleteTransportadoras contas">
			    <span id="msgValidaTipoConta" class="Msg tooltipMensagemErroTopo" style="display:none">Preencha o campo Tipo Conta</span>
			    <label>Transportadora<span class="campo-obrigatorio">*</span>:</label>
			    <select name="data[Saida][transportadore_id]" class="tamanho-medio validaNota" id="add-transportadora">
				    <option id="optvazioForn"></option>
				   <option value="add-transportadora">Cadastrar</option>
				    <?php
				       foreach($transporadoras as $transportadora){
												
							echo "<option value='".$transportadora['Transportadore']['id']."' >";
								echo $transportadora['Transportadore']['nome'];
							echo "</option>";
						
						}
				    ?>
			    </select>
			</div>
	</section>
	<section class="coluna-direita">
		<?php
		
			echo $this->Form->input('modfrete',array('id'=>'modFrete','label'=>'Mod. do Frete<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio validaNota','type'=>'select','options'=>array('1'=>'Próprio','0'=>'Outros')));
			//1 - proprio/emitente , 0 - outros

			echo $this->Form->input('freteproprio',array('id'=>'freteProprio','label'=>'Frete:','class'=>'tamanho-medio','type'=>'hidden'));
			// 1 se modfrete proprio/emitente, 0 se modfrete 0
		
			//echo $this->Form->input('transportadore_id',array('label'=>'transportadore_id','class'=>'tamanho-medio','type'=>'text'));
			
			echo $this->Form->input('infoadic',array('label'=>'Info. Adic.<span class="campo-obrigatorio">*</span>:','class'=>'validaNota','type'=>'textarea','style'=>'height: 105px;width:150px;margin-bottom:7px;'));	

			echo $this->Form->input('ds',array('value'=>$saida['Saida']['indpag'],'type'=>'hidden','id'=>'indpagHide'));
		?>
		<div id="hidden-tranps"></div>
		<div id="hidden-duplis"></div>	

			<!-- INDPAG ###################### -->
			<div style="clear:both;"> 
				<label>Ind. Forma Pgto.<span class="campo-obrigatorio">*</span>:</label>
				<select id="auxindpag" name="data[Saida][indpag]" class="tamanho-medio validaNota">			
					<option value="1">Pagamento à Vista</option>
					<option value="2">Pagamento a Prazo</option>
					<option value="3">Outros</option>							
				</select>			
			</div>
	</section>
</section>



<!-- ######### VOLUMES DO TRANSPORTE ######### -->
<section style="clear:both;">
	<header>Volumes do Transporte</header>
		<?php if($saida['Saida']['status_completo'] == 0){ ?>
			<a href="add-itensTransporte" class="bt-showmodal" style="float:right;margin-top:15px;">
				<?php echo $this->Html->image('botao-adicionar2.png'); ?>
			</a>
		<?php } ?>
	<section id="caixas-tranps" class="row" style="clear:both;margin:0 auto;">
	<?php		
		if(!empty($saida['Transp'])){
			$i = 0;
			foreach ($saida['Transp'] as $infoTransp) {
				$i++;
				echo "<fieldset class='caixa-volume'><legend>Volume ".$i."</legend>";
						echo "<article class='span1 label-volume'>
								<span>Qtd. Vol:</span>
								<span>Peso Liq.:</span>
								<span>Peso Bru.:</span>
								<span>Espécie:</span>
								<span>Nº Vol.:</span>
								<span>Lacre:</span>
							</article>";
						echo "<article class='span2 valor-volume'>";
							echo '<p>' . $infoTransp['qvol'] . '</p>'; 
							echo '<p>' . $infoTransp['pesol'] . '</p>'; 
							echo '<p>' . $infoTransp['pesob'] . '</p>'; 
							echo '<p>' . $infoTransp['esp'] . '</p>'; 
							echo '<p>' . $infoTransp['nVol'] . '</p>'; 
							echo '<p>' . $infoTransp['lacres'] . '</p>';
						echo "</article>";
				echo "</fieldset>";	
			}
		}
	?>
	</section>
</section>


<!-- ######### DUPLICATAS ######### -->
<section style="clear:both;">
	<header>Duplicatas</header>
	<section style="clear:both;">
		<?php if($saida['Saida']['status_completo'] == 0){ ?>
			<a href="add-notaDuplicata" class="bt-showmodal" style="float:right;margin-top:15px;">
				<?php echo $this->Html->image('botao-adicionar2.png'); ?>
			</a>
		<?php } ?>
		<section id="caixas-duplicatas" class="row" style="clear:both;margin:0 auto;">
		<?php		
			if(!empty($saida['Duplicata'])){
				$i = 0;
				foreach ($saida['Duplicata'] as $duplicatas) {
					$i++;
					echo "<fieldset class='caixa-duplicata'><legend>Volume ".$i."</legend>";
							echo "<article class='span1 label-duplicata'>
									<span>Nº Dupli.:</span>
									<span>Data Venc.:</span>
									<span>Valor (R$):</span>
								</article>";
							echo "<article class='span2 valor-duplicata'>";
								echo '<p>' . $duplicatas['ndup'] . '</p>'; 
								echo '<p>' . formatDateToView($duplicatas['dvenc']) . '</p>'; 
								echo '<p>' . number_format($duplicatas['vdup'],2,',','.') . '</p>'; 
							echo "</article>";
					echo "</fieldset>";	
				}
			}
		?>
		</section>
	</section>
</section>


</fieldset>
<footer>
<?php 	
	if($saida['Saida']['status_completo'] == 0){
		echo $this->Form->input('status_completo',array('type'=>'hidden','value'=>1));
		echo $this->Html->image('botao-salvar.png',array(
							    'class'=>'',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'id'=>'subimitar'));
		echo $this->Form->end(); 		
	}

?>
</footer>

<!-- PRODUTOS DA NOTA -->
<section>
	<header>Itens da Nota</header>

	<table id="tabela-principal" cellpadding="0" cellspacing="0">

				<?php
					if($saida['Saida']['forma_de_entrada']==0){
				?>
						<tr>
							<th><?php echo ('Cod.'); ?></th>
							<th><?php echo ('Nome'); ?></th>
							<th><?php echo ('Und.'); ?></th>
							<th><?php echo ('Descrição'); ?></th>
							<th><?php echo ('Qtd.'); ?></th>
							<th class="valor"><?php echo ('V. Unit.'); ?></th>
							<th class="valor"><?php echo ('V. Total'); ?></th>
							<th class="imposto valor"><?php echo ('CFOP'); ?></th>
							<th class="imposto valor"><?php echo ('ICMS'); ?></th>
							<th class="imposto valor"><?php echo ('IPI'); ?></th>
							<th><?php echo ('Lote'); ?></th>
						</tr>
				<?php
					}else{
				?>
						<th><?php echo ('Cod.'); ?></th>
						<th><?php echo ('Nome'); ?></th>
						<th><?php echo ('Und.'); ?></th>
						<th><?php echo ('Descrição'); ?></th>
						<th><?php echo ('Qtd'); ?></th>
						<th class="valor"><?php echo ('V. Unit.'); ?></th>
						<th class="valor"><?php echo ('V. Total'); ?></th>
						<th><?php echo ('Lote'); ?></th>
				<?php 
					}
				?>

				<?php
					if($saida['Saida']['forma_de_entrada']==0){

						foreach($itens as $prodIten){

							$prodIten['Produtoiten']['valor_total']=convertMoeda($prodIten['Produtoiten']['valor_total']);
							$prodIten['Produtoiten']['valor_unitario']=convertMoeda($prodIten['Produtoiten']['valor_unitario']);
							$prodIten['Produto']['percentual_icms']=convertMoeda($prodIten['Produto']['percentual_icms']);
							$prodIten['Produto']['percentual_ipi']=convertMoeda($prodIten['Produto']['percentual_ipi']);

							echo '<tr class="valbtconfimar">';
							echo "<td>".$prodIten['Produto']['id']."</td>";
							echo "<td>".$prodIten['Produto']['nome']."</td>";
							echo "<td>".$prodIten['Produto']['unidade']."</td>";
							echo "<td>".$prodIten['Produto']['descricao']."</td>";
							echo "<td>".$prodIten['Produtoiten']['qtde']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_unitario']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_total']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['cfop']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['percentual_icms']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['percentual_ipi']."</td>";

							echo "<td>";
							foreach($loteitens as $loteiten){

									if( $loteiten['Loteiten']['produtoiten_id'] ==  $prodIten['Produtoiten']['id']){
										$loteiten['Lote']['data_validade'] = $loteiten['Lote']['data_validade'];
										echo "N Lote: ".$loteiten['Lote']['numero_lote'].", Qtde: ".$loteiten['Loteiten']['qtde'].", Val: ".$loteiten['Lote']['data_validade']."<br />";
									}
							}
							echo "</td>";
							echo '</tr>';

						}

					}else{
						foreach($itens as $prodIten){

							$prodIten['Produtoiten']['valor_total']= convertMoeda($prodIten['Produtoiten']['valor_total']);
							$prodIten['Produtoiten']['valor_unitario']= convertMoeda($prodIten['Produtoiten']['valor_unitario']);

							echo '<tr class="valbtconfimar">';
							echo "<td>".$prodIten['Produto']['id']."</td>";
							echo "<td>".$prodIten['Produto']['nome']."</td>";
							echo "<td>".$prodIten['Produto']['unidade']."</td>";
							echo "<td>".$prodIten['Produto']['descricao']."</td>";
							echo "<td>".$prodIten['Produtoiten']['qtde']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_unitario']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_total']."</td>";
							echo "<td>";
							$j=0;
							foreach($loteitens as $loteiten){
									if($loteiten['Loteiten']['produtoiten_id'] ==  $prodIten['Produtoiten']['id']){

										$loteiten['Lote']['data_validade'] = formatDateToView($loteiten['Lote']['data_validade']);
										echo "N Lote: ".$loteiten['Lote']['numero_lote'].", Qtde: ".$loteiten['Loteiten']['qtde'].", Val: ".$loteiten['Lote']['data_validade']."<br />";
									}
							}
							echo "</td>";
							echo '</tr>';
						}
					}
				?>
			</table>	
</section>


<!-- MODAL DADOS DO TRANSPORTE -->

	<div class="modal fade" id="myModal_add-itensTransporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<?php
				echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
			?>
			<header id="cabecalho">
				<?php 
					echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
				?>
				<h1> Preencher Itens do Transporte </h1>
			</header>
			
			<section>
				<header></header>
			</section>
			<section style="clear:both;left:50px;width:300px;">
				<span id="msgCamposObrTransp" style="display:none;" class='msgValidaModal'>Todos os Campos são Obrigatórios!</span>	

				<?php
					echo $this->Form->input('notaId',array('id'=>'input-nota_id','type'=>'hidden','value'=>$saida['Saida']['id']));
					echo $this->Form->input('qvol',array('id'=>'input-qvol','label'=>'Qtde. Volume<span class="campo-obrigatorio">*</span>:','class'=>'valida tamanho-pequeno','type'=>'text'));
					echo $this->Form->input('pesol',array('id'=>'input-pesol','label'=>'Peso Liquido<span class="campo-obrigatorio">*</span>:','class'=>'peso valida tamanho-pequeno','type'=>'text'));
					echo $this->Form->input('pesob',array('id'=>'input-pesob','label'=>'Peso. Bruto<span class="campo-obrigatorio">*</span>:','class'=>'peso valida tamanho-pequeno','type'=>'text'));
					echo $this->Form->input('esp',array('id'=>'input-esp','label'=>'Espécie<span class="campo-obrigatorio">*</span>:','class'=>'valida tamanho-pequeno','type'=>'text'));
					echo $this->Form->input('nVol',array('id'=>'input-nVol','label'=>'Nº Volume<span class="campo-obrigatorio">*</span>:','class'=>'valida tamanho-pequeno','type'=>'text'));
					echo $this->Form->input('lacres',array('id'=>'input-lacres','label'=>'Lacre<span class="campo-obrigatorio">*</span>:','class'=>'valida tamanho-pequeno','type'=>'text'));
				?>
				
			</section>
				<a id="adicionar-transp" class="" style="float:right;margin-top: 30px;margin-right: 30px;">
					<?php echo $this->Html->image('botao-adicionar2.png'); ?>
				</a>
		</div>
	</div>	


<!-- MODAL DUPLICATAS -->
	<div class="modal fade" id="myModal_add-notaDuplicata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<?php
				echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
			?>
			<header id="cabecalho">
				<?php 
					echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
				?>
				<h1> Adicionar Duplicata </h1>
			</header>
			
			<section>
				<header></header>
			</section>
			<section style="clear:both;left:50px;width:300px;">
				<span id="msgCamposObrDuplicata" style="display:none;" class='msgValidaModal'>Todos os Campos são Obrigatórios!</span>	
				<?php
					echo $this->Form->input('ndup',array('id'=>'input-ndup','label'=>'Nº Duplicata<span class="campo-obrigatorio">*</span>:','class'=>'validaDupli tamanho-pequeno','type'=>'text'));
					echo $this->Form->input('dvenc',array('id'=>'input-dvenc','label'=>'Data Vencimento<span class="campo-obrigatorio">*</span>:','class'=>'validaDupli tamanho-pequeno inputData','type'=>'text'));
					echo $this->Form->input('vdup',array('id'=>'input-vdup','label'=>'Valor<span class="campo-obrigatorio">*</span>:','class'=>'dinheiro_duasCasas validaDupli tamanho-pequeno','type'=>'text'));
					
				?>
				
			</section>
				<a id="adicionar-duplicata" class="" style="cursor:pointer;float:right;margin-top: 30px;margin-right: 30px;">
					<?php echo $this->Html->image('botao-adicionar2.png'); ?>
				</a>
		</div>
		</div>
	</div>

	<!-- MODAL ADD TRANSPORTADORA -->
	<div class="modal fade" id="myModal_add-transportadora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body" style="height:320px;">
			<?php
				echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
			?>
			<header id="cabecalho">
				<?php 
					echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
				?>
				<h1> Adicionar Transportadora </h1>
			</header>
			
			<section>
				<header></header>
			</section>
			<section style="clear:both;left:50px;width:330px;">
			<span id="msgCamposObrTransportadora" style="display:none;" class='msgValidaModal'>Todos os Campos são Obrigatórios!</span>	
				<?php
					echo $this->Form->create('Transportadore',array('id'=>'formTransportadora'));
						echo $this->Form->input('cnpj',array('label'=>'CNPJ<span class="campo-obrigatorio">*</span>:','class'=>'validaTransp tamanho-medio cnpj'));
						echo $this->Form->input('nome',array('label'=>'Nome<span class="campo-obrigatorio">*</span>:','class'=>'validaTransp tamanho-medio'));
						echo $this->Form->input('ie',array('label'=>'Inscri. Estadual<span class="campo-obrigatorio">*</span>:','class'=>'ieMask validaTransp tamanho-medio'));
						echo $this->Form->input('endereco',array('label'=>'Endereço<span class="campo-obrigatorio">*</span>:','class'=>'validaTransp tamanho-medio'));
						echo $this->Form->input('cidade',array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:','class'=>'validaTransp tamanho-medio'));
						echo $this->Form->input('uf',array('label'=>'UF<span class="campo-obrigatorio">*</span>:','class'=>'validaTransp tamanho-pequeno uf','maxlength'=>2));
					echo $this->Form->end();

				?>
				
			</section>
				<div id="" class="" style="cursor:pointer;float:right;margin-top: 30px;margin-right: 30px;">
					<?php echo $this->Html->image('botao-adicionar2.png',array('id'=>'salvarTransportadora')); ?>
				</div>
		</div>
		</div>
	</div>