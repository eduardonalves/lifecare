<?php
	
	$this->start('css');
		echo $this->Html->css('rh');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('rh');
	$this->end();
?>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	 
	 <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption53">Cadastrar Funcionário</h1>
</header>

<section>
	<header>Informações do Funcionário</header>
	<?php echo $this->Form->create('Funcionario',array('id'=>'formFuncionario'));?>
	
	<section>
		<section class="coluna-esquerda">
			<?php	
				echo $this->Form->input('ativo',array('label'=>'Ativo:','class'=>'tamanho-pequeno','type'=>'select','options' => array('1'=>'Sim','0'=>'Não')));
				echo $this->Form->input('nome',array('label'=>'Nome<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio obrigatorio','type'=>'text','maxlength'=>'150'));
				echo $this->Form->input('cpf',array('label'=>'CPF<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio inputCpf obrigatorio','type'=>'text','placeholder'=>'000.000.000-00'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('nascimento',array('label'=>'Nascimento<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno inputData obrigatorio','type'=>'text'));
				echo $this->Form->input('pis_pasep',array('label'=>'PIS/PASEP<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno obrigatorio','type'=>'text','maxlength'=>'11'));				
			?>
		</section>
		
		<section class="coluna-direita">
			<?php
				echo $this->Form->input('nome_mae',array('label'=>'Nome da Mãe:<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio obrigatorio','type'=>'text','maxlength'=>'150'));
				echo $this->Form->input('carteira_trabalho',array('label'=>'Cart. de Trabalho<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio inputCarteira obrigatorio','type'=>'text','maxlength'=>'17'));
			?>
		</section>
	</section>

	<header class="linha">Dados de Contato / Endereço</header>
	
	<section>
		<section class="coluna-esquerda">
			<?php		
				echo $this->Form->input('telefone',array('label'=>'Telefone<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio inputTel obrigatorio','type'=>'text','placeholder'=>'(00) 0000-0000'));
				echo $this->Form->input('endereco',array('label'=>'Endereço<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio obrigatorio','type'=>'text','placeholder'=>'logradouro, nº, andar, ap.'));
				echo $this->Form->input('uf',array('label'=>'UF:<span class="campo-obrigatorio">*</span>:', 'style'=>'width:20px !important;padding-left:6px;','class'=>'tamanho-pequeno Nao-Numeros obrigatorio','type'=>'text','maxlength'=>'2'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php			
				echo $this->Form->input('telefone2',array('label'=>'Celular:','class'=>'tamanho-medio inputCel','type'=>'text','placeholder'=>'(00) 00000-0000'));
				echo $this->Form->input('bairro',array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio obrigatorio','type'=>'text'));
				echo $this->Form->input('cep',array('label'=>'CEP<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio inputCep obrigatorio','type'=>'text'));
			?>
		</section>
		
		<section class="coluna-direita">
			<?php			
				echo $this->Form->input('email',array('label'=>'E-mail:','class'=>'tamanho-medio testeMail','type'=>'text','placeholder'=>'exemplo@email.com'));				
				echo $this->Form->input('cidade',array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio obrigatorio','type'=>'text'));				
			?>
		</section>
	</section>
		
	<header class="linha">Dados da Função</header>
	
	<section>
		<section class="coluna-esquerda">
			<?php						
				echo $this->Form->input('cargo_id',array('label'=>'Cargo<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio','type'=>'text'));
				echo $this->Form->input('admissao',array('label'=>'Admissão<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno inputData','type'=>'text'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('tipo_contrato',array('label'=>'Tipo de Contrato<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio','type'=>'select','options'=>array('efetivo'=>'Efetivo','estagio'=>'Estágio','treinamento'=>'Treinamento')));
				echo $this->Form->input('desligamento',array('label'=>'Desligamento:','class'=>'tamanho-pequeno inputData','type'=>'text'));
			?>
		</section>
		
		<section class="coluna-direita">
			<?php
				echo $this->Form->input('efetivacao',array('label'=>'Início<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno inputData','type'=>'text'));
			?>
		</section>
	</section>
	
</section>

<footer>
	<?php
		echo $this->html->image('botao-voltar.png',array('id'=>'voltar','style'=>'float:left;cursor:pointer;display:none;'));
		
		echo $this->html->image('botao-salvar.png',array(
							    'class'=>'bt-salvar',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'id'=>'salvarFuncionario'							    
	    ));
		
		echo $this->Form->end();
	?>	
</footer>
