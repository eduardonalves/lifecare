<?php 
	$this->start('css');
	echo $this->Html->css('login');
	$this->end();
?>
<div class="users form">

	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('Comrespostas');?>
    
     <?php echo $this->html->image( 'login-title.png',array('alt'=>'LifeCare','class'=>'loginTitle')); ?>

	<fieldset>
	
		<?php
			echo $this->Form->input('token',array('label' => 'Código: ','required'=>'false'));
			
			echo $this->html->image( 'entrar.png',array('alt'=>'Entrar','title'=>'Entrar','class'=>'loginEntrar bt-loginEntrar')); 
		?>

		<?php echo $this->Form->end(__('Enviar'));?>
    
	</fieldset>
</div>


