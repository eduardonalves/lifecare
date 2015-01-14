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
	<?php echo $this->html->image('titulo-consultar.png'); ?>
	<h1>Edição da Empresa</h1>
</header>

<section>
	
	<header>Dados da Empresa</header>
	
	<section class="coluna-esquerda">  
		<?php
			
			echo $this->Form->input('id',array('type'=>'hidden'));
			echo $this->Form->input('nome_fantasia',array('value'=>$empresa['Empresa']['nome_fantasia'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Nome da Empresa:','type'=>'text','id'=>''));
			echo $this->Form->input('telefone',array('value'=>$empresa['Empresa']['telefone'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Telefone:','type'=>'text','id'=>''));
			echo $this->Form->input('uf',array('value'=>$empresa['Empresa']['uf'],'disabled'=>'disabled','class'=>'tamanho-pequeno borderZero','label'=>'UF:','type'=>'text','id'=>''));
		?>
	</section>
	
	<section class="coluna-central">
		<?php
			echo $this->Form->input('cnpj',array('value'=>$empresa['Empresa']['cnpj'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'CNPJ:','type'=>'text','id'=>''));
			echo $this->Form->input('endereco',array('value'=>$empresa['Empresa']['endereco'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Endereço:','type'=>'text','id'=>''));
			echo $this->Form->input('cidade',array('value'=>$empresa['Empresa']['cidade'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Cidade:','type'=>'text','id'=>''));
		?>
	</section>

	<section class="coluna-direita">
		<?php
			echo $this->Form->input('razao',array('value'=>$empresa['Empresa']['razao'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Razão:','type'=>'text','id'=>''));
			echo $this->Form->input('complemento',array('value'=>$empresa['Empresa']['complemento'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Complemento:','type'=>'text','id'=>''));
			echo $this->Form->input('bairro',array('value'=>$empresa['Empresa']['bairro'],'disabled'=>'disabled','class'=>'tamanho-medio borderZero','label'=>'Bairro:','type'=>'text','id'=>''));

		?>
	</section>
	
</section>

<footer>
	<?php
	
	?>	
</footer>




