<div class = "row">
    <div class = "span8">
        <div class = "page-header">
            <h1>.: Users</h1>
        </div>
        <ul class="thumbnails users-index">
            <?php foreach ($users as $user): ?>
            <li class="span2 user-container">
                <div class="thumbnail">
                    <?php if ($user['Profile']['picture']): ?>
                    <?php 
                        echo $this->element('profile-pic', array(
                            'profilePic' => $user['Profile']['picture'],
                            'profileId'  => $user['Profile']['id'],
                            'size' => 130,
                        ));
                    ?> 
                    <?php endif; ?>
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