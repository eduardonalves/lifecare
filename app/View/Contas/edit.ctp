<?php	    
	$this->start('css');
	    echo $this->Html->css('contas_edit');
	    echo $this->Html->css('table');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
	$this->start('script');	
		echo $this->Html->script('funcoes_contas_edit.js');
	    echo $this->Html->script('jquery-ui/jquery.ui.button.js');	
	$this->end();

?>

<header>

	<?php echo $this->Html->image('titulo-consultar.png', array('id' => '', 'alt' => 'Consulta de Conta', 'title' => 'Consulta de Conta')); ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption31">Consultas</h1>
	
</header>

<?php echo $this->Form->create('Conta'); ?>

<section> <!---section superior--->

	<header>Editar</header>
	
	<section class="coluna-esquerda">
		<?php
			//echo $this->Form->input('id',array('label' => 'Id:','value'=>h($conta['Conta']['id']),'class' => 'tamanho-medio','disabled'=>'disabled'));
			echo $this->Form->input('identificacao',array('type'=>'text','label' => 'Identificação:','value'=>h($conta['Conta']['identificacao']),'class' => 'tamanho-medio'));
			echo $this->Form->input('Parceirodenegocio.Nome',array('type'=>'text','label' => 'Parceiro:','value'=>h($conta['Parceirodenegocio']['nome']),'class' => 'tamanho-medio'));
		?>				
	</section>
		
	<section class="coluna-central" >
		<?php
		    echo $this->Form->input('data_emissao',array('type'=>'text','label' => 'Data de Emissão:','value'=>h($conta['Conta']['data_emissao']),'class' => 'tamanho-medio forma-data'));
   			echo $this->Form->input('data_quitacao',array('type'=>'text','label' => 'Data de Quitação:','value'=>h($conta['Conta']['data_quitacao']),'class' => 'tamanho-medio forma-data'));
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
			echo $this->Form->input('tipo',array('type'=>'text','label' => 'Tipo:','value'=>h($conta['Conta']['tipo']),'class' => 'tamanho-medio'));
		   	echo $this->Form->input('descricao',array('type'=>'text','label' => 'Descrição:','value'=>h($conta['Conta']['descricao']),'class' => 'tamanho-medio'));
		
			//echo $this->Form->input('imagem',array('label' => 'Imagem:','value'=>h($conta['Conta']['imagem']),'class' => 'tamanho-medio','disabled'=>'disabled'));		    
		?>	
</section><!---Fim section superior--->
	
		
<section class="edicaoParcelas"> <!---section meio--->

	<header>Editar Parcelas</header>

	<section class="coluna-esquerda">
		<?php	
		
			echo $this->Form->input('Parcela.parcela',array('type'=>'text','label'=>'Parcela:','class'=>'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));	
			echo $this->Form->input('Parcela.identificacao',array('type'=>'text','label'=>'Identificação:','class'=>'tamanho-pequeno'));
			echo $this->Form->input('Parcela.data_vencimento',array('type'=>'text','label'=>'Data de Vencimento<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno forma-data'));	
		?>
	</section>
	
	<section class="coluna-central">
		<?php
			echo $this->Form->input('Parcela.periodocritico',array('type'=>'text','label' => 'Periodo Crítico<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno desabilita','id' =>'PagarPeriodocritico'));
			echo $this->Form->input('Parcela.valor',array('type'=>'text','label'=>'Valor<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno'));	
			echo $this->Form->input('Parcela.desconto',array('type'=>'text','label'=>'Desconto:','class'=>'tamanho-pequeno'));	
		?>	
	</section>
	
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Parcela.banco',array('type'=>'text','label'=>'Banco:','class'=>'tamanho-medio'));	
			echo $this->Form->input('Parcela.agencia',array('type'=>'text','label'=>'Agência:','class'=>'tamanho-pequeno'));					
			echo $this->Form->input('Parcela.conta',array('type'=>'text','label'=>'Conta:','class'=>'tamanho-pequeno'));
		
		?>
	</section>
	<footer>
		<?php
			echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
											'title'=>'Adicionar Parcela',
											'class'=>'bt-direita',
											'id'=>'bt-addParcela'
											));
											
			echo $this->html->image('botao-editar2.png',array('alt'=>'Editar',
						 'title'=>'Editar Parcela',
						 'id'=>'bt-editarParcela',
						 'class'=>'bt-direita',
						 'style'=>'display:none'
						 ));
		?>	
	</footer>
	
</section><!--fim Meio-->
	
	<div>
		<?php if (!empty($conta['Pagamento'])): ?>
			<table id="tabelaParcelasEdit" cellpadding="0" cellspacing="0">
					<thead>
						<th><?php echo ('Parcela'); ?></th>
						<th><?php echo ('Identificação'); ?></th>
						<th><?php echo ('Data Vencimento'); ?></th>
						<th><?php echo ('Período Crítico'); ?></th>
						<th><?php echo ('Valor'); ?></th>
						<th><?php echo ('Desconto'); ?></th>
						<th><?php echo ('Banco'); ?></th>
						<th><?php echo ('Agência'); ?></th>
						<th><?php echo ('Conta'); ?></th>
						<th><?php echo ('Ações'); ?></th>
					</thead>
				
					<?php
						$numero=0;
					 foreach ($conta['Parcela'] as $parcelas): ?>
						<tr id="linhaParc<?php echo $numero;?>">
							<td id="idParc<?php echo $numero;?>"><?php echo $parcelas['id']; ?></td>
							<td id="docParc<?php echo $numero;?>"><?php echo $parcelas['identificacao_documento']; ?></td>
							<td id="venciParc<?php echo $numero;?>"><?php echo $parcelas['data_vencimento']; ?></td>
							<td id="perioParc<?php echo $numero;?>"><?php echo $parcelas['periodocritico']; ?></td>
							<td id="valorParc<?php echo $numero;?>"><?php echo $parcelas['valor']; ?></td>
							<td id="descParc<?php echo $numero;?>"><?php echo $parcelas['desconto']; ?></td>
							<td id="bancoParc<?php echo $numero;?>"><?php echo $parcelas['banco']; ?></td>
							<td id="agenciaParc<?php echo $numero;?>"><?php echo $parcelas['agencia']; ?></td>
							<td id="contaParc<?php echo $numero;?>"><?php echo $parcelas['conta']; ?></td>
							<td>
								<img id="editLinha<?php echo $numero;?>" class="editarParcela" src="/lifecare/app/webroot/img/botao-tabela-editar.png" style="margin-right:5px;" />
								<img id="excluiLinha<?php echo $numero;?>" class="excluirParcela" src="/lifecare/app/webroot/img/lixeira.png" />
							</td>
						</tr>
					<?php $numero++;
						endforeach; ?>	
			</table>
		<?php endif; ?>
	</div>
	

<footer>
		
	<?php
	
	    echo $this->form->submit( 'botao-salvar.png',array(
							    'class'=>'bt-salvarConta',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'id'=>'btn-'
	    ));
	    
	    echo $this->html->image('voltar.png',array('alt'=>'Voltar',
												     'title'=>'voltar',
													 'class'=>'bt-voltar',
													 'url'=>array('action'=>'view',$conta['Conta']['id'])));

	    echo $this->Form->end();	
		

	?>	

	<!-- </form> 
	</section> -->
</footer>
<!--
<pre>
<?php// print_r($conta); ?>
</pre>
-->
	
