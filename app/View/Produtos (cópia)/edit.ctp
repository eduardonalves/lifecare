<?php 
	$this->start('css');
	echo $this->Html->css('ProdutosEdit');
	$this->end();
?>


<header>
	<?php 
		echo $this->Html->image('consultas.png', array('id' => 'consultar', 'alt' => 'Consultar', 'title' => 'Consultar'));
	 ?>
	 <h1>Consultas</h1>
	 
</header>

<section><!--SECTION SUPERIOR--> 
	<header>
		Editar Produto
	</header>
			
		<section class="coluna-esquerda">
			<fieldset class="field-global">
				<div class="descricao">
					<?php

					echo $this->Form->create('Produto');
					
					echo $this->Form->input('Produto.id');
					
					echo $this->Form->input('Produto.codigoEan', array('type'=>'text','label'=>'Código EAN:','value'=>h($produto['Produto']['codigoEan']),'class'=>'tamanho-medio'));
					
					echo $this->Form->input('Produto.nome', array('type'=>'text','value'=>h($produto['Produto']['nome']),'class'=>'input','id'=>''));
					
					echo $this->Form->input('Produto.composicao', array('type'=>'text','value'=>h($produto['Produto']['composicao']),'class'=>'input','id'=>''));
					
					echo $this->Form->input('Produto.dosagem', array('type'=>'text','value'=>h($produto['Produto']['dosagem']),'class'=>'tamanho-pequeno','id'=>''));
					
					//echo $this->Form->input('Unidade:', array('type'=>'text','value'=>h($produto['Produto']['Unidade']),'class'=>'','id'=>''));
					
					//echo $this->Form->input('Produto.Categoria', array('type'=>'text','id'=>'input-pequena','value'=>h($produto['Categoria']),'class'=>'input'));
					//echo $this->Form->input('Produto.descricao', array('type'=>'text','id'=>'input-pequena','value'=>h($produto['Produto']['descricao']),'class'=>'input'));
					
					echo $this->Form->input('Produto.Unidade', array('options'=>array('Adicionar',2,3,4,)));
					
					//array_unshift($categorias, array('add-categoria'=>'Cadastrar'));
					//echo "<pre>". print_r($categorias)."</pre>";
					
					
					echo $this->Form->input('Categoria', array('class'=>'select-multiple'));
													
					echo $this->Form->input('Produto.descricao', array('rows' => '3','cols' => '4', 'value'=>h($produto['Produto']['descricao']) ));
					
					?>
		
				</div>	
			</fieldset>
		</section>
			
		<section class="coluna" >
			
			<fieldset>
		
				<legend>
					Dados do Tributário
				</legend>
				
				<div>
					<?php		
					
						foreach($produto['Tributo'] as $tributo){
							
							echo $this->Form->input('Tributo.id', array('value'=>$tributo['id']));
							
							echo $this->Form->input('Tributo.ncm', array('type'=>'text','label'=>'NCM:','value'=>h($tributo['ncm']),'class'=>'tamanho-pequeno','id'=>''));
								
							echo $this->Form->input('Tributo.cfop', array('type'=>'text','label'=>'CFOP:','value'=>h($tributo['cfop']),'class'=>'tamanho-pequeno','id'=>''));
						
							echo $this->Form->input('Tributo.al_icms', array('type'=>'text','label'=>'ICMS:','value'=>h($tributo['al_icms']),'class'=>'tamanho-pequeno','id'=>''));
						
							echo $this->Form->input('Tributo.codigo_selo_ipi', array('type'=>'text','label'=>'Cód Selo IPI:','value'=>h($tributo['codigo_selo_ipi']),'class'=>'tamanho-medio','id'=>''));
						
							echo $this->Form->input('Tributo.qtde_selo_ipi', array('type'=>'text','label'=>'Qtd Selo IPI:','value'=>h($tributo['qtde_selo_ipi']),'class'=>'tamanho-pequeno','id'=>''));
						
							echo $this->Form->input('Tributo.al_ipi', array('type'=>'text','label'=>'IPI:','value'=>h($tributo['al_ipi']),'class'=>'tamanho-pequeno','id'=>''));
						
							echo $this->Form->input('Tributo.al_cst', array('type'=>'text','label'=>'CST:','value'=>h($tributo['al_cst']),'class'=>'tamanho-pequeno','id'=>''));
							
							echo $this->Form->input('Tributo.al_pis', array('type'=>'text','label'=>'PIS:','value'=>h($tributo['al_pis']),'class'=>'tamanho-pequeno','id'=>''));
						
							echo $this->Form->input('Tributo.al_confins', array('type'=>'text','label'=>'COFINS:','value'=>h($tributo['al_confins']),'class'=>'tamanho-pequeno','id'=>''));
						}
						
					?>
				</div>
			</fieldset>
		</section>
		
		<section class="coluna-direita" >
			<fieldset>
				
				<legend>
					Dados do Estoque
				</legend>
	
				<div class="estoque">
					<?php

					echo $this->Form->input('Produto.estoque_minimo', array('type'=>'text','value'=>h($produto['Produto']['estoque_minimo']),'class'=>'tamanho-pequeno'));
					
					echo $this->Form->input('Produto.estoque_desejado', array('type'=>'text','label'=>'Estoque Ideal:','value'=>h($produto['Produto']['estoque_desejado']),'class'=>'tamanho-pequeno'));
					
					echo $this->Form->input('Produto.bloqueado', array('type'=>'select', 'label'=>'Produto Bloqueado:','value'=>h($produto['Produto']['bloqueado']), 'class'=>'tamanho-medio','options'=>array(array(0=>'NÃO BLOQUEADO', 1=>'BLOQUEADO'))));
					
					echo $this->Form->input('Produto.periodocriticovalidade', array('label'=>'Período Crítico:','class'=>'tamanho-medio', 'value'=>h($produto['Produto']['periodocriticovalidade']) ));
					
					echo $this->Form->input('Produto.ativo', array('type'=>'select','label'=>'Status da Visualização:','value'=>h($produto['Produto']['ativo']),'class'=>'tamanho-pequeno', 'options'=>array(0=>'INATIVO', 1=>'ATIVO')));

					?>
				</div>
		
			</fieldset>
			
		</section>
			
</section><!---Fim section-superior--->
		


		
<footer>
	
	<?php
	
	
	echo $this->html->image('botao-voltar.png',array('alt'=>'Voltar',
												     'title'=>'Voltar',
													 'class'=>'bt-voltar',
													 'url'=>array('action'=>'view',
													 $produto['Produto']['id'])));
													 
	
   echo $this->form->submit( 'botao-salvar.png' ,  array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
	
   echo $this->Form->end();
	?>
	
</footer>

		
<!-- Modal -->
<div class="modal fade" id="myModal_categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-body">
		<?php echo $this->element('categoria_add');?>
	</div>
</div>
<!-- /.modal -->
