<?php
    App::uses('utilities', 'Lib');
?>
    <span>
    	on 
    	<small>
	        <?php 
	            echo utilities::formatDate($timestamp, $format); 
	        ?>
        </small>
    </span>
