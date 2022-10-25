<div class="mt-5 container">
    <?php if (isset($order)) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order as $key => $values) { ?>
                    <tr>
                        <td><?= $values['order_code'] ?></td>
                        <td><?= $values['order_date'] ?></td>
                        <td><?= number_format($values['total'], 0, '', ',');  ?>₫</td>
                        <td><?= $values['order_status'] == 0 ? "Chưa thanh toán" : "Đã thanh toán" ?></td>
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
                    <?php foreach($detail_order as $data => $items) { ?>
                        <div class="modal-body">
                            <section class="h-100 gradient-custom">
                                <div class="container h-100">
                                    <div class="row d-flex justify-content-center align-items-center h-100">
                                        <div class="col-lg-12 col-xl-8">
                                            <div style="border-radius: 10px;">
                                                <div class="mb-3">
                                                    <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;"><?= $items['name'] ?></span>!</h5>
                                                </div>
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Order Code</p>
                                                        <p class="fw-bold text-muted mb-0"><?= $items['order_code'] ?></p>
                                                    </div>
                                                    <div class="shadow-0 border mb-4">
                                                        <div class="card-body">
                                                            <div class="row">
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
                                                                    <p class="text-muted mb-0 small"><?= number_format($items['price'], 0, '', ',');  ?>₫</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <p class="lead fw-normal mb-0" style="color: #a8729a;">Order Detail</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-2">
                                                        <p class="text-muted mb-0"><span class="fw-bold">Hình thức thanh toán</span> : <?= $items['order_method'] == 0 ? "Thanh toán khi nhận hàng" : "Giao dịch chuyển khoản"  ?></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-2">
                                                        <p class="text-muted mb-0"><span class="fw-bold">Địa chỉ nhận hàng</span> : <?= $items['address_detail']  ?></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-2">
                                                        <p class="text-muted mb-0"><span class="fw-bold">Người nhận</span> : <?= $items['name']  ?></p>
                                                    </div>
                                                    <div class="d-flex justify-content-between pt-2">
                                                        <p class="text-muted mb-0"><span class="fw-bold">Số điện thoại</span> : <?= $items['phone']  ?></p>
                                                    </div>
                                                    <div class="pt-2">
                                                        <p class="text-muted mb-3 fw-bold">Track order</p>
                                                        <div class="col-12">
                                                            <div class="progress" style="height: 6px; border-radius: 16px;">
                                                                <div class="progress-bar" role="progressbar" style="width: 14%; border-radius: 16px; background-color: #a8729a;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <div class="d-flex justify-content-around mb-1">
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
                                                    <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Tổng tiền thanh toán: <span class="h2 mb-0 ms-2"><?= number_format($items['total'], 0, '', ',');  ?>₫</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </div>
                    <?php } ?>
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