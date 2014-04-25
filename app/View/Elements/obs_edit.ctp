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
	var i = 0;
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
						}else{
							$("#bt-salvar-quicklink").show();
							$("#myModal_add-novo_limite").modal('hide');
							$(".loaderAjaxDadoscreditoDIV").hide();
						}
					}
				});
				
				location.reload();
			}	    
		
	});

});

</script>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'editar_obs', 'alt' => 'Editar Observação', 'title' => 'Editar Observação'));
	 ?>
	 <h1>Editar Observação</h1>
</header>

<section>
	<header>Observação</header>
	
	<section class="coluna-modal">
		<div>
		
		<?php

			echo $this->Form->create('Conta');

			echo $this->Form->input('Conta.descricao',array('label' => 'Observação:','type' => 'text'));
			
			echo $this->Form->input('Conta.id',array('type' => 'hidden', 'value' => $conta['Conta']['id']));
			
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
