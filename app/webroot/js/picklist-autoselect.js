/*

Seleciona todos as categorias adicionadas do produto em leftValues
para gravar no BD
*/

$(document).ready( function () {
	
	$(".bt-salvar").on( "click", function() {

		$('#leftValues option').prop('selected', true);
	
	});
	
	//Menu -------------------------------------------
	
	var width = screen.width;

		if(width<1366){
			$("#nav-lateral").css("position","absolute");
		}

		var classMenuNumber = $('h1').attr('class');

		var optionLateral = classMenuNumber[classMenuNumber.length - 1];
		var optionSuperior = classMenuNumber[classMenuNumber.length - 2];

		$(".item").removeClass("selected");
		$("#menu li").removeClass("active");

		$("ul li:nth-child(" + optionLateral + ")").addClass("selected");
		$("#menu li:nth-child(" + optionSuperior + ")").addClass("active");
});
