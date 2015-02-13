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
			<span style="font-weight:bold;">Para responder o pedido de cotação realizado pela <?php echo ($_SESSION['extraparams']['Mensagem']['empresa']);?> entre no link abaixo e insira o seu código.</span>
			<br/>
			<br/>
			<span class="numero" style="color:#008000; font-size:22px; font-weight:bold;">Código: <?php echo ($_SESSION['extraparams']['Mensagem']['codigo']);?></span>
			<br/>
			<a style="text-decoration:none; color:#008000;" href="<?php echo ($_SESSION['extraparams']['Mensagem']['url']);?>"><?php echo ($_SESSION['extraparams']['Mensagem']['url']);?></a>
			
		</p>
	</header>
</div>
