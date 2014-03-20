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
			echo "<span class='statusSemaforo'>Status: ". $this->Html->image('semaforo-' . strtolower($conta['Conta']['status']) . '-12x12.png', array('alt' => '-'.$conta['Conta']['status'], 'title' => '-')) ."</span>"
			//echo $this->Form->input('status',array('label' => 'Status:','value'=>h($conta['Conta']['status']),'class' => 'tamanho-medio borderZero','disabled'=>'disabled'));
			
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
			echo $this->Form->postLink(__('Cancelar'), array('action' => 'cancelarConta', $conta['Conta']['id']), null, __('Tem certeza que deseja quitar esta Conta # %s?', $conta['Conta']['id'])); 
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
						<th><?php echo ('Status'); ?></th>
						<th><?php echo ('Usuário'); ?></th>
						<th><?php echo ('Ação'); ?></th>
					</thead>
				
					<?php foreach ($conta['Parcela'] as $parcelas): ?>
						<tr>
							<td><?php echo $parcelas['id']; ?></td>
							<td><?php echo $parcelas['identificacao_documento']; ?></td>
							<td><?php formatDateToView($parcelas['data_vencimento']);
									  echo $parcelas['data_vencimento']; ?></td>
							<td><?php echo $parcelas['periodocritico']; ?></td>
							<td><?php echo $parcelas['valor']; ?></td>
							<td><?php echo $parcelas['banco']; ?></td>
							<td><?php echo $parcelas['agencia']; ?></td>
							<td><?php echo $parcelas['conta']; ?></td>

							<td>
								<?php echo $this->Form->postLink(__('Quitar'), array('action' => 'quitarParcela', $parcelas['id']), null, __('Tem certeza que deseja quitar esta parcela # %s?', $parcelas['id'])); ?>
								
							</td>

							<td><?php echo $this->Html->image('semaforo-' . strtolower($parcelas['status']) . '-12x12.png', array('alt' => '-'.$parcelas['status'], 'title' => '-')); ?></td>
							<td><?php echo $parcelas['user_id']; ?></td>
							<td><a>Quitar</a></td>

						</tr>
					<?php endforeach; ?>	
			</table>
		<?php endif; ?>
	</div>
	

<footer>
		
	<?php
		
	  echo $this->html->image('voltar.png',array('alt'=>'Voltar',
												     'title'=>'voltar',
													 'class'=>'bt-voltar',
													 'url'=>'/Contas/?parametro=contas'));

	?>	

	<!-- </form> 
	</section> -->
</footer>

