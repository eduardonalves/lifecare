<?php

$this->start('css');
	    echo $this->Html->css('contas_view');
	    echo $this->Html->css('table');
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
			echo "<span class='statusSemaforo'>Status: ". $this->Html->image('semaforo-' . strtolower($conta['Conta']['status']) . '-12x12.png', array('alt' => '-'.$conta['Conta']['status'], 'title' => '-')) ."</span>"
			//echo $this->Form->input('status',array('label' => 'Status:','value'=>h($conta['Conta']['status']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));

		?>				
	</section>
		
	<section class="coluna-central" >
		<?php
			echo $this->Form->input('valor',array('label' => 'Valor:','value'=>h(number_format($conta['Conta']['valor'], 2, ',', '.')),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
		    echo $this->Form->input('',array('type' => 'text','label' => 'Data de Emissão:','value'=>h(formatDateToView($conta['Conta']['data_emissao'])),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
   			echo $this->Form->input('data_quitacao',array('label' => 'Data de Quitação:','value'=>h($conta['Conta']['data_quitacao']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
			echo $this->Form->input('tipo',array('label' => 'Tipo:','value'=>h($conta['Conta']['tipo']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
		   	echo $this->Form->input('descricao',array('label' => 'Descrição:','value'=>h($conta['Conta']['descricao']),'class' => 'tamanho-grande borderZero','disabled'=>'disabled'));
			echo '<div class="input text" ><label>Cancelar Conta:</label></div>';
			echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'bt-cancelar','alt' =>__('Cancelar'),'title' => __('Cancelar'))), array('controller' => 'contas','action' => 'cancelarConta',  $conta['Conta']['id']	),array('escape' => false, 'confirm' => __('Tem certeza que deseja cancelar esta Conta # %s?', $conta['Conta']['id'])));

			//echo $this->Form->postLink(__('Cancelar'), array('action' => 'cancelarConta', $conta['Conta']['id']), null, __('Tem certeza que deseja quitar esta Conta # %s?', $conta['Conta']['id'])); 
			//echo $this->Form->input('imagem',array('label' => 'Imagem:','value'=>h($conta['Conta']['imagem']),'class' => 'tamanho-grande','disabled'=>'disabled'));		    
		?>		
	</section>
</section><!---Fim section superior--->

	<div>
		<?php if (!empty($conta['Pagamento'])): ?>
			<table id="tabelaParcelas" cellpadding="0" cellspacing="0">
					<thead>
						<th><?php echo ('Parcela'); ?></th>
						<th><?php echo ('Código de Barras'); ?></th>
						<th><?php echo ('Data Vencimento'); ?></th>
						<th><?php echo ('Valor'); ?></th>
						<th><?php echo ('Identificação'); ?></th>
						<th><?php echo ('Período Crítico'); ?></th>
						<th><?php echo ('Desconto'); ?></th>
						<th><?php echo ('Agência'); ?></th>
						<th><?php echo ('Conta'); ?></th>
						<th><?php echo ('Banco'); ?></th>
						
						
						<th><?php echo ('Ação'); ?></th>
						<th><?php echo ('Status'); ?></th>
					</thead>
					<?php $j =0; ?>
					<?php foreach ($conta['Parcela'] as $parcelas): ?>
						<tr>
							<td><?php echo $parcelas['parcela']; ?></td>
							<td><?php echo $parcelas['codigodebarras']; ?></td>
							<td><?php formatDateToView($parcelas['data_vencimento']);
									  echo $parcelas['data_vencimento']; ?></td>
							<td><?php echo number_format($parcelas['valor'], 2, ',', '.'); ?></td>
							<td><?php echo $parcelas['identificacao_documento']; ?></td>
							<td><?php echo $parcelas['periodocritico']; ?></td>
							<td><?php echo number_format($parcelas['desconto'], 2, ',', '.'); ?></td>
							<td><?php echo $parcelas['agencia']; ?></td>
							<td><?php echo $parcelas['conta']; ?></td>
							<td><?php echo $parcelas['banco']; ?></td>

							<td>
								<?php
								    echo $this->Html->image('botao-quitar2.png',array('id'=>'quitar'.$j.'', 'class' => 'quitar','alt' =>__('Quitar parcela'),'title' => __('Quitar parcela')));

								    //echo $this->Form->postLink(__('Quitar'), array('action' => 'quitarParcela', $parcelas['id']), null, __('Tem certeza que deseja quitar esta parcela # %s?', $parcelas['id'])); ?>


							</td>

							<td><?php echo $this->Html->image('semaforo-' . strtolower($parcelas['status']) . '-12x12.png', array('alt' => '-'.$parcelas['status'], 'title' => $parcelas['status'])); ?></td>
							
							

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
						<?php $j=$j+1;?>
					<?php endforeach; ?>	
			</table>
		<?php endif; ?>
	</div>
	
<!--
<footer>
		
	<?php
	  /*

		echo $this->html->image('voltar.png',array('alt'=>'Voltar',
							 'title'=>'voltar',
							 'class'=>'bt-voltar',
							 'url'=>'javascript:history.go(-1)'));

	*/ 


	?>	

	<!-- </form> 
	</section> -->
	<!--
</footer>

-->
