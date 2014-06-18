<?php
	echo $this->Html->css('entrada_view.css');
	echo $this->Html->css('table.css');
	echo $this->Html->css('PrintArea_entrada.css');
	echo $this->Html->script('jquery.PrintArea_entrada.js');
	//echo $this->Html->script('funcoes_entrada.js');

	function convertMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}

	function converteData(&$dataVer){
		$auxData = explode('-', $dataVer);
		$dataVer = $auxData[2].'/'.$auxData[1].'/'.$auxData[0];
		return $dataVer;
	}
?>

<script>
	$(document).ready(function() {
		$('.imprimirCom').click(function(){
			var options = {mode: "iframe", popClose : false, };

			$('#impressao').css('background-color','#FFF');
			$('#impressao').css('padding','30px');
			$('#impressao th').css('background-color','white');
			$('#impressao').css('min-height','630px');
			
			$( '#impressao' ).printArea(options);
			
			$('#impressao').css('background-color','inherit');
			$('#impressao').css('padding','0px');
			$('#impressao th').css('background-color','initial');
			$('#impressao').css('min-height','100%');
		});
		
		$('.imprimirSem').click(function(){
			var options = {mode: "iframe", popClose : false, };

			$('#impressao').css('background-color','#FFF');
			$('#impressao').css('padding','30px');
			$('#impressao th').css('background-color','white');
			$('#impressao').css('min-height','630px');
			$('.fieldsetValores').css('display','none')
			$('.valor').css('display','none')
			
			$( '#impressao' ).printArea(options);
			
			$('#impressao').css('background-color','inherit');
			$('#impressao').css('padding','0px');
			$('#impressao th').css('background-color','initial');
			$('#impressao').css('min-height','100%');
			$('.fieldsetValores').css('display','inline-block')
			$('.valor').css('display','table-cell')
		});
		
	});
</script>
<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
<h1 class="menuOption23" ></h1>

<div class="impressao" id="impressao">
	<section>
		
		<?php
			echo $this->Form->create('Entrada',array('action'=>'add'));
		?>

		<!-- Div primeiro Campo-->
		<div class="campo-superior-total tela-resultado">
			<div class="campo-superior-esquerdo">
				
				<?php
				  //  echo "Tipo de movimentação: ".$entrada['Entrada']['tipo'];
				?>
				
			</div>

			<div class="campo-superior-direito">
				
				<?php
					if($entrada['Entrada']['tipo'] ==""){
						echo "Devolução";
					}
				?>
				
			</div>
		</div>
		<!--Fim Div primeiro Campo-->

		<!--Fieldset total-->
		<fieldset class="field-total">
		
			<?php if($entrada['Entrada']['forma_de_entrada']==0){ ?> 
		
				<!--Fieldset Dados da nota-->
				<div class="fieldset">
					<section>
						
						<?php
							echo "<label class='viewEntrada'>Fornecedore: </label><span class='viewEntrada label'>".$fornecedor['Fornecedore']['nome'].". - ".$fornecedor['Fornecedore']['cpf_cnpj'].".</span>";
							foreach($fornecedor['Endereco'] as $endereco){
								echo "<label class='viewEntrada'>Endereço: </label><span class='viewEntrada label'>".$endereco['logradouro'].",".$endereco['complemento'].", ".$endereco['bairro']."-".$endereco['cidade']."-".$endereco['uf']."</span>";	
							}
							foreach($fornecedor['Contato'] as $contato){
								echo "<div class='absoluteTel'><label class='viewEntrada'>Tel: </label><span class='viewEntrada label'>".$contato['telefone1']."</span></div>";
							}
							echo "<label class='viewEntrada'>Número NF: </label><span class='viewEntrada label'>".$entrada['Entrada']['nota_fiscal']."</span>";
							
							
							$auxDataNota = explode('-', $entrada['Entrada']['data']);
							$dataNota = $auxDataNota[2].'/'.$auxDataNota[1].'/'.$auxDataNota[0];
			
							echo "<div class='absoluteEmissao'><label class='viewEntrada '>Data Emissão: </label><span class='viewEntrada label'>".$dataNota."</span></div>";
							echo "<label class='viewEntrada'>Tipo de Pedido: </label><span class='viewEntrada label'>NOTA</span>";
						?>
						
					</section>
				</div>
				<!--Fim Fieldset Dados da nota-->

			<?php }else{ ?>

				<!--Fieldset Dados da nota-->
				<div class="fieldset">
					<section>

						<?php
						
						
							echo "<label class='viewEntrada'>Fornecedore: </label><span class='viewEntrada label'>".$fornecedor['Fornecedore']['nome'].". - ".$fornecedor['Fornecedore']['cpf_cnpj'].".</span>";
							
							foreach($fornecedor['Endereco'] as $endereco){
								echo "<label class='viewEntrada'>Endereço: </label><span class='viewEntrada label'>".$endereco['logradouro'].",".$endereco['complemento'].", ".$endereco['bairro']."-".$endereco['cidade']."-".$endereco['uf']."</span>";	
							}
							foreach($fornecedor['Contato'] as $contato){
								echo "<div class='absoluteTel'><label class='viewEntrada'>Tel: </label><span class='viewEntrada label'>".$contato['telefone1']."</span></div>";
							}
							echo "<label class='viewEntrada'>Número Vale: </label><span class='viewEntrada label'>".$entrada['Entrada']['nota_fiscal']."</span>";
							

							$auxDataNota = explode('-', $entrada['Entrada']['data']);
							$dataNota = $auxDataNota[2].'/'.$auxDataNota[1].'/'.$auxDataNota[0];
							
							echo "<div class='absoluteEmissao'><label class='viewEntrada '>Data Emissão: </label><span class='viewEntrada label'>".$dataNota."</span></div>";
							echo "<label class='viewEntrada'>Tipo de Pedido: </label><span class='viewEntrada label'>VALE</span>";
						?>
						
					</section>
				</div>	

			<?php } ?>

			<!--Fieldset Dados Financeiros-->
			<div class="fieldset fieldsetValores">
				
				<?php if($entrada['Entrada']['forma_de_entrada']==0){ ?> 

					<h2 class="legendEffect"><span class="tributoVale">Dados Financeiros da Nota</span></h2>
				
				<?php }else{ ?>
				
					<h2 class="legendEffect"><span class="tributoVale">Dados Financeiros da Vale</span></h2>
				
				<?php } ?>
				
				<section class="coluna-esquerda">
					
					<?php
						if($entrada['Entrada']['forma_de_entrada']==0){
							$entrada['Entrada']['valor_total'] = convertMoeda($entrada['Entrada']['valor_total']);
							echo "<label class='viewEntrada'>Valor Total da Nota: </label><span class='viewEntrada label'>".$entrada['Entrada']['valor_total']."</span>";
						}else{
							$entrada['Entrada']['valor_total'] = convertMoeda($entrada['Entrada']['valor_total']);
							echo "<label class='viewEntrada'>Valor Total: </label><span class='viewEntrada label'>".$entrada['Entrada']['valor_total']."</span>";
						}

						if($entrada['Entrada']['forma_de_entrada']==0){
							$entrada['Entrada']['valor_ipi'] = convertMoeda($entrada['Entrada']['valor_ipi']);
							echo $this->Form->input('valor_ipi', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total IPI:','class'=>'limpa tamanho-pequeno borderZero','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly' => 'readonly' ,'onfocus' => 'this.blur()', 'value' => $entrada['Entrada']['valor_ipi']));
						}
						
						if($entrada['Entrada']['forma_de_entrada']==0){
							$entrada['Entrada']['valor_outros'] = convertMoeda($entrada['Entrada']['valor_outros']);
							echo "<label class='viewEntrada'>Outras Despesas: </label><span class='viewEntrada label'>".$entrada['Entrada']['valor_outros']."</span>";	
						}
					
					?>
					
				</section>

				<section class="coluna-central">
					
					<?php
						$entrada['Entrada']['valor_total_produtos'] = convertMoeda($entrada['Entrada']['valor_total_produtos']);
						echo "<label class='viewEntrada'>Valor Total Produto: </label><span class='viewEntrada label'>".$entrada['Entrada']['valor_total_produtos']."</span>";
					?>

					<?php
						if($entrada['Entrada']['forma_de_entrada']==0){
							$entrada['Entrada']['valor_frete'] = convertMoeda($entrada['Entrada']['valor_frete']);
							echo "<label class='viewEntrada'>Valor Frete: </label><span class='viewEntrada label'>".$entrada['Entrada']['valor_frete']."</span>";
						}
					?>
		
				</section>

				<section class="coluna-direita">
					
					<?php
						if($entrada['Entrada']['forma_de_entrada']==0){
							$entrada['Entrada']['valor_icms'] = convertMoeda($entrada['Entrada']['valor_icms']);
							echo "<label class='viewEntrada'>Valor Total ICMS: </label><span class='viewEntrada label'>".$entrada['Entrada']['valor_icms']."</span>";
							
						}
					?>
						
					<?php
						if($entrada['Entrada']['forma_de_entrada']==0){
							$entrada['Entrada']['valor_seguro'] = convertMoeda($entrada['Entrada']['valor_seguro']);
							echo "<label class='viewEntrada'>Valor Seguro: </label><span class='viewEntrada label'>".$entrada['Entrada']['valor_seguro']."</span>";
						}
					?>
					
				</section>
			</div>
			<!--Fim Dados Financeiros-->
		
		</fieldset>
		<!--Fim Fieldset total-->

		<div class="saidas add">
			<table id="tabela-principal" cellpadding="0" cellspacing="0">
			
				<?php
					if($entrada['Entrada']['forma_de_entrada']==0){
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
					if($entrada['Entrada']['forma_de_entrada']==0){
					
						foreach($itens as $prodIten){
						
							$prodIten['Produtoiten']['valor_total']=convertMoeda($prodIten['Produtoiten']['valor_total']);
							$prodIten['Produtoiten']['valor_unitario']=convertMoeda($prodIten['Produtoiten']['valor_unitario']);
							$prodIten['Produtoiten']['percentual_icms']=convertMoeda($prodIten['Produtoiten']['percentual_icms']);
							$prodIten['Produtoiten']['percentual_ipi']=convertMoeda($prodIten['Produtoiten']['percentual_ipi']);
							
							echo '<tr class="valbtconfimar">';
							echo "<td>".$prodIten['Produto']['id']."</td>";	
							echo "<td>".$prodIten['Produto']['nome']."</td>";		
							echo "<td>".$prodIten['Produto']['unidade']."</td>";	
							echo "<td>".$prodIten['Produto']['descricao']."</td>";	
							echo "<td>".$prodIten['Produtoiten']['qtde']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_unitario']."</td>";	
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_total']."</td>";		
							echo "<td class='valor'>".$prodIten['Produto']['cfop']."</td>";	
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
									
										$loteiten['Lote']['data_validade'] = converteData($loteiten['Lote']['data_validade']);
										echo "N Lote: ".$loteiten['Lote']['numero_lote'].", Qtde: ".$loteiten['Loteiten']['qtde'].", Val: ".$loteiten['Lote']['data_validade']."<br />";	
									}
							}
							echo "</td>";
							echo '</tr>';
							
							
							
					
						}
						
					}
				?>

			</table>
		</div>
	</section>
</div>
<footer>

	<?php
		echo $this->html->image('botao-imprimircom-novo.png',array('alt'=>'Confirmar',
									'title'=>'Confirmar',
									'id'=>'avancar2',
									'class'=>'bt-confirmar imprimirCom',
									));
	?>
	
	<br />
	
	<?php							
		echo $this->html->image('botao-imprimirsem.png',array('alt'=>'Confirmar',
									'title'=>'Confirmar',
									'id'=>'avancar2',
									'class'=>'bt-confirmar imprimirSem',
									));
	
	?>

</footer>
