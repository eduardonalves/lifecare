<?php 
	$this->start('css');

		echo $this->Html->css('modal_quicklink');
		echo $this->Html->css('table');
		//echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		//echo $this->Html->css('jquery-ui/custom-combobox.css');
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
	
	$('#bt-salvar-quicklink').click(function(event){
	  	  event.preventDefault();

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
				   // $("#spanMsgCateNomeInvalido").css("display","block");
				    //$('#ParceirodenegocioNome').addClass('shadow-vermelho');
				}else{
				   // $('#ParceirodenegocioClassificacao').removeAttr('disabled',true);
				   $("#bt-salvar-quicklink").show();
				    $("#myModal_add-novo_limite").modal('hide');
				     
				   // $('#ContasreceberParceirodenegocioId').val(data.Parceirodenegocio.id);
				   // $('#ContasreceberParceiro').val(data.Parceirodenegocio.nome);
				    //$('#ContasreceberCpfCnpj').val(data.Parceirodenegocio.cpf_cnpj);
				    //$("#ParceirodenegocioNome").val("");
				    //$(".loaderAjaxCParceiroDIV").hide();
				    //$("#bt-salvarParceiro").show();
				    //$("#add-cliente").append("<option value='"+data.Parceirodenegocio.id+"' class='"+data.Parceirodenegocio.cpf_cnpj+"' id='"+data.Parceirodenegocio.nome+"' rel='CLIENTE'>"+data.Parceirodenegocio.nome+"</option>");						
				   // $("#spanMsgCateNomeInvalido").css("display","none");
				    $(".loaderAjaxDadoscreditoDIV").hide();
				}
			}
		});
	    
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
	<header>Dados Pesquisa Rápida</header>

	
	<section class="coluna-modal">
		<div>
		
		<?php

			echo $this->Form->create('Dadoscredito');

			echo $this->Form->input('Dadoscredito.limite',array('label' => 'Limite de Crédito<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-medio'));
			echo $this->Form->input('Dadoscredito.validade_limite',array('label' => 'Validade do Limite<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'forma-data tamanho-pequeno'));
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
