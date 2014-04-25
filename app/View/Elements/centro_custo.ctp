<?php 
	$this->start('css');
		echo $this->Html->css('modal_centro_custo');
		echo $this->Html->css('table');
	$this->end();
?>

<?php 
	if(isset($modal)){
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
?>

<script>
$(document).ready(function(){
	
	$('.selectMes').on('change', function(){
		valor = $(this).val();
		id=  $(this).attr('id');
		numero= id.substr.(10);
		alert(numero);
	});
	
	$('#CentrocustoAddForm').submit(function(event){
			event.preventDefault();
			
			if($('#CentrocustoNome').val() == ""){
				$("#spanValidaNomeCusto").show();
			}else if($('#CentrocustoLimite').val() == ""){
				$("#spanValidaLimiteCusto").show();
			}else{			
				
				var urlAction = "<?php echo $this->Html->url(array("controller"=>"Centrocustos","action"=>"add"),true);?>";
				var dadosForm = $("#CentrocustoAddForm").serialize();
				$("#loaderAjaxCusto").show();
				$("#bt-salvar").hide();
				
				$.ajax({									
						type: "POST",
						url: urlAction,
						data:  dadosForm,
						dataType: 'json',
						success: function(data) {
						console.debug(data);
						
						if(data.Centrocusto.id == 0 || data.Centrocusto.id == undefined ){
							$("#loaderAjaxCusto").hide();
							$("#bt-salvar").show();
						
						}else{  // debug(data);
							$("#myModal_add-centro_custo").modal('hide');
							$('#nomeCusto').val(data.Centrocusto.nome);
							$('#limitecusto').val(data.Centrocusto.limite);
							if($('#TipodecontaTipo').val() == "RECEITA"){
								$('#ContasreceberCentrocustoId').val(data.Centrocusto.id);
							}else{
								$('#ContaspagarCentrocustoId').val(data.Centrocusto.id);							
							}
							$("#CentrocustoNome").val("");
							$("#CentrocustoLimite").val("");
							
						   $("add-centroCusto").append("<option value='"+data.Centrocusto.nome+"'  id='"+data.Centrocusto.id+"'>"+data.Centrocusto.nome+"</option>");						
						   $("#loaderAjaxCusto").hide();
							$("#bt-salvar").show();						   
						}
					}
				});//FIM AJAX
			}
		
	});
});
</script>

<header id="cabecalho">
	
	<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

	<h1>Cadastrar Centro de Custo</h1>
</header>

<section>
	<header>Dados do Centro de Custo</header>

	<section class="coluna-modal">
		<div>
			<div id="loaderAjaxCusto"><?php echo $this->Html->image('ajaxLoaderLifeCare.gif', array('id' => 'ajaxLoader', 'alt' => 'Carregando', 'title' => 'Carregando')); ?> <span style="position: absolute; margin-left: 7px;">Aguarde...</span></div>
			<?php
				echo $this->Form->create('Centrocusto');
				echo $this->Form->input('nome',array('label' => 'Nome Custo<span class="campo-obrigatorio">*</span>:','type'=>'text', 'class' => 'tamanho-medio'));
				echo '<span id="spanValidaNomeCusto" class="Msg-tooltipDireita" style="display:none">Preencha o campo Nome</span>';	
				//echo $this->Form->input('limite',array('label' => 'Limite<span class="campo-obrigatorio">*</span>:','type'=>'text', 'class' => 'tamanho-pequeno dinheiro_duasCasas'));
				//echo '<span id="spanValidaLimiteCusto" class="Msg-tooltipDireita" style="display:none">Preencha o campo Limite</span>';	
				echo $this->Form->input('Orcamentocentro.0.mes', array('label' => 'Mês: ','class' => 'selectMes', 'type' => 'select', 'options' => array('01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril', '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' =>'Agosto', '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12'=> 'Dezembro')));
				$ano= array();
				$anoAtual= date('Y');
				
				
				for($i = 1900; $i < 3000; $i++){
					
					$ano[$i] = $i;
					
					
				}	
				
				echo $this->Form->input('Orcamentocentro.0.ano', array('label' => 'Ano: ', 'class' => 'selectAno', 'type' => 'select', 'options' => $ano,  'default' => $anoAtual));
				$ano = $ano[$anoAtual]."-01-30";
				echo $this->Form->input('Orcamentocentro.0.periodo_final', array('type' => 'hidden', 'value' => $ano));
				
				echo $this->Form->input('Orcamentocentro.0.limite', array('label' => 'Valor Limite: ', 'type' => 'text'));				
			?>	
		</div>	
		
	</section>
</section>

<footer>

	<?php echo $this->form->submit('botao-salvar.png',array('id'=>'bt-salvar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar'));
		  echo $this->Form->end();
		
	?>

</footer>
