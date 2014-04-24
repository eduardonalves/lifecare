<?php 
	$this->start('css');

		echo $this->Html->css('modal_quicklink');
		echo $this->Html->css('table');
		
	$this->end();
?>

<?php 
	$this->start('script');


		
?>
		<?php
		
		if(isset($allquicklink))
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
	 <h1>Cadastrar Pesquisa Rápida</h1>
</header>

<section>
	<header>Dados Pesquisa Rápida</header>
	<?php
			
			
		?>
	
	<?php 
		$urlQuickLink= $this->Html->url( null, true );
	//	$urlQuickLink = $urlQuickLink.'?'.'parametro'.'='.$_GET['parametro'].'&'.'limit='.$_GET['limit']; 
		$urlQuickLink = $urlQuickLink.'?'.'parametro'.'='.$_GET['parametro']; 
	?>
	
	<section class="coluna-modal">
		<div>
		
		<?php

			echo $this->Form->create('Quicklink', array('id' => 'formCadQuicklink'));
			echo "<div class=\"ui-widget\">";
			echo $this->Form->input('Quicklink.nome', array('class'=>'nome-quicklink','type'=>'text', 'label'=>'Nome<span class="campo-obrigatorio">*</span>:', 'div' => false , 'maxlength' => '50' ));
			echo "<span id='spanQuicklink' class='Msg' style='display:none'>Preencha o Campo Nome</span>";
		?>
			
			<div class='esconder'>
				<?php
					echo $this->Form->input('url',array('value' => $urlQuickLink, 'type' => 'hidden'));
					echo $this->Form->input('user_id',array('value' => $userid, 'type' => 'hidden'));
					echo $this->Form->input('tipo',array('value' => 'FINANCEIRO', 'type' => 'hidden'));
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
		echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-salvar-quicklink','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
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
