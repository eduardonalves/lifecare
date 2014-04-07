<section class="creditos"> <!---section Baixo--->
<header>Dados de Crédito</header>
	
	<?php
		$y=0;
		foreach($parceirodenegocio['Dadoscredito'] as $dadoscredito){
					

	?>
	<fieldset class="dadosRepetidos">
				<legend>Dados de Crédito  <?php echo $y+1; ?></legend>
	<div class="area-dadosbanc">
		<div class="bloco-area">
	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Dadoscredito.'.$y.'.id', array('value'=>$dadoscredito['id']));
			echo $this->Form->input('Dadoscredito.'.$y.'.limite',array('value'=>h(number_format($dadoscredito['limite'], 2, ',', '.')),'label' => 'Limite de Crédito:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','class' => 'tamanho-medio dinheiro_duasCasas borderZero'));
			echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		?>

	</section>

	<section class="coluna-central" >

		<?php
			formatDateToView($dadoscredito['validade_limite']);
			echo $this->Form->input('Dadoscredito.'.$y.'.validade_limite',array('value'=>h($dadoscredito['validade_limite']),'label' => 'Validade do Limite:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','class' => 'tamanho-pequeno borderZero'));
			echo '<span id="validaValidade" class="Msg-tooltipDireita" style="display:none">Preencha a Validade</span>';
		?>

	</section>
	
	<section class="coluna-direita" >

		<?php
		
			echo $this->Form->input('Dadoscredito.'.$y.'.bloqueado',array('value'=>h($dadoscredito['bloqueado']),'readonly'=>'readonly','onFocus'=>'this.blur();','label' => 'Bloqueado:','type' => 'text','class' => 'tamanho-medio borderZero'));
			echo $this->Form->input('Dadoscredito.'.$y.'.user_id',array('value'=>h($dadoscredito['user_id']),'readonly'=>'readonly','onFocus'=>'this.blur();','label' => 'Criado por:','type' => 'text','class' => 'tamanho-medio borderZero'));
			
		?>

	
	</section>

		</div>
	</div>	
	
		</fieldset>
	<?php $y++; }?>
	<span style="display:none;" id="quantiaCreditos"><?php echo $y; ?></span>
		
</section>
