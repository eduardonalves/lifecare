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

	<h1 class="menuOption52">Cadastrar Usuário</h1>
</header>

<section>
	<header>Dados do usuário</header>
	
	<!-- INICIO_SECTION SUPERIOR  --->
	<section class="coluna-esquerda">
		<?php	
			echo $this->Form->create('User');
			echo $this->Form->input('funcionario_id',array('type'=>'hidden','id'=>'funcionarioId'));
		?>
		
		<?php
			echo $this->Form->input('username',array('label'=>'Login<span class="campo-obrigatorio">*</span>:','id'=>'LoginUser','class'=>'tamanho-medio'));
			echo '<span id="msgLogin" class="Msg-tooltipDireita" style="display:none">Preencha o campo Login</span>';
			echo $this->Form->input('password',array('label'=>'Senha<span class="campo-obrigatorio">*</span>:','id'=>'senhaUser','type'=>'password','class'=>'tamanho-medio'));
			echo '<span id="msgSenha" class="Msg-tooltipDireita" style="display:none">Preencha o campo Senha</span>';
		?>
			
	</section>
	
	
	<section class="coluna-central">
			
			<div class="input autocompleteRole conta">
				
			<?php
			
			echo $this->Form->input('role_id',array('type'=>'hidden','id'=>'roleId'));
			
			?>
			<span id="msgRole" class="Msg tooltipMensagemErroTopo" style="display:none">Selecione o Tipo de Usuário</span>
			<label id="SpanRole">Tipo de Usuário<span class="campo-obrigatorio">*</span>:</label>
			<select class="tamanho-medio" id="add_role">
				<option></option>
					<?php
						foreach($roles as $role)
						{
							echo "<option id='".$role['Role']['alias']."' value='".$role['Role']['id']."' >";
								echo $role['Role']['roles'];
							echo "</option>";
						}
					?>
			</select>
		</div>
		<?php
			echo $this->Form->input('status',array('label'=>'Bloqueado<span class="campo-obrigatorio">*</span>:','id'=>'Bloqueado','class'=>'tamanho-medio','type'=>'select', 'options'=>array(''=>'','1' => 'NÃO','0' => 'SIM')));
		?>
	</section>
	
	<section class="coluna-direita">
		<?php	
			echo $this->Form->input('acesso',array('label'=>'Tipo de Acesso<span class="campo-obrigatorio">*</span>:','id'=>'TipoAcesso','class'=>'tamanho-medio','type'=>'select', 'options'=>array(''=>'','INTERNO' => 'INTERNO','EXTERNO' => 'EXTERNO')));
		?>
	</section>
	<!-- FIM SECTION SUPERIOR  --->
	
</section>

<footer>
	<?php
		//HIDDEN's DOS CONFIG's
	
			//ConfigCObranca
			echo $this->Form->input('Configcobranca.0.data_inicio',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configcobranca.0.data_fim',array('type'=>'hidden','value'=>'1'));
	
			//COnfig Configconta
			echo $this->Form->input('Configconta.0.identificacao',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.data_emissao',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.data_quitacao',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.valor',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.parcelas',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.parceirodenegocio_id',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.descricao',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.nome_parceiro',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.cnpj_parceiro',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.status_parceiro',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.status',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.tipo',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.pagamento_forma',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configconta.0.pagamento_tipo',array('type'=>'hidden','value'=>'1'));
			
			//COnfig Configlote
			echo $this->Form->input('Configlote.0.numero_lote',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configlote.0.data_fabricacao',array('type'=>'hidden','value'=>'1'));
	
			//COnfig Confignota
			echo $this->Form->input('Confignota.0.descricao',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Confignota.0.data',array('type'=>'hidden','value'=>'1'));
	
			//COnfig Configparceiro
			echo $this->Form->input('Configparceiro.0.nome',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparceiro.0.cnpj',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparceiro.0.endereco',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparceiro.0.telefone',array('type'=>'hidden','value'=>'1'));
	
			//COnfig Configparcela
			echo $this->Form->input('Configparcela.0.parcela',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.identificacao_documento',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.valor',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.periodocritico',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.desconto',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.banco',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.agencia',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.conta',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configparcela.0.status',array('type'=>'hidden','value'=>'1'));
	
			//COnfig Configproduto
			echo $this->Form->input('Configproduto.0.nome',array('type'=>'hidden','value'=>'1'));
			echo $this->Form->input('Configproduto.0.descricao',array('type'=>'hidden','value'=>'1'));
	
	
		echo $this->form->submit('botao-salvar.png',array('class'=>'','alt'=>'Salvar','title'=>'Salvar','id'=>'bt-salvaruser')); 
		echo $this->Form->end();
	?>
</footer>
