$(document).ready(function(){
	$(".loginEntrar").click(function(){
		$("input[type=submit]").trigger("click");
	});

	/* FADEOUT DA MENSAGEM DE ERRO DE LOGIN ***************************/
    $('#flashMessage').fadeOut(6000);
    
    /* HABILITAR ENTER PARA ENTRAR ************************************/
    $("#UserUsername,#UserPassword").on("keypress",function(event){
		var code = event.keyCode;
		
		if (code == 13){
			$(".loginEntrar").trigger("click");
		}	
	});

});
