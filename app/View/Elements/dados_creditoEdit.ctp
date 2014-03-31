<section> <!---section Baixo--->
<header class="">Dados de Crédito</header>
	
	<?php
		$y=0;
		foreach($parceirodenegocio['Dadoscredito'] as $dadoscredito){
			echo $this->Form->input('Dadoscredito.'.$y.'.id', array('value'=>$dadoscredito['id']));				

	?>
	<fieldset class="dadosRepetidos">
				<legend>Dados de Crédito  <?php echo $y+1; ?></legend>
	<div class="area-dadosbanc">
		<div class="bloco-area">
	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Dadoscredito.'.$y.'.limite',array('value'=>h(number_format($dadoscredito['limite'], 2, ',', '.')),'label' => 'Limite de Crédito<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-medio dinheiro_duasCasas'));
			echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		?>

	</section>

	<section class="coluna-central" >

		<?php
			formatDateToView($dadoscredito['validade_limite']);
			echo $this->Form->input('Dadoscredito.'.$y.'.validade_limite',array('value'=>h($dadoscredito['validade_limite']),'label' => 'Validade do Limite<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'forma-data tamanho-pequeno'));
			echo '<span id="validaValidade" class="Msg-tooltipDireita" style="display:none">Preencha a Validade</span>';
		?>

	</section>
	
	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('Dadoscredito.'.$y.'.bloqueado',array('value'=>h($dadoscredito['bloqueado']),'label' => 'Bloqueado<span class="campo-obrigatorio">*</span>:','options'=>array('Não','Sim'),'type' => 'select'));
			echo '<span id="validaBloqueado" class="Msg-tooltipDireita" style="display:none">Selecione se Bloqueado</span>';
		?>

	</section>

		</div>
	</div>	
	
		</fieldset>
	
	
	<a href="add-novo_limite" class="bt-showmodal">
				
	<?php	
		echo $this->html->image('botao-novo-limite.png',array('alt'=>'Adicionar','title'=>'Adicionar Novo Limite de Crédito','id'=>'bt-addLimite','class'=>'bt-direita'));
	?>	
	</a>
	
		
	
	
	<?php $y++;} ?>
</section>	
