$(document).ready(function() {
/**** RECEBER *********************************************************/
var totalJanReceber = $("#totalJanReceber").val();
var	totalFevReceber = $("#totalFevReceber").val();
var	totalmarReceber = $("#totalmarReceber").val();
var totalabrReceber = $("#totalabrReceber").val();
var	totalmaiReceber = $("#totalmaiReceber").val();
var totaljunReceber = $("#totaljunReceber").val();
var totaljulReceber = $("#totaljulReceber").val();
var	totalagoReceber = $("#totalagoReceber").val();
var totalsetReceber = $("#totalsetReceber").val();
var totaloutReceber = $("#totaloutReceber").val();
var totalnovReceber = $("#totalnovReceber").val();
var totaldezReceber = $("#totaldezReceber").val();

/**** RECEBER *********************************************************/
var totalJanPagar = $("#totalJanPagar").val();
var	totalFevPagar = $("#totalFevPagar").val();
var	totalmarPagar = $("#totalmarPagar").val();
var totalabrPagar = $("#totalabrPagar").val();
var	totalmaiPagar = $("#totalmaiPagar").val();
var totaljunPagar = $("#totaljunPagar").val();
var totaljulPagar = $("#totaljulPagar").val();
var	totalagoPagar = $("#totalagoPagar").val();
var totalsetPagar = $("#totalsetPagar").val();
var totaloutPagar = $("#totaloutPagar").val();
var totalnovPagar = $("#totalnovPagar").val();
var totaldezPagar = $("#totaldezPagar").val();


var barData = {

	labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
	datasets : [
		{
			//RECEBER
			fillColor : "#4FE072",
			strokeColor : "#32435A",
			labels: 'CP',
			data : [totalJanReceber,totalFevReceber,totalmarReceber,totalabrReceber,totalmaiReceber,totaljunReceber,totaljulReceber,totalagoReceber,totalsetReceber,totaloutReceber,totalnovReceber,totaldezReceber],

		},
		
		{
			//Pagar
			fillColor : "#F84148",
			strokeColor : "#32435A",
			data: [totalJanPagar,totalFevPagar,totalmarPagar,totalabrPagar,totalmaiPagar,totaljunPagar,totaljulPagar,totalagoPagar,totalsetPagar,totaloutPagar,totalnovPagar,totaldezPagar],
			
		}
	]	
};

var options = {
    
    scaleFontColor: "#4456ff", //Cor das letras
    scaleLineColor : "rgba(8,5,3,.1)", //cor das linhas
    
	scaleLineWidth : 1, //Espessura das linhas que separam a parte texto das barras
	scaleShowGridLines : true, //Mostra Grid Line
	scaleGridLineColor : "rgba(0,0,0,.05)",	 //String - Cor da grid lines
	
		
	scaleOverlay : true, //Boolean - Se nós mostrarmos a escala acima os dados do gráfico
	scaleOverride : false, //Boolean - Se queremos substituir com uma escala codificado
	
	scaleOverride : false, //Boolean - Escala Codificada
	scaleSteps : null, //** Requer scaleOverride: true ** //Número - Numero de Passos para a escala codificada
	
	
	scaleShowLabels : true, //Boolean - Se deve mostrar rótulos na escala
	scaleLabel : "<%=value%>", //interpolada JS string - pode acessar o valor]
	
	
	scaleFontFamily : "'Arial'", //String - Scale label font declaration for the scale label
	scaleFontSize : 10, //Number - Scale label font size in pixels	
	scaleFontStyle : "normal", //String - Scale label font weight style	
	scaleFontColor : "#000",		//String - Scale label font colour	
	
	
	barShowStroke : true, //Boolean - If there is a stroke on each bar		
	barStrokeWidth : 1, //Number - Pixel width of the bar stroke		
	barValueSpacing : 3, //Number - Spacing between each of the X value sets
	barDatasetSpacing : 2, //Number - Spacing between data sets within X values
	
	animation : true,//Boolean - Whether to animate the chart
	animationSteps : 300,//Number - Tempo da Animação
	animationEasing : "easeOutQuart", //String - Animation easing effect
	onAnimationComplete : null 	//Function - Fires when the animation is complete
	
};




var income = document.getElementById("income").getContext("2d");
new Chart(income).Bar(barData, options);


});
