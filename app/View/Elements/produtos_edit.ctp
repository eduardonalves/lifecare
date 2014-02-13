<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
		echo $this->Html->css('edit_produtos');
	$this->end();

	$this->start('script');
		echo $this->Html->script('picklist-autoselect.js');
?>
		
		<script type="text/javascript">
		
			$(document).ready( function() {
				
				$("#rightValues option:selected").remove();
				
				
			});
		
		</script>
		
		
<?php
	$this->end();
	
?>

<header>
	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption21">Consultas</h1>

</header>

<section><!--SECTION SUPERIOR--> 
	<header>Editar Detalhes do Produto</header>

	<section id="coluna-esquerda" class="coluna-esquerda">
		<fieldset class="fieldset-esquerda">
			<div class="coluna-content">

				<?php
					echo $this->Form->create('Produto',array('id'=>'FormEditSubmit'));

					echo $this->Form->input('Produto.id');
					
					echo $this->Form->input('Produto.codigo', array('type'=>'text','label'=>'Código:','value'=>h($produto['Produto']['id']),'class'=>'','disabled'=>'disabled'));

					echo $this->Form->input('Produto.codigoEan', array('type'=>'text','label'=>'Código EAN:','value'=>h($produto['Produto']['codigoEan']),'class'=>'tamanho-medio codigoean', 'maxlength' => '20'));

					echo $this->Form->input('Produto.nome', array('required'=>'true','label'=>'Nome<span class="campo-obrigatorio">*</span>:','allowEmpty' => 'false','type'=>'text','value'=>h($produto['Produto']['nome']),'class'=>'tamanho-medio validaNome','maxlength' => '100'));
					echo '<span id="validaNome" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo Nome</span>';
					echo $this->Form->input('Produto.composicao', array('type'=>'text','label'=>'Composição:','value'=>h($produto['Produto']['composicao']),'class'=>'tamanho-medio', 'maxlength' => '100'));

					echo $this->Form->input('Produto.dosagem', array('type'=>'text','label'=>'Dosagem:','value'=>h($produto['Produto']['dosagem']),'class'=>'tamanho-pequeno', 'maxlength' => '100'));
					
					echo $this->Form->input('Produto.unidade', array('label'=>'Unidade<span class="campo-obrigatorio">*</span>:','class'=>'validaUnidade','type' => 'select','options'=>$tiposUnidades));
					echo '<span id="validaUnidade" class="tooltipMensagemErroDireta" style="display:none">Selecione a Unidade</span>';
					//echo $this->Form->input('Categoria', array('class'=>'select-multiple','label'=>'Categoria:'));
				?>
				<div class="pick-label">
					<label>Categoria  </label>
				</div>
				<div class="picklist"><!-- ## PICK-LIST ## INICIO -->	
					<span class="titulo add">Adicionadas</span>
					<span class="titulo todas">Todas</span>
					<section class="">
						<div>
							
							<?php echo $this->Form->input('CategoriaCategoria', array('id'=>'leftValues_', 'type'=>'hidden', 'size'=>'5', 'div'=>false, 'label'=>false, 'name'=>'data[Categoria][Categoria]')); ?>
							
							<select id="leftValues" size="5" multiple="multiple" name="data[Categoria][Categoria][]">
								<pre>
								<?php print_r($categorias); ?>
								</pre>
							<?php foreach($produto['Categoria'] as $cat): ?>

								<option value="<?php echo $cat['id']; ?>" selected="selected"><?php echo $cat['nome']; ?></option>

							<?php endforeach; ?>

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
				<?php
					echo $this->Form->input('Produto.descricao', array('rows' => '3','cols' => '4','label'=>'Descrição:','class'=>'textarea','value'=>$produto['Produto']['descricao'], 'maxlength' => '255' ));
				?>

			</div>	
		</fieldset>
	</section>

	<section class="coluna-central" >
		<fieldset>
			<legend>Dados do Tributário</legend>

			<div class="coluna-content">

				<?php		
					foreach($produto['Tributo'] as $tributo){

						echo $this->Form->input('Tributo.id', array('value'=>$tributo['id']));

						echo $this->Form->input('Tributo.ncm', array('type'=>'text','label'=>'NCM<span class="campo-obrigatorio">*</span>:','value'=>h($tributo['ncm']),'class'=>'tamanho-pequeno validaNcm ncm', 'maxlength' => '6'));
						echo '<span id="validaNcm" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo NCM</span>';
						echo $this->Form->input('Tributo.cfop', array('type'=>'text','label'=>'CFOP<span class="campo-obrigatorio">*</span>:','value'=>h($tributo['cfop']),'class'=>'tamanho-pequeno validaCfop cfop', 'maxlength' => '6'));
						echo '<span id="validaCfop" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo CFOP</span>';
						echo $this->Form->input('Tributo.al_icms', array('type'=>'text','label'=>'ICMS:','value'=>h($tributo['al_icms']),'class'=>'tamanho-pequeno icms', 'maxlength' => '6','after' => '&nbsp;%'));

						echo $this->Form->input('Tributo.codigo_selo_ipi', array('type'=>'text','label'=>'Cód Selo IPI:','value'=>h($tributo['codigo_selo_ipi']),'class'=>'tamanho-pequeno s-ipi','id'=>'', 'maxlength' => '10'));

						echo $this->Form->input('Tributo.qtde_selo_ipi', array('type'=>'text','label'=>'Qtd Selo IPI:','value'=>h($tributo['qtde_selo_ipi']),'class'=>'tamanho-pequeno q-ip','id'=>'', 'maxlength' => '10'));

						echo $this->Form->input('Tributo.al_ipi', array('type'=>'text','label'=>'IPI:','value'=>h($tributo['al_ipi']),'class'=>'tamanho-pequeno ipi', 'maxlength' => '6','after' => '&nbsp;%'));

						echo $this->Form->input('Tributo.al_cst', array('type'=>'text','label'=>'CST:','value'=>h($tributo['al_cst']),'class'=>'tamanho-pequeno ipi', 'maxlength' => '6','after' => '&nbsp;%'));

						echo $this->Form->input('Tributo.al_pis', array('type'=>'text','label'=>'PIS:','value'=>h($tributo['al_pis']),'class'=>'tamanho-pequeno ipi', 'maxlength' => '6','after' => '&nbsp;%'));

						echo $this->Form->input('Tributo.al_confins', array('type'=>'text','label'=>'COFINS:','value'=>h($tributo['al_confins']),'class'=>'tamanho-pequeno ipi', 'maxlength' => '6','after' => '&nbsp;%'));
					}
				?>

			</div>
		</fieldset>
	</section>

	<section id="coluna-direita" class="coluna-direita" >
		<fieldset>
			<legend>Dados do Estoque</legend>

			<div class="estoque coluna-content">
				<?php
					echo $this->Form->input('Produto.estoque_minimo', array('label'=>'Estoque Mínimo<span class="campo-obrigatorio">*</span>:','type'=>'text','value'=>h($produto['Produto']['estoque_minimo']),'class'=>'Nao-Letras SpanEstoqueMinimo tamanho-pequeno numberMask', 'id' => 'ProdutoEstoqueMinimo', 'maxlength' => '10'));

					echo $this->Form->input('Produto.estoque_desejado', array('type'=>'text','label'=>'Estoque Ideal<span class="campo-obrigatorio">*</span>:','value'=>h($produto['Produto']['estoque_desejado']),'class'=>'Nao-Letras valiEstoqueIdeal tamanho-pequeno numberMask','id'=>'estoqueIdeal', 'maxlength' => '10'));
					echo '<span id="valiEstoqueIdeal" class="Msg-tooltipDireita tooltipMensagemErroDireta" style="display:none">Preencha o campo Estoque Ideal</span>'; 
					echo $this->Form->input('Produto.bloqueado', array('type'=>'select', 'label'=>'Produto Bloqueado:','value'=>h($produto['Produto']['bloqueado']), 'class'=>'tamanho-pequeno','options'=>array(array(0=>'Não', 1=>'Sim'))));

					echo $this->Form->input('Produto.periodocriticovalidade', array('type'=>'text','label'=>'Período Crítico:','class'=>'tamanho-medio numberMask', 'class'=>'tamanho-pequeno', 'maxlength' => '10', 'value'=>h($produto['Produto']['periodocriticovalidade']) ));

					echo $this->Form->input('Produto.ativo', array('type'=>'select','label'=>'Status da Visualização:','value'=>h($produto['Produto']['ativo']),'class'=>'tamanho-pequeno', 'options'=>array(0=>'Inativo', 1=>'Ativo')));
				?>

			</div>
		</fieldset>
	</section>
</section><!---Fim section-superior--->

<footer>
	
	<?php
		echo $this->form->submit( 'botao-salvar.png' ,  array('id'=>'bt-edit-salvar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		echo $this->Form->end();
	?>

</footer>

<!-- Modal Add Categoria -->
	
	<?php echo $this->element('categoria_add', array('modal'=>'add-categoria'));?>

<!-- /.modal -->
