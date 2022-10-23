<div class="mb-3 w-100 text-center">
    <button onclick="location.href='<?= $url ?>&act=create'" class="btn btn-outline-success">Add New User</button>
</div>
<table id="example" class="table nowrap" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Image</th>
            <th>Status</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    <tbody>
        <?php
        if (empty($read)) {
            echo '
                <tr class ="text-center">
                    <td colspan="9">Không có dữ liệu !</td>
                </tr>  
            ';
        } else { ?>
            <?php $i = 0; foreach ($read as $row => $values) { $i++ ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $values['username'] ?></td>
                    <td><?= $values['email'] ?></td>
                    <td><?= $values['name'] ?></td>
                    <td> <img class="rounded" height="100px" width="100px" src="assets/uploads/admin/user/<?= $values['image'] ?>" alt=""> </td>
                    <td>
                        <?= $values['active'] == 0
                        ? '<p class="text-center rounded text-light bg-success">Active</p>' 
                        : '<p class="text-center rounded text-dark bg-warning">Not Activated</p>' ?>
                    </td>
                    <td>
                        <?= $values['vaitro'] == 1
                        ? '<p class="text-center rounded text-light bg-dark">Admin</p>' 
                        : '<p class="text-center rounded text-dark bg-light">Client</p>' ?>
                    </td>
                    <td>
                        <?= $values['ID'] == 1 ? "" : '<a href="'.$url.'&act=update&id='.$values['ID'].'" class="btn btn-secondary">Edit</a>&nbsp;<a href="'.$url.'&act=delete&id='.$values['ID'].'" class="btn btn-danger">Del</a>'?>
                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
    </thead>
</table>