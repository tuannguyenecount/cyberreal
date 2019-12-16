<div class="row">

    <div class="col-lg-12">
        <div class="col-inner" style="padding:0px 20px 0px 20px;">

            <h3>ĐĂNG KÝ NHẬN BẢNG GIÁ</h3>
            <div role="form" >
                <div class="screen-reader-response"></div>
                <form action="<?= base_url ?>/product/dangkynhanbanggia" method="post" >
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
                    	<button type="submit" class="btn btn-primary expand border-radius-none">Gửi thông tin</button>
                    </div>
                    <div class="form-group">
                        <p><input type="checkbox" name="NhanBaoGiaChiTiet" /> Nhận báo giá chi tiết dự án</p>
                        <p><input type="checkbox" name="NhanPhanTichDuAn" /> Nhận phân tích dự án</p>
                    </div>
                    <p style="text-align: center">Hoặc gọi trực tiếp vào Hotline (24/7) <?= $_SESSION['InfoWeb']['Phone'] ?></p>
                </form>
            </div>

        </div>
    </div>
</div>