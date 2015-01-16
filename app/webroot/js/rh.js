$(document).ready(function() {

 
/********************* Autocomplete Cargos *********************/
    $(function(){
		$("#add-cargo").combobox();
	});

/**************** Modal Parceiro de negocio tipo Fornecedor *****************/
    $('body').on('click', '#ui-id-1 a',function(){
		valorCad= $(this).text();
		if(valorCad=="Cadastrar"){
			$(".autocompleteCargo input").val('');
			//$("#myModal_add-parceiroFornecedor").modal('show');
		}

    });
    
	
/*** Validação de Campos ***********************************************/	
	var saveForm = true;
	$('#salvarFuncionario').click(function(){	
		$('.validacao').remove();	 
		$('.obrigatorio').each(function(){		
			if($(this).val() == ''){
				$(this).addClass('shadow-vermelho');
				$('<span class="validacao">Preencha este Campo!</span>').insertAfter($(this));
				if(saveForm == true){
					saveForm = false;
				}
				return false;
			}
		});				
		if(saveForm == true ){
			$('#formFuncionario').submit();
		}
	});	
	
	$('.obrigatorio').focusout(function(){
		if($(this).val() != ''){
			$('.validacao').remove();
			saveForm = true;
		}
	});


/*** Validação do Email ***********************************************/	
		var emailValido=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		
		$('.testeMail').focusout(function(){
			if(!emailValido.test($(this).val())){
				$(this).addClass('shadow-vermelho');
			}else{
				$(this).removeClass('shadow-vermelho');
			}				
		});	

/*** Mascaras ***********************************************/
	$('.inputData').mask('00/00/0000'); //DATAS
	$(".inputCpf").mask("999.999.999-99");//CPF
	$(".inputTel").mask("(99) 9999-9999");//CPF
	$(".inputCel").mask("(99) 09999-9999");//CPF
	$(".inputCep").mask("00000-000");//CPF
	$(".inputCep").mask("00000-000");//CPF
	$(".inputCarteira").mask("00000000/00000 - SS");//CPF

/*** Validação de Datas ***********************************************/
	
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

	
});
