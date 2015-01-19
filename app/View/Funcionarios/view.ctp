<?php

	$this->start('css');
		echo $this->Html->css('rh');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
	    echo $this->Html->css('jquery-ui/custom-combobox.css');
	$this->end();
	
	$this->start('script');
		echo $this->Html->script('jquery-ui/jquery.ui.button.js');
		echo $this->Html->script('rh');
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
    <?php echo $this->Html->image('titulo-cadastrar.png', array('id' => 'cadastrar-titulo', 'alt' => 'Cadastrar', 'title' => 'Cadastrar')); ?>
	 
	 <!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption53">Visualizar Funcionário</h1>
</header>

<section>
	<header>Informações do Funcionário</header>
	
	<section>
		<section class="coluna-esquerda">			
			
			
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Ativo:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['ativo'],array('class'=>'valor'));?>	</div>
				</div>
			
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Nome:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['nome'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','CPF:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['cpf'],array('class'=>'valor'));?>	</div>
				</div>			
			
		</section>
		
		<section class="coluna-central">			
		
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Nascimento:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',formatDateToView($funcionario['Funcionario']['nascimento']),array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','PIS/PASEP:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['pis_pasep'],array('class'=>'valor'));?>	</div>
				</div>

		</section>
		
		<section class="coluna-direita">
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Nome da Mãe:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['nome_mae'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Cart. Trabalho:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['carteira_trabalho'],array('class'=>'valor'));?>	</div>
				</div>
		</section>
	</section>

	<header class="linha">Dados de Contato / Endereço</header>
	
	<section>
		<section class="coluna-esquerda">
			
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Telefone:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['telefone'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Endereço:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['endereco'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','UF:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['uf'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
			

		</section>
		
		<section class="coluna-central">
		
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Celular:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['telefone2'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Bairro:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['bairro'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','CEP:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['cep'],array('class'=>'valor'));?>	</div>
				</div>
			</div>
			
		</section>
		
		<section class="coluna-direita">
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Email:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['email'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Cidade:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['cidade'],array('class'=>'valor'));?>	</div>
				</div>				
			</div>
		</section>
	</section>
		
	<header class="linha">Dados da Função</header>
	
	<section>
		<section class="coluna-esquerda">
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Cargo:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$cargoFunc['Cargos']['nome'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Admissão:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',formatDateToView($funcionario['Funcionario']['admissao']),array('class'=>'valor'));?>	</div>
				</div>				
			</div>
		</section>
		
		<section class="coluna-central">
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','CTPS:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',$funcionario['Funcionario']['tipo_contrato'],array('class'=>'valor'));?>	</div>
				</div>
				
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Desligamento:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',formatDateToView($funcionario['Funcionario']['desligamento']),array('class'=>'valor'));?>	</div>
				</div>				
			</div>
		</section>
		
		<section class="coluna-direita">
			<div class="segmento-esquerdo">
				<div class="conteudo-linha">
					<div class="linha1"><?php echo $this->Html->Tag('p','Efetivação:',array('class'=>'titulo'));?></div>
					<div class="linha2"><?php echo $this->Html->Tag('p',formatDateToView($funcionario['Funcionario']['efetivacao']),array('class'=>'valor'));?>	</div>
				</div>	
			</div>
		</section>
	</section>
	
</section>

<footer>
	<?php
		echo $this->html->image('botao-editar.png',array('alt'=>'Editar',
												     'title'=>'Editar',
													 'class'=>'bt-editar',
													 'url'=>array('action'=>'edit', $funcionario['Funcionario']['id'])));
	?>	
</footer>
