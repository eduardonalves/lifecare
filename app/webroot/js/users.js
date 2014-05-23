$(document).ready(function(){

/**************** COMBOBOX FUNCIORNARIO *****************/	
  $(function(){
	$("#add_funcionario").combobox();
  });  
  
/**************** COMBOBOX ROLE *****************/	
  $(function(){
	$("#add_role").combobox();
  });  
  
/**************** Modal Funcionario *****************/
    $('body').on('click', '#ui-id-1 a',function(){
		valorCad= $(this).text();
		valorId=$('#add_funcionario :selected').val();
		if(valorCad=="Cadastrar"){
			$(".autocompleteFuncionario input").val('');
			$("#myModal_add-parceiroFuncionario").modal('show');
		}else{
			$('#funcionarioId').val(valorId);
		}
    });

	
});
