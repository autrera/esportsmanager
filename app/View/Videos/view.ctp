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
                    <img src = "<?php echo $profile['Profile']['picture']; ?>" >
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
		                    <iframe width="100%" height="100%" src="<?php echo $video['Video']['url']; ?>" frameborder="0" allowfullscreen=""></iframe>
		                    <h5 class = "video-title">
		                        <a href = "/videos/view/<?php echo 
		                            $video['Video']['id']; ?>">
		                            <?php echo $video['Video']['name'] ?>
		                        </a>
		                    </h5>
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
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>