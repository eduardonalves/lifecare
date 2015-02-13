<?php

$this->start('css');
	    echo $this->Html->css('contas_pagar');
	    echo $this->Html->css('table');
	    //echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    //echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

?>	

<header>

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => '', 'alt' => 'Consulta de Conta', 'title' => 'Consulta de Conta')); ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption31">Consultas</h1>
	
</header>

	
<section> <!---section superior--->

	<header>Dados Gerais da Conta</header>

	<section class="coluna-esquerda">
		<?php
			//echo $this->Form->input('id',array('label' => 'Id:','value'=>h($conta['Conta']['id']),'class' => 'tamanho-medio','disabled'=>'disabled'));
			echo $this->Form->input('identificacao',array('label' => 'Identificação:','value'=>h($conta['Conta']['identificacao']),'class' => 'tamanho-medio','disabled'=>'disabled'));
			echo $this->Form->input('valor',array('label' => 'Valor:','value'=>h($conta['Conta']['valor']),'class' => 'tamanho-medio','disabled'=>'disabled'));
			echo $this->Form->input('status',array('label' => 'Status:','value'=>h($conta['Conta']['status']),'class' => 'tamanho-medio','disabled'=>'disabled'));
			echo $this->Form->input('Parceirodenegocio.Nome',array('label' => 'Parceiro:','value'=>h($conta['Parceirodenegocio']['nome']),'class' => 'tamanho-medio','disabled'=>'disabled'));

			
		?>				
	</section>
		
	<section class="coluna-central" >
		<?php		
		    echo $this->Form->input('data_emissao',array('label' => 'Data de Emissão:','value'=>h($conta['Conta']['data_emissao']),'class' => 'tamanho-medio','disabled'=>'disabled'));
		    echo $this->Form->input('tipo',array('label' => 'Tipo:','value'=>h($conta['Conta']['tipo']),'class' => 'tamanho-medio','disabled'=>'disabled'));
		   
		   foreach($conta['Parcela'] as $parcelas){
				echo $this->Form->input('periodocritico',array('label' => 'Período Critico:','value'=>h($parcelas['periodocritico']),'class' => 'tamanho-medio','disabled'=>'disabled'));
				echo $this->Form->input('data_vencimento',array('label' => 'Data de Vencimento:','value'=>h($parcelas['data_vencimento']),'class' => 'tamanho-medio','disabled'=>'disabled'));
			}
			echo $this->Form->input('descricao',array('label' => 'Descrição:','value'=>h($conta['Conta']['descricao']),'class' => 'tamanho-medio','disabled'=>'disabled'));

		    
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
			echo $this->Form->input('data_quitacao',array('label' => 'Data de Quitação:','value'=>h($conta['Conta']['data_quitacao']),'class' => 'tamanho-medio','disabled'=>'disabled'));
			echo $this->Form->input('imagem',array('label' => 'Imagem:','value'=>h($conta['Conta']['imagem']),'class' => 'tamanho-medio','disabled'=>'disabled'));		    
		?>		
	</section>
</section><!---Fim section superior--->

	<div>
		<?php if (!empty($conta['Pagamento'])): ?>
			<table id="tabela-conta-pagar" cellpadding="0" cellspacing="0">
					<thead>
						<th><?php echo ('Id'); ?></th>
						<th><?php echo ('Tipo Pagamento'); ?></th>
						<th><?php echo ('Número Parcela'); ?></th>
						<th><?php echo ('Conta Id'); ?></th>
						<th><?php echo ('Parcela Id'); ?></th>
						<th><?php echo ('Forma Pagamento'); ?></th>
						<th class="actions"><?php echo __('Ações'); ?></th>
					</thead>
				
					<?php foreach ($conta['Pagamento'] as $pagamento): ?>
						<tr>
							<td><?php echo $pagamento['id']; ?></td>
							<td><?php echo $pagamento['tipo_pagamento']; ?></td>
							<td><?php echo $pagamento['numero_parcela']; ?></td>
							<td><?php echo $pagamento['conta_id']; ?></td>
							<td><?php echo $pagamento['parcela_id']; ?></td>
							<td><?php echo $pagamento['forma_pagamento']; ?></td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('controller' => 'pagamentos', 'action' => 'view', $pagamento['id'])); ?>
								<?php echo $this->Html->link(__('Edit'), array('controller' => 'pagamentos', 'action' => 'edit', $pagamento['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pagamentos', 'action' => 'delete', $pagamento['id']), null, __('Are you sure you want to delete # %s?', $pagamento['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>	
			</table>
		<?php endif; ?>
	</div>
	

<footer>
		
	<?php
		
		echo $this->form->submit( 'botao-salvar.png',array('class'=>'bt-salvarConta','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarContaPagar')); 
			
		echo $this->Form->end();	
	?>	

	<!-- </form> 
	</section> -->
</footer>

<pre>
<?php print_r($conta); ?>
</pre>
