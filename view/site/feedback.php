<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Feedback</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->
<div class="container mt-5">
    <form action="https://script.google.com/macros/s/AKfycbxDQsxgJS0rlnvsNmC5EocOOcRcNmbTf2vQ5r3viuf0Iy_5Ppqo/exec" method="get" role="form" id="test-form" class="php-email-form">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group rounded">
                    <input type="text" name="name" class="form-control p-3" id="name" placeholder="Your Name">
                    <span></span>
                    <small></small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="form-control p-3" name="message" rows="5" placeholder="Message" id="message"></textarea>
                    <span></span>
                    <small></small>
                </div>
            </div>
            <div class="col-md-12 text-center my-3 mb-5">
                <div class="show-error"></div>
                <div id="error-message" class="error-message ">False Send Message ❌❌❌</div>
                <div id="sent-message" class="sent-message ">✔✔✔ Your message has been sent. Thank you!</div>
            </div>
            <div class="col-md-12 text-center mb-5">
                <button type="submit" id="submit-form" class="btn btn-outline-secondary p-2 w-25">Send Message</button>
            </div>
        </div>
    </form>
</div>
<script>
    
const name = document.querySelector("#name")
const message = document.querySelector("#message")
const btnLogin = document.querySelector("#submit-form")
const errorMessageDiv = document.querySelector(".show-error")
function showErrorMessage(message){
    errorMessageDiv.innerHTML = message
}
name.onclick = function(e){
  e.preventDefault()
  name.style.border = "";
  showErrorMessage("")
}
message.onclick = function(e){
  e.preventDefault()
  message.style.border = "";
  showErrorMessage("")
}
btnLogin.onclick = function(e){
    e.preventDefault()
    if(name.value == ""){
        showErrorMessage("Please enter your Name !")
        name.style.border = "1px solid red";
        return false;
    }
    if(message.value ==""){
        showErrorMessage("Please enter your message !")
        message.style.border = "1px solid red";
        return false;
    }
    showErrorMessage("")
    $(document).ready(function () {
        var data = $('form#test-form').serialize();
        $.ajax({
          type: 'GET',
          url: 'https://script.google.com/macros/s/AKfycbxDQsxgJS0rlnvsNmC5EocOOcRcNmbTf2vQ5r3viuf0Iy_5Ppqo/exec',
          dataType: 'json',
          crossDomain: true,
          data: data,
          success: function (data) {
            if (data == 'false') {
              document.querySelector('#error-message').style.display = "block";
            } else {
                $('#name').val('');
                $('#message').val('');
              document.querySelector('#sent-message').style.display = "block";
            }
          }
        });
        return false;
    });
}
</script>

<style>
    .php-email-form .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: center;
        padding: 15px;
        font-weight: 600;
        border-radius: 10px;
    }

    .show-error {
        color: #ed3c0d;
        height: 50px;
        line-height: 50px;
    }

    .php-email-form .sent-message {
        display: none;
        color: #fff;
        background: #18d26e;
        text-align: center;
        padding: 15px;
        font-weight: 600;
        border-radius: 10px;
    }

</style>