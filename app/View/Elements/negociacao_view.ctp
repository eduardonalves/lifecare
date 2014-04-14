<section class='sectionNegociacao'> <!---section Baixo--->
	<header>Dados da Negociação</header>
	
	<fieldset class="dadosRepetidos">
	    <legend>Dados da Negociação</legend>
	
		<div class="area-dadosbanc">
			<div class="bloco-area">
				<section class="coluna-esquerda">
					<?php
						echo $this->Form->input('valor', array('label' => 'Valor:','class'=>'tamanho-medio borderZero','disabled'=>'disabled'));
					?>
				</section>

				<section class="coluna-central" >
					<?php
						echo $this->Form->input('data',array('label' => 'Data:','class'=>'tamanho-medio borderZero','disabled'=>'disabled'));
					?>
				</section>
		
				<section class="coluna-direita" >
					<?php
						echo $this->Form->input('usuario',array('label' => 'Negociado por:','class'=>'tamanho-medio borderZero','disabled'=>'disabled'));
					?>
				</section>
			</div>
		</div>
	
	</fieldset>
	
	<span style="display:none;" id="quantiaCreditos"></span>
</section>
