<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
		echo $this->Html->css('table');
	$this->end();
?>

<script>

</script>


<header>
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Visualizar', 'title' => 'Visualizar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption31">Visualizar Centro Custo</h1>
</header>

<section> <!---section superior--->

	<header>Dados Gerias</header>
	
	<section class="coluna-esquerda">

		<?php	
			echo $this->Form->input('tipo',array('value'=>h($centrocusto['Centrocusto']['nome']),'label' => 'Status:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','class'=>'tamanho-grande borderZero'));
		?>

	</section>
	
	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('value'=>h($centrocusto['Centrocusto']['limite']),'label' => 'Limite:','class' => 'tamanho-grande borderZero','label' => 'Limite	:','readonly'=>'readonly','onFocus'=>'this.blur();','required'=>'false'));
		?>

	</section>
	
	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('value'=>h($centrocusto['Centrocusto']['limite_usado']),'class' => 'tamanho-grande borderZero','label' => 'Limite Usado:','readonly'=>'readonly','onFocus'=>'this.blur();'));
		?>

	</section>
	
	
	<header>Lista de Centro de Custo</header>
	
	<?php
		$anosConta= array();
		foreach($anos as $an){
			//echo $an['YEAR(`Conta`.`data_emissao`)'];
			foreach ($an as $a){
				
				$anosContaAux=$a['YEAR(`Conta`.`data_emissao`)'];
				$anosConta[''.$anosContaAux.'']= $anosContaAux;
				
			}
		}
		echo $this->form->Create('Centrocusto',array('type' =>'get'));
		$anAtual=date('Y'); 
		echo $this->form->input('y', array('type' => 'select','label'=> 'Selecione o ano', 'options' => array($anosConta), 'default' => $ano));
		
		echo $this->form->end('Enviar');
	?>
	
	<?php
		$i=0;
		foreach($recdesp as $recdes){
			echo $recdes['receita'];
			echo "<br />";
			echo $recdes['despesa'];
			
			echo $i;
			$i++;
		}
	?>
	
</section>
<pre>
	<?php 	print_r($recdesp);?>
</pre>