<?php 
	$this->start('css');
	echo $this->Html->css('view_parceiro');
	$this->end();

?>


<header>
	
	<?php 
		echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar'));
	?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption31">Consultas</h1>

	<script>
		$('img').tooltip();
	</script>
</header>

<section><!--SECTION SUPERIOR--> 
	<header>Visualizar Parceiro de Negócios</header>
	<section class="coluna-esquerda">
		<div class="coluna-content">

			<?php				
				echo $this->Form->create('Parceirodenegocio');
			?>
			
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Classificação:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['tipo'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">		
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo '));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['nome'],array('class'=>'valor')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['cpf_cnpj'],array('class'=>'valor')); ?></div>
				</div>
				
				<?php
					foreach($parceirodenegocio['Contato'] as $contato){
				?>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone1'],array('class'=>'valor')); ?></div>
				</div>
				
				<?php
					}
				?>
				
				<?php
					foreach($parceirodenegocio['Endereco'] as $endereco){
				?>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['logradouro'],array('class'=>'valor')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['complemento'],array('class'=>'valor')); ?></div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['uf'],array('class'=>'valor')); ?></div>
				</div>
				
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['cidade'],array('class'=>'valor')); ?></div>
				</div>
				
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['bairro'],array('class'=>'valor')); ?></div>
				</div>
				
			
			
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Ponto de referência:',array('class'=>'titulo pontoReferencia')); ?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['ponto_referencia'],array('class'=>'valor-descricao')); ?></div>					
				</div>
				
				<?php
					}
				?>
			</div>					
		</div>	
	</section>
		
	<section class="coluna-central" >
		<fieldset>
			<legend>Dados Bancários</legend>

			<div class="coluna-content">

				<?php		

				foreach($parceirodenegocio['Dadosbancario'] as $dadosbancario){
					echo $this->Form->input('Dadosbancario.nome_banco',array('label' => 'Nome do Banco:','value'=>h($dadosbancario['nome_banco']),'class' => 'tamanho-medio','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.numero_banco',array('label' => 'Número do Banco:','value'=>h($dadosbancario['numero_banco']),'class' => 'tamanho-medio','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.nome_agencia',array('label' => 'Nome da Agência:','value'=>h($dadosbancario['nome_agencia']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.numero_agencia',array('label' => 'Número da Agência:','value'=>h($dadosbancario['numero_agencia']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','value'=>h($dadosbancario['conta']),'disabled'=>'disabled'));
					echo $this->Form->input('Dadosbancario.telefone_banco',array('label' => 'Telefone:','value'=>h($dadosbancario['telefone_banco']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
				?>
				
				<div class="dadosbancarioLinha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Gerente:',array('class'=>'')); ?></div>
					<div class="linha1"><?php echo $this->Html->Tag('p',$dadosbancario['gerente'],array('class'=>'')); ?></div>					
				</div>
				
				<?php	
				}	
				?>

			</div>
		</fieldset>
	</section>

	<section class="coluna-direita" >
		<fieldset>
			<legend>Dados de Crédito</legend>

			<div class="coluna-content">
				
				<?php		

				foreach($parceirodenegocio['Dadoscredito'] as $dadoscredito){

					echo $this->Form->input('limite',array('label' => 'Limite:','value'=>h($dadoscredito['limite']),'class' => 'tamanho-medio','disabled'=>'disabled'));
					echo $this->Form->input('validade_limite',array('label' => 'Validade Limite:','value'=>h($dadoscredito['validade_limite']),'class' => 'tamanho-medio','disabled'=>'disabled'));
					echo $this->Form->input('status',array('label' => 'Status:','value'=>h($dadoscredito['status']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));
					echo $this->Form->input('bloqueado',array('label' => 'Bloqueado:','value'=>h($dadoscredito['bloqueado']),'class' => 'tamanho-pequeno','disabled'=>'disabled'));

				}	
				?>
				

			</div>

			
		</fieldset>
	</section>
</section><!---Fim section-superior--->
		
<footer>
	<?php
		echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$parceirodenegocio['Parceirodenegocio']['id'])));
	?>
</footer>
<!--
<pre>
<?php //print_r($parceirodenegocio); ?>
</pre>
-->
