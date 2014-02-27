<?php	    
	$this->start('css');
	echo $this->Html->css('contas_pagar');
	echo $this->Html->css('table');
	$this->end();	
?>


<header>

	<?php echo $this->Html->image('financeiro_title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	 
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption34">Cadastrar Conta a Pagar</h1>
	
</header>
	
<section> <!---section superior--->

	<header>Dados Gerais de Movimentação</header>

	<section class="coluna-esquerda">
		<?php
			echo $this->Form->input('identificacao',array('label'=>'Identificação:','class'=>'tamanho-medio'));
			echo $this->Form->input('valor',array('label'=>'Valor:','class'=>'tamanho-pequeno'));
			echo $this->Form->input('status',array('label'=>'Status:','class'=>'tamanho-pequeno'));
		?>
				
	</section>
		
	<section class="coluna-central" >
		<?php		
			echo $this->Form->input('data_emissao',array('label'=>'Data de Emissão:','class'=>'tamanho-pequeno forma-data'));			
			echo $this->Form->input('cliente',array('label'=>'Cliente:','type'=>'select','class'=>'tamanho-medio'));	
			//echo $this->Form->input('parceirodenegocio_id',array('label'=>'Parceiro de Negócio:','class'=>'tamanho-medio'));	
			echo $this->Form->input('perido_critico',array('label'=>'Periodo Crítico:','class'=>'tamanho-medio'));		
		?>		
	</section>
	
	<section class="coluna-direita" >
		<?php
			echo $this->Form->input('data_quitacao',array('label'=>'Data Validade:','class'=>'tamanho-pequeno forma-data'));
			echo $this->Form->input('tipo',array('label'=>'Tipo:','class'=>'tamanho-medio'));
			//echo $this->Form->input('imagem',array('label'=>'Imagem','class'=>'tamanho-medio'));
			echo $this->Form->input('descricao',array('label'=>'Descrição:','class'=>'','type'=>'textarea'));
		?>
		
	</section>
</section><!---Fim section superior--->

<section> <!---section meio--->

	<header>Dados da Parcela</header>

	<section class="coluna-esquerda">
		<?php
		echo $this->Form->input('tipo',array('label'=>'Tipo:','type'=>'select','class'=>'tamanho-pequeno'));	
		?>
	</section>
	
	<section class="coluna-central">
		<?php
		echo $this->Form->input('forma_pagamento',array('label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno'));
		?>	
	</section>
	
	<section class="coluna-direita">
		<?php
		echo $this->Form->input('numero_parcelas',array('label'=>'Numero de Parcelas:','class'=>'tamanho-pequeno borderZero','readonly'=>'readonly','onFocus'=>'this.blur();'));	
		?>
	</section>
</section><!--fim Meio-->

<div class="fieldset">
	
		<section class="coluna-esquerda">
			<?php
				echo $this->Form->input('parcela',array('label'=>'Parcela:','class'=>'tamanho-pequeno'));	
				echo $this->Form->input('valor',array('label'=>'Valor:','class'=>'tamanho-pequeno'));	
				echo $this->Form->input('agencia',array('label'=>'Agência:','class'=>'tamanho-pequeno'));	
			?>
		</section>
	
			
		<section class="coluna-central">
			<?php
				echo $this->Form->input('identificacao',array('label'=>'Identificação:','class'=>'tamanho-pequeno'));
				echo $this->Form->input('periodo_critico',array('label'=>'Periodo Crítico:','class'=>'tamanho-pequeno'));
				echo $this->Form->input('conta',array('label'=>'Conta:','class'=>'tamanho-pequeno'));
			?>	
		</section>
	
				
		<section class="coluna-direita">
			<?php
				echo $this->Form->input('data_vencimento',array('label'=>'Data de Vencimento:','class'=>'tamanho-pequeno forma-data'));	
				echo $this->Form->input('desconto',array('label'=>'Desconto:','class'=>'tamanho-pequeno'));	
				echo $this->Form->input('banco',array('label'=>'Banco:','class'=>'tamanho-medio'));					
			?>
		</section>
			<?php
				echo $this->html->image('botao-adcionar2.png',array('alt'=>'Adicionar',
																		'title'=>'Adicionar',
																		'class'=>'bt-direita'
																		));
			?>		
</div>
	
	<div>
		<table id="tabela-principal" cellpadding="0" cellspacing="0">
			<tr>

					<th><?php echo ('Parcela'); ?></th>
					<th><?php echo ('Identificação'); ?></th>
					<th><?php echo ('Data de Vencimento'); ?></th>
					<th><?php echo ('Valor'); ?></th>
					<th><?php echo ('Periodo Crítico'); ?></th>
					<th><?php echo ('Banco'); ?></th>
					<th><?php echo ('Agência'); ?></th>
					<th><?php echo ('Conta'); ?></th>
					<th class="actions"><?php echo __('Ações'); ?></th>
			</tr>
		</table>
	
	
	</div>

<footer>
		
	<?php
		
		echo $this->form->submit( 'botao-salvar.png',array('class'=>'bt-salvarConta','alt'=>'Salvar','title'=>'Salvar','id'=>'btn-salvarContaPagar')); 
			
		echo $this->Form->end();	
	?>	

	<!-- </form> 
	</section> -->
</footer>
