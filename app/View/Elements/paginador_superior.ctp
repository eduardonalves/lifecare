<?php

	$this->start('script');
?>
	
	<script type="text/javascript">
	
	$(document).ready( function () {
	
		$("#select-rpp").bind( "change" , function() {
	
			$("#PaginatorIndexForm").submit();
			$("#PaginatorEditForm").submit();
			
		});
		
	});
	
	
	</script>
	
	<?php
	
	$this->end();

?>

<section class="paging">

	<?php
		echo $this->Paginator->first('',array('id' => 'paginatorFirst'));
		echo $this->Paginator->prev('' . __(''), array(), null, array('class' => 'prev disabled'));
	?>	

	<span class="separador">

		<?php echo $this->Paginator->counter(array('format' => __('Página {:page}/{:pages}'))); ?>

	</span>

	<?php
		echo $this->Paginator->next(__('') . '', array(), null, array('class' => ''));
		echo $this->Paginator->last(' ',array('id' => 'paginatorLast'));
	?>

	<div class='resultado-total'>
		<div id="pagQtdResultado" class="limit-table">
			<?php 
				echo $this->Form->create('Paginator', array('type'=>'GET'));
				
					echo $this->Form->input('Paginate.limit', array('type'=>'select', 'value'=>$this->request->query['limit'], 'id'=>'select-rpp', 'label'=>'Resultados por Página: ', 'options'=> array(15=>15,20=>20,40=>40,45=>45,60=>60)));
					if(isset($_GET['parametro'])) echo $this->Form->input('Paginate.limit', array('type'=>'hidden', 'value'=>$_GET['parametro'], 'id'=>'parametro', 'name'=>'parametro'));

				echo $this->Form->end();
			?>
		</div>
		
		<div id="pagResultado" class="resultado-total">
			<?php
				if(isset($cntProdutos)){
					echo 'Total resultados da pesquisa: ' . $cntProdutos; //$this->Paginator->counter(array('format' => __('{:count}')));
				}else{
					echo 'Total resultados da pesquisa: ' . $this->Paginator->counter(array('format' => __('{:count}')));
				}
			?>
		</div>
		
		<div id="pagValorTotal" class="">
			<?php
				if(isset($valortotal)){
					echo 'Total valor das contas: R$ ' .number_format($valortotal, 2, ',', '.'); //$this->Paginator->counter(array('format' => __('{:count}')));
				}
			?>
		</div>
	</div>
</section>
