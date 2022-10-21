<table class="table table-hover" id="example">
    <thead>
        <tr>
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
                <td><?= $value['name_prd'] ?> </td>
                <td><?= $value['so_luong'] ?></td>
                <td> <?= $value['moi_nhat'] ?></td>
                <td> <?= $value['cu_nhat'] ?></td>
                <td><button class="btn btn-secondary" onclick="location.href='<?= $url ?>&act=detail&id=<?= $value['id_prd'] ?>'">Detail</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>