<?php 
	$this->start('css');

		echo $this->Html->css('limiteAdd');
	
	$this->end();

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	
	
?>
			
<script>
	
	
	
$(document).ready(function(){
	var contadorBlocoEndereco = 1;
	var contadorBlocoDadosBanc = 1;
	var i = 0;
	$('#bt-salvar-quicklink').click(function(event){
	  	  event.preventDefault();
	  	  
			if($("#DadoscreditoLimite").val() == ""){
				$("#validaLimiteModal").show();
				
			}else if($("#DadoscreditoValidadeLimite").val() == ""){
						
				$("#validaValidadeModal").show();
				
			}else{
				$("#validaLimiteModal").hide();
				$("#validaValidadeModal").hide();
				
				var dadosCreditoLimite =  $("#DadoscreditoLimite").val();
				$("#DadoscreditoLimite").val(dadosCreditoLimite.split('.').join('').replace(',','.'));
				
				var urlAction = "<?php echo $this->Html->url(array("controller"=>"Dadoscreditos","action"=>"add"),true);?>";
				var dadosForm = $("#DadoscreditoEditForm").serialize();
				 $("#bt-salvar-quicklink").hide();
				 $(".loaderAjaxDadoscreditoDIV").show();
				$.ajax({
					type: "POST",
					url: urlAction,
					data:  dadosForm,
					dataType: 'json',
					success: function(data) {
						console.debug(data);
						
						if(data.Dadoscredito.id == 0 || data.Dadoscredito.id == undefined ){
							$(".loaderAjaxDadoscreditoDIV").hide();
							$("#bt-salvarParceiro").show();
						}else{
							$("#bt-salvar-quicklink").show();
							$("#myModal_add-novo_limite").modal('hide');
							$(".loaderAjaxDadoscreditoDIV").hide();
						}
					}
				});
				setInterval(function(){
					location.reload();
					},3000);
				
			}	    
		
	});

	
  

});	
</script>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Cadastrar Novo Limite</h1>
</header>

<section>
	<header>Novo Limite</header>
	
	<section class="coluna-modal">
		<div>
		
		<?php

			echo $this->Form->create('Dadoscredito');

			echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-medio dinheiro_duasCasas'));

			echo '<span id="validaLimiteModal" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
			
			echo $this->Form->input('Dadoscredito.validade_limite',array('label' => 'Validade do Limite<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'forma-data tamanho-pequeno'));
			echo '<span id="validaValidadeModal" class="Msg-tooltipDireita" style="display:none">Preencha a Validade</span>';
			echo '<span id="validaValidade3" class="Msg-tooltipDireita" style="display: none;">Preencha corretamente a data</span>';
			
			echo $this->Form->input('Dadoscredito.parceirodenegocio_id',array('type' => 'hidden', 'value' => $parceirodenegocio['Parceirodenegocio']['id']));
			
		?>
	
	
		</div>
		
	</section>
	
</section>

<footer>
	<div class="loaderAjaxDadoscreditoDIV" style="display:none">
		<?php
			
			echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
														 'title'=>'Carregando',
														 'class'=>'loaderAjaxDadoscredito',
														 ));
		?>
		<span>Salvando aguarde...</span>
	</div>	
	<?php
		echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-salvar-quicklink','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>

</div>

</div>
