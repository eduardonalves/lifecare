<?php
	$this->start('css');
		echo $this->Html->css('table');
		echo $this->Html->css('centrocusto');
	$this->end();

	$this->start('script');
	echo $this->Html->script('funcoes_centrocusto.js');
	$this->end();
	
	$this->start('modais');

	$this->end();
?>

<header>
    <?php echo $this->Html->image('centro-custo-titulo.png', array('id' => 'cadastrar-titulo', 'alt' => 'Editar', 'title' => 'Editar')); ?>

    <h1 class="menuOption35">Editar Centro de Custo</h1>
</header>

<section> <!---section superior--->

	<header>Dados do Centro de Custo</header>
	
<div class="centrocustos form">
<?php
		$anosConta= array();
		foreach($anos as $an){
			//echo $an['YEAR(`Conta`.`data_emissao`)'];
			foreach ($an as $a){
				
				$anosContaAux=$a['YEAR(`Conta`.`data_emissao`)'];
				$anosConta[''.$anosContaAux.'']= $anosContaAux;
				
			}
		}
		echo $this->form->Create('CentrocustoGet',array('type' =>'get'));
		$anAtual=date('Y'); 
		if(empty($anosConta)){
			 $anosConta[''.$anAtual.'']= $anAtual;
		}
		echo $this->form->input('y', array('type' => 'select','label'=> 'Selecione o ano', 'options' => array($anosConta), 'default' => $ano, 'onchange' => 'submit()'));
		
		echo $this->form->end();
?>	
<?php echo $this->Form->create('Centrocusto'); ?>

	<?php
		echo $this->Form->input('Centrocusto.id');
		echo $this->Form->input('nome', array('label' => 'Nome:','type' => 'text'));
	
		
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
				<?php 
					if(isset($recdes['IdOrcamento'])){
				
					echo $this->Form->input('Orcamentocentro.'.$i.'.id',array('type' => 'hidden', 'value' => $recdes['IdOrcamento']));
					echo $this->Form->input('Orcamentocentro.'.$i.'.limite',array('id' => 'inputLimite', 'label' => false, 'type' => 'text', 'value' => $recdes['limite'], 'style' => 'display: none; width: 50px;'));
					echo '<div id="textLimite">'.$recdes['limite'].'</div>';
					echo $this->Html->image('botao-tabela-editar.png',array('alt'=>'Editar Limite','title'=>'Editar Limite','onclick'=>'editLimite()'));
					$i++;
				} ?>
			</td>
		</tr>
		<?php $i++; } ?>
	</table>
</div>

<footer>

    <?php
		echo $this->html->image('botao-salvar.png',array('alt'=>'Salvar','title'=>'Salvar','id'=>'bt-salvarCentroCustoEdit','class'=>'bt-salvar'));
		echo $this->Form->end();
    ?>

</footer>
