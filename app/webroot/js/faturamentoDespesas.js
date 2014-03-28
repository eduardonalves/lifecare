$(document).ready(function() {


/**** VARIAVEIS GRAFICO ***********************************************/
	
	var dia = $("#diaEscolha").text();
	var mes = $("#mesEscolha").text(); 
	var ano = $("#anoEscolha").text();
	
	switch(mes){
		
		case "Todos":
		mes = '';
		break;
		
		case "Janeiro":
		mes = "01";
		break;
		
		case "Fevereiro":
		mes = "02";
		break;
		
		case "Março":
		mes = "03";
		break;
		
		case "Abril":
		mes = "04";
		break;
		
		case "Maio":
		mes = "05";
		break;
		
		case "Junho":
		mes = "06";
		break;
		
		case "Julho":
		mes = "07";
		break;
		
		case "Agosto":
		mes = "08";
		break;
		
		case "Setembro":
		mes = "09";
		break;
		
		case "Outubro":
		mes = "10";
		break;
		
		case "Novembro":
		mes = "11";
		break;
		
		case "Dezembro":
		mes = "12";
		break;
	}

/**** DIA ESCOLHA *****************************************************/
	$('#diaEscolha').bind('click',function(){
		$('#loadGrafico').hide();
		$('.mesDiv, .anoDiv').hide();
		$('.diaDiv').show();
		
	});

/**** MES ESCOLHA *****************************************************/
	$('#mesEscolha').bind('click',function(){
		$('#loadGrafico').hide();
		$('.diaDiv, .anoDiv').hide();
		$('.mesDiv').show();
	});

/**** ANO ESCOLHA *****************************************************/
	$('#anoEscolha').bind('click',function(){
		$('#loadGrafico').hide();
		$('.diaDiv, .mesDiv').hide();	
		$('.anoDiv').show();
	});
	
/**** CARREGA DIA *****************************************************/
	$('.carregaDia').bind('click',function(){
		
		$('.diaDiv').hide();		
		$("#income").remove();
		$('.loaderAjaxGrafico').show();
		
		if($(this).text() == "Todos"){	
			dia = '';
		}else{
			dia = $(this).text();
		}
		
		mes = $("#mesEscolha").text();
				
		switch(mes){
		
			case "Todos":
			mes = '';
			break;
			
			case "Janeiro":
			mes = "01";
			break;
			
			case "Fevereiro":
			mes = "02";
			break;
			
			case "Março":
			mes = "03";
			break;
			
			case "Abril":
			mes = "04";
			break;
			
			case "Maio":
			mes = "05";
			break;
			
			case "Junho":
			mes = "06";
			break;
			
			case "Julho":
			mes = "07";
			break;
			
			case "Agosto":
			mes = "08";
			break;
			
			case "Setembro":
			mes = "09";
			break;
			
			case "Outubro":
			mes = "10";
			break;
			
			case "Novembro":
			mes = "11";
			break;
			
			case "Dezembro":
			mes = "12";
			break;
		}
		
		ano = $("#anoEscolha").text();

		$("#loadGrafico").load(urlInicio+'dashboard/loadgrafico?dias='+dia+'&mes='+mes+'&ano='+ano+'', function(){
				$('.loaderAjaxGrafico').hide();
				$('#loadGrafico').show();
		});	
		
		if(dia==''){
			$("#diaEscolha").text("Todos");
		}else{
			$("#diaEscolha").text(dia);
		}	
		
		if(mes==''){
			$("#mesEscolha").text("Todos"); 			 
		}else if(mes=="01"){
			$("#mesEscolha").text("Janeiro");
		}else if(mes=="02"){
			$("#mesEscolha").text("Fevereiro");
		}else if(mes=="03"){
			$("#mesEscolha").text("Março");
		}else if(mes=="04"){
			$("#mesEscolha").text("Abril");
		}else if(mes=="05"){
			$("#mesEscolha").text("Maio");
		}else if(mes=="06"){
			$("#mesEscolha").text("Junho");
		}else if(mes=="07"){
			$("#mesEscolha").text("Julho");
		}else if(mes=="08"){
			$("#mesEscolha").text("Agosto");
		}else if(mes=="09"){
			$("#mesEscolha").text("Setembro");
		}else if(mes=="10"){
			$("#mesEscolha").text("Outubro");
		}else if(mes=="11"){
			$("#mesEscolha").text("Novembro");
		}else if(mes=="12"){
			$("#mesEscolha").text("Dezembro");
		}		
		
		$("#anoEscolha").text(ano);	
	});
	
/**** CARREGA MES *********************************************************/
	$('.carregaMes').bind('click',function(){
		
		$('.mesDiv').hide();
		$("#income").remove();
		$('.loaderAjaxGrafico').show();
				
		mes = $(this).text();
				
		switch(mes){
		
			case "Todos":
			mes = '';
			break;
			
			case "Janeiro":
			mes = "01";
			break;
			
			case "Fevereiro":
			mes = "02";
			break;
			
			case "Março":
			mes = "03";
			break;
			
			case "Abril":
			mes = "04";
			break;
			
			case "Maio":
			mes = "05";
			break;
			
			case "Junho":
			mes = "06";
			break;
			
			case "Julho":
			mes = "07";
			break;
			
			case "Agosto":
			mes = "08";
			break;
			
			case "Setembro":
			mes = "09";
			break;
			
			case "Outubro":
			mes = "10";
			break;
			
			case "Novembro":
			mes = "11";
			break;
			
			case "Dezembro":
			mes = "12";
			break;
		}
		
		if($("#diaEscolha").text() == "Todos"){	
			dia = '';
		}else{
			dia = $("#diaEscolha").text();
		}
				
		ano = $("#anoEscolha").text();
		
		//alert(dia + mes + ano);
				
		$("#loadGrafico").load(urlInicio+'dashboard/loadgrafico?dias='+dia+'&mes='+mes+'&ano='+ano+'', function(){
				$('.loaderAjaxGrafico').hide();
				$('#loadGrafico').show();
		});
		
		if(mes==''){
			$("#mesEscolha").text("Todos"); 			 
		}else if(mes=="01"){
			$("#mesEscolha").text("Janeiro");
		}else if(mes=="02"){
			$("#mesEscolha").text("Fevereiro");
		}else if(mes=="03"){
			$("#mesEscolha").text("Março");
		}else if(mes=="04"){
			$("#mesEscolha").text("Abril");
		}else if(mes=="05"){
			$("#mesEscolha").text("Maio");
		}else if(mes=="06"){
			$("#mesEscolha").text("Junho");
		}else if(mes=="07"){
			$("#mesEscolha").text("Julho");
		}else if(mes=="08"){
			$("#mesEscolha").text("Agosto");
		}else if(mes=="09"){
			$("#mesEscolha").text("Setembro");
		}else if(mes=="10"){
			$("#mesEscolha").text("Outubro");
		}else if(mes=="11"){
			$("#mesEscolha").text("Novembro");
		}else if(mes=="12"){
			$("#mesEscolha").text("Dezembro");
		}		
		
		if(dia==''){
			$("#diaEscolha").text("Todos");
		}else{
			$("#diaEscolha").text(dia);
		}
		
		$("#anoEscolha").text(ano);
	});

/**** CARREGA ANO *********************************************************/
	$('.carregaAno').bind('click',function(){
		$('.anoDiv').hide();
		$("#income").remove();
		$('.loaderAjaxGrafico').show();
		
		if($("#diaEscolha").text() == "Todos"){	
			dia = '';
		}else{
			dia = $("#diaEscolha").text();
		}
		
		mes = $("#mesEscolha").text();
				
		switch(mes){
		
			case "Todos":
			mes = '';
			break;
			
			case "Janeiro":
			mes = "01";
			break;
			
			case "Fevereiro":
			mes = "02";
			break;
			
			case "Março":
			mes = "03";
			break;
			
			case "Abril":
			mes = "04";
			break;
			
			case "Maio":
			mes = "05";
			break;
			
			case "Junho":
			mes = "06";
			break;
			
			case "Julho":
			mes = "07";
			break;
			
			case "Agosto":
			mes = "08";
			break;
			
			case "Setembro":
			mes = "09";
			break;
			
			case "Outubro":
			mes = "10";
			break;
			
			case "Novembro":
			mes = "11";
			break;
			
			case "Dezembro":
			mes = "12";
			break;
		}
		
		ano = $(this).text();
		
		$("#loadGrafico").load(urlInicio+'dashboard/loadgrafico?dias='+dia+'&mes='+mes+'&ano='+ano+'', function(){
				$('.loaderAjaxGrafico').hide();
				$('#loadGrafico').show();
		});	
		
		if(mes==''){
			$("#mesEscolha").text("Todos"); 			 
		}else if(mes=="01"){
			$("#mesEscolha").text("Janeiro");
		}else if(mes=="02"){
			$("#mesEscolha").text("Fevereiro");
		}else if(mes=="03"){
			$("#mesEscolha").text("Março");
		}else if(mes=="04"){
			$("#mesEscolha").text("Abril");
		}else if(mes=="05"){
			$("#mesEscolha").text("Maio");
		}else if(mes=="06"){
			$("#mesEscolha").text("Junho");
		}else if(mes=="07"){
			$("#mesEscolha").text("Julho");
		}else if(mes=="08"){
			$("#mesEscolha").text("Agosto");
		}else if(mes=="09"){
			$("#mesEscolha").text("Setembro");
		}else if(mes=="10"){
			$("#mesEscolha").text("Outubro");
		}else if(mes=="11"){
			$("#mesEscolha").text("Novembro");
		}else if(mes=="12"){
			$("#mesEscolha").text("Dezembro");
		}		
		
		if(dia==''){
			$("#diaEscolha").text("Todos");
		}else{
			$("#diaEscolha").text(dia);
		} 
		$("#anoEscolha").text(ano);	
	});


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
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			data : [totalJanReceber,totalFevReceber,totalmarReceber,totalabrReceber,totalmaiReceber,totaljunReceber,totaljulReceber,totalagoReceber,totalsetReceber,totaloutReceber,totalnovReceber,totaldezReceber],
		title: "Conta Receber "
		},
		
		{
			//Pagar
			fillColor : "#F84148",
			strokeColor : "#32435A",
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			data: [totalJanPagar,totalFevPagar,totalmarPagar,totalabrPagar,totalmaiPagar,totaljunPagar,totaljulPagar,totalagoPagar,totalsetPagar,totaloutPagar,totalnovPagar,totaldezPagar],
		title: "Conta Pagar "
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
      inGraphDataShow : true, //Ativação do valor em cima das barras
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
    setopts=newopts; //tip config
    
var income = document.getElementById("income").getContext("2d");
new Chart(income).Bar(barData, setopts);


});
