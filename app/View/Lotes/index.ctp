<div class="carregaLote">
	<div class="input autocompleteLote">
		<label>Pesquisar Lote<span class="campo-obrigatorio">*</span>:</label>
		<select class="tamanho-medio" id="add-lote">
			<option id="optvazioForn"></option>
			
			<?php
					foreach($allLotes as $allLote)
					{
						echo "<option id='".$allLote['Lote']['numero']."' class='".$allLote['Lote']['data_fabricacao']."' rel='".$allLote['Lote']['data_validade']."'  data-fabricante='".$allLote['Lote']['parceirodenegocio_id']."' value='".$allLote['Lote']['id']."' >";
						echo $allLote['Lote']['numero'];
						echo "</option>";
					}

			?>
		</select>
	</div>
</div>
