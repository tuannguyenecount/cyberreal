<nav aria-label="breadcrumb" class="pt-2">
   <div class="container">
      <a class="breadcrumb-back" href="/"></a>					
      <ol class="breadcrumb">
         <li class='breadcrumb-item'><a href="/">Trang chủ</a></li>
         <li class='breadcrumb-item active'>Liên hệ</li>
      </ol>
   </div>
</nav>

<div class="container my-4">
   <div class="row">
      <div class="col">
         <h1><b>Liên hệ ngay</b> với chúng tôi.</h1>
      </div>
   </div>
   <form id="contact-form" action="/lien-he" method="post">
      <div class="row mt-4">
         <div class="col-lg-6 mb-4">
            <p>ssssss</p>
         </div>
         <div class="col-lg-6">
            <div class="row gutter-1 gutter-md-2">
               <div class="col-lg-12">
                  <div class="form-group field-contactform-name required">
                     <label class="control-label" for="contactform-name">Họ tên</label>
                     <input type="text" id="contactform-name" class="form-control" name="ContactForm[name]" autofocus aria-required="true">
                     <p class="help-block help-block-error"></p>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="form-group field-contactform-email required">
                     <label class="control-label" for="contactform-email">Email</label>
                     <input type="text" id="contactform-email" class="form-control" name="ContactForm[email]" aria-required="true">
                     <p class="help-block help-block-error"></p>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="form-group field-contactform-phone_number required">
                     <label class="control-label" for="contactform-phone_number">Điện thoại</label>
                     <input type="text" id="contactform-phone_number" class="form-control" name="ContactForm[phone_number]" aria-required="true">
                     <p class="help-block help-block-error"></p>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="form-group field-contactform-body required">
                     <label class="control-label" for="contactform-body">Lời nhắn</label>
                     <textarea id="contactform-body" class="form-control" name="ContactForm[body]" rows="6" aria-required="true"></textarea>
                     <p class="help-block help-block-error"></p>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="form-group field-contactform-verifycode">
                     <label class="control-label" for="contactform-verifycode">Mã xác thực</label>
                     <div class="row">
                        <div class="col-md-3"><img id="contactform-verifycode-image" src="<?= base_url ?>/site/captcha_-1138858143.jpg" alt=""></div>
                        <div class="col-md-6"><input type="text" id="contactform-verifycode" class="form-control" name="ContactForm[verifyCode]"></div>
                     </div>
                     <p class="help-block help-block-error"></p>
                  </div>
               </div>
               <div class="col-lg-12">
                  <button type="submit" class="btn btn-primary mb-2" name="contact-button">Gửi đi</button>                
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
