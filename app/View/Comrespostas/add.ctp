<?php
	$this->start('css');
	    echo $this->Html->css('resposta');
	    echo $this->Html->css('table');
	    echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
		
	$this->start('script');
	    echo $this->Html->script('funcoes_contas_pagar.js');
	    echo $this->Html->script('jquery-ui/jquery.ui.button.js');
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


<header>
	<h1>Resposta de Cotação</h1>
</header>

<section>
	
	<header>Informações do Fornecedor</header>
	
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->create('Resposta');
			echo $this->Form->input('parceirodenegocio_id',array('type'=>'hidden','value'=>$parceirodenegocios['Parceirodenegocio']['id']));
			echo $this->Form->input('comoperacao_id',array('type'=>'hidden','value'=>$comoperacao['Comoperacao']['id']));
			echo $this->Form->input('Vazio.nome',array('label'=>'Nome do Fornecedor:','type'=>'text','value'=>$parceirodenegocios['Parceirodenegocio']['nome'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.tel1',array('label'=>'Telefone 1:','type'=>'text','value'=>$parceirodenegocios['Contato'][0]['telefone1'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Endereço:','type'=>'text','value'=>$parceirodenegocios['Endereco'][0]['tipo'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Número:','type'=>'text','value'=>$parceirodenegocios['Endereco'][0]['numero'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Bairro:','type'=>'text','value'=>$parceirodenegocios['Endereco'][0]['bairro'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));

		?>
	</section>
	
	<section class="coluna-central">
		<?php
			echo $this->Form->input('Vazio.cpf_cnpj',array('label'=>'CPF/CNPJ:','type'=>'text','value'=>$parceirodenegocios['Parceirodenegocio']['cpf_cnpj'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.tel1',array('label'=>'Telefone 2:','type'=>'text','value'=>$parceirodenegocios['Contato'][0]['telefone2'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'CEP:','type'=>'text','value'=>$parceirodenegocios['Endereco'][0]['cep'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Cidade:','type'=>'text','value'=>$parceirodenegocios['Endereco'][0]['cidade'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'UF:','type'=>'text','value'=>$parceirodenegocios['Endereco'][0]['uf'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));

		?>
	</section>
	
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Vazio.email',array('label'=>'E-mail:','type'=>'text','value'=>$parceirodenegocios['Contato'][0]['email'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.cel1',array('label'=>'Celular:','type'=>'text','value'=>$parceirodenegocios['Contato'][0]['telefone3'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.end',array('label'=>'Logradouro:','type'=>'text','value'=>$parceirodenegocios['Endereco'][0]['logradouro'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));

		?>
	</section>
	
	<header>Informações da Operação</header>
	<section class="coluna-esquerda">
		<?php
			formatDateToView($comoperacao['Comoperacao']['data_inici']);
			echo $this->Form->input('Vazio.operacao',array('label'=>'Data Inicial:','type'=>'text','value'=>$comoperacao['Comoperacao']['data_inici'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.user',array('label'=>'Enviado por:','type'=>'text','value'=>$comoperacao['User']['username'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>		
	<section class="coluna-central">
		<?php
			formatDateToView($comoperacao['Comoperacao']['data_fim']);
			echo $this->Form->input('Vazio.operacao',array('label'=>'Data Final:','type'=>'text','value'=>$comoperacao['Comoperacao']['data_fim'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Vazio.operacao',array('label'=>'Forma de Pagamento:','type'=>'text','value'=>$comoperacao['Comoperacao']['forma_pagamento'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>
	
	<header>Dados da Resposta</header>
	<section class="coluna-esquerda">
		<?php
			$dataResposta = date('d/m/o');
			echo $this->Form->input('data_resposta',array('label'=>'Data da Respota','type'=>'text','value'=>$dataResposta, 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
			echo $this->Form->input('Vazio.user',array('label'=>'Enviado por:','type'=>'text','value'=>$comoperacao['User']['username'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>		
	<section class="coluna-central">
		<?php
			formatDateToView($comoperacao['Comoperacao']['data_fim']);
			echo $this->Form->input('Vazio.operacao',array('label'=>'Data Final:','type'=>'text','value'=>$comoperacao['Comoperacao']['data_fim'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('Vazio.operacao',array('label'=>'Forma de Pagamento:','type'=>'text','value'=>$comoperacao['Comoperacao']['forma_pagamento'], 'class'=>'tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));
		?>	
	</section>
	
	<header>Produtos da Cotação</header>
	
	<table>
		<thead>
			<td>Nome do Produto</td>
			<td>Observação</td>
			<td>Quantidade</td>
			<td>Unidade</td>
			<td>Valor Unitário</td>
			<td>Ações</td>
		</thead>
		
		<?php
			$i = 0;
			foreach($itensDaOperacao as $itens){
				echo "<tr>";
					echo "<td>". $itens['Produto']['nome']."</td>";
					echo "<td>". $itens['Comitensdaoperacao']['obs']."</td>";
					echo "<td>". $itens['Comitensdaoperacao']['qtde']."</td>";
					echo "<td>". $itens['Produto']['unidade']."</td>";
					echo "<td class='labelTd'>";
						echo $this->Form->input('Comitensdaoperacao.'.$i.'.valor_unit',array('label'=>'','type'=>'text','class'=>'tamanho-pequeno')); 
					echo "</td>";
					echo "<td></td>";
				echo "</tr>";
				$i++;
			}
		
		?>
		
	</table>
	
	
</section>

<footer>

</footer>
<br>



<pre>
	<h3>Itens</h3>
<?php
	print_r($itensDaOperacao);
?>
</pre>
