<div class="mb-3 w-100 text-center">
    <button onclick="location.href='<?= $url ?>&act=create'" class="btn btn-outline-success">Add New Products</button>
</div>
<table id="example" class="table table-hover display nowrap" width="100%" >
    <thead>
        <tr>
            <th></th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        if (empty($read)) {
            echo '
                <tr class ="text-center">
                    <td colspan="9">Không có dữ liệu !</td>
                </tr>  
            ';
        } else { ?>
            <?php foreach ($read as $row => $values) {
                $total = total($values['price'],$values['giam_gia']);
                $i++;
            ?>
                <tr class="<?= $values['dac_biet'] == 1 ? "bg-light" : "" ?>">
                    <td><?= $i ?></td>
                    <td><img width="50px" src="assets/uploads/admin/products/<?= $values['image'] ?>" alt=""></td>
                    <td><?= $values['name_prd'] ?></td>
                    <td><?= number_format($values['price'], 0, '', ','); ?>&nbsp;VNĐ</td>
                    <!-- <td><?= $values['giam_gia'] ?>%</td> -->
                    <!-- <td><?= $values['so_luot_xem'] ?></td> -->
                    <!-- <td><?= number_format($total, 0, '', ','); ?>&nbsp;VNĐ</td> -->
                    <td>
                        <a href="<?= $url ?>&act=detail&id=<?= $values['id_prd'] ?>" class="btn btn-dark">Detail</a>
                        &nbsp;
                        <a href="<?= $url ?>&act=update&id=<?= $values['id_prd'] ?>" class="btn btn-secondary">Edit</a>
                        &nbsp;<a onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này ?')" href="<?= $url ?>&act=delete&id=<?= $values['id_prd'] ?>" class="btn btn-danger">Del</a>
                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>