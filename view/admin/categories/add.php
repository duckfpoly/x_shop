<form action="" method="post" id="form">
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="form-group mb-3">
                <label for="" class="form-label">ID</label>
                <input type="text" readonly class="form-control" placeholder="Auto">
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-around">
        <div class="col-3">
            <input type="submit" id="submit_add_cate" name="submit" value="Submit" class="btn btn-outline-success">
            <input type="button" onclick="document.getElementById('from').reset()" value="Reset" id="reset_form" class="btn btn-outline-info">
            <input type="button" onclick="location.href='?module=categories'" value="List" class="btn btn-outline-primary">
        </div>
    </div>
</form>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
    }
?>