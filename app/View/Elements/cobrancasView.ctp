
  <?php
	$y=0;
	foreach($conta['ObsCobranca'] as $obscobranca){

    ?>
    
<section class="clearBoth"> <!---section Superior--->	
   
    <fieldset class="clearBoth">
	<legend>Dados da Cobrança  <?php echo $y+1; ?></legend>
	
	<section class="coluna-esquerda">

	<?php
	   echo $this->Form->input('ObsCobranca.'.$y.'.data',array('value' =>formatDateToView($obscobranca['data']),'label' => 'Data:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','id' =>'dateObsCobranca','class' => 'tamanho-medio borderZero'));
	?>

	</section>

	<section class="coluna-central" >

	    <?php
		echo $this->Form->input('ObsCobranca.'.$y.'.obs',array('label' => 'Observação:','value' => $obscobranca['obs'],'label' => 'Observação:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'textarea','class' => 'tamanho-medio borderZero'));
	    ?>

	</section>
	
	<section class="coluna-esquerda">
	    <?php
		echo $this->Form->input('Dadoscredito.'.$y.'.user_id',array('value'=>h($obscobranca['user_id']),'readonly'=>'readonly','onFocus'=>'this.blur();','label' => 'Criado por:','type' => 'text','class' => 'tamanho-medio borderZero'));
	    ?>
	</section>

    </fieldset>	

</section>

<?php    
    $y++;}
?>



