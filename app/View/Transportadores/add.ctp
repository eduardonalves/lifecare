<header>

	<img src="/lifecare/img/titulo-cadastrar.png" id="cadastrar-titulo" alt="Cadastrar" title="Cadastrar" />
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	 <h1 class="menuOption62">Adicionar Transportador</h1>    
</header>

<section>

<script type="text/javascript">
	$(document).ready(function(){
		$(".cnpj").mask("99.999.999/9999-99");
		$(".uf").mask("SS");
		$(".ieMask").mask("999.999.999.999");
	});
</script>
<header>Dados de Cadastro</header>
		
	<section>
		<section>

				<?php echo $this->Form->create('Transportadore', array('action' => 'add')); ?>
				<?php 
					
					echo "<section class=\"coluna-esquerda\">";
					echo $this->Form->input('Transportadore.nome', array('class'=>'tamanho-medio', 'label' => array('text'=>'Nome:')));
					echo $this->Form->input('Transportadore.cnpj', array('class'=>'cnpj tamanho-medio', 'label' => array('text'=>'Cnpj:')));
					echo "</section>";
					echo "<section class=\"coluna-central\">";
					echo $this->Form->input('Transportadore.ie', array('class'=>'tamanho-medio ieMask', 'label' => array('text'=>'Inscrição Estadual:')));
					echo $this->Form->input('Transportadore.endereco', array('class'=>'tamanho-medio', 'label' => array('text'=>'Endereço:')));
					echo "</section>";
					echo "<section class=\"coluna-direita\">";
					echo $this->Form->input('Transportadore.cidade', array('class'=>'tamanho-medio', 'label' => array('text'=>'Cidade:')));
					echo $this->Form->input('Transportadore.uf', array('class'=>'uf tamanho-pequeno', 'label' => array('text'=>'UF:')));
					echo "</section>";
					
				?>
					<section class="coluna-direita" style="margin-top:30px;">

						<?php echo $this->Form->submit('botao-salvar.png'); ?>

					</section>

				<?php echo $this->Form->end(); ?>

		</section>

	</section>
	
	<!--
	<section style="top:30px;">
		<table>
			<thead>
				<th>Nome</th>
				<th>CNPJ</th>
				<th>Insc. Estadual</th>
				<th>Endereço</th>
				<th>Cidade</th>
				<th>UF</th>
				<th>Editar</th>
			</thead>

			<tr>
				<td>Nome</td>
				<td>CNPJ</td>
				<td>IE</td>
				<td>Endereco</td>
				<td>Cidade</td>
				<td>UF</td>

				<td>
					<a href="/lifecare/Unidades/edit/1" onclick="if (confirm(&quot;Editar Est\u00e1 Unidade?&quot;)) { return true; } return false;"><img src="/lifecare/img/botao-tabela-editar.png" alt="Remover Unidade Comercial" /></a>
				</td>
			</tr>
		</table>
	</section>
    -->

</section>
<!-- 

<div class="transportadores form">
<?php echo $this->Form->create('Transportadore'); ?>
	<fieldset>
		<legend><?php echo __('Add Transportadore'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Transportadores'), array('action' => 'index')); ?></li>
	</ul>
</div>
-->
