<script>
$(document).ready(function(){
	//SITUAÇÂO
	$('#select_situacao_cofins').click(function(){
		$('.esconde').fadeOut();		
		codigo = $("#select_situacao_cofins option:selected").attr('data-inputcofins');
		if(codigo != '-' ){				
			if(codigo.length > 1){
				var campos = codigo.split(',');
			}else{
				var campos = codigo;	
			}
			var i = 0;			
			var tipo = 0;			
			for(i=0;i<=campos.length;i++){
				$('#mostrar_cofins'+campos[i]).fadeIn( "slow" );
				if(campos[i] == 4){ tipo = campos[i]; }
			}
			
			
			if(tipo != '' || tipo != 0){
				tipo = $("#tipocalculo_cofins option:selected").val();
				if(tipo == "PORCENTAGEM"){
					$('.tipo_valor_cofins').hide( "fast" );
					$('.tipo_aliquota_cofins').fadeIn( "slow" );
				}else{
					$('.tipo_aliquota_cofins').hide( "fast" )
					$('.tipo_valor_cofins').fadeIn( "slow" );		
				}
			}
		}
	});	
	
	$('#tipocalculo_cofins').click(function(){
		tipo = $("#tipocalculo_cofins option:selected").val();
		if(tipo == "PORCENTAGEM"){
			$('.tipo_valor_cofins').hide( "fast" );
			$('.tipo_aliquota_cofins').fadeIn( "slow" );
		}else{
			$('.tipo_aliquota_cofins').hide( "fast" )
			$('.tipo_valor_cofins').fadeIn( "slow" );		
		}
	});
	
	$('#tipodecalsubtrib_cofins').click(function(){
		tipo = $("#tipodecalsubtrib_cofins option:selected").val();
		if(tipo == "PORCENTAGEM"){
			$('#tipo_valor_cofins_st').hide( "fast" );
			$('#tipo_aliquota_cofins_st').fadeIn( "slow" );
		}else{
			$('#tipo_aliquota_cofins_st').hide( "fast" )
			$('#tipo_valor_cofins_st').fadeIn( "slow" );		
		}
	});
});
</script>
<section style="clear:both;top:40px;">
	<div id="div-title" style="clear:both;"> <h5 style="width: 110px;">Dados COFINS</h5> </div>
	
	<section class="inputs_icms">
	
		<article class="coluna-esquerda">
			<!-- ############################################## -->
			<div style="clear:both">
			<label>Situação Tributária:</label>
			<select name="data[Cofins][0][situacaotribcofin_id]" id="select_situacao_cofins" class='tamanho-medio'>
				<option data-inputs="-"></option>
				<?php
					$i = 0;
					foreach($situacaotribcofins as $situacaotribcofin){
				?>
						<option data-inputcofins="<?php echo $situacaotribcofin['Situacaotribcofins']['combinacao']?>" value="<?php echo $situacaotribcofin['Situacaotribcofins']['id']?>" data-codigo="<?php echo $situacaotribcofin['Situacaotribcofins']['codigo'] ?>"><?php echo $situacaotribcofin['Situacaotribcofins']['descricao']; ?></option>
				<?php
					$i++;
					}
				?>	
			</select>
			</div>
			
			<div style="clear:both">
				<!-- MOSTRAR PIS 1 TIPO DE CÁLCULO SUB TRIB -->
				<?php
					echo $this->Form->input('Cofins.0.tipodecalsubtrib',array('id'=>'tipodecalsubtrib_cofins','label'=>'Tipo de cálc. Subs:','class'=>'tamanho-medio','type'=>'select','options'=>array(''=>'','PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor')));
				?>
			</div>	
			
	
		</article>
		
		<article class="coluna-central">
			<!-- MOSTRAR PIS 1 TIPO DE CÁLCULO COMUM -->
			<div style="clear:both" id="mostrar_cofins4" class="esconde">
				<?php
					echo $this->Form->input('Cofins.0.tipodecalculo',array('id'=>'tipocalculo_cofins','label'=>'Tipo de Cálculo:','class'=>'tamanho-medio','type'=>'select','options'=>array('PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor')));
				?>
			</div>	
			
			<!-- ALÍQUOTA QUE IRA MOSTRAR EM ALGUNS CASOS-->
			<div style="clear:both" id="mostrar_cofins1" class="tipo_aliquota_cofins esconde">
				<?php
					echo $this->Form->input('Cofins.0.alq_cofins',array('label'=>'Aliquota Cofins:','class'=>'tamanho-medio'));
				?>
			</div>
			
			<!-- VALOR UNID TRIB-->
			<div style="clear:both" id="mostrar_cofins2" class="tipo_valor_cofins esconde">
				<?php
					echo $this->Form->input('Cofins.0.valorunitcofins',array('label'=>'Valor Unid. Trib. Cofins:','class'=>'tamanho-medio'));
				?>
			</div>	
			
			
			<!-- CAMPOS DO TIPO DE CALC SUBSTR TRIB-->
			<div style="clear:both;display:none;" id="tipo_aliquota_cofins_st">
				<?php
					echo $this->Form->input('Cofins.0.alq_cofinsst',array('label'=>'Aliquota Cofins ST:','class'=>'tamanho-medio'));
				?>
			</div>
			
			<div style="clear:both;display:none;" id="tipo_valor_cofins_st">
				<?php
					echo $this->Form->input('Cofins.0.valunidcofinsst',array('label'=>'Valor Trib. Cofins ST:','class'=>'tamanho-medio'));
				?>
			</div>
			
		</article>
		
		<article class="coluna-direita">
		</article>	

	</section>	
</section>
<div style="height:20px;clear:both;"></div>
