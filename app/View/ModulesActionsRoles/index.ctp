<div class = "row">
    <div class = "span8">
        <?php echo $this->element('addButton', array(
            'actions' => $actions,
            'controller' => 'ModulesActionsRoles'
        )) ?>
        <div class = "page-header">
            <h1>.: Permissions by Roles</h1>
        </div>
        <div class = "modules-actions-roles-index">
            <table class = "table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Module</th>
                        <th>Role</th>
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
                            <a href = "/roles/view/<?php echo $permiso['Roles']['id']; ?>">
                                <?php echo $permiso['Roles']['name']; ?>
                            </a>
                        </td>
                        <td><?php echo $permiso['Actions']['name']; ?></td>
                        <td>
                            <a href = "/ModulesActionsRoles/view/<?php echo $permiso['ModulesActionsRole']['id']; ?>" 
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