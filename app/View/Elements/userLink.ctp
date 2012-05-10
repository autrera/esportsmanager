<?php
    echo $this->Html->link(
        '<span class="label label-info">
        	<i class="icon-user icon-white"></i> ' . 
        		$nickname . 
    	'</span>',
        array(
        	'controller' => 'users', 
        	'action' => 'view', 
        	$user_id
        ),
        array(
            'escape' => false
        )
    );
?>
