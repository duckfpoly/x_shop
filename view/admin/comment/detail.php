<div class="mb-3 mt-3">
    <h1>Sản phẩm: <?= $name ?></h1>
</div>
<!-- <div class="mb-3 mt-3">
    <button class="btn btn-outline-primary" onclick='selects()' >Checked All</button>
    <button class="btn btn-outline-info"  onclick='deSelect()' >Unchecked All</button>
    <button onclick="" type="submit" class="btn btn-outline-danger">Delete Checked</button>
</div> -->
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
            <td><?= $value['comment_time'] ?></td>
            <td><?= $value['username'] ?></td>
            <td><a href="?module=comment&act=delete&id=<?= $value['id_cmt'] ?>" class="btn btn-danger">Del</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>