<?php 
	$this->start('css');

		echo $this->Html->css('modal_quicklink');
		echo $this->Html->css('table');
	$this->end();
?>

		
		
		


<?php 

	
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	
	
	
?>
			

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Quitar', 'title' => 'Quitar'));
	 ?>
	 <h1>Quitar parcela</h1>
</header>

<section>
	<header>Dados da parcela</header>
	
	
	
	<section class="coluna-modal">
		<div>
		
			<?php
	
				echo $this->Form->create('Quitar', array('id' => 'quitar'.$j.''));
				echo "<div class=\"ui-widget\">";
				echo $this->Form->input('Quitar.data_pagamento', array('class'=>'data_pagamento','type'=>'text', 'label'=>'Data <span class="campo-obrigatorio">*</span>:', 'div' => false , ));
				echo $this->Form->input('Quitar.juros', array('class'=>'juros','type'=>'text', 'label'=>'Juros :', 'div' => false , ));
				echo "<span id='spanQuitarData' class='Msg' style='display:none'>Preencha o Campo Data do pagamento</span>";
				echo $this->Form->input('parcela_id',array('value' => $parcelas['id'], 'type' => 'hidden'));
			?>
			
			
	
		</div>
		
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-salvar-quitar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>






