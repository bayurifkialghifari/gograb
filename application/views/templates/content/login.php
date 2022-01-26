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
                </div>
                <br>
                <input class="btn btn-dark btn-pill d-flex ml-auto mr-auto" type="submit" value="LOGIN">
                <div class="mt-4">
                  <br>
                  <div class="text-center text-danger">
                    <b>
                    DRIVER : bayurifki916@gmail.com
                    <br>
                    PEMESAN : bayurifkialgh@gmail.com
                    <br>
                    Password : 123456
                    <br>
                    <br>
                    "Untuk cek websoketnya silahkan buka website ini di dua halaman yang berbeda, dan login dengan 2 akun di atas secara terpisah"
                    </b>
                    <br>
                    <br>
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-sm-6">
                          <p class="text-left text-dark">DO NOT HAVE ACCOUNT ?</p>
                      </div>
                      <div class="col-md-6 col-sm-6 text-right">
                          <a href="<?= base_url() ?>register" class="btn btn-primary btn-pill ml-auto mr-auto">REGISTER</a>
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
          $('#form').submit((ev) =>
          {
            ev.preventDefault()

            let email     = $('#email').val()
            let password  = $('#password').val()

            $.ajax({
              method: 'post',
              url: '<?= base_url() ?>login/checkLogin',
              data:
              {
                email: email,
                password: password
              },
              success(data)
              {
                console.log(data)
                if(data == 1)
                {
                  $.message("Login success !!", 'LOGIN', 'success')

                  window.location.href = '<?= base_url() ?>users/home'
                }
                else if(data == 0)
                {
                  $.message("Your password is wrong !!", 'LOGIN', 'warning')
                }
                else if(data == 2)
                {
                  $('#email').val('')
                  
                  $.message("Your email not registered, or not activated !!", 'LOGIN', 'error')
                }

                $('#password').val('')
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