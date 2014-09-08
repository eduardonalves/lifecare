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

	<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption52">Editar Usuário</h1>
</header>
<script>
	$(document).ready(function(){
		$('#senhaUser').val('');
	});
</script>
<section>
	<header>Dados do usuário</header>
	
	<!-- INICIO_SECTION SUPERIOR  --->
	<section class="coluna-esquerda">
		<?php	
			echo $this->Form->create('User');
			echo $this->Form->input('User.id');
		?>
		
		<?php
			echo $this->Form->input('username',array('label'=>'Login<span class="campo-obrigatorio">*</span>:','value'=>$usuario['User']['username'],'id'=>'LoginUser','class'=>'tamanho-medio'));
			echo '<span id="msgLogin" class="Msg-tooltipDireita" style="display:none;margin-left: 68px;position: absolute;width: 80px;">Preencha o campo Login</span>';
			echo $this->Form->input('password',array('label'=>'Senha:','id'=>'senhaUser','value'=>$usuario['User']['password'],'type'=>'password','class'=>'tamanho-medio'));
			echo '<span id="msgSenha" class="Msg-tooltipDireita" style="display:none;margin-left: 68px;position: absolute;width: 80px;">Preencha o campo Senha</span>';
		?>			
	</section>
	
	
	<section class="coluna-central">
		<div class="input autocompleteRole conta">
			<?php
				echo $this->Form->input('role_id',array('type'=>'hidden','id'=>'roleId', 'value'=>$usuario['Role']['id']));
			?>
			
			<span id="msgValidaParceiro" class="Msg tooltipMensagemErroTopo" style="display:none">Selecione o Tipo de Usuário</span>
			<label id="SpanRole">Tipo de Usuário:</label>
			<select class="tamanho-medio roleNome" id="add_role">
				<option></option>
					<?php
						foreach($rolesTipo as $rolesTipo)
						{
							echo "<option id='".$rolesTipo['Role']['roles']."' value='".$rolesTipo['Role']['id']."' >";
								echo $rolesTipo['Role']['roles'];
							echo "</option>";
						}
					?>
			</select>
		</div>
		
		<?php
			//Referencia para selecionar as select's
			echo $this->form->input('Vazio.carac',array('type'=>'hidden','id'=>'infosUser','data-role'=>$usuario['Role']['roles'], 'data-status'=>$usuario['User']['status'], 'data-acesso'=>$usuario['User']['acesso']));
			echo $this->Form->input('User.status',array('label'=>'Bloqueado:','id'=>'Bloqueado','class'=>'tamanho-medio statusBloq','type'=>'select', 'options'=>array('1' => 'NÃO','0' => 'SIM')));		
		?>
	</section>
	
	<section class="coluna-direita">
		<?php	
			echo $this->Form->input('User.acesso',array('label'=>'Tipo de Acesso:','id'=>'acessoUser','class'=>'tamanho-medio acessoUser','type'=>'select', 'options'=>array('INTERNO'=>'INTERNO','EXTERNO'=>'EXTERNO')));
			echo '<span id="msgTipoAcesso" class="Msg-tooltipDireita" style="display:none">Preencha o campo Tipo de Acesso</span>';
		?>
	</section>
	<!-- FIM SECTION SUPERIOR  --->
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png',array('alt'=>'Salvar','title'=>'Salvar')); 
		echo $this->Form->end();
	?>
</footer>

