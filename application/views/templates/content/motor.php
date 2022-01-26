<?php $this->load->view('templates/header') ?>

<div class="content clearfix pt-5 mt-5">
		
	<div id="colors" class="container mb-5">

		<div class="section-title col-lg-8 col-md-10 ml-auto mr-auto text-center">
		  <h3 class="mb-4 text-uppercase">order a bike</h3>
		  <p>GO-GRAB there is always a way</p>
		</div>

	</div>

</div>
<div class="container">


  <!-- Shearch on map -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
		  <form role="form" id="calculate-route" method="post">
	    	
        <div class="row">
	    		<div class="col-lg-6 col-md-6 col-sm-6">
			    	<label for="txtFrom">
			        	Origin from :</label>
			    	<input type="text" id="txtFrom" name="txtFrom" class="form-control" required="required" placeholder="Location From"
			        		size="40" />
	    		</div>
	    		<div class="col-lg-6 col-md-6 col-sm-6">
	    			<label for="txtTo">
			        	Destination :</label>
			    	<input type="text" id="txtTo" name="txtTo" class="form-control" required="required" placeholder="Location To"
			        	size="40" />
	    		</div>
	    		<div class="col-lg-12 col-md-12 col-sm-12 text-center pt-3 pb-3">
			    	<input type="submit" value="Search" class="btn btn-primary	" />
	    		</div>
	    	</div>

	  	</form>  
		</div>
	</div>




  <!-- Google map -->
  <div id="DivMap">
  </div>



  <!-- Order Detail -->
  <div id="detail" style="display: none">
    <form id="order" role="form" method="post">
      
      <div class="row pt-3">
        <div class="col-md-12">
          <h5 class="mb-4 text-uppercase text-center">details</h5>
          <p>DISTANCE <input type="text" id="jarak" readonly="" class="form-control form-md"></p>
          <p>PRICE <input type="text" id="price" readonly="" class="form-control form-md"></p>
          <p>DURATION <input type="text" id="lama" readonly="" class="form-control form-md"></p>
          <p style="display: none">DRIVER <input type="text" id="driver" readonly="" class="form-control form-md"></p>
          <div class="text-center">
            <button type="submit" id="pesan" disabled="disabled" class="btn btn-success ">Order</button>
          </div>
          <br>
        </div>
      </div>

    </form>
  </div>
</div>



<style type="text/css">
  #DivMap
  {
    width: 100%;
    height: 500px;
    box-shadow: 5px 5px 15px 5px #888888;
  }
</style>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBzpRW_xVhK5Q5AdpzhpKWBhlXkd_5pswk"></script>
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>









<!-- FORM DRIVER -->
<div class="modal fade" id="myModal5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
          <input type="hidden" id="driver">
          <div class="modal-header">
              <h3 class="modal-title custom-font" id="labelPesanan"></h3>
          </div>
          <div class="modal-body">
            <p>Name  : <b id="namaDriver"></b></p>
            <p>Email : <b id="emailDriver"></b></p>
            <p>Phone : <b id="nomerDriver"></b></p>
          </div>
          <div class="modal-footer">
              <button id="batalPesanan" class="btn btn-danger btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancel</button>
          </div>
          <input type="hidden" id="idPesanan" >
      </div>
  </div>
</div>











<script>
    // On load function
    calculateRoute()

    

    //For TextBox Search..............
    google.maps.event.addDomListener(window, 'load', () => 
    {
        var places      = new google.maps.places.Autocomplete(document.getElementById('txtFrom'))
        
        google.maps.event.addListener(places, 'place_changed', () => 
        {
            var place   = places.getPlace()
        })

        var places1     = new google.maps.places.Autocomplete(document.getElementById('txtTo'))

        google.maps.event.addListener(places1, 'place_changed', () => 
        {
            var place1  = places1.getPlace()
        })
    })




    // Menampilkan map
    function calculateRoute(rootfrom = null, rootto = null, latitude = null, longitude = null) 
    {



        var myOptions   = {
            zoom: 17,
            center: new google.maps.LatLng(latitude, longitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }



        // Draw the map
        var mapObject   = new google.maps.Map(document.getElementById("DivMap"), myOptions)
 
        var directionsService = new google.maps.DirectionsService()
        var directionsRequest = {
            origin: rootfrom,
            destination: rootto,
            travelMode: google.maps.DirectionsTravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC
        }

        directionsService.route(
        directionsRequest,
        (response, status) => 
        {

            if (status == google.maps.DirectionsStatus.OK) 
            {
              new google.maps.DirectionsRenderer(
              {
                  map: mapObject,
                  directions: response
              })
            }
            else
            {
              $("#lblError").append("Unable To Find Root")
            }
        }
        )
    }

 
    $(document).ready(() => 
    {    

        load()




        // Load function data
        function load()
        {
          if (navigator.geolocation) 
          {
            navigator.geolocation.getCurrentPosition(showPosition)
          }
        }





        // Show Position
        function showPosition(position) 
        { 
          let latitude    = position.coords.latitude
          let longitude   = position.coords.longitude

          $.ajax({
            method: 'get',
            url: 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitude + ',' + longitude + '&sensor=true&key=AIzaSyBzpRW_xVhK5Q5AdpzhpKWBhlXkd_5pswk',
            async: true,
            success(data)
            {
              $('#txtFrom').val(data.results[1].formatted_address)

              calculateRoute(null, null, latitude, longitude)
            }
          })
        }

        // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") 
        {
          $("#lblError").text("Your browser doesn't support the Geolocation API")
          
          return
        }






        // On Submit rute pesanan
        $("#calculate-route").submit((ev) => 
        {



        	let from 	= $("#txtFrom").val()
        	let to 		= $("#txtTo").val()

        	ev.preventDefault()

	        calculateRoute(from, to)

        	$('#pesan').prop('disabled', false)

        	// Menghitung jarak
        	var service = new google.maps.DistanceMatrixService()

        	service.getDistanceMatrix(
    			{
      			origins: [from],
  			    destinations: [to],
  			    travelMode: 'DRIVING',
  			    unitSystem: google.maps.UnitSystem.MATRIX
    			}, callback)




    			function callback(response, status) 
    			{

    				let jarak 		    = response.rows[0].elements[0].distance.value
    				let jarakText 	  = response.rows[0].elements[0].distance.text
            let lama          = response.rows[0].elements[0].duration.text

    				let angka 		    = Number(jarak) * <?= $harga ?>

            var number_string = angka.toString(),
              sisa            = number_string.length % 3,
              rupiah          = number_string.substr(0, sisa),
              ribuan          = number_string.substr(sisa).match(/\d{3}/g);
                


            if (ribuan) {
              separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
            }



    				$('#price').val(rupiah)
            $('#jarak').val(jarakText)
            $('#lama').val(lama)

            $('#detail').css('display', 'block')
    			}
        })

















        let pusher  = new Pusher('711b19f530583c9309c4', 
        {
            cluster: 'ap1'
        })

        let socket = pusher.subscribe('motor')
        let from  = $("#txtFrom").val()
        let to    = $("#txtTo").val()
        let jarak = $('#jarak').val()
        let lama  = $('#lama').val()
        let price = $('#price').val()
        price     = splitString(price, '.')

        // Pesan
        $('#order').submit((ev) =>
        {

          $.message("Wait a minute !!", 'ORDER', 'warning')
          $('#pesan').prop('disabled', 'disabled')

          ev.preventDefault()






          // Web socket
          $.ajax({
            method: 'post',
            url: '<?= base_url() ?>socket/pesan',
            data: {
              status: 'Pesan',
              user_id: '<?php echo $this->session->userdata('data')['id'] ?>',
              from: from,
              to: to,
              price: price,
              jarak: jarak,
              lama: lama
            },
            success(data)
            {
              console.log(data)
            },
            error($xhr)
            {
              console.log($xhr)
            }
          })

          
          socket.bind('batal', function(data)
          {
            let driver = $('#driver').val()

            if(driver === data.id)
            {
              $.message('Driver cancels your order !!', 'ORDER', 'error')
              $.message('Find your drivers again !!', 'ORDER', 'warning')

              $.ajax({
                method: 'post',
                url: '<?= base_url() ?>pesan/motor/orderBatal',
                data: {
                  user_id: <?php echo $this->session->userdata('data')['id'] ?>,
                  driv_id: data.id,
                  from: from,
                  to: to,
                  price: price,
                  jarak: jarak,
                  lama: lama
                },
                success(data)
                {
                  console.log(data)
                },
                error($xhr)
                {
                  console.log($xhr)
                }
              })

              $('#pesan').prop('disabled', false)
              $('#myModal5').modal('toggle')
            }
          })


          $('#batalPesanan').on('click', (ev) =>
          {
            ev.preventDefault()

            $.ajax({
              method: 'post',
              url: '<?= base_url() ?>socket/batalPesanan',
              data:
              {
                status: 'Cancel',
                user_id: <?php echo $this->session->userdata('data')['id'] ?> 
              },
              success(data)
              {
                $('#pesan').prop('disabled', false)
              },
              error($xhr)
              {
                console.log($xhr)
              }
            })

          })

        })

        socket.bind('jalan', function(data)
        {
          if(<?php echo $this->session->userdata('data')['id'] ?> === Number(data.customerId))
          {
            $('#labelPesanan').html('Your driver !!')
            $('#driver').val(data.driver)
            $.message('Your driver on the way !!', 'ORDER', 'success')

            $.ajax({
              method: 'post',
              url: '<?= base_url() ?>pesan/motor/getDetailDriver',
              data: {
                id: data.driver
              },
              success(data)
              {
                $('#namaDriver').html(data.user_name)
                $('#emailDriver').html(data.user_email)
                $('#nomerDriver').html(data.user_phone)
              },
              error($xhr)
              {
                console.log($xhr)
              }
            })

            $.ajax({
              method: 'post',
              url: '<?= base_url() ?>pesan/motor/order',
              data: {
                user_id: <?php echo $this->session->userdata('data')['id'] ?>,
                driv_id: data.driver,
                from: from,
                to: to,
                price: price,
                jarak: jarak,
                lama: lama
              },
              success(data)
              {
                console.log(data)
              },
              error($xhr)
              {
                console.log($xhr)
              }
            })

            // Toggle Modal
            $('#myModal5').modal('toggle')
          }
        })

        function splitString(stringToSplit, separator) 
        {
          var arrayOfStrings = stringToSplit.split(separator)
          return arrayOfStrings.join('')
        }
    })

</script>

<?php $this->load->view('templates/footer') ?>