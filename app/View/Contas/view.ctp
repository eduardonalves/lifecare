<?php
    $this->start('css');
	echo $this->Html->css('contas_view');
	echo $this->Html->css('table');
	echo $this->Html->css('modal_uploadConta');
	echo $this->Html->css('modal_editObs');
	echo $this->Html->css('comprovante_view');
	echo $this->Html->css('zoomer');
    $this->end();
	$this->start('modais');
		echo $this->element('negociacao_add',array('modal'=>'negociacao'));
		echo $this->element('cobranca_add', array('modal'=>'add-cobranca'));
	$this->end();
    $this->start('script');
	echo $this->Html->script('zoomer.js');
    $this->end();
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}else{
			$data= " / / ";
		}
		return $data;
	}
?>

<script>
	$(document).ready(function() {
		$('.quitar').click(function(){
			modal=$(this).attr('id');
			$('#modal-'+modal).modal('show');
		});
		
		$('#negociacao').click(function(){
			$('#myModal_negociacao').modal('show');
		});
		
		$('.bt-quitar').click(function(e){
			if($("#ContaDataPagamento").val() == ''){
				$("#spanQuitarData").show();
			}else{
				$("#spanQuitarData").hide();
				e.preventDefault();
				form= $(this).attr('id');
				$('.'+form).submit();
			}	
		});
		
	    $(".bt-showmodal").click(function(){
			nome = $(this).attr('href');
			$('#myModal_'+nome).modal('show'); 
	    });
		
		 $(".checkClasse").click(function(){
		 	idparcela=$(this).attr('data-parcelaid');
		 	
		 	var idcheck=  $(this).attr('id');
			var expReg01 = /\D+/gi;
			var numero= idcheck.replace(expReg01,'');
		 	if($(this).is(':checked')){
		 		
		 		$("#NegociacaoAddForm").prepend('<input name="data[Parc]['+numero+'][parcelasids] step=" any"="" id="Parc'+numero+'Parcelasids" value="'+idparcela+'" type="hidden">');
		 		
		 	}else{
		 		$('#Parc'+numero+'Parcelasids').remove();	
		 	}
			
	    });
	});
</script>

<header>
	<?php echo $this->Html->image('titulo-consultar.png', array('id' => '', 'alt' => 'Consulta de Conta', 'title' => 'Consulta de Conta')); ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption31">Consultas</h1>
</header>

<section> <!---section superior--->

	<header>Dados Gerais da Conta</header>

	<section class="coluna-esquerda">
		<?php
			//echo $this->Form->input('id',array('label' => 'Id:','value'=>h($conta['Conta']['id']),'class' => 'tamanho-grande','disabled'=>'disabled'));
			echo $this->Form->input('identificacao',array('label' => 'Identificação:','value'=>h($conta['Conta']['identificacao']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
			echo $this->Form->input('Parceirodenegocio.Nome',array('label' => 'Parceiro:','value'=>h($conta['Parceirodenegocio']['nome']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
			?>
			<div style="float: left; position: relative; display: inline;">
			
			<?php
				echo $this->Form->input('descricao',array('label' => 'Observação:','value'=>h($conta['Conta']['descricao']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
				
				
			?>
			
			<a href="edit-obs" class="bt-showmodal">
			<?php
				if($conta['Conta']['status'] != 'CANCELADO'){
				echo $this->html->image('botao-editar.png',array('id' => 'bt-edit', 'alt' => 'Editar Observação', 'title' => 'Editar Observação'));
			}
			?>
			
			</a>
			</div>
			
    <?php
			echo "<span class='statusSemaforo'>Status: ". $this->Html->image('semaforo-' . strtolower($conta['Conta']['status']) . '-12x12.png', array('alt' => $conta['Conta']['status'], 'title' => $conta['Conta']['status'])) ."</span>"
			//echo $this->Form->input('status',array('label' => 'Status:','value'=>h($conta['Conta']['status']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
		?>				
	</section>
		
	<section class="coluna-central" >
		<?php
			echo $this->Form->input('valor',array('label' => 'Valor:','value'=>h("R$ ".number_format($conta['Conta']['valor'], 2, ',', '.')),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
		    echo $this->Form->input('',array('type' => 'text','label' => 'Data de Emissão:','value'=>h(formatDateToView($conta['Conta']['data_emissao'])),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
   			echo $this->Form->input('data_quitacao',array('type' => 'text', 'label' => 'Data de Quitação:','value'=>h($conta['Conta']['data_quitacao']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
			//echo '<div class="input text" ><label>Cancelar Conta:</label></div>';
			?>
		<fieldset>
			<legend>Tipo de Conta</legend>
		<?php
			echo $this->Form->input('Tipodeconta.nome',array('label' => 'Nome:','value'=>h($conta['Tipodeconta']['nome']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));				
			echo $this->Form->input('Tipodeconta.tipo',array('label' => 'Tipo de Conta:','value'=>h($conta['Tipodeconta']['tipo']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
		?>	
		</fieldset>	
	</section>
	
	<section class="coluna-direita" >
		<?php
			foreach($conta['Pagamento'] as $pagamento){
				echo $this->Form->input('Pagamento.tipo_pagamento',array('label' => 'Tipo de Pagamento:','value'=>h($pagamento['tipo_pagamento']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
				echo $this->Form->input('Pagamento.forma_pagamento',array('label' => 'Forma de Pagamento:','value'=>h($pagamento['forma_pagamento']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
				//print_r($pagamento);
			}
			echo $this->Form->input('tipo',array('label' => 'Tipo:','value'=>h($conta['Conta']['tipo']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
		?>
		<fieldset>
			<legend>Centro de Custo</legend>
		<?php
			//$limite = number_format($conta['Centrocusto']['limite'], 2, ',', '.');  
			echo $this->Form->input('Centrocusto.nome',array('label' => 'Nome:','value'=>h($conta['Centrocusto']['nome']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));				
			//echo $this->Form->input('Centrocusto.limite',array('label' => 'Limite:','value'=>h("R$ ".$limite),'class' => 'tamanho-grande borderZero','disabled'=>'disabled', 'type'=>'text'));				
			//echo $this->Form->input('Centrocusto.limite_usado',array('label' => 'Limite Usado:','value'=>h($conta['Centrocusto']['limite_usado']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));				
		?>		
		</fieldset>
	</section>
</section><!---Fim section superior--->

<div>
	<?php if (!empty($conta['Pagamento'])): ?>
		<table id="tabelaParcelas" cellpadding="0" cellspacing="0">
			<thead>
				<th><?php echo ('Ações'); ?></th>
				<?php if($conta['Conta']['status'] != 'CANCELADO' && $conta['Conta']['status'] != 'CINZA'){?><th><?php echo ('Negociação'); ?></th><?php }?>
				<th><?php echo ('Parcela'); ?></th>
				<th><?php echo ('Vencimento'); ?></th>
				<th><?php echo ('Valor'); ?></th>
				<th><?php echo ('Identificação'); ?></th>
				<th><?php echo ('Período Crítico'); ?></th>
				<th><?php echo ('Desconto'); ?></th>
				<th><?php echo ('Agência'); ?></th>
				<th><?php echo ('Conta'); ?></th>
				<th><?php echo ('Banco'); ?></th>

				<th><?php echo ('Status'); ?></th>
			</thead>
			
			<?php $j =0;  $z =0;?>
			
			<?php foreach ($conta['Parcela'] as $parcelas): ?>
				<tr>
					<td>
						<?php
							echo "<a href='add-comprovanteView' class='bt-showmodal'>"; 
							echo $this->Html->image('botao-tabela-visualizar.png',array('class' => 'bt-visualizar', 'id' => 'bt-visualizarComprovante','alt' => 'Visualizar Comprovante ','title' => 'Visualizar Comprovante ' ));
							echo "</a>";
							
							if($conta['Conta']['status'] != 'CANCELADO'){
								
								echo $this->Html->image('botao-quitar2.png',array('id'=>'quitar'.$j.'', 'class' => 'quitar','alt' =>__('Quitar parcela'),'title' => __('Quitar parcela')));

								//echo $this->Form->postLink(__('Quitar'), array('action' => 'quitarParcela', $parcelas['id']), null, __('Tem certeza que deseja quitar esta parcela # %s?', $parcelas['id']));
								
								echo "<a href='add-uploadConta' class='bt-showmodal'>"; 
								echo $this->Html->image('upload.png',array('class' => 'bt-upload', 'id' => 'bt-upload','alt' => 'Upload Conta','title' => 'Upload Comprovante' ));
								
								echo "</a>";

								echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'bt-cancelar','alt' =>__('Cancelar Conta'),'title' => __('Cancelar Conta'))), array('controller' => 'contas','action' => 'cancelarConta',  $conta['Conta']['id']	),array('escape' => false, 'confirm' => __('Tem certeza que deseja cancelar esta Conta # %s?', $conta['Conta']['id'])));
							}
						?>
					</td>
					<?php if($conta['Conta']['status'] != 'CANCELADO' && $conta['Conta']['status'] != 'CINZA'){
					    if($parcelas['status'] == 'RENEGOCIADO'){
						echo "<td>".$this->form->checkbox('',array('id' => 'checkNegociacaoDesabilidato','class' => 'checkClasse','disabled' => 'disabled'))."</td>";
					    }else{
					?>
					<td><?php echo $this->form->checkbox('',array('id' => 'checkNegociacao'.$z,'class' => 'checkClasse','data-parcelaId'=>$parcelas['id']));?></td> <?php } }?>
					<?php $z++;?>
					<td><?php echo $parcelas['parcela']; ?></td>
					<td><?php formatDateToView($parcelas['data_vencimento']);
							  echo $parcelas['data_vencimento']; ?></td>
					<td><?php echo "R$ ".number_format($parcelas['valor'], 2, ',', '.'); ?></td>
					<td><?php echo $parcelas['identificacao_documento']; ?></td>
					<td><?php echo $parcelas['periodocritico']; ?></td>
					<td><?php echo "R$ ".number_format($parcelas['desconto'], 2, ',', '.'); ?></td>
					<td><?php echo $parcelas['agencia']; ?></td>
					<td><?php echo $parcelas['conta']; ?></td>
					<td><?php echo $parcelas['banco']; ?></td>
					<td><?php echo $this->Html->image('semaforo-' . strtolower($parcelas['status']) . '-12x12.png', array('alt' => $parcelas['status'], 'title' => $parcelas['status'])); ?></td>
				</tr>

				<div id="<?php echo "modal-quitar".$j; ?>" class="modal modalQuitar" style="display: none;">
					<header id="cabecalho">
						<?php 
							echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Quitar', 'title' => 'Quitar'));
						 ?>
						 <h1>Quitar parcela</h1>
					</header>
					
					<?php echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;')); ?>	

					<section><header>Data do Pagamento</header></section>
					<section>	
						<section class="coluna-central">
							<div>	
								<?php
									echo $this->Form->create('Conta', array('id' => 'quitar'.$j.'','class' => 'bt-salvar-quitar'.$j.'', 'action' => 'quitarParcela/'. $parcelas['id'].''));
									echo "<div class=\"ui-widget\">";
									echo $this->Form->input('data_pagamento', array('class'=>'data_pagamento tamanho-grande forma-data','type'=>'text', 'label'=>'Data do pagamento <span class="campo-obrigatorio">*</span>:', 'div' => false , ));
									
									echo $this->Form->input('Parcela.descricao',array('label' => 'Observação:','class'=>'tamanho-grande','type' => 'textarea','value' => $parcelas['descricao'], 'style'=>'display: inline'));
									
									echo $this->Form->input('Parcela.juros',array('label' => 'Juros:','class'=>'tamanho-grande','type' => 'text','value' => $parcelas['juros'], 'style'=>'display: inline'));
									
									echo $this->Form->input('parcela_id',array('value' => $parcelas['id'], 'type' => 'hidden'));
								?>
								<span id='spanQuitarData' class='Msg Msg-tooltipDireita' style='display:none'>Preencha o Campo Data do pagamento</span>
							</div>
						</section>
					</section>
					
					<footer>
						<?php
							echo $this->Html->image('botao-salvar.png',array('id'=>'bt-salvar-quitar'.$j.'','class' => 'bt-salvar bt-quitar', 'alt' => 'Salvar', 'title' => 'Salvar'));
							//echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-salvar-quitar'.$j.'','class' => 'bt-salvar bt-quitar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
							echo $this->form->end();
						?>			
					</footer>
				</div>

<!-------------------------------------- Modal upload Comprovante ----------------------------------------------------->
				<div class="modal fade" id="myModal_add-uploadConta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

					<div class="modal-body">
						<?php echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;')); ?>
						<header id="cabecalho">
							<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Quitar')); ?>
							<h1>Upload Comprovante</h1>
						</header>
				
						<script>
							$(document).ready(function(){
								var valorComp = <?php echo $parcelas['id']; ?>;

								$('#bt-confirmarUpload').click(function(e){
									e.preventDefault();
									extensao=$('input[id="valorUpload"]').val().split('.')[1];

									if(extensao== 'jpg' || extensao=='jpeg' || extensao=='png' ){
										valAux=$('input[id="valorUpload"]').val();
										$('input[id="valorUpload"]').val(valorComp+valAux);
										$('#ParcelaUploadParcelaForm').submit();
									}else if(extensao== undefined){
										$('input[id="valorUpload"]').after('<span').addClass('shadow-vermelho');
										$('#msgImagemvazia').css('display','block');
										
									}else{
										$('input[id="valorUpload"]').after('<span').addClass('shadow-vermelho');
										$('#msgImagemErro').css('display','block');
									}
								});
							});
						</script>
					
						<section>
							<header class="header">Adicionar Comprovante</header>
						
							<section>

								<div class="Parcela upload">
									<?php echo $this->Form->create('Parcela', array('type' => 'file','action'=>'uploadParcela')); ?>
										<div style="display:none;">
											<input type="hidden" value="POST" name="_method"/>
										</div>
										
										<div class="input file">
											<label for="doc_file">Buscar Arquivo:</label>
											<input id="doc_file" class="campo-buscar" type="file" name="data[Parcela][doc_file]"/>
											<a id="teste" href="#">
											<?php echo $this->Form->html('id',array('type'=>'hidden','value'=>$parcelas['id']));
												  echo $this->Html->image('botao-buscar.png',array('id'=>'bt-buscar', 'title' => 'Buscar', 'class' => 'bt-buscar'));?>
											</a>
											<input type="text" id="valorUpload" name="data[Parcela][comprovante]"/>
											<input type="hidden" name="data[Parcela][arquivoAntigo]" value="<?php echo $parcelas['comprovante'] ?>"/>
										</div>
										<span id="msgImagemvazia" class="Msg-tooltipAbaixo msgImagem" style="display:none">Escolha uma imagem</span>
										<span id="msgImagemErro" class="Msg-tooltipAbaixo msgImagem" style="display:none">Extensão inválida</span>

										<?php 
										echo $this->Html->image('botao-confirmar.png',array('id'=>'bt-confirmarUpload', 'title' => 'Confirmar', 'class' => 'bt-confirmar'));
										
										echo $this->Form->end()
										?>
								</div>
							</section>
						</section>
				
					</div>
				
				</div>
					
<!--------------------------------------Modal view Comprovante ----------------------------------------------------->
				<div class="modal fade" id="myModal_add-comprovanteView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-body">
						<?php echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;')); ?>

						<header id="cabecalho">
							
							<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'visualizar', 'alt' => 'Visualizar', 'title' => 'Visualizar')); ?> <h1>Visualizar</h1>
							 
						</header>

						 <script>
							$(document).ready(function(){
								$('.zoomImagem').zoomer();
							});
						</script>

						<section>
							<header class="header">Comprovante</header>

							<div class='zoomImagem'>
							   <img src="/app/webroot/files/<?php  echo $parcelas['comprovante']; ?>">
							</div>
						</section>
					</div>
				</div>

				<div class="modal fade" id="myModal_edit-obs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-body">
						<?php echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;')); ?>

						<header id="cabecalho">
							<?php echo $this->Html->image('cadastrar-titulo.png', array('id' => 'editar', 'alt' => 'Editar', 'title' => 'Editar')); ?><h1>Editar Observação</h1>
							</header>
							
							<section>
								<header>Observação</header>
								<section class="coluna-modal">
									<div>
									
										<?php
											//echo $conta['Conta']['id'];
											
											echo $this->Form->create('Conta', array('id' => 'modal_editObs', 'action' => 'editobs/'.$conta['Conta']['id']));
											
											echo $this->Form->input('Conta.descricao',array('label' => 'Observação:','type' => 'text','value' => $conta['Conta']['descricao']));
											
											echo $this->Form->input('Conta.id',array('type' => 'hidden', 'value' => $conta['Conta']['id']));
											
										?>
									</div>
							
							</section>
							<footer>
								<?php
									echo $this->form->submit('botao-salvar.png' ,  array('id'=>'bt-editar-obs','class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
									echo $this->Form->end();
								?>
						</footer>
							 
						</header>
					</div>
				</div>



				<?php $j=$j+1;?>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>

<?php
	if($conta['Conta']['status'] != 'CANCELADO' && $conta['Conta']['status'] != 'CINZA' ){

		echo $this->element('negociacao_view');

		//echo "<div class='fake-footer'>";
		//echo $this->html->image('adicionar-negociacao.png',array('alt'=>'Confirmar','title'=>'Confirmar','id'=>'negociacao','class'=>'bt-direita'));
		//echo "</div>";
	

?>
	

	<section class="clearBoth">
	<header>Dados das Cobranças</header>
	<?php

		echo $this->element('cobrancasView');
	?>

	<a href='add-cobranca' class='bt-showmodal'>
		<?php echo $this->html->image('adicionar-cobranca.png',array('alt'=>'Adicionar Cobrança','title'=>'Adicionar Cobrança','id'=>'bt-corbanca','class'=>'bt-direita')); ?>
	</a>

	</section>

<?php
	}
?>


