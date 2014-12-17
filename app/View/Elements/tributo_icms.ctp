<?php 
  //$this->start('css');
	//echo $this->Html->css('modal_centro_custo');
		//echo $this->Html->css('table');
	//$this->end();
?>

<style>

#div-title h5{
	padding: 0px 5px;
	margin: 0;
	top: -9px;
	display: block;
	position: relative;
	left: 20px;
	background: #F9F9F9;
	width: 82px;
	color: rgb(123, 122, 122);
}

#div-title{
	background: #CCc;
    height: 2px;	
}

.inputs_icms{
	clear: both;
	padding: 0;
	margin: 20px 0px;
}

.bloco_inputs{
	float: left;
	width: 360px;
}

.inputs_icms select{
	height: 23px !important;
}

.margin-label{
	width: 350px;
	margin-left: 20px;
}

.margin-label label{
	width: 145px !important;
	margin-right: 15px !important;
}

.esconde, .esconde_ipi, .esconde_pis, .esconde_cofins{
	display: none;
}
</style>
<script>
$(document).ready(function(){
	//SITUAÇÂO
	$('#select_situacao_icms').click(function(){
		$('.esconde').fadeOut();		
		codigo = $("#select_situacao_icms option:selected").attr('data-inputs');
		if(codigo != '-'){				
			if(codigo.length > 1){
				var campos = codigo.split(',');
			}else{
				var campos = codigo;	
			}
			var i = 0;			
			for(i=0;i<=campos.length;i++){
				$('#mostrar'+campos[i]).fadeIn( "slow" );
			}
		}
	});
});
</script>
<section style="clear:both;">
	<div id="div-title" style="clear:both;"> <h5>Dados ICMS</h5> </div>
	
	<section class="inputs_icms">
		<article class="coluna-esquerda">
			<!-- ############################################## -->
			<div style="clear:both">
				<label>Situação Tributária:</label>
				<select name="data[Icm][0][situacaotribicm_id]" id="select_situacao_icms" class='tamanho-medio'>
					<option data-inputs="-"></option>
					<?php
						$i = 0;
						foreach($situacaotribicms as $situacao){
					?>
							<option data-inputs="<?php echo $situacao['Situacaotribicm']['combinacao']?>" value="<?php echo $situacao['Situacaotribicm']['id']?>" data-codigo="<?php echo $situacao['Situacaotribicm']['codigo'] ?>"><?php echo $situacao['Situacaotribicm']['descricao']; ?></option>
					<?php
						$i++;
						}
					?>	
				</select>
			</div>
			
			<!-- ############################################## -->
			<div style="clear:both" id="mostrar1" data-input="1" class="esconde">
			<label>Modalidade BC:</label>
			<select name="data[Icm][0][modalidadebc_id]" id="select_modalidadebcs" class='tamanho-medio'>
				<option data-inputs="-"></option>
				<?php
					$i = 0;
					foreach($modalidadebcs as $modalidadebc){
				?>
						<option value="<?php echo $modalidadebc['Modalidadebcs']['id'] ?>"><?php echo $modalidadebc['Modalidadebcs']['descricao']; ?></option>
				<?php
					$i++;
					}
				?>	
			</select>
			</div>
			
			<!-- ############################################## -->
			<div style="clear:both" id="mostrar2" data-input="2" class="esconde">
				<label>Modalidade BC ST:</label>
				<select name="data[Icm][0][modalidadebcst_id]" id="select_modalidadebcst" class='tamanho-medio'>
					<option data-inputs="-"></option>
					<?php
						$i = 0;
						foreach($modalidadebcsts as $modalidadebcst){
					?>
							<option value="<?php echo $modalidadebcst['Modalidadebcsts']['id'] ?>"><?php echo $modalidadebcst['Modalidadebcsts']['descricao']; ?></option>
					<?php
						$i++;
						}
					?>	
				</select>
			</div>
			
			<!-- ############################################## -->
			<div style="clear:both" id="mostrar3" data-input="3" class="esconde">
			<label>Motivo Desoneração:</label>
			<select name="data[Icm][0][motivodesoneracao_id]" id="select_motivodesoneracao" class='tamanho-medio'>
				<option></option>
				<?php
					$i = 0;
					foreach($motivodesoneracaos as $motivodesoneracao){
				?>
						<option value="<?php echo $motivodesoneracao['Motivodesoneracaos']['id']?>"><?php echo $motivodesoneracao['Motivodesoneracaos']['descricao']; ?></option>
				<?php
					$i++;
					}
				?>	
			</select>
			</div>
		</article>	
		
		<article class="coluna-central margin-label">
			<!-- ############################################## -->
			<div style="clear:both">
			<label>Origem:</label>
			<select name="data[Produto][origem_id]" id="select_origem" class='tamanho-medio'>
				<option></option>
				<?php
					$i = 0;
					foreach($origens as $origen){
				?>
						<option value="<?php echo $origen['Origems']['id']?>" data-codigo="<?php echo $origen['Origems']['codigo'] ?>"><?php echo $origen['Origems']['descricao']; ?></option>
				<?php
					$i++;
					}
				?>	
			</select>
			</div>
			
			<?php
				echo "<div class='esconde' id='mostrar4' data-input='4'>";
					echo $this->Form->input('Icm.0.aliq_icms',array('label'=>'Aliquota ICMS (%):','class'=>'tamanho-medio'));
				echo "</div>";
				
				echo "<div class='esconde' id='mostrar5' data-input='5'>";
					echo $this->Form->input('Icm.0.alq_icmsst',array('label'=>'Aliquota ICMS ST (%):','class'=>'tamanho-medio'));
				echo "</div>";
				
				echo "<div class='esconde'  id='mostrar6'  data-input='6'>";
					echo $this->Form->input('Icm.0.alq_calccred',array('label'=>'Aliquota Calc. Créd (%):','class'=>'tamanho-medio'));
				echo "</div>";
				
				echo "<div class='esconde'  id='mostrar7'  data-input='7'>";
					echo $this->Form->input('Icm.0.reducaobasecalcst',array('label'=>'Redução Base Calc. ST:','class'=>'tamanho-medio'));		
				echo "</div>";
			?>		
		</article>
		
		<article class="coluna-direita">
			<?php
				echo "<div class='esconde'  id='mostrar8'  data-input='8'>";
					echo $this->Form->input('Icm.0.precounitpautast',array('label'=>'Preço Unit. Pauta ST:','class'=>'tamanho-medio'));
				echo "</div>";
				
				echo "<div class='esconde'  id='mostrar9'  data-input='9'>";
					echo $this->Form->input('Icm.0.margemvaloradic',array('label'=>'Margem Valor Adic. :','class'=>'tamanho-medio'));			
				echo "</div>";
				
				echo "<div class='esconde'  id='mostrar10'  data-input='10'>";
					echo $this->Form->input('Icm.0.reducaobasecalc',array('label'=>'Redução Base Calc.:','class'=>'tamanho-medio'));			
				echo "</div>";
			?>		
		</article>
		
	</section>

</section>


 
