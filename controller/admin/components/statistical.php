<div class="alert alert-success mt-3 textx-center" role="alert">
    <h4 class="text-success">STATISTICAL <?= $text ?></h4>
</div>
<div>
<?php 
    if($act == 'chart'){
        $read = $statistical->list();
        include('view/admin/statistical/chart.php');
    }
    else {
        $read = $statistical->list();
        include('view/admin/statistical/index.php');
    }
?>
</div>
