<?php
	/**
	*
	* PHP 5
	*
	* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
	* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	*
	* Licensed under The MIT License
	* For full copyright and license information, please see the LICENSE.txt
	* Redistributions of files must retain the above copyright notice.
	*
	* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	* @link          http://cakephp.org CakePHP(tm) Project
	* @package       app.View.Layouts
	* @since         CakePHP(tm) v 0.10.0.1076
	* @license       http://www.opensource.org/licenses/mit-license.php MIT License
	*
	*/

	$cakeDescription = __d('lifecare', 'LifeCare');
?>

<!DOCTYPE html>
<html>
<head>
	
<script>
	var urlInicio = '<?php echo Router::url("/", true)?>';
</script>	

	
	
	<?php echo $this->Html->charset(); ?>
	
	<title>
		
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	
	</title>
	
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('lifecare');
		echo $this->Html->css('jquery-ui/jquery-ui.css');
		echo $this->Html->css('jquery-ui/jquery.ui.all.css');
		echo $this->Html->css('financeiro_geral.css');
		echo $this->Html->css('compras_geral.css');
		echo $this->fetch('css');
		echo $this->Html->script('jquery_novo.js');
		echo $this->Html->script('jquery-ui/jquery-ui.js');
		echo $this->Html->script('jquery-ui/custom-combobox.js');
		echo $this->Html->script('jquery.mask.min.js');
		echo $this->Html->script('jquery.mask.js');
		echo $this->Html->script('jquery.price_format.1.8.js');
		echo $this->Html->script('jquery.price_format.1.8.min.js');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('funcoes_globais.js');
		echo $this->Html->script('funcoes_financeiro.js');
		echo $this->fetch('script');
	?>

</head>

<body>
	<header id="top">
		<section class="content-top">
			
			<?php 
				echo $this->Html->image('logo.png', array('id' => 'logo', 'alt' => 'LifeCare', 'title' => 'LifeCare', 'border' => '0'));
				echo $this->Html->image('usuario.png', array('id' => 'img-usuario', 'alt' => 'Usuario', 'title' => 'Usuario', 'border' => '0')); 
				//echo $this->Html->link($this->Html->image('logout.png'.__('Logout'), array('controller' => 'users', 'action' => 'logout'));
				
				echo $this->Html->image('logout.png', array('id'=>'img-logout','alt' => 'Sair','url' => array('controller' => 'users', 'action' => 'logout'))); 
				
			?>
				

			<nav id="menu">
				<ul>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"dashboard","action"=>"index"),true);?>'><span>Home</span></a></li>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"Notas","action"=>"index"),true);?>/?parametro=produtos'><span>Estoque</span></a></li>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"Contas","action"=>"index"),true);?>/?parametro=contas'><span>Financeiro</span></a></li>
					<li class='active'><a href='<?php echo $this->Html->url(array("controller"=>"Comoperacaos","action"=>"index"),true);?>/?parametro=operacoes'><span>Compras</span></a></li>
					<li><a href='<?php echo $this->Html->url(array("controller"=>"Comoperacaos","action"=>"comercial"),true);?>/?parametro=operacoes'><span>Vendas</span></a></li>
					<!--
						<li><a href='#'><span>Financeiro</span></a></li>
						<li><a href='#'><span>Comercial</span></a></li>
						<li><a href='#'><span>Compras</span></a></li>
					-->
					<li class='last'><a href='<?php echo $this->Html->url(array("controller"=>"Users","action"=>"index"),true);?>'><span>Usuário</span></a></li>
				</ul>
			</nav>
		</section><!-- holder-1 -->
	</header>

	<section class="content holder">			
		<nav id="nav-lateral">	
			<ul>
				<li class="item">
					<a class="menuLink" href='<?php echo $this->Html->url(array("controller"=>"Comoperacaos","action"=>"index/?parametro=operacoes"),true);?>'>
						
						<?php echo $this->Html->image('consultas.png', array('id' => 'consultar-icon', 'alt' => 'Consultar', 'title' => 'Consultar')); ?>

						<span class="label">Consultas</span>
					</a>
				</li>

				<li class="item">
					<a class="menuLink" href='<?php echo $this->Html->url(array("controller"=>"Parceirodenegocios","action"=>"add","layout"=>"compras","abas"=>"42"),true);?>'>
						
						<?php echo $this->Html->image('cadastrar.png', array('id' => 'aside-cadastrar-icon', 'alt' => 'Cadastrar Fornecedor', 'title' => 'Cadastrar Fornecedor')); ?>

						<span class="label">Cadastrar Fornecedor</span>
					</a>
				</li>

				<li class="item">
					<a class="menuLink" href='<?php echo $this->Html->url(array("controller"=>"Produtos","action"=>"add","layout"=>"compras","abas"=>"43"),true);?>'>
						
						<?php 
							echo $this->Html->image('cadastrar.png', array('id' => 'aside-cadastrar-icon', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
						?>

						<span class="label">Cadastrar Produtos</span>
					</a>
				</li>
				
				<li class="item">
					<a class="menuLink" href='<?php echo $this->Html->url(array("controller"=>"Cotacaos","action"=>"add"),true);?>'>
						
						<?php 
							echo $this->Html->image('cotacao_lateral.png', array('id' => 'aside-cadastrar-icon', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
						?>

						<span class="label">Cadastrar Cotações</span>
					</a>
				</li>
				
				<li class="item">
					<a class="menuLink" href='<?php echo $this->Html->url(array("controller"=>"Pedidos","action"=>"add"),true);?>'>
						
						<?php 
							echo $this->Html->image('pedido_lateral.png', array('id' => 'aside-cadastrar-icon', 'alt' => 'Cadastrar', 'title' => 'Cadastrar'));
						?>

						<span class="label">Cadastrar Pedidos</span>
					</a>
				</li>
				<!--	
					<li class="item">

						<?php 
							echo $this->Html->image('emitir.png', array('id' => 'emitir-danfe-icon', 'alt' => 'Emitir DANFe', 'title' => 'Emitir DANFe'));
						?>

						<span class="label">Emitir<br />DANFe</span>
					</li>

					<li class="item">

						<?php 
							echo $this->Html->image('inventario.png', array('id' => 'inventario-icon', 'alt' => 'Inventario', 'title' => 'Inventario'));
						?>

						<span class="label">Invent&aacute;rio</span>
					</li>
				-->
			</ul>
		</nav><!-- nav-lateral -->

		<section class="conteudo-principal">

			<?php 
				echo $this->Session->flash();
				echo $this->Session->flash('auth');
				echo $this->fetch('content');
			?>

			<!-- ############## CODIGOS DOS MODAIS ################# -->

			<?php echo $this->fetch('modais'); ?>

			<!-- ##############  FIM CODIGOS DOS MODAIS ################# -->

		</section><!-- conteudo-principal -->	
	</section><!-- content -->
</body>
</html>
