<?php
    App::uses('utilities', 'Lib');
?>
    <span class="label label-inverse">
        <i class="icon-calendar icon-white"></i>
        <?php 
            echo utilities::formatDate($timestamp, $format); 
        ?>
    </span>
