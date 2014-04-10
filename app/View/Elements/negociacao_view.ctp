
  <?php
	$y=0;
	foreach($conta['Negociacao'] as $negociacaos){

    ?>


<section class='sectionNegociacao clearBoth'> <!---section Baixo--->
	
	
	<fieldset class="clearBoth">
	    <legend>Dados da Negociação</legend>
	
		<div class="area-dadosbanc">
			<div class="bloco-area">
				<section class="coluna-esquerda">
					<?php
						echo $this->Form->input('Negociacao.'.$y.'.valor', array('type' => 'text','label' => 'Valor:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' =>number_format($negociacaos['valor'], 2, ',', '.')));
					?>
				</section>

				<section class="coluna-central" >
					<?php
						echo $this->Form->input('Negociacao.'.$y.'.data',array('type' => 'text','label' => 'Data:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' => formatDateToView($negociacaos['data'])));
					?>
				</section>
		
				<section class="coluna-direita" >
					<?php
						echo $this->Form->input('Negociacao.'.$y.'.usuario',array('type' => 'text','label' => 'Negociado por:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' =>$username));
					?>
				</section>
			</div>
		</div>
	
	</fieldset>
	
</section>

<?php    
    $y++;}
?>
