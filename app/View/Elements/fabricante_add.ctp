
<?php 
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_fabricante');
	$this->end();
	
?>


<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	 <h1>Cadastrar Fabricante</h1>
	 
</header>

<section>
	<header class="header">Dados do Fabricante</header>
	
	<section class="coluna-modal">
	 <div id="fabricante-modal">
			
		<?php
			echo $this->Form->create('Fabricante'); 
			echo $this->Form->input('Fabricante.nome',array('type'=>'text','label'=>'Nome<span class="campo-obrigatorio">*</span>:'));
			echo "<span id='spanValidaFabricanteNome' class='Msg' style='display:none'>Preencha o Campo Nome</span>";
			echo "<span id='spanFabricanteCadastrado' class='Msg' style='display:none'>Fabricante Existente</span>";
			echo $this->Form->input('Fabricante.tipo',array('type'=>'hidden','value'=>'FABRICANTE'));				
			echo $this->Form->end();
		?>
	 </div>	
	</section>
	
</section>
<script>
	$(document).ready(function(){
		$('.bt-salvarFabricante').click(function(event){
		
				event.preventDefault();
				var urlAction = "<?php echo $this->Html->url(array("controller"=>"fabricantes","action"=>"add"),true);?>";
				var dadosForm = $("#FabricanteIndexForm").serialize();
				$(".loaderAjax").show();
				$(".bt-salvarFabricante").hide();
				
				
				
				if($("#FabricanteNome").val() == ''){
					$("#spanValidaFabricanteNome").show();
					$(".loaderAjax").hide();
					$(".bt-salvarFabricante").show();
				}else{
					
							
				
			$.ajax({
				type: "POST",
				url: urlAction,
				data:  dadosForm,
				dataType: 'json',
				success: function(data) {
					console.debug(data);
					if(data.Fabricante.id == 0){
						$(".loaderAjax").hide();
						$("#spanFabricanteCadastrado").css("display","block");
						$('.bt-salvarFabricante').show();
					}else{
						$("#LoteParceirodenegocioId").append("<option value='"+data.Fabricante.id+"' id='"+data.Fabricante.nome+"' class='"+data.Fabricante.cpf_cnpj+"' rel='FABRICANTE'  >"+data.Fabricante.nome+"</option>");
						$("#LoteParceirodenegocioId").val(data.Fabricante.id);
						$("#myModal_add-fabricante").modal('hide');
						$('#myModal_add-lote').modal("show");
						$(".loaderAjax").hide();
						$(".bt-salvarFabricante").show();	
					}
					
					
				}
			});
			
		}
		});
	});
</script>
<footer>
	<div class="loaderAjax" style="display:none">
		<?php
			
			echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
														 'title'=>'Carregando',
														 'class'=>'ajaxLoader',
														 ));
		?>
		<span>Salvando aguarde...</span>
	</div>
	<?php
		echo $this->form->submit( 'botao-salvar.png',array('class' => 'bt-salvar bt-salvarFabricante', 'alt' => 'Salvar', 'title' => 'Salvar')); 
	?>			
</footer>

