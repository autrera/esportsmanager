<?php
    // Si tiene permitido editar
    if (! empty($actions) || $isOwner){
        echo '<div class = "well userActions">';
        if (in_array('edit', $actions) || $isOwner){
            echo $this->Html->link(
                '<i class="icon-pencil icon-white"></i> Edit',
                array('action' => 'edit', $id),
                array(
                    'class' => array('btn', 'btn-warning', 'btn-large'),
                    'escape' => false
                )
            );
        }

        // Si tiene permitido borrar
        if (in_array('delete', $actions) || $isOwner){
            echo $this->Form->postLink(
                '<i class="icon-trash icon-white"></i> Delete',
                array('action' => 'delete', $id),
                array(
                    'class' => array('btn', 'btn-danger', 'btn-large'),
                    'escape' => false
                ),
                'Are you sure?'
            );
        }
        echo "</div>";
    }
?>