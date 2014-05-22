<?php
	$this->start('css');
	   // echo $this->Html->css('');
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
	<h1 class="menuOption53">Cadastrar Usuário</h1>
</header>

<section>
	<header>Dados do usuário</header>
	
	<!-- INICIO_SECTION SUPERIOR  --->
	<section class="coluna-esquerda">
		<?php	
			echo $this->Form->create('User');
			echo $this->Form->input('funcionario_id',array('type'=>'hidden','id'=>'funcionarioId'));
		?>
		
		<div class="input autocompleteFuncionario conta">
			<span id="msgValidaParceiro" class="Msg tooltipMensagemErroTopo" style="display:none">Selecione o Funcionário</span>
			<label id="SpanPesquisarFornecedor">Funcionário<span class="campo-obrigatorio">*</span>:</label>
			<select class="tamanho-medio" id="add_funcionario">
				<option></option>
				<option value="add-parceiroFuncionario">Cadastrar</option>
					<?php
						foreach($funcionarios as $funcionario)
						{
							echo "<option id='".$funcionario['Funcionario']['nome']."' value='".$funcionario['Funcionario']['id']."' >";
								echo $funcionario['Funcionario']['nome'];
							echo "</option>";
						}
					?>
			</select>
		</div>
			
		<?php
			echo $this->Form->input('username',array('label'=>'Login:','id'=>'LoginUser','class'=>'tamanho-medio'));
		?>
			
	</section>
	
	
	<section class="coluna-central">
		<?php			
			echo $this->Form->input('role_id',array('label'=>'Tipo de Usuario:','id'=>'roleUser','class'=>'tamanho-medio'));
			echo $this->Form->input('password',array('label'=>'Senha:','id'=>'senhaUser','type'=>'password','class'=>'tamanho-medio'));

		?>
	</section>
	
	<section class="coluna-direita">
		<?php	
			echo $this->Form->input('acesso',array('label'=>'Tipo de Acesso:','id'=>'senhaUser','class'=>'tamanho-medio'));
		?>
	</section>
	<!-- FIM SECTION SUPERIOR  --->
	
	
	
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png',array('class'=>'','alt'=>'Salvar','title'=>'Salvar','id'=>'')); 
		echo $this->Form->end();	
	?>
</footer>

<!--
<pre>
<?php
	//print_r($funcionarios);

?>
</pre>
-->
