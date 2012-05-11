<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'ModulesActionsUsers'
        )) ?>
        <div class = "page-header">
            <h1>.: Permissions by Users</h1>
        </div>
        <div class = "modules-actions-users-index">
            <table class = "table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Module</th>
                        <th>User</th>
                        <th>Permission</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 1; ?>
                    <?php foreach ($permisos as $permiso): ?>
                    <tr>
                        <td><?php echo $contador++; ?></td>
                        <td><?php echo $permiso['Modules']['name']; ?></td>
                        <td>
                            <a href = "/users/view/<?php echo $permiso['Users']['id']; ?>">
                                <?php echo $permiso['Users']['nickname']; ?>
                            </a>
                        </td>
                        <td><?php echo $permiso['Actions']['name']; ?></td>
                        <td>
                            <a href = "/ModulesActionsUsers/view/<?php echo $permiso['ModulesActionsUser']['id']; ?>" 
                                class = "btn btn-primary btn-mini">
                                View
                                <i class="icon-chevron-right icon-white"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo $this->element('sidebar'); ?>
</div>