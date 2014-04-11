   
<section class='clearBoth'> <!---section Baixo--->
	 <header>Dados da Negociação</header>

  <?php
	$y=0;
	foreach($conta['Negociacao'] as $negociacaos){

    ?>


	
	<fieldset class="clearBoth">
	    <legend>Dados da Negociação <?php echo $y+1; ?></legend>
	
		<div class="area-dadosbanc">
			<div class="bloco-area">
				<section class="coluna-esquerda">
					<?php
					    echo $this->Form->input('Negociacao.'.$y.'.valor', array('type' => 'text','label' => 'Valor:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' =>number_format($negociacaos['valor'], 2, ',', '.'))); echo $this->Form->input('Negociacao.'.$y.'.tipo_pagamento', array('type' => 'text','label' => 'Tipo de Pagamento:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' =>$negociacaos['tipo_pagamento']));
					?>
				</section>

				<section class="coluna-central" >
					<?php
					    echo $this->Form->input('Negociacao.'.$y.'.data',array('type' => 'text','label' => 'Data de Negociação:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' => formatDateToView($negociacaos['data'])));
					    echo $this->Form->input('Negociacao.'.$y.'.forma_pagamento',array('type' => 'text','label' => 'Forma de Pagamento:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' => $negociacaos['forma_pagamento']));
					?>
				</section>
		
				<section class="coluna-direita" >
					<?php
					    echo $this->Form->input('Negociacao.'.$y.'.user_id',array('type' => 'text','label' => 'Negociado por:','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' =>$negociacaos['user_id']));
					    echo $this->Form->input('Negociacao.'.$y.'.numero_parcela',array('type' => 'text','label' => 'Número de Parcela(s):','class'=>'tamanho-medio borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','value' =>$negociacaos['numero_parcela']));
					?>
				</section>
			</div>
		</div>
	
	</fieldset>
	


<?php    
    $y++;}

    echo $this->html->image('adicionar-negociacao.png',array('alt'=>'Adicionar negociação','title'=>'Adicionar Negociação','id'=>'negociacao','class'=>'bt-direita','style' => 'display:none'));
    echo $this->html->image('adicionar-negociacao-desativado.png',array('alt'=>'Negociação desabilitada','title'=>'Negociação desabilitada','id'=>'bt-negociacaoDesabilitado','class'=>'bt-direita'));
?>
  </section>
