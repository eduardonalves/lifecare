<?php 
	$this->start('css');

		echo $this->Html->css('quicklink');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
?>

<?php 
	$this->start('script');

		echo $this->Html->script('jquery-ui/jquery.ui.core.js');
		echo $this->Html->script('jquery-ui/jquery.ui.widget.js');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('jquery-ui/jquery.ui.position.js');
		echo $this->Html->script('jquery-ui/jquery.ui.menu.js');
		echo $this->Html->script('jquery-ui/jquery.ui.autocomplete.js');
		echo $this->Html->script('jquery-ui/jquery.ui.tooltip.js');
		echo $this->Html->script('jquery-ui/custom-combobox.js');
		echo $this->Html->script('picklist-autoselect.js');
		
?>
		<?php
		
		if(isset($allquiclink))
		{
		?>
		<script type="text/javascript">
		var availableTagsQuicklink;
		 $(function() {
			availableTagsQuicklink = [
			<?php
			$jsArray = '';
			foreach($allquicklink as $ql)
			{ 

				$jsArray .= ($jsArray=='') ? '"' . $ql . '"' : "," . '"' . $ql . '"';
				
			}
			echo $jsArray;
			?>
			];
			$( ".nome-quicklink" ).autocomplete({
			source: availableTags
			});
		});
		
		</script>

		<?php
		
		}
		?>
		
<?php
	$this->end();
?>

<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	
	
?>
			

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Cadastrar Quicklink</h1>
</header>

<section>
	<header>Dados Quick Link</header>
	<?php
			
			
		?>
	
	<?php 
		$urlQuickLink= $this->Html->url( null, true );
		$urlQuickLink = $urlQuickLink.'?'.'parametro'.'='.$_GET['parametro'].'&'.'limit='.$_GET['limit']; 
	?>
	
	<section class="coluna-modal">
		<div>
		
		<?php

			echo $this->Form->create('Quicklink');
			echo "<div class=\"ui-widget\">";
			echo $this->Form->input('Quicklink.nome', array('class'=>'nome-quicklink','type'=>'text', 'label'=>'Quick Link:', 'div' => false , 'maxlength' => '20' ));
		?>
			
			<div class='esconder'>
				<?php
					echo $this->Form->input('url',array('value' => $urlQuickLink));
					echo $this->Form->input('user_id',array('value' => $configproduto['Configproduto']['user_id']));
				?>	
			</div>	
		<?php	
			echo "</div>";
			
			?>
	
		</div>
		
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png' ,  array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>

</div>

</div>


<!--
<?php 
	$urlQuickLink= $this->Html->url( null, true );
	$urlQuickLink = $urlQuickLink.'?'.'parametro'.'='.$_GET['parametro']; 

?> 
	<div class="quicklinks form">
	<?php echo $this->Form->create('Quicklink'); ?>
		<fieldset>
			<legend><?php echo __('Add Quicklink'); ?></legend>
		<?php
			echo $this->Form->input('user_id');
			echo $this->Form->input('nome');
			echo $this->Form->input('url', array('value' => $urlQuickLink));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>
</div>
-->


