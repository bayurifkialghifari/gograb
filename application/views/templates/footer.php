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
  </div>

  <!-- DELETE FORM -->
  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
              <div class="modal-header">
                  <h3 class="modal-title custom-font" id="labelHapus"></h3>
              </div>
              <div class="modal-body" id="contentHapus">
              </div>
              <div class="modal-footer">
                  <button id="clickHapus" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Yes</button>

                  <button class="btn btn-danger btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> No</button>
              </div>
              <input type="hidden" id="idHapus" name="">
          </div>
      </div>
  </div>


  <!-- LOGOUT FORM -->
  <div class="modal fade" id="myLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title custom-font">LOGOUT</h3>
            </div>
            <div class="modal-body">
              Are you sure  ?
            </div>
            <div class="modal-footer">
                <button id="clickLogout" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Yes</button>

                <button class="btn btn-danger btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> No</button>
            </div>
        </div>
    </div>
  </div>

  <!-- JavaScript -->
  <div id="fb-root"></div>
  <script>
    (function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1662270373824826";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));


    function out()
    {
      $('#myLogout').modal('toggle')
    }

    $(() =>
    {
      $('#clickLogout').on('click', () =>
      {
        window.location.href = '<?= base_url() ?>login/logout'
      })
    })

  </script>
</body>

</html>