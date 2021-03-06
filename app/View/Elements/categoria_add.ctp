<?php 
	if(isset($modal)){
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
?>
	
<script>
	$(document).ready(function(){

		$('#CategoriaNome').focusin(function(){
			$('#CategoriaNome').attr('required','required');
		}).focusout(function(){
			$('#CategoriaNome').removeAttr('required','required');
		});  

		$('.bt-salvarCategoria').click(function(event){
			$('#CategoriaNome').removeAttr('required','required');

			event.preventDefault();
			$(".loaderAjaxCategoriaDIV").show();
			$(".bt-salvarCategoria").hide();

			if($('.nome-categoria').val() == ''){
				$(".loaderAjaxCategoriaDIV").hide();
				$(".bt-salvarCategoria").show();
				$('.nome-categoria').addClass('shadow-vermelho');
				$('#spanMsgCategoria').css('display','block');
			}else{				    

				var urlAction = "<?php echo $this->Html->url(array("controller"=>"categorias","action"=>"add"),true);?>";
				var dadosForm = $("#CategoriaIndexForm").serialize();
				
				if(dadosForm==""){
					dadosForm = $("#CategoriaAddForm, #CategoriaEditForm").serialize();
				}

				$.ajax({
					type: "POST",
					url: urlAction,
					data:  dadosForm,
					dataType: 'json',
					success: function(data) {
					console.debug(data);
					
						if(data.Categoria.id == 0 || data.Categoria.id == undefined ){
							$(".loaderAjaxCategoriaDIV").hide();
							$(".bt-salvarCategoria").show();
							$("#spanMsgCateNomeInvalido").css("display","block");
							$('#CategoriaNome').addClass('shadow-vermelho');
						}else{
							$("#myModal_add-categoria").modal('hide');
							$("#myModal_add-produtos").modal('show');
							$("#CategoriaNome").val("");
							$(".loaderAjax").hide();
							$(".bt-salvarCategoria").show();
							$("#leftValues").append("<option value='"+data.Categoria.id+"'>"+data.Categoria.nome+"</option>");						
							$("#spanMsgCateNomeInvalido").css("display","none");
							$(".loaderAjaxCategoriaDIV").hide();
						}

					}
				});
			}
		});

		$("#rightValues").on('change', function(){
			valorCategoria=$(this).val();
			if(valorCategoria=="add-categoria"){
				$("#myModal_add-produtos").modal('hide');
			}
		});

		$("#myModal_add-categoria .close").click(function(){
			$("#myModal_add-produtos").modal('show');
		});

	});
</script>

<?php
	$this->start('css');
		echo $this->Html->css('modal_categoria');
	$this->end();

	$this->start('script');
		//echo $this->Html->script('picklist-autoselect.js');
	$this->end();
?>

<header id="cabecalho">

	<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	
	<h1>Cadastrar Categoria</h1> 
</header>

<section>
	<header class="header">Dados da Categoria</header>

	<section>
		<div>
		
			<?php
				echo $this->Form->create('Categoria', array('url'=>array('controller'=>'Categorias', 'action'=>'add'), 'class'=>'modal-form'));
				echo "<div class=\"ui-widget\">";
					echo $this->Form->input('Categoria.nome', array('required'=>'false','class'=>'nome-categoria validacao-cadastrar','type'=>'text', 'label'=>'Categoria<span class="campo-obrigatorio">*</span>:', 'div'=>false , 'maxlength' => '20' ));
					echo "<span id='spanMsgCategoria' class='msg erroRight' style='display:none'>Preencha o campo categoria</span>";
					echo "<span id='spanMsgCateNomeInvalido' class='msg erroRight' style='display:none'>Está Categoria já está cadastrada</span>";
				echo "</div>";
			?>
	
		</div>	
	</section>
</section>

<footer>
	<div class="loaderAjaxCategoriaDIV" style="display:none">
		
		<?php echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando','title'=>'Carregando','class'=>'loaderAjaxCategoria',)); ?>
		
		<span>Salvando aguarde...</span>
	</div>	
	
	<?php echo $this->form->submit( 'botao-salvar.png' ,  array('class' => 'bt-salvar bt-salvarCategoria', 'alt' => 'Salvar', 'title' => 'Salvar')); ?>			

</footer>
