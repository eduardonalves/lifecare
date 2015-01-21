<header>
	<?php 
		echo $this->Html->image('titulo-saida.png', array('id' => 'titulo-saida', 'alt' => 'Saída', 'title' => 'Saída')); 
	?>
	
	<!-- menuOptionXY [X] = Menu Superior [Y] = Menu Lateral -->
	<h1 class="menuOption24">Saída</h1>
	
</header>

	<section id="passos-bar">
	
		<div id="passos-bar-total">
			<div class="linha-verde complete"></div>
			
			<div class="circle complete">
				<span>Modo de Saída</span>
			</div>
			
			<div class="linha-verde complete"></div>

			<div class="circle complete">
				<span>Importar Arquivo</span>
			</div>

			<div class="linha-verde"></div>

			<div class="circle">
				<span></span>
			</div>
		</div>
	
</section>

<section>
	<header>Importar Arquivo</header>
	
<!--Div primeiro Campo--> 	
	
	<div class="campo-importar-xml"/> 

		<div class="notas upload">
	
			<form id="NotaIndexForm" accept-charset="utf-8" method="post" enctype="multipart/form-data" action="/cakephp/Saidas/uploadxml_saida_resultado">
				<div style="display:none;">
					<input type="hidden" value="POST" name="_method"/>
				</div>
				
				<div class="input file">
					<label for="doc_file">Buscar Arquivo(.xml):</label>
					<input id="doc_file" class="campo-buscar" type="file" name="data[Nota][doc_file]"/>
					<input type="text" id="valor"/>
					<a id="teste" href="#"><img id="bt-buscar" src="/cakephp/img/botao-buscar.png"/></a>
				</div>

				<div class="submit">
					<input id="bt-submit" type="image" src="/cakephp/img/botao-confirmar.png"/>
				</div>

			</form>
	
		</div>
		
		<div class="saida-devolucao">		
			<?php
					
					//echo $this->Form->end('Upload');
				echo $this->Form->input('', array('label'=>'Saida de uma devolução','type'=>'checkbox'));
			?>
		</div>
	</div>
<!--Fim Div primeiro Campo-->	
	
<footer>
	
	<?php
	
	
	echo $this->html->image('voltar.png',array('alt'=>'Voltar',
												     'title'=>'Voltar',
												     'id'=>'voltar0',
													 'class'=>'bt-voltar',
													 'url'=>array('controller'=>'Saidas','action'=>'index')
													 ));
													 
	
/*	echo $this->html->image('botao-confirmar.png',array('type'=>'submit','alt'=>'Confirmar',
												     'title'=>'Confirmar',
												     'id'=>'importar0',
												     'class'=>'bt-confirmar importar',
													 ));
*/	
	/*echo $this->html->image('botao-confirmar.png',array('alt'=>'Confirmar',
												     'title'=>'Confirmar',
												     'id'=>'avancar0',
												     'class'=>'bt-confirmar importar',
													 )),;*/
													 
													
	
	?>
	
</footer>	
	
	
</section>
