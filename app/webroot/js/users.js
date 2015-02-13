$(document).ready(function(){
  
/**************** FILTRO CONSULTAS **************/

    $("#quick-filtrar-users").click(function(e){
	e.preventDefault();
	    $('#form-filter-results').submit();
	});


/**************** COMBOBOX ROLE *****************/
  $(function(){
	$("#add_role").combobox();
  });  
  

  
/**************** Modal Role *****************/
	
	$('body').on('click', '#ui-id-1 a',function(){
		valorId=$('#add_role :selected').val();
		$('#roleId').val(valorId);
    });
    

/****** VALIDAÇÂO DO USER ADD ****/
	$('#UserAddForm').submit(function(){
		
		if($('#LoginUser').val() == ''){
			$('#msgLogin').css('display','block');
			$('[id*="LoginUser"]').addClass('shadow-vermelho').focus();
			return false;
		}
		else if($('#senhaUser').val() == ''){
			$('#msgSenha').css('display','block');
			$('[id*="senhaUser"]').addClass('shadow-vermelho').focus();
			return false;
		}
		else if($('#add_role').val() == ''){
			$('#msgRole').css('display','block');
			$('[id*="add_role"]').addClass('shadow-vermelho').focus();
			return false;
		}
		else
			return true;		
	});
	
/****** VALIDAÇÂO DO USER EDIT ****/
	$('#UserEditForm').submit(function(){
		
		if($('#LoginUser').val() == ''){
			$('#msgLogin').css('display','block');
			$('[id*="LoginUser"]').addClass('shadow-vermelho').focus();
			return false;
		}
		else if($('#add_role').val() == ''){
			$('#msgRole').css('display','block');
			$('[id*="add_role"]').addClass('shadow-vermelho').focus();
			return false;
		}
		else
			return true;		
	});
	
/**************** Opcções das selects Em Edit*****************/
    var role = $('#infosUser').attr('data-role');
    var status = $('#infosUser').attr('data-status');
    var acesso = $('#infosUser').attr('data-acesso');

	$('.roleNome option').each(function(){
			if($(this).attr('id') == role){
				$(this).attr("selected","selected");
			}
	});
	
	$('.statusBloq option').each(function(){
			if($(this).val() == status){
				$(this).attr("selected","selected");
			}
	});
    
	$('.acessoUser option').each(function(){
			if($(this).text() == acesso){
				$(this).attr("selected","selected");
			}
	});
});
