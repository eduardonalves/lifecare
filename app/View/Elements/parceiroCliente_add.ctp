<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}

	$this->start('css');
	    echo $this->Html->css('modal_ParceiroCliente');
	    echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_parceiro.js');
	$this->end();

?>


<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js"></script>
<script>
	window.onload = function(){
	  new dgCidadesEstados({
		estado: document.getElementById('Endereco0Uf'),
		cidade: document.getElementById('Endereco0Cidade')
	  });
	}
	
	
$(document).ready(function(){
	var contadorBlocoEndereco = 1;
	var contadorBlocoDadosBanc = 1;
	
	$('#bt-salvarParceiro').click(function(event){
	    event.preventDefault();

	    if($('#ParceirodenegocioTelefone1').val() == ''){
			$('#ParceirodenegocioTelefone1').addClass('shadow-vermelho');
			$('#validaTelefone').css('display','block');
			$('.modal-body').animate({scrollTop:0}, 'slow');
			return false;
	    }else if($('#ParceirodenegocioNome').val() == ''){
			$('#ParceirodenegocioNome').addClass('shadow-vermelho');
			$('#validaNome').css('display','block');
			$('.modal-body').animate({scrollTop:0}, 'slow');
	    }else if(($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
			$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
			$('#validaCPFTamanho').css('display','block');
			$('.modal-body').animate({scrollTop:0}, 'slow');
	    }else if($('#ParceirodenegocioCpfCnpj').val() == ''){
		$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
		$('#validaCPF').css('display','block');
		$('.modal-body').animate({scrollTop:0}, 'slow');
	    }else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').val() == ''){
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Logradouro').addClass('shadow-vermelho');
		$('#valida'+ (contadorBlocoEndereco-1) +'Logradouro').css('display','block');
	    }else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Uf').val() == 0){
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Uf').addClass('shadow-vermelho');
		$('#valida'+ (contadorBlocoEndereco-1) +'Uf').css('display','block');
	    }else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Cidade').val() == ''){
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Cidade').addClass('shadow-vermelho');
		$('#valida'+ (contadorBlocoEndereco-1) +'Cidade').css('display','block');
	    }else if($('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').val() == ''){
		$('#Endereco'+ (contadorBlocoEndereco-1) +'Bairro').addClass('shadow-vermelho');
		$('#valida'+ (contadorBlocoEndereco-1) +'Bairro').css('display','block');

	    }else if(($('#Dadoscredito0Limite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
		$('#Dadoscredito0Limite').addClass('shadow-vermelho');
		$('#validaLimite').css('display','block');
		
	    }else if(($('#Dadoscredito0ValidadeLimite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
		$('#Dadoscredito0ValidadeLimite').addClass('shadow-vermelho');
		$('#validaValidade').css('display','block');
		
	    }else if(($('#Dadoscredito0Bloqueado').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
		$('#Dadoscredito0Bloqueado').addClass('shadow-vermelho');
		$('#validaBloqueado').css('display','block');
		
	    }else{
		//$(".loaderAjaxCParceiroDIV").show();
		//$("#bt-salvarParceiro").hide();

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
				    $("#bt-salvarParceiro").show();
				   // $("#spanMsgCateNomeInvalido").css("display","block");
				    //$('#ParceirodenegocioNome').addClass('shadow-vermelho');
				}else{
				    $("#myModal_add-parceiroCliente").modal('hide');
				    $('#ContasreceberParceirodenegocioId').val(data.Parceirodenegocio.id);
				    $('#ContasreceberParceiro').val(data.Parceirodenegocio.nome);
				    $('#ContasreceberCpfCnpj').val(data.Parceirodenegocio.cpf_cnpj);
				    $("#ParceirodenegocioNome").val("");
				    $(".loaderAjaxCParceiroDIV").hide();
				    $("#bt-salvarParceiro").show();
				    $("#add-cliente").append("<option value='"+data.Parceirodenegocio.id+"' class='"+data.Parceirodenegocio.cpf_cnpj+"' id='"+data.Parceirodenegocio.nome+"' rel='CLIENTE'>"+data.Parceirodenegocio.nome+"</option>");						
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
	<h1>Cadastrar Cliente</h1>
</header>

<?php echo $this->Form->create('Parceirodenegocio',array('id' => 'ParceirodenegocioAddFormModal')); ?>


<section> <!---section superior--->
	<header>Dados Gerais do Cliente</header>

	<section class="coluna-esquerda">

		<?php


			echo $this->Form->input('tipo',array('value'=>'CLIENTE','type' => 'hidden'));
			echo '<span id="validaClassificacao" class="Msg-tooltipDireita" style="display:none">Selecione a Classificação</span>';
			echo $this->Form->input('Contato.0.telefone1',array('class' => 'tamanho-medio obrigatorio tel','label' => 'Telefone 1<span class="campo-obrigatorio">*</span>:', 'id' => 'ParceirodenegocioTelefone1'));
			echo '<span id="validaTelefone" class="Msg-tooltipDireita" style="display:none">Preencha o Telefone</span>';
			echo $this->Form->input('Contato.0.fax',array('class' => 'tamanho-medio tel','label' => 'Fax:'));
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('class' => 'tamanho-medio obrigatorio','label' => 'Nome<span class="campo-obrigatorio">*</span>:','required'=>'false'));
			echo '<span id="validaNome" class="Msg-tooltipDireita" style="display:none">Preencha o Nome</span>';
			echo $this->Form->input('Contato.0.telefone2',array('class' => 'tamanho-medio tel','label' => 'Telefone 2:', 'id' => 'ParceirodenegocioTelefone2'));
			echo $this->Form->input('Contato.0.email',array('class' => 'tamanho-medio','label' => 'Email:'));
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('type'=>'text','class' => 'tamanho-medio','style'=>'background:#EBEAFC;','disabled'=>'disabled','label'=>'', 'div' => array('class' => 'input text divCpfCnpj')));
			echo "<div id='idcpf'><input id='inputcpf' type='radio'   name='CPFCNPJ' value='cpf'><label class='label-cpf'>CPF /</label></div>	 
				  <div id='idcnpj'><input id='inputcnpj' type='radio' name='CPFCNPJ' value='cnpj'><label class='label-cnpj'>CNPJ<span class='campo-obrigatorio'>*</span>:</label></div>";
			echo '<span id="validaCPF" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ</span>';
			echo '<span id="validaCPFTamanho" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ Corretamente</span>';
			echo $this->Form->input('Contato.0.telefone3',array('class' => 'tamanho-medio tel','label' => 'Celular:'));
		?>

	</section>
</section><!---Fim section superior--->

<section class="ajusteAlignSection"> <!---section MEIO--->
	
	<header class="">Endereços</header>

	<div class="area-endereco"> 
		<div class="bloco-area">
			
			<section class="coluna-esquerda">

				<?php	
					/*Corrigir Campo*/ echo $this->Form->input('tipo',array('label' => 'Tipo:','type' => 'select','disabled' => 'true','options'=>array('Principal'),'div' =>array( 'class' => 'input select')));
					echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'select','class' => 'estado obrigatorio','div' => array('class' => 'inputCliente input text divUf')));
					echo '<span id="valida0Uf" class="Msg-tooltipDireita" style="display:none">Selecione o Estado</span>';
					echo $this->Form->input('Endereco.0.ponto_referencia', array('label'=>'Ponto de Referência:','type' => 'textarea'));
				?>

			</section>
		
			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio'));
					echo '<span id="valida0Logradouro" class="Msg-tooltipDireita" style="display:none">Preencha o Logradouro</span>';
					echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'select','class' => 'cidade obrigatorio'));
					echo '<span id="valida0Cidade" class="Msg-tooltipDireita" style="display:none">Selecione o Cidade</span>';
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Endereco.0.bairro', array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio obrigatorio'));
					echo '<span id="valida0Bairro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Bairro</span>';
				?>

			</section>
		</div>	
	</div>

	<div class="fake-footer">

		<?php
			echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco de Endereços','id'=>'add-area-endereco','class'=>'bt-direita'));
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
					echo $this->Form->input('Dadosbancario.0.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.0.numero_agencia',array('label' => 'Número da Agência:','class' => 'tamanho-pequeno agencia'));
					echo $this->Form->input('Dadosbancario.0.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.0.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.0.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','id' => 'DadosbancarioConta0'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.0.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.0.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-medio tel'));
				?>

			</section>
		</div>
	</div>
	
	<div class="fake-footer">

		<?php
			echo $this->html->image('botao-add2.png',array('alt'=>'Adicionar','title'=>'Adicionar Bloco Dados Bancários','id'=>'add-area-dadosbanc','class'=>'bt-direita'));
			echo $this->html->image('botao-remove.png',array('alt'=>'Adicionar','title'=>'Remover Bloco Dados Bancários','id'=>'remove-area-dadosbanc','class'=>'bt-direita'));
		?>

	</div>
</section><!--fim Meio-->

<section> <!---section Baixo--->	

	<header class="">Dados do Crédito</header>

	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Dadoscredito.0.limite',array('label' => 'Limite de Crédito<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-medio obrigatorio dinheiro'));
			echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('Dadoscredito.0.validade_limite',array('label' => 'Validade do Limite<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno obrigatorio forma-data'));
			echo '<span id="validaValidade1" class="Msg-tooltipDireita" style="display:none">Preencha a Validade</span>';
			echo '<span id="validaValidade2" class="Msg-tooltipDireita" style="display:none">Nao é possivel selecionar data passada</span>';
			echo '<span id="validaValidade3" class="Msg-tooltipDireita" style="display:none">Preencha corretamente a data</span>';
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('bloqueado',array('label' => 'Bloqueado<span class="campo-obrigatorio">*</span>:','options'=>array('Não' => 'Não', 'Sim' => 'Sim'),'type' => 'select','class' => 'obrigatorio'));
			echo '<span id="validaBloqueado" class="Msg-tooltipDireita" style="display:none">Selecione se Bloqueado</span>';
		?>

	</section>
</section>	

<footer>

    <?php
		echo $this->Form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro','controller' =>'Parceirodenegocio','action' => 'add','view' => 'add'));
		echo $this->Form->end();
    ?>

</footer>
