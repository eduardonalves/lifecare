<?php
	echo $this->Html->css('rh.css');
	echo $this->Html->css('saidas_view.css');
	echo $this->Html->css('table.css');
	echo $this->Html->css('PrintArea.css');
	echo $this->Html->script('jquery.PrintArea.js');
	//echo $this->Html->script('funcoes_entrada.js');

function convertMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}

	function converteData(&$dataVer){
		$auxData = explode('-', $dataVer);
		$dataVer = $auxData[2].'/'.$auxData[1].'/'.$auxData[0];
		return $dataVer;
	}
	
	function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}
		return $data;
	}
?>


<header>
	<h1 class="menuOption61"></h1>
</header>

<!-- ######### DADOS DO EMITENTE ######### -->
<section>
		
	<header>Emitente</header>

	<section class="coluna-esquerda">

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Razão:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['razao'],array('class'=>'valor'));?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','CRT:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['crt'],array('class'=>'valor'));?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['uf'],array('class'=>'valor'));?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['bairro'],array('class'=>'valor'));?>	
			</div>
		</div>

	</section>

	<section class="coluna-central">
		
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Nome Fant.:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['nome_fantasia'],array('class'=>'valor'));?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Inscri. Estadual:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['ie'],array('class'=>'valor'));?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php echo $this->Html->Tag('p',$emitente['Empresa']['cep'],array('class'=>'valor'));?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','nº / Comple.:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					if($emitente['Empresa']['numero'] != '' && $emitente['Empresa']['complemento'] != ''){
						$nComplemento = $emitente['Empresa']['numero'] . ', ' . $emitente['Empresa']['complemento'];
					}else{
						if($emitente['Empresa']['numero'] == ''){
							$nComplemento = $emitente['Empresa']['complemento'];
						}else if($emitente['Empresa']['complemento'] == ''){
							$nComplemento = $emitente['Empresa']['numero'];
						}
					}
					echo $this->Html->Tag('p', $nComplemento ,array('class'=>'valor'));
				 ?>	
			</div>
		</div>
	</section>

	<section class="coluna-direita">
		
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','CNPJ:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Empresa']['cnpj'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>	

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cod. Municipio:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Cmunfg']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>		


		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Empresa']['cidade'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Endereço:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $emitente['Empresa']['endereco'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

	</section>

</section>

	
	<!-- ##### DADOS DO DESTINATÁRIO ##### -->
	
<section>
		<header>Dados do Destinatário</header>

		<section class="coluna-esquerda">
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Destinatário:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['nome'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Nome Fantasia:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['nomeFantasia'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['cpf_cnpj'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Ins. Estadual:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $saida['Parceirodenegocio']['ie'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliContato['Contato']['telefone1'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>
		</section>

		<section class="coluna-central">

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','E-mail:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliContato['Contato']['email'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['logradouro'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Número:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['numero'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Complemento:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['complemento'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['bairro'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			
		</section>

		<section class="coluna-direita">
				
			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['cep'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['uf'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

			<div class="conteudo-linha" style="clear:both;">
				<div class="linha1">
					<?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
				</div>
				<div class="linha2">
					<?php 
						echo $this->Html->Tag('p', $cliEndereco['Endereco']['cidade'],array('class'=>'valor'));
					 ?>	
				</div>
			</div>

		</section>
</section>


<!-- ######### DADOS DA NOTA ######### -->
<section>	

	<header>Dados da Nota</header>

	<section class="coluna-esquerda">
		
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cód. UF:',array('class'=>'titulo','title'=>'Código UF'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Cuf']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cód. Nota:',array('class'=>'titulo','title'=>'Código da Nota.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Saida']['codnota'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Nat. Operação:',array('class'=>'titulo','title'=>'Descrição da Natureza da 
Operação.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Natop']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Forma de Pgto.:',array('class'=>'titulo','title'=>'Indicador da forma de 
pagamento.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Indpag']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>


		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Mod. Doc. Fiscal:',array('class'=>'titulo','title'=>'Código do Modelo do Documento 
Fiscal.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', '55',array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Serie:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Serie']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Mod. Frete:',array('class'=>'titulo','title'=>'Modalidade do Frete'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Saida']['modfrete'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		
		
	</section>

	<section class="coluna-central">

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Info. Adicional:',array('class'=>'titulo','title'=>'Modalidade do Frete'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Saida']['infoadic'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Nº Nota:',array('class'=>'titulo','title'=>'Número da Nota.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Saida']['numero_nota'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Data:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', formatDateToView($saida['Saida']['data']),array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Tipo NF-e:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Tpnf']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Data Saída:',array('class'=>'titulo'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', formatDateToView($saida['Saida']['data_saida']),array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		
		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cód. Muni. FG:',array('class'=>'titulo','title'=>'Código do Município de 
Ocorrência do Fato Gerador.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Cmunfg']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','T. Imp. DANFE:',array('class'=>'titulo','title'=>'Tipo Impressão da DANFE.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Tpimp']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

	</section>

	<section class="coluna-direita">
		
			<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','T. Emi. NF-e:',array('class'=>'titulo','title'=>'Tipo de Emissão da NF-e'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Saida']['tpemis'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Díg. Verificador:',array('class'=>'titulo','title'=>'Dígito Verificador da Chave de 
Acesso da NF-e'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Saida']['cdv'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>


		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Id. do Ambiente:',array('class'=>'titulo','title'=>'Identificação do Ambiente.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Tpamb']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Fin. Emi. NF-e:',array('class'=>'titulo','title'=>'Finalidade de emissão da NF
-e'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Finnfe']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Proc. Emi. da NF-e:',array('class'=>'titulo','title'=>'Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Procemi']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Ver. Proc. Emi. da NF-e:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Verproc']['descricao'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

	</section>
</section>

<section style="clear:both;">

	<a href="add-dadosNota" class="bt-showmodal" style="float:right;margin-top:15px;">
		<?php echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar')); ?>
	</a>

</section>

<section>
	<header>Dados da Transpotadora</header>

	<section class="coluna-esquerda">
		
		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transportadore']['nome'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>


		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','CNPJ:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transportadore']['cnpj'],array('class'=>'valor'));
				 ?>
			</div>
		</div>

	</section>
	<section class="coluna-central">

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','IE:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transportadore']['ie'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>


		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Endereço:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transportadore']['endereco'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>
	</section>

	<section class="coluna-direita">
		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transportadore']['cidade'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>	

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo','title'=>'Versão do Processo de Emissão da NF-e.'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transportadore']['uf'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>	
	</section>

</section>

<section style="clear:both;">

	<a href="add-transportadora" class="bt-showmodal" style="float:right;margin-top:15px;">
		<?php echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar')); ?>
	</a>

</section>

<section>
	<header>Informações de Tranporte</header>

	<section class="coluna-esquerda">
		
		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Qtd. Volume:',array('class'=>'titulo','title'=>'Quantidade de volumes transportados'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transp']['qvol'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>	

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Peso Líquido:',array('class'=>'titulo','title'=>'Peso Líquido'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transp']['pesol'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

	</section>
	

	<section class="coluna-central">
		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Peso Bruto:',array('class'=>'titulo','title'=>'Peso Líquido'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transp']['pesob'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Espécie:',array('class'=>'titulo','title'=>'Espécie dos volumes transportados'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transp']['esp'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>
	</section>

	<section class="coluna-direita">
		
		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Numeração Volumes:',array('class'=>'titulo','title'=>'Numeração dos volumes transportados'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transp']['nVol'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

		<div class="conteudo-linha" style="clear:both;">
			<div class="linha1">
				<?php echo $this->Html->Tag('p','Lacres:',array('class'=>'titulo','title'=>'Lacres'));?>
			</div>
			<div class="linha2">
				<?php 
					echo $this->Html->Tag('p', $saida['Transp']['lacres'],array('class'=>'valor'));
				 ?>	
			</div>
		</div>

	</section>
</section>

<section style="clear:both;">

	<a href="add-itensTransporte" class="bt-showmodal" style="float:right;margin-top:15px;">
		<?php echo $this->Html->image('botao-adicionar2.png',array('id'=>'quick-salvar')); ?>
	</a>

</section>


<!-- PRODUTOS DA NOTA -->
<section>
	<header>Itens da Nota</header>

	<table id="tabela-principal" cellpadding="0" cellspacing="0">

				<?php
					if($saida['Saida']['forma_de_entrada']==0){
				?>

					<tr>

						<th><?php echo ('Cod.'); ?></th>
						<th><?php echo ('Nome'); ?></th>
						<th><?php echo ('Und.'); ?></th>
						<th><?php echo ('Descrição'); ?></th>
						<th><?php echo ('Qtd.'); ?></th>
						<th class="valor"><?php echo ('V. Unit.'); ?></th>
						<th class="valor"><?php echo ('V. Total'); ?></th>
						<th class="imposto valor"><?php echo ('CFOP'); ?></th>
						<th class="imposto valor"><?php echo ('ICMS'); ?></th>
						<th class="imposto valor"><?php echo ('IPI'); ?></th>
						<th><?php echo ('Lote'); ?></th>

					</tr>

				<?php
					}else{
				?>

					<th><?php echo ('Cod.'); ?></th>
					<th><?php echo ('Nome'); ?></th>
					<th><?php echo ('Und.'); ?></th>
					<th><?php echo ('Descrição'); ?></th>
					<th><?php echo ('Qtd'); ?></th>
					<th class="valor"><?php echo ('V. Unit.'); ?></th>
					<th class="valor"><?php echo ('V. Total'); ?></th>
					<th><?php echo ('Lote'); ?></th>
				<?php 
					}
				?>

				<?php
					if($saida['Saida']['forma_de_entrada']==0){

						foreach($itens as $prodIten){

							$prodIten['Produtoiten']['valor_total']=convertMoeda($prodIten['Produtoiten']['valor_total']);
							$prodIten['Produtoiten']['valor_unitario']=convertMoeda($prodIten['Produtoiten']['valor_unitario']);
							$prodIten['Produto']['percentual_icms']=convertMoeda($prodIten['Produto']['percentual_icms']);
							$prodIten['Produto']['percentual_ipi']=convertMoeda($prodIten['Produto']['percentual_ipi']);

							echo '<tr class="valbtconfimar">';
							echo "<td>".$prodIten['Produto']['id']."</td>";
							echo "<td>".$prodIten['Produto']['nome']."</td>";
							echo "<td>".$prodIten['Produto']['unidade']."</td>";
							echo "<td>".$prodIten['Produto']['descricao']."</td>";
							echo "<td>".$prodIten['Produtoiten']['qtde']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_unitario']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_total']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['cfop']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['percentual_icms']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['percentual_ipi']."</td>";

							echo "<td>";
							foreach($loteitens as $loteiten){

									if( $loteiten['Loteiten']['produtoiten_id'] ==  $prodIten['Produtoiten']['id']){
										$loteiten['Lote']['data_validade'] = converteData($loteiten['Lote']['data_validade']);
										echo "N Lote: ".$loteiten['Lote']['numero_lote'].", Qtde: ".$loteiten['Loteiten']['qtde'].", Val: ".$loteiten['Lote']['data_validade']."<br />";
									}
							}
							echo "</td>";
							echo '</tr>';



						}

					}else{
						foreach($itens as $prodIten){

							$prodIten['Produtoiten']['valor_total']= convertMoeda($prodIten['Produtoiten']['valor_total']);
							$prodIten['Produtoiten']['valor_unitario']= convertMoeda($prodIten['Produtoiten']['valor_unitario']);

							echo '<tr class="valbtconfimar">';
							echo "<td>".$prodIten['Produto']['id']."</td>";
							echo "<td>".$prodIten['Produto']['nome']."</td>";
							echo "<td>".$prodIten['Produto']['unidade']."</td>";
							echo "<td>".$prodIten['Produto']['descricao']."</td>";
							echo "<td>".$prodIten['Produtoiten']['qtde']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_unitario']."</td>";
							echo "<td class='valor'>".$prodIten['Produtoiten']['valor_total']."</td>";
							echo "<td>";
							$j=0;
							foreach($loteitens as $loteiten){
									if($loteiten['Loteiten']['produtoiten_id'] ==  $prodIten['Produtoiten']['id']){

										$loteiten['Lote']['data_validade'] = converteData($loteiten['Lote']['data_validade']);
										echo "N Lote: ".$loteiten['Lote']['numero_lote'].", Qtde: ".$loteiten['Loteiten']['qtde'].", Val: ".$loteiten['Lote']['data_validade']."<br />";
									}
							}
							echo "</td>";
							echo '</tr>';

						}
					}
				?>
			</table>	

</section>

<!-- MODAL DADOS DA NOTA FISCAL -->

	<div class="modal fade" id="myModal_add-dadosNota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<?php
				echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
			?>
			<header id="cabecalho">
				<?php 
					echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
				?>
				<h1> Preencher Dados da Nota </h1>
			</header>
			
		</div>
	</div>


<!-- MODAL DADOS DA TRANSPORTADORA -->

	<div class="modal fade" id="myModal_add-transportadora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<?php
				echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
			?>
			<header id="cabecalho">
				<?php 
					echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
				?>
				<h1> Preencher Dados da Transportadora </h1>
			</header>
			
		</div>
	</div>	


<!-- MODAL DADOS DO TRANSPORTE -->

	<div class="modal fade" id="myModal_add-itensTransporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<?php
				echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;float:right')); 
			?>
			<header id="cabecalho">
				<?php 
					echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
				?>
				<h1> Preencher Itens do Transporte </h1>
			</header>
			
		</div>
	</div>	