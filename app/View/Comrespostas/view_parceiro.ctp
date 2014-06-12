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
	echo "<span class='success-flash'>COTAÇÃO RESPONDIDA!</span>";
?>

<header>
	<?php echo $this->Html->image('emitir-title.png', array('id' => 'consultar-titulo', 'alt' => 'Responder Cotação', 'title' => 'Responder Cotação')); ?>
	<h1 >Resposta de Cotação</h1>
</header>

<section>
	
	<header>Informações do Fornecedor</header>
	
	<section class="coluna-esquerda">
		<?php
			
			echo $this->Form->input('status',array('type'=>'hidden','value'=>'RESPONDIDO'));
		
			echo $this->Form->input('Vazio.nome',array('label'=>'Nome do Fornecedor:','type'=>'text','value'=>$comresposta['Parceirodenegocio']['nome'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			
			echo $this->Form->input('Vazio.tel1',array('label'=>'Telefone 1:','type'=>'text','value'=>$parceiroResposta['Contato'][0]['telefone1'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Endereço:','type'=>'text','value'=>$parceiroResposta['Endereco'][0]['tipo'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Número:','type'=>'text','value'=>$parceiroResposta['Endereco'][0]['numero'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Bairro:','type'=>'text','value'=>$parceiroResposta['Endereco'][0]['bairro'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>
	</section>
	
	<section class="coluna-central">
		<?php
			echo $this->Form->input('Vazio.cpf_cnpj',array('label'=>'CPF/CNPJ:','type'=>'text','value'=>$comresposta['Parceirodenegocio']['cpf_cnpj'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.tel1',array('label'=>'Telefone 2:','type'=>'text','value'=>$parceiroResposta['Contato'][0]['telefone2'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'CEP:','type'=>'text','value'=>$parceiroResposta['Endereco'][0]['cep'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Cidade:','type'=>'text','value'=>$parceiroResposta['Endereco'][0]['cidade'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'UF:','type'=>'text','value'=>$parceiroResposta['Endereco'][0]['uf'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>
	</section>
	
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Vazio.email',array('label'=>'E-mail:','type'=>'text','value'=>$parceiroResposta['Contato'][0]['email'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.cel1',array('label'=>'Celular:','type'=>'text','value'=>$parceiroResposta['Contato'][0]['telefone3'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Logradouro:','type'=>'text','value'=>$parceiroResposta['Endereco'][0]['logradouro'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>
	</section>
	
	<header>Informações da Operação</header>
	<section class="coluna-esquerda">
		<?php
			formatDateToView($comresposta['Comoperacao']['data_inici']);
			echo $this->Form->input('Vazio.operacao',array('label'=>'Data Inicial:','type'=>'text','value'=>$comresposta['Comoperacao']['data_inici'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			//echo $this->Form->input('Vazio.user',array('label'=>'Enviado por:','type'=>'text','value'=>$comresposta['User']['username'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>		
	<section class="coluna-central">
		<?php
			formatDateToView($comresposta['Comoperacao']['data_fim']);
			echo $this->Form->input('Vazio.operacao',array('label'=>'Data Final:','type'=>'text','value'=>$comresposta['Comoperacao']['data_fim'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Vazio.operacao',array('label'=>'Forma de Pagamento:','type'=>'text','value'=>$comresposta['Comoperacao']['forma_pagamento'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>
	
	<header>Dados da Resposta</header>
	<section class="coluna-esquerda">
		<?php
			formatDateToView($comresposta['Comresposta']['data_resposta']);
			echo $this->Form->input('Vazio.data_resposta',array('label'=>'Data da Respota','type'=>'text','value'=>$comresposta['Comresposta']['data_resposta'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.obs',array('label'=>'Observação:','type'=>'textarea','value'=>$comresposta['Comresposta']['obs'], 'class'=>'tamanho-medio borderZero','disabled'=>'disabled','maxlength'=>'140','style'=>'height:50px;'));
		?>	
	</section>		
	<section class="coluna-central">
		<?php
			echo $this->Form->input('Vazio.prazo_entrega',array('label'=>'Prazo para Entrega:','type'=>'text','value'=>$comresposta['Comresposta']['prazo_entrega'], 'class'=>'tamanho-pequeno borderZero','disabled'=>'disabled'));			
			echo $this->Form->input('Vazio.forma_pagamento',array('type'=>'text','label'=>'Forma de Pagamento:','value'=>$comresposta['Comresposta']['forma_pagamento'],'class'=>'tamanho-pequeno borderZero','disabled' => 'disabled'));
			
		?>	
	</section>
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Vazio.valor',array('label'=>'Valor:','type'=>'text','value'=>converterMoeda($comresposta['Comresposta']['valor']),'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));	
			echo $this->Form->input('Vazio.obs_pagamento',array('label'=>'Info. do Pagamento:','type'=>'textarea','value'=>$comresposta['Comresposta']['obs_pagamento'], 'class'=>'tamanho-medio borderZero','disabled' => 'disabled','maxlength'=>'140','style'=>'height:50px;'));
		?>	
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
					
					echo "<td class='labelTd whiteSpace'><span title='".$itens['obs']."'>";
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

</footer>


