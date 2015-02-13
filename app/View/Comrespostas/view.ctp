<?php
	$this->start('css');
		echo $this->Html->css('resposta');
	    echo $this->Html->css('table');
	$this->end();

	$this->start('script');
	    echo $this->Html->script('resposta.js');
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
	
	function converterMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
	echo "<span class='success-flash'>SITUAÇÃO: ". $comresposta['Comresposta']['status'] ."</span>";
?>

<header>
	<?php echo $this->Html->image('emitir-title.png', array('id' => 'consultar-titulo', 'alt' => 'Responder Cotação', 'title' => 'Responder Cotação')); ?>
	<h1 class="menuOption41">Resposta de Cotação</h1>
</header>

<section>
	
	<header>Informações do Fornecedor</header>
	
	<section class="coluna-esquerda">
		<?php
			
			echo $this->Form->input('status',array('type'=>'hidden','value'=>'RESPONDIDO'));
		
		?>
		
		<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Nome do Fornecedor:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Parceirodenegocio']['nome'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone 1:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['telefone1'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Endereço:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['tipo'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Número:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['numero'],array('class'=>'valor'));?>	</div>
				</div>
				
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['bairro'],array('class'=>'valor'));?>	</div>
				</div>
		</div>
	</section>
	
	<section class="coluna-central">
			
		<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','CPF/CNPJ:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Parceirodenegocio']['cpf_cnpj'],array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Telefone 2:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['telefone2'],array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['cep'],array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['cidade'],array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['uf'],array('class'=>'valor'));?>	</div>
				</div>
		</div>

	</section>
	
	<section class="coluna-direita">
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','E-mail:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['email'],array('class'=>'valor', 'style'=>'display: none;'));?>
					<?php
					echo "
					<div class='whiteSpace' style='min-width: 185px !important; font-size: 13px; margin: 12px 0px 0px 0px;'>
						<span title='".$parceiroResposta['Contato'][0]['email']."'>".$parceiroResposta['Contato'][0]['email']."</span>
					</div>";
					?>
					</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Celular:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Contato'][0]['telefone3'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Logradouro:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$parceiroResposta['Endereco'][0]['logradouro'],array('class'=>'valor'));?>	</div>
				</div>
				
	
			</div>

	</section>
	
	<header>Informações da Operação</header>
	<section class="coluna-esquerda">
		
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Data Inicial:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',formatDateToView($comresposta['Comoperacao']['data_inici']),array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Código:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Comoperacao']['id'],array('class'=>'valor'));?>	</div>
				</div>
			
			</div>
	</section>		
	<section class="coluna-central">
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Data Final:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',formatDateToView($comresposta['Comoperacao']['data_fim']),array('class'=>'valor'));?>	</div>
				</div>
			
			</div>
	</section>
	<section class="coluna-direita">
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Forma de Pagamento:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Comoperacao']['forma_pagamento'],array('class'=>'valor'));?>	</div>
				</div>
			
			</div>
	</section>
	
	<header>Dados da Resposta</header>
	<section class="coluna-esquerda">
		<?php
			formatDateToView($comresposta['Comresposta']['data_resposta']);
		?>	
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Data da Respota:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Comresposta']['data_resposta'],array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Observação:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Comresposta']['obs'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
	</section>		
	<section class="coluna-central">
		<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Prazo para Entrega:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Comresposta']['prazo_entrega'],array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Forma de Pagamento:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Comresposta']['forma_pagamento'],array('class'=>'valor'));?>	</div>
				</div>
			</div>

	</section>
	<section class="coluna-direita">
			<div class="segmento-esquerdo">
				
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Valor:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',converterMoeda($comresposta['Comresposta']['valor']),array('class'=>'valor'));?>	</div>
				</div>
				<div class="conteudo-linha">
					<div class="linha"><?php echo $this->Html->Tag('p','Info. do Pagamento:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$comresposta['Comresposta']['obs_pagamento'],array('class'=>'valor-descricao'));?>	</div>
				</div>
			</div>

	</section>
	
	<header>Produtos da Cotação</header>
	
	<span id="validaValor" class="msg erroTop" style="display:none">Preencha o valor unitário</span>
	<span id="validaConfirm" class="msg erroTop" style="display:none">Confirme todos os produtos</span>

	<table>
		<thead>
			<td>Nome do Produto</td>
			<td>Obs. Pedido</td>
			<td>Obs. Item</td>
			<td>Fabricante</td>
			<td>Quantidade</td>
			<td>Unidade</td>
			<td>Valor Unitário</td>
			<td>Total Produto</td>
		</thead>
		
		<?php
			$i = 1;
			foreach($comresposta['Comitensresposta'] as $itens){
				echo "<tr>";
					echo "<td class='whiteSpace'><span title=''>";
						echo $itens['produto_nome'];
					echo "</span></td>";
					
					echo "<td class='labelTd whiteSpace'><span title='".$itens['obs_operacao']."'>";
						echo $itens['obs_operacao'];
					echo "</span></td>";
					
					echo "<td class='labelTd'>";
						echo $itens['obs'];
					echo "</span></td>";
					
					echo "<td class='labelTd'>";
						echo $itens['fabricante'];
					echo "</td>";
					
					echo "<td class='itenQtd".$i."' >";
						echo $itens['qtde'];
					echo "</td>";
					
					echo "<td>";
						echo $itens['produto_unidade'];
					echo "</td>";
					
					echo "<td class='labelTd itenUnit'>";
						echo converterMoeda($itens['valor_unit']);
					echo "</td>";
					
					echo "<td class='labelTd'>";
						echo converterMoeda($itens['valor_total']);
					echo "</td>";
										
				echo "</tr>";
				$i++;
			}
		?>
	</table>
</section>

<footer>
	<?php
		echo $this->Form->postLink($this->Html->image('fazer-pedido.png',array('style'=>'float:right','alt' =>__('Fazer Pedido'),'title' => __('Fazer Pedido'))), array('controller' => 'Pedidos','action' => 'addResposta',$comresposta['Comresposta']['id']	),array('escape' => false, 'confirm' => __('Tem certeza que deseja fazer pedido dessa resposta?', $comresposta['Comresposta']['id'])));	
	?>	
</footer>


