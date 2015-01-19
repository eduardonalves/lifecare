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
				echo $this->Form->input('id',array('type'=>'hidden'));
				echo $this->Form->input('ativo',array('label'=>'Ativo:','data-classe'=>'validacao-direita','class'=>'tamanho-pequeno','type'=>'select','options' => array('1'=>'Sim','0'=>'Não')));
				echo $this->Form->input('nome',array('label'=>'Nome<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-medio obrigatorio','type'=>'text','maxlength'=>'150'));
				echo $this->Form->input('cpf',array('label'=>'CPF<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-medio inputCpf obrigatorio','type'=>'text','placeholder'=>'000.000.000-00'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('nascimento',array('label'=>'Nascimento<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-pequeno inputData obrigatorio','type'=>'text'));
				echo $this->Form->input('pis_pasep',array('label'=>'PIS/PASEP<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-pequeno obrigatorio','type'=>'text','maxlength'=>'11'));				
			?>
		</section>
		
		<section class="coluna-direita">
			<?php
				echo $this->Form->input('nome_mae',array('label'=>'Nome da Mãe:<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-topo','class'=>'tamanho-medio obrigatorio','type'=>'text','maxlength'=>'150'));
				echo $this->Form->input('carteira_trabalho',array('label'=>'Cart. de Trabalho<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-baixo','class'=>'tamanho-medio inputCarteira obrigatorio','type'=>'text','maxlength'=>'17'));
			?>
		</section>
	</section>

	<header class="linha">Dados de Contato / Endereço</header>
	
	<section>
		<section class="coluna-esquerda">
			<?php		
				echo $this->Form->input('telefone',array('label'=>'Telefone<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-medio inputTel obrigatorio','type'=>'text','placeholder'=>'(00) 0000-0000'));
				echo $this->Form->input('endereco',array('label'=>'Endereço<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-medio obrigatorio','type'=>'text','placeholder'=>'logradouro, nº, andar, ap.'));
				echo $this->Form->input('uf',array('label'=>'UF<span class="campo-obrigatorio">*</span>:', 'data-classe'=>'validacao-direita','style'=>'width:20px !important;padding-left:6px;','class'=>'tamanho-pequeno Nao-Numeros obrigatorio','type'=>'text','maxlength'=>'2'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php			
				echo $this->Form->input('telefone2',array('label'=>'Celular:','class'=>'tamanho-medio inputCel','type'=>'text','placeholder'=>'(00) 00000-0000'));
				echo $this->Form->input('bairro',array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-medio obrigatorio','type'=>'text'));
				echo $this->Form->input('cep',array('label'=>'CEP<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-medio inputCep obrigatorio','type'=>'text'));
			?>
		</section>
		
		<section class="coluna-direita">
			<?php			
				echo $this->Form->input('email',array('label'=>'E-mail:','class'=>'tamanho-medio testeMail','type'=>'text','placeholder'=>'exemplo@email.com'));				
				echo $this->Form->input('cidade',array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-baixo','class'=>'tamanho-medio obrigatorio','type'=>'text'));				
			?>
		</section>
	</section>
		
	<header class="linha">Dados da Função</header>
	
	<section>
		<section class="coluna-esquerda">
			
			<div class="input autocompleteCargo">
					<label id="SpanPesquisarFornecedor">Cargo<span class="campo-obrigatorio">*</span>:</label>
					<select  name="data[Funcionario][cargo_id]" class="tamanho-medio obrigatorio" data-classe="validacao-combobox" id="add-cargo">
						<option></option>
						<option value="add-cargo">Cadastrar</option>
						<?php
							foreach($cargos as $cargo){		
								$selected = ($this->data['Funcionario']['cargo_id'] == $cargo['Cargo']['id']) ? 'selected="selected"' : '';
								echo "<option value='".$cargo['Cargo']['id']."' " . $selected . ">";
									echo $cargo['Cargo']['nome'];
								echo "</option>";
							}
						?>
					</select>
				</div>			
			
			<?php									
				//echo $this->Form->input('cargo_id',array('label'=>'Cargo<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-medio obrigatorio','type'=>'text'));
				echo $this->Form->input('admissao',array('label'=>'Admissão:','class'=>'tamanho-pequeno inputData','type'=>'text'));
			?>
		</section>
		
		<section class="coluna-central">
			<?php
				echo $this->Form->input('tipo_contrato',array('label'=>'Tipo de Contrato<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-direita','class'=>'tamanho-medio obrigatorio','type'=>'select','options'=>array('efetivo'=>'Efetivo','estagio'=>'Estágio','treinamento'=>'Treinamento')));
				echo $this->Form->input('desligamento',array('label'=>'Desligamento:','class'=>'tamanho-pequeno inputData','type'=>'text'));
			?>
		</section>
		
		<section class="coluna-direita">
			<?php
				echo $this->Form->input('efetivacao',array('label'=>'Início<span class="campo-obrigatorio">*</span>:','data-classe'=>'validacao-topo','class'=>'tamanho-pequeno inputData obrigatorio','type'=>'text'));
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

<?php // CADASTRAR NOVO CARGO ?>
	<div class="modal fade" id="myModal_add-cargo" tabindex="-1" class="modal-cargo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body modal-body-cargo">
		<?php
			echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
		?>
			<header class="cabecalho">
			<?php 
				echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
			?>	
				<h1>Novo Cargo</h1>
			</header>

			<section>
				<header>Informações do Cargo</header>
			</section>
			
			<section class="coluna-modal">
				<section class="coluna_esquerda_modal">		
					<form id="novoCargo" method="POST">
						<?php
							echo $this->Form->input('nome',array('label'=>'Nome<span class="campo-obrigatorio">*</span>:','id'=>'cargoNome','class'=>'tamanho-medio','type'=>'text'));
							echo $this->Form->input('descricao',array('label'=>'Descrição:','class'=>'tamanho-medio textarea-cargo','id'=>'cargoDescri','type'=>'textarea','rols'=>'4','cols'=>'5'));
							
							echo $this->html->image('botao-salvar.png',array(
													'class'=>'bt-salvarCargo',
													'alt'=>'Salvar',
													'title'=>'Salvar',
													'id'=>'salvarCargo'							    
							));
						?>
					</form>
					
					<script>
						$(document).ready(function(){
							
							$('#salvarCargo').click(function(){
	
								if($('#cargoNome').val() == ''){
									$(this).addClass('shadow-vermelho');
									$('<span class="validacao">Preencha este Campo!</span>').insertAfter($(this));			
								}else{
									
									var urlAction = "<?php echo $this->Html->url(array("controller" => "Cargos", "action" => "add"),true);?>";
									var dadosForm = $("#novoCargo").serialize();
									
									//$('.loaderAjaxIdentificacao').show();
									
									$.ajax({
										type: "POST",
										url: urlAction,
										data:  dadosForm,
										dataType: 'json'
									}).done(function(data){
											$('#myModal_add-cargo').modal('hide');
											$('#cargoNome').val('');
											$('#cargoDescri').val('');
											console.log(data.id);
											
											$('#add-cargo').append('<option value="'+data.id+'">'+data.nome+'</option>');
											
									});									
								}
							});								
						});
					</script>
				</section>
			</section>
		</div>
	</div>
