<script>
$(document).ready(function(){
	//SITUAÇÂO
	$('#select_situacao_pis').click(function(){
		$('.esconde').fadeOut();		
		codigo = $("#select_situacao_pis option:selected").attr('data-inputpis');
		if(codigo != '-'){				
			var campos = codigo.split(',');
			var i = 0;			
			var tipo = 0;			
			for(i=0;i<=campos.length;i++){
				$('#mostrar_pis'+campos[i]).fadeIn( "slow" );
				if(campos[i] == 1){ tipo = campos[i]; }
			}
			
			if(tipo != '' || tipo != 0){
				tipo = $("#tipocalculo_pis option:selected").val();
				if(tipo == "PORCENTAGEM"){
					$('#tipo_aliquota_pis').fadeIn( "slow" );
				}else{
					$('#tipo_valor_pis').fadeIn( "slow" );
				}
			}
		}
	});	
	
	$('#tipocalculo_pis').click(function(){
		tipo = $("#tipocalculo_pis option:selected").val();
		if(tipo == "PORCENTAGEM"){
			$('#tipo_valor_pis').hide( "fast" );
			$('#tipo_aliquota_pis').fadeIn( "slow" );
		}else{
			$('#tipo_aliquota_pis').hide( "fast" )
			$('#tipo_valor_pis').fadeIn( "slow" );		
		}
	});
	
	$('#tipodecalsubtrib').click(function(){
		tipo = $("#tipodecalsubtrib option:selected").val();
		if(tipo == "PORCENTAGEM"){
			$('#tipo_valor_pis_st').hide( "fast" );
			$('#tipo_aliquota_pis_st').fadeIn( "slow" );
		}else{
			$('#tipo_aliquota_pis_st').hide( "fast" )
			$('#tipo_valor_pis_st').fadeIn( "slow" );		
		}
	});
});
</script>
<section style="clear:both;top:40px;">
	<div id="div-title" style="clear:both;"> <h5>Dados PIS</h5> </div>
	
	<section class="inputs_icms">
	
		<article class="coluna-esquerda">
			<!-- ############################################## -->
			<div style="clear:both">
			<label>Situação Tributária:</label>
			<select name="data[Pis][0][situacaotribpi_id]" id="select_situacao_pis" class='tamanho-medio'>
				<option data-inputs="-"></option>
				<?php
					$i = 0;
					foreach($situacaotribpis as $situacaopis){
				?>
						<option data-inputpis="<?php echo $situacaopis['Situacaotribpis']['combinacao']?>" value="<?php echo $situacaopis['Situacaotribpis']['id']?>" data-codigo="<?php echo $situacaopis['Situacaotribpis']['codigo'] ?>"><?php echo $situacaopis['Situacaotribpis']['descricao']; ?></option>
				<?php
					$i++;
					}
				?>	
			</select>
			</div>
			
			<div style="clear:both">
				<?php
					echo $this->Form->input('Ipi.0.tipodecalsubtrib',array('id'=>'tipodecalsubtrib','label'=>'Tipo de cálculo Subst. Trib.','class'=>'tamanho-medio','type'=>'select','options'=>array('PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor')));
				?>
			</div>	
			
	
		</article>
		
		<article class="coluna-central">
			<div style="clear:both" id="mostrar_pis1" class="esconde">
				<?php
					echo $this->Form->input('Pis.0.tipodecalculo',array('id'=>'tipocalculo_pis','label'=>'Tipo de Cálculo','class'=>'tamanho-medio','type'=>'select','options'=>array('PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor')));
				?>
			</div>	
			
			<div style="clear:both" id="tipo_aliquota_pis" class="esconde">
				<?php
					echo $this->Form->input('Pis.0.alq_pis',array('label'=>'Aliquota PIS','class'=>'tamanho-medio'));
				?>
			</div>
			
			<div style="clear:both" id="tipo_valor_pis" class="esconde">
				<?php
					echo $this->Form->input('Pis.0.valundtrib',array('label'=>'Valor por Unid.','class'=>'tamanho-medio'));
				?>
			</div>	
			
			<div style="clear:both;display:none;" id="tipo_aliquota_pis_st">
				<?php
					echo $this->Form->input('Pis.0.alq_pisst',array('label'=>'Aliquota PIS ST','class'=>'tamanho-medio'));
				?>
			</div>
			
			<div style="clear:both;display:none;" id="tipo_valor_pis_st">
				<?php
					echo $this->Form->input('Pis.0.valunidpisst',array('label'=>'Valor Und. Trib. PIS ST.','class'=>'tamanho-medio'));
				?>
			</div>
			
		</article>
		
		<article class="coluna-direita">
			
			
		</article>	
	</section>	
</section>
<div style="height:20px;clear:both;"></div>
