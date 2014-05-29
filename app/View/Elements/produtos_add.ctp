<?php 
	if(isset($modal)){	
		$this->extend('/Common/modal');
		$this->assign('modal',$modal);
?>

		<script>
			$(document).ready(function(){

				$('.validaNome').focusin(function(){
					$('.validaNome').attr('required','required');
				});  

				$('.validaNome').focusout(function(){
					$('.validaNome').removeAttr('required','required');
				});  

				$('.validaUnidade').focusin(function(){
					$('.validaUnidade').attr('required','required');
				});  

				$('.validaUnidade').on('focusout, click',function(){
					$('.validaUnidade').removeAttr('required','required');
				});  

				$('.formAddProdutoModal').submit(function(event){
					event.preventDefault();

					if($('.validaCodigo').val() ==''){
						$('.validaCodigo').addClass('shadow-vermelho');
						$('#validaCodi').css('display','block');
					}else if($('.validaNome').val() == ''){
						$('.validaNome').addClass('shadow-vermelho');
						$('#validaNome').css('display','block');
					}else if($('.validaUnidade').val() ==''){
						$('.validaUnidade').addClass('shadow-vermelho');
						$('#validaUnid').css('display','block');
					}else if($('.validaCfop').val() == ''){
						$('.validaCfop').addClass('shadow-vermelho');
						$('#validaCfop').css('display','block');	
					}else if($('.validaNcm').val() == ''){
						$('.validaNcm').addClass('shadow-vermelho');
						$('#validaNcm').css('display','block');	
					}else if($('#ProdutoEstoqueMinimo').val() == 0){
						$('span[id="spanEstoqueMinimo"]').remove();
						$('#ProdutoEstoqueMinimo').addClass('shadow-vermelho');
						$('<span id="spanEstoqueMinimo" class="msg erroRight">Estoque Mínimo não pode ser menor que 1</span>').insertAfter('input[id="ProdutoEstoqueMinimo"]');
					}else if($('.validaEstoqueIdeal').val() == ''){
						$('.validaEstoqueIdeal').addClass('shadow-vermelho');
						$('#validaEstoqueIdeal').css('display','block');
					}else{
						var urlAction = "<?php echo $this->Html->url(array("controller"=>"produtos","action"=>"add"),true);?>";
						var dadosForm = $("#ProdutoAddForm").serialize();

						$(".loaderAjax").show();
						$(".btn-salvarProduto").hide();

						$.ajax({
							type: "POST",
							url: urlAction,
							data:  dadosForm,
							dataType: 'json',
							success: function(data){
								//console.debug(data.Produto.id);

								$(".loaderAjax").hide();
								$(".bt-salvar-Produto").show();
								
								//Compras
								
								$("#add-produtos").append("<option id='"+data.Produto.id+"' data-nome='"+data.Produto.nome+"'>"+data.Produto.nome+"</option>");
								

								$("#ProdutoCodigo").val('');
								$("#ProdutoNome").val('');
								$("#ProdutoCodigoEan").val('');

								$("#btnRight").trigger("click");
								$("#ProdutoComposicao").val("");
								$("#ProdutoDosagem").val("");
								$("#ProdutoUnidade").val("");
								$("#ProdutoDescricao").val("");
								$("#Tributo0Ncm").val("");
								$("#Tributo0Cfop").val("");
								$("#Tributo0AlIcms").val("");
								$("#Tributo0CodigoSeloIpi").val("");
								$("#Tributo0QtdeSeloIpi").val("");
								$("#Tributo0AlIpi").val("");
								$("#Tributo0AlCst").val("");
								$("#Tributo0AlConfins").val("");
								$("#Tributo0AlPis").val("");
								$("#ProdutoEstoqueMinimo").val("");
								$("#estoqueIdeal").val("");
								$("#ProdutoPeriodocriticovalidade").val("");

								$("#myModal_add-produtos").modal('hide');
								$(".campo-superior-produto input").val('');
								$(".selectProduto").prepend("<option value='"+data.Produto.id+"' id='"+data.Produto.id+"' class='"+data.Produto.unidade+"' rel='"+data.Produto.descricao+"' selected='selected'  >"+data.Produto.nome+"</option>");
								$(".testechange").remove();
								$('.selectProduto').prepend('<option value="add-produtos">Cadastrar</option>');	
								$('.campo-superior-produto .input .ui-widget-content').val(data.Produto.nome);	
							}
						});
					}
				});
			});
		</script>

<?php	    
	}	

	$this->start('css');
		echo $this->Html->css('modal_produto');
	$this->end();	
?>

<header>

	<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	 <?php
		if(isset($telaAbas)){
			echo '<h1 class="menuOption'.$telaAbas.'">Cadastrar Produto</h1>';
		}else{
			echo '<h1 class="menuOption22">Cadastrar Produto</h1>';
		}
    ?>
    
</header>

<section>
	<header>Dados Gerais Do Produto</header>

	<section class="coluna-esquerda" id="ajusteColunaEsquerda">
		<div id="produtos-modal">					

			<?php
				if(!isset($modal)){	
					echo $this->Form->create('Produto', array('controller' => 'produtos', 'action'=>'add', 'class' => 'formAddProduto'));
				}else{
					echo $this->Form->create('Produto', array('controller' => 'produtos', 'action'=>'add', 'class' => 'formAddProdutoModal'));
				}

				echo $this->Form->input('Produto.nome',array('required'=>'false','class'=>'tamanho-medio validacao-cadastrar validaNome','label'=>'Nome<span class="campo-obrigatorio">*</span>:','maxlength'=>'255','tabindex'=>'1'));
				echo '<span id="validaNome" class="msg erroRight" style="display:none">Preencha o campo Nome</span>';
				echo $this->Form->input('Produto.composicao', array('class'=>'tamanho-medio','label'=>'Composição: ','maxlength'=>'1000','tabindex'=>'4'));
			?>

			<label class="pick-label pick-categoria">Categoria</label>

			<!--------------- INÍCIO PICK-LIST --------------->
			<div class="picklist">
				<span class="titulo add">Adicionadas</span>
				<span class="titulo todas">Todas</span> 		
				<section class="container">
					<div>

						<?php echo $this->Form->input('CategoriaCategoria', array('id'=>'leftValues_', 'type'=>'hidden', 'size'=>'5', 'div'=>false, 'label'=>false, 'name'=>'data[Categoria][Categoria]')); ?>

						<select id="leftValues" size="5" multiple="multiple" name="data[Categoria][Categoria][]" tabindex="7"></select>
					</div>

					<div class="pick-bt">
						<input type="button" id="btnLeft" value="&lt;&lt;" tabindex="8" />
						<input type="button" id="btnRight" value="&gt;&gt;" tabindex="9"/>
					</div>

					<div>
						<?php echo $this->Form->input('Categoria', array('id'=>'rightValues', 'class'=>'select-multiple', 'size'=>'5', 'div'=>false, 'label'=>false, 'name'=>'Cat','tabindex'=>'10')); ?>
					</div>
				</section>
			</div>
			<!--------------- FIM PICK-LIST --------------->

		</div>
	</section>

	<section class="coluna-central" >
		<div>

			<?php
				echo $this->Form->input('Produto.codigoEan',array('class'=>'tamanho-medio codigoean','type'=>'text', 'label' => 'Código EAN: ', 'maxlength' => '20','tabindex'=>'2'));
				echo $this->Form->input('Produto.dosagem',array('class'=>'tamanho-pequeno',  'label' => 'Dosagem: ', 'maxlength' => '1000','tabindex'=>'5'));
			?>

		</div>
	</section>

	<section class="coluna-direita" >
		<div>

			<?php
				echo $this->Form->input('Produto.unidade', array('class'=>'validaUnidade validacao-cadastrar','required'=>'false','type'=>'select','label'=>'Unidade<span class="campo-obrigatorio">*</span>:','options'=>$tiposUnidades,'tabindex'=>'3'));
				echo '<span id="validaUnid" class="msg erroRight" style="display:none">Selecione a Unidade</span>';
				echo $this->Form->input('Produto.descricao', array('label'=>'Descrição:','type'=>'textarea','rows' => '3', 'cols' => '4', 'maxlength' => '1000','tabindex'=>'6'));
			?>

		</div>
	</section>
</section>

<section>
	<header class="">Dados Tributários do Produto</header>

	<section class="coluna-esquerda">
		<div>

			<?php
				echo $this->Form->input('Produto.preco_venda',array('class'=>'tamanho-pequeno dinheiro','type'=>'text', 'label'=>'Preço de Venda:','tabindex'=>'11'));
				echo $this->Form->input('Tributo.0.codigo_selo_ipi',array('class'=>'tamanho-medio s-ipi','type'=>'text', 'label'=>'Código selo IPI:', 'maxlength' => '20','tabindex'=>'14'));
				echo $this->Form->input('Tributo.0.qtde_selo_ipi',array('class'=>'tamanho-pequeno q-ip','type'=>'text', 'label'=>'Quantidade Selo IPI:', 'maxlength' => '20','tabindex'=>'17'));
				echo $this->Form->input('Tributo.0.al_ipi',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'label'=>'IPI:', 'maxlength' => '5','after' => '<span class="afterInput">&nbsp;%</span>','tabindex'=>'20'));	
			?>

		</div>
	</section>

	<section class="coluna-central">
		<div>

			<?php
				echo $this->Form->input('Tributo.0.cfop',array('class'=>'tamanho-pequeno cfop validaCfop','type'=>'text', 'label'=>'CFOP<span class="campo-obrigatorio">*</span>:', 'maxlength' => '7','tabindex'=>'12'));
				echo '<span id="validaCfop" class="msg erroRight" style="display:none">Preencha o campo CFOP</span>';
				echo $this->Form->input('Tributo.0.ncm',array('class'=>'tamanho-pequeno ncm validaNcm','type'=>'text', 'label'=>'NCM<span class="campo-obrigatorio">*</span>:', 'maxlength' => '7','tabindex'=>'15'));
				echo '<span id="validaNcm" class="msg erroRight" style="display:none">Preencha o campo NCM</span>';
				echo $this->Form->input('Tributo.0.al_confins',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'label'=>'COFINS:', 'maxlength' => '5','after' => '<span class="afterInput">&nbsp;%</span>','tabindex'=>'18'));
			?>

		</div>
	</section>

	<section class="coluna-direita">
		<div>

			<?php
				echo $this->Form->input('Tributo.0.al_icms',array('class'=>'tamanho-pequeno icms','type'=>'text', 'label'=>'ICMS:', 'maxlength' => '5','after' => '<span class="afterInput">&nbsp;%</span>','tabindex'=>'13'));
				echo $this->Form->input('Tributo.0.al_cst',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'type'=>'text','label'=>'CST:', 'maxlength' => '5','after' => '<span class="afterInput">&nbsp;%</span>','tabindex'=>'16'));	
				echo $this->Form->input('Tributo.0.al_pis',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'label'=>'PIS:', 'maxlength' => '5','after' => '<span class="afterInput">&nbsp;%</span>','tabindex'=>'19'));
			?>

		</div>
	</section>
</section>

<section>
	<header>Dados de Estoque do Produto</header>

	<section class="coluna-esquerda">
		<div>

			<?php echo $this->Form->input('Produto.bloqueado', array('type'=>'select','label'=>'Produto Bloqueado:','class'=>'tamanho-medi','options'=>array('0'=>'Não', '1'=>'Sim'),'tabindex'=>'21')); ?>

		</div>

		<div class="estoque-minimo">

			<?php
				echo $this->Form->input('Produto.estoque_minimo', array('label'=>'Estoque Mínimo<span class="campo-obrigatorio">*</span>:','id'=>'ProdutoEstoqueMinimo','type'=>'text','class'=>'tamanho-pequeno validacao-cadastrar numberMask', 'maxlength' => '10','tabindex'=>'24' )); 
				echo '<span id="spanEstoqueMinimo" class="msg erroRight" style="display:none">Estoque Mínimo não pode ser maior do que o Estoque Ideal</span>';
			?>

		</div>
	</section>

	<section class="coluna-central">
		<div class="status">

			<?php echo $this->Form->input('Produto.ativo', array('label'=>array('text'=>'Status de Visualização:','class'=>'labelAjuste'),'class'=>'tamanho-status inputAjuste','options'=>array('1'=>'Ativo','0'=>'Inativo'),'tabindex'=>'22')); ?>

		</div>	
		<div class="estoque-minimo modal-estoque">

			<?php
				echo $this->Form->input('Produto.estoque_desejado', array('label'=>'Estoque Ideal<span class="campo-obrigatorio">*</span>:','type'=>'text','id'=>'estoqueIdeal','class'=>'tamanho-pequeno validacao-cadastrar numberMask validaEstoqueIdeal',  'maxlength' => '10','tabindex'=>'25'));
				echo '<span id="validaEstoqueIdeal" class="msg erroRight" style="display:none">Preencha o campo Estoque Ideal</span>';
			?>

		</div>
	</section>

	<section class="coluna-direita">
		<div class="periodo">

			<?php echo $this->Form->input('Produto.periodocriticovalidade',array('label'=>array('text'=>'Período Crítico de Val.:','class'=>'labelAjuste'),'class'=>'tamanho-pequeno inputAjuste numberMask','type'=>'text','maxlength' => '10','after' => '<span class="afterInput">dia(s)</span>','tabindex'=>'23' )); ?>

		</div>
	</section>
</section>

<footer>
	<div id="LoadAjaxProduto" class="loaderAjax" style="display:none">

		<?php echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando','title'=>'Carregando','class'=>'ajaxLoader')); ?>

		<span id="spanLoadProduto"></span>Salvando aguarde...</span>
	</div>			
	
	<?php
		if(!isset($modal)){	
			echo $this->form->submit('botao-salvar.png',array('class'=>'bt-salvar1','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarProduto')); 
		}else{
			echo $this->form->submit('botao-salvar.png',array('class'=>'bt-salvar1','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarProdutoModal')); 
		}

		echo $this->Form->end();	
	?>	

</footer>
