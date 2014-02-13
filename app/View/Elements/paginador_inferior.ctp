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
		echo $this->Paginator->last('',array('id' => 'paginatorLast'));
	?>
</section>
