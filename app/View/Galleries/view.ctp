<div class = "row">
    <div class = "span8">
	<?php
        if (! empty($actions) || $isOwner){
            echo '<div class = "well userActions">';
            // Si es dueño
            if (in_array('add', $actionsPhotos) || $isOwner){
                echo $this->Html->link(
                    '<i class="icon-plus icon-white"></i> Add Photos',
                    array('controller' => 'photos', 'action' => 'add', $id),
                    array(
                        'class' => array('btn', 'btn-primary', 'btn-large'),
                        'escape' => false
                    )
                );
            }
            // Si tiene permitido editar
            if (in_array('edit', $actions) || $isOwner){
                echo $this->Html->link(
                    '<i class="icon-pencil icon-white"></i> Edit',
                    array('action' => 'edit', $id),
                    array(
                        'class' => array('btn', 'btn-warning', 'btn-large'),
                        'escape' => false
                    )
                );
            }

            // Si tiene permitido borrar
            if (in_array('delete', $actions) || $isOwner){
                echo $this->Form->postLink(
                    '<i class="icon-trash icon-white"></i> Delete',
                    array('action' => 'delete', $id),
                    array(
                        'class' => array('btn', 'btn-danger', 'btn-large'),
                        'escape' => false
                    ),
                    'Are you sure?'
                );
            }
            echo "</div>";
        }
	?>
        <div class = "page-header">
            <h1>
                <?php echo $galeria['Gallery']['name'] ?>
            </h1>
        </div>
		<ul class ="thumbnails">
			<?php foreach ($galeria['Photos'] as $photo): ?>
			<li class = "span1">
				<div class = "thumbnail">
					<a rel = "all-the-photos" class = "fancybox" data-fancybox-type="ajax" href = "/photos/view/<?php echo $photo['id']; ?>">
    					<img src = "<?php echo $photo['url'] ?>" >
    				</a>
				</div>
			</li>
    		<?php endforeach; ?>
		</ul>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>