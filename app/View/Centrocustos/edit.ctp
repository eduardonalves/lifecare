<?php
	$this->start('css');
		echo $this->Html->css('centrocusto');
	$this->end();

	$this->start('script');
	echo $this->Html->script('funcoes_centrocusto.js');
	$this->end();
	
	$this->start('modais');

	$this->end();
?>

<header>
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Editar', 'title' => 'Editar')); ?>

    <h1 class="menuOption31">Editar Centro de Custo</h1>
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
		echo $this->form->input('y', array('type' => 'select','label'=> 'Selecione o ano', 'options' => array($anosConta), 'default' => $ano));
		
		echo $this->form->end('Enviar');
?>	
<?php echo $this->Form->create('Centrocusto'); ?>

	<?php
		echo $this->Form->input('Centrocusto.id');
		echo $this->Form->input('nome', array('label' => 'Nome:','type' => 'text'));
		echo '<span id="validaNome" class="Msg-tooltipDireita" style="display:none">Preencha o Nome</span>';
		echo $this->Form->input('limite',array('label' => 'Limite:','type' => 'text'));
		echo '<span id="validaLimite" class="Msg-tooltipDireita" style="display:none">Preencha o Limite</span>';
		echo $this->Form->input('limite_usado',array('label' => 'Limite Usado:','type' => 'text'));
		echo '<span id="validaLimiteUsado" class="Msg-tooltipDireita" style="display:none">Preencha o Limite Usado</span>';
		
		
		$i=0;
		foreach($recdesp as $recdes){
			if(!empty($recdes)){
				//echo "<br/>";
				if(isset($recdes['IdOrcamento'])){
					echo $recdes['mes'].'<br/>';
					echo $this->Form->input('Orcamentocentro.'.$i.'.id',array('type' => 'hidden', 'value' => $recdes['IdOrcamento']));
					echo $this->Form->input('Orcamentocentro.'.$i.'.limite',array('label' => 'Limite:','type' => 'text', 'value' => $recdes['limite']));
					$i++;
				}
				
			}
			
		}
	?>

</div>

<footer>

    <?php
		echo $this->html->image('botao-salvar.png',array('alt'=>'Salvar','title'=>'Salvar','id'=>'bt-salvarCentroCustoEdit','class'=>'bt-salvar'));
		echo $this->Form->end();
    ?>

</footer>
<pre>
	<?php print_r($recdesp);?>
</pre>