<?php 
	$this->start('css');
	echo $this->Html->css('add_produto');
	$this->end();
	
?>

<header> <!---header--->

	<?php 
		echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	 ?>
	 <h1>Cadastrar</h1>
	 
</header> <!---Fim header--->

	<section> <!---section superior--->
		
		<header>Dados Gerais Do Produto</header>
		
		<section class="coluna-esquerda">
			<div>
			<?php
					//echo $this->Form->input('Produto.codigo',array('class'=>'tamanho-medi', 'id'=>'input-codigo','label' =>'Código: ','type' => 'text'));
					echo $this->Form->input('Produto.composicao', array('required'=>'true','class'=>'tamanho-medi','id'=>'','label' => 'Composição: '));
					echo $this->Form->input('Produto.estoque_minimo',array('required'=>'true','class'=>'tamanho-pequeno','id'=>'', 'label' => 'Estoque Mínimo: ', 'type' => 'text'));
				
			echo $this->Form->input('Model.Categoria:', array(
				'type' => 'select',
				'multiple' => 'multiple',
				'required'=>'true',
				'class'=>'select-multiple',
				'options' => array('add-categoria' => 'Cadastrar', 'option' => 'Adicionar')));
				
			?>
			<!--
			<span class="cat">Categoria:</span>
			<select multiple class="select-multiple">
					<option>Cadastrar</option>
					
			</select> 
			-->
			</div>
			</section>
			
			<section class="coluna" >
				<div>
				<?php
				echo $this->Form->input('Produto.nome',array('required'=>'true','class'=>'tamanho-medi','id'=>'', 'label' => 'Nome*:'));
				echo $this->Form->input('Produto.dosagem',array('required'=>'true','class'=>'tamanho-pequeno', 'id'=>'', 'label' => 'Dosagem: '));
				echo $this->Form->input('Produto.estoque_maximo',array('required'=>'true','label'=>'Estoque ideal:','class' => 'tamanho-pequeno', 'id'=>'', 'type' => 'text'));
				echo $this->Form->input('textarea.Descrição:', array('required'=>'true','rows' => '3', 'cols' => '4'));
				?>
							
				</div>
			</section>
		
			<section class="coluna-direita" >
				<div>
				<?php
					echo $this->Form->input('Produto.codigoEan',array('required'=>'true','class'=>'tamanho-medi','type'=>'text', 'id'=>'tamanho-input','label' => 'Código EAN: '));
								
					echo $this->Form->input('field.Unidade*:', array('required'=>'true','options'=>array('adicionar',2,3,4,)));
					?>
					<br/>
					<div class="periodo">
				<?php
				
					echo $this->Form->input('Produto.periodo_critico',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena', 'label' => 'Período Crítico: '));
				
				?>
				</div>
				</div>
			
			</section>
			
		</section><!---Fim section superior--->
		
		
		<section> <!---section MEIO--->
		
			<header>Dados Tributários do Produto</header>
			
			<section class="coluna-esquerda">
				<div>
				<?php
					echo $this->Form->input('Tributo.ncm',array('required'=>'true','class'=>'medio','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','label'=>'NCM:'));
					echo $this->Form->input('Tributo.codigo_selo_ipi',array('required'=>'true','class'=>'tamanho-medio','type'=>'text', 'id'=>'tamanho-input','label'=>'Código selo IPI:'));
					echo $this->Form->input('Tributo.al_cst',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','type'=>'text','label'=>'CST:'));	
				?>
				</div>
			</section>
			
			<section class="coluna">
				<div>
				<?php
				echo $this->Form->input('Tributo.cfop',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','label'=>'CFOP:'));
				echo $this->Form->input('Tributo.qte_selo_ipi',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','label'=>'Quantidade Selo IPI:'));
				echo $this->Form->input('Tributo.al_confins',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','label'=>'CONFINS:'));
				
				?>
				</div>

			</section>
			
			<section class="coluna-direita">
				<div>
					<?php
						echo $this->Form->input('Tributo.al_icms',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','label'=>'ICMS:'));
						echo $this->Form->input('Tributo.al_ipi',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','label'=>'IPI:'));	
						echo $this->Form->input('Tributo.al_pis',array('required'=>'true','class'=>'tamanho-pequeno','type'=>'text', 'id'=>'input-pequena','label'=>'PIS:'));
					?>
					</div>
			</section>
		</section><!--fim Meio-->
		
		
		<section> <!---section Baixo--->
		
			<header>Dados de Estoque do Produto</header>
			
			<section class="coluna-esquerda">
				<div>
				<?php
					echo $this->Form->input('field.produtoBloqueado:', array('required'=>'true','label'=>'Produto Bloqueado:','class'=>'tamanho-medi','options'=>array('adicionar',2,3,4,)));
					?>
				</div>	
				<div class="estoque-minimo">
				<?php
					echo $this->Form->input('Estoque Mínimo:', array('required'=>'true','label'=>'Estoque Mínimo:','type'=>'text','class'=>'tamanho-pequeno'));
				?>
				</div>
				</div>
			</section>
			
			<section class="coluna">
				<div class="status">
				<?php
					echo $this->Form->input('field.Status:', array('required'=>'true','label'=>'Status de Visualização:','class'=>'tamanho-status','options'=>array('adicionar',2,3,4,)));
					?>
				</div>	
				<div class="estoque-minimo">
				<?php
					echo $this->Form->input('EstoqueIdeal:', array('required'=>'true','label'=>'Estoque Ideal:','type'=>'text','class'=>'tamanho-pequeno'));
				?>
				</div>
				</div>

			</section>
			
			<section class="coluna-direita">
				<div>
					<?php
						echo $this->Form->input('perido',array('required'=>'true','label'=>'Período Crítico de Val.:','class'=>'tamanho-pequeno','type'=>'text'));
					?>
					</div>
			</section>
		</section><!--fim Meio-->
		

<!-- Modal -->
<div class="modal fade" id="myModal_categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		
		<div class="modal-body">
			<?php echo $this->element('categoria_add');?>
		</div>
			
		
</div>
<!-- /.modal -->


		<footer>
			
			<?php
				echo $this->form->submit( 'botao-salvar.png' ,  array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
			?>	
		</fieldset>
		
		</footer>
