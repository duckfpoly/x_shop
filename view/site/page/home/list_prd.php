<div class="m-5">
    <div class="card-header bg-transparent">
        <h3 class="fw-bold"><?= $value['name_cate'] ?></h3>
    </div>
    <div class="card-body d-flex justify-content-around flex-wrap">
        <?php foreach ($prd as $key => $data) { 
                $total = total($data['price'], $data['giam_gia']);
        ?>
            <div class="product-card">
                <?= $data['giam_gia'] != 0 ? '<div class="badge">Sale</div>' : '' ?>
                <a href="shop?req=detail&id=<?= $data['id_prd'] ?>">
                    <div class="product-tumb">
                        <img src="assets/uploads/admin/products/<?= $data['image'] ?>" alt="">
                    </div>
                </a>
                <div class="product-details">
                    <span class="product-catagory"><?= $value['name_cate'] ?></span>
                    <h4><a href="shop?req=detail&id=<?= $data['id_prd'] ?>"><?= $data['name_prd'] ?></a></h4>
                    <p class="d-inline-block text-truncate" style="max-width: 150px"><?= $data['description'] ?></p>
                    <div class="product-bottom-details">
                        <div class="product-price"><small class="text-dark">- <?= $data['giam_gia'] ?>%</small ><?= number_format($total, 0, '', ','); ?>₫</div>
                        <div class="product-links">
                            <?= $data['so_luong'] > 0 
                            ? '<small class="text-success"><i class="fa-solid fa-check"></i>&nbsp;Còn hàng</small>' 
                            : '<small class="text-secondary"><i class="fa-solid fa-phone"></i>&nbsp;Liên hệ</small>' ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<style>
    .product-card {
        width: 380px;
        position: relative;
        box-shadow: 0 2px 7px #dfdfdf;
        margin: 50px auto;
        background: #fafafa;
    }

    .badge {
        position: absolute;
        left: 0;
        top: 20px;
        text-transform: uppercase;
        font-size: 13px;
        font-weight: 700;
        background: red;
        color: #fff;
        padding: 3px 10px;
    }

    .product-tumb {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 300px;
        padding: 50px;
        background: #f0f0f0;
    }

    .product-tumb img {
        max-width: 100%;
        max-height: 100%;
    }

    .product-details {
        padding: 30px;
    }

    .product-catagory {
        display: block;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        color: #ccc;
        margin-bottom: 18px;
    }

    .product-details h4 a {
        font-weight: 500;
        display: block;
        margin-bottom: 18px;
        text-transform: uppercase;
        color: #363636;
        text-decoration: none;
        transition: 0.3s;
    }

    .product-details h4 a:hover {
        color: #fbb72c;
    }

    .product-details p {
        font-size: 15px;
        line-height: 22px;
        margin-bottom: 18px;
        color: #999;
    }

    .product-bottom-details {
        overflow: hidden;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }

    .product-bottom-details div {
        float: left;
        width: 50%;
    }

    .product-price {
        font-size: 18px;
        color: #fbb72c;
        font-weight: 600;
    }

    .product-price small {
        font-size: 80%;
        font-weight: 400;
        text-decoration: line-through;
        display: inline-block;
        margin-right: 5px;
    }

    .product-links {
        text-align: right;
    }

    .product-links a {
        display: inline-block;
        margin-left: 5px;
        color: #e1e1e1;
        transition: 0.3s;
        font-size: 17px;
    }

    .product-links a:hover {
        color: #fbb72c;
    }
</style>