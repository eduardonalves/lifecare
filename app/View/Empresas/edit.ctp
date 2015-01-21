<?php
	//~ $this->start('css');
		//~ //echo $this->Html->css('parceiro');
	//~ $this->end();
//~ 
	//~ $this->start('script');
		//~ //echo $this->Html->script('funcoes_parceiro.js');
	//~ $this->end();
?>

<header>
	<?php echo $this->html->image('cadastrar-titulo.png'); ?>
	<h1>Cadastro de Empresa</h1>
</header>

<section>
	
	<header>Dados da Empresa</header>
	
	<section class="coluna-esquerda">  
		<?php
			echo $this->Form->create('Empresa');
			
			echo $this->Form->input('id');
			echo $this->Form->input('nome_fantasia',array('class'=>'tamanho-medio','label'=>'Nome da Empresa:','type'=>'text','id'=>''));
			echo $this->Form->input('telefone',array('class'=>'tamanho-medio','label'=>'Telefone:','type'=>'text','id'=>''));
			echo $this->Form->input('uf',array('class'=>'tamanho-pequeno','label'=>'UF:','type'=>'text','id'=>''));
		?>
	</section>
	
	<section class="coluna-central">
		<?php
			echo $this->Form->input('cnpj',array('class'=>'tamanho-medio','label'=>'CNPJ:','type'=>'text','id'=>''));
			echo $this->Form->input('endereco',array('class'=>'tamanho-medio','label'=>'Endereço:','type'=>'text','id'=>''));
			echo $this->Form->input('cidade',array('class'=>'tamanho-medio','label'=>'Cidade:','type'=>'text','id'=>''));
		?>
	</section>

	<section class="coluna-direita">
		<?php
			echo $this->Form->input('razao',array('class'=>'tamanho-medio','label'=>'Razão:','type'=>'text','id'=>''));
			echo $this->Form->input('complemento',array('class'=>'tamanho-medio','label'=>'Complemento:','type'=>'text','id'=>''));
			echo $this->Form->input('bairro',array('class'=>'tamanho-medio','label'=>'Bairro:','type'=>'text','id'=>''));

		?>
	</section>
	
</section>

<footer>
	<?php
		echo $this->form->submit('botao-salvar.png',array('alt'=>'Salvar','title'=>'Salvar')); 
		echo $this->Form->end();	
	?>	
</footer>







