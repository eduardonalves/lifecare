<?php 
	$this->start('css');
	echo $this->Html->css('view_produtos');
	$this->end();
	
?>


<header>
	
	<?php 
		echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar'));
	?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption21">Consultas</h1>

	<script>
		$('img').tooltip();
	</script>
</header>

<section><!--SECTION SUPERIOR--> 
	<header>Visualizar Parceiro de Negócios</header>
	<section class="coluna-esquerda">
		<div class="coluna-content">

			<?php				
				echo $this->Form->create('Produto');
			?>
			
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Classificação:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['tipo'],array('class'=>''));?>	</div>
				</div>
				
				<div class="conteudo-linha">		
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo '));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['nome'],array('class'=>'')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['cpf_cnpj'],array('class'=>'')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone1'],array('class'=>'')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['logradouro'],array('class'=>'')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['complemento'],array('class'=>'')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['uf'],array('class'=>'')); ?></div>
				</div>
				
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['cidade'],array('class'=>'')); ?></div>
				</div>
				
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['bairro'],array('class'=>'')); ?></div>
				</div>
				
			
			
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Ponto de referência:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['ponto_referencia'],array('class'=>'valor-descricao')); ?></div>
					<div style="clear:both"></div>
				</div>
					
			</div>					
		</div>	
	</section>
		
	<section class="coluna-central" >
		<fieldset>
			<legend>Dados do Tributário</legend>

			<div class="coluna-content">

				<?php		
					
					echo $this->Form->input('Dadosbancario.nome_banco',array('label' => 'Nome do Banco:','value'=>h($dadosbancario['nome_banco']),'class' => 'tamanho-medio','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.numero_banco',array('label' => 'Número do Banco:','value'=>h($dadosbancario['numero_banco']),'class' => 'tamanho-medio','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.nome_agencia',array('label' => 'Nome da Agência:','value'=>h($dadosbancario['nome_agencia']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.numero_agencia',array('label' => 'Númeor da Agência:','value'=>h($dadosbancario['numero_agencia']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','value'=>h($dadosbancario['conta']),'disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.telefone_banco',array('label' => 'Telefone:','value'=>h($dadosbancario['telefone_banco']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.gerente',array('label' => 'Gerente:','value'=>h($dadosbancario['gerente']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
					
				?>

			</div>
		</fieldset>
	</section>

	<section class="coluna-direita" >
		<fieldset>
			<legend>Dados do Estoque</legend>

			<div class="coluna-content">

				

			</div>

			
		</fieldset>
	</section>
</section><!---Fim section-superior--->
		
<footer>
	<?php
		echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',
													 $produto['Produto']['id'])));
	?>
</footer>
<pre>
<?php print_r($parceirodenegocio); ?>
</pre>
