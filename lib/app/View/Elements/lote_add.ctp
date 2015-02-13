
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


	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Cadastrar Lote</h1>
</header>

<style>
.ajaxLoader{float:left;}
</style>

<section>
	<header>Dados do Lote</header>
	
	<section class="coluna-modal">
	
		<div id="lote-modal">
			<div id="respostaAjax" style="position: absolute; margin-top: 113px; margin-left: 312px; display:none;"><span>Número liberado para cadastro</span></div>
			<div id="loaderAjax" style="position: absolute; margin-top: 113px; margin-left: 312px; display:none;"><?php echo $this->Html->image('ajaxLoaderLifeCare.gif', array('id' => 'ajaxLoader', 'alt' => 'Carregando', 'title' => 'Carregando')); ?> <span style="position: absolute; margin-left: 5px;">Aguarde...</span></div>
			<?php
				echo $this->Form->create('Lote', array('url'=>array('controller'=>'Lotes', 'action'=>'add'))); 
			
				
				echo $this->Form->input('Lote.produto_id', array('type'=>'hidden'));
				echo $this->Form->input('Lote.id', array('type'=>'hidden'));
				echo $this->Form->input('Loteiten.tipo',array('value'=>'ENTRADA','type'=>'hidden'));
				echo $this->Form->input('Lote.numero_lote',array('class'=>'tamanho-medio'));
				echo $this->Form->input('Lote.data_fabricacao', array('type'=>'text','class'=>'forma-data tamanho-medio')); 
				echo $this->Form->input('Lote.data_validade', array('type'=>'text','class'=>'forma-data tamanho-medio')); 
				echo $this->Form->input('Lote.fabricante', array('type'=>'select','class'=>'select tamanho-medio','options'=>array('','add-fabricante'=>'cadastrar')+$optLote));
				echo $this->Form->input('Lote.Quantidade',array('class'=>'tamanho-medio')); 
				//echo $this->Form->input('Lote.status',array('class'=>'tamanho-medio')); 
				//echo $this->Form->input('Lote.estoque', array('type'=>'select','class'=>'tamanho-medio'));
			
			?>
		</div>	
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarLote')); 
		
		echo $this->Form->end();
		echo $this->Html->image('botao-adcionar2.png', array('id' => 'btn-addLote', 'alt' => 'Adicionar lote', 'title' => 'Adicionar Lote')); 
	?>			
</footer>


