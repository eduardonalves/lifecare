<?php 
	if(isset($modal)){
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}

	$this->start('css');
	    echo $this->Html->css('modal_ComFornecedorAdd');
	    echo $this->Html->css('modal_ParceiroCliente');
	    echo $this->Html->css('modal_ParceiroFornecedor');
	    echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		echo $this->Html->script('comConsulta_parceiroAdd.js');
	$this->end();
?>

<script>
	var contadorBlocoEndereco = 1;
	var contadorBlocoDadosBanc = 1;	

	$(document).ready(function(){

		valH1=$('h1').attr('class');
		valH1Aux=valH1[valH1.length-1];

		var tipoModal;

		if(valH1Aux == 3){
			$('#ParceirodenegocioClassificacao').attr('disabled',true).val('CLIENTE');
			tipoModal='CLIENTE';
		}else if(valH1Aux == 4){
			$('#ParceirodenegocioClassificacao').attr('disabled',true).val('FORNECEDOR');
			tipoModal='FORNECEDOR';
		}else{
			$('.areaCliente').hide();
		}

		$('#bt-salvarParceiroModal').click(function(event){

			event.preventDefault();
			fieldLength = 0 ;	

			$(".enderecoLength").each(function(){
				fieldLength = fieldLength + 1;
			});

			var email = $("#Contato0Email").val();
			var emailValido = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var erro = 0;
			var in_fornecedor = 0;
			for(i=0; i < fieldLength; i++){
				valorTipo = $('#tipo'+i).val();
				valorCep = $('#Endereco'+i+'Cep').val();
				valorLogradouro = $('#Endereco'+i+'Logradouro').val();
				valorUf = $('#Endereco'+i+'Uf').val();
				valorCidade = $('#Endereco'+i+'Cidade').val();
				valorBairro = $('#Endereco'+i+'Bairro').val();
				
				if($('#ParceirodenegocioClassificacao').val() == ''){
					$('#ParceirodenegocioClassificacao').addClass('shadow-vermelho');
					$('#ParceirodenegocioClassificacao').focus();
					$('#validaClassificacao').css('display','block');
					erro = erro + 1;
					break;
				}else if($('#ParceirodenegocioNome').val() == ''){
					$('#ParceirodenegocioNome').addClass('shadow-vermelho');
					$('#ParceirodenegocioNome').focus();
					$('#validaNome').css('display','block');
					erro = erro + 1;
					break;				
				}else if(($('#ParceirodenegocioCpfCnpj').val() != '') && ($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
					$('#ParceirodenegocioCpfCnpj').focus();
					$('#validaCPFTamanho').css('display','block');
					erro = erro + 1;
					break;
				}else if(!emailValido.test(email)){
					$('#Contato0Email').focus().css('border-color','pink');
					$('#Contato0Email').focus();
					$('#validaEmail').css('display','block');
					erro = erro + 1;
					break;		
				}else if($('#ParceirodenegocioTelefone1').val() == ''){
					$('#ParceirodenegocioTelefone1').addClass('shadow-vermelho');
					$('#ParceirodenegocioTelefone1').focus();
					$('#validaTelefone').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorTipo == ''){
					$('#tipo'+i).addClass('shadow-vermelho');
					$('#tipo'+i).focus();
					$('#valida'+i+'Tipo').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorCep== ''){
					idval= $('#Endereco'+i+'Cep').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Cep1').css('display','block');
					erro = erro + 1;
					break;					
				}else if(valorCep.length < 9){
					idval= $('#Endereco'+i+'Cep').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Cep2').css('display','block');
					erro = erro + 1;
					break;					
				}else if(valorLogradouro == ''){
					idval= $('#Endereco'+i+'Logradouro').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Logradouro').css('display','block');
					erro = erro + 1;
					break;				
				}else if(valorUf == ''){
					idval= $('#Endereco'+i+'Uf').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Uf').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorCidade == ''){
					idval= $('#Endereco'+i+'Cidade').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Cidade').css('display','block');
					erro = erro + 1;
					break;
				}else if(valorBairro == ''){
					idval= $('#Endereco'+i+'Bairro').attr('id');
					$('#'+idval).addClass('shadow-vermelho');
					$('#'+idval).focus();
					$('#valida'+i+'Bairro').css('display','block');
					erro = erro + 1;
					break;
				}
			}
			
			if(erro==0){
				$('#addFornecedorForm').submit();
			}
		});
		
		$("#ParceirodenegocioCpfCnpj").change(function(){
		
		if($("#ParceirodenegocioCpfCnpj").val() != ''){
			
			var urlAction = "<?php echo $this->Html->url(array("controller" => "Parceirodenegocios", "action" => "verificaidentificacao"),true);?>";
			
		    var dadosForm = $("#addFornecedorForm").serialize();
		    
		    $('.loaderAjaxIdentificacao').show();
		    
		    $.ajax({
				type: "POST",
				url: urlAction,
				data:  dadosForm,
				dataType: 'json',
				success: function(data) {
				    console.debug(data);
				     $('.loaderAjaxIdentificacao').hide();
					if(data == 'existe'){
					    $('#msgValidaDocumento').show();
					    $('#ParceirodenegocioCpfCnpj').val('');  
					}else{
						$('#msgValidaDocumento2').show();
					}
				}
			});
		}
	});

	});	
</script>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption23">Cadastrar Fornecedor</h1>
    
</header>

<section> <!---section superior--->
	<header>Dados Gerais do Fornecedor</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->create('Parceirodenegocio', array('controller' => 'Parceirodenegocio', 'action'=>'addassoc', 'id' => 'addFornecedorForm', 'layout' => 'compras', 'abas' => '41'));
			
			//Essa input receberá sempre o valor do produto selecionado da tabela de comprar produtos
			echo $this->Form->input('Vazio.produto_id',array('id' =>'idProdutoLinha','type' => 'hidden'));

			echo $this->Form->input('tipo',array('class' => 'obrigatorio','label' => 'Classificação<span class="campo-obrigatorio">*</span>:','id' => 'ParceirodenegocioClassificacao','options'=>array('FORNECEDOR'=>'Fornecedor'),'type' => 'select','div' =>array( 'class' => 'input select'),'tabindex'=>'1', 'style' => 'display: none'));
			echo $this->Html->Tag('p','Fornecedor',array('class'=>'valor','style'=>'padding-top: 3px;'));
			
			echo $this->Form->input('Contato.0.telefone1',array('class' => 'tamanho-medio obrigatorio Nao-Letras maskTel','label' => 'Telefone 1<span class="campo-obrigatorio">*</span>:', 'id' => 'ParceirodenegocioTelefone1', 'maxlength'=>'11','tabindex'=>'4','placeholder'=>'(99) 9999-9999'));
			echo '<span id="validaTelefone" class="msg erroRight" style="display:none">Preencha o Telefone</span>';

			echo $this->Form->input('Contato.0.fax',array('class' => 'tamanho-medio Nao-Letras maskTel','label' => 'Fax:', 'maxlength'=>'11','tabindex'=>'7','placeholder'=>'(99) 9999-9999'));
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('class' => 'tamanho-medio obrigatorio','label' => 'Nome<span class="campo-obrigatorio">*</span>:','required'=>'false','maxlength'=>'50','tabindex'=>'2'));
			echo '<span id="validaNome" class="msg erroRight" style="display:none">Preencha o Nome</span>';

			echo $this->Form->input('Contato.0.telefone2',array('class' => 'tamanho-medio Nao-Letras maskTel','label' => 'Telefone 2:', 'id' => 'ParceirodenegocioTelefone2', 'maxlength'=>'11','tabindex'=>'5','placeholder'=>'(99) 9999-9999'));
			echo '<span id="validaTelefone22" class="Msg-tooltipDireita" style="display:none">Preencha o Corretamente</span>';

			echo $this->Form->input('Contato.0.email',array('class' => 'tamanho-medio','type'=> 'text','label' => 'Email:','maxlength'=>'50','tabindex'=>'8','placeholder'=>'exemplo@email.com'));
			echo '<span id="validaEmail" class="Msg-tooltipAbaixo" style="display:none">Preencha o email Corretamente</span>';
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('type'=>'text','class' => 'tamanho-medio','label'=>'', 'div' => array('class' => 'input text'),'tabindex'=>'3'));
			echo "<div id='idcnpj'><label class='label-cnpj'>CNPJ:</label></div>";
			echo "<span id='msgValidaDocumento' class='Msg tooltipMensagemErroTopo' style='display:none'>Já existe um cadastrado com esse nº de documento</span>";
			echo "<span id='msgValidaDocumento2' class='Msg tooltipMensagemErroTopo' style='display:none'>Nº de documento liberado para cadastro</span>";

			echo "<div id='loader' class='loaderAjaxIdentificacao' style='display:none'>";
			echo "<span>Verificando aguarde...</span>";
			echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
															 'title'=>'Carregando',
															 'class'=>'loaderAjaxCategoria',
															 ));
			echo "</div>";
			echo $this->Form->input('Contato.0.telefone3',array('class' => 'tamanho-medio Nao-Letras maskCel','label' => 'Celular:' , 'maxlength'=>'11','tabindex'=>'6','placeholder'=>'(99) 99999-9999'));
			echo '<span id="validaCelular" class="Msg-tooltipAbaixo" style="display:none">Preencha o Corretamente</span>';
			echo $this->Form->input('bloqueado',array('tabindex'=>'11','label' => 'Bloqueado:','options'=>array('Não' => 'Não', 'Sim' => 'Sim'),'type' => 'select','class' => 'obrigatorio'));
		?>

	</section>
</section><!---Fim section superior--->

<section class="ajusteAlignSection"> <!---section MEIO--->
	<header class="">Endereços</header>

	<div class="area-endereco enderecoLength"> 
		<div class="bloco-area">
			<section class="coluna-esquerda">

				<?php	
					echo $this->Form->input('Endereco.0.tipo',array('label' => 'Tipo<span class="campo-obrigatorio">*</span>:','type' => 'select','readonly' => 'true','id'=>'tipo0','options'=>array('PRINCIPAL'=>'Principal'),'div' =>array( 'class' => 'input select'),'tabindex'=>''));
					echo '<span id="valida0tipo" class="msg erroRight" style="display:none">Preencha o Bairro</span>';

					echo $this->Form->input('Endereco.0.numero', array('label'=>'Número:','class' => 'tamanho-medio','tabindex'=>'12'));

					echo $this->Form->input('Endereco.0.bairro', array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio','tabindex'=>'15'));
					echo '<span id="valida0Bairro" class="msg erroRight" style="display:none">Preencha o Bairro</span>';
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Endereco.0.cep', array('label'=>'CEP<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio maskCep obrigatorio','maxlength'=>'12','tabindex'=>'10','placeholder'=>'99999-999'));

					echo $this->html->image('consultas.png',array('id'=>'consultaCEP0','class'=>'buscarCEP','style'=>'margin-left:10px;cursor:pointer;'));
					echo '<span id="valida0Cep1" class="msg erroRight" style="display:none">Preencha o CEP</span>';
					echo '<span id="valida0Cep2" class="msg erroRight" style="display:none">Preencha corretamente o CEP</span>';
					echo '<span id="valida0Cep3" class="msg erroRight" style="display:none">Endereço não encontrado para o cep digitado.</span>';

					echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'text','maxlength'=>'25','class' => 'estado obrigatorio tamanho-medio','div' => array('class' => 'inputCliente input text divUf'),'tabindex'=>'13'));
					echo '<span id="valida0Uf" class="msg erroRight" style="display:none">Preencha o campo Estado</span>';
					
					echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','maxlength'=>'25','class' => 'tamanho-medio','tabindex'=>'16'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio','tabindex'=>'11'));
					echo '<span id="valida0Logradouro" class="msg erroBottom" style="display:none">Preencha o Logradouro</span>';

					echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'text','class' => 'cidade obrigatorio tamanho-medio','tabindex'=>'14'));
					echo '<span id="valida0Cidade" class="msg erroBottom" style="display:none">Preencha o campo Cidade</span>';

					echo $this->Form->input('Endereco.0.ponto_referencia', array('label'=>'Ponto de Referência:','maxlength'=>'50','type' => 'textarea','tabindex'=>'17'));
				?>

			</section>
		</div>	
	</div>

	<div class="fake-footer">

		<?php
			echo $this->html->image('endereco-adional.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco de Endereços','id'=>'bt-addEndereco','class'=>'bt-direita'));
			echo $this->html->image('botao-remove.png',array('alt'=>'Adicionar','title'=>'Remover Bloco de Endereços','id'=>'remove-area-endereco','class'=>'bt-direita'));
		?>

		<span id="validaEndBloco" class="Msg-tooltipEsquerda" style="display:none">São necessarios os campos obrigatórios para adicionar novo bloco</span>
	</div>
</section><!--fim Meio-->

<section class="ajusteAlignSection"> <!---section MEIO--->
	<header class="">Dados Bancários</header>

	<div class="area-dadosbanc">
		<div class="bloco-area">
			<section class="coluna-esquerda">

				<?php 
					echo $this->Form->input('Dadosbancario.0.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio','tabindex'=>'18','maxlength' => '50'));

					echo $this->Form->input('Dadosbancario.0.numero_agencia',array('label' => 'Número da Agência:','class' => 'tamanho-pequeno agencia','tabindex'=>'21','maxlength' => '25'));

					echo $this->Form->input('Dadosbancario.0.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno','tabindex'=>'24','maxlength' => '50'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.0.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio','tabindex'=>'19','maxlength' => '25'));

					echo $this->Form->input('Dadosbancario.0.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','id' => 'DadosbancarioConta0','tabindex'=>'22','maxlength' => '25'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.0.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno','tabindex'=>'50'));

					echo $this->Form->input('Dadosbancario.0.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-medio maskTel','tabindex'=>'23','maxlength' => '15','placeholder'=>'(99) 9999-9999'));
				?>

			</section>
		</div>
	</div>

	<div class="fake-footer">

		<?php
			echo $this->html->image('banco-adional.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco Dados Bancários','id'=>'add-area-dadosbanc','class'=>'bt-direita'));	
			echo $this->html->image('botao-remove.png',array('alt'=>'Adicionar','title'=>'Remover Bloco Dados Bancários','id'=>'remove-area-dadosbanc','class'=>'bt-direita'));
		?>

		<span id="validaBancBloco" class="Msg-tooltipEsquerda" style="display:none">São necessarios os campos Número da Agência e Conta para adicionar novo bloco</span>
	</div>
</section><!--fim Meio-->

<!--<section class="areaCliente">-->
<section><!---section Baixo--->	
	<header class="">Dados do Crédito</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Dadoscredito.0.limite',array('label' => 'Limite de Crédito:','type' => 'text','class' => 'tamanho-medio  dinheiro_duasCasas','tabindex'=>'25'));
			echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('Dadoscredito.0.validade_limite',array('label' => 'Validade do Limite:','type' => 'text','class' => 'tamanho-pequeno inputData','tabindex'=>'26'));
			echo '<span id="validaValidade1" class="Msg-tooltipDireita" style="display:none">Preencha a Validade</span>';
			echo '<span id="validaValidade2" class="Msg-tooltipDireita" style="display:none">Nao é possivel selecionar data passada</span>';
			echo '<span id="validaValidade3" class="Msg-tooltipDireita" style="display:none">Preencha corretamente a data</span>';
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('Dadoscredito.0.bloqueado',array('label' => 'Bloqueado:','options'=>array('Não' => 'Não', 'Sim' => 'Sim'),'type' => 'select','class' => '','tabindex'=>'29'));
			echo '<span id="validaBloqueado" class="Msg-tooltipDireita" style="display:none">Selecione se Bloqueado</span>';
			echo $this->Form->input('Dadoscredito.0.user_id', array('type'=> 'hidden', 'value' => $userid));
		?>

	</section>
</section>	

<footer>
    <div id="LoadAjaxProduto" class="loaderAjax" style="display:none">

		<?php echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando','title'=>'Carregando','class'=>'ajaxLoader')); ?>

		<span id="spanLoadProduto"></span>Salvando aguarde...</span>
    </div>	

    <?php
		echo $this->Form->input('layout', array('type'=> 'hidden', 'value' => 'compras'));
		echo $this->Form->input('abas', array('type'=> 'hidden', 'value' => '41'));
		
		echo $this->html->image('botao-salvar.png',array('alt'=>'Salvar','title'=>'Salvar','id'=>'bt-salvarParceiroModal','class'=>'bt-salvar'));
		
		echo $this->Form->end();
	?>

</footer>
