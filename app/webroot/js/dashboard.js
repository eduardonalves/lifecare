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
	onAnimationComplete : null, 	//Function - Fires when the animation is complete
	
	stacked: true
};

var income = document.getElementById("income").getContext("2d");
new Chart(income).Bar(barData, options);


});
