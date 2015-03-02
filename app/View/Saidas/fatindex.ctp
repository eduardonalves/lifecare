<?php
	$this->start('css');
		echo $this->Html->css('table');
	    echo $this->Html->css('compras');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();

	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('compras.js');
	$this->end();

	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}
		return $data;
	}

?>

<header>
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <h1 class="menuOption61">Faturamento de Vendas</h1>
</header>

<section>
	<header> Vendas Disponíveis</header>

	<table class="areaTabela">
		<thead>
			<tr>
				<th>Ações</th>	
				<th>Cliente</th>		
				<th>Número da Nota</th>
				<th>Data</th>
				<th>Valor Total (R$)</th>		
			</tr>
		</thead>

		<tbody>
			
			<?php  
				foreach ($saidas as $saida) {				
			?>
				<tr>
					<td>
					<?php 
						echo $this->Html->image('botao-tabela-visualizar.png',array('alt'=>'Visualizar Nota','title'=>'Visualizar Nota','url'=>array('controller' => 'Saidas','action' => 'view', $saida['Saida']['id'],"layout"=>"faturamento","abas"=>"42"))); 
						
						echo "&nbsp;";
						

						
						
						if($saida['Saida']['status_completo'] == 0){						
							//COMPLETA A NOTA
							echo $this->Html->image('gerencia.png',array('alt'=>'Visualizar Nota','title'=>'Visualizar Nota','url'=>array('controller' => 'Saidas','action' => 'edit', $saida['Saida']['id']))); 
						}else {
							//GERAR NOTA SE TIVER COMPLETA
							if($saida['Saida']['chave_acesso'] == 'NULL' || $saida['Saida']['chave_acesso'] == ''){
								//GERA O XML SE AINDA NÃO ESTIVER GERADO
								echo $this->Form->postLink($this->Html->image('emitir.png',array('id'=>'emitir','alt' =>__('Gerar XML'),'title' => 'Gerar XML')), array('controller' => 'Saidas','action' => 'geraNotaXml', $saida['Saida']['id']),array('escape' => false, 'confirm' => __('Deseja realmente Gerar essa Nota?'.$saida['Saida']['id'].'?')));
							}else{
								 if($saida['Saida']['protocolo_aprovacao'] == 'NULL' || $saida['Saida']['protocolo_aprovacao'] == ''){
								 	//ENVIAR A NOTA SE JÀ TIVER FEITO O XML
									echo $this->Form->postLink($this->Html->image('pedido-acao.png',array('id'=>'enviarNota','alt' =>__('Enviar Nota'),'title' => 'Enviar Nota')), array('controller' => 'Saidas','action' => 'enviaNotas', $saida['Saida']['id']),array('escape' => false, 'confirm' => __('Deseja realmente Enviar essa Nota?'.$saida['Saida']['id'].'?')));
								}else{
									//PODE GERAR DANFE OU CANCELAR A NOTA

									echo $this->Form->postLink($this->Html->image('estoque.png',array('id'=>'danfe','alt' =>__('Gerar Danfe'),'title' => 'Gerar Danfe')), array('controller' => 'Saidas','action' => 'geraDanfe', $saida['Saida']['id']),array('escape' => false, 'confirm' => __('Deseja realmente Gerar Danfe dessa Nota?'.$saida['Saida']['id'].'?')));

									echo $this->Form->postLink($this->Html->image('cancelar.png',array('id'=>'cancelar','alt' =>__('Cancelar Nota'),'title' => 'Cancelar Nota')), array('controller' => 'Saidas','action' => 'cancelaNfe', $saida['Saida']['id']),array('escape' => false, 'confirm' => __('Deseja realmente Cancelar essa Nota?'.$saida['Saida']['id'].'?')));
								}	
							}
						}
						/*echo $this->Form->postLink($this->Html->image('botao-quitar2.png',array('id'=>'faturar','alt' =>__('Faturar'),'title' => 'Faturar')), array('controller' => 'Saidas','action' => 'geraNotaXml', $saida['Saida']['id']),array('escape' => false, 'confirm' => __('Deseja realmente Faturar essa Venda?'.$saida['Saida']['id'].'?')));*/
						
					 ?>
					</td>
					<td><?php echo $saida['Parceirodenegocio']['nome'] ?></td>
					<td><?php echo $saida['Saida']['nota_fiscal'] ?></td>
					<td><?php echo formatDateToView($saida['Saida']['data']) ?></td>
					<td><?php echo number_format($saida['Saida']['valor_total'],5,',','.') ?></td>	
				
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</section>