<?php 

	$this->start('css');
		echo $this->Html->css('edit_parceiros');
	$this->end();

	$this->start('script');
		echo $this->Html->script('picklist-autoselect.js');
	$this->end();
?>
		
<script type="text/javascript" src="http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js"></script>
<script>
window.onload = function() {
  new dgCidadesEstados({
    estado: document.getElementById('Endereco0Uf'),
    cidade: document.getElementById('Endereco0Cidade')
  });
}
</script>
		

<header>
	<?php echo $this->Html->image('titulo-consultar.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption21">Consultas</h1>

</header>

<section><!--SECTION SUPERIOR--> 
	<header>Editar Parceiro de Negócios</header>

	<section id="coluna-esquerda" class="coluna-esquerda">
		<fieldset class="fieldset-esquerda">
			<div class="coluna-content">

				<?php
					echo $this->Form->create('Parceirodenegocio');
					
					echo $this->Form->input('Parceirodenegocio.id');
					
					echo $this->Form->input('tipo',array('label' => 'Classificação:','type' => 'select','div' =>array( 'class' => 'input select divTipoParceiro'),'options'=>array('cliente'=>'Cliente','fornecedor'=>'Fornecedor')));
					echo $this->Form->input('nome',array('class' => 'tamanho-medio','label' => 'Nome:'));
					echo $this->Form->input('cpf_cnpj',array('class' => 'tamanho-medio','label' => 'CPF/CNPJ'));
					
					$j=0;
					foreach($parceirodenegocio['Contato'] as $contato){
						echo $this->Form->input('Contato.'.$j.'.id', array('value'=>$contato['id']));
						echo $this->Form->input('Contato.'.$j.'.telefone1', array('value'=>h($contato['telefone1']),'label'=>'Telefone<span class="campo-obrigatorio">*</span>:','class'=>'tamanho-pequeno','length'=>'11'));
						$j++;
					}
					$z=0;
					foreach($parceirodenegocio['Endereco'] as $endereco){
						echo $this->Form->input('Endereco.'.$z.'.id', array('value'=>$endereco['id']));
						
						echo $this->Form->input('Endereco.'.$z.'.logradouro', array('value'=>h($endereco['logradouro']),'label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
						echo $this->Form->input('Endereco.'.$z.'.complemento', array('value'=>h($endereco['complemento']),'label'=>'Complemento:','class' => 'tamanho-pequeno'));
						echo $this->Form->input('Endereco.'.$z.'.uf', array('value'=>h($endereco['uf']),'label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'select','div' => array('class' => 'inputCliente input text divUf')));
						echo $this->Form->input('Endereco.'.$z.'.cidade', array('value'=>h($endereco['cidade']),'label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'select'));
						echo $this->Form->input('Endereco.'.$z.'.bairro', array('value'=>h($endereco['bairro']),'label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-pequeno'));
						echo $this->Form->input('Endereco.'.$z.'.ponto_referencia', array('value'=>h($endereco['ponto_referencia']),'label'=>'Ponto de Referência:','type' => 'textarea'));
						$z++;
					}
				?>	
			</div>	
		</fieldset>
	</section>

	<section class="coluna-central" >
		<fieldset>
			<legend>Dados Bancários</legend>

			<div class="coluna-content">

				<?php	
					$i=0;
					foreach($parceirodenegocio['Dadosbancario'] as $dadosbancario){
						echo $this->Form->input('Dadosbancario.'.$i.'.id', array('value'=>$dadosbancario['id']));				
						echo $this->Form->input('Dadosbancario.'.$i.'.nome_banco',array('value'=>h($dadosbancario['nome_banco']),'label' => 'Nome do Banco:','class' => 'tamanho-medio'));
						echo $this->Form->input('Dadosbancario.'.$i.'.numero_banco',array('value'=>h($dadosbancario['numero_banco']),'label' => 'Número do Banco:','class' => 'tamanho-medio'));
						echo $this->Form->input('Dadosbancario.'.$i.'.nome_agencia',array('value'=>h($dadosbancario['nome_agencia']),'label' => 'Nome da Agência:','class' => 'tamanho-pequeno'));
						echo $this->Form->input('Dadosbancario.'.$i.'.numero_agencia',array('value'=>h($dadosbancario['numero_agencia']),'label' => 'Númeor da Agência:','class' => 'tamanho-pequeno'));
						echo $this->Form->input('Dadosbancario.'.$i.'.conta',array('value'=>h($dadosbancario['conta']),'label' => 'Conta:','class' => 'tamanho-pequeno'));
						echo $this->Form->input('Dadosbancario.'.$i.'.telefone_banco',array('value'=>h($dadosbancario['telefone_banco']),'label' => 'Telefone:','class' => 'tamanho-pequeno'));
						echo $this->Form->input('Dadosbancario.'.$i.'.gerente',array('value'=>h($dadosbancario['gerente']),'label' => 'Gerente:','class' => 'tamanho-medio'));
						$i++;
					}
				?>

			</div>
		</fieldset>
	</section>

	<section id="coluna-direita" class="coluna-direita" >
		<fieldset>
			<legend>Dados do Crédito</legend>

			<div class="estoque coluna-content">
				<?php
				$y=0;
				foreach($parceirodenegocio['Dadoscredito'] as $dadoscredito){
					echo $this->Form->input('Dadoscredito.'.$y.'.id', array('value'=>$dadoscredito['id']));				
					echo $this->Form->input('Dadoscredito.'.$y.'.limite',array('value'=>h($dadoscredito['limite']),'type' => 'text', 'label' => 'Limite de Crédito:','class' => 'tamanho-medio forma-data'));
					echo $this->Form->input('Dadoscredito.'.$y.'.validade_limite',array('value'=>h($dadoscredito['validade_limite']),'label' => 'Validade do Limitte:','type' => 'text','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadoscredito.'.$y.'.status',array('value'=>h($dadoscredito['status']),'label' => 'Status:','type' => 'select','options'=>array('status1'=>'Status1','status2'=>'Status2')));
					echo $this->Form->input('Dadoscredito.'.$y.'.bloqueado',array('value'=>h($dadoscredito['bloqueado']),'label' => 'Bloqueado:','type' => 'select','options'=>array('0'=>'Não','1'=>'Sim')));
					$y++;
				}
				?>

			</div>
		</fieldset>
	</section>
</section><!---Fim section-superior--->

<footer>
	
	 <?php 		
	echo $this->form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro','controller' =>'Parceirodenegocio','action' =>'view'));    
	echo $this->Form->end();
    ?>

</footer>
