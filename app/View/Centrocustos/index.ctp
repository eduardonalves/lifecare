<?php
	$this->start('css');
		echo $this->Html->css('consulta_financeiro');
		echo $this->Html->css('table');
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('funcoes_centrocusto.js');
	$this->end();

	$this->start('modais');
		echo $this->element('quicklink_addfinanceiro', array('modal'=>'add-quicklink'));
	$this->end();

	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}else{
			$data= " / / ";
		}
		return $data;
	}
?>
<script>
$(document).ready(function() {
	var usoInicioPhp = '<?php ?>' ;
	var usoGet = '$_GET["ql"]';
    });
    
</script>

<?php
	if(isset($pageReload)){
		if($pageReload=='Reload'){
?>

<script>
$(document).ready(function() {
	    setTimeout(function(){
		    location.reload();
	    }, 2000);
    });
</script>

<?php
		}
	}
?>

<header> <!---header--->

	<?php echo $this->Html->image('centro-custo-titulo.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<h1 class="menuOption35">Centro de Custo</h1>

</header> <!---Fim header--->

<section> <!---section superior--->
	<header>Lista de Centros de Custos</header>

<div class="areaTabela">
	
	<?php echo $this->element('paginador_superior');?>
	
<div class="tabelas" id="centrocustos">
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="colunaConta">Ações</th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('Código'); ?></th>
			<th class="colunaConta"><?php echo $this->Paginator->sort('nome'); ?></th>
	</tr>
	
	<?php foreach ($centrocustos as $centrocusto): ?>
	<tr>
		<td class="actions">
			<?php 
				echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Centro de Custo','title'=>'Visualizar Centro de Custo','url'=>array('controller' => 'centrocustos','action' => 'view', $centrocusto['Centrocusto']['id'])));
				
				echo "<hr />";
				
				echo $this->Html->image('botao-tabela-editar.png',array('alt'=>'Editar Centro de Custo','title'=>'Editar Centro de Custo','url'=>array('controller' => 'centrocustos','action' => 'edit', $centrocusto['Centrocusto']['id']),'class'=>'img-edit'));
				
				echo "<hr />";
				
				echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'delete_centrocusto','alt' =>__('Delete'),'title' => 'Excluir Centro de Custo')), array('controller' => 'centrocustos','action' => 'delete', $centrocusto['Centrocusto']['id']),array('escape' => false, 'confirm' => __('Deseja realmente excluir o Centro de Custo '.$centrocusto['Centrocusto']['id'].'?')));
			?>
		</td>
		<td><?php echo h($centrocusto['Centrocusto']['id']); ?>&nbsp;</td>
		<td><?php echo h($centrocusto['Centrocusto']['nome']); ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('paginador_inferior');?>
	</div>
</div>
