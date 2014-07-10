$(document).ready(function(){
	
	function float2moeda(num){
		x = 0;

		if(num>0){
			num = Math.abs(num);
			x = 1;
		}

		if(isNaN(num)){	num = 0; }

		cents = Math.floor((num*100+0.5)%100); 2,005
		num = Math.floor((num*100+0.5)/100).toString(); 2,005

		if(cents < 10) { cents = "0" + cents; }

		for(var i = 0; i < Math.floor((num.length - (1+i))/3); i++){
			num = num.substring(0,num.length - (4*i+3)) + '.' + num.substring(num.length - (4*i+3));
		}

		ret = num + ',' + cents;		
		if (x == 1){
			return ret;
		}
	}

	$('.valorUnit').focusout(function(){
		id = $(this).attr('id');
		nId = id.substring(9,10);

		itenQtd = $('.itenQtd'+nId).text();
		qtd = parseInt(itenQtd);
		
		valor = $(this).val().split('.').join('').replace(',','.');
		valor = parseFloat(valor);
		
		total = valor*qtd;
		
		$('#valorTotal'+nId).val(float2moeda(total));
	});

	$('.bt-salvar').click(function(event){
		event.preventDefault();
		
		if($('#ComrespostaPrazoEntrega').val() == ''){
			$('#ComrespostaPrazoEntrega').addClass('shadow-vermelho');
			$('#validaPrazo').css('display','block');
		}else if($('#ComrespostaFormaPagamento').val() == ''){
			$('#ComrespostaFormaPagamento').addClass('shadow-vermelho');
			$('#validaForma').css('display','block');
		}else if(!$('.valorUnit').hasClass('preenchido')){
			$('#validaConfirm').css('display','block');
		}else{
			$('#ComrespostaAddForm').submit();
		}
	});

/******** TELA DE CONFIRMACAO   ************/
	$('#confirmaDados').click(function(){
		
		if($('#ComrespostaPrazoEntrega').val() == ''){
			$('#ComrespostaPrazoEntrega').addClass('shadow-vermelho');
			$('#validaPrazo').css('display','block');
		}else if($('#ComrespostaFormaPagamento').val() == ''){
			$('#ComrespostaFormaPagamento').addClass('shadow-vermelho');
			$('#validaForma').css('display','block');
		}else if(!$('.valorUnit').hasClass('preenchido')){
			$('#validaConfirm').css('display','block');				
		}else{
			
			$('#normalInput').hide();
			$('#frmPgto').val($('#normalfrmPgto option:selected').val());
			$('#confirmInput').show();
			
			$('span[id*="msg"').hide();
			$('.confirmaInput').attr('readonly','readonly');
			$('.confirmaInput').attr('onfocus','this.blur();');
			$('.confirmaInput').attr('disabled','disabled');
			$('.confirmaInput').addClass('borderZero');
			$('#confirmaDados').hide();
			$('.confirma').hide();
			$('.bt-salvar').show();
			$('#voltar').show();
		}	
		
	});

	$('#ComrespostaAddForm').submit(function(){	
		$('.confirmaInput').removeAttr('disabled','disabled');
	});

/******** VOLTAR DA CONFIRMACAO   ************/
	$('#voltar').click(function(){
		
		
		$('#confirmInput').hide();
		$('#normalInput').show();
		
		$('span[id*="msg"').hide();
		$('.confirmaInput').removeAttr('readonly','readonly');
		$('.confirmaInput').removeAttr('onfocus','this.blur();');
		$('.confirmaInput').removeAttr('disabled','disabled');
		$('.confirmaInput').removeClass('borderZero');
		$('#ComrespostaValor').attr('readonly','readonly');
		$('#ComrespostaValor').attr('onfocus','this.blur();');
		$('#ComrespostaValor').attr('disabled','disabled');
		$('#ComrespostaValor').addClass('borderZero');
		$('#confirmaDados').show();
		$('.confirma').show();
		$('.bt-salvar').hide();
		$('#voltar').hide();
	});

	
	$("img[id*='botaoConfirm']").click(function(e){
		e.preventDefault();
		var soma = 0;
		var id = $(this).attr('id');
		var lastChar = id.substr(id.length - 1);
		
		if($("#valorUnit"+ lastChar).val() == ''){
			$('#validaValor').css('display','block');
			
			return null;
		}
		
		var novoValor = $("#valorTotal"+ lastChar).val().replace(/\./g, '');
		novoValor = novoValor.replace(/\,/g, '.');
	
		soma = parseFloat(soma) + parseFloat(novoValor);
		
		$('#ComrespostaValor').val(float2moeda(soma));
		
		$("#Comitensresposta"+ lastChar +"Obs").attr('readonly', true);
		$("#Comitensresposta"+ lastChar +"Obs").addClass('borderZero');
		$("#Comitensresposta"+ lastChar +"Fabricante").attr('readonly', true);
		$("#Comitensresposta"+ lastChar +"Fabricante").addClass('borderZero');
		$("#valorUnit"+ lastChar).attr('readonly', true);
		$("#valorUnit"+ lastChar).addClass('borderZero');
		$("#valorUnit"+ lastChar).addClass('preenchido');
		
		$("#botaoConfirm"+ lastChar).hide();
		$("#botaoEdit"+ lastChar).show();
	});
	
	$("img[id*='botaoEdit']").click(function(e){
		e.preventDefault();
		var id = $(this).attr('id');
		var lastChar = id.substr(id.length - 1);
		
		$("#Comitensresposta"+ lastChar +"Obs").attr('readonly', false);
		$("#Comitensresposta"+ lastChar +"Obs").removeClass('borderZero');
		$("#Comitensresposta"+ lastChar +"Fabricante").attr('readonly', false);
		$("#Comitensresposta"+ lastChar +"Fabricante").removeClass('borderZero');
		$("#valorUnit"+ lastChar).attr('readonly', false);
		$("#valorUnit"+ lastChar).removeClass('borderZero');
		$("#valorUnit"+ lastChar).removeClass('preenchido');
		
		$("#botaoConfirm"+ lastChar).show();
		$("#botaoEdit"+ lastChar).hide();
	});

	$("img[id*='botaoRemover']").click(function(){
		var id = $(this).attr('id');
		var lastChar = id.substr(id.length - 1);
		
		$("table tbody tr:nth-child("+ lastChar +")").remove();
	});
});

