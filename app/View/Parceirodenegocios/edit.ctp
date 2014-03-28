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
	
function findCEP(ind) {
		    if($.trim($("#Endereco"+ind+"Cep").val()) != ""){
		        
		        $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#Endereco"+ind+"Cep").val().replace("-", ""), function(){
		            if(resultadoCEP["resultado"] == 1){
		                $("#Endereco"+ind+"Logradouro").val(unescape(resultadoCEP["tipo_logradouro"])+" "+unescape(resultadoCEP["logradouro"]));
		                $("#Endereco"+ind+"Bairro").val(unescape(resultadoCEP["bairro"]));
		                $("#Endereco"+ind+"Cidade").val(unescape(resultadoCEP["cidade"]));
		                $("#Endereco"+ind+"Uf").val(unescape(resultadoCEP["uf"]));
		                $("#Endereco"+ind+"Numero").focus();
		            }else{
		               $('#valida'+ ind +'Cep3').css('display','block');
		            }
		        });
		    }
		}
	
$(document).ready(function(){
	
	var	indice = 0;
	$(".buscaCep").click(function(){		
		indiceAux = $(this).attr("id");
		indice = indiceAux.substring(11,12);
		findCEP(indice);		
	});

});
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
			
			$p=0;
			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.'.$p.'.id', array('value'=>$contato['id']));
				echo $this->Form->input('Contato.'.$p.'.telefone1',array('value'=>h($contato['telefone1']),'class' => 'tamanho-medio tel','label' => 'Telefone 1<span class="campo-obrigatorio">*</span>:', 'id' => 'ParceirodenegocioTelefone1'));
				echo '<span id="validaTelefone" class="Msg-tooltipDireita" style="display:none">Preencha o Telefone</span>';
				echo $this->Form->input('Contato.'.$p.'.fax',array('class' => 'tamanho-medio maskTel','label' => 'Fax:', 'maxlength'=>'11','tabindex'=>'7'));
				$p++;
			}
			
		?>

	</section>

	<section class="coluna-central" >

		<?php
			
			echo $this->Form->input('nome',array('class' => 'tamanho-medio','label' => 'Nome<span class="campo-obrigatorio">*</span>:','required'=>'false'));
			echo '<span id="validaNome" class="Msg-tooltipDireita" style="display:none">Preencha o Nome</span>';
			
			$l=0;
			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.'.$l.'.id', array('value'=>$contato['id']));
				echo $this->Form->input('Contato.'.$l.'.telefone2',array('value'=>h($contato['telefone2']),'class' => 'tamanho-medio maskTel','label' => 'Telefone 2:', 'id' => 'ParceirodenegocioTelefone2'));
				echo $this->Form->input('Contato.'.$l.'.email',array('value'=>h($contato['email']),'class' => 'tamanho-medio','label' => 'Email:'));
				$l++;
			}
		?>

	</section>

	<section class="coluna-direita" >

		<?php
		
			echo $this->Form->input('cpf_cnpj',array('type'=>'text','class' => 'tamanho-medio obrigatorio','style'=>'background:#EBEAFC;','disabled'=>'disabled','label'=>'', 'div' => array('class' => 'input text divCpfCnpj'),'tabindex'=>'3'));
			echo "<div id='idcpf'><input id='inputcpf' type='radio'   name='CPFCNPJ' value='cpf'><label class='label-cpf'>CPF /</label></div>	 
				  <div id='idcnpj'><input id='inputcnpj' type='radio' name='CPFCNPJ' value='cnpj'><label class='label-cnpj'>CNPJ<span class='campo-obrigatorio'>*</span>:</label></div>";
			echo '<span id="validaCPF" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ</span>';
			echo '<span id="validaCPFTamanho" class="Msg-tooltipAbaixo" style="display:none">Preencha o CPF/CNPJ Corretamente</span>';

			$j=0;
			foreach($parceirodenegocio['Contato'] as $contato){
				echo $this->Form->input('Contato.'.$j.'.id', array('value'=>$contato['id']));
				echo $this->Form->input('Contato.'.$j.'.telefone3',array('class' => 'tamanho-medio Nao-Letras maskCel','label' => 'Celular:' , 'maxlength'=>'11','tabindex'=>'6'));
				echo '<span id="validaCelular" class="Msg-tooltipAbaixo" style="display:none">Preencha o Corretamente</span>';
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
					
					
					echo $this->Form->input('Endereco.'.$z.'.numero', array('label'=>'Número:','class' => 'tamanho-medio','tabindex'=>'12'));
					
					echo $this->Form->input('Endereco.'.$z.'.bairro', array('value'=>h($endereco['bairro']),'label'=>'Bairro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
					echo '<span id="valida0Bairro" class="Msg-tooltipAbaixo" style="display:none">Preencha o Bairro</span>';
						
				?>

			</section>
		
			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Endereco.'.$z.'.cep', array('label'=>'CEP<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio maskCep obrigatorio','maxlength'=>'12','tabindex'=>'10'));
					echo $this->html->image('consultas.png',array('id'=>'consultaCEP'.$z.'','class'=>'buscaCep','style'=>'margin-left:10px;cursor:pointer;'));
					
					echo '<span id="valida'.$z.'Cep1" class="Msg-tooltipDireita" style="display:none">Preencha o CEP</span>';
					echo '<span id="valida'.$z.'Cep2" class="Msg-tooltipDireita" style="display:none">Preencha corretamente o CEP</span>';
					echo '<span id="valida'.$z.'Cep3" class="Msg-tooltipDireita" style="display:none">Endereço não encontrado para o cep digitado.</span>';
					
					echo $this->Form->input('Endereco.'.$z.'.uf', array('value' => h($endereco['uf']),'label'=>'UF<span class="campo-obrigatorio">*</span>:','type' => 'text','class' => 'tamanho-pequeno','div' => array('class' => 'inputCliente input text divUf')));
					echo '<span id="valida0Uf" class="Msg-tooltipDireita" style="display:none">Selecione o Estado</span>';
					
					echo $this->Form->input('Endereco.'.$z.'.complemento', array('value'=>h($endereco['complemento']),'label'=>'Complemento:','class' => 'tamanho-pequeno'));
					
					?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Endereco.'.$z.'.logradouro', array('value'=>h($endereco['logradouro']),'label'=>'Logradouro<span class="campo-obrigatorio">*</span>:','class' => 'tamanho-medio'));
					echo '<span id="valida0Logradouro" class="Msg-tooltipDireita" style="display:none">Preencha o Logradouro</span>';
					echo $this->Form->input('Endereco.'.$z.'.cidade', array('value'=>h($endereco['cidade']),'label'=>'Cidade<span class="campo-obrigatorio">*</span>:', 'type' => 'text','class' => 'tamanho-pequeno'));
					echo '<span id="valida0Cidade" class="Msg-tooltipDireita" style="display:none">Selecione o Cidade</span>';
					echo $this->Form->input('Endereco.'.$z.'.ponto_referencia', array('value'=>h($endereco['ponto_referencia']),'label'=>'Ponto de Referência:','type' => 'textarea'));
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


