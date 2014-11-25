<?php
	echo $this->Html->css('saidas_view.css');
	echo $this->Html->css('table.css');
	echo $this->Html->css('PrintArea.css');
	echo $this->Html->script('jquery.PrintArea.js');
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

<h1 class="menuOption25"></h1>

<div class="impressao" id="impressao">
	<section>
		
		<?php
			echo $this->Form->create('Saida',array('action'=>'add'));
		?>

		<!-- Div primeiro Campo-->
		<div class="campo-superior-total tela-resultado">
			<div class="campo-superior-esquerdo">
				
				<?php
				  //  echo "Tipo de movimentação: ".$saida['Saida']['tipo'];
				?>
				
			</div>

			<div class="campo-superior-direito">
				
				<?php
					if($saida['Saida']['tipo'] ==""){
						echo "Devolução";
					}
				?>
				
			</div>
		</div>
		<!--Fim Div primeiro Campo-->

		<!--Fieldset total-->
		<fieldset class="field-total">
		
			<?php if($saida['Saida']['forma_de_entrada']==0){ ?> 
		
				<!--Fieldset Dados da nota-->
				<div class="fieldset">
					<section>
						
						<?php
							echo "<label class='viewSaida'>Cliente: </label><span class='viewSaida label'>".$cliente['Cliente']['nome'].". - ".$cliente['Cliente']['cpf_cnpj'].".</span>";
							foreach($cliente['Endereco'] as $endereco){
								echo "<label class='viewSaida'>Endereço: </label><span class='viewSaida label'>".$endereco['logradouro'].",".$endereco['complemento'].", ".$endereco['bairro']."-".$endereco['cidade']."-".$endereco['uf']."</span>";	
							}
							foreach($cliente['Contato'] as $contato){
								echo "<div class='absoluteTel'><label class='viewSaida'>Tel: </label><span class='viewSaida label'>".$contato['telefone1']."</span></div>";
							}
							echo "<label class='viewSaida'>Número NF: </label><span class='viewSaida label'>".$saida['Saida']['nota_fiscal']."</span>";
							
							
							$auxDataNota = explode('-', $saida['Saida']['data']);
							$dataNota = $auxDataNota[2].'/'.$auxDataNota[1].'/'.$auxDataNota[0];
			
							echo "<div class='absoluteEmissao'><label class='viewSaida '>Data Emissão: </label><span class='viewSaida label'>".$dataNota."</span></div>";
							echo "<label class='viewSaida'>Tipo de Pedido: </label><span class='viewSaida label'>NOTA</span>";
						?>
						
					</section>
				</div>
				<!--Fim Fieldset Dados da nota-->

			<?php }else{ ?>

				<!--Fieldset Dados da nota-->
				<div class="fieldset">
					<section>

						<?php
						
						
							echo "<label class='viewSaida'>Cliente: </label><span class='viewSaida label'>".$cliente['Cliente']['nome'].". - ".$cliente['Cliente']['cpf_cnpj'].".</span>";
							
							foreach($cliente['Endereco'] as $endereco){
								echo "<label class='viewSaida'>Endereço: </label><span class='viewSaida label'>".$endereco['logradouro'].",".$endereco['complemento'].", ".$endereco['bairro']."-".$endereco['cidade']."-".$endereco['uf']."</span>";	
							}
							foreach($cliente['Contato'] as $contato){
								echo "<div class='absoluteTel'><label class='viewSaida'>Tel: </label><span class='viewSaida label'>".$contato['telefone1']."</span></div>";
							}
							echo "<label class='viewSaida'>Número Vale: </label><span class='viewSaida label'>".$saida['Saida']['nota_fiscal']."</span>";
							

							$auxDataNota = explode('-', $saida['Saida']['data']);
							$dataNota = $auxDataNota[2].'/'.$auxDataNota[1].'/'.$auxDataNota[0];
							
							echo "<div class='absoluteEmissao'><label class='viewSaida '>Data Emissão: </label><span class='viewSaida label'>".$dataNota."</span></div>";
							echo "<label class='viewSaida'>Tipo de Pedido: </label><span class='viewSaida label'>VALE</span>";
						?>
						
					</section>
				</div>	

			<?php } ?>

			<!--Fieldset Dados Financeiros-->
			<div class="fieldset fieldsetValores">
				
				<?php if($saida['Saida']['forma_de_entrada']==0){ ?> 

					<h2 class="legendEffect"><span class="tributoVale">Dados Financeiros da Nota</span></h2>
				
				<?php }else{ ?>
				
					<h2 class="legendEffect"><span class="tributoVale">Dados Financeiros da Vale</span></h2>
				
				<?php } ?>
				
				<section class="coluna-esquerda">
					
					<?php
						if($saida['Saida']['forma_de_entrada']==0){
							$saida['Saida']['valor_total'] = convertMoeda($saida['Saida']['valor_total']);
							echo "<label class='viewSaida'>Valor Total da Nota: </label><span class='viewSaida label'>".$saida['Saida']['valor_total']."</span>";
						}else{
							$saida['Saida']['valor_total'] = convertMoeda($saida['Saida']['valor_total']);
							echo "<label class='viewSaida'>Valor Total: </label><span class='viewSaida label'>".$saida['Saida']['valor_total']."</span>";
						}

						if($saida['Saida']['forma_de_entrada']==0){
							$saida['Saida']['valor_ipi'] = convertMoeda($saida['Saida']['valor_ipi']);
							echo $this->Form->input('valor_ipi', array('div'=>array('class'=>'imposto input text'),'type'=>'text','label'=>'Valor Total IPI:','class'=>'limpa tamanho-pequeno borderZero','allowEmpty' => 'false','title'=>'Campo Obrigatório' ,'readonly' => 'readonly' ,'onfocus' => 'this.blur()', 'value' => $saida['Saida']['valor_ipi']));
						}
						
						if($saida['Saida']['forma_de_entrada']==0){
							$saida['Saida']['valor_outros'] = convertMoeda($saida['Saida']['valor_outros']);
							echo "<label class='viewSaida'>Outras Despesas: </label><span class='viewSaida label'>".$saida['Saida']['valor_outros']."</span>";	
						}
					
					?>
					
				</section>

				<section class="coluna-central">
					
					<?php
						$saida['Saida']['valor_total_produtos'] = convertMoeda($saida['Saida']['valor_total_produtos']);
						echo "<label class='viewSaida'>Valor Total Produto: </label><span class='viewSaida label'>".$saida['Saida']['valor_total_produtos']."</span>";
					?>

					<?php
						if($saida['Saida']['forma_de_entrada']==0){
							$saida['Saida']['valor_frete'] = convertMoeda($saida['Saida']['valor_frete']);
							echo "<label class='viewSaida'>Valor Frete: </label><span class='viewSaida label'>".$saida['Saida']['valor_frete']."</span>";
						}
					?>
		
				</section>

				<section class="coluna-direita">
					
					<?php
						if($saida['Saida']['forma_de_entrada']==0){
							$saida['Saida']['valor_icms'] = convertMoeda($saida['Saida']['valor_icms']);
							echo "<label class='viewSaida'>Valor Total ICMS: </label><span class='viewSaida label'>".$saida['Saida']['valor_icms']."</span>";
							
						}
					?>
						
					<?php
						if($saida['Saida']['forma_de_entrada']==0){
							$saida['Saida']['valor_seguro'] = convertMoeda($saida['Saida']['valor_seguro']);
							echo "<label class='viewSaida'>Valor Seguro: </label><span class='viewSaida label'>".$saida['Saida']['valor_seguro']."</span>";
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
		<?php echo $this->Form->end(); ?>
	</section>
</div>
<footer>

	<?php
		if (! strstr($saida['Saida']['tipo'], 'CANCELADA')){
			echo $this->Form->postLink(
				$this->Html->image('bt-cancel.png',array('class'=>'bt-cancelar-saida', 'style'=>'float:right;cursor:pointer;','alt' =>'Cancelar Nota','title' => 'Cancelar Nota')),
				array('controller' => 'saidas', 'action' => 'cancelar',  $saida['Saida']['id']),
				array('escape' => false, 'confirm' => __('Vocẽ realmente deseja cancelar a nota número %s?', $saida['Saida']['id']))
			);
		}

	?>
	
	<br />
	<br />

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
