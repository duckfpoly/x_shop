<div class="mb-3 mt-3">
    <h1>Sản phẩm: <?= $name ?></h1>
</div>
<table class="table" id="example">
    <thead>
        <tr>
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
            <td><?= $value['content'] ?></td>
            <td><?= $value['time'] ?></td>
            <td><?= $value['name_client'] ?></td>
            <td><a onclick="return confirm('Bạn chắc chắn muốn xóa cmt này ?')" href="<?= $url ?>&act=delete&id=<?= $value['id_cmt'] ?>" class="btn btn-danger">Del</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>