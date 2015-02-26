<?php
	echo $this->Html->css('rh.css');
	echo $this->Html->css('saidas_view.css');
	echo $this->Html->css('table.css');
	echo $this->Html->css('PrintArea.css');
	echo $this->Html->script('jquery.PrintArea.js');
	echo $this->Html->script('funcoes_faturamento.js');

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
<?php echo $this->Form->create('Saida'); ?>
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('numero_nota',array('label'=>'Nº nota:','class'=>'tamanho-medio','type'=>'text'));
			echo $this->Form->input('codnota',array('label'=>'Cod. Nota:','class'=>'tamanho-medio','type'=>'text'));
			echo $this->Form->input('tpEmis',array('label'=>'Tipo de Emi. NF-e:','type'=>'select','class'=>'tamanho-pequeno','options'=>array('1'=>'Normal','2'=>'Contingência FS', '3'=>'Contingência SCAN','4'=>'Contingência DPEC','5'=>'Contingência FS - DA','6'=>'Contingência SVC - AN','7'=>'Contingência SVC - RS')));			
			
			echo $this->Form->input('data',array('value'=>formatDateToView($saida['Saida']['data']),'label'=>'Data Emissão:','class'=>'tamanho-medio','type'=>'text'));
			echo $this->Form->input('data_entrada',array('value'=>formatDateToView($saida['Saida']['data_entrada']),'label'=>'Data Entrada:','class'=>'tamanho-medio','type'=>'text'));
			echo $this->Form->input('data_saida',array('value'=>formatDateToView($saida['Saida']['data_saida']),'label'=>'Data Saída:','class'=>'tamanho-medio','type'=>'text'));

		?>
	</section>
	<section class="coluna-central">
		<?php
	
			echo $this->Form->input('serie',array('label'=>'Série:','type'=>'text','class'=>'tamanho-pequeno','maxlength'=>'3'));
		
			echo $this->Form->input('cmunfg_id',array('label'=>'cmunfg_id','class'=>'tamanho-medio','type'=>'text'));
			echo $this->Form->input('tpimp',array('label'=>'Impressão:','type'=>'select','class'=>'tamanho-pequeno','options'=>array(''=>'','1'=>'Retrato','2'=>'Paisagem')));
			echo $this->Form->input('finnfe',array('label'=>'Fin. Emi. da NF-e:',''=>'Finalidade de emissão da NF-e','type'=>'select','options'=>array('1'=>'NF-e normal','2'=>'NF-e complementar','3'=>'NF-e de ajuste'),'class'=>'tamanho-pequeno'));
		?>
			<!-- NATOP ###################### -->
			<div style="clear:both;"> 
				<label>Natureza Operação:</label>
				<select name="data[Saida][natop_id]" class="tamanho-medio">				
					<option></option>
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
				<label>Código UF:</label>
				<select name="data[Saida][cuf_id]" class="tamanho-medio">			
					<option></option>
					<?php
						foreach($cufs as $cuf){								
							echo "<option value='".$cuf['cuf']['id']."'>";
								echo $cuf['cuf']['codigo'].' - '.$cuf['cuf']['descricao'];
							echo "</option>";
						}
					?>
				</select>
			</div>
	</section>
	<section class="coluna-direita">
		<?php
		
			echo $this->Form->input('modfrete',array('label'=>'modfrete','class'=>'tamanho-medio','type'=>'text'));
			//1 - proprio/emitente , 0 - outros

			echo $this->Form->input('freteproprio',array('label'=>'freteproprio','class'=>'tamanho-medio','type'=>'text'));
			// 1 se modfrete proprio/emitente, 0 se modfrete 0
			echo $this->Form->input('transportadore_id',array('label'=>'transportadore_id','class'=>'tamanho-medio','type'=>'text'));
			
			echo $this->Form->input('infoadic',array('label'=>'infoadic','class'=>'tamanho-medio','type'=>'text'));	
		?>
			<!-- INDPAG ###################### -->
			<div style="clear:both;"> 
				<label>Ind. Forma Pgto.:</label>
				<select name="data[Saida][indpag]" class="tamanho-medio">				
					<option></option>
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

	<section class="row">
	<?php
		//echo $this->Form->input('transp',array('label'=>'transp_id','class'=>'tamanho-medio','type'=>'select'));
		
		if(!empty($saida['Transp'])){
			$i = 0;
			foreach ($saida['Transp'] as $infoTransp) {
				$i++;
				echo "<fieldset class='span3'><legend>Volume ".$i."</legend>";
					echo "<section class='row'>";
						echo "<article class='span1'>
							<br>Qvol:
							<br>Pesol:
							<br>PesoB:
							<br>Esp:
							<br>nVol:
							<br>lacres:
							</article>";

						echo "<article class='span1'>";
							echo '<br> 1231321' . $infoTransp['qvol']; 
							echo '<br>' . $infoTransp['pesol']; 
							echo '<br>' . $infoTransp['pesob']; 
							echo '<br>' . $infoTransp['esp']; 
							echo '<br>' . $infoTransp['nVol']; 
							echo '<br>' . $infoTransp['lacres'];
						echo "</article>";
					
					echo "</section>";
				echo "</fieldset>";
			}
		}

	?>
	</section>
</section>

<!-- ######### VOLUMES DO TRANSPORTE ######### -->
<section style="clear:both;">
	<header>Duplicatas</header>
</section>

<footer>
<?php 	
	if($saida['Saida']['status_completo'] == 0){
		echo $this->Form->input('status_completo',array('type'=>'hidden','value'=>1));
		echo $this->Form->end(__('Submit')); 
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
										$loteiten['Lote']['data_validade'] = converteData($loteiten['Lote']['data_validade']);
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


<div style="clear:both;"></div>
<pre>
	<?php
		print_r($saida);
	?>
</pre>
