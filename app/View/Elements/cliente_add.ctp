<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_cliente');
	$this->end();
	
?>

<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js"></script>
<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	 <h1>Cadastrar Cliente</h1>
	 
	 
<script>
$(document).ready(function(){
	
	$("#ClienteCpfCnpj").on("keypress",function(event){		
		var charCode = event.keyCode || event.which;
	
		if((charCode==8) || (charCode==9) || (charCode==37) || (charCode==39) || (charCode==46)){return true}
		if (!((charCode>47)&&(charCode<58))){return false;}
	});
	
	$('#inputcpf, #inputcnpj').attr("enabled","enabled");
	$("#ClienteCpfCnpj").mask("99.999.999/9999-99");

	$('#inputcpf, #inputcnpj').click(function(){
		
		$("#ClienteCpfCnpj").val('');
		$("#ClienteCpfCnpj").unmask('#FornecedoreCpfCnpj');
		
		valorCpfCnpj = $(this).attr('id'); 

		if(valorCpfCnpj == 'inputcpf'){
			$("#ClienteCpfCnpj").removeAttr("disabled","disabled");
			$("#ClienteCpfCnpj").css("background-color","#FFFFFF;");
			$("#ClienteCpfCnpj").mask("999.999.999-99");//cpf
		}else{
			$("#ClienteCpfCnpj").removeAttr("disabled","disabled");
			$("#ClienteCpfCnpj").css("background-color","#FFFFFF;");
			$("#ClienteCpfCnpj").mask("99.999.999/9999-99");//cnpj
		}
	});
	
	$(".close").click(function(){
						
			$("input[type=radio]").removeAttr("checked","checked");
						
			$("#ClienteCpfCnpj").attr("disabled","disabled");
			$("#ClienteCpfCnpj").attr("style","background:#EBEAFC;");
			
			$('#myModal_add-cliente input, select, textarea').val('');
			
			$('#myModal_add-cliente input, select, textarea').removeClass('shadow-vermelho');
			
			$('#spanClienteNome').css('display','none');
			$('#spanClienteCPFExistente').css('display','none');
			$('#spanEndereco0Logradouro').css('display','none');
			$('#spanEndereco0Bairro').css('display','none');
			$('#spanEndereco0Uf').css('display','none');
			$('#spanEndereco0Cidade').css('display','none');
			$('#spanContato0Telefone1').css('display','none');
			
	});
	
	$('#ClienteNome, #ClienteCpfCnpj, input').on("change, focusin, focusout, click",function(){
		    if($('#ClienteNome').val() !=''){
			    $('#ClienteNome').removeClass('shadow-vermelho');
			    $('#spanClienteNome').css('display','none');
		    }
		    if($('#ClienteCpfCnpj').val() != ''){	
			    $('#ClienteCpfCnpj').removeClass('shadow-vermelho');
			    $('#spanClienteCPF').css('display','none');
			    $('#spanClienteCPFExistente').css('display','none');
		    }
		    
		    if($('#Endereco0Logradouro').val() !=''){
				$('#Endereco0Logradouro').removeClass('shadow-vermelho');
				$('#spanEndereco0Logradouro').css('display','none');
			
			}
			
			if($('#Endereco0Bairro').val() !=''){
				$('#Endereco0Bairro').removeClass('shadow-vermelho');
				$('#spanEndereco0Bairro').css('display','none');
			}
			if($('#Endereco0Uf').filter(":selected").val() != ''){
				$('#Endereco0Uf').removeClass('shadow-vermelho');
				$('#spanEndereco0Uf').css('display','none');
			}			
			if($('#Endereco0Cidade').filter(":selected").val() !=''){
				$('#Endereco0Cidade').removeClass('shadow-vermelho');
				$('#spanEndereco0Cidade').css('display','none');
			}
			if($('#Contato0Telefone1').val() !=''){
				$('#Contato0Telefone1').removeClass('shadow-vermelho');
				$('#spanContato0Telefone1').css('display','none');
			}
	});


});
window.onload = function() {
  new dgCidadesEstados({
    estado: document.getElementById('Endereco0Uf'),
    cidade: document.getElementById('Endereco0Cidade')
  });
}
</script>	 
	 
</header>

<section>
	<header class="header">Dados do Cliente</header>
	
	<section class="coluna-modal">
	 <div id="cliente-modal">
			
		<?php
			echo $this->Form->create('Cliente'); 
			echo $this->Form->input('Cliente.nome',array('type'=>'text','label'=>'Nome<span class="campo-obrigatorio">*</span>:', 'div' => array('class' => 'input text divNomeCli')));
			echo "<span id='spanClienteNome' class='' style='display:none'>Preencha o campo Nome</span>";
			echo $this->Form->input('Cliente.cpf_cnpj',array('type'=>'text','style'=>'background:#EBEAFC;','disabled'=>'disabled','label'=>'CPF / CPNJ:', 'div' => array('class' => 'input text divCpfCnpj')));
			echo "<span id='spanClienteCPF' class='' style='display:none'>Preencha o campo CPF / CNPJ corretamente</span>";
			
			echo "<span id='spanClienteCPFExistente' class='' style='display:none'>CPF/CNPJ já está Cadastrado</span>";
			echo "<span id='spanClienteTipoDoc' class='' style='display:none'>Selecione o tipo de documento</span>";	
							
			echo "<div id='idcpf'><input id='inputcpf' type='radio'   name='CPFCNPJ' value='cpf'><label class='label-cpf'>CPF /</label></div>	 
				  <div id='idcnpj'><input id='inputcnpj' type='radio' name='CPFCNPJ' value='cnpj'><label class='label-cnpj'>CNPJ<span class='campo-obrigatorio'>*</span>:</label></div>";	
			echo $this->Form->input('Cliente.tipo',array('type'=>'hidden','value'=>'CLIENTE'));	
			
			echo $this->Form->input('Endereco.0.logradouro', array('label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','div' => array('class' => 'inputCliente input text divLogradouro')));
			echo "<span id='spanEndereco0Logradouro' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha o campo Logradouro</span>";	
			echo $this->Form->input('Endereco.0.complemento', array('label'=>'Complemento:','div' => array('class' => 'inputCliente input text divComplemento')));
			
			
			echo $this->Form->input('Endereco.0.bairro', array('label'=>'Bairro<span class="campo-obrigatorio">*</span>:','div' => array('class' => 'inputCliente input text divBairro')));
			echo "<span id='spanEndereco0Bairro' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha o campo bairro</span>";	
			
			echo $this->Form->input('Endereco.0.uf', array('label'=>'UF<span class="campo-obrigatorio">*</span>:','div' => array('class' => 'inputCliente input text divUf'), 'type' => 'select'));
			echo "<span id='spanEndereco0Uf' class='Msg tooltipMensagemErroDireta' style='display:none'>Selecione o Estado</span>";	
			
			echo $this->Form->input('Endereco.0.cidade', array('label'=>'Cidade<span class="campo-obrigatorio">*</span>:','div' => array('class' => 'inputCliente input text divCidade'), 'type' => 'select'));
			echo "<span id='spanEndereco0Cidade' class='Msg tooltipMensagemErroDireta' style='display:none'>Selecione a cidade</span>";	
			
			echo $this->Form->input('Contato.0.telefone1', array('label'=>'Telefone<span class="campo-obrigatorio">*</span>:','class'=>'tel','length'=>'11','div' => array('class' => 'inputCliente input text divTelefone1')));
			echo "<span id='spanContato0Telefone1' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha o campo Telefone</span>";
			echo "<span id='spanContato0Telefone2' class='Msg tooltipMensagemErroDireta' style='display:none'>Preencha corretamente o campo Telefone</span>";	
			
			echo $this->Form->input('Endereco.0. ponto_referencia', array('label'=>'Ponto de Referência:','type' => 'textarea','div' => array('class' => 'inputCliente input text divRef')));
			
			echo $this->Form->input('Endereco.0.tipo', array('type' => 'hidden', 'value' => 'PRINCIPAL'));
			
			echo $this->Form->end();
		?>
	 </div>	
	</section>
	
</section>

<footer>
	<div class="loaderAjax">
		<?php
			echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
														 'title'=>'Carregando',
														 'class'=>'ajaxLoader',
														 ));
		?>
		<span>Salvando aguarde...</span>
	</div>
	<?php

		echo $this->form->submit( 'botao-salvar.png',array('class' => 'bt-salvar bt-salvar-Cliente', 'alt' => 'Salvar', 'title' => 'Salvar')); 
	?>			
</footer>

<script>
	$(document).ready(function(){
	
	$('#ClienteNome').removeAttr('required','required');
	
	function ordenarSelectCliente(){
		//var options = $('#add-cliente option');
		//var arr = options.map(function(_, o) { return { t: $(o).text(), v: o.value }; }).get();
		//arr.sort(function(o1, o2) { return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0; });
		//options.each(function(i, o) {
			//o.value = arr[i].v;
			//$(o).text(arr[i].t);
		//});
		
		var cl = document.getElementById('add-cliente');
		var clTexts = new Array();

		for(i = 2; i < cl.length; i++){
			clTexts[i-2] =
				cl.options[i].text.toUpperCase() + "," +
				cl.options[i].text + "," +
				cl.options[i].value;
		}

		clTexts.sort();

		for(i = 2; i < cl.length; i++){
		var parts = clTexts[i-2].split(',');

		cl.options[i].text = parts[1];
		cl.options[i].value = parts[2];
		}		
	}	

    var tamanho_cpf_cnpj = 0;
    var total_cpf_cnpj = 0;
    var ok = 0;

    $('input:radio[name=CPFCNPJ]').click(function(){
		$("#spanClienteTipoDoc").hide();
	});

	$('.bt-salvar-Cliente').click(function(event){

		event.preventDefault();
		
		$('input:radio[name=CPFCNPJ]').each(function() {	                
                if ($(this).is(':checked')){
					ok = $(this).val();
				}

			$("#spanClienteTipoDoc").hide();
		});   
         
        
		t =  $("#ClienteCpfCnpj").val();
		tamanho_cpf_cnpj = t.length;
		
		radioId = $('input:radio[name=CPFCNPJ]:checked').val();
		
		
		if(radioId == 'cpf'){
		    total_cpf_cnpj = 14;
		    //alert(tamanho_cpf_cnpj);
		}else{
		    total_cpf_cnpj = 18;
		    //alert(tamanho_cpf_cnpj);
		}
		
		/*
		if(radioId == 'cnpj'){
				total_cpf_cnpj = 18;
				//alert(tamanho_cpf_cnpj);
		}
		*/
		
		if($('#ClienteNome').val() ==''){
			$('#ClienteNome').addClass('shadow-vermelho');
			$('#spanClienteNome').css('display','block');
							
		}else if(ok == 0){
		   
		    $("#spanClienteTipoDoc").show();
		
		}else if($('#ClienteCpfCnpj').val() == '' || tamanho_cpf_cnpj < total_cpf_cnpj ){	
			$('#ClienteCpfCnpj').addClass('shadow-vermelho');
			$('#spanClienteCPF').css('display','block');
		
		}else if($('#ClienteCpfCnpj').val() ==''){	
			$('#ClienteCpfCnpj').addClass('shadow-vermelho');
			$('#spanClienteCPF').css('display','block');
			
		}else if($('#Endereco0Logradouro').val() ==''){
			$('#Endereco0Logradouro').addClass('shadow-vermelho');
			$('#spanEndereco0Logradouro').css('display','block');
			
		}else if($('#Endereco0Bairro').val() ==''){
			$('#Endereco0Bairro').addClass('shadow-vermelho');
			$('#spanEndereco0Bairro').css('display','block');
			
		}else if($('#Endereco0Uf').val() == ''){
			$('#Endereco0Uf').addClass('shadow-vermelho');
			$('#spanEndereco0Uf').css('display','block');
			
		}else if($('#Endereco0Cidade').val() ==''){
			$('#Endereco0Cidade').addClass('shadow-vermelho');
			$('#spanEndereco0Cidade').css('display','block');
			
		}else if($('#Contato0Telefone1').val() ==''){
			$('#Contato0Telefone1').addClass('shadow-vermelho');
			$('#spanContato0Telefone1').css('display','block');
			
		}else if(($('#Contato0Telefone1').val().length != 15) && ($('#Contato0Telefone1').val().length != 14)){
			$('#Contato0Telefone1').addClass('shadow-vermelho');
			$('#spanContato0Telefone2').css('display','block');
		}else{	
			var urlAction = "<?php echo $this->Html->url(array("controller"=>"clientes","action"=>"add"),true);?>";
			var dadosForm = $("#ClienteIndexForm").serialize();
			$(".loaderAjax").show();
			$(".bt-salvar-Cliente").hide();
		    
		    $.ajax({
				type: "POST",
				url: urlAction,
				data:  dadosForm,
				dataType: 'json',
				success: function(data) {
					console.debug(data);
					
					cpf=data.Cliente.cpf_cnpj;
					
					if(data.Cliente.id == 0){
						$(".loaderAjax").hide();						
						$("#spanClienteCPFExistente").show();
						$(".bt-salvar-Cliente").show();
						
					}else{					
							
						$("#add-cliente").prepend("<option value='"+data.Cliente.id+"' id='"+data.Cliente.nome+"' class='"+data.Cliente.cpf_cnpj+"' rel='Cliente'  >"+data.Cliente.nome+"</option>");
						$("#add-cliente option[value='add-Cliente']").remove();
						$('#add-cliente').prepend('<option value="add-Cliente">Cadastrar</option>');
						//ordenarSelectCliente();
						$("#add-cliente").val(data.Cliente.id);
						$('#SaidaParceiro').val(data.Cliente.nome);
						$('#SaidaParceirodenegocioId').val(data.Cliente.id);
						$('#SaidaCpfCnpj').val(data.Cliente.cpf_cnpj);
						$("#myModal_add-cliente").modal('hide');
						$(".loaderAjax").hide();
						$(".bt-salvar-Cliente").show();
						
						//limpa campos apos salvar
						$('#myModal_add-cliente input:not(#inputcnpj, #inputcpf), textarea, select').val('');
						//$('#ClienteCpfCnpj').val('');
						
						
						
						//desmarca input radio e desabilita o campo cnp/cnpj
						$("input[type=radio]").removeAttr("checked","checked");
						$("#ClienteCpfCnpj").attr("disabled","disabled");
						$("#ClienteCpfCnpj").attr("style","background:#EBEAFC;");
						$('#spanClienteCPF').css('display','none');
						$('#ClienteCpfCnpj').removeClass('shadow-vermelho');
						$('#spanClienteCPF').css('display','none');
						$('#spanClienteCPFExistente').css('display','none');
						ok=0;
						
					}					
				}		
			}); /***FIm AJAX***/
		}/***Fim validaçcao***/
	});
});
    
</script>
