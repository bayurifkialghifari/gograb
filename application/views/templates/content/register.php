<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>GO-GRAB - <?= $title ?></title>
        <meta name="description" content="A demo landing page for agencies or product oriented businesses built using Shards, a free, modern and lightweight UI toolkit based on Bootstrap 4.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS Dependencies -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/shards.min.css?v=3.0.0">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/shards-extras.min.css?version=3.0.0">
        <link rel="stylesheet" href="<?= base_url() ?>assets/toastr/toastr.min.css">
    </head>
    <body class="shards-landing-page--1">

      <!-- Login Page -->
      <div class="contact section-invert py-4">
        <h3 class="section-title text-center m-5"><i class="fa fa-motorcycle"></i> GO - <b>GRAB</b></h3>
        <div class="container py-4">
          <div class="row justify-content-md-center px-4">
            <div class="contact-form col-sm-12 col-md-10 col-lg-7 p-4 mb-4 card">
              <form id="form">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <label for="contactFormFullName"><b>REGISTER AS ?</b></label>
                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="form-group">
                      <div class="radio">
                        <label><input type="radio" name="optradio" id="user" value="1" checked>User</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <div class="form-group">
                      <div class="radio">
                        <label><input type="radio" name="optradio" id="driver" value="2">Driver</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label for="contactFormFullName"><b>NAME</b></label>
                      <input required="" type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label for="contactFormFullName"><b>PHONE NUMBER</b></label>
                      <input required="" type="number" class="form-control" id="phone" placeholder="Enter your phone number">
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label for="contactFormFullName"><b>EMAIL</b></label>
                      <input required="" type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label for="contactFormEmail"><b>PASSWORD</b></label>
                      <input required="" type="password" class="form-control" id="password" placeholder="Enter your password">
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label for="contactFormEmail"><b>REPEAT PASSWORD</b></label>
                      <input required="" type="password" class="form-control" id="rpassword" placeholder="Repeat your password">
                    </div>
                  </div>
                </div>
                <br>
                <input class="btn btn-primary btn-pill d-flex ml-auto mr-auto" id="btnr" type="submit" value="REGISTER">
                <div class="mt-4">
                  <br>
                  <div class="row">
                      <div class="col-md-6 col-sm-6">
                          <p class="text-left text-dark">HAVE ACCOUNT ?</p>
                      </div>
                      <div class="col-md-6 col-sm-6 text-right">
                          <a href="<?= base_url() ?>login" class="btn btn-dark btn-pill ml-auto mr-auto">LOGIN</a>
                      </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- / Contact Section -->

      <footer class="main-footer py-5">
        <p class="text-muted text-center small p-0 mb-4">&copy; Copyright 2018 — PT KaryaKitaBersama</p>
        <div class="social d-table mx-auto">
          <a class="twitter mx-3 h4 d-inline-block text-secondary" href="#">
            <i class="fa fa-twitter"></i>
            <span class="sr-only">View our Twitter Profile</span>
          </a>
          <!-- target="_blank" -->
          <a class="facebook mx-3 h4 d-inline-block text-secondary" href="#">
            <i class="fa fa-facebook"></i>
            <span class="sr-only">View our Facebook Profile
              <span>
          </a>
          <a class="github mx-3 h4 d-inline-block text-secondary" href="#">
            <i class="fa fa-instagram"></i>
            <span class="sr-only">View our Instagram Profile</span>
          </a>
        </div>
      </footer>

      <!-- JavaScript Dependencies -->
      <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

      <script type="text/javascript" src="<?= base_url() ?>assets/toastr/toastr.min.js"></script>
      <script src="<?= base_url() ?>assets/js/application.js"></script>

      <script type="text/javascript">
        $(() =>
        {

          // Fungsi ulangi password
          $('#rpassword').on('change', () =>
          {
            let rpassword   = $('#rpassword').val()
            let password    = $('#password').val()

            if(rpassword != password)
            {
              $.message("Passwords don't match", 'REGISTER', 'error')
              $.message("Match your password", 'REGISTER', 'warning')

              $('#btnr').prop('disabled', 'disabled')
            }
            else
            {
              $.message("Passwords match", 'REGISTER', 'success')

              $('#btnr').prop('disabled', false)
            }
          })

          // Fungsi radio button
          $('#user').on('click', () =>
          {
            $('#user').attr('checked', 'checked')
            $('#driver').attr('checked', false)
          })

          $('#driver').on('click', () =>
          {
            $('#driver').attr('checked', 'checked')
            $('#user').attr('checked', false)
          })

          // Fungsi simpan data
          $('#form').submit((ev) =>
          {
            ev.preventDefault()

            $.message("Wait a minute", 'REGISTER', 'warning')
            $('#btnr').prop('disabled', 'disabled')


            let level
            let name        = $('#name').val()
            let email       = $('#email').val()
            let phone       = $('#phone').val()
            let password    = $('#password').val()

            if($('#user').attr('checked') == 'checked')
            {
              level = 1
            }
            
            if($('#driver').attr('checked') == 'checked')
            {
              level = 2
            }

            $.ajax({
              method: 'post',
              url: '<?= base_url() ?>register/save',
              data: {
                name: name,
                email: email,
                phone: phone,
                password: password,
                level: level
              },
              success(data)
              {
                if(data == 1)
                {
                  $.message("Verify your email account, please check your email !!", 'REGISTER', 'success')
                  alert('Verify your email account, please check your email !!')

                  // Pindah lokasi
                  window.location.href = '<?= base_url() ?>login'
                }
                else
                {
                  $.message("Your email has already been registered !!", 'REGISTER', 'error')

                  $('#email').val('')
                  $('#btnr').prop('disabled', false)
                }
              },
              error($xhr)
              {
                console.log($xhr)
              }
            })
          })
        })
      </script>
    </body>
</html>
