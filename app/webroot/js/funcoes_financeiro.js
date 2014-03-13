$(document).ready(function() {
	
	
/***Input text com datePicker Para datas no estilo " De X a Z**/	
	$(".inputSearchData input[id*='between']").before("<span>a</span>");
	
	$(".inputSearchData input[type='text']").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		nextText: 'Próximo',
		prevText: 'Anterior'
	});
	
/***Input Search Para valores**********/
	$(".inputSearchValor input[id*='between']").before("<span>a</span>");
	$(".inputSearchValor input[type='text']").priceFormat({
		prefix: '',
		centsSeparator: ',',
		thousandsSeparator: '',
		centsLimit: 5
	});
	
	
});
