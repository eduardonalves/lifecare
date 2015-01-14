<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
		echo $this->Html->css('edit_produtos');
	$this->end();

	$this->start('script');
		echo $this->Html->script('picklist-autoselect.js');
?>
		<script type="text/javascript">
			$(document).ready( function() {
				$("#rightValues option:selected").remove();
			});
		</script>
		
<?php
	$this->end();
	function converterMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
?>

<header>
	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	
	 <?php
			if(isset($telaAbas)){
				echo '<h1 class="menuOption'.$telaAbas.'">Consultas</h1>';
			}else{
				echo '<h1 class="menuOption21">Consultas</h1>';
			}
		?>

<style>
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
	
	//SITUAÇÂO ICMS INICIO #############################################
	start_icms = $("#select_situacao_icms option:selected").attr('data-inputs');
	if(start_icms != '-'){				
		if(start_icms.length > 1){
			campos = start_icms.split(',');
		}else{
			campos = start_icms;	
		}
		var icm = 0;			
		for(icm=0;icm<=campos.length;icm++){
			$('#mostrar'+campos[icm]).fadeIn("slow");
		}
	}
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
	//SITUAÇÂO ICMS FIM ################################################
	
	//SITUAÇÂO IPI INICIO ##############################################	
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
	//SITUAÇÂO IPI FIM ################################################
	
	//SITUAÇÂO PIS INICIO #############################################	
		codigopis = $("#select_situacao_pis option:selected").attr('data-inputpis');
		if(codigopis != '-' ){				
			if(codigopis.length > 1){
				var campos = codigopis.split(',');
			}else{
				var campos = codigopis;	
			}
			var i = 0;			
			var tipo = 0;			
			for(i=0;i<=campos.length;i++){
				$('#mostrar_pis'+campos[i]).fadeIn( "slow" );
				if(campos[i] == 1){ tipo = campos[i]; }
			}			
			if(tipo != '' || tipo != 0){
				tipo = $("#tipocalculo_pis option:selected").val();
				if(tipo == "PORCENTAGEM"){
					$('.tipo_valor_pis').hide( "fast" );
					$('.tipo_aliquota_pis').fadeIn( "slow" );
				}else{
					$('.tipo_aliquota_pis').hide( "fast" )
					$('.tipo_valor_pis').fadeIn( "slow" );		
				}
			}
		}
	
	$('#select_situacao_pis').click(function(){
		$('.esconde_pis').fadeOut();		
		codigo = $("#select_situacao_pis option:selected").attr('data-inputpis');
		if(codigo != '-' ){				
			if(codigo.length > 1){
				var campos = codigo.split(',');
			}else{
				var campos = codigo;	
			}
			var i = 0;			
			var tipo = 0;			
			for(i=0;i<=campos.length;i++){
				$('#mostrar_pis'+campos[i]).fadeIn( "slow" );
				if(campos[i] == 1){ tipo = campos[i]; }
			}
			
			
			if(tipo != '' || tipo != 0){
				tipo = $("#tipocalculo_pis option:selected").val();
				if(tipo == "PORCENTAGEM"){
					$('.tipo_valor_pis').hide( "fast" );
					$('.tipo_aliquota_pis').fadeIn( "slow" );
				}else{
					$('.tipo_aliquota_pis').hide( "fast" )
					$('.tipo_valor_pis').fadeIn( "slow" );		
				}
			}
		}
	});	
	
	$('#tipocalculo_pis').click(function(){
		tipo = $("#tipocalculo_pis option:selected").val();
		if(tipo == "PORCENTAGEM"){
			$('.tipo_valor_pis').hide( "fast" );
			$('.tipo_aliquota_pis').fadeIn( "slow" );
		}else{
			$('.tipo_aliquota_pis').hide( "fast" )
			$('.tipo_valor_pis').fadeIn( "slow" );		
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
	//SITUAÇÂO PIS FIM #############################################
	
	
	//SITUAÇÂO COFINS INICIO ###########################################
	
	codigocofin = $("#select_situacao_cofins option:selected").attr('data-inputcofins');
		if(codigocofin != '-' ){				
			if(codigocofin.length > 1){
				var campos = codigocofin.split(',');
			}else{
				var campos = codigocofin;	
			}
			var i = 0;			
			var tipo = 0;			
			for(i=0;i<=campos.length;i++){
				$('#mostrar_cofins'+campos[i]).fadeIn( "slow" );
				if(campos[i] == 1){ tipo = campos[i]; }
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
	
	$('#select_situacao_cofins').click(function(){
		$('.esconde_cofins').fadeOut();		
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
				if(campos[i] == 1){ tipo = campos[i]; }
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
	//SITUAÇÂO COFINS FIM ###########################################
	
});
</script>
		
</header>

<section><!--SECTION SUPERIOR--> 
	<header>Editar Detalhes do Produto</header>

	<section id="coluna-esquerda" class="coluna-esquerda">
		<fieldset class="fieldset-esquerda">
			<div class="coluna-content">

				<?php
					echo $this->Form->create('Produto',array('id'=>'FormEditSubmit'));
					echo $this->Form->input('Produto.id');					
					echo $this->Form->input('Produto.codigo', array('type'=>'text','label'=>'Código:','value'=>h($produto['Produto']['id']),'class'=>'','disabled'=>'disabled'));
					echo $this->Form->input('Produto.codigoEan', array('type'=>'text','label'=>'Código Barras:','value'=>h($produto['Produto']['codigoEan']),'class'=>'tamanho-medio codigoean', 'maxlength' => '20'));				
					echo $this->Form->input('Produto.registro', array('type'=>'text','label'=>'Registro Anvisa:','value'=>h($produto['Produto']['registro']),'class'=>'tamanho-medio', 'maxlength' => '20'));
					echo $this->Form->input('Produto.nome', array('required'=>'true','label'=>'Nome<span class="campo-obrigatorio">*</span>:','allowEmpty' => 'false','type'=>'text','value'=>h($produto['Produto']['nome']),'class'=>'tamanho-medio validaNome','maxlength' => '100'));					echo '<span id="validaNome" class="Msg tooltipMensagemErroDireta" style="display:none">Preencha o campo Nome</span>';
					echo $this->Form->input('Produto.nomeComercial', array('label'=>'Nome Comercial:','type'=>'text','value'=>h($produto['Produto']['nomeComercial']),'class'=>'tamanho-medio validaNome','maxlength' => '100'));
					echo $this->Form->input('Produto.principioAtivo', array('label'=>'Princípio Ativo:','type'=>'text','value'=>h($produto['Produto']['principioAtivo']),'class'=>'tamanho-medio validaNome','maxlength' => '100'));					
					echo $this->Form->input('Produto.composicao', array('type'=>'text','label'=>'Composição:','value'=>h($produto['Produto']['composicao']),'class'=>'tamanho-medio', 'maxlength' => '100'));
					echo $this->Form->input('Produto.dosagem', array('type'=>'text','label'=>'Dosagem:','value'=>h($produto['Produto']['dosagem']),'class'=>'tamanho-pequeno', 'maxlength' => '100'));					
					echo $this->Form->input('Produto.unidade', array('label'=>'Unidade<span class="campo-obrigatorio">*</span>:','class'=>'validaUnidade','type' => 'select','options'=>$tiposUnidades));
					echo '<span id="validaUnidade" class="tooltipMensagemErroDireta" style="display:none">Selecione a Unidade</span>';
					//echo $this->Form->input('Categoria', array('class'=>'select-multiple','label'=>'Categoria:'));
				?>
				<div class="pick-label">
					<label>Categoria  </label>
				</div>
				<div class="picklist"><!-- ## PICK-LIST ## INICIO -->	
					<span class="titulo add">Adicionadas</span>
					<span class="titulo todas">Todas</span>
					<section class="">
						<div>
							
							<?php echo $this->Form->input('CategoriaCategoria', array('id'=>'leftValues_', 'type'=>'hidden', 'size'=>'5', 'div'=>false, 'label'=>false, 'name'=>'data[Categoria][Categoria]')); ?>
							
							<select id="leftValues" size="5" multiple="multiple" name="data[Categoria][Categoria][]">
								<pre>
								<?php print_r($categorias); ?>
								</pre>
							<?php foreach($produto['Categoria'] as $cat): ?>

								<option value="<?php echo $cat['id']; ?>" selected="selected"><?php echo $cat['nome']; ?></option>

							<?php endforeach; ?>

							</select>
						</div>

						<div class="pick-bt">
							<input type="button" id="btnLeft" value="&lt;&lt;" />
							<input type="button" id="btnRight" value="&gt;&gt;" />
						</div>

						<div>
							<?php echo $this->Form->input('Categoria', array('id'=>'rightValues', 'class'=>'select-multiple', 'size'=>'5', 'div'=>false, 'label'=>false, 'name'=>'Cat')); ?>					    
						</div>
					</section>
				</div> <!-- ## PICK-LIST ## FIM -->
				<?php
					echo $this->Form->input('Produto.descricao', array('rows' => '3','cols' => '4','label'=>'Descrição:','class'=>'textarea','value'=>$produto['Produto']['descricao'], 'maxlength' => '255' ));
				?>
				<br />
				<?php
					echo $this->Form->input('Produto.corredor', array('class'=>'mascara_umaLetra tamanho-pequeno', 'label'=>'Corredor:','type'=>'text','value'=>$produto['Produto']['corredor'] ));
					echo $this->Form->input('Produto.codigoFGV', array('class'=>'tamanho-pequeno', 'label'=>'Código FGV:','type'=>'text','value'=>$produto['Produto']['codigoFGV']));
					
					echo $this->Form->input('Produto.precoFGV', array('class'=>'dinheiro_duasCasas tamanho-pequeno', 'label'=>'Preço FGV:','type'=>'text','value'=>$produto['Produto']['precoFGV']));
					echo $this->Form->input('Produto.ncm',array('class'=>'tamanho-pequeno',  'label' => 'NCM: '));
					echo $this->Form->input('Produto.cfop',array('class'=>'tamanho-pequeno',  'label' => 'CFOP: '));
				?>

			</div>	
		</fieldset>
	</section>

	<section class="coluna-central" >
		<fieldset class="inputs_icms">
			<legend>Dados do ICMS</legend>

			<div class="coluna-content">	
				<!-- SITUAÇÂO TRIBUÁRIA ############################ -->
				<div style="clear:both">
					<label>Situação Tributária:</label>
					<select name="data[Icm][0][situacaotribicm_id]" id="select_situacao_icms" class='tamanho-medio'>
						<option data-inputs="-"></option>
						<?php
							$i = 0;
							foreach($situacaotribicms as $situacao){
								if($situacao['Situacaotribicm']['id'] == $produto['Icm'][0]['situacaotribicm_id']){
						?>
									<option selected="selected" data-inputs="<?php echo $situacao['Situacaotribicm']['combinacao']?>" value="<?php echo $situacao['Situacaotribicm']['id']?>" data-codigo="<?php echo $situacao['Situacaotribicm']['codigo'] ?>"><?php echo $situacao['Situacaotribicm']['descricao']; ?></option>
							<?php
								}else{
							?>
									<option data-inputs="<?php echo $situacao['Situacaotribicm']['combinacao']?>" value="<?php echo $situacao['Situacaotribicm']['id']?>" data-codigo="<?php echo $situacao['Situacaotribicm']['codigo'] ?>"><?php echo $situacao['Situacaotribicm']['descricao']; ?></option>		
							<?php } ?>
							
							<?php
								$i++;
								}
							?>	
					</select>
				</div>
	
				<!-- ORIGEM ######################################## -->
				<div style="clear:both">
					<label>Origem:</label>
					<select name="data[Produto][origem_id]" id="select_origem" class='tamanho-medio'>
						<option></option>
						<?php
							$i = 0;
							foreach($origens as $origen){
								if($origen['Origems']['id'] == $produto['Produto']['origem_id']){
						?>
									<option selected="selected" value="<?php echo $origen['Origems']['id']?>" data-codigo="<?php echo $origen['Origems']['codigo'] ?>"><?php echo $origen['Origems']['descricao']; ?></option>
						 <?php  }else{	?>	
									<option value="<?php echo $origen['Origems']['id']?>" data-codigo="<?php echo $origen['Origems']['codigo'] ?>"><?php echo $origen['Origems']['descricao']; ?></option>
						<?php 
									}
								$i++;
								}
						?>	
					</select>
				</div>
				
			<!-- MODALIDADE BC ##################################### -->
			<div style="clear:both" id="mostrar1" data-input="1" class="esconde">
				<label>Modalidade BC:</label>
				<select name="data[Icm][0][modalidadebc_id]" id="select_modalidadebcs" class='tamanho-medio'>
					<option data-inputs="-"></option>
					<?php
						$i = 0;
						foreach($modalidadebcs as $modalidadebc){
							if($modalidadebc['Modalidadebcs']['id'] == $produto['Icm'][0]['modalidadebc_id']){
					?>
							<option  selected="selected" value="<?php echo $modalidadebc['Modalidadebcs']['id'] ?>"><?php echo $modalidadebc['Modalidadebcs']['descricao']; ?></option>
					<?php
						}else{
					?>
							<option value="<?php echo $modalidadebc['Modalidadebcs']['id'] ?>"><?php echo $modalidadebc['Modalidadebcs']['descricao']; ?></option>
					<?php	
						
						}
						$i++;
						}
					?>	
				</select>
			</div>
			
			<!-- MODALIDADE BC ST ################################## -->
			<div style="clear:both" id="mostrar2" data-input="2" class="esconde">
			<label>Modalidade BC ST:</label>
			<select name="data[Icm][0][modalidadebcst_id]" id="select_modalidadebcst" class='tamanho-medio'>
				<option data-inputs="-"></option>
				<?php
					$i = 0;
					foreach($modalidadebcsts as $modalidadebcst){
						if($modalidadebcst['Modalidadebcsts']['id'] == $produto['Icm'][0]['modalidadebcst_id']){
				?>
						<option selected="selected" value="<?php echo $modalidadebcst['Modalidadebcsts']['id'] ?>"><?php echo $modalidadebcst['Modalidadebcsts']['descricao']; ?></option>
				<?php
					}else{
				?>
					<option value="<?php echo $modalidadebcst['Modalidadebcsts']['id'] ?>"><?php echo $modalidadebcst['Modalidadebcsts']['descricao']; ?></option>
				<?php
					}
					$i++;
					}
				?>	
			</select>
			</div>
			
			<!-- MOTIVO DESONERAÇÂO ############################################## -->
			<div style="clear:both" id="mostrar3" data-input="3" class="esconde">
				<label>Motivo Desoneração:</label>
				<select name="data[Icm][0][motivodesoneracao_id]" id="select_motivodesoneracao" class='tamanho-medio'>
					<option></option>
					<?php
						$i = 0;
						foreach($motivodesoneracaos as $motivodesoneracao){
							if($motivodesoneracao['Motivodesoneracaos']['id'] == $produto['Icm'][0]['motivodesoneracao_id']){
					?>
							<option selected="selected" value="<?php echo $motivodesoneracao['Motivodesoneracaos']['id']?>"><?php echo $motivodesoneracao['Motivodesoneracaos']['descricao']; ?></option>
					<?php
						}else{						
					?>
							<option value="<?php echo $motivodesoneracao['Motivodesoneracaos']['id']?>"><?php echo $motivodesoneracao['Motivodesoneracaos']['descricao']; ?></option>
					<?php						
						}
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
						echo $this->Form->input('Icm.0.reducaobasecalcst',array('label'=>'Redu. Base Calc. ST:','class'=>'tamanho-medio'));		
					echo "</div>";	
					echo "<div class='esconde'  id='mostrar8'  data-input='8'>";
						echo $this->Form->input('Icm.0.precounitpautast',array('label'=>'Preço Unit. Pauta ST:','class'=>'tamanho-medio'));
					echo "</div>";				
					echo "<div class='esconde'  id='mostrar9'  data-input='9'>";
						echo $this->Form->input('Icm.0.margemvaloradic',array('label'=>'Margem Valor Adic. :','class'=>'tamanho-medio'));			
					echo "</div>";				
					echo "<div class='esconde'  id='mostrar10'  data-input='10'>";
						echo $this->Form->input('Icm.0.reducaobasecalc',array('label'=>'Redu. Base Calc.:','class'=>'tamanho-medio'));	
						
						echo $this->Form->input('Icm.0.id',array('value'=> $produto['Icm'][0]['id'],'type'=>'hidden'));
					echo "</div>";			
				?>	
			</div>			
		</fieldset>
		
		
		<fieldset class="inputs_icms">
			<legend>Dados do ICMS</legend>

			<div class="coluna-content">	
			
				<!-- SITUAÇÂO TRIBUTÀRIA  ########################## -->
				<div style="clear:both">
					<label>Situação Tributária:</label>
					<select name="data[Ipi][0][situacaotribipi_id]" id="select_situacao_ipi" class='tamanho-medio'>
						<option data-inputs="-"></option>
						<?php
							$i = 0;
							foreach($situacaotribipi as $situacaoipi){
								if($situacaoipi['Situacaotribipi']['id'] == $produto['Ipi'][0]['situacaotribipi_id']){
						?>
								<option selected="selected" data-inputipi="<?php echo $situacaoipi['Situacaotribipi']['combinacao']?>" value="<?php echo $situacaoipi['Situacaotribipi']['id']?>" data-codigo="<?php echo $situacaoipi['Situacaotribipi']['codigo'] ?>"><?php echo $situacaoipi['Situacaotribipi']['descricao']; ?></option>
						<?php
							}else{
						?>
								<option data-inputipi="<?php echo $situacaoipi['Situacaotribipi']['combinacao']?>" value="<?php echo $situacaoipi['Situacaotribipi']['id']?>" data-codigo="<?php echo $situacaoipi['Situacaotribipi']['codigo'] ?>"><?php echo $situacaoipi['Situacaotribipi']['descricao']; ?></option>
						<?php
								
							}
							$i++;
							}
						?>	
					</select>
				</div>
				
				
				<div style="clear:both" id="mostrar_ipi1" class="esconde_ipi">
				<?php echo $this->Form->input('Ipi.0.classe_enquadramento',array('label'=>'Classe Enquadramento:','class'=>'tamanho-medio')); ?>
				</div>				
				<div style="clear:both" id="mostrar_ipi2" class="esconde_ipi">
					<?php echo $this->Form->input('Ipi.0.cnpj_produtor',array('label'=>'CNPJ Produtor:','class'=>'tamanho-medio')); ?>
				</div>	
				<div style="clear:both" id="mostrar_ipi3" class="esconde_ipi">
				<?php echo $this->Form->input('Ipi.0.codigo_selo',array('label'=>'Cód. Selo Controle IPI:','class'=>'tamanho-medio')); ?>
				</div>				
				<div style="clear:both" id="mostrar_ipi4" class="esconde_ipi">
					<?php echo $this->Form->input('Ipi.0.qtd_selo',array('label'=>'Qtd. Selo IPI','class'=>'tamanho-medio')); ?>
				</div>
				<div style="clear:both" id="mostrar_ipi5" class="esconde_ipi">
					<?php echo $this->Form->input('Ipi.0.tipodecalculo',array('id'=>'tipocalculo','label'=>'Tipo de Cálculo','class'=>'tamanho-medio','type'=>'select','options'=>array('PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor'))); ?>
				</div>				
				<div style="clear:both" id="tipo_aliquota" class="esconde_ipi">
					<?php echo $this->Form->input('Ipi.0.aliq_ipi',array('label'=>'Aliquota','class'=>'tamanho-medio')); ?>
				</div>				
				<div style="clear:both" id="tipo_valor" class="esconde_ipi">
					<?php echo $this->Form->input('Ipi.0.valorporunid',array('label'=>'Valor por Unid.','class'=>'tamanho-medio')); ?>
					
					<?php echo $this->Form->input('Ipi.0.id',array('value'=> $produto['Ipi'][0]['id'],'type'=>'hidden')); ?>
					
				</div>
			</div>
		</fieldset>
		
		
		<fieldset class="inputs_icms">
			<legend>Dados do PIS</legend>

			<div class="coluna-content">
				<!--  ############################################## -->
				<div style="clear:both">
					<label>Situação Tributária:</label>
					<select name="data[Pi][0][situacaotribpi_id]" id="select_situacao_pis" class='tamanho-medio'>
						<option data-inputs="-"> </option>
						<?php
							$i = 0;
							foreach($situacaotribpis as $situacaopis){
								if($situacaopis['Situacaotribpis']['id'] == $produto['Pi'][0]['situacaotribpi_id']){
						?>
								<option selected="selected" data-inputpis="<?php echo $situacaopis['Situacaotribpis']['combinacao']?>" value="<?php echo $situacaopis['Situacaotribpis']['id']?>" data-codigo="<?php echo $situacaopis['Situacaotribpis']['codigo'] ?>"><?php echo $situacaopis['Situacaotribpis']['descricao']; ?></option>
						<?php
							}else{
						?>
								<option data-inputpis="<?php echo $situacaopis['Situacaotribpis']['combinacao']?>" value="<?php echo $situacaopis['Situacaotribpis']['id']?>" data-codigo="<?php echo $situacaopis['Situacaotribpis']['codigo'] ?>"><?php echo $situacaopis['Situacaotribpis']['descricao']; ?></option>
						<?php
								}
							$i++;
							}
						?>	
					</select>
				</div>
				
				<div style="clear:both">
					<!-- MOSTRAR PIS 1 TIPO DE CÁLCULO SUB TRIB -->
					<?php echo $this->Form->input('Pi.0.tipodecalsubtrib',array('id'=>'tipodecalsubtrib','label'=>'Tipo de cálc. Subs:','class'=>'tamanho-medio','type'=>'select','options'=>array(''=>'','PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor'))); ?>
				</div>			
					<!-- MOSTRAR PIS 1 TIPO DE CÁLCULO COMUM -->
				<div style="clear:both" id="mostrar_pis1" class="esconde_pis">
					<?php echo $this->Form->input('Pi.0.tipodecalculo',array('id'=>'tipocalculo_pis','label'=>'Tipo de Cálculo:','class'=>'tamanho-medio','type'=>'select','options'=>array('PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor'))); ?>
				</div>	
				
				<!-- ALÍQUOTA QUE IRA MOSTRAR EM ALGUNS CASOS-->
				<div style="clear:both" id="mostrar_pis2" class="tipo_aliquota_pis esconde_pis">
					<?php echo $this->Form->input('Pi.0.alq_pis',array('label'=>'Aliquota PIS:','class'=>'tamanho-medio'));	?>
				</div>				
				<!-- VALOR UNID TRIB-->
				<div style="clear:both" id="mostrar_pis3" class="tipo_valor_pis esconde_pis">
					<?php echo $this->Form->input('Pi.0.valundtrib',array('label'=>'Valor Unid. Trib. PIS:','class'=>'tamanho-medio'));	?>
				</div>			
				<!-- CAMPOS DO TIPO DE CALC SUBSTR TRIB-->
				<div style="clear:both;display:none;" id="tipo_aliquota_pis_st">
					<?php echo $this->Form->input('Pi.0.alq_pisst',array('label'=>'Aliquota PIS ST:','class'=>'tamanho-medio')); ?>
				</div>				
				<div style="clear:both;display:none;" id="tipo_valor_pis_st">
					<?php echo $this->Form->input('Pi.0.valunidpisst',array('label'=>'Valor Und. Trib. PIS ST:','class'=>'tamanho-medio')); ?>
					<?php echo $this->Form->input('Pi.0.id',array('value'=> $produto['Pi'][0]['id'],'type'=>'hidden')); ?>
				</div>			
			</div>				
		</fieldset>		
	</section>

	<section id="coluna-direita" class="coluna-direita" >
		<fieldset>
			<legend>Dados do Estoque</legend>
			
			<div class="estoque coluna-content">
				<?php
					echo $this->Form->input('Produto.estoque_minimo', array('label'=>'Estoque Mínimo<span class="campo-obrigatorio">*</span>:','type'=>'text','value'=>h($produto['Produto']['estoque_minimo']),'class'=>'Nao-Letras SpanEstoqueMinimo valida tamanho-pequeno numberMask', 'id' => 'ProdutoEstoqueMinimo', 'maxlength' => '10'));
					echo $this->Form->input('Produto.estoque_desejado', array('type'=>'text','label'=>'Estoque Ideal<span class="campo-obrigatorio">*</span>:','value'=>h($produto['Produto']['estoque_desejado']),'class'=>'Nao-Letras valiEstoqueIdeal valida tamanho-pequeno numberMask','id'=>'estoqueIdeal', 'maxlength' => '10'));
					echo '<span id="valiEstoqueIdeal" class="Msg-tooltipDireita tooltipMensagemErroDireta" style="display:none">Preencha o campo Estoque Ideal</span>'; 
					echo $this->Form->input('Produto.bloqueado', array('type'=>'select', 'label'=>'Produto Bloqueado:','value'=>h($produto['Produto']['bloqueado']), 'class'=>'','options'=>array(array(0=>'Não', 1=>'Sim'))));
					echo $this->Form->input('Produto.periodocriticovalidade', array('type'=>'text','label'=>'Período Crítico:','class'=>'tamanho-medio numberMask', 'class'=>'tamanho-pequeno', 'maxlength' => '10', 'value'=>h($produto['Produto']['periodocriticovalidade']),'after' => '<span class="afterInput">&nbsp;dia(s)</span>' ));
					echo $this->Form->input('Produto.ativo', array('type'=>'select','label'=>'Status da Visualização:','value'=>h($produto['Produto']['ativo']),'class'=>'', 'options'=>array(0=>'Inativo', 1=>'Ativo')));
				?>
			</div>
		</fieldset>
		
		
		<fieldset class="inputs_icms">
			<legend>Dados do COFINS</legend>

			<div class="coluna-content">
		
				<!-- ############################################## -->
				<div style="clear:both">
					<label>Situação Tributária:</label>
					<select name="data[Cofin][0][situacaotribcofin_id]" id="select_situacao_cofins" class='tamanho-medio'>
						<option data-inputs="-"></option>
						<?php
							$i = 0;
							foreach($situacaotribcofins as $situacaotribcofin){
								if($situacaotribcofin['Situacaotribcofins']['id'] == $produto['Cofin'][0]['situacaotribcofin_id']){
						?>
								<option selected="selected" data-inputcofins="<?php echo $situacaotribcofin['Situacaotribcofins']['combinacao']?>" value="<?php echo $situacaotribcofin['Situacaotribcofins']['id']?>" data-codigo="<?php echo $situacaotribcofin['Situacaotribcofins']['codigo'] ?>"><?php echo $situacaotribcofin['Situacaotribcofins']['descricao']; ?></option>
						<?php
							}else{
						?>
								<option data-inputcofins="<?php echo $situacaotribcofin['Situacaotribcofins']['combinacao']?>" value="<?php echo $situacaotribcofin['Situacaotribcofins']['id']?>" data-codigo="<?php echo $situacaotribcofin['Situacaotribcofins']['codigo'] ?>"><?php echo $situacaotribcofin['Situacaotribcofins']['descricao']; ?></option>
						<?php								
							}
							$i++;
							}
						?>	
					</select>
					
					
					<div style="clear:both">
						<!-- MOSTRAR PIS 1 TIPO DE CÁLCULO SUB TRIB -->
						<?php
							echo $this->Form->input('Cofin.0.tipodecalsubtrib',array('id'=>'tipodecalsubtrib_cofins','label'=>'Tipo de cálc. Subs:','class'=>'tamanho-medio','type'=>'select','options'=>array(''=>'','PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor')));
						?>
					</div>	
					<!-- MOSTRAR PIS 1 TIPO DE CÁLCULO COMUM -->
					<div style="clear:both" id="mostrar_cofins1" class="esconde_cofins">
						<?php
							echo $this->Form->input('Cofin.0.tipodecalculo',array('id'=>'tipocalculo_cofins','label'=>'Tipo de Cálculo:','class'=>'tamanho-medio','type'=>'select','options'=>array('PORCENTAGEM'=>'Porcentagem','VALOR'=>'Valor')));
						?>
					</div>	
					
					<!-- ALÍQUOTA QUE IRA MOSTRAR EM ALGUNS CASOS-->
					<div style="clear:both" id="mostrar_cofins2" class="tipo_aliquota_cofins esconde_cofins">
						<?php
							echo $this->Form->input('Cofin.0.aliq_cofins',array('label'=>'Aliquota Cofins:','class'=>'tamanho-medio'));
						?>
					</div>
					
					<!-- VALOR UNID TRIB-->
					<div style="clear:both" id="mostrar_cofins3" class="tipo_valor_cofins esconde_cofins">
						<?php
							echo $this->Form->input('Cofin.0.valorunitcofins',array('label'=>'Valor Unid. Trib. Cofins:','class'=>'tamanho-medio'));
						?>
					</div>	
					
					
					<!-- CAMPOS DO TIPO DE CALC SUBSTR TRIB-->
					<div style="clear:both;display:none;" id="tipo_aliquota_cofins_st">
						<?php
							echo $this->Form->input('Cofin.0.aliq_cofinsst',array('label'=>'Aliquota Cofins ST:','class'=>'tamanho-medio'));
						?>
					</div>
					
					<div style="clear:both;display:none;" id="tipo_valor_cofins_st">
						<?php
							echo $this->Form->input('Cofin.0.valunidcofinsst',array('label'=>'Valor Trib. Cofins ST:','class'=>'tamanho-medio'));
							echo $this->Form->input('Cofin.0.id',array('value'=> $produto['Cofin'][0]['id'],'type'=>'hidden')); 
						?>
					</div>
					
				</div>
			</div>
		</fieldset>
		
	</section>
</section><!---Fim section-superior--->

<footer>	
	<?php
		echo $this->form->submit( 'botao-salvar.png' ,  array('id'=>'bt-edit-salvar','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		echo $this->Form->end();
	?>
</footer>

<!-- Modal Add Categoria -->
	<?php echo $this->element('categoria_add', array('modal'=>'add-categoria')); ?> 
<!-- /.modal -->
