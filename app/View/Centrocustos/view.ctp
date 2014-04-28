<?php
	$this->start('css');
		echo $this->Html->css('centrocusto');
		echo $this->Html->css('table');
	$this->end();
?>

<script>

</script>


<header>
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Visualizar', 'title' => 'Visualizar')); ?>

    <h1 class="menuOption31">Visualizar Centros de Custo</h1>
</header>

<section> <!---section superior--->

	<header>Dados Gerais</header>
	
	<section class="coluna-esquerda">

		<?php	
			echo $this->Form->input('tipo',array('value'=>h($centrocusto['Centrocusto']['nome']),'label' => 'Nome:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','class'=>'tamanho-grande borderZero'));
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
	
	
	<header>Lista de Centros de Custo</header>
	
	<?php
		$anosConta= array();
		foreach($anos as $an){
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
	<table>
		<tr>
			<th class="colunaConta">
			Mês
			</th>
			<th class="colunaConta">
			Receita
			</th>
			<th class="colunaConta">
			Despesa
			</th>
			<th class="colunaConta">
			Limite
			</th>
		</tr>
		<?php
		$i=0;
		foreach($recdesp as $recdes){
			?>
		<tr>
			<td><?php	if($i == 0){ echo 'Janeiro'; }
						if($i == 1){ echo 'Fevereiro'; }
						if($i == 2){ echo 'Março'; }
						if($i == 3){ echo 'Abril'; }
						if($i == 4){ echo 'Maio'; }
						if($i == 5){ echo 'Junho'; }
						if($i == 6){ echo 'Julho'; }
						if($i == 7){ echo 'Agosto'; }
						if($i == 8){ echo 'Setembro'; }
						if($i == 9){ echo 'Outubro'; }
						if($i == 10){ echo 'Novembro'; }
						if($i == 11){ echo 'Dezembro'; }?>
			</td>
			<td>
				<?php echo $recdes['receita']; ?>
			</td>
			<td>
				<?php echo $recdes['despesa']; ?>
			</td>
			<td>
				<?php echo $recdes['limite']; ?>
			</td>
		</tr>
		<?php $i++; } ?>
	</table>

</section>
