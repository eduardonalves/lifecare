<div style="font-family:arial; background-color:#F9F9F9; border:2px solid #CCCCCC; margin:0 auto; min-height:300px; width:700px;">
	<header style="margin-top:10px; ">
		<p style="text-align:center;">
			<img src="http://lifecare.vento-consulting.com/img/login-title.png">
		</p>
		<p style="font-size:18px; margin:35px 10px; text-align:left;">
			<span style="font-size:22px; font-weight:bold;"><?php echo ($_SESSION['extraparams']['Mensagem']['empresa']);?></span>
			<br/>
			<?php echo ($_SESSION['extraparams']['Mensagem']['endereco']);?>,  - Telefone <?php echo ($_SESSION['extraparams']['Mensagem']['telefone']);?>
			<br/>
			<a style="text-decoration:none; color:inherit;" href="<?php echo ($_SESSION['extraparams']['Mensagem']['site']);?>"><?php echo ($_SESSION['extraparams']['Mensagem']['site']);?></a>
		</p>
		
		<p style="text-align:center;">
			<span style="font-weight:bold;"> Comunicamos a troca do lote de número <?php echo ($_SESSION['extraparams']['Mensagem']['loteantigo']);?> foi trocado pelo(s) lote(s) abaixo.</span>
			<br/>
			<br/>
			<span class="numero" style="color:#008000; font-size:22px; font-weight:bold;">Código: <?php echo ($_SESSION['extraparams']['Mensagem']['lotestrocados']);?></span>
			<br/>
			<span class="numero" style="color:#008000; font-size:22px; font-weight:bold;">Pelo Usuário: <?php echo ($_SESSION['Auth']['User']['username']);?></span>
			<br/>
			<span class="numero" style="color:#008000; font-size:22px; font-weight:bold;">Pedido número: <?php echo ($_SESSION['extraparams']['Mensagem']['pedido_id']);?></span>
			<br/>
			
		</p>
	</header>
</div>
