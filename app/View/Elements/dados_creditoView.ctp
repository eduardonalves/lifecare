<section> <!---section Baixo--->	
<header class="">Dados de Crédito</header>
	
	<?php
		$y=0;
		foreach($parceirodenegocio['Dadoscredito'] as $dadoscredito){
			echo $this->Form->input('Dadoscredito.id', array('value'=>$dadoscredito['id']));				

	?>
	<fieldset class="dadosRepetidos">
				<legend>Dados de Crédito  <?php echo $y+1; ?></legend>
	<div class="area-dadosbanc">
		<div class="bloco-area">
	
	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Dadoscredito.limite',array('value'=>h($dadoscredito['limite']),'label' => 'Limite de Crédito:','type' => 'text','class' => 'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
			echo $this->Form->input('bloqueado',array('value'=>h($parceirodenegocio['Parceirodenegocio']['bloqueado'] ),'label' => 'Bloqueado:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
		?>

	</section>

	<section class="coluna-central" >

		<?php
			formatDateToView($dadoscredito['validade_limite']);
			echo $this->Form->input('Dadoscredito.validade_limite',array('value'=>h($dadoscredito['validade_limite']),'label' => 'Validade do Limite:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo '<div class="input text" ><label>Status:</label></div>';			
		    echo $this->Html->image('semaforo-' . strtolower($parceirodenegocio['Parceirodenegocio']['status']) . '-12x12.png', array('alt' => h($parceirodenegocio['Parceirodenegocio']['status']), 'title' => h($parceirodenegocio['Parceirodenegocio']['status'])));
		?>

	</section>
	</div>
	</div>	
		</fieldset>
	
	<?php $y++;} ?>
</section>	

<section> <!---section Baixo--->	
<header class="">Dados das Contas</header>
<?php
		$z=0;
		foreach($contasParceiros as $dadoscontas){
	?>
	<fieldset class="dadosRepetidos">
		<legend>Dados da Conta  <?php echo $z+1; ?></legend>
		<div class="area-dadosbanc">
			<div class="bloco-area">
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->input('identificacao',array('value'=>h($dadoscontas['Conta']['identificacao']),'label' => 'Identificação:','type' => 'text','class' => 'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
			echo $this->Form->input('descricao',array('value'=>h($dadoscontas['Conta']['descricao']),'label' => 'Descrição:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
			echo $this->Form->input('tipo',array('value'=>h($dadoscontas['Conta']['tipo']),'label' => 'Tipo:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
		?>
	</section>

	<section class="coluna-central" >

		<?php
			formatDateToView($dadoscontas['Conta']['data_emissao']);
			echo $this->Form->input('data_emissao',array('value'=>h($dadoscontas['Conta']['data_emissao']),'label' => 'Data de Emissão:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
			formatDateToView($dadoscontas['Conta']['data_quitacao']);
			echo $this->Form->input('data_quitacao',array('value'=>h($dadoscontas['Conta']['data_quitacao']),'label' => 'Data de Quitação:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			formatDateToView($dadoscontas['Conta']['parcelas_atraso']);
			echo $this->Form->input('parcelas_atraso',array('value'=>h($dadoscontas['Conta']['parcelas_atraso']),'label' => 'Parcelas em Atraso:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
			formatDateToView($dadoscontas['Conta']['parcelas_aberto']);
			echo $this->Form->input('parcelas_aberto',array('value'=>h($dadoscontas['Conta']['parcelas_aberto']),'label' => 'Parcelas em Aberto:','type' => 'text','class' => 'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));		
		?>

	</section>
		
			</div>
		</div>	
		
		
		<table style="width:98%;margin-left:1%;" >
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
																	
																	foreach($dadoscontas['Parcela'] as $parcela){
																		
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
																		
																		echo "<td>";
																			echo $parcela['valor'];															
																		echo "</td>";
																		
																		echo "<td>";
																			echo $parcela['desconto'];
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
	</fieldset>
<?php $z++;} ?>

</section>	












