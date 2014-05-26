$(document).ready(function(){
  
/**************** COMBOBOX ROLE *****************/
  $(function(){
	$("#add_role").combobox();
  });  
  
/**************** Modal Role *****************/
	
	$('body').on('click', '#ui-id-1 a',function(){
		valorId=$('#add_role :selected').val();
		$('#roleId').val(valorId);
    });
	
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
    
});
