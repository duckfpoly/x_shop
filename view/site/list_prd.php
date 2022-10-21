<?php
$name_cate   = $this->cate->read();
foreach ($name_cate as $key => $value) {
    echo $value['id_cate'];
    $prd       = $this->product->products_with_cate($value['id_cate']);
?>
    <div class="card">
        <div class="card-header">
            <h2><?= $value['name_cate'] ?></h2>
        </div>
        <div class="card-body">
            <?php foreach ($prd as $key => $data) { ?>
                <?= $data['id_prd'] ?>
            <?php }?>
        </div>
        <div class="card-footer">

        </div>
    </div>
<?php } ?>