<?php 
	$this->start('css');
		echo $this->Html->css('modal_tipo_conta');
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
	$('#TipodecontaAddForm').submit(function(event){
			event.preventDefault();
			var urlAction = "<?php echo $this->Html->url(array("controller"=>"Tipodecontas","action"=>"add"),true);?>";
		    var dadosForm = $("#TipodecontaAddForm").serialize();
	     	$(".loaderAjax").show();
	     	$("#bt-salvar").hide();
	     	
	     	
		    $.ajax({
		    	
				type: "POST",
				url: urlAction,
				data:  dadosForm,
				dataType: 'json',
				success: function(data) {
			    console.debug(data);
			    
				if(data.Tipodeconta.id == 0 || data.Tipodeconta.id == undefined ){
				    $("#loaderAjax").hide();
				    $("#bt-salvar").show();
				
				}else{
				  // debug(data);
				    $("#myModal_add-parceiroCliente").modal('hide');
				    $('#tipoConta').val(data.Tipodeconta.nome);
				    $("#TipodecontaNome").val("");
				    $("#myModal_add-tipodeConta").modal('hide');
					$("add-tipodeConta").append("<option value='"+data.Tipodeconta.id+"' class='"+data.Tipodeconta.nome+"' id='"+data.Tipodeconta.nome+"' rel='Tipodeconta'>"+data.Tipodeconta.nome+"</option>");						
					$("#loaderAjax").hide();
					$("#bt-salvar").show();
				}
			}
		});
	});
});
</script>
<header id="cabecalho">	
	<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

	<h1>Cadastrar Tipo da Conta</h1>
</header>

<section>
	<header>Dados Tipo da Conta</header>


	<section class="coluna-modal">
		<div>
			<div id="loaderAjax"><?php echo $this->Html->image('ajaxLoaderLifeCare.gif', array('id' => 'ajaxLoader', 'alt' => 'Carregando', 'title' => 'Carregando')); ?> <span style="position: absolute; margin-left: 7px;">Aguarde...</span></div>
			<?php
				echo $this->Form->create('Tipodeconta', array('controller' => 'Tipodecontas', 'action' => 'add'));
				echo $this->Form->input('nome',array('label' => 'Nome:','type'=>'text', 'class' => 'tamanho-medio'));
				echo $this->Form->input('tipo',array('type'=>'hidden'));
			?>	

		</div>	
	</section>
</section>

<footer>

	<?php echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-salvar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar'));
		  echo $this->Form->end();
		
	?>

</footer>
