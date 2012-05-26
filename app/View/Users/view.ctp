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
		<div class = "row">
			<div class = "span3">
				<?php if ($usuario['Profile']['picture']): ?>
				<img src = "<?php echo $usuario['Profile']['picture']; ?>">
				<?php endif; ?>
				&nbsp;
			</div>
			<div class = "span5">
				<dl class = "dl-horizontal">
					<dt>Nickname: </dt>
					<dd><?php echo $usuario['User']['nickname']; ?></dd>
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
					<dt>Role: </dt>
					<dd><?php echo $usuario['Roles']['name']; ?></dd>
					<dt>Member Since: </dt>
					<dd>
						<?php echo utilities::formatDate(
							$usuario['User']['created']
						); ?>
					</dd>
					<?php if ($usuario['Teams']['id']): ?>
					<dt>Team: </dt>
					<dd>
						<a href = "/teams/view/<?php echo $usuario['Teams']['id'] ?>">
							<?php echo $usuario['Teams']['name']; ?>
						</a>
					</dd>
					<?php endif; ?>
					<dt>Description: </dt>
					<dd><?php echo $usuario['Profile']['description']; ?></dd>
					<dt>Social Sites: </dt>
					<dd>
						<?php echo $this->element('UserSocialLinks.ctp', array(
							'facebook_id'=>$usuario['Profile']['facebook_id'],
							'twitter_id' =>$usuario['Profile']['twitter_id'],
							'gplus_id'   =>$usuario['Profile']['gplus_id'],
						)); ?>
					</dd>
				</dl>
				<?php if ($usuario['User']['id'] == $loggedUserId): ?>
				<div>
					<a href = "/profiles/edit/<?php echo $usuario['Profile']['id'] ?>" class = "btn btn-primary btn-mini pull-right">
						Edit your profile
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<div class = "row">
			<div class = "page-header">
				<h1>From this User</h1>
			</div>
			<div class = "span8">
				<div class = "row">
					<?php if (!empty($latestVideos)): ?>
					<div class = "span4 latest-user-videos">
						<h2>Latest Videos</h2>
						<?php foreach ($latestVideos as $video): ?>
						<div class = "user-video">
							<h3>
								<a href = "/videos/view/<?php echo $video['Video']['slug']; ?>">
									<?php echo $video['Video']['name']; ?>
								</a>
							</h3>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<?php if (!empty($latestNews)): ?>
					<div class = "span4 latest-user-news">
						<h2>Latest News</h2>
						<?php foreach ($latestNews as $new): ?>
						<div class = "user-news">
							<h3>
								<a href = "/news/view/<?php echo $new['News']['slug']; ?>">
									<?php echo $video['News']['title']; ?>
								</a>
							</h3>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<?php if (!empty($latestGalleries)): ?>
					<div class = "span4 latest-user-galleries">
						<h2>Latest Galleries</h2>
						<?php foreach ($latestGalleries as $gallery): ?>
						<div class = "user-gallery">
							<h3>
								<a href = "/galleries/view/<?php echo $gallery['Gallery']['id']; ?>">
									<?php echo $gallery['Gallery']['name']; ?>
								</a>
							</h3>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>	
			</div>
		</div>
	</div>
    <?php echo $this->element('sidebar'); ?>
</div>
