<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'galleries'
        )) ?>
        <div class = "page-header">
            <h3>.: Galleries</h3>
        </div>
        <div class = "galleries-index">
        <?php foreach ($galleries as $gallery): ?>
        	<div class = "gallery-content">
        		<h4 class = "gallery-name">
        			<a href = "/galleries/view/<?php echo $gallery['Gallery']['slug']; ?>">
	        			<?php echo $gallery['Gallery']['name'] ?>
	        		</a>
        		</h4>
        		<ul>
        			<?php foreach ($gallery['Photos'] as $key => $photo): ?>
        			<?php
        				if ($key == 12){
        					break;
        				}
        			?>
        			<li>
        				<div>
    						<a class = "fancybox" data-fancybox-type="ajax" href = "/photos/view/<?php echo $photo['id']; ?>">
                                <?php echo $this->element('responsiveImg', array('url' => $photo['url'], 'class' => 'enlarger')); ?>
	        				</a>
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
