<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .btn {
            height: 40px;
            min-width: 100px;
            border-radius: 6px;
            color: #fff;
            border: none;
            cursor: pointer;
            margin: 10px;
        }
    </style>
</head>

<body style="font-family:system-ui;">
    <div class="app" style="text-align:center; position:fixed;top: 0;left: 0;right: 0;bottom: 0;display: flex;background-color: rgb(208, 208, 219);">
        <div style="width: 80%;margin: auto;display: flex;flex-direction: column;">
            <h1 style="font-weight:bold;color: red;margin-bottom: 10px;">Mã Hoá RSA</h1>
            <div style="width: 100%;">
                <div style="text-align: left;">
                    <h3 style="color:#000; margin: 5px;">Nhập text</h3>
                    <textarea name="" id="input_text" style="width:100%;" rows="10"></textarea>
                </div>
                <div style="display:flex;">
                    <div style="text-align: left;width:50%;margin-right: 20px;">
                        <h3 style="color:#000; margin: 5px;">Kết quả mã hoá</h3>
                        <textarea disabled name="" id="result_encode_text" style="width:100%;" rows="10"></textarea>
                    </div>
                    <div style="text-align: left;width:50%">
                        <h3 style="color:#000; margin: 5px;">Kết quả giải mã</h3>
                        <textarea disabled name="" id="result_decode_text" style="width:100%;" rows="10"></textarea>
                    </div>
                </div>
                <div style="margin-top:20px;align-items:center;">
                    <input type="hidden" name="" id="private_key" value="">
                    <Button style="background-color: blue;" class="btn" id="encryptBtn">Mã hoá</Button>
                    <Button style="background-color: rgba(252, 252, 1, 0.726);" class="btn" id="decryptBtn">Giải mã</Button>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#encryptBtn').click(function() {
            let input_text = $("#input_text").val();
            $.ajax({
                type: 'post',
                url: 'encrypt',
                data: {
                    'input_text': input_text,
                },
                success: function(res) {
                    if (res.status === 200) {
                        $('#result_encode_text').html(res.encode);
                        $("#private_key").val(res.private_key);
                    }
                }
            })
        })

        $('#decryptBtn').click(function() {
            let input_decode = $("#input_text").val();
            let private_key = document.getElementById('private_key').value;
            $.ajax({
                type: 'post',
                url: 'decrypt',
                data: {
                    'input_text': input_decode,
                    'private_key': private_key,
                },
                success: function(res) {
                    if (res.status === 200) {
                        $('#result_decode_text').html(res.decode);
                    }
                }
            })
        })
    });
</script>

</html>