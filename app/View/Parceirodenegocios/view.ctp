<?php
	$this->start('css');
		echo $this->Html->css('parceiro');
		echo $this->Html->css('compras');
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
    <?php echo $this->Html->image('titulo-consultar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Visualizar', 'title' => 'Visualizar')); ?>

    <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
    <?php
		if(!isset($telaAbas)){
			echo '<h1 class="menuOption31">Visualizar Parceiro</h1>';
    ?>

</header>

<section> <!---section superior--->	
	<header>Dados Gerais do Parceiro</header>
	
	<section class="coluna-esquerda">

		<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Classificação:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['tipo'],array('class'=>'valor'));?>	</div>
				</div>
		</div>
		<?php
			foreach($parceirodenegocio['Contato'] as $contato){
		?>
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone 1:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone1'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Fax:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['fax'],array('class'=>'valor'));?>	</div>
				</div>
				
			</div>
		<?php
			}			
		?>

	</section>

	<section class="coluna-central" >

		<div class="segmento-esquerdo">				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['nome'],array('class'=>'valor'));?>	</div>
				</div>
		</div>
		<?php
			foreach($parceirodenegocio['Contato'] as $contato){
		?>
			<div class="segmento-esquerdo">				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone 2:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone2'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Email:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['email'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
		<?php				
			}
		?>

	</section>

	<section class="coluna-direita" >
		<div class="segmento-esquerdo">				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['cpf_cnpj'],array('class'=>'valor'));?>	</div>
				</div>
		</div>
		<?php
			foreach($parceirodenegocio['Contato'] as $contato){
		?>	
			<div class="segmento-esquerdo">		
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Celular:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone3'],array('class'=>'valor'));?>	</div>
				</div>
			</div>			
		<?php
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
				?>				
					<div class="segmento-esquerdo">		
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Tipo:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['tipo'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Número:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['numero'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['bairro'],array('class'=>'valor'));?>	</div>
						</div>
						
					</div>

			</section>
		
			<section class="coluna-central" >
				<div class="segmento-esquerdo">		
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['cep'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['uf'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['complemento'],array('class'=>'valor'));?>	</div>
						</div>
						
					</div>
			</section>

			<section class="coluna-direita" >
					<div class="segmento-esquerdo">		
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['logradouro'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['cidade'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Ponto de Referência:',array('class'=>'titulo'));?></div>
							<div class="linha2" style="margin-bottom:15px;"><?php echo $this->Html->Tag('p',$endereco['ponto_referencia'],array('class'=>'valor'));?>	</div>
						</div>
						
					</div>
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
					echo $this->Form->input('Dadosbancario.nome_banco',array('value'=>h($dadosbancario['nome_banco']),'label' => 'Nome do Banco:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-medio borderZero'));
					echo $this->Form->input('Dadosbancario.numero_agencia',array('value'=>h($dadosbancario['numero_agencia']),'label' => 'Número da Agência:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-medio agencia borderZero'));
					echo $this->Form->input('Dadosbancario.gerente',array('value'=>h($dadosbancario['gerente']),'label' => 'Gerente:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-medio borderZero'));
				?>

			</section>

			<section class="coluna-central" >

				<?php
					echo $this->Form->input('Dadosbancario.numero_banco',array('value'=>h($dadosbancario['numero_banco']),'label' => 'Número do Banco:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-medio borderZero'));
					echo $this->Form->input('Dadosbancario.conta',array('value'=>h($dadosbancario['conta']),'label' => 'Conta:','type'=>'text','readonly'=>'readonly','onFocus'=>'this.blur();','id' => 'DadosbancarioConta0','class'=>'borderZero tamanho-medio'));
				?>

			</section>

			<section class="coluna-direita" >

				<?php
					echo $this->Form->input('Dadosbancario.nome_agencia',array('value'=>h($dadosbancario['nome_agencia']),'label' => 'Nome da Agência:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-medio borderZero'));
					echo $this->Form->input('Dadosbancario.telefone_banco',array('value'=>h($dadosbancario['telefone_banco']),'label' => 'Telefone:','readonly'=>'readonly','onFocus'=>'this.blur();','class' => 'tamanho-medio borderZero'));
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


	}else{ //PARCEIRO DE NEGOCIOS COMPRAS
		echo '<h1 class="menuOption'.$telaAbas.'">Visualizar Fornecedor</h1>';
		
	?>
	
</header>

<section> <!---section superior--->	
	<?php if(!isset($telaAbas)){ ?>
		<header>Dados Gerais do Parceiro</header>
	<?php }else{ ?>
		<header>Dados Gerais do Fornecedor</header>
	<?php } ?>
	
	<section class="coluna-esquerda">

		<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Classificação:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['tipo'],array('class'=>'valor'));?>	</div>
				</div>
		</div>
		<?php
			foreach($parceirodenegocio['Contato'] as $contato){
		?>
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone 1:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone1'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Fax:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['fax'],array('class'=>'valor'));?>	</div>
				</div>
				
			</div>
		<?php
			}			
		?>

	</section>

	<section class="coluna-central" >

		<div class="segmento-esquerdo">				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['nome'],array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome Fantasia:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['nomeFantasia'],array('class'=>'valor'));?>	</div>
				</div>
		</div>
		<?php
			foreach($parceirodenegocio['Contato'] as $contato){
		?>
			<div class="segmento-esquerdo">				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone 2:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone2'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
		<?php				
			}
		?>

	</section>

	<section class="coluna-direita" >
		<div class="segmento-esquerdo">				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','CNPJ:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceirodenegocio['Parceirodenegocio']['cpf_cnpj'],array('class'=>'valor'));?>	</div>
				</div>
		</div>
		<?php
			foreach($parceirodenegocio['Contato'] as $contato){
		?>	
			<div class="segmento-esquerdo">		
			<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Celular:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['telefone3'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Email:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$contato['email'],array('class'=>'valor'));?>	</div>
				</div>
			</div>			
		<?php
			}	
		?>

	</section>
</section><!---Fim section superior--->
	
	<?php if(isset($telaAbas)){ 
		
		$tamanho = count($parceirodenegocio['Responsavel']);	
		if($tamanho > 0){
	?>
	
	<section>
	
		<header> Responsáveis por Setor </header>
	<?php  
		
		$ibloc = 0;
		foreach($parceirodenegocio['Responsavel'] as $responsavel){
		?>

			<section  style="clear: both;">
					<?php  if($ibloc != 0){ echo "<hr />";		}	$ibloc++; ?>
							
					<section class="coluna-esquerda">
						<div class="segmento-esquerdo">								
							<div class="conteudo-linha">
								<div class="linha"><?php echo $this->Html->Tag('p','Setor:',array('class'=>'titulo'));?></div>
								<div class="linha2"><?php echo $this->Html->Tag('p',$responsavel['setor'],array('class'=>'valor'));?>	</div>
							</div>
											
							<div class="conteudo-linha">
								<div class="linha"><?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo'));?></div>
								<div class="linha2"><?php echo $this->Html->Tag('p',$responsavel['telefone1'],array('class'=>'valor'));?>	</div>
							</div>							
						</div>					
					
					</section>
								
					<section class="coluna-central">
						<div class="segmento-esquerdo">								
							<div class="conteudo-linha">
								<div class="linha"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo'));?></div>
								<div class="linha2"><?php echo $this->Html->Tag('p',$responsavel['nome'],array('class'=>'valor'));?></div>
							</div>
													
							<div class="conteudo-linha">
								<div class="linha"><?php echo $this->Html->Tag('p','Celular:',array('class'=>'titulo'));?></div>
								<div class="linha2"><?php echo $this->Html->Tag('p',$responsavel['telefone2'],array('class'=>'valor'));?>	</div>
							</div>							
						</div>					
					</section>
							
					<section class="coluna-direita">
						<div class="segmento-esquerdo">								
							<div class="conteudo-linha">
								<div class="linha"><?php echo $this->Html->Tag('p','E-mail:',array('class'=>'titulo'));?></div>
								<div class="linha2"><?php echo $this->Html->Tag('p',$responsavel['email'],array('class'=>'valor'));?>	</div>
							</div>					
						</div>					
					</section>
					
			</section>
	<?php  }  ?>		
	</section>	
	<?php } } ?>		


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
				?>				
					<div class="segmento-esquerdo">		
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Tipo:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['tipo'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Número:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['numero'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['bairro'],array('class'=>'valor'));?>	</div>
						</div>
						
					</div>

			</section>
		
			<section class="coluna-central" >
				<div class="segmento-esquerdo">		
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['cep'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['uf'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['complemento'],array('class'=>'valor'));?>	</div>
						</div>
						
					</div>
			</section>

			<section class="coluna-direita" >
					<div class="segmento-esquerdo">		
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['logradouro'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?></div>
							<div class="linha2"><?php echo $this->Html->Tag('p',$endereco['cidade'],array('class'=>'valor'));?>	</div>
						</div>
						
						<div class="conteudo-linha">
							<div class="linha"><?php echo $this->Html->Tag('p','Ponto de Referência:',array('class'=>'titulo'));?></div>
							<div class="linha2" style="margin-bottom:15px;"><?php echo $this->Html->Tag('p',$endereco['ponto_referencia'],array('class'=>'valor'));?>	</div>
						</div>
						
					</div>
			</section>

			</fieldset>
		</div>	
	</div>
		<?php $z++;} ?>
</section><!--fim Meio-->
	
	
	<?php 	
		echo $this->element('dados_comoperacao');
		}
	?>
<footer>
    <?php
		if(isset($telaLayout) && isset($telaAbas)){
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$parceirodenegocio['Parceirodenegocio']['id'],'layout' => $telaLayout,'abas' => '41')));
		}else{
			echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit',$parceirodenegocio['Parceirodenegocio']['id'])));
		}
													 
    ?>
</footer>


