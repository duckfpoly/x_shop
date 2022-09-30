<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Số Lượng'],
            <?php foreach( $read as $key => $value ) { 
                echo "['$value[name_cate]', $value[so_luong]],";
            } ?>
        ]);
        var options = {
            title: 'THỐNG KÊ HÀNG HÓA',
            is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<div id="piechart_3d" style="width: 900px; height: 500px;"></div>