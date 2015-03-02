$(document).ready(function(){

	//DATA
	/** Placeholder Data **************************************************/

	$('.inputData').attr('placeholder','dd/mm/aaaa');
	$('.inputData').mask('99/99/9999');
	$(".inputCep").mask("00000-000");
	$(".cnpj").mask("99.999.999/9999-99");
	$(".uf").mask("SS");
	$(".ieMask").mask("999.999.999.999");
	$(".dinheiro_duasCasas").priceFormat({
	    prefix: '',
	    centsSeparator: ',',
	    thousandsSeparator: '.',
	    limit: 15
	});

	$('.inputData').on("keypress",function(event){
		var charCode = event.keyCode || event.which;

	    if (!((charCode > 47) && (charCode < 58) || (charCode == 8) || (charCode == 9))){return false;} else {return true}
    });
    
    $(".inputData").focusout(function(){
		var elemento = $(this).val();

		var dia = elemento.substring(0,2);
		var mes = elemento.substring(3,5);
		var ano = elemento.substring(6,11);

		if(ano.length == 1){
			$(this).val().slice(0,-1);
			$(this).val(dia +"/"+ mes +"/200"+ ano);
		}
		
		if(ano.length == 2){
			$(this).val().slice(0,-2);
			$(this).val(dia +"/"+ mes +"/20"+ ano);
		}
		
		if(ano.length == 3){
			$(this).val().slice(0,-3);
			$(this).val(dia +"/"+ mes +"/2"+ ano);
		}

		if(dia > 31){
			$(this).val("");
		}
		
		if(mes > 12){
			$(this).val("");
		}
		
		if((dia > 29) && (mes == 2)){
			$(this).val("");
		}
	});
	

	//LIMPA MENSAGEM
	$('body').on('click','.msgValidaModal',function(){
		$(this).hide();
	});

	$('body').on('change','input',function(){
		$('.msgValidaModal').hide();
	});

	//MASCARAS
	$(".peso").mask('000.00');
	
	var valida_flag = 0;
	var caixas = 0;
	var novas = 0;
	function habilitaRemover(){
		if(novas > 0){
			i = 0;			
			$('.remove-transp').each(function(){				
				i++;
				if(i == novas){
					$(this).show();
				}else{
					$(this).hide();
				}
			});
		}
	}
	$('#adicionar-transp').click(function(){
		$('.valida').each(function(){
			if($(this).val() == ''){
				$(this).addClass('shadow-vermelho');
			}else{
				valida_flag++;
			}
		});
		if(valida_flag == 6){
			nota_id = $("#input-nota_id").val();
			qvol = $("#input-qvol").val();
			pesol = $("#input-pesol").val();
			pesob = $("#input-pesob").val();
			esp = $("#input-esp").val();
			nVol = $("#input-nVol").val();
			lacres = $("#input-lacres").val();
			caixas = $(".caixa-volume").length;
		
			//APPEND NA TELA
			$('#caixas-tranps').append('<fieldset class="caixa-volume novas" id="nova'+caixas+'"><legend>Volume '+(caixas+1)+'<span class="remove-transp">X</span></legend><article class="span1 label-volume"><span>Qtd. Vol:</span><span>Peso Liq.:</span><span>Peso Bru.:</span><span>Espécie:</span><span>Nº Vol.:</span><span>Lacre:</span></article><article class="span2 valor-volume"><p>'+qvol +'</p><p>'+pesol +'</p><p>'+pesob+'</p><p>'+esp+'</p><p>'+nVol+'</p><p>'+lacres+'</p></article></fieldset>');
			
			//APPEND NAS INPUTS
			$('#hidden-tranps').append('\
				<section id="hidden-caixa'+caixas+'">\
				<input name="data[Transp]['+caixas+'][qvol]" value="'+qvol+'" id="SaidaId" type="hidden">\
				<input name="data[Transp]['+caixas+'][nota_id]" value="'+nota_id+'" id="SaidaId" type="hidden">\
				<input name="data[Transp]['+caixas+'][pesol]" value="'+pesol+'" id="SaidaId" type="hidden">\
				<input name="data[Transp]['+caixas+'][pesob]" value="'+pesob+'" id="SaidaId" type="hidden">\
				<input name="data[Transp]['+caixas+'][esp]" value="'+esp+'" id="SaidaId" type="hidden">\
				<input name="data[Transp]['+caixas+'][nVol]" value="'+nVol+'" id="SaidaId" type="hidden">\
				<input name="data[Transp]['+caixas+'][lacres]" value="'+lacres+'" id="SaidaId" type="hidden">\
				</section>\
			');
			$("#input-qvol").val('').removeClass('shadow-vermelho').removeAttr('required');
			$("#input-pesol").val('').removeClass('shadow-vermelho').removeAttr('required');
			$("#input-pesob").val('').removeClass('shadow-vermelho').removeAttr('required');
			$("#input-esp").val('').removeClass('shadow-vermelho').removeAttr('required');
			$("#input-nVol").val('').removeClass('shadow-vermelho').removeAttr('required');
			$("#input-lacres").val('').removeClass('shadow-vermelho').removeAttr('required');
			$('#myModal_add-itensTransporte').modal('hide');
			valida_flag = 0;
			novas++;
			habilitaRemover();
		}else{
			$('#msgCamposObrTransp').show();
		}
	});	
	$('body').on('click','.remove-transp',function(){
		$('#nova'+caixas).remove();
		$('#hidden-caixa'+caixas).remove();		
		novas--;
		caixas--;
		habilitaRemover();
	});


	//ADD NOVAS DUPLICATAS
	var valida_dupli_flag = 0;
	var caixas_dup = 0;
	var novas_dup = 0;
	function habilitaRemoverDup(){
		if(novas_dup > 0){
			i = 0;			
			$('.remove-duplicata').each(function(){				
				i++;
				if(i == novas_dup){
					$(this).show();
				}else{
					$(this).hide();
				}
			});
		}
	}
	$('#adicionar-duplicata').click(function(){
		$('.validaDupli').each(function(){
			if($(this).val() == ''){
				$(this).addClass('shadow-vermelho');
			}else{
				valida_dupli_flag++;
			}
		});
		if(valida_dupli_flag == 3){
			nota_id = $("#input-nota_id").val();
			ndup = $("#input-ndup").val();
			dvenc = $("#input-dvenc").val();
			vdup = $("#input-vdup").val();
			
			caixas_dup = $(".caixa-duplicata").length;
		
			//APPEND NA TELA
			$('#caixas-duplicatas').append('\
				<fieldset class="caixa-duplicata novas_dup" id="nova_dup'+caixas_dup+'">\
					<legend>Volume '+(caixas_dup+1)+'<span class="remove-duplicata">X</span></legend>\
					<article class="span1 label-duplicata">\
						<span>Nº Dupli.:</span>\
						<span>Data Venc.:</span>\
						<span>Valor (R$):</span>\
					</article>\
					<article class="span2 valor-duplicata">\
						<p>'+ndup +'</p>\
						<p>'+dvenc +'</p>\
						<p>'+vdup+'</p>\
					</article>\
				</fieldset>');
			
			//APPEND NAS INPUTS
			$('#hidden-duplis').append('\
				<section id="hidden-caixa_dup'+ caixas_dup+'">\
					<input name="data[Duplicata]['+caixas_dup+'][ndup]" value="'+ndup+'" type="hidden">\
					<input name="data[Duplicata]['+caixas_dup+'][nota_id]" value="'+nota_id+'" type="hidden">\
					<input name="data[Duplicata]['+caixas_dup+'][dvenc]" value="'+dvenc+'" type="hidden">\
					<input name="data[Duplicata]['+caixas_dup+'][vdup]" value="'+vdup+'" type="hidden">\
				</section>\
			');
			$("#input-ndup").val('').removeClass('shadow-vermelho').removeAttr('required');
			$("#input-dvenc").val('').removeClass('shadow-vermelho').removeAttr('required');
			$("#input-vdup").val('').removeClass('shadow-vermelho').removeAttr('required');
			$('#myModal_add-notaDuplicata').modal('hide');
			valida_dupli_flag = 0;
			novas_dup++;
			habilitaRemoverDup();
		}else{
			$('#msgCamposObrDuplicata').show();
		}
	});	
	$('body').on('click','.remove-duplicata',function(){
		$('#nova_dup'+caixas_dup).remove();
		$('#hidden-caixa_dup'+caixas_dup).remove();		
		novas_dup--;
		caixas_dup--;
		habilitaRemoverDup();
	});
	

	//CADASTRAR TRANSPORTADORA
	$('body').on('click', '#ui-id-1 a',function(){
		valorCad= $(this).text();
		
		if(valorCad=="Cadastrar"){
			$(".autocompleteTransportadoras input").val('');
			$("#myModal_add-transportadora").modal('show');
			$('.validaTransp').val('');
		}
    });

    $(function() {
		$( "#add-transportadora" ).combobox();
    });


	function setDefault(defValue,seletor) {
	  $(seletor).each(function () {
	    if (($(this).attr('value')) === defValue) {
	        $(this).attr('selected', 'selected');
	    }
	  });
	}
    setDefault($('#auxId').val(),'#add-transportadora option');
    setDefault($('#tpEmisHide').val(),'#auxTpEmis option');
	setDefault($('#tpImpHide').val(),'#auxTpImp option');
	setDefault($('#finNfeHide').val(),'#auxFinNfe option');
	setDefault($('#natopIdHide').val(),'#auxNatopId option');
	setDefault($('#cufidHide').val(),'#auxcufid option');	
	setDefault($('#indpagHide').val(),'#auxindpag option');	
	
	if($('#modFrete option:selected').val() == 1){
			$('#freteProprio').val(1);
		}else if($('#modFrete option:selected').val() == 0){
			$('#freteProprio').val(0);
		}

	$('#modFrete').change(function(){
		if($('#modFrete option:selected').val() == 1){
			$('#freteProprio').val(1);
		}else if($('#modFrete option:selected').val() == 0){
			$('#freteProprio').val(0);
		}
	});



    //CODIGO MUNICIPA
     function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável com valor do campo "cep".
                var cep = $(this).val();

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{5}-?[0-9]{3}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        //$("#rua").val("...")
                        //$("#bairro").val("...")
                        //$("#cidade").val("...")
                        //$("#uf").val("...")
                        $("#ibge").val("...")

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                //$("#rua").val(dados.logradouro);
                                //$("#bairro").val(dados.bairro);
                                //$("#cidade").val(dados.localidade);
                                //$("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                //alert("CEP não encontrado.");
                                $().show();
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
		
		var flagNota = 0;
		$('#subimitar').click(function(){
			$('.validaNota').each(function(){
				if($(this).val() != ''){
					flagNota++;
					
				}else{
					flagNota--;
					$(this).addClass('shadow-vermelho');
				}
			});
			if(flagNota > 16){
				$('#formularioNota').submit();
				flagNota = 0;
			}else{
				$('#msgCamposTotal').show();
				//alert('Todos os campos são obrigatórios.');
			}
		
		});


	//ADICIONAR TRANSPORTADORA
	var flagTransportadora = 0;
	$('#salvarTransportadora').click(function(){
		$('.validaTransp').each(function(){
			if($(this).val() == ''){
				flagTransportadora++;
				$(this).addClass('shadow-vermelho');
			}
		});
		if(flagTransportadora > 0){
			$('#msgCamposObrTransportadora').show();
			flagTransportadora = 0;
		}else{
			
			var $formData =  $('#formTransportadora').serializeArray();
			
			$.ajax({
				url: $('#formTransportadora').attr('action'),
				type: 'POST',
				data: $formData,
				dataType: 'json',
				success: function (data) {

					if (data.insertId !== false){
					
						$("#add-transportadora").append('<option value="'+ data.insertId +'">'+ data.text +'</option>');
												$("#myModal_add-transportadora").modal('hide');

					}else{
						
						alert('Erro ao cadastrar transportador. Tente novamente');

					}

				}

			})
			.fail(function( jqXHR, textStatus ) {  alert( "Request failed: " + textStatus );});

			flagNota = 0;
		}
	
	});
	



});		
