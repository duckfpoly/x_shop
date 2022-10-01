<?php 
    // $url = $this->url ;
?>
<div class="mb-3 w-100 text-center">
    <button class="btn btn-outline-primary" onclick='selects()'>Checked All</button>
    <button class="btn btn-outline-info" onclick='deSelect()'>Unchecked All</button>
    <button class="btn btn-outline-danger">Delete Checked</button>
    <button onclick="location.href='<?= $url ?>&act=create'" class="btn btn-outline-success">Add New Products</button>
</div>
<table id="example" class="table table-hover nowrap" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount ( % )</th>
            <th>View</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (empty($read)) {
            echo '
                <tr class ="text-center">
                    <td colspan="9">Không có dữ liệu !</td>
                </tr>  
            ';
        } else { ?>
            <?php foreach ($read as $row => $values) {
                $price = $values['price'];
                $discount = $values['giam_gia'];
                if($discount == 0){
                    $total = $price;
                }
                else {
                    $tt = ($price * $discount)/100;
                    $total = $price - $tt;
                }
            ?>

                <tr>
                    <td><input type="checkbox" name="checkbox" class="checkbox"></td>
                    <td><?= $values['id_prd'] ?></td>
                    <td><?= $values['name_prd'] ?></td>
                    <td><?= number_format($values['price'], 0, '', ','); ?>&nbsp;VNĐ</td>
                    <td><?= $discount ?>%</td>
                    <td><?= $values['so_luot_xem'] ?></td>
                    <td><?= number_format($total, 0, '', ','); ?>&nbsp;VNĐ</td>
                    <td>
                        <a href="<?= $url ?>&act=detail&id=<?= $values['id_prd'] ?>" class="btn btn-dark">Detail</a>
                        &nbsp;
                        <a href="<?= $url ?>&act=update&id=<?= $values['id_prd'] ?>" class="btn btn-secondary">Edit</a>
                        &nbsp;<a href="<?= $url ?>&act=delete&id=<?= $values['id_prd'] ?>" class="btn btn-danger">Del</a></td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table