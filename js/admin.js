const view = new URLSearchParams(window.location.search).get('module');
if(view){
    if(view == 'categories'){
        $('#cate').addClass('active fw-bold');  
    }
    else if (view == 'products'){
        $('#prd').addClass('active fw-bold');  
    }
    else if (view == 'comments'){
        $('#cmt').addClass('active fw-bold');  
    }
    else if (view == 'users'){
        $('#users').addClass('active fw-bold');  
    }
    else if (view == 'blog'){
        $('#blog').addClass('active fw-bold');  
    }
    else if (view == 'orders'){
        $('#orders').addClass('active fw-bold');  
    }
    else if (view == 'statisticals'){
        $('#sta').addClass('active fw-bold');  
    }
}
else {
    $('#home').addClass('active fw-bold');  
}
$(document).ready(function() {
    $('#example').DataTable();
});
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
});
$('#example').DataTable( {
    responsive: true
});
function selects() {
    var ele = document.getElementsByClassName('checkbox');
    for (var i = 0; i < ele.length; i++) {
        if (ele[i].type == 'checkbox')
            ele[i].checked = true;
    }
}
function deSelect() {
    var ele = document.getElementsByClassName('checkbox');
    for (var i = 0; i < ele.length; i++) {
        if (ele[i].type == 'checkbox')
            ele[i].checked = false;

    }
}