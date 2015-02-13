$(document).ready(function() {



var barData = {
	labels : ["January","February","March","April","May","June"],
	datasets : [
		{
			fillColor : "#48A497",
			strokeColor : "#32435A",
			data : [200,300,400,500,600,700],
			
		}
	]	
};

var options = {
    scaleFontColor: "#4456ff", //Cor das letras
    scaleLineColor : "rgba(5,5,3,.1)",
	scaleLineWidth : 1, //Espessura das linhas que separam a parte texto das barras
	scaleShowGridLines : true, //Cor das Letras
	
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
