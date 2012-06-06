<div class = "row">
    <div class = "span8">
<?php
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
?>
		<div class = "page-header">
			<h1>Live Streams</h1>
		</div>
		<ul class="nav nav-tabs">
			<?php foreach($data as $streamProviders): ?>
			<li>
				<a href = "#stream-<?php echo $streamProviders['streamData']['name']; ?>" data-toggle = "tab">
					<?php echo $streamProviders['streamData']['name']; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach($data as $streamProviders): ?>
		<div id = "stream-<?php echo $streamProviders['streamData']['name']; ?>">
			<?php if (count($streamProviders['channels']) > 0): ?>
				<?php foreach($streamProviders['channels'] as $channel): ?>
				    <div class="live-stream">
						<h2><?php echo $channel->title; ?></h2>
						<div class = "pull-left embed-video">
							<?php echo $channel
								->channel
								->embed_code; 
							?>
						</div>
						<div>
							<span class="label label-info">
								<i class="icon-asterisk icon-white"></i>
								<?php echo $channel->meta_game; ?>
							</span>
						</div>
				    </div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>There are no shows online. Try later!</p>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>