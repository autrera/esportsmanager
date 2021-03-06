<div class = "row">
    <div class = "span8">
    <?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
    ?>
		<div class = "row">
            <div class = "span2 author-block">
                <div class = "author-picture">
                    <?php
                        echo $this->element('profile-pic', array(
                            'profilePic' => $profile['Profile']['picture'],
                            'profileId'  => $profile['Profile']['id'],
                            'size' => 140,
                        ));
                    ?>
                </div>
                <div class = "author-info">
                    <?php
                        echo $this->element('userLink', array(
                            'nickname' => $video['Users']['nickname'],
                            'user_id'  => $video['Users']['id'],
                        ));
                        echo $this->element('userNation', array(
                            'country' => $profile['Countries']
                        ));
                    ?>
                </div>
            </div>
            <div class = "span6">
		        <ul class="thumbnails videos-index">
		            <li class="span6 video-container">
		                <div class="thumbnail">
		                    <iframe width="100%" height="300" src="<?php echo $video['Video']['url']; ?>" frameborder="0" allowfullscreen=""></iframe>
		                    <h4 class = "video-title">
		                        <a href = "/videos/view/<?php echo
		                            $video['Video']['slug']; ?>">
		                            <?php echo $video['Video']['name'] ?>
		                        </a>
		                    </h4>
		                    <div class = "video-info">
		                        <?php echo $this->element('timeStampLabel', array(
		                            'timestamp' => $video['Video']['created'],
		                            'format' => 'd/m/Y - H:i'
		                        )); ?>
		                        <?php echo $this->element('userLink', array(
		                            'nickname' => $video['Users']['nickname'],
		                            'user_id' => $video['Users']['id'],
		                        )); ?>
		                    </div>
		                </div>
		            </li>
		        </ul>
            </div>
        </div>
        <?php echo $this->element('facebook-comments'); ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>
