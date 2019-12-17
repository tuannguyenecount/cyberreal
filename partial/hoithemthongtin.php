<div class="row">

    <div class="col-lg-12">
        <div class="col-inner" style="padding:0px 20px 0px 20px;">

            <h3>HỎI THÊM THÔNG TIN</h3>
            <div role="form" >
                <div class="screen-reader-response"></div>
                <form id="frmHoithemthongtin" action="<?= base_url ?>/home/hoithemthongtin/<?= $_GET['id'] ?>" method="post" novalidate="">
                    <div class="form-group">
                    	<input type="text" class="form-control border-radius-none" style="height:auto;padding:10px" name="Name" required="" placeholder="Họ và tên" />
                    </div>
                    <div class="form-group">
                    	<input type="email" class="form-control border-radius-none" style="height:auto;padding:10px" name="Email" required="" placeholder="Email" />
                    </div>
                    <div class="form-group">
                    	<input type="text" class="form-control border-radius-none" style="height:auto;padding:10px" name="Phone" required="" placeholder="Số điện thoại" />
                    </div>
                    <div class="form-group">
                       <textarea class="form-control" name="Content" required=""  placeholder="Lời nhắn"></textarea>
                    </div>
                    <div class="form-group">
                    	<button type="submit" class="btn btn-primary expand border-radius-none">Gửi thông tin</button>
                    </div>
                    <p style="text-align: center">Hoặc gọi trực tiếp vào Hotline (24/7) <?= $_SESSION['InfoWeb']['Phone'] ?></p>
                    <p id="messageResult"></p>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $("#frmHoithemthongtin").submit(function(e){
        e.preventDefault();
        $.post($(this).attr("action"), $(this).serialize(), function(result){
            console.log(result);
            if(result.trim() == "1")
            {
                $("#messageResult").addClass("text-success");
                $("#messageResult").html("Gửi thông tin thành công. Chúng tôi sẽ sớm liên hệ cho bạn qua số điện thoại hoặc email bạn nhập.");
                $("#frmHoithemthongtin").trigger("reset");
            }
            else 
            {
                $("#messageResult").addClass("text-danger");
                $("#messageResult").html(result);
            }
        });
    });
</script>