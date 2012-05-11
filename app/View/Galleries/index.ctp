<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'galleries'
        )) ?>
        <div class = "page-header">
            <h1>.: Galleries</h1>
        </div>
        <div class = "galleries-index">
        <?php foreach ($galleries as $gallery): ?>
        	<div class = "gallery-content">
        		<h2 class = "gallery-name">
        			<a href = "/galleries/view/<?php echo $gallery['Gallery']['id']; ?>">
	        			<?php echo $gallery['Gallery']['name'] ?>
	        		</a>
        		</h2>
        		<ul class ="thumbnails">
        			<?php $contador = 0; ?>
        			<?php foreach ($gallery['Photos'] as $photo): ?>
        			<?php
        				$contador++;
        				if ($contador == 5){
        					break;
        				}
        			?>
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
	    <?php endforeach; ?>
		</div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>