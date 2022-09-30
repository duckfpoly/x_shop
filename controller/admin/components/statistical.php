<?php 
    if(isset($_GET['act'])){
        $text = $_GET['act'];
        $req = $str = strtoupper("- ".$text);
    }
    else {
        $req = '';
    }
?>
<div class="alert alert-success mt-3 textx-center" role="alert">
    <h4 class="text-success">STATISTICAL <?= $req ?></h4>
</div>
<div>
<?php 
    include('model/model_statistical.php');
    if(isset($_GET['act'])){
        $act = $_GET['act'];
    }
    else {
        $act = '';
    }
    if($act == 'chart'){
        $read = $handle_statistical->list();
        include('view/admin/statistical/chart.php');
    }
    else {
        $read = $handle_statistical->list();
        include('view/admin/statistical/index.php');
    }
?>
</div>
