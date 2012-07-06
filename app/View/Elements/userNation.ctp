<?php
    // echo $this->Html->link(
    //     '<span class="label label-warning">
    //         <img src = "'.$country['flag'].'"> ' . 
    //             $country['name'] . 
    //     '</span>',
    //     array(
    //         'controller' => 'countries', 
    //         'action' => 'view', 
    //         $country['id']
    //     ),
    //     array(
    //         'escape' => false
    //     )
    // );
?>
<span class="label label-warning">
    <a href="/countries/view/<?php echo $country['id']; ?>">
        <img src="<?php echo $country['flag']; ?>">
        <?php echo $country['name']; ?>
    </a>
</span>
