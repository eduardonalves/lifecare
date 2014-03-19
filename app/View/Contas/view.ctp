<?php

$this->start('css');
	    echo $this->Html->css('contas_view');
	    echo $this->Html->css('table');
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
			echo $this->Form->input('identificacao',array('label' => 'Identificação:','value'=>h($conta['Conta']['identificacao']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
			echo $this->Form->input('Parceirodenegocio.Nome',array('label' => 'Parceiro:','value'=>h($conta['Parceirodenegocio']['nome']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
			echo $this->Form->input('status',array('label' => 'Status:','value'=>h($conta['Conta']['status']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
		?>				
	</section>
		
	<section class="coluna-central" >
		<?php
			echo $this->Form->input('valor',array('label' => 'Valor:','value'=>h($conta['Conta']['valor']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
		    echo $this->Form->input('data_emissao',array('label' => 'Data de Emissão:','value'=>h($conta['Conta']['data_emissao']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
   			echo $this->Form->input('data_quitacao',array('label' => 'Data de Quitação:','value'=>h($conta['Conta']['data_quitacao']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
			echo $this->Form->input('tipo',array('label' => 'Tipo:','value'=>h($conta['Conta']['tipo']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
		   	echo $this->Form->input('descricao',array('label' => 'Descrição:','value'=>h($conta['Conta']['descricao']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
		
			//echo $this->Form->input('imagem',array('label' => 'Imagem:','value'=>h($conta['Conta']['imagem']),'class' => 'tamanho-medio','disabled'=>'disabled'));		    
		?>		
	</section>
</section><!---Fim section superior--->

	<div>
		<?php if (!empty($conta['Pagamento'])): ?>
			<table id="tabelaParcelas" cellpadding="0" cellspacing="0">
					<thead>
						<th><?php echo ('Parcela'); ?></th>
						<th><?php echo ('Identificação'); ?></th>
						<th><?php echo ('Data Vencimento'); ?></th>
						<th><?php echo ('Período Crítico'); ?></th>
						<th><?php echo ('Valor'); ?></th>
						<th><?php echo ('Banco'); ?></th>
						<th><?php echo ('Agência'); ?></th>
						<th><?php echo ('Conta'); ?></th>
					</thead>
				
					<?php foreach ($conta['Parcela'] as $parcelas): ?>
						<tr>
							<td><?php echo $parcelas['id']; ?></td>
							<td><?php echo $parcelas['identificacao_documento']; ?></td>
							<td><?php echo $parcelas['data_vencimento']; ?></td>
							<td><?php echo $parcelas['periodocritico']; ?></td>
							<td><?php echo $parcelas['valor']; ?></td>
							<td><?php echo $parcelas['banco']; ?></td>
							<td><?php echo $parcelas['agencia']; ?></td>
							<td><?php echo $parcelas['conta']; ?></td>
						</tr>
					<?php endforeach; ?>	
			</table>
		<?php endif; ?>
	</div>
	

<footer>
		
	<?php
		
		echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$conta['Conta']['id'])));
			
			
	?>	

	<!-- </form> 
	</section> -->
</footer>

