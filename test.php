<!DOCTYPE html>
<html>

<head>
    <title>Đề 5</title>
</head>

<body>
    <form onsubmit="return false">
        <h3>QUẢN LÝ SẢN PHẨM</h3>
        <table class="mytable" >
            <tr>
                <td><input type="hidden" readonly name="name" value="Nguyễn Đức" id="name"></td>
            </tr>
            <tr>
                <td><input type="hidden" readonly name="image" value="assets/logo.png" id="image"></td>
            </tr>
            <tr>
                <td><input name="cmt" type="text" class="input" id="cmt" placeholder="Viết bình luận"></td>
            </tr>
            <tr>
                <td><button onclick="save()">Send</button></td>
            </tr>
        </table>
    </form>
    <div style="margin: 50px;"></div>
    <table border="1" id="mytable"></table>
    <script src="data.js"></script>
</body>

</html>