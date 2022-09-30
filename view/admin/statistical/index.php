<div class="mb-3 w-100 text-center">
    <button onclick="location.href='<?= $url ?>&act=chart'" class="btn btn-outline-success">View Chart</button>
</div>
<table class="table" id="example">  
    <thead>
        <tr>
            <th>Product Type</th>
            <th>Amount</th>
            <th>Max Price</th>
            <th>Min Price</th>
            <th>Avg Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $read as $key => $value ) { ?>
        <tr>
            <td><?= $value['name_cate'] ?></td>
            <td><?= $value['so_luong'] ?></td>
            <td><?= number_format($value['price_max'], 0, '', ',') ?>&nbsp;VNĐ</td>
            <td><?= number_format($value['price_min'], 0, '', ',') ?>&nbsp;VNĐ</td>
            <td><?= number_format($value['price_avg'], 0, '', ',') ?>&nbsp;VNĐ</td>
        </tr>
        <?php } ?>
    </tbody>
</table>