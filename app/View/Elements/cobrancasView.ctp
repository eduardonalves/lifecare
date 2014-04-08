
  <?php
	$y=0;
	foreach($conta['ObsCobranca'] as $obscobranca){

	$this->start('modais');
		echo $this->element('cobranca_add', array('modal'=>'add-cobranca'));

	$this->end();
    ?>
    
<section class="dadosRepetidos"> <!---section Superior--->	
  
<header class="">Dados das Cobranças</header>    
    <fieldset class="dadosRepetidos">
	<legend>Dados da Cobrança  <?php echo $y+1; ?></legend>
	
	<section class="coluna-esquerda">

	<?php
	   echo $this->Form->input('ObsCobranca.'.$y.'.data',array('value' =>formatDateToView($obscobranca['data']),'label' => 'Data:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','id' =>'dateObsCobranca','class' => 'tamanho-medio borderZero'));
	?>

	</section>

	<section class="coluna-central" >

	    <?php
		echo $this->Form->input('ObsCobranca.'.$y.'.obs',array('label' => 'Observação:','value' => $obscobranca['obs'],'label' => 'Observação:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','class' => 'tamanho-medio borderZero'));
	    ?>

	</section>

    </fieldset>	

</section>


    <a href='add-cobranca' class='bt-showmodal'>
	<?php echo $this->html->image('botao-novo-limite.png',array('alt'=>'Adicionar Cobrança','title'=>'Adicionar Cobrança','id'=>'bt-corbanca','class'=>'bt-direita')); ?>
    </a>

<?php    
    $y++;}
?>



