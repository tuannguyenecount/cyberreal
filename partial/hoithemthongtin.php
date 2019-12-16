<div class="row">

    <div class="col-lg-12">
        <div class="col-inner" style="padding:0px 20px 0px 20px;">

            <h3>HỎI THÊM THÔNG TIN</h3>
            <div role="form" >
                <div class="screen-reader-response"></div>
                <form action="<?= base_url ?>/product/hoithemthongtin" method="post" >
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
                       <textarea class="form-control" name="Content" placeholder="Lời nhắn"></textarea>
                    </div>
                    <div class="form-group">
                    	<button type="submit" class="btn btn-primary expand border-radius-none">Gửi thông tin</button>
                    </div>
                    <p style="text-align: center">Hoặc gọi trực tiếp vào Hotline (24/7) <?= $_SESSION['InfoWeb']['Phone'] ?></p>
                </form>
            </div>

        </div>
    </div>
</div>