$(document).ready(function(){
	
	function float2moeda(num){
		x = 0;
		
		if(num>0){
			num = Math.abs(num);
			x = 1;
		}
		
		if(isNaN(num)){	num = 0; }
		
		cents = Math.floor((num*100+0.5)%100); 2,005
		num = Math.floor((num*100+0.5)/100).toString(); 2,005
		
		if(cents < 10) { cents = "0" + cents; }
		
										
		for(var i = 0; i < Math.floor((num.length - (1+i))/3); i++){
			num = num.substring(0,num.length - (4*i+3)) + '.' + num.substring(num.length - (4*i+3));
		}
		
		ret = num + ',' + cents;		
		if (x == 1){
			 return ret;
		 }
	}
	
	$('.valorUnit').focusout(function(){
			id = $(this).attr('id');
			nId = id.substring(9,10);
	
			itenQtd = $('.itenQtd'+nId).text();
			qtd = parseInt(itenQtd);
			
			valor = $(this).val().split('.').join('').replace(',','.');
			valor = parseFloat(valor);
			
			total = valor*qtd;
			
			$('#valorTotal'+nId).val(float2moeda(total));
			
	});
	
});

