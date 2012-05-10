<?php
    echo $this->Html->link(
        '<span class="label label-warning">
            <img src = "'.$country['flag'].'"> ' . 
                $country['name'] . 
        '</span>',
        array(
            'controller' => 'countries', 
            'action' => 'view', 
            $country['id']
        ),
        array(
            'escape' => false
        )
    );
?>
