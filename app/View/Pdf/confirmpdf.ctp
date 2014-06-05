<?php

$extraparams = $this->Session->read('extraparams');
$this->data = $extraparams;
$formulaDetail = $extraparams['formulaDetail'];
$this->Session->delete('extraparams');
?>
<h2>Participent Detail</h2>
<label>Participent Name   : <?php echo $this->data['Participant']['full_name']; ?> </label><br>