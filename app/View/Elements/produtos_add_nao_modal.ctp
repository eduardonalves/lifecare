cascasc

<script>
// Não remover estas funções
alert('aqui');
$(document).ready(function(){

    $('#btn-salvarProduto').click(function(event) {
	
		    event.preventDefault();
		alert('teste');
		if($('.validaCodigo').val() ==''){
		    $('.validaCodigo').addClass('shadow-vermelho');
		    $('#validaCodi').css('display','block');
						    
		    }else if($('.validaNome').val() ==''){	    
			$('.validaNome').addClass('shadow-vermelho');
			$('#validaNome').css('display','block');
		    }else if($('.validaUnidade').val() ==''){
			$('.validaUnidade').addClass('shadow-vermelho');
			$('#validaUnid').css('display','block');
		    }else{
			$('#ProdutoAddForm').submit();
		    }
    });
}):    

</script>


<header> <!---header--->

	<?php 
		echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption22">Cadastrar</h1>
	 
</header> <!---Fim header--->

	<section> <!---section superior--->
		
			<header>Dados Gerais Do Produto</header>
			
			
			<section class="coluna-esquerda">
				<div id="produtos-modal">					
					<form id="ProdutoAddForm" accept-charset="utf-8" method="post" action="add">
						<?php
						    echo $this->Form->create('Produto',array('controller' => 'produtos', 'action'=>'add'));
							echo $this->Form->input('Produto.codigo',array('required'=>'false','class'=>'tamanho-medio validacao-cadastrar validaCodigo', 'label' =>'Código<span class="campo-obrigatorio">*</span>:','type' => 'text', 'maxlength' => '20'));
							echo '<span id="validaCodi" style="display:none">Preencha o campo Código</span>';
							echo $this->Form->input('Produto.composicao', array('class'=>'tamanho-medio','label' => 'Composição: ', 'maxlength' => '150'));
							
						?>
						
					<label class="pick-label pick-categoria">Categoria</label>
					
					<div class="picklist"><!-- ## PICK-LIST ## INICIO -->
					
						<span class="titulo add">Adicionadas</span>
						<span class="titulo todas">Todas</span> 		
						<section class="container">
							
							<div>
								
								<?php echo $this->Form->input('CategoriaCategoria', array('id'=>'leftValues_', 'type'=>'hidden', 'size'=>'5', 'div'=>false, 'label'=>false, 'name'=>'data[Categoria][Categoria]')); ?>
									
								<select id="leftValues" size="5" multiple="multiple" name="data[Categoria][Categoria][]">
								</select>

							</div>
							
							<div class="pick-bt">
								<input type="button" id="btnLeft" value="&lt;&lt;" />
								<input type="button" id="btnRight" value="&gt;&gt;" />
							</div>
							
							<div>
								<?php echo $this->Form->input('Categoria', array('id'=>'rightValues', 'class'=>'select-multiple', 'size'=>'5', 'div'=>false, 'label'=>false, 'name'=>'Cat')); ?>
							</div>
						</section>
					</div> <!-- ## PICK-LIST ## FIM -->
				
				</div>
			</section>
				
			<section class="coluna-central" >
				<div>
					<?php
						echo $this->Form->input('Produto.nome',array('required'=>'false','class'=>'tamanho-medio validacao-cadastrar validaNome', 'label' => 'Nome<span class="campo-obrigatorio">*</span>:', 'maxlength' => '255'));
						echo '<span id="validaNome" style="display:none">Preencha o campo Nome</span>';
						echo $this->Form->input('Produto.dosagem',array('class'=>'tamanho-pequeno',  'label' => 'Dosagem: ', 'maxlength' => '150'));
						//echo $this->Form->input('Produto.estoque_maximo',array('label'=>'Estoque ideal:','class' => 'tamanho-pequeno', 'id'=>'', 'type' => 'text'));
						echo $this->Form->input('Produto.descricao', array('label'=>'Descrição:','type'=>'textarea','rows' => '3', 'cols' => '4', 'maxlength' => '255'));
					?>
								
				</div>
			</section>
			
			<section class="coluna-direita" >
				<div>
					<?php
						echo $this->Form->input('Produto.codigoEan',array('class'=>'tamanho-medio codigoean','type'=>'text', 'label' => 'Código EAN: ', 'maxlength' => '20'));
						
						echo $this->Form->input('Produto.unidade', array('class'=>'validaUnidade validacao-cadastrar','required'=>'false','type'=>'select','label'=>'Unidade<span class="campo-obrigatorio">*</span>:','options'=>$tiposUnidades));
						echo '<span id="validaUnid" style="display:none">Selecione a Unidade</span>';
						//echo $this->Form->input('Produto.periodocriticovalidade',array('class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena', 'label' => 'Período Crítico: ', 'maxlength' => '5'));
					
					?>
				</div>
				
			
			</section>
			
	</section><!---Fim section superior--->
		
		
		
		
	<section> <!---section MEIO--->
		
			<header class="">Dados Tributários do Produto</header>

			<section class="coluna-esquerda">
				<div>
					<?php
						echo $this->Form->input('Tributo.0.ncm',array('class'=>'tamanho-pequeno ncm','type'=>'text', 'label'=>'NCM:', 'maxlength' => '7'));
						echo $this->Form->input('Tributo.0.codigo_selo_ipi',array('class'=>'tamanho-medio s-ipi','type'=>'text', 'label'=>'Código selo IPI:', 'maxlength' => '20'));
						echo $this->Form->input('Tributo.0.al_cst',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'type'=>'text','label'=>'CST:', 'maxlength' => '5','after' => '&nbsp;%'));	
					?>
				</div>
			</section>
			
			<section class="coluna-central">
				<div>
					<?php
					echo $this->Form->input('Tributo.0.cfop',array('class'=>'tamanho-pequeno cfop','type'=>'text', 'label'=>'CFOP:', 'maxlength' => '7'));
					echo $this->Form->input('Tributo.0.qtde_selo_ipi',array('class'=>'tamanho-pequeno q-ip','type'=>'text', 'label'=>'Quantidade Selo IPI:', 'maxlength' => '20'));
					echo $this->Form->input('Tributo.0.al_confins',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'label'=>'COFINS:', 'maxlength' => '5','after' => '&nbsp;%'));
					
					?>
				</div>
			</section>
			
			<section class="coluna-direita">
				<div>
					<?php
						echo $this->Form->input('Tributo.0.al_icms',array('class'=>'tamanho-pequeno icms','type'=>'text', 'label'=>'ICMS:', 'maxlength' => '5','after' => '&nbsp;%'));
						echo $this->Form->input('Tributo.0.al_ipi',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'label'=>'IPI:', 'maxlength' => '5','after' => '&nbsp;%'));	
						echo $this->Form->input('Tributo.0.al_pis',array('class'=>'tamanho-pequeno ipi','type'=>'text', 'label'=>'PIS:', 'maxlength' => '5','after' => '&nbsp;%'));
					?>
				</div>
			</section>

	</section><!--fim Meio-->
	
		
	<section> <!---section Baixo--->
		
			<header>Dados de Estoque do Produto</header>
			
			<section class="coluna-esquerda">
				<div>
					<?php
						echo $this->Form->input('Produto.bloqueado', array('type'=>'select','label'=>'Produto Bloqueado:','class'=>'tamanho-medi','options'=>array('1'=>'Sim','0'=>'Não')));
					?>
				</div>	
				
				<div class="estoque-minimo">
					<?php
						echo $this->Form->input('Produto.estoque_minimo', array('label'=>'Estoque Mínimo:','id'=>'ProdutoEstoqueMinimo','type'=>'text','class'=>'tamanho-pequeno numberMask', 'maxlength' => '10' ));
					?>
				</div>
			</section>
			
			<section class="coluna-central">
				<div class="status">
					<?php
						echo $this->Form->input('Produto.ativo', array('label'=>array('text'=>'Status de Visualização:','class'=>'labelAjuste'),'class'=>'tamanho-status inputAjuste','options'=>array('1'=>'Ativo','0'=>'Inativo')));
					?>
				</div>	
				<div class="estoque-minimo modal-estoque">
					<?php
						echo $this->Form->input('Produto.estoque_desejado', array('label'=>'Estoque Ideal:','type'=>'text','id'=>'estoqueIdeal','class'=>'tamanho-pequeno numberMask',  'maxlength' => '10'));
					?>
				</div>

			</section>
			
			<section class="coluna-direita">
				<div class="periodo">
						<?php
							echo $this->Form->input('Produto.periodocriticovalidade',array('label'=>array('text'=>'Período Crítico de Val.:','class'=>'labelAjuste'),'class'=>'tamanho-pequeno inputAjuste numberMask','type'=>'text','maxlength' => '10' ));
							
						?>
				</div>
			</section>
	</section><!--fim Baixo-->

	
		<footer>
			<div id="LoadAjaxProduto" class="loaderAjax" style="display:none">
				<?php
					
					echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
																 'title'=>'Carregando',
																 'class'=>'ajaxLoader',
																 ));
				?>
				<span id="spanLoadProduto"></span>Salvando aguarde...</span>
			</div>			
			<?php
				echo $this->form->submit( 'botao-salvar.png' ,  array('class' => 'bt-salvar1', 'alt' => 'Salvar', 'title' => 'Salvar', 'id'=> 'btn-salvarProduto')); 
				echo $this->Form->end();
				
			?>	
	
	</form>
	</section>
		
		</footer>



