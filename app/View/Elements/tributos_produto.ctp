<?php 
//	$this->start('css');
	//	echo $this->Html->css('modal_centro_custo');
		//echo $this->Html->css('table');
	//$this->end();
?>

<script>
$(document).ready(function(){
	var showOrHide = false;
	$('#togle-tributos').click(function(){
		
		if(showOrHide != true){ showOrHide = false; }
		$('#tributoDiv').toggle('slow',function(){
			if(showOrHide == false){
				$('.icomais').text('-');
				showOrHide = true;
			}else{
				$('.icomais').text('+');
				showOrHide = false;
			}
			
		});		
	});
});
</script>
<style>
	#togle-tributos{
		padding: 5px;
		background: #008000;
		color: #fff;
		cursor: pointer;
		font-size: 13px;
		border-radius: 5px;
		border: 1px solid #ccc;
		float: left;
		margin-bottom: 20px;
	}
</style>

<span id="togle-tributos"> <span class="icomais">+</span>&nbsp;Preencher Tributação</span>
<div id="tributoDiv" style="display:none;">
<?php echo $this->element('tributo_icms');?>
<?php echo $this->element('tributo_ipi');?>
<?php echo $this->element('tributo_pis');?>
<?php echo $this->element('tributo_cofins');?>
</div>
