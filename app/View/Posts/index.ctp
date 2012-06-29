<?php
    App::uses('utilities', 'Lib');
?>
<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'posts'
        )) ?>
        <div class="page-header">
            <h1>.: Posts <small>people sharing rants and joy</small></h1>
        </div>
	    <?php foreach ($posts as $post): ?>
	    <div class = "posts-container">
	    	<div class="post-wrapper">
	    		<h2 class="post-title">
	    			<a href="/posts/view/<?php echo $post['Post']['slug']; ?>">
		    			<?php echo $post['Post']['title']; ?>
	    			</a>
	    		</h2>
	    		<div class="post-info">
                    <?php echo $this->element('userLink', array(
                        'nickname' => $post['Users']['nickname'],
                        'user_id' => $post['Users']['id'],
                    )); ?>
                    <?php echo $this->element('timeStampLabel', array(
                        'timestamp' => $post['Post']['created'],
                        'format' => 'd/m/Y - H:i'
                    )); ?>
                    <?php echo $this->element('viewsLabel', array(
                        'views' => $post['Post']['counter'],
                    )); ?>
	    		</div>
	    		<div class="post-content">
	    			<p><?php echo utilities::tokenTruncate($post['Post']['content'], 100); ?></p>
	    		</div>
	    	</div>
	    </div>
	    <?php endforeach; ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>