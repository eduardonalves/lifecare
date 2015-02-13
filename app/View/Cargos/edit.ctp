<header>

<?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>

<h1 class="menuOption53">Editar Cargo</h1>

</header>


<section>
<header> Cargo </header>
		
	<section>
		<section class="coluna_edit_unidade">
			<fieldset class="fieldSetUnidade"  style="height:100px;width:400px;">
				<legend>Editar Nome do Cargo</legend>	
				<?php
					echo $this->Form->create('Cargo',array('action'=>'edit'));
						echo $this->Form->input('id',array('type'=>'hidden'));
						echo $this->Form->input('nome',array('label'=>'Nome:','class'=>'tamanho-medio'));	
						echo $this->Form->input('descricao',array('label'=>'Descrição:','class'=>'tamanho-medio','type'=>'textarea','style'=>'height:50px;'));	
						echo $this->form->submit('botao-salvar.png',array('class'=>'salvarUnidade','style'=>'margin-top: -22px;margin-right:-50px;clear:both;'));
					echo $this->Form->end();
				?>	
			</fieldset>
		</section>	
	</section>
	
