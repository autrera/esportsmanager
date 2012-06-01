<div class = "row">
    <div class = "span8">
    <?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
    ?>
        <div class = "page-header">
            <h1>.: Users of <?php echo $country['Country']['name']; ?></h1>
        </div>
        <ul class="thumbnails users-index">
            <?php foreach ($users as $user): ?>
            <li class="span2 user-container">
                <div class="thumbnail">
                	<img src = "<?php echo $user['Profile']['picture'] ?>" >
                    <div class = "user-info">
                        <?php echo $this->element('userLink', array(
                            'nickname' => $user['User']['nickname'],
                            'user_id' => $user['User']['id'],
                        )); ?>
                        <span class="label">
                        	<i class="icon-bookmark icon-white"></i>
                        	<?php echo $user['Roles']['name'] ?>
                        </span>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>