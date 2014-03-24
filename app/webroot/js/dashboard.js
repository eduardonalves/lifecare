$(document).ready(function() {

var receber =  $("#totalPagar").val();
var pagar =  $("#totalReceber").val();

var barData = {
	labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho"],
	datasets : [
		{
			//RECEBER
			fillColor : "#4FE072",
			strokeColor : "#32435A",
			labels: 'CP',
			data : [receber],
			
		},
		
		{
			//Pagar
			fillColor : "#F84148",
			strokeColor : "#32435A",
			data: [pagar],
			
		}
	]	
};

var options = {
    
    scaleFontColor: "#4456ff", //Cor das letras
    scaleLineColor : "rgba(8,5,3,.1)", //cor das linhas
    
	scaleLineWidth : 1, //Espessura das linhas que separam a parte texto das barras
	scaleShowGridLines : true, //Mostra Grid Line
	scaleGridLineColor : "rgba(0,0,0,.05)",	 //String - Cor da grid lines
	
		
	scaleOverlay : false, //Boolean - Se nós mostrarmos a escala acima os dados do gráfico
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

//..................................................................
var pieData = [
	{
		value: 20,
		color:"#878BB6"
	},
	{
		value : 40,
		color : "#4ACAB4"
	},
	{
		value : 10,
		color : "#FF8153"
	},
	{
		value : 30,
		color : "#FFEA88"
	}
];

var pieOptions = {
	segmentShowStroke : false,
	animateScale : true
}

var countries= document.getElementById("countries").getContext("2d");
new Chart(countries).Pie(pieData, pieOptions);

//..................................................................
var buyerData = {
	labels : ["January","February","March","April","May","June"],
	datasets : [
		{
			fillColor : "rgba(172,194,132,0.4)",
			strokeColor : "#ACC26D",
			pointColor : "#fff",
			pointStrokeColor : "#9DB86D",
			data : [203,156,99,251,305,247]
		}
	]
}

 var buyers = document.getElementById('buyers').getContext('2d');
    new Chart(buyers).Line(buyerData);

});
