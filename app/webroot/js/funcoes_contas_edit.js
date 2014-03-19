$(document).ready(function(){

/**** EDITAR CONTA PARCELA ********************************************/
    
    var numero;
    var parcelaAtual;
    var numeroAnt;
    
    $("body").on("click",'.editarParcela', function(){
	
	//salva valor atual da parcela
	parcelaAtual=$('#idParc').val();
	
	//pega id da linha
	id = $(this).attr('id');
	numero = id.substr(9);
		
	//recebe parcela antiga da linha
	parcelaAnt=$('#idParc'+numero).text();
	identificacaoAnt = $('#docParc'+numero).text();
	dataVencimentoAnt = $('#venciParc'+numero).text();
	valorAnt = $('#valorParc'+numero).text();
	periodocriticoAnt = $('#perioParc'+numero).text();
	descontoAnt = $('#descParc'+numero).text();
	agenciaAnt = $('#agenciaParc'+numero).text();
	contaAnt = $('#contaParc'+numero).text();
	bancoAnt = $('#bancoParc'+numero).text();
	
	//adiciona devolta na input
	$('#ParcelaParcela').val(parcelaAnt);
	$('#ParcelaIdentificacao').val(identificacaoAnt);
	$('#ParcelaDataVencimento').val(dataVencimentoAnt);
	$('#ParcelaValor').val(valorAnt);
	$('#PagarPeriodocritico').val(periodocriticoAnt);
	$('#ParcelaDesconto').val(descontoAnt);
	$('#ParcelaAgencia').val(agenciaAnt);
	$('#ParcelaConta').val(contaAnt);
	$('#ParcelaBanco').val(bancoAnt);

	//troca botoes
	$('#bt-addParcela').hide();
	$('#bt-editarParcela').show();
	
	//remove a borda antes de adicionar
	$('#linhaParc'+numeroAnt).removeClass('shadow-vermelho');
	
	//adicona borda vermelha
	$('#linhaParc'+numero).addClass('shadow-vermelho');
	
	//recebe numero antigo
	numeroAnt= numero;
	
    });
	
});













