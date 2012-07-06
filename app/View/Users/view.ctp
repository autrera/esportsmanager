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
				<?php
                    echo $this->element('profile-pic', array(
                        'profilePic' => $usuario['Profile']['picture'],
                        'profileId'  => $usuario['Profile']['id'],
                        'size' => 220,
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
					<?php if ($usuario['Profile']['birthdate']): ?>
					<dt>Birthdate: </dt>
					<dd>
						<?php echo utilities::formatDate(
							$usuario['Profile']['birthdate']
						); ?>
					</dd>
					<?php endif; ?>
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
				<?php if (   $isProfileOwner 
						  || in_array('add', $profileActions) 
						  || in_array('edit', $profileActions)
					  ): 
				?>
					<?php if (! empty($usuario['Profile']['id'])): ?>
						<?php if (   $isProfileOwner 
								  || in_array('edit', $profileActions)): 
						?>
						<div>
							<a href = "/profiles/edit/<?php echo $usuario['Profile']['id'] ?>" class = "btn btn-warning	pull-right">
								Edit this profile
							</a>
						</div>
						<?php endif; ?>
					<?php else: ?>
						<?php if (in_array('add', $profileActions)): ?>
						<div>
							<a href = "/profiles/add/<?php echo $id; ?>" class = "btn btn-primary 
								btn-mini pull-right">
								Add a profile
							</a>
						</div>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class = "row">
			<div class = "span8">
				<div class = "page-header">
					<h1>From this User</h1>
				</div>
				<ul class = "thumbnails">
					<li class = "span4">
						<div class = "tuhmbnail latest-user-posts user-activity">
							<h2>Latest Posts</h2>
							<?php if (!empty($latestPosts)): ?>
							<?php foreach ($latestPosts as $post): ?>
							<div class = "user-post">
								<h4>
									<a href = "/posts/view/<?php echo $post['Post']['slug']; ?>">
										<?php echo utilities::tokenTruncate($post['Post']['title'], 50); ?>
									</a>
								</h4>
							</div>
							<?php endforeach; ?>
							<?php else: ?>
							<p>No posts have been added by this user.</p>
							<?php endif; ?>
						</div>
					</li>
					<li class = "span4">
						<div class = "tuhmbnail latest-user-videos user-activity">
							<h2>Latest Videos</h2>
							<?php if (!empty($latestVideos)): ?>
							<?php foreach ($latestVideos as $video): ?>
							<div class = "user-video">
								<h3>
									<a href = "/videos/view/<?php echo $video['Video']['slug']; ?>">
										<?php echo $video['Video']['name']; ?>
									</a>
								</h3>
							</div>
							<?php endforeach; ?>
							<?php else: ?>
							<p>No videos have been added by this user.</p>
							<?php endif; ?>
						</div>
					</li>
					<li class = "span4">
						<div class = "thumbnail latest-user-news user-activity">
							<h2>Latest News</h2>
							<?php if (!empty($latestNews)): ?>
							<?php foreach ($latestNews as $new): ?>
							<div class = "user-news">
								<h3>
									<a href = "/news/view/<?php echo $new['News']['slug']; ?>">
										<?php echo $new['News']['title']; ?>
									</a>
								</h3>
							</div>
							<?php endforeach; ?>
							<?php else: ?>
							<p>No news have been added by this user.</p>
							<?php endif; ?>
						</div>
					</li>
					<li class = "span4">
						<div class = "thumbnail latest-user-galleries user-activity">
							<h2>Latest Galleries</h2>
							<?php if (!empty($latestGalleries)): ?>
							<?php foreach ($latestGalleries as $gallery): ?>
							<div class = "user-gallery">
								<h3>
									<a href = "/galleries/view/<?php echo $gallery['Gallery']['id']; ?>">
										<?php echo $gallery['Gallery']['name']; ?>
									</a>
								</h3>
							</div>
							<?php endforeach; ?>
							<?php else: ?>
							<p>No galleries have been added by this user.</p>
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
    <?php echo $this->element('sidebar'); ?>
</div>
