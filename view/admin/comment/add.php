<form action="" method="post" id="form">
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text" readonly class="form-control" placeholder="Auto">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">ID Product</label>
                <input type="text" name="id_product" id="id_product" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">ID User</label>
                <input type="text" name="id_user" id="id_user" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Nội dung</label>
                <textarea name="content_cmt" class="form-control" id="content_cmt" cols="30" rows="5"></textarea>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="col-3">
            <input type="submit" id="submit_add_cmt" name="submit" value="Submit" class="btn btn-outline-success">
            <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
            <input type="button" onclick="location.href='?module=category'" value="List" class="btn btn-outline-primary">
        </div>
    </div>
</form>