<?php 
	$this->start('css');
	echo $this->Html->css('login');
	$this->end();
?>

<div class="users form">

<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Comrespostas');?>
    
    <!-- <img src="/app/webroot/img/login-title.png" alt="LifeCare" class="loginTitle"> -->
    
  
   
	<fieldset>
	
		<?php

			echo $this->Form->input('token',array('label' => 'Login: ','required'=>'false'));
			
			echo $this->html->image( 'entrar.png',array('alt'=>'Entrar','title'=>'Entrar','class'=>'loginEntrar bt-loginEntrar')); 
		?>

	<?php echo $this->Form->end(__('Enviar'));?>
    
	</fieldset>
</div>


