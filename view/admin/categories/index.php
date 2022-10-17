<div class="mb-3 w-100 text-center">
    <button class="btn btn-outline-primary" onclick='selects()' >Checked All</button>
    <button class="btn btn-outline-info"  onclick='deSelect()' >Unchecked All</button>
    <button onclick="location.href='<?= $url ?>&act=delete_checked'" type="submit" class="btn btn-outline-danger">Delete Checked</button>
    <button onclick="location.href='<?= $url ?>&act=create'" class="btn btn-outline-success">Add New Category</button>
</div>
    <table class="table" id="example">
        <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <tbody>
                <?php 
                if(empty($read)){ 
                    echo '
                        <tr class ="text-center">
                            <td colspan="9">Không có dữ liệu !</td>
                        </tr>  
                    ';
                } else { ?>
                <?php foreach ($read as $row => $values) { ?>
                    <tr>
                        <td><input type="checkbox" class="checkbox" name="checkbox" id="select_cate" value="<?= $values['id_cate'] ?>" ></td> 
                        <td><?= $values['id_cate'] ?></td>
                        <td><?= $values['name_cate'] ?></td>
                        <td><a href="<?= $url ?>&act=update&id=<?= $values['id_cate'] ?>" class="btn btn-secondary">Edit</a>&nbsp;<a href="<?= $url ?>&act=delete&id=<?= $values['id_cate'] ?>" class="btn btn-danger">Del</a></td>
                    </tr>
                <?php } } ?>
            </tbody>
        </thead>
    </table>