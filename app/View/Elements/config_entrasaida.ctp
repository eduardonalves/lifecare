<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
	
	$this->start('css');
	echo $this->Html->css('modal_filtro_es');
	$this->end();

?>

<header id="cabecalho">
	<?php 
		echo $this->Html->image('cadastrar-titulo.png', array('id' => 'cadastrar', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
	?>
	
	<h1>Filtro Notas</h1>
</header>

<section>
	<header>Campos da Tabela</header>

	<section class="coluna-modal">
		<div class="Confignota form">
			
			<?php
				echo $this->Form->create('Confignota');
			?>	
			
			<?php
					
				echo $this->Form->input('id',array('value' => $confignota['Confignota']['id']));
			?>
					
			<div class='esconder'>	
				<?php echo $this->Form->input('user_id',array('class'=>'esconder','label'=>'')); ?>
			</div>
		
			<?php
			
				//..................................................LINHA1
				if($confignota['Confignota']['nota_fiscal']==1){
						echo $this->Form->input('nota_fiscal', array('value' => 1, 'checked' =>'checked', 'label'=>'Nota Fiscal'));
					} else{
						echo $this->Form->input('nota_fiscal', array('label' => 'Nota Fiscal'));
				}
				
				if($confignota['Confignota']['valor_st']==1){
						echo $this->Form->input('valor_st', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor CST'));
					} else{
						echo $this->Form->input('valor_st', array('label' => 'Valor CST'));
				}
				
				if($confignota['Confignota']['valor_frete']==1){
						echo $this->Form->input('valor_frete', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Frete'));
					} else{
						echo $this->Form->input('valor_frete', array('label' => 'Valor Frete'));
				}
				
				
				
			
				//..................................................Linha2
							
				
				if($confignota['Confignota']['tipo']==1){
						echo $this->Form->input('tipo', array('value' => 1, 'checked' =>'checked', 'label'=>'Tipo'));
					} else{
						echo $this->Form->input('tipo', array('label' => 'Tipo'));
				}
				
				if($confignota['Confignota']['vb_icms']==1){
						echo $this->Form->input('vb_icms', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Base ICMS'));
					} else{
						echo $this->Form->input('vb_icms', array('label' => 'Valor Base ICMS'));
				}
				
				
				
				if($confignota['Confignota']['valor_desconto']==1){
						echo $this->Form->input('valor_desconto', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Desconto'));
					} else{
						echo $this->Form->input('valor_desconto', array('label' => 'Valor Desconto'));
				}
				
				
				
				//..................................................Linha3
				
				
				if($confignota['Confignota']['data']==1){
						echo $this->Form->input('data', array('value' => 1, 'checked' =>'checked', 'label'=>'Data Movimentação'));
					} else{
						echo $this->Form->input('data', array('label' => 'Data'));
				}
				
							
				if($confignota['Confignota']['valor_icms']==1){
						echo $this->Form->input('valor_icms', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor ICMS'));
					} else{
						echo $this->Form->input('valor_icms', array('label' => 'Valor ICMS'));
				}
				
				if($confignota['Confignota']['valor_seguro']==1){
						echo $this->Form->input('valor_seguro', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Seguro'));
					} else{
						echo $this->Form->input('valor_seguro', array('label' => 'Valor Seguro'));
				}
				
				
				
				//..................................................Linha4
				if($confignota['Confignota']['descricao']==1){
						echo $this->Form->input('descricao', array('value' => 1, 'checked' =>'checked', 'label'=>'Descrição'));
					} else{
						echo $this->Form->input('descricao', array('label' => 'Descrição'));
				}
				
				if($confignota['Confignota']['obs']==1){
						echo $this->Form->input('obs', array('type'=>'checkbox','value' => 1, 'checked' =>'checked', 'label'=>'Observação'));
					} else{
						echo $this->Form->input('obs', array('type'=>'checkbox','label' => 'Observação'));
				}
				
				if($confignota['Confignota']['valor_ipi']==1){
						echo $this->Form->input('valor_ipi', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor IPI'));
					} else{
						echo $this->Form->input('valor_ipi', array('label' => 'Valor IPI'));
				}

					
				
								
				if($confignota['Confignota']['valor_outros']==1){
						echo $this->Form->input('valor_outros', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Outros'));
					} else{
						echo $this->Form->input('valor_outros', array('label' => 'Valor Outros'));
				}
				//..................................................Linha5
				
				if($confignota['Confignota']['parceirodenegocio_id']==1){
						echo $this->Form->input('parceirodenegocio_id', array('value' => 1, 'checked' =>'checked', 'label'=>'Parceiro de Negócio','type'=>'checkbox'));
					} else{
						echo $this->Form->input('parceirodenegocio_id', array('type'=>'checkbox','label' => 'Parceiro de Negócio'));
				}
				
				
				
				if($confignota['Confignota']['valor_pis']==1){
						echo $this->Form->input('valor_pis', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor PIS'));
					} else{
						echo $this->Form->input('valor_pis', array('label' => 'Valor PIS'));
				}	
				
				
				if($confignota['Confignota']['valor_total']==1){
						echo $this->Form->input('valor_total', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Total'));
					} else{
						echo $this->Form->input('valor_total', array('label' => 'Valor Total'));
				}
				
				
					
				
				//..................................................Linha6
				
				if($confignota['Confignota']['vb_cst']==1){
						echo $this->Form->input('vb_cst', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Base CST'));
					} else{
						echo $this->Form->input('vb_cst', array('label' => 'Valor Base CST'));
				}


				if($confignota['Confignota']['v_cofins']==1){
						echo $this->Form->input('v_cofins', array('value' => 1, 'checked' =>'checked', 'label'=>'Valor Cofins'));
					} else{
						echo $this->Form->input('v_cofins', array('label' => 'Valor Cofins'));
				}

				

				
				
				

				
				
				
			?>
		</div>
	</section>
	
	<div  id="msgModalNot" class="msgModal">Campo Obrigatório.</div>
</section>

<footer>
	<?php
		echo $this->form->end( 'botao-salvar.png' ,  array('class' => 'bt-salvar', 'alt' => 'Salvar', 'title' => 'Salvar')); 
		
	?>			
</footer>
