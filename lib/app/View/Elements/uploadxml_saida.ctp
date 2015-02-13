
<header >
	<?php 
		echo $this->Html->image('titulo-saida.png', array('id' => 'titulo-saida', 'alt' => 'Saída', 'title' => 'Saída')); 
	?>
	
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption24">Saída</h1>
	 
	  <section id="passos-bar">
		<div id="passos-bar-total">
			
			<div class="linha-verde complete">
			</div>
			
			<div class="circle complete">
				<span>Modo de Saída</span>
			</div>
			
			<div class="linha-verde complete">
			</div>

			<div class="circle complete">
				<span>Importar Aruquivo</span>
			</div>

			<div class="linha-verde">
			</div>

			<div class="circle">
				<span>Visualizar e Salvar</span>
			</div>
			
		</div>

	</section>
	 
</header>

<section>
	<header id="titulo-header">Visualizar e Salvar</header>

<!--Fieldset total-->
<fieldset class="field-total">

<!--Fieldset Dados da nota-->	
	<fieldset class="primeira-field">
		<legend>Dados da Nota</legend>
		
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('Nota.nota_fiscal', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['ide']['nNF']),'disabled'=>'disabled','type'=>'text','class'=>'tamanho-medio','label'=>'Número Documento:'));
				echo $this->Form->input('Fornecedor.nome', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['emit']['xNome']),'disabled'=>'disabled','type'=>'textarea','rows' => '2','label'=>'Fornecedor:'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				//echo $this->Form->input('Nota.origem', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['det']['imposto']['ICMS']['ICMS00']['orig']),'disabled'=>'disabled','type'=>'text','label'=>'Origem:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_frete', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vFrete']),'disabled'=>'disabled','type'=>'text','label'=>'Valor de Frete:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>			
		</section>
		
		<section class="coluna-direita" id="campo-direita">
			<?php
				echo $this->Form->input('Nota.valor_total', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vNF']),'disabled'=>'disabled','type'=>'text','class'=>'tamanho-pequeno','label'=>'Valor Total:'));
			?>
		</section>
	
	</fieldset>
<!--Fim Fieldset Dados da nota-->		
	
<!--Fieldset Dados tributários-->
	<fieldset id="tributos">
		<legend>Dados tributários da Nota</legend>
		
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('Nota.vb_icms', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vBC']),'disabled'=>'disabled','type'=>'text','label'=>'Valor Base ICMS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_icms', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vICMS']),'disabled'=>'disabled','type'=>'text','label'=>'Valor ICMS:','class'=>'tamanho-pequeno imposto','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_seguro', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vSeg']),'disabled'=>'disabled','type'=>'text','label'=>'Valor Seguro:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('Nota.vb_cst', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vBCST']),'disabled'=>'disabled','disable'=>'disable','type'=>'text','label'=>'Valor Base ST:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_ipi', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vIPI']),'disabled'=>'disabled','type'=>'text','label'=>'Valor IPI:','class'=>'tamanho-pequeno imposto','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_desconto', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vDesc']),'disabled'=>'disabled','type'=>'text','label'=>'Valor Desconto:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>			
		</section>
		
		<section class="coluna-direita">
			<?php
				
				echo $this->Form->input('Nota.valor_pis', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vPIS']),'disabled'=>'disabled','type'=>'text','label'=>'Valor PIS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.v_cofins', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vCOFINS']),'disabled'=>'disabled','type'=>'text','label'=>'Valor COFINS:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
				echo $this->Form->input('Nota.valor_outros', array('value'=>h($xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot']['vOutro']),'disabled'=>'disabled','type'=>'text','label'=>'Valor Outros:','class'=>'tamanho-pequeno','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório'));
			?>
		</section>
		
	</fieldset>
<!--Fim Fieldset Dados tributários-->	

	<div class="saidas add">

		<table id="tabela-principal" cellpadding="0" cellspacing="0">
			<tr>
					<th>semafaro</th>
					<th><?php echo ('cod.'); ?></th>
					<th><?php echo ('nome'); ?></th>
					<th><?php echo ('Qnt'); ?></th>
					<th><?php echo ('Und'); ?></th>
					<th><?php echo ('Dosagem'); ?></th>
					<th><?php echo ('Lotes'); ?></th>
					<th><?php echo ('Validade'); ?></th>
					<th><?php echo ('V. Unitáro'); ?></th>
					<th><?php echo ('V. Total'); ?></th>
					<th><?php echo ('Frete'); ?></th>
					<th><?php echo ('Desconto'); ?></th>
					<th><?php echo ('IPI'); ?></th>
					<th class="actions"><?php echo __('Ações'); ?></th>
			</tr>
			
		
			
			
				<?php 
					foreach($xmlArray['nfeProc']['NFe']['infNFe']['det'] as $items){
						//echo $items['prod']['cProd'];
						
				?>
				<tr>
					<td></td>
					<td><?php echo $items['prod']['cProd']; ?></td>	
					<td><?php echo $items['prod']['xProd']; ?></td>	
					<td><?php echo $items['prod']['qCom']; ?></td>	
					<td><?php echo $items['prod']['uTrib']; ?></td>	
					<td></td>	
					<td></td>	
					<td></td>	
					<td><?php echo $items['prod']['vUnCom']; ?></td>	
					<td><?php echo $items['prod']['vProd']; ?></td>	
					<td><?php echo $items['prod']['vFrete']; ?></td>	
					<td></td>	
					<td></td>	
					<td></td>	
				</tr>
				<?php
					
					}
				?>
	

		</table>
	
	</div>
	

<footer>
	
	<?php
	
	
	echo $this->html->image('voltar.png',array('alt'=>'Voltar',
						    'title'=>'Voltar',
						    'id'=>'voltar0',
						    'class'=>'bt-voltar ',
						    'url'=>array('controller'=>'Saidas','action'=>'uploadxml_saida')
						));
													 
	
	
	echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar',
								'title'=>'Confirmar',
								'id'=>'avancar-1 bt-confirmar',
								'class'=>'bt-confirmar',
							    ));
													 
													
	
	?>
	
</footer>

</section>
