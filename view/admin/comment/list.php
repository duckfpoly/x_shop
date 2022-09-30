<div class="mb-3 w-100 text-center">
    <button class="btn btn-outline-primary" onclick='selects()' >Checked All</button>
    <button class="btn btn-outline-info"  onclick='deSelect()' >Unchecked All</button>
    <button onclick="location.href='<?= $url ?>&act=delete_checked'" type="submit" class="btn btn-outline-danger">Delete Checked</button>
    <button onclick="location.href='<?= $url ?>&act=create'" class="btn btn-outline-success">Add New Comment</button>
</div>
<table class="table table-hover" id="example">
    <thead>
        <tr>
            <th></th>
            <th>Sản phẩm</th>
            <th>Số bình luận</th>
            <th>Mới nhất</th>
            <th>Cũ nhất</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($list as $key => $value){?>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td><?= $value['name_prd'] ?> </td>
                <td><?= $value['so_luong'] ?></td>
                <td> <?= $value['moi_nhat'] ?></td>
                <td> <?= $value['cu_nhat'] ?></td>
                <td><button class="btn btn-secondary" onclick="location.href='<?= $url ?>&act=detail&id=<?= $value['id_prd'] ?>'">Detail</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>