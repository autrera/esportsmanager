<div class = "row">
    <div class = "span8">
		<?php
	        // echo "<pre>";
	        // print_r($data);
	        // echo "</pre>";
		?>
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'streamsUsers'
        )) ?>
		<div class = "page-header">
			<h3>Live Streams</h3>
		</div>
		<ul class="nav nav-pills">
			<?php foreach($data as $key => $streamProviders): ?>
			<li class = "<?php echo ($key == 0)? 'active' : ''; ?>">
				<a href = "#stream-<?php echo $streamProviders['streamData']['name']; ?>" data-toggle = "pill">
					<?php echo $streamProviders['streamData']['name']; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach($data as $key => $streamProviders): ?>
		<div id = "stream-<?php echo $streamProviders['streamData']['name']; ?>">
			<?php if (count($streamProviders['channels']) > 0): ?>
				<?php foreach($streamProviders['channels'] as $channel): ?>
				    <div class="live-stream">
						<div class = "pull-left embed-video">
							<?php echo $channel
								->channel
								->embed_code;
							?>
						</div>
						<div>
							<h4><?php echo $channel->title; ?></h4>
							<div class = "label-container">
								<span class="label label-info">
									<i class="icon-asterisk icon-white"></i>
									<?php echo $channel->meta_game; ?>
								</span>
							</div>
							<div class = "label-container">
								<span class="label label-info">
									<i class="icon-user icon-white"></i>
									<?php echo $channel->channel->login; ?>
								</span>
							</div>
						</div>
				    </div>
				<?php endforeach; ?>
			<?php else: ?>
			<div class="alert alert-error">
				<strong>Oh snap!.</strong> There are no shows online. Try later!
			</div>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>
