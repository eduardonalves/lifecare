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

	if($token['Comtokencotacao']['respondido'] != 1){
?>

<header>
	<?php echo $this->Html->image('emitir-title.png', array('id' => 'cadastrar-titulo', 'alt' => 'Responder Cotação', 'title' => 'Responder Cotação')); ?>
	<h1 class="menuOption23">Resposta de Cotação</h1>
</header>

<section>
	
	<header>Informações do Fornecedor</header>
	
	<section class="coluna-esquerda">
		<?php
			echo $this->Form->create('Comresposta');
			echo $this->Form->input('parceirodenegocio_id',array('type'=>'hidden','value'=>$parceirodenegocios['Parceirodenegocio']['id']));
			echo $this->Form->input('comoperacao_id',array('type'=>'hidden','value'=>$comoperacao['Comoperacao']['id']));
			echo $this->Form->input('status',array('type'=>'hidden','value'=>'RESPONDIDO'));
		
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
			echo $this->Form->input('Vazio.email',array('label'=>'E-mail:','type'=>'text','value'=>$parceirodenegocios['Contato'][0]['email'], 'class'=>'tamanho-medio', 'disabled','style'=>'display: none;'));
			echo "
			<div class='whiteSpace' style='min-width: 185px !important; font-size: 13px; margin: 2px 0px 0px 0px;'>
				<span title='".$parceirodenegocios['Contato'][0]['email']."'>".$parceirodenegocios['Contato'][0]['email']."</span>
			</div>";
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
			echo $this->Form->input('obs',array('label'=>'Observação:','type'=>'textarea', 'class'=>'confirmaInput tamanho-medio','maxlength'=>'140','style'=>'height:50px;'));
		?>	
	</section>		
	<section class="coluna-central">
		<?php
			echo $this->Form->input('prazo_entrega',array('label'=>'Prazo para Entrega<span class="campo-obrigatorio">*</span>:','type'=>'text', 'class'=>'Nao-Letras confirmaInput tamanho-pequeno'));			
			echo '<span id="validaPrazo" class="msg erroRight" style="display:none">Preencha o prazo para entrega</span>';
			
			echo "<div id='normalInput'>";
				echo $this->Form->input('forma_pagamento',array('id'=>'normalfrmPgto','type'=>'select','label'=>'Forma de Pagamento:','class'=>'confirmaInput tamanho-pequeno desabilita','options' => array(''=>'','BOLETO' => 'Boleto','CHEQUE' => 'Cheque', 'CREDITO' => 'Crédito', 'DEPOSITO' => 'Depósito', 'DINHEIRO' => 'Dinheiro', 'VALE' => 'Vale' )));
				echo '<span id="validaForma" class="msg erroRight" style="display:none">Preencha o forma de pagamento</span>';
			echo "</div>";
			
			echo "<div id='confirmInput' style='display:none;'>";
				echo $this->Form->input('Vazio.frmPgto',array('id'=>'frmPgto','type'=>'text','label'=>'Forma de Pagamento:','class'=>'tamanho-pequeno borderZero','disabled' => 'disabled'));
			echo "</div>";
		?>	
	</section>
	<section class="coluna-direita">
		<?php
			echo $this->Form->input('valor',array('label'=>'Valor:','type'=>'text','class'=>'confirmaInput tamanho-medio borderZero','onFocus'=>'this.blur();','readonly'=>'readonly'));	
			echo $this->Form->input('obs_pagamento',array('label'=>'Info. do Pagamento:','type'=>'textarea', 'class'=>'confirmaInput tamanho-medio','maxlength'=>'140','style'=>'height:50px;'));
		?>	
	</section>
	
	<header>Produtos da Cotação</header>
	
	<span id="validaValor" class="msg erroTop" style="display:none">Preencha o valor unitário</span>
	

	<table>
		<thead>
			<td>Nome do Produto</td>
			<td>Obs. Pedido</td>
			<td style="width:152px;">Obs. Item</td>
			<td style="width:152px;">Fabricante</td>
			<td>Quantidade</td>
			<td>Unidade</td>
			<td style="width:85px;">Valor Unitário<span class="campo-obrigatorio">*</span></td>
			<td style="width:80px;">Total Produto</td>
			<span id="validaConfirm" class="msg erroTop" style="display:none">Confirme todos os produtos</span>
			<td class="confirma">Ações</td>
		</thead>
		
		<?php
			$i = 1;
			foreach($itensDaOperacao as $itens){
				echo "<tr>";
					echo "<td class='whiteSpace'><span title='".$itens['Produto']['nome']."'>";
						echo $itens['Produto']['nome'];
						echo $this->Form->input('Comitensresposta.'.$i.'.produto_id',array('value'=>$itens['Produto']['id'],'type'=>'hidden'));  
					echo "</span></td>";
					
					echo "<td class='labelTd whiteSpace'><span title='".$itens['Comitensdaoperacao']['obs']."'>";
						echo $itens['Comitensdaoperacao']['obs'];
					echo "</span></td>";
					
					echo "<td class='labelTd'>";
						echo $this->Form->input('Comitensresposta.'.$i.'.obs',array('label'=>'','type'=>'text','class'=>'tamanho-medio','style'=>'text-align:center;'));
					echo "</span></td>";
					
					echo "<td class='labelTd'>";
						echo $this->Form->input('Comitensresposta.'.$i.'.fabricante',array('label'=>'','type'=>'text','class'=>'tamanho-medio','style'=>'text-align:center;')); 
					echo "</td>";
					
					echo "<td class='itenQtd".$i."' >";
						echo $itens['Comitensdaoperacao']['qtde'];
						echo $this->Form->input('Comitensresposta.'.$i.'.qtde',array('value'=>$itens['Comitensdaoperacao']['qtde'],'type'=>'hidden'));
					echo "</td>";
					
					echo "<td>";
						echo $itens['Produto']['unidade'];
					echo "</td>";
					
					echo "<td class='labelTd itenUnit'>";
						echo $this->Form->input('Comitensresposta.'.$i.'.valor_unit',array('id'=>'valorUnit'.$i,'label'=>'','type'=>'text','class'=>'valorUnit tamanho-pequeno dinheiro_duasCasas','style'=>'text-align:center;')); 
					echo "</td>";
					
					echo "<td class='labelTd'>";
						echo $this->Form->input('Comitensresposta.'.$i.'.valor_total',array('id'=>'valorTotal'.$i,'label'=>'','type'=>'text','class'=>'tamanho-pequeno borderZero valorTotal','onFocus'=>'this.blur();','readonly'=>'readonly','style'=>'text-align:center;'));
					echo "</td>";
					
					echo "<td class='confirma'>"; 
						echo $this->Html->image('botao-tabela-editar',array('id'=>'botaoEdit'.$i,'style'=>'display:none;')); 
						echo $this->Html->image('bt-confirm.png',array('id'=>'botaoConfirm'.$i));
						//echo $this->Html->image('cancelar.png',array('id'=>'botaoRemover'.$i));
					echo "</td>";
					
				echo "</tr>";
				$i++;
			}
		?>
	</table>
</section>

<footer>
	<?php
		
		echo $this->html->image('botao-voltar.png',array('id'=>'voltar','style'=>'float:left;cursor:pointer;display:none;'));
		echo $this->html->image('botao-confirmar.png',array('id'=>'confirmaDados','style'=>'float:right;cursor:pointer;'));
		
		 echo $this->form->submit('botao-salvar.png',array(
							    'class'=>'bt-salvar',
							    'alt'=>'Salvar',
							    'title'=>'Salvar',
							    'style' => 'display:none;'
							    
	    ));
	
		echo $this->Form->end();   
	?>	
</footer>

<?php 
	}else{
		echo "<span class='success-flash'>COTAÇÃO JÁ RESPONDIDA!</span>";
?>		

<style>
	.conteudo-principal{
		min-height: 400px;
	}
</style>
<?php
	}
?>


