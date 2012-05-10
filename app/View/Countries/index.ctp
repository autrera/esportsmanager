<div class = "row">
    <div class = "span8">
        <div class = "page-header">
            <h1>Countries List</h1>
        </div>
        <div class = "paises">
        <?php foreach ($countries as $data): ?>
            <a class = "btn btn-primary btn-large pais" href = "/countries/view/<?php echo $data['Country']['id']; ?>"
            >
                <?php if ($data['Country']['flag']): ?>
                <span>
                    <img src = "<?php echo $data['Country']['flag']; ?>" >
                </span>
                <?php endif; ?>
                <?php echo $data['Country']['name']; ?>
            </a>
        <?php endforeach;?>
        </div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>