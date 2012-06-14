<?php
    App::uses('utilities', 'Lib');
    // echo "<pre>";
    // print_r($team);
    // echo "</pre>";
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
                        <img src = "<?php echo $team['Team']['photo'] ?>">
                    </div>
                </div>
            <?php endif;?>
            <?php if (! empty($team['Users'])): ?>
                <div class = "row players-content">
                    <div class = "span8">
                        <?php foreach ($team['Users'] as $usuario): ?>
                        <div class = "row player-content">
                            <div class = "span2 offset1">
                                <?php if ($usuario['Profile']['picture']): ?>
                                <img src = "<?php echo $usuario['Profile']['picture']; ?>">
                                <?php endif; ?>
                                &nbsp;
                            </div>
                            <div class = "span5">
                                <dl class = "dl-horizontal">
                                    <dt>Nickname: </dt>
                                    <dd><?php echo $usuario['Users']['nickname']; ?></dd>
                                    <dt>Name: </dt>
                                    <dd><?php echo $usuario['Profile']['first_name']; ?></dd>
                                    <dt>Last Name: </dt>
                                    <dd><?php echo $usuario['Profile']['last_name']; ?></dd>
                                    <dt>Birthdate: </dt>
                                    <dd>
                                        <?php echo utilities::formatDate(
                                            $usuario['Profile']['birthdate']
                                        ); ?>
                                    </dd>
                                    <dt>Member Since: </dt>
                                    <dd>
                                        <?php echo utilities::formatDate(
                                            $usuario['Users']['created']
                                        ); ?>
                                    </dd>
                                    <dt>Description: </dt>
                                    <dd><?php echo $usuario['Profile']['description']; ?></dd>
                                    <dt>Social Sites: </dt>
                                    <dd>
                                        <?php echo $this->element('UserSocialLinks', array(
                                            'facebook_id'=>$usuario['Profile']['facebook_id'],
                                            'twitter_id' =>$usuario['Profile']['twitter_id'],
                                            'gplus_id'   =>$usuario['Profile']['gplus_id'],
                                        )); ?>
                                    </dd>
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