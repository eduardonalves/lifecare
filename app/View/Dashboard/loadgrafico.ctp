
<div id="conteudoLoad">
	<!-- ## RECEBER -->
<?php  

	$this->start('script');	
		echo $this->Html->script('load-grafico.js');
	$this->end();
?>

<input type="hidden" id="totalJanReceber" value="<?php echo $totalJanReceber; ?>" />
<input type="hidden" id="totalFevReceber" value="<?php echo $totalFevReceber; ?>" />
<input type="hidden" id="totalmarReceber" value="<?php echo $totalmarReceber; ?>" />
<input type="hidden" id="totalabrReceber" value="<?php echo $totalabrReceber; ?>" />
<input type="hidden" id="totalmaiReceber" value="<?php echo $totalmaiReceber; ?>" />
<input type="hidden" id="totaljunReceber" value="<?php echo $totaljunReceber; ?>" />
<input type="hidden" id="totaljulReceber" value="<?php echo $totaljulReceber; ?>" />
<input type="hidden" id="totalagoReceber" value="<?php echo $totalagoReceber; ?>" />
<input type="hidden" id="totalsetReceber" value="<?php echo $totalsetReceber; ?>" />
<input type="hidden" id="totaloutReceber" value="<?php echo $totaloutReceber; ?>" />
<input type="hidden" id="totalnovReceber" value="<?php echo $totalnovReceber; ?>" />
<input type="hidden" id="totaldezReceber" value="<?php echo $totaldezReceber; ?>" />

<!-- ## PAGAR-->
<input type="hidden" id="totalJanPagar" value="<?php echo $totalJanPagar; ?>" />
<input type="hidden" id="totalFevPagar" value="<?php echo $totalFevPagar; ?>" />
<input type="hidden" id="totalmarPagar" value="<?php echo $totalmarPagar; ?>" />
<input type="hidden" id="totalabrPagar" value="<?php echo $totalabrPagar; ?>" />
<input type="hidden" id="totalmaiPagar" value="<?php echo $totalmaiPagar; ?>" />
<input type="hidden" id="totaljunPagar" value="<?php echo $totaljunPagar; ?>" />
<input type="hidden" id="totaljulPagar" value="<?php echo $totaljulPagar; ?>" />
<input type="hidden" id="totalagoPagar" value="<?php echo $totalagoPagar; ?>" />
<input type="hidden" id="totalsetPagar" value="<?php echo $totalsetPagar; ?>" />
<input type="hidden" id="totaloutPagar" value="<?php echo $totaloutPagar; ?>" />
<input type="hidden" id="totalnovPagar" value="<?php echo $totalnovPagar; ?>" />
<input type="hidden" id="totaldezPagar" value="<?php echo $totaldezPagar; ?>" />	



<canvas id="income" width="380" height="240" class="grafico-ajuste"></canvas>




</div>
