<div class = "row">
    <div class = "span8">
    <?php
        echo $this->element('indexActionsTop', array(
            'actions' => $actions,
            'isOwner' => $isOwner,
        ));
    ?>
        <div class = "modules-actions-users-view">
            <table class = "table table-striped">
                <thead>
                    <tr>
                        <th>Module</th>
                        <th>User</th>
                        <th>Permission</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $permiso['Modules']['name']; ?></td>
                        <td>
                            <a href = "/users/view/<?php echo $permiso['Users']['id']; ?>">
                                <?php echo $permiso['Users']['nickname']; ?>
                            </a>
                        </td>
                        <td><?php echo $permiso['Actions']['name']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>