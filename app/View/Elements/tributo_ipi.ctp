<script>
$(document).ready(function(){
	//SITUAÇÂO
	$('#select_situacao_ipi').click(function(){
		$('.esconde_ipi').fadeOut();		
		codigo = $("#select_situacao_ipi option:selected").attr('data-inputipi');
		if(codigo != '-' || codigo != ''){				
			if(codigo.length > 1){
				var campos = codigo.split(',');
			}else{
				var campos = codigo;	
			}
			var i = 0;			
			var tipo = 0;			
			for(i=0;i<=campos.length;i++){
				$('#mostrar_ipi'+campos[i]).fadeIn( "slow" );
				if(campos[i] == 5){ tipo = campos[i]; }
			}
			
			if(tipo != '' || tipo != 0){
				tipo = $("#tipocalculo option:selected").val();
				if(tipo == "PORCENTAGEM"){
					$('#tipo_aliquota').fadeIn( "slow" );
				}else{
					$('#tipo_valor').fadeIn( "slow" );
				}
			}
		}
	});
	
	
	$('#tipocalculo').click(function(){
		tipo = $("#tipocalculo option:selected").val();
		if(tipo == "PORCENTAGEM"){
			$('#tipo_valor').hide( "fast" );
			$('#tipo_aliquota').fadeIn( "slow" );
		}else{
			$('#tipo_aliquota').hide( "fast" )
			$('#tipo_valor').fadeIn( "slow" );		
		}
	});
});
</script>
<section style="clear:both;top:20px;">
	<div id="div-title" style="clear:both;"> <h5>Dados IPI</h5> </div>
	
	<section class="inputs_icms">
	
		<article class="coluna-esquerda">
			<!-- ############################################## -->
			<div style="clear:both">
			<label>Situação Tributária:</label>
			<select name="data[Ipi][0][situacaotribipi_id]" id="select_situacao_ipi" class='tamanho-medio'>
				<option data-inputs="-"></option>
				<?php
					$i = 0;
					foreach($situacaotribipi as $situacaoipi){
				?>
						<option data-inputipi="<?php echo $situacaoipi['Situacaotribipi']['combinacao']?>" value="<?php echo $situacaoipi['Situacaotribipi']['id']?>" data-codigo="<?php echo $situacaoipi['Situacaotribipi']['codigo'] ?>"><?php echo $situacaoipi['Situacaotribipi']['descricao']; ?></option>
				<?php
					$i++;
					}
				?>	
			</select>
			</div>
			
			<div style="clear:both" id="mostrar_ipi1" class="esconde_ipi">
				<?php
					echo $this->Form->input('Ipi.0.classe_enquadramento',array('label'=>'Classe Enquadramento:','class'=>'tamanho-medio'));
				?>
			</div>
			
			<div style="clear:both" id="mostrar_ipi2" class="esconde_ipi">
				<?php
					echo $this->Form->input('Ipi.0.cnpj_produtor',array('label'=>'CNPJ Produtor:','class'=>'tamanho-medio'));
				?>
			</div>			
		</article>
		
		<article class="coluna-central">
			<div style="clear:both" id="mostrar_ipi3" class="esconde_ipi">
				<?php
					echo $this->Form->input('Ipi.0.codigo_selo',array('label'=>'Cód. Selo Controle IPI:','class'=>'tamanho-medio'));
				?>
			</div>
			
			<div style="clear:both" id="mostrar_ipi4" class="esconde_ipi">
				<?php
					echo $this->Form->input('Ipi.0.qtd_selo',array('label'=>'Qtd. Selo IPI','class'=>'tamanho-medio'));
				?>
			</div>
		
		</article>
		
		<article class="coluna-direita">
			
			<div style="clear:both" id="mostrar_ipi5" class="esconde_ipi">
				<?php
					echo $this->Form->input('Ipi.0.tipodecalculo',array('id'=>'tipocalculo','label'=>'Tipo de Cálculo','class'=>'tamanho-medio','type'=>'select','options'=>array('PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor')));
				?>
			</div>	
			
			<div style="clear:both" id="tipo_aliquota" class="esconde_ipi">
				<?php
					echo $this->Form->input('Ipi.0.aliq_ipi',array('label'=>'Aliquota','class'=>'tamanho-medio'));
				?>
			</div>
			
			<div style="clear:both" id="tipo_valor" class="esconde_ipi">
				<?php
					echo $this->Form->input('Ipi.0.valorporunid',array('label'=>'Valor por Unid.','class'=>'tamanho-medio'));
				?>
			</div>
			
			
		
		</article>
	
	
	</section>
	
	
</section>
