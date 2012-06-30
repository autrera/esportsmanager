<?php
    // echo $this->Html->link(
    //     '<span class="label label-info">
    //     	<i class="icon-user icon-white"></i> ' . 
    //     		$nickname . 
    // 	'</span>',
    //     array(
    //     	'controller' => 'users', 
    //     	'action' => 'view', 
    //     	$user_id
    //     ),
    //     array(
    //         'escape' => false
    //     )
    // );
?>
<span class="label label-info">
    <a href="/users/view/<?php echo $user_id; ?>">
        <i class="icon-user icon-white"></i>
        <?php echo $nickname; ?>
    </a>
</span>
