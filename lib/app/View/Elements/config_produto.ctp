<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_filtro_produto');
	$this->end();

?>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	<h1>Filtro Produto</h1>
</header>

<section>
	<header>Campos da Tabela</header>

	<section class="coluna-modal">
		<div class="configprodutos form">	
		<?php echo $this->Form->create('Configproduto'); ?>	
		
				<?php
					
					echo $this->Form->input('id',array('value' => $configproduto['Configproduto']['id']));
				?>
				
				<div class='esconder'>	
					<?php echo $this->Form->input('user_id',array('class'=>'esconder','label'=>'')); ?>
				</div>
				
				<?php
					//...................................................................
					if($configproduto['Configproduto']['codigo']==1){
						echo $this->Form->input('codigo', array('value' => 1, 'checked' =>'checked', 'label'=>'Código'));
					} else{
						echo $this->Form->input('codigo', array('label' => 'Código'));
					}
					
					if($configproduto['Configproduto']['dosagem']==1){
						echo $this->Form->input('dosagem', array('value' => 1, 'checked' =>'checked', 'label'=>'Dosagem' ));
					} else{
						echo $this->Form->input('dosagem', array('label' => 'Dosagem'));
					}
					
					if($configproduto['Configproduto']['nivel']==1){
						echo $this->Form->input('nivel', array('value' => 1, 'checked' =>'checked', 'label'=>'Nível'));
					} else{
						echo $this->Form->input('nivel', array('label' => 'Nível'));
					}
					
										
					
				//...................................................................
					
					if($configproduto['Configproduto']['codigoEan']==1){
						echo $this->Form->input('codigoEan', array('value' => 1, 'checked' =>'checked', 'label'=>'Código EAN' ));
					} else{
						echo $this->Form->input('codigoEan', array('label' => 'Código EAN'));
					}		
					
					
					if($configproduto['Configproduto']['fabricante']==1){
						echo $this->Form->input('fabricante', array('value' => 1, 'checked' =>'checked', 'label'=>'Fabricante' ));
					} else{
						echo $this->Form->input('fabricante', array('label' => 'Fabricante'));
					}			
					
					
					if($configproduto['Configproduto']['periodocriticovalidade']==1){
						echo $this->Form->input('periodocriticovalidade', array('value' => 1, 'checked' =>'checked', 'label'=>'Período Crítico' ));
					} else{
						echo $this->Form->input('periodocriticovalidade', array('label' => 'Período Critíco'));
					}
					
					
					
						
				//...................................................................
				
					if($configproduto['Configproduto']['nome']==1){
						echo $this->Form->input('nome', array('value' => 1, 'checked' =>'checked', 'label'=>'Nome' ));
					} else{
						echo $this->Form->input('nome', array('label' => 'Nome'));
					}					
								
					if($configproduto['Configproduto']['unidade']==1){
						echo $this->Form->input('unidade', array('value' => 1, 'checked' =>'checked' , 'label'=>'Unidade' ));
					} else{
						echo $this->Form->input('unidade', array('label' => 'Unidade'));
					}			
					
					
					if($configproduto['Configproduto']['preco_custo']==1){
						echo $this->Form->input('preco_custo', array('value' => 1, 'checked' =>'checked', 'label'=>'Preço Custo' ));
					} else{
						echo $this->Form->input('preco_custo', array('label' => 'Preço Custo'));
					}
					
		
					
				//...................................................................
					
					if($configproduto['Configproduto']['categoria']==1){
						echo $this->Form->input('categoria', array('value' => 1, 'checked' =>'checked', 'label'=>'Categorias', 'type' => 'checkbox' ));
					} else{
						echo $this->Form->input('categoria', array('label' => 'Categorias', 'type' => 'checkbox'));
					}					
					
					if($configproduto['Configproduto']['estoque']==1){
						echo $this->Form->input('estoque', array('value' => 1, 'checked' =>'checked', 'label'=>'Estoque Produto' ));
					} else{
						echo $this->Form->input('estoque', array('label' => 'Estoque Produto'));
					}	
						
					if($configproduto['Configproduto']['preco_venda']==1){
						echo $this->Form->input('preco_venda', array('value' => 1, 'checked' =>'checked', 'label'=>'Preço Venda' ));
					} else{
						echo $this->Form->input('preco_venda', array('label' => 'Preço Venda'));
					}				
								
																							
				//...................................................................
					
					
					if($configproduto['Configproduto']['descricao']==1){
						echo $this->Form->input('descricao', array('value' => 1, 'checked' =>'checked', 'label'=>'Descrição Produto'));
					} else{
						echo $this->Form->input('descricao', array('label' => 'Descrição Produto'));
					}	
					
					
					if($configproduto['Configproduto']['estoque_minimo']==1){
						echo $this->Form->input('estoque_minimo', array('value' => 1, 'checked' =>'checked', 'label'=>'Estoque Mínimo' ));
					} else{
						echo $this->Form->input('estoque_minimo', array('label' => 'Estoque Mínimo'));
					}	
					
					if($configproduto['Configproduto']['ativo']==1){
						echo $this->Form->input('ativo', array('value' => 1, 'checked' =>'checked', 'label'=>'Ativo' ));
					} else{
						echo $this->Form->input('ativo', array('label' => 'Ativo'));
					}
					
										
					
					
					if($configproduto['Configproduto']['composicao']==1){
						echo $this->Form->input('composicao', array('value' => 1, 'checked' =>'checked', 'label'=>'Composição' ));
					} else{
						echo $this->Form->input('composicao', array('label' => 'Composição'));
					}
					
					if($configproduto['Configproduto']['estoque_desejado']==1){
						echo $this->Form->input('estoque_desejado', array('value' => 1, 'checked' =>'checked', 'label'=>'Estoque Ideal' ));
					} else{
						echo $this->Form->input('estoque_desejado', array('label' => 'Estoque Ideal'));
					}
					
					if($configproduto['Configproduto']['bloqueado']==1){
						echo $this->Form->input('bloqueado', array('value' => 1, 'checked' =>'checked' , 'label'=>'Produto Bloqueado' ));
					}else{
						echo $this->Form->input('bloqueado', array('label' => 'Produto Bloqueado'));
					}
														
				?>
			
			
		</div>
	</section>
		<div  id="msgModalProd" class="msgModal">Campo Obrigatório.</div>
</section>

<footer>
	<?php
		//echo $this->form->end('botao-salvar.png',array('div'=>'gg', 'class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar', 'id' => 'btnConfigProduto')); 
		echo $this->Form->submit('submit', array('type' => 'image', 'src' =>$this->webroot . 'img/botao-salvar.png', 'id'=>'btnConfigProduto'));
		echo $this->Form->end(); 
		
		
	?>			
</footer>

