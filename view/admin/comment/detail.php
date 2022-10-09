<div class="mb-3 mt-3">
    <h1>Sản phẩm: <?= $name ?></h1>
</div>
<table class="table" id="example">
    <thead>
        <tr>
            <th></th>
            <th>Nội dung bình luận</th>
            <th>Thời gian bình luận</th>
            <th>Người bình luận</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($detail as $key => $value){
        ?>
        <tr>
            <td><input type="checkbox" class="checkbox" name="" id=""></td>
            <td><?= $value['content'] ?></td>
            <td><?= $value['time'] ?></td>
            <td><?= $value['username'] ?></td>
            <td><a href="<?= $url ?>&act=delete&id=<?= $value['id_cmt'] ?>" class="btn btn-danger">Del</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>