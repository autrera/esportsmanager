<div class = "row">
    <div class = "span8">
<?php
        // Si tiene permitido editar
        echo '<div class = "btn_group">';
        if (in_array('edit', $actions) || $isOwner){
            echo $this->Html->link('Edit', '/news/edit/'.$id, array(
                'class' => array('btn', 'btn-warning', 'btn-large')
            ));
        }

        // Si tiene permitido borrar
        if (in_array('delete', $actions) || $isOwner){
            echo $this->Form->postLink(
                '<i class="icon-trash icon-white"></i>Delete',
                array('action' => 'delete', $noticia['News']['id']),
                array('class' => array('btn', 'btn-danger', 'btn-large')),
                'Are you sure?'
            );
        }
        echo "</div>";

        echo "<pre>";
        print_r($noticia);
        echo "</pre>";
?>
    </div>
    <div class = "span4">
        <?php include_once(ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'sidebar.php'); ?>
    </div>
</div>