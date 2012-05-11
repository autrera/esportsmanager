<div class = "row">
    <div class = "span8">
	<?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
	?>
        <div class = "page-header">
            <h1><?php echo $galeria['Gallery']['name'] ?></h1>
        </div>
		<ul class ="thumbnails">
			<?php foreach ($galeria['Photos'] as $photo): ?>
			<li class = "span2">
				<div class = "thumbnail">
					<a href = "/photos/view/<?php echo $photo['id']; ?>">
    					<img src = "<?php echo $photo['url'] ?>" >
    				</a>
					<h5>
						<a href = "/photos/view/<?php echo $photo['id']; ?>">
    						<?php echo $photo['name']; ?>
    					</a>
					</h5>
				</div>
			</li>
    		<?php endforeach; ?>
		</ul>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>