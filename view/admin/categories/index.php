<div class="mb-3 w-100 text-center">
    <button onclick="location.href='<?= $url ?>&act=create'" class="btn btn-outline-success">Add New Category</button>
</div>
    <table class="table" id="example">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <tbody>
                <?php 
                $i = 0;
                if(empty($read)){ 
                    echo '
                        <tr class ="text-center">
                            <td colspan="9">Không có dữ liệu !</td>
                        </tr>  
                    ';
                } else { ?>
                <?php foreach ($read as $row => $values) { $i++ ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $values['name_cate'] ?></td>
                        <td><a href="<?= $url ?>&act=update&id=<?= $values['id_cate'] ?>" class="btn btn-secondary">Edit</a>&nbsp;<a onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này ?')" href="<?= $url ?>&act=delete&id=<?= $values['id_cate'] ?>" class="btn btn-danger">Del</a></td>
                    </tr>
                <?php } } ?>
            </tbody>
        </thead>
    </table>