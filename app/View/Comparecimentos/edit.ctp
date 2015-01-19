<pre>
<?php
	
print_r($registro);
	
?>
</pre>

<?php

echo $this->Search->create();
echo $this->Search->input('status');
echo $this->Search->input('data');
echo $this->Search->input('funcionario', array('class' => 'select-box'));
echo $this->Search->input('cargo', array('class' => 'select-box'));
echo $this->Search->end(__('Filter', true));
?>
