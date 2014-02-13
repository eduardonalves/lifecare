
<?php
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}

	$this->start('css');
	echo $this->html->css('modal_lote');
	$this->end();
?>


<br/>

<header id="cabecalho">
	<div class="head">
	<?php
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Cadastrar Lote</h1>
	 </div>
</header>

<style>
.ajaxLoader{float:left;}
</style>

<section>
	<header class="header">Dados do Lote</header>

	<section class="coluna-modal">

		<div id="lote-modal">
			
			<div id="respostaAjax"><span id="spanNumeroLiberado">Número liberado para cadastro</span></div>
			<div id="loaderAjax"><?php echo $this->Html->image('ajaxLoaderLifeCare.gif', array('id' => 'ajaxLoader', 'alt' => 'Carregando', 'title' => 'Carregando')); ?> <span style="position: absolute; margin-left: 7px;">Aguarde...</span></div>
				
				
			<?php
				echo $this->Form->create('Lote', array('url'=>array('controller'=>'lotes', 'action'=>'add')));


				echo $this->Form->input('Lote.produto_id', array('type'=>'hidden'));
				echo $this->Form->input('Lote.id', array('type'=>'hidden'));
				//echo $this->Form->input('Loteiten.tipo',array('value'=>'ENTRADA','type'=>'hidden'));
				echo $this->Form->input('Lote.numero_lote',array('class'=>'tamanho-medio validacao-entrada','required'=>'false','allowEmpty' => 'false','title'=>'Campo Obrigatório','label'=>'Número do Lote<span class="campo-obrigatorio">*</span>:'));
				echo '<span id="validaModLoteNumLote" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo lote</span>';

				echo $this->Form->input('Lote.data_fabricacao', array('type'=>'text','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório','class'=>'forma-data tamanho-medio validacao-entrada','label'=>'Fabricação<span class="campo-obrigatorio">*</span>:'));
				echo '<span id="validaModLoteDataFabric" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo fabricação</span>';
				echo '<span id="validaModLoteDataFabricFutu" class="tooltipMensagemErroDireta" style="display:none">A data de Fabricação não pode ser um dia futuro</span>';
				
				
				echo $this->Form->input('Lote.data_validade', array('type'=>'text','required'=>'true','allowEmpty' => 'false','title'=>'Campo Obrigatório','class'=>'forma-data tamanho-medio validacao-entrada','label'=>'Validade<span class="campo-obrigatorio">*</span>:'));
				echo '<span id="validaModLoteValidade" class="tooltipMensagemErroDireta" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo validade</span>';

				echo $this->Form->input('Lote.parceirodenegocio_id', array('type'=>'select','class'=>'select tamanho-medio validacao-entrada','label'=>'Fabricante<span class="campo-obrigatorio">*</span>:','options'=> $fabricantes));
				echo '<span id="validaModLoteFabricante" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo fabricante</span>';

				//echo $this->Form->input('Lote.fabricante', array('type'=>'select','class'=>'select tamanho-medio','label'=>'Fabricante:','options'=>array('','add-fabricante'=>'cadastrar')+$optLote));
				echo $this->Form->input('Lote.Quantidade',array('class'=>'tamanho-medio validacao-entrada numeroQtde','label'=>'Qtde<span class="campo-obrigatorio">*</span>:'));
				echo '<span id="validaModLoteQTDE" class="tooltipMensagemErroDireta" style="display:none">Preencha o campo Qtde</span>';
				//echo $this->Form->input('Lote.status',array('class'=>'tamanho-medio'));
				//echo $this->Form->input('Lote.estoque', array('type'=>'select','class'=>'tamanho-medio'));

			?>
			
		</div>
	</section>

</section>

<footer>
	<div class="loaderAjax" style="display:none">
		<?php

			echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando','title'=>'Carregando','class'=>'ajaxLoader'));
		?>
		<span>Salvando aguarde...</span>
	</div>
	<?php
		echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarLote'));
	?>

	<?php

		echo $this->Form->end();
		echo $this->Html->image('botao-adcionar2.png', array('id' => 'btn-addLote', 'alt' => 'Adicionar lote', 'title' => 'Adicionar Lote'));
	?>
</footer>


