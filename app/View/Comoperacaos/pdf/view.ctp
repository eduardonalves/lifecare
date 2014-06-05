<?php 
	$CakePdf = new CakePdf();
    $CakePdf->template('comoperacaos', 'default');
    //get the pdf string returned
    $pdf = $CakePdf->output();
    //or write it to file directly
    $pdf = $CakePdf->write(APP . 'files' . DS . 'comoperacaos.pdf');
?>


