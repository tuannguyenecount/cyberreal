<nav aria-label="breadcrumb" class="pt-2">
    <div class="container">
		<a class="breadcrumb-back" href="/"></a>					
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url ?>">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="#">Căn hộ cho thuê</a></li>
			<li class="breadcrumb-item active">Chọn đi xem</li>
		</ol>                
	</div>     
</nav>

<div class="container my-3">
	<section class="desc">
   	<div class="row justify-content-center mb-4">
      	<div class="col-md-8 text-center">
         	<h1>Danh sách tòa nhà đã lưu</h1>
         	<p>Quý Khách vui lòng chọn ngày đi xem văn phòng và đặt lịch hẹn bên dưới. Xin chân thành cảm ơn!</p>
      	</div>
   	</div>
	</section>
	<form id="w0" method="post" >
      <?php 	$token = NoCSRF::generate( 'csrf_token' ); ?>
      <input type="hidden" name="csrf_token" value="<?= $token ?>">        
      <section class="office-saved">
         <div class="table-responsive">
            <table class="table table-striped boxed">
               <thead>
                  <tr>
                     <th>Hình ảnh</th>
                     <th>Tòa nhà</th>
                     <th>Ngày đi xem</th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
               <?php foreach($view_data['model'] as $item) { ?>
                  <tr>
                     <td class="align-middle text-center">
                     	<a class="img-fluid" href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html">
                     		<img class="rounded" src="<?=  base_url?>/images/products/<?= $item['Image'] ?>" alt="">
                     	</a>
                     </td>
                     <td class="align-middle">
                        <h6 class="card-title mb-1">
                        	<a href="<?= base_url ?>/<?= $item['CategoryAlias'] ?>/<?= $item['Alias'] ?>.html"><?= $item['Name'] ?></a>
                        </h6>
                        <p class="address small mb-0 text-nowrap">
                           <i class="fas fa-map-marker"></i> Đường <?= $item['Street'] ?>, <?= $item['WardName'] ?>, <?= $item['DistrictName'] ?>             
                        </p>
                        <p class="price small  mb-0 text-nowrap">
                           <i class="fas fa-dollar-sign"></i> Giá thuê: <?= $item['Price'] ?>                                  
                        </p>
                     </td>
                     <td class="align-middle text-center">
                        <div class="form-group mb-0 required">
                           <input type="text" class="form-control calendar" name="DayToSee<?= $item['Id'] ?>" readonly="">
                           <div class="help-block"></div>
                        </div>
                     </td>
                     <td class="align-middle text-center">
                        <a class="btn btn-outline-danger btn-ico btn-rounded btn-sm" href="<?= base_url?>/product/removeSaved/<?= $item['Id'] ?>"><i class="fas fa-times"></i></a>                                
                     </td>
                  </tr>
               <?php } ?>
               </tbody>
            </table>
         </div>
      </section>
      <div class="boxed p-3 my-3 rounded-0">
         <h4 class="text-uppercase mb-2">Thông tin đặt hẹn</h4>
         <div class="infomation">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group field-bookingform-name">
                     <label class="control-label" >Họ và tên/ Tên công ty</label>
                     <input type="text"  required="" class="form-control" name="Name" >
                     <div class="help-block"></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group field-bookingform-email">
                     <label class="control-label" >Email</label>
                     <input type="email" class="form-control" name="Email" >
                     <div class="help-block"></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group field-bookingform-phone">
                     <label class="control-label" >Điện thoại</label>
                     <input type="text" required="" class="form-control" name="Phone" aria-required="true">
                     <div class="help-block"></div>
                  </div>
               </div>
            </div>
            <div class="row mt-1">
               <div class="col-md-8">
                  <div class="form-group field-bookingform-note">
                     <label class="control-label" >Ghi chú</label>
                     <textarea id="bookingform-note" class="form-control" name="Note" rows="3"></textarea>
                     <div class="help-block"></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group field-bookingform-captcha">
                  	<div>&nbsp;</div>
                     <div class="form-group has-feedback" style="margin-top:10px">
			             <div class="g-recaptcha" data-sitekey="6LeVicUUAAAAADSmhc4nS5zWDBzbfOzoIpgMvgYA"></div>               
			         </div>
                     <div class="help-block"></div>
                  </div>
               </div>
            </div>
            <?php include_once 'view/shared/_errors.php'; ?>
         </div>
      </div>
      <div class="d-flex justify-content-between">
         <a class="btn btn-outline-primary btn-with-ico" href="<?= base_url ?>"><i class="fas fa-plus mr-1"></i> Chọn tòa nhà khác</a>				
         <button type="submit" class="btn btn-primary btn-with-ico"><i class="far fa-calendar-plus mr-1"></i> ĐẶT HẸN</button>            
      </div>
	</form>
</div>
