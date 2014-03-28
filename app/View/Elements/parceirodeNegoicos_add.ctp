<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}

	$this->start('css');
	    echo $this->Html->css('modal_ParceiroCliente');
	    echo $this->Html->css('modal_ParceiroFornecedor');
	    echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_parceiro.js');
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
	//$('.areaCliente').show();
	tipoModal='CLIENTE';
    }else if(valH1Aux == 4){
	$('#ParceirodenegocioClassificacao').attr('disabled',true).val('FORNECEDOR');
	//$('.areaCliente').hide();
	tipoModal='FORNECEDOR';
    }else{
	$('.areaCliente').hide();
    }
	
	$('#bt-salvarParceiroModal').click(function(event){
	    event.preventDefault();
		
		if($('#ParceirodenegocioClassificacao').val() == 0){
			$('#ParceirodenegocioClassificacao').addClass('shadow-vermelho');
			$('#validaClassificacao').css('display','block');
			return false;
		}else if($('#ParceirodenegocioNome').val() == ''){
			$('#ParceirodenegocioNome').addClass('shadow-vermelho');
			$('#ParceirodenegocioNome').on('focus',function(){
				if($('#ParceirodenegocioNome').val() == ''){
					$('#validaNome').css('display','block');
				}
			});
			$('#ParceirodenegocioNome').focus();
			$('#ParceirodenegocioNome').focusout(function(){
				$('#validaNome').css('display','none');
			});
			return false;
		}else if($('#ParceirodenegocioCpfCnpj').val() == ''){
			$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
			$('#validaCPF').css('display','block');
			return false;
		}else if(($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
			$('#ParceirodenegocioCpfCnpj').focus();
			$('#validaCPFTamanho').css('display','block');
			$('#ParceirodenegocioCpfCnpj').focusout(function(){
				$('#validaCPFTamanho').css('display','none');
			});
			return false;
		}else if($('#ParceirodenegocioTelefone1').val() == ''){
			$('#ParceirodenegocioTelefone1').addClass('shadow-vermelho');
			$('#ParceirodenegocioTelefone1').on('focus',function(){
				if($('#ParceirodenegocioTelefone1').val() == ''){
					$('#validaTelefone').css('display','block');
				}
			});
			$('#ParceirodenegocioTelefone1').focus();
			$('#ParceirodenegocioTelefone1').focusout(function(){
				$('#validaTelefone').css('display','none');
			});
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').addClass('shadow-vermelho');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').on('focus',function(){
				if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').val() == ''){
					$('#valida'+ (contadorBlocoEndereco-1) +'Cep1').css('display','block');
				}
			});
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focus();
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Cep1').css('display','none');
			});
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').val().length < 9){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focus();
			$('#valida'+ (contadorBlocoEndereco-1) +'Cep2').css('display','block');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cep').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Cep2').css('display','none');
			});
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').addClass('shadow-vermelho');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').on('focus',function(){
				if($('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').val() == ''){
					$('#valida'+ (contadorBlocoEndereco-1) +'Logradouro').css('display','block');
				}
			});
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').focus();
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Logradouro').css('display','none');
			});
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Uf').val() == 0){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Uf').addClass('shadow-vermelho');
			$('#valida'+ (contadorBlocoEndereco-1) +'Uf').css('display','block');
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cidade').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Cidade').addClass('shadow-vermelho');
			$('#valida'+ (contadorBlocoEndereco-1) +'Cidade').css('display','block');
			return false;
		}else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').val() == ''){
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').addClass('shadow-vermelho');
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').on('focus',function(){
				if($('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').val() == ''){
					$('#valida'+ (contadorBlocoEndereco-1) +'Bairro').css('display','block');
				}
			});
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').focus();
			$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').focusout(function(){
				$('#valida'+ (contadorBlocoEndereco-1) +'Bairro').css('display','none');
			});
			return false;
		}else if(($('#Dadoscredito0Limite').val() == '')){
			$('#Dadoscredito0Limite').addClass('shadow-vermelho');
			$('#Dadoscredito0Limite').on('focus',function(){
				if($('#Dadoscredito0Limite').val() == ''){
					$('#validaLimite').css('display','block');
				}
			});
			$('#Dadoscredito0Limite').focus();
			$('#Dadoscredito0Limite').focusout(function(){
				$('#validaLimite').css('display','none');
			});
			return false;
		}else if(($('#Dadoscredito0ValidadeLimite').val() == '')){
			$('#Dadoscredito0ValidadeLimite').addClass('shadow-vermelho');
			$('#Dadoscredito0ValidadeLimite').on('focus',function(){
				if($('#Dadoscredito0ValidadeLimite').val() == ''){
					$('#validaValidade1').css('display','block');
				}
			});
			$('#Dadoscredito0ValidadeLimite').focus();
			$('#Dadoscredito0ValidadeLimite').focusout(function(){
				$('#validaValidade1').css('display','none');
			});
			return false;
		}else if(($('#ParceirodenegociosBloqueado').val() == '')){
			$('#ParceirodenegociosBloqueado').addClass('shadow-vermelho');
			$('#validaBloqueado').css('display','block');
			return false;
		}else{
		//$(".loaderAjaxCParceiroDIV").show();
		//$("#bt-salvarParceiro").hide();
		    $('#ParceirodenegocioClassificacao').removeAttr('disabled');

		    var urlAction = "<?php echo $this->Html->url(array("controller"=>"Parceirodenegocios","action"=>"add"),true);?>";
		    var dadosForm = $("#ParceirodenegocioAddFormModal").serialize();
		    
		    $.ajax({
			type: "POST",
			url: urlAction,
			data:  dadosForm,
			dataType: 'json',
			success: function(data) {
			    console.debug(data);
			    
				if(data.Parceirodenegocio.id == 0 || data.Parceirodenegocio.id == undefined ){
				    $(".loaderAjaxCParceiroDIV").hide();
				    $("#bt-salvarParceiroModal").show();
				   // $("#spanMsgCateNomeInvalido").css("display","block");
				    //$('#ParceirodenegocioNome').addClass('shadow-vermelho');
				}else{
				    
				    $("[id*='myModal_add-parceiro']").modal('hide');
				    $('[id*="ParceirodenegocioId"]').val(data.Parceirodenegocio.id);
				    $('[id*="Parceiro"]').val(data.Parceirodenegocio.nome);
				    $('[id*="CpfCnpj"]').val(data.Parceirodenegocio.cpf_cnpj);
				    $("#ParceirodenegocioNome").val("");
				    $(".loaderAjaxCParceiroDIV").hide();
				    $("#bt-salvarParceiroModal").show();
				    $("#add-"+tipoModal.toLowerCase()).append("<option value='"+data.Parceirodenegocio.id+"' class='"+data.Parceirodenegocio.cpf_cnpj+"' id='"+data.Parceirodenegocio.nome+"' rel='"+tipoModal+"'>"+data.Parceirodenegocio.nome+"</option>");
				    					
				   // $("#spanMsgCateNomeInvalido").css("display","none");
				    $(".loaderAjaxParceirodenegocioDIV").hide();
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
    <h1 class="menuOption32">Cadastrar Parceiro</h1>
</header>

<?php
    if(!isset($modal)){	
	echo $this->Form->create('Parceirodenegocio', array('controller' => 'Parceirodenegocio', 'action'=>'add', 'id' => 'ParceirodenegocioAddForm'));
    }else{
	echo $this->Form->create('Parceirodenegocio', array('controller' => 'Parceirodenegocio', 'action'=>'add', 'id' => 'ParceirodenegocioAddFormModal'));
    }
?>    

<section> <!---section superior--->

	<header>Dados GeriasParceiro</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('tipo',array('class' => 'obrigatorio','label' => 'Classificação<span class="campo-obrigatorio">*</span>:','id' => 'ParceirodenegocioClassificacao','options'=>array(''=>'','CLIENTE'=>'Cliente','FORNECEDOR'=>'Fornecedor'),'type' => 'select','div' =>array( 'class' => 'input select'),'tabindex'=>'1'));
			echo '<span id="validaClassificacao" class="Msg-tooltipDireita" style="display:none">Selecione a Classificação</span>';

			echo $this->Form->input('Contato.0.telefone1',array('class' => 'tamanho-medio obrigatorio Nao-Letras maskTel','label' => 'Telefone 1<span class="campo-obrigatorio">*</span>:', 'id' => 'ParceirodenegocioTelefone1', 'maxlength'=>'11','tabindex'=>'4'));
			echo '<span id="validaTelefone" class="Msg-tooltipDireita" style="display:none">Preencha o Telefone</span>';

			echo $this->Form->input('Contato.0.fax',array('class' => 'tamanho-medio Nao-Letras maskTel','label' => 'Fax:', 'maxlength'=>'11','tabindex'=>'7'));
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('class' => 'tamanho-medio obrigatorio','label' => 'Nome<span class="campo-obrigatorio">*</span>:','required'=>'false','maxlength'=>'50','tabindex'=>'2'));
			echo '<span id="validaNome" class="Msg-tooltipDireita" style="display:none">Preencha o Nome</span>';

			echo $this->Form->input('Contato.0.telefone2',array('class' => 'tamanho-medio Nao-Letras maskTel','label' => 'Telefone 2:', 'id' => 'ParceirodenegocioTelefone2', 'maxlength'=>'11','tabindex'=>'5'));
			echo '<span id="validaTelefone22" class="Msg-tooltipDireita" style="display:none">Preencha o Corretamente</span>';

			echo $this->Form->input('Contato.0.email',array('class' => 'tamanho-medio','type'=> 'text','label' => 'Email:','maxlength'=>'50','tabindex'=>'8'));
			echo '<span id="validaEmail" class="Msg-tooltipAbaixo" style="display:none">Preencha o email Corretamente</span>';
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('type'=>'text','class' => 'tamanho-medio obrigatorio','style'=>'background:#EBEAFC;','disabled'=>'disabled','label'=>'', 'div' => array('class' => 'input text divCpfCnpj'),'tabindex'=>'3'));
			echo "<div id='idcpf'><input id='inputcpf' type='radio'   name='CPFCNPJ' value='cpf'><label class='label-cpf'>CPF /</label></div>	 
				  <div id='idcnpj'><input id='inputcnpj' type='radio' name='CPFCNPJ' value='cnpj'><label class='label-cnpj'>CNPJ<span class='campo-obrigatorio'>*</span>:</label></div>";
			echo '<span id="validaCPF" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ</span>';
			echo '<span id="validaCPFTamanho" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ Corretamente</span>';

			echo $this->Form->input('Contato.0.telefone3',array('class' => 'tamanho-medio Nao-Letras maskCel','label' => 'Celular:' , 'maxlength'=>'11','tabindex'=>'6'));
			echo '<span id="validaCelular" class="Msg-tooltipAbaixo" style="display:none">Preencha o Corretamente</span>';
		?>

	</section>
</section><!---Fim section superior--->

<section class="ajusteAlignSection"> <!---section MEIO--->
	
	<header class="">Endereços</header>

	<div class="area-endereco"> 
		<div class="bloco-area">
			<section class="coluna-esquerda">

				<?php	
					echo $this->Form->input('Endereco.0.tipo',array('label' => 'Tipo<span class="campo-obrigatorio">*</span>:','type' => 'select','readonly' => 'true','id'=>'tipo0','options'=>array('PRINCIPAL'=>'Principal'),'div' =>array( 'class' => 'input select'),'tabindex'=>'9'));
					echo '<span id="valida0tipo" class="Msg-tooltipDireita" style="display:none">Preencha o Bairro</span>';

					echo $this->Form->input('Endereco.0.numero', array('label'=>'Número:','class' => 'tamanho-medio','tabindex'=>'12'));

					echo $this->Form->input('Endereco.0.bairro', array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio','tabindex'=>'15'));
					echo '<span id="valida0Bairro" class="Msg-tooltipDireita" style="display:none">Preencha o Bairro</span>';
				?>

			</section>
		
			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Endereco.0.cep', array('label'=>'CEP<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio maskCep obrigatorio','maxlength'=>'12','tabindex'=>'10'));
					
					echo $this->html->image('consultas.png',array('id'=>'consultaCEP0','class'=>'buscarCEP','style'=>'margin-left:10px;cursor:pointer;'));
				
					echo '<span id="valida0Cep1" class="Msg-tooltipDireita" style="display:none">Preencha o CEP</span>';
					echo '<span id="valida0Cep2" class="Msg-tooltipDireita" style="display:none">Preencha corretamente o CEP</span>';
					echo '<span id="valida0Cep3" class="Msg-tooltipDireita" style="display:none">Endereço não encontrado para o cep digitado.</span>';

					echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'estado obrigatorio tamanho-medio','div' => array('class' => 'inputCliente input text divUf'),'tabindex'=>'13'));
					echo '<span id="valida0Uf" class="Msg-tooltipDireita" style="display:none">Preencha o campo Estado</span>';

					echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','class' => 'tamanho-medio','tabindex'=>'16'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio','tabindex'=>'11'));
					echo '<span id="valida0Logradouro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Logradouro</span>';

					echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'text','class' => 'cidade obrigatorio tamanho-medio','tabindex'=>'14'));
					echo '<span id="valida0Cidade" class="Msg-tooltipAbaixo" style="display:none">Preencha o campo Cidade</span>';

					echo $this->Form->input('Endereco.0.ponto_referencia', array('label'=>'Ponto de Referência:','type' => 'textarea','tabindex'=>'17'));
				?>

			</section>
		</div>	
	</div>

	<div class="fake-footer">

		<?php
			echo $this->html->image('endereco-adional.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco de Endereços','id'=>'bt-addEndereco','class'=>'bt-direita'));
			echo $this->html->image('botao-remove.png',array('alt'=>'Adicionar','title'=>'Remover Bloco de Endereços','id'=>'remove-area-endereco','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section class="ajusteAlignSection"> <!---section MEIO--->

	<header class="">Dados Bancários</header>
	
	<div class="area-dadosbanc">
		<div class="bloco-area">
			<section class="coluna-esquerda">

				<?php 
					echo $this->Form->input('Dadosbancario.0.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio','tabindex'=>'18'));

					echo $this->Form->input('Dadosbancario.0.numero_agencia',array('label' => 'Número da Agência:','class' => 'tamanho-pequeno agencia','tabindex'=>'21'));

					echo $this->Form->input('Dadosbancario.0.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno','tabindex'=>'24'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.0.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio','tabindex'=>'19'));

					echo $this->Form->input('Dadosbancario.0.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','id' => 'DadosbancarioConta0','tabindex'=>'22'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.0.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno','tabindex'=>'20'));

					echo $this->Form->input('Dadosbancario.0.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-medio tel','tabindex'=>'23'));
				?>

			</section>
		</div>
	</div>
	
	<div class="fake-footer">

		<?php
			echo $this->html->image('banco-adional.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco Dados Bancários','id'=>'add-area-dadosbanc','class'=>'bt-direita'));
			echo $this->html->image('botao-remove.png',array('alt'=>'Adicionar','title'=>'Remover Bloco Dados Bancários','id'=>'remove-area-dadosbanc','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<!--<section class="areaCliente">-->
<section><!---section Baixo--->	

	<header class="">Dados do Crédito</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Dadoscredito.0.limite',array('label' => 'Limite de Crédito<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-medio obrigatorio dinheiro_duasCasas','tabindex'=>'25'));
			echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('Dadoscredito.0.validade_limite',array('label' => 'Validade do Limite<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno obrigatorio forma-data','tabindex'=>'26'));
			echo '<span id="validaValidade1" class="Msg-tooltipDireita" style="display:none">Preencha a Validade</span>';
			echo '<span id="validaValidade2" class="Msg-tooltipDireita" style="display:none">Nao é possivel selecionar data passada</span>';
			echo '<span id="validaValidade3" class="Msg-tooltipDireita" style="display:none">Preencha corretamente a data</span>';
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('bloqueado',array('label' => 'Bloqueado<span class="campo-obrigatorio">*</span>:','options'=>array('Não' => 'Não', 'Sim' => 'Sim'),'type' => 'select','class' => 'obrigatorio','tabindex'=>'27'));
			echo '<span id="validaBloqueado" class="Msg-tooltipDireita" style="display:none">Selecione se Bloqueado</span>';
		?>

	</section>
</section>	

<footer>

    <?php
	if(!isset($modal)){	
	    echo $this->Form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro'));
	}else{
	    echo $this->Form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiroModal'));
	}
		
		
		echo $this->Form->end();
    ?>

</footer>
