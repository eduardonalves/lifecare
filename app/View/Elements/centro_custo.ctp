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
	$('#CentrocustoAddForm').submit(function(event){
			event.preventDefault();
			var urlAction = "<?php echo $this->Html->url(array("controller"=>"Centrocustos","action"=>"add"),true);?>";
		    var dadosForm = $("#CentrocustoAddForm").serialize();
	     	$(".loaderAjax").show();
	     	$("#bt-salvar").hide();
	     	
	     	
		    $.ajax({
		    	
				type: "POST",
				url: urlAction,
				data:  dadosForm,
				dataType: 'json',
				success: function(data) {
			    console.debug(data);
			    
				if(data.Centrocusto.id == 0 || data.Centrocusto.id == undefined ){
				    $("#loaderAjax").hide();
				    $("#bt-salvar").show();
				
				}else{
				  // debug(data);
				    $("#myModal_add-centro_custo").modal('hide');
				    $('#nomeCusto').val(data.Centrocusto.nome);
			      	$('#limitecusto').val(data.Centrocusto.nome);
			      	$('#limiteAtual').val(data.Centrocusto.nome);
				    $("#CentrocustoNome").val("");
				    $("#CentrocustoLimite").val("");
				    $("#CentrocustoLimiteatual").val("");
				    
				   $("add-custo").append("<option value='"+data.Centrocusto.id+"' class='"+data.Centrocusto.nome+"' id='"+data.Centrocusto.nome+"' rel='Tipodeconta'>"+data.Centrocusto.nome+"</option>");						
				   $("#loaderAjax").hide();
				}
			}
		});
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
			<div id="loaderAjax"><?php echo $this->Html->image('ajaxLoaderLifeCare.gif', array('id' => 'ajaxLoader', 'alt' => 'Carregando', 'title' => 'Carregando')); ?> <span style="position: absolute; margin-left: 7px;">Aguarde...</span></div>
			<?php
				echo $this->Form->create('Centrocusto');
				echo $this->Form->input('nome',array('label' => 'Nome Custo:','type'=>'text', 'class' => 'tamanho-medio'));
				echo $this->Form->input('limite',array('label' => 'Limite:','type'=>'text', 'class' => 'tamanho-pequeno dinheiro_duasCasas'));
				echo $this->Form->input('limiteatual',array('label' => 'Limite Atual:','type'=>'text', 'class' => 'tamanho-pequeno dinheiro_duasCasas'));			
			?>	
		</div>	
	</section>
</section>

<footer>

	<?php echo $this->form->submit('botao-salvar.png',array('id'=>'bt-salvar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar'));
		  echo $this->Form->end();
		
	?>

</footer>
