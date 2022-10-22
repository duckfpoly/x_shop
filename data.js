// curDate sẽ lưu trữ thời gian hiện tại
var curDate = new Date();
// Lấy ngày hiện tại
var curDay = curDate.getDate();
// Lấy tháng hiện tại
var curMonth = curDate.getMonth() + 1;
// Lấy năm hiện tại
var curYear = curDate.getFullYear();
var data = [];
function save() {
    var name = document.getElementById('name').value
    var image = document.getElementById('image').value
    var content = document.getElementById('cmt').value
    var date = curYear + "-" + curMonth + "-" + curDay

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
    var list = this.data.reverse();
    var table = `
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Nội dung</td>
            <td>Ngày bình luận</td>
        </tr>
    `;
    for (var i = 0; i < data.length; i++) {
        table += '<tr>';
        table += '<td>' + list[i].name + '</td>';
        table += '<td><img width="100px" id="img" src="' + list[i].image + '"></td>';
        table += '<td>' + list[i].content + '</td>';
        table += '<td>' + list[i].date + '</td>';
        table += '</tr>';
    }
    document.getElementById('mytable').innerHTML = table
}
function clear() {
    document.getElementById('cmt').value = ""
}

