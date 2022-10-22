var curDate = new Date();
var curDay = curDate.getDate();
var curMonth = curDate.getMonth() + 1;
var curYear = curDate.getFullYear();
var data = [];
function save() {
    var name = document.getElementById('name').value
    var image = document.getElementById('image').value
    var content = document.getElementById('comment').value
    var date = curYear + "-" + curMonth + "-" + curDay
    var send_cmt = 'send_cmt';
    var dataString =
        'send_cmt=' + send_cmt +
        '&comment=' + content;
    $.ajax({
        type: "POST",
        url: url,
        data: dataString,
        success: function () {
            // alert('Cmt success !');
        }
    });
    var item = {
        name: name,
        image: image,
        content: content,
        date: date
    }
    this.data.push(item)
    show()
    clear()
}
function show() {
    if(document.getElementById('no_review')) { 
        document.getElementById('no_review').innerHTML = '';
    }
        var count_cmt = document.getElementById('count_cmt').innerHTML;
        var inner_count = Number(count_cmt) + 1;
        $('#count_cmt').html(inner_count);
        var list = this.data.reverse();
        var list_cmt = ``;
        for (var i = 0; i < data.length; i++) {
            list_cmt += `
                <div class="single-comment mb-5">
                    <div class="user d-flex w-100">
                        <div class="thumb">
                            <img src="assets/uploads/admin/user/${list[i].image}" alt="">
                        </div>
                        <div class="desc">
                            <p class="comment">${list[i].content}</p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <a href="#">${list[i].name}</a>
                                    </h5>
                                    <p class="date">${list[i].date}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
        }
        document.getElementById('cmt_list').innerHTML = list_cmt
}
function clear() {
    document.getElementById('comment').value = ""
}
var url = location.href;
$(document).ready(function comment_prd() {
    $("#send_cmt").click(function (e) {
        var send_cmt = 'send_cmt';
        var comment = $("#comment").val();
        var dataString =
            'send_cmt=' + send_cmt +
            '&comment=' + comment;
        $.ajax({
            type: "POST",
            url: url,
            data: dataString,
            success: function () {
            }
        });
    });
});

