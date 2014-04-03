<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
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

<script>

</script>

<header>
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <h1 class="menuOption31">Visualizar Parceiro</h1>
</header>

<section> <!---section superior--->

	<header>Dados Gerias do Parceiro</header>
	
	<?php echo $this->Form->create('Parceirodenegocio'); ?>


	<section class="coluna-esquerda">

		<?php
		
			echo $this->Form->input('tipo',array('value'=>h($parceirodenegocio['Parceirodenegocio']['tipo']),'label' => 'Classificação:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text','class'=>'tamanho-grande borderZero'));
			
			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.telefone1',array('value'=>h($contato['telefone1']),'class' => 'tamanho-grande borderZero','label' => 'Telefone 1:','readonly'=>'readonly','onFocus'=>'this.blur();', 'id' => 'ParceirodenegocioTelefone1'));
				echo $this->Form->input('Contato.fax',array('value'=>h($contato['fax']),'label' => 'Fax:','class' => 'tamanho-grande borderZero','label' => 'Fax:','readonly'=>'readonly','onFocus'=>'this.blur();'));
			}			
			
		?>

	</section>

	<section class="coluna-central" >

		<?php
			echo $this->Form->input('nome',array('value'=>h($parceirodenegocio['Parceirodenegocio']['nome']),'class' => 'tamanho-grande borderZero','label' => 'Nome:','readonly'=>'readonly','onFocus'=>'this.blur();','required'=>'false'));

			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.telefone2',array('value'=>h($contato['telefone2']),'class' => 'tamanho-grande borderZero','label' => 'Telefone 2:','readonly'=>'readonly','onFocus'=>'this.blur();', 'id' => 'ParceirodenegocioTelefone2'));
				echo $this->Form->input('Contato.email',array('value'=>h($contato['email']),'class' => 'tamanho-grande borderZero','label' => 'Email:','readonly'=>'readonly','onFocus'=>'this.blur();'));

			}
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			echo $this->Form->input('cpf_cnpj',array('value'=>h($parceirodenegocio['Parceirodenegocio']['cpf_cnpj']),'class' => 'tamanho-grande borderZero','label' => 'CPF/CNPJ:','readonly'=>'readonly','onFocus'=>'this.blur();'));

			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.telefone3',array('value'=>h($contato['telefone3']),'class' => 'tamanho-grande borderZero','label' => 'Celular:','readonly'=>'readonly','onFocus'=>'this.blur();', 'id' => 'ParceirodenegocioTelefone3'));	
			}	
		?>

	</section>
</section><!---Fim section superior--->

<section class="ajusteAlignSection"> <!---section MEIO--->
	
	
	<header class="">Endereços</header>
	<?php
	$z=0;
	foreach($parceirodenegocio['Endereco'] as $endereco){
	?>
	<div class="area-endereco"> 
		<div class="bloco-area">
			<fieldset class="dadosRepetidos">
				<legend>Endereço  <?php echo $z+1; ?></legend>
			<section class="coluna-esquerda">

				<?php	
					echo $this->Form->input('Endereco.id', array('value'=>$endereco['id']));

					echo $this->Form->input('Endereco.tipo',array('value' => h($endereco['tipo']),'label' => 'Tipo:','class'=>'tamanho-grande borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text'));
					echo $this->Form->input('Endereco.numero',array('value' => h($endereco['numero']),'label' => 'Número:','class'=>'tamanho-grande borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'text'));
					echo $this->Form->input('Endereco.bairro', array('value'=>h($endereco['bairro']),'label'=>'Bairro:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));
				
				?>

			</section>
		
			<section class="coluna-central" >

				<?php
				
					echo $this->Form->input('Endereco.cep', array('value' => h($endereco['cep']),'label'=>'CEP:','type' => 'text','class' => 'tamanho-grande borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','div' => array('class' => 'inputCliente input text divUf')));
					echo $this->Form->input('Endereco.uf', array('value' => h($endereco['uf']),'label'=>'UF:','type' => 'text','class' => 'tamanho-grande borderZero','readonly'=>'readonly','onFocus'=>'this.blur();','div' => array('class' => 'inputCliente input text divUf')));
					echo $this->Form->input('Endereco.complemento', array('value'=>h($endereco['complemento']),'label'=>'Complemento:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));

						?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.logradouro', array('value'=>h($endereco['logradouro']),'label'=>'Logradouro:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero' ));
					echo $this->Form->input('Endereco.cidade', array('value'=>h($endereco['cidade']),'label'=>'Cidade:', 'type' => 'text','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));
					echo $this->Form->input('Endereco.ponto_referencia', array('value'=>h($endereco['ponto_referencia']),'label'=>'Ponto de Referência:','readonly'=>'readonly','onFocus'=>'this.blur();','type' => 'textarea','class'=>'borderZero'));

				?>

			</section>

			</fieldset>
		</div>	
	</div>
		<?php $z++;} ?>
</section><!--fim Meio-->

<section class="ajusteAlignSection"> <!---section MEIO--->

	<header class="">Dados Bancários</header>
	<?php	
		$i=0;
		foreach($parceirodenegocio['Dadosbancario'] as $dadosbancario){
			echo $this->Form->input('Dadosbancario.'.$i.'.id', array('value'=>$dadosbancario['id']));				

	?>
	<fieldset class="dadosRepetidos">
				<legend>Dados Bancários  <?php echo $i+1; ?></legend>
	<div class="area-dadosbanc">
		<div class="bloco-area">
			
			<section class="coluna-esquerda">

				<?php 
					echo $this->Form->input('Dadosbancario.nome_banco',array('value'=>h($dadosbancario['nome_banco']),'label' => 'Nome do Banco:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));
					echo $this->Form->input('Dadosbancario.numero_agencia',array('value'=>h($dadosbancario['numero_agencia']),'label' => 'Número da Agência:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande agencia borderZero'));
					echo $this->Form->input('Dadosbancario.gerente',array('value'=>h($dadosbancario['gerente']),'label' => 'Gerente:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.numero_banco',array('value'=>h($dadosbancario['numero_banco']),'label' => 'Número do Banco:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));
					echo $this->Form->input('Dadosbancario.conta',array('value'=>h($dadosbancario['conta']),'label' => 'Conta:','type'=>'text','readonly'=>'readonly','onFocus'=>'this.blur();','id' => 'DadosbancarioConta0','class'=>'borderZero tamanho-grande'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.nome_agencia',array('value'=>h($dadosbancario['nome_agencia']),'label' => 'Nome da Agência:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));
					echo $this->Form->input('Dadosbancario.telefone_banco',array('value'=>h($dadosbancario['telefone_banco']),'label' => 'Telefone:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-grande borderZero'));
				?>

			</section>
		</div>
	</div>	
		</fieldset>
	<?php $i++;	}?>
</section><!--fim Meio-->


	<?php
		//if($parceirodenegocio['Parceirodenegocio']['tipo'] == "Cliente" || $parceirodenegocio['Parceirodenegocio']['tipo'] == "CLIENTE" || $parceirodenegocio['Parceirodenegocio']['tipo'] == "cliente"){
			echo $this->element('dados_creditoView');
		//}
	?>



<footer>

    <?php
		echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$parceirodenegocio['Parceirodenegocio']['id'])));
													 
    ?>

</footer>
