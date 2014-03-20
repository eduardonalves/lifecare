<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
	$this->end();

	$this->start('script');
		//echo $this->Html->script('http://cidades-estados-js.googlecode.com/files/cidades-estados-1.2-utf8.js');
		echo $this->Html->script('funcoes_parceiro.js');
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
    <h1 class="menuOption31">Editar Parceiro</h1>
</header>

<section> <!---section superior--->

	<header>Dados Gerias do Parceiro</header>
	
	<?php echo $this->Form->create('Parceirodenegocio'); ?>


	<section class="coluna-esquerda">

		<?php
			echo $this->Form->input('Parceirodenegocio.id');
			echo $this->Form->input('tipo',array('label' => 'Classificação:','disabled'=>'disabled','type' => 'text','class'=>'tamanho-medio borderZero'));
			echo $this->Form->input('nome',array('class' => 'tamanho-medio','label' => 'Nome<span class="campo-obrigatorio">*</span>:','required'=>'false'));
			echo '<span id="validaNome" class="Msg-tooltipDireita" style="display:none">Preencha o Nome</span>';
			echo $this->Form->input('cpf_cnpj',array('class' => 'tamanho-medio maskcpf Nao-Letras','label' => 'CPF/CNPJ<span class="campo-obrigatorio">*</span>:','required'=>'false'));
			echo '<span id="validaCPF" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ</span>';
			echo '<span id="validaCPFTamanho" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ Corretamente</span>';
		?>

	</section>

	<section class="coluna-central" >

		<?php
			
			
			$l=0;
			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.'.$l.'.id', array('value'=>$contato['id']));
				echo $this->Form->input('Contato.'.$l.'.email',array('value'=>h($contato['email']),'class' => 'tamanho-medio','label' => 'Email:'));
				echo $this->Form->input('Contato.'.$l.'.telefone1',array('value'=>h($contato['telefone1']),'class' => 'tamanho-medio tel','label' => 'Telefone 1<span class="campo-obrigatorio">*</span>:', 'id' => 'ParceirodenegocioTelefone1'));
				echo '<span id="validaTelefone" class="Msg-tooltipDireita" style="display:none">Preencha o Telefone</span>';
				echo $this->Form->input('Contato.'.$l.'.telefone2',array('value'=>h($contato['telefone2']),'class' => 'tamanho-medio tel','label' => 'Telefone 2:', 'id' => 'ParceirodenegocioTelefone2'));
				$l++;
			}
		?>

	</section>

	<section class="coluna-direita" >

		<?php
			$j=0;
			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.'.$j.'.celular',array('class' => 'tamanho-medio tel','label' => 'Celular:'));
				$j++;
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
					echo $this->Form->input('Endereco.'.$z.'.id', array('value'=>$endereco['id']));

					echo $this->Form->input('Endereco.'.$z.'.tipo',array('label' => 'Tipo:','type' => 'select','options'=>array('PRINCIPAL'=>'Principal','COBRANCA'=>'Cobrança','ENTREGA'=>'Entrega'),'div' =>array( 'class' => 'input select')));
					echo $this->Form->input('Endereco.'.$z.'.uf', array('value' => h($endereco['uf']),'label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno','div' => array('class' => 'inputCliente input text divUf')));
					echo '<span id="valida0Uf" class="Msg-tooltipDireita" style="display:none">Selecione o Estado</span>';
					echo $this->Form->input('Endereco.'.$z.'.ponto_referencia', array('value'=>h($endereco['ponto_referencia']),'label'=>'Ponto de Referência:','type' => 'textarea'));
				
				?>

			</section>
		
			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Endereco.'.$z.'.logradouro', array('value'=>h($endereco['logradouro']),'label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
					echo '<span id="valida0Logradouro" class="Msg-tooltipDireita" style="display:none">Preencha o Logradouro</span>';
					echo $this->Form->input('Endereco.'.$z.'.cidade', array('value'=>h($endereco['cidade']),'label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'text','class' => 'tamanho-pequeno'));
					echo '<span id="valida0Cidade" class="Msg-tooltipDireita" style="display:none">Selecione o Cidade</span>';
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.'.$z.'.complemento', array('value'=>h($endereco['complemento']),'label'=>'Complemento:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Endereco.'.$z.'.bairro', array('value'=>h($endereco['bairro']),'label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
					echo '<span id="valida0Bairro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Bairro</span>';
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
					echo $this->Form->input('Dadosbancario.'.$i.'.nome_banco',array('label' => 'Nome do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.'.$i.'.numero_agencia',array('label' => 'Número da Agência:','class' => 'tamanho-pequeno agencia'));
					echo $this->Form->input('Dadosbancario.'.$i.'.gerente',array('label' => 'Gerente:','class' => 'tamanho-pequeno'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.'.$i.'.numero_banco',array('label' => 'Número do Banco:','class' => 'tamanho-medio'));
					echo $this->Form->input('Dadosbancario.'.$i.'.conta',array('label' => 'Conta:','class' => 'tamanho-pequeno','id' => 'DadosbancarioConta0'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.'.$i.'.nome_agencia',array('label' => 'Nome da Agência:','class' => 'tamanho-pequeno'));
					echo $this->Form->input('Dadosbancario.'.$i.'.telefone_banco',array('label' => 'Telefone:','class' => 'tamanho-medio tel'));
				?>

			</section>
		</div>
	</div>	
	</fieldset>
	<?php $i++;	}?>
</section><!--fim Meio-->

<section> <!---section Baixo--->	
	<?php
		if($parceirodenegocio['Parceirodenegocio']['tipo'] == "Cliente" || $parceirodenegocio['Parceirodenegocio']['tipo'] == "CLIENTE" || $parceirodenegocio['Parceirodenegocio']['tipo'] == "cliente"){
			echo $this->element('dados_creditoEdit');
		}
	?>
</section>	


<footer>

    <?php
		echo $this->Form->submit('botao-salvar.png',array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'bt-salvarParceiro','controller' =>'Parceirodenegocio','action' => 'add','view' => 'add'));
		echo $this->Form->end();
    ?>

</footer>


