<?php
	$secciones = array(
		array(
			'name' => 'Countries',
			'url' => '/countries',
			'icon' => 'flag',
		),
		array(
			'name' => 'Games',
			'url' => '/games',
			'icon' => 'play-circle',
		),
		array(
			'name' => 'Roles',
			'url' => '/roles',
			'icon' => 'user',
		),
		// array(
		// 	'name' => 'Streams',
		// 	'url' => '/streams',
		// 	'icon' => 'facetime-video',
		// ),
	);
?>
<div class = "row">
	<div class = "span8">
		<div class = "row">
			<div class = "span8">
				<div class = "page-header">
					<h1>.: Misc</h1>
				</div>
			</div>
		</div>
		<div class = "row">
			<div class = "span8">
				<ul class = "thumbnails">
					<?php foreach ($secciones as $seccion): ?>
					<li class = "span2">
						<div class = "thumbnail shortcut">
							<a href = "<?php echo $seccion['url']; ?>">
								<i class="icon-<?php echo $seccion['icon']; ?>"></i>
								<?php echo $seccion['name']; ?>
							</a>
						</div>
					</li>
					<?php endforeach; ?>
					<?php if (in_array('view', $actionsOfRoles)): ?>
					<li class = "span2">
						<div class = "thumbnail shortcut">
							<a href = "/ModulesActionsRoles">
								<i class="icon-lock"></i>
								Actions by Roles
							</a>
						</div>
					</li>
					<?php endif; ?>
					<?php if (in_array('view', $actionsOfUsers)): ?>
					<li class = "span2">
						<div class = "thumbnail shortcut">
							<a href = "/ModulesActionsUsers">
								<i class="icon-lock"></i>
								Actions by Users
							</a>
						</div>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php echo $this->element('sidebar'); ?>
</div>
