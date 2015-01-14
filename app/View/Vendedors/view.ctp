<?php
	$this->start('css');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
	$this->start('script');
	    echo $this->Html->script('users.js');
	    echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	$this->end();

?>

<header>

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption42">Visualização do Usuário</h1>
</header>

<section>
	<header>Dados do usuário</header>
	
	<!-- INICIO_SECTION SUPERIOR  --->
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->input('funcionario_id',array('type'=>'hidden','id'=>'funcionarioId'));
			echo $this->Form->input('username',array('label'=>'Login:','value'=>$user['User']['username'],'class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
			echo $this->Form->input('password',array('label'=>'Senha:','value'=>$user['User']['password'],'type'=>'password','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));	
		?>			
	</section>
	
	<section class="coluna-central">
		<?php
			if($user['User']['status']==1){
					$status="Sim";
			}else{
					$status= "Não";
			}
			echo $this->Form->input('tipo',array('label'=>'Tipo de usuário:','value'=>$user['Role']['roles'],'class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
			echo $this->Form->input('bloqueado',array('label'=>'Bloqueado:','value'=>$status,'type'=>'text','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));
		?>			
	</section>
	
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('acesso',array('label'=>'Tipo de Acesso:','value'=>$user['User']['acesso'],'class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));

		?>			
	</section>
	
</section>

<footer>
    <?php
		echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$user['User']['id'])));
													 
    ?>
</footer>

	
