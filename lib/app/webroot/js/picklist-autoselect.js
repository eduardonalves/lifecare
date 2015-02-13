/*

Seleciona todos as categorias adicionadas do produto em leftValues
para gravar no BD
*/

$(document).ready( function () {
	
	$(".bt-salvar").on( "click", function() {

		$('#leftValues option').prop('selected', true);
	
	});
});
