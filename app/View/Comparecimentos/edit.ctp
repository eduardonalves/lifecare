<pre>
<?php
	
print_r($registro);
	
?>
</pre>

<?php

echo $this->Search->create();
echo $this->Search->input('status');
echo $this->Search->end(__('Filter', true));
?>
