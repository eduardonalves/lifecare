$(document).ready(function(){
	
//MARCAR E DESMARCAR TODOS
    $('#checkTodos').click(function(event) {  //on click 
        if(this.checked){ // check select status
            $('.checkUno').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
                $('.acaoPedir').show();
            });
        }else{
            $('.checkUno').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                $('.acaoPedir').hide();
            });         
        }
    });

//MOSTRAR BOTÕES QUANDO ALGUMA CHECKBOX É SELECIONADA
	$('.checkUno').click(function(event){
		var flag = 0;
		$('.checkUno').each(function() { 
			 if(this.checked){
				 flag++;
			 }
        });
        if(flag!=0){
			$('.acaoPedir').show();
		}else{
			 $('.acaoPedir').hide();
		}
	});
	
//MUDAR ACTION E SUBMITA OS VALORES
	$('#pedir').click(function(){
		$('#listaIndexForm').attr('action','Pedidos/addDash');
		var ok = confirm("Gostaria de Fazer o Pedido dos Produtos Selecionados?");
		if(ok == true){
			selecionados();
			if(no<990){
				$('#listaIndexForm input[type="hidden"]').remove();
				$('#listaIndexForm').submit();
			}else{
				alert("Não é possível fazer um Pedido com mais 990 produtos!");
			}
		}
	});
	
	$('#cotar').click(function(){
		$('#listaIndexForm').attr('action','Cotacaos/addDash');
		var ok = confirm("Gostaria de Fazer a Cotação dos Produtos Selecionados?");
		if(ok == true){
			selecionados();
			if(no<990){
				$('#listaIndexForm input[type="hidden"]').remove();
				$('#listaIndexForm').submit();
			}else{
				alert("Não é possível fazer uma Cotação com mais 990 produtos!");
			}
		}
	});

//VERIFICAR CHECKADOS
var no = 0;
	function selecionados(){
		  $('.checkUno').each(function(event) { //loop through each checkbox
               if(this.checked){//select all checkboxes with class "checkbox1"               
					no++;
					$(this).attr('id',$(this).attr('id')+'_');
				}else{
					$(this).attr('disabled','disabled');
				}
            });
	}
	

});
