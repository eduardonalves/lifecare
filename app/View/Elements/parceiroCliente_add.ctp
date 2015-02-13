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
		}/*else if($('#ParceirodenegocioCpfCnpj').val() == ''){
			$('#ParceirodenegocioCpfCnpj').addClass('shadow-vermelho');
			$('#validaCPF').css('display','block');
			return false;
		}*/else if(($('#ParceirodenegocioCpfCnpj').val().length != 14) && ($('#ParceirodenegocioCpfCnpj').val().length != 18)){
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
		}else if(($('#Dadoscredito0Limite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
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
		}else if(($('#Dadoscredito0ValidadeLimite').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
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
		}else if(($('#ParceirodenegociosBloqueado').val() == '') && ($('#ParceirodenegocioClassificacao').val() == 'CLIENTE')){
			$('#ParceirodenegociosBloqueado').addClass('shadow-vermelho');
			$('#validaBloqueado').css('display','block');
			return false;
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
				    $('#ParceirodenegocioClassificacao').removeAttr('disabled',true)
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

    $('#ParceirodenegocioClassificacao').attr('disabled',true).val('CLIENTE');
    $('.areaCliente').show();

});	
</script>


<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	<h1>Cadastrar Cliente</h1>
</header>

<?php echo $this->Form->create('Parceirodenegocio',array('id' => 'ParceirodenegocioAddFormModal')); ?>

<?php echo $this->element('parceirodeNegoicos_add'); ?>
