<?php
echo "<pre>";
print_r($usuario);
echo "</pre>";
?>
<div class = "row">
    <div class = "span8">
	    <?php
	        echo $this->element('indexActionsTop', array(
	            'actions' => $actions,
	            'isOwner' => $isOwner,
	        ));
	    ?>
	</div>
    <?php echo $this->element('sidebar'); ?>
</div>
