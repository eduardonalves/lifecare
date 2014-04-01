<?php 
		
	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);

	}
?>
   
<?php
	$this->start('css');
	echo $this->Html->css('modal_uploadConta');
	
	$this->end();
	
?>



<?php 
	$this->start('script');
	//	echo $this->Html->script('jquery-ui/jquery.ui.core.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.widget.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.button.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.position.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.menu.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.autocomplete.js');
	//	echo $this->Html->script('jquery-ui/jquery.ui.tooltip.js');
	//	echo $this->Html->script('jquery-ui/custom-combobox.js');
	echo $this->Html->script('picklist-autoselect.js');
		
?>
		
<?php
	$this->end();
?>


<header id="cabecalho">
	
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Upload Conta</h1>
	 
</header>

<section>
	<header class="header">Adicionar Conta</header>
	
	<section>

	<div class="campo-importar-xml"/> 

		<div class="contas upload">
			<?php echo $this->Form->create('Conta', array('type' => 'file','action'=>'add')); ?>
				<div style="display:none;">
					<input type="hidden" value="POST" name="_method"/>
				</div>
				
				<div class="input file">
				    <?php echo $this->Form->html('id',array('type'=>'hidden','value'=>$conta['Conta']['id'])); ?>
					<label for="doc_file">Buscar Arquivo:</label>
					<input id="doc_file" class="campo-buscar" type="file" name="data[Conta][doc_file]"/>
					
					<input type="text" id="valor" name="data[Conta][imagem]"/>
					<a id="teste" href="#"><img id="bt-buscar" src="/lifecare/app/webroot/img/botao-buscar.png"/></a>
				</div>

				<div class="submit">
					<input id="bt-submit" type="image" src="/lifecare/app/webroot//img/botao-confirmar.png"/>
				</div>

			<?php echo $this->Form->end() ?>
	
		</div>

		
	</section>
	
</section>

<footer>
		<div class="loaderAjaxCategoriaDIV" style="display:none">
				<?php
					
					echo $this->html->image('ajaxLoaderLifeCare.gif',array('alt'=>'Carregando',
																 'title'=>'Carregando',
																 'class'=>'loaderAjaxCategoria',
																 ));
				?>
				<span>Salvando aguarde...</span>
		</div>	
	<?php
		//echo $this->form->submit( 'botao-salvar.png' ,  array('class' => 'bt-salvar bt-salvarCategoria', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>


</div>

</div>

