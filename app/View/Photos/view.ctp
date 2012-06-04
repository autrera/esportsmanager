<div class = "row">
    <div class = "span8">
	<?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
	?>
		<div class = "page-header">
			<h1>
				<a href = "/galleries/view/<?php echo $foto['Galleries']['slug'] ?>">
					<?php echo $foto['Galleries']['name'] ?>
				</a>
			</h1>
		</div>
		<div class = "row photo-content">
			<div class = "span8">
				<ul class = "thumbnails">
					<li class = "thumbnail">
						<img src = "<?php echo $foto['Photo']['url']; ?>">
						<?php if (isset($foto['Photo']['name'])): ?>
						<h2><?php echo $foto['Photo']['name'] ?></h2>
						<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
		<div class = "row">
			<div class = "span2">
				<?php if (! empty($vecinos['prev'])): ?>
				<a class = "btn btn-primary btn-large" href = "/photos/view/<?php echo $vecinos['prev']['Photo']['id']; ?>">
					<i class="icon-chevron-left icon-white"></i> Back
				</a>
				<?php else: ?>
				&nbsp;
				<?php endif; ?>
			</div>
			<div class = "span4">&nbsp;</div>
			<div class = "span2">
				<?php if (! empty($vecinos['next'])): ?>
				<a class = "btn btn-primary btn-large pull-right" href = "/photos/view/<?php echo $vecinos['next']['Photo']['id']; ?>">
					<i class="icon-chevron-right icon-white"></i> Next
				</a>
				<?php else: ?>
				&nbsp;
				<?php endif; ?>
			</div>
		</div>
        <?php echo $this->element('facebook-comments'); ?>
	</div>
</div>
