<?php
    App::uses('utilities', 'Lib');
?>
<div class = "row">
    <div class = "span8">
	    <?php
	        echo $this->element('indexActionsTop', array(
	            'actions' => $actions,
	            'isOwner' => $isOwner,
	        ));
	    ?>
        <div class = "teams-index">
            <div class = "team-content">
            <?php if (! empty($team['Team']['photo'])): ?>
                <div class = "row team-picture">
                    <div class = "span8">
                        <?php echo $this->element('responsiveImg', array('url' => $team['Team']['photo'])); ?>
                    </div>
                </div>
            <?php endif;?>
            <?php if (! empty($team['Users'])): ?>
                <div class = "row players-content">
                    <div class = "span8">
                        <?php foreach ($team['Users'] as $usuario): ?>
                        <div class = "row player-content">
                            <div class = "span2 offset1">
                            <?php
                                echo $this->element('profile-pic', array(
                                    'profilePic' => $usuario['Profile']['picture'],
                                    'profileId'  => $usuario['Profile']['id'],
                                    'size' => 140,
                                ));
                            ?>
                            </div>
                            <div class = "span5">
                                <dl class = "dl-horizontal">
                                    <dt>Nickname: </dt>
                                    <dd><?php echo $usuario['User']['nickname']; ?></dd>
                                    <?php if ($usuario['Profile']['first_name']): ?>
                                    <dt>Name: </dt>
                                    <dd><?php echo $usuario['Profile']['first_name']; ?></dd>
                                    <?php endif; ?>
                                    <?php if ($usuario['Profile']['last_name']): ?>
                                    <dt>Last Name: </dt>
                                    <dd><?php echo $usuario['Profile']['last_name']; ?></dd>
                                    <?php endif; ?>
                                    <dt>Social Sites: </dt>
                                    <dd>
                                        <?php echo $this->element('UserSocialLinks', array(
                                            'facebook_id'=>$usuario['Profile']['facebook_id'],
                                            'twitter_id' =>$usuario['Profile']['twitter_id'],
                                            'gplus_id'   =>$usuario['Profile']['gplus_id'],
                                        )); ?>
                                    </dd>
                                    <?php if ($usuario['Profile']['description']): ?>
                                    <dt>Biography: </dt>
                                    <dd><?php echo $usuario['Profile']['description']; ?></dd>
                                    <?php endif; ?>
                                </dl>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>
