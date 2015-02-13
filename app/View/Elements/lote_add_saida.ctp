
<?php
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}

	$this->start('css');
	echo $this->html->css('modal_lote_saida');
	$this->end();
?>


<br/>

<header id="cabecalho">
	<div class="head">
	<?php
		echo $this->Html->image('titulo-consultar.png', array('id' => 'Cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Buscar Lote</h1>
	 </div>
</header>

<style>
.ajaxLoader{float:left;}
#bt-salvarLote{display:none;}
</style>

<section>
	<header class="header">Dados do Lote</header>

	<section class="coluna-modal">
		
			<div id="lote-modal">
			
		

				<?php
					echo $this->Form->create('Lote', array('url'=>array('controller'=>'lotes', 'action'=>'add')));


				?>
			
					<div id="carregaSelect">

					</div>


					<?php
					
						echo $this->Form->input('Lote.produto_id', array('type'=>'hidden'));
						echo $this->Form->input('Lote.data_fabricacao', array('type'=>'text','onfocus'=>'this.blur()','readonly'=>'readonly','disabled'=>'disabled','class'=>'border-none tamanho-medio validacao-entrada','label'=>'Fabricação:'));
								
						echo $this->Form->input('Lote.data_validade', array('type'=>'text','onfocus'=>'this.blur()','disabled'=>'disabled','readonly'=>'readonly','class'=>'border-none tamanho-medio validacao-entrada','label'=>'Validade:'));
						

						echo $this->Form->input('Lote.parceirodenegocio_id', array('type'=>'text','onfocus'=>'this.blur()','readonly'=>'readonly','disabled'=>'disabled','class'=>'border-none tamanho-medio validacao-entrada','label'=>'Fabricante:'));
						
						echo $this->Form->input('Lote.estoque', array('type'=>'text','onfocus'=>'this.blur()','readonly'=>'readonly','disabled'=>'disabled','class'=>'border-none tamanho-medio','label'=>'Estoque:'));
						
						
						echo $this->Form->input('Lote.Quantidade',array('class'=>'tamanho-medio validacao-entrada numeroQtde','label'=>'Qtde<span class="campo-obrigatorio">*</span>:'));
						echo '<span id="validaModLoteQTDE" class="Msg" style="display:none">Preencha o campo Qtde</span>';
						echo '<span id="LoteVazio" class="Msg" style="display:none">Escolha um Lote para Continuar</span>';
						echo '<span id="validaQtdEsto" class="Msg" style="display:none">Quantidade Não pode ser maior que o estoque</span>';
						echo '<span id="LoteAddicionado" class="Msg" style="display:none">Este lote já foi adicionado, por favor escolha outro.</span>';
					?>
				
		
			</div>
	</section>

</section>

<footer>
	
	<?php
		//echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarLote'));
	?>

	<?php

		echo $this->Form->end();
		echo $this->Html->image('botao-adcionar2.png', array('id' => 'btn-addLote', 'alt' => 'Adicionar lote', 'title' => 'Adicionar Lote', 'class'=>'btn-addLoteSaida botao-addLote'));
	?>
</footer>


