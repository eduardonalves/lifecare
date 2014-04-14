$(document).ready(function() {
	
/**** RECEBER *********************************************************/
var totalJanReceberP = $("#totalJanReceberP").val();
var	totalFevReceberP = $("#totalFevReceberP").val();
var	totalmarReceberP = $("#totalmarReceberP").val();
var totalabrReceberP = $("#totalabrReceberP").val();
var	totalmaiReceberP = $("#totalmaiReceberP").val();
var totaljunReceberP = $("#totaljunReceberP").val();
var totaljulReceberP = $("#totaljulReceberP").val();
var	totalagoReceberP = $("#totalagoReceberP").val();
var totalsetReceberP = $("#totalsetReceberP").val();
var totaloutReceberP = $("#totaloutReceberP").val();
var totalnovReceberP = $("#totalnovReceberP").val();
var totaldezReceberP = $("#totaldezReceberP").val();

/**** RECEBER *********************************************************/
var totalJanPagarP = $("#totalJanPagarP").val();
var	totalFevPagarP = $("#totalFevPagarP").val();
var	totalmarPagarP = $("#totalmarPagarP").val();
var totalabrPagarP = $("#totalabrPagarP").val();
var	totalmaiPagarP = $("#totalmaiPagarP").val();
var totaljunPagarP = $("#totaljunPagarP").val();
var totaljulPagarP = $("#totaljulPagarP").val();
var	totalagoPagarP = $("#totalagoPagarP").val();
var totalsetPagarP = $("#totalsetPagarP").val();
var totaloutPagarP = $("#totaloutPagarP").val();
var totalnovPagarP = $("#totalnovPagarP").val();
var totaldezPagarP = $("#totaldezPagarP").val();


var barData = {

	labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
	datasets : [
		{
			//RECEBER
			fillColor : "#4FE072",
			strokeColor : "#32435A",
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			data : [totalJanReceberP,totalFevReceberP,totalmarReceberP,totalabrReceberP,totalmaiReceberP,totaljunReceberP,totaljulReceberP,totalagoReceberP,totalsetReceberP,totaloutReceberP,totalnovReceberP,totaldezReceberP],
		title: "Conta Receber"
		},
		
		{
			//Pagar
			fillColor : "#F84148",
			strokeColor : "#32435A",
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			data: [totalJanPagarP,totalFevPagarP,totalmarPagarP,totalabrPagarP,totalmaiPagarP,totaljunPagarP,totaljulPagarP,totalagoPagarP,totalsetPagarP,totaloutPagarP,totalnovPagarP,totaldezPagarP],
		title: "Conta Pagar"
		}
	]	
};

var allopts = {
	//Boolean - If we show the scale above the chart data	  -> Default value Changed
  scaleOverlay : true,
	//Boolean - If we want to override with a hard coded scale
	scaleOverride : false,
	//** Required if scaleOverride is true **
	//Number - The number of steps in a hard coded scale
	scaleSteps : null,
	//Number - The value jump in the hard coded scale
	scaleStepWidth : null,
	//Number - The scale starting value
	scaleStartValue : null,
	//String - Colour of the scale line	
	scaleLineColor : "rgba(0,0,0,.1)",
	//Number - Pixel width of the scale line	
	scaleLineWidth : 1,
	//Boolean - Whether to show labels on the scale	
	scaleShowLabels : false,
	//Interpolated JS string - can access value
	scaleLabel : "<%=value%>",
	//String - Scale label font declaration for the scale label
	scaleFontFamily : "'Arial'",
	//Number - Scale label font size in pixels	
	scaleFontSize : 1,
	//String - Scale label font weight style	
	scaleFontStyle : "normal",
	//String - Scale label font colour	
	scaleFontColor : "#666",	
	///Boolean - Whether grid lines are shown across the chart
	scaleShowGridLines : true,
	//String - Colour of the grid lines
	scaleGridLineColor : "rgba(0,0,0,.05)",
	//Number - Width of the grid lines
	scaleGridLineWidth : 1,	
	//Boolean - Whether the line is curved between points -> Default value Changed 
	bezierCurve : false,
	//Boolean - Whether to show a dot for each point -> Default value Changed
	pointDot : false,
	//Number - Radius of each point dot in pixels
	pointDotRadius : 3,
	//Number - Pixel width of point dot stroke
	pointDotStrokeWidth : 1,
	//Boolean - Whether to show a stroke for datasets
	datasetStroke : true,
	//Number - Pixel width of dataset stroke
	datasetStrokeWidth : 2,
	//Boolean - Whether to fill the dataset with a colour
	datasetFill : true,
	//Boolean - Whether to animate the chart             -> Default value changed
	animation : false,
	//Number - Number of animation steps
	animationSteps : 60,
	//String - Animation easing effect
	animationEasing : "easeOutQuart",
	//Function - Fires when the animation is complete
	onAnimationComplete : null,
  canvasBorders : true,
  canvasBordersWidth : 30,
  canvasBordersColor : "black",
  yAxisLeft : true,
  yAxisRight : true,
  yAxisLabel : "Y axis",
  yAxisFontFamily : "'Arial'",
	yAxisFontSize : 10,
	yAxisFontStyle : "normal",
	yAxisFontColor : "black",
  xAxisLabel : "",
	xAxisFontFamily : "'Arial'",
	xAxisFontSize : 10,
	xAxisFontStyle : "normal",
	xAxisFontColor : "#666",
  yAxisUnit : "UNIT",
	yAxisUnitFontFamily : "'Arial'",
	yAxisUnitFontSize : 7,
	yAxisUnitFontStyle : "normal",
	yAxisUnitFontColor : "#666",
  graphTitle : "",
	graphTitleFontFamily : "'Arial'",
	graphTitleFontSize : 24,
	graphTitleFontStyle : "bold",
	graphTitleFontColor : "#666",
  graphSubTitle : "",
	graphSubTitleFontFamily : "'Arial'",
	graphSubTitleFontSize : 18,
	graphSubTitleFontStyle : "normal",
	graphSubTitleFontColor : "#666",
  footNote : "Footnote",
	footNoteFontFamily : "'Arial'",
	footNoteFontSize : 50,
	footNoteFontStyle : "bold",
	footNoteFontColor : "#666",
  legend : true,
	legendFontFamily : "'Arial'",
	legendFontSize : 7,
	legendFontStyle : "normal",
	legendFontColor : "#666",
  legendBlockSize : 30,
  legendBorders : true,
  legendBordersWidth : 1,
  legendBordersColor : "#666",
  //  ADDED PARAMETERS 
  graphMin : "DEFAULT",
  graphMax : "DEFAULT"
  
  }

    var noopts = {
  nooptions : "",
  yAxisRight : true,
  scaleTickSizeLeft : 0,  
  scaleTickSizeRight : 0,  
  scaleTickSizeBottom : 0,  
  scaleTickSizeTop : 1


  }

    var onlyborderopts = {
  canvasBorders : false,
  canvasBordersWidth : 3,
  canvasBordersColor : "black"
  
  }

var nooptions = { }

var newopts = {
      inGraphDataShow : false, //Ativação do valor em cima das barras
      datasetFill : true,
      scaleLabel: "<%=value%>",
      scaleTickSizeRight : 5,
      scaleTickSizeLeft : 5,
      scaleTickSizeBottom : 10,
      scaleTickSizeTop : 10,
      scaleFontSize : 13,
      canvasBorders : false,
      canvasBordersWidth : 0,
      canvasBordersColor : "black",
      graphTitle : "",
			graphTitleFontFamily : "'Arial'",
			graphTitleFontSize : 10,
			graphTitleFontStyle : "bold",
			graphTitleFontColor : "#666",
      graphSubTitle : "",
			graphSubTitleFontFamily : "'Arial'",
			graphSubTitleFontSize : 18,
			graphSubTitleFontStyle : "normal",
			graphSubTitleFontColor : "#666",
      footNote : "",
			footNoteFontFamily : "'Arial'",
			footNoteFontSize : 8,
			footNoteFontStyle : "bold",
			footNoteFontColor : "#666",
      legend : true,
	    legendFontFamily : "'Arial'",
	    legendFontSize : 12,
	    legendFontStyle : "normal",
	    legendFontColor : "#666",
      legendBlockSize : 15,
      legendBorders : false,
      legendBordersWidth : 1,
      legendBordersColors : "#666",
      yAxisLeft : true,
      yAxisRight : false,
      xAxisBottom : true,
      xAxisTop : false,
      yAxisLabel : "",
			yAxisFontFamily : "'Arial'",
			yAxisFontSize : 7,
			yAxisFontStyle : "normal",
			yAxisFontColor : "#666",
      xAxisLabel : "",
	 	  xAxisFontFamily : "'Arial'",
			xAxisFontSize : 16,
			xAxisFontStyle : "normal",
			xAxisFontColor : "#666",
      yAxisUnit : "",
			yAxisUnitFontFamily : "'Arial'",
			yAxisUnitFontSize : 8,
			yAxisUnitFontStyle : "normal",
			yAxisUnitFontColor : "#666",
      annotateDisplay : true, // Ativação tooltip 
      spaceTop : 0,
      spaceBottom : 0,
      spaceLeft : 0,
      spaceRight : 0,
      logarithmic: false,
//      showYAxisMin : false,
      rotateLabels : "smart",
      xAxisSpaceOver : 0,
      xAxisSpaceUnder : 0,
      xAxisLabelSpaceAfter : 0,
      xAxisLabelSpaceBefore : 0,
      legendBordersSpaceBefore : 0,
      legendBordersSpaceAfter : 0,
      footNoteSpaceBefore : 0,
      footNoteSpaceAfter : 0, 
      startAngle : 0,
      dynamicDisplay : true
}

	setopts=allopts;
    setopts=onlyborderopts;
    setopts=noopts;
    setopts=newopts;
    
var graficoPeriodo = document.getElementById("graficoPeriodo").getContext("2d");
new Chart(graficoPeriodo).Bar(barData, setopts);

});
