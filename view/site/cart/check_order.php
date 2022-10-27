<section class="trending_items pt-5">
    <div class="container">
        <div class="row">
            <form method="post">
                <div class="search" style="border-radius: 20px; margin: 0px auto;">
                    <input type="text" name="key" id="" placeholder="Nhập mã đơn hàng ..." class="search__input " style="border: none" value="<?= isset($key) == true ? $key : "" ?>">
                    <button type="submit" style="border-radius: 20px;" class="search__button" tabIndex="-1">Search</button>
                </div>
            </form>
        </div>
        <div class="mt-5">
            <?php if (isset($orders)) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Trạng thái đơn hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $key => $values) { ?>
                            <tr>
                                <td><?= $values['order_code'] ?></td>
                                <td><?= $values['order_date'] ?></td>
                                <td><?= number_format($values['total'], 0, '', ',');  ?>₫</td>
                                <td><?= $values['order_status'] == 0 ? "Chưa thanh toán" : "Đã thanh toán" ?></td>
                                <td>Chờ lấy hàng</td>
                                <td><button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn">Chi tiết</button></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLongTitle">Chi tiết đơn hàng</h3>
                                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <section class="h-100 gradient-custom">
                                    <div class="container h-100">
                                        <div class="row d-flex justify-content-center align-items-center h-100">
                                            <div class="col-lg-12 col-xl-8">
                                                <div style="border-radius: 10px;">
                                                    <div class="mb-3">
                                                        <h5 class="text-muted mb-0">Thanks for your Order, 
                                                        </h5>
                                                    </div>
                                                    <div>
                                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                                            <p class="lead fw-normal mb-0" style="color: #a8729a;">Order Code</p>
                                                            <p class="fw-bold text-muted mb-0"><?= $values['order_code'] ?></p>
                                                        </div>
                                                        <div class="shadow-0 border mb-4">
                                                            <div class="card-body">
                                                                <?php foreach ($order_details as $key => $items) { 
                                                                    $total_item = $items['product_quantity'] * $items['price'];
                                                                ?>
                                                                <div class="row m-2">
                                                                    <div class="col-md-2">
                                                                        <img src="assets/uploads/admin/products/<?= $items['image'] ?>" class="img-fluid" alt="">
                                                                    </div>
                                                                    <div class="col-md-6 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0"><?= $items['name_prd'] ?></p>
                                                                    </div>
                                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0 small">SL: <?= $items['product_quantity'] ?></p>
                                                                    </div>
                                                                    <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                                        <p class="text-muted mb-0 small"><?= number_format($total_item, 0, '', ',');  ?>₫</p>
                                                                    </div>
                                                                </div>
                                                                <hr class="" style="background-color: #e0e0e0; opacity: 1;">
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                            <p class="lead fw-normal mb-0" style="color: #a8729a;">Order Detail</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between pt-2">
                                                            <p class="text-muted mb-0"><span class="fw-bold">Hình thức thanh toán</span> : <?= $values['order_method'] == 0 ? "Thanh toán khi nhận hàng" : "Giao dịch chuyển khoản"  ?></p>
                                                        </div>
                                                        <?php foreach ($customer as $key => $data) { ?>
                                                            <div class="d-flex justify-content-between pt-2">
                                                                <p class="text-muted mb-0"><span class="fw-bold">Địa chỉ nhận hàng</span> : <?= $data['address_detail']  ?></p>
                                                            </div>
                                                            <div class="d-flex justify-content-between pt-2">
                                                                <p class="text-muted mb-0"><span class="fw-bold">Người nhận</span> : <?= $data['name']  ?></p>
                                                            </div>
                                                            <div class="d-flex justify-content-between pt-2">
                                                                <p class="text-muted mb-0"><span class="fw-bold">Số điện thoại</span> : xxxxxxx<?= substr($data['phone'], 7)  ?></p>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="pt-2">
                                                            <p class="text-muted mb-3 fw-bold">Track order</p>
                                                            <div class="col-12">
                                                                <div class="progress" style="height: 6px; border-radius: 16px;">
                                                                    <div class="progress-bar" role="progressbar" style="width: 14%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <div class="d-flex justify-content-around mb-1">
                                                                    <?= $values['order_method'] == 1 ? '<p class="text-muted mt-1 mb-0 small ms-xl-5">Chờ thanh toán</p>' : "" ?>
                                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Chờ xác nhận</p>
                                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Chờ lấy hàng</p>
                                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Đang giao</p>
                                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Đã giao</p>
                                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Đã thanh toán</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                                    <div class="card-footer border-0 px-4 py-5" style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                                        <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Tổng tiền thanh toán: <span class="h2 mb-0 ms-2"><?= number_format($values['total'], 0, '', ',');  ?>₫</span></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </section>
                            </div>
                            <div class="modal-footer">
                                <a onclick="return confirm('Hủy đơn hàng ?')" href="#" class="btn btn-danger">Hủy đơn hàng</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else {
            } ?>
        </div>
    </div>
</section>
<style>
    .search {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        max-width: 620px;
        width: 100%;
        border: 1px solid #ddd;
        overflow: hidden;
        transition: 0.3s;
        height: 60px;
    }

    .search>* {
        border: none;
        outline: none;
    }

    .search__input {
        padding: 0 15px;
        height: 100%;
        width: calc(100% - 120px);
        font-size: 18px;
        box-sizing: border-box;
    }

    .search__input:not(:placeholder-shown)+.search__button {
        transform: translateY(0px);
    }

    .search__input:placeholder-shown+.search__button {
        transform: translateY(60px);
    }

    .search__button {
        background: #333;
        color: #feffd4;
        font-size: 15px;
        cursor: pointer;
        width: 100px;
        height: calc(100% - 20px);
        transition: 0.3s;
        position: absolute;
        right: 10px;
        top: 10px;
    }

    .search:focus-within {
        transform: translateY(-4px);
        border-color: #bbb;
        box-shadow: 4px 4px 0 #ddd, 8px 8px 0 #fcff88;
    }
</style>