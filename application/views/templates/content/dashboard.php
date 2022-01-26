<?php $this->load->view('templates/header') ?>

<style type="text/css">
	.color
	{
		transition: ease 0.5s;
	}

	.color:hover
	{
		border-radius: 100px;
		box-shadow: 5px 5px 15px 5px #888888;
		transition: ease 0.5s;
	}
</style>

<!-- Page Content -->
<div class="page-content">
  
  <!-- GGWP -->
  <div class="content clearfix">
		
		<div id="colors" class="container mb-5">

			<div class="section-title col-lg-8 col-md-10 ml-auto mr-auto text-center">
			  <h3 class="mb-4 text-uppercase">Start your journey today</h3>
			  <p>Waiting for your order.</p>
			</div>
			<?php if($this->session->userdata('data')['level'] == 'Driver') : ?>
				<?php 
				
					$id 	= $this->session->userdata('data')['id'];
					$exe 	= $this->db->get_where('driver', ['driv_user_id' => $id])->row_array();

					$status = $exe['driv_status'];

					if($status == 0)
					{
				?>
					<div class="example col-md-10 ml-auto mr-auto">
					  <div class="row">
					    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
					      <a class="gg" href="#" id="btn-order">
						      <div class="color">
						        <h1><i class="fa fa-motorcycle"></i></h1>
						        <span class="hex-value">MY ORDER</span>
						      </div>
						     </a>
					    </div>
					  </div>
					</div>
				<?php }else { ?>
					<div class="example col-md-10 ml-auto mr-auto">
					  <div class="row">
					    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
					      <a class="gg" href="#">
						      <div class="color">
						        <h1><i class="fa fa-motorcycle"></i></h1>
						        <span class="hex-value">MY ORDER</span>
						      </div>
						     </a>
					    </div>
					  </div>
					</div>
				<?php } ?>
			<?php else : ?>
				<div class="example col-md-10 ml-auto mr-auto">
				  <div class="row">
				    <div class="color-wrapper col-lg-6 col-md-6 col-sm-6">
				      <a class="gg" href="<?= base_url() ?>pesan/motor">
					      <div class="color">
					        <h1><i class="fa fa-motorcycle"></i></h1>
					        <span class="hex-value">GO-BIKE</span>
					      </div>
					     </a>
				    </div>

				    <div class="color-wrapper col-lg-6 col-md-6 col-sm-6">
				      <a class="gg" href="<?= base_url() ?>pesan/mobil">
					      <div class="color">
					        <h1><i class="fa fa-car"></i></h1>
					        <span class="hex-value">GO-CAR</span>
					      </div>
				      </a>
				    </div>
				  </div>
				</div>
			<?php endif; ?>

		</div>

	</div>
	<!-- GGWP -->

	<!-- CONTENT -->
	<div class="content clearfix pt-5 mt-5">
		
		<div id="colors" class="container mb-5">

			<div class="section-title col-lg-8 col-md-10 ml-auto mr-auto text-center">
			  <h3 class="mb-4 text-uppercase">Goodbye all limits</h3>
			  <p>From instant shipping to full payment convenience. Pick up on the roadside, to deliver snacks. Leave in the morning until hungry at night. We are here to help you overcome everything.</p>
			</div>

		</div>

	</div>
	<!-- CONTENT -->

</div>









<!-- TERIMA PESANAN FORM -->
<div class="modal fade" id="myModal5" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
      <div class="modal-content">
      	  <input type="hidden" id="customerId" value="">
          <div class="modal-header">
              <h3 class="modal-title custom-font" id="labelPesanan"></h3>
          </div>
          <div class="modal-body">
          	<p>Name  : <b id="namaCustomer"></b></p>
          	<p>Email : <b id="emailCustomer"></b></p>
          	<p>Phone : <b id="nomerCustomer"></b></p>
          </div>
          <div class="modal-footer">
              <button id="clickPesanan" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Yes</button>

              <button id="batalPesanan" class="btn btn-danger btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> No</button>
          </div>
          <input type="hidden" id="idPesanan" >
      </div>
  </div>
</div>

<?php $this->load->view('templates/footer') ?>

<script src="https://js.pusher.com/6.0/pusher.min.js"></script>

<script type="text/javascript">


	// Jika data belum lengkap
	$(() =>
	{
		$('#btn-order').on('click', () =>
		{
			$.message("Complete your data on your profile !!", 'DRIVER', 'warning')
		})
	})










	<?php 

		if($this->session->userdata('data')['level'] == 'Driver') 
		{ 		
			$id 	= $this->session->userdata('data')['id'];
			$exe 	= $this->db->get_where('driver', ['driv_user_id' => $id])->row_array();

			$status = $exe['driv_status'];

			if($status == 0)
			{
	?>




	let pusher  = new Pusher('711b19f530583c9309c4', 
  	{
      	cluster: 'ap1'
  	})

  	let socket 		= pusher.subscribe('motor')
	// let customerId 	= 0


	


	// check message notification
    socket.bind('pesanan-datang', function(data)
    {
    	$('#labelPesanan').html('Your customer !!')
	  		
  		// Get data detail customer
  		$.ajax({
  			method: 'post',
  			url: '<?= base_url() ?>pesan/motor/getDetailCustomer',
  			data: {
  				id: data.customerId
  			},
  			success(data)
  			{
  				$('#customerId').val(data.user_id)
  				$('#namaCustomer').html(data.user_name)
  				$('#emailCustomer').html(data.user_email)
  				$('#nomerCustomer').html(data.user_phone)
  			},
  			error($xhr)
  			{
  				console.log($xhr)
  			}
  		})

  		// Toggle Modal
  		$('#myModal5').modal('toggle')

    })

    socket.bind('batal', function(data)
    {
    	let customerId = $('#customerId').val()

    	if(customerId === data.id)
    	{
	    	$.message('Order has been canceled !!', 'ORDER', 'error')

	  		$('#myModal5').modal('toggle')
    	}
    })

    socket.bind('jalan', function(data)
    {
    	if(<?php echo $this->session->userdata('data')['id'] ?> != Number(data.driver))
  		{
  			$.message('Order has been taken !!', 'ORDER', 'warning')

  			$('#myModal5').modal('toggle')
  		}
    })


	// Jika driver tidak mau
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

	// Jika driver mau
	$('#clickPesanan').on('click', (ev) =>
	{
		let customerId = $('#customerId').val()

		$.ajax({
            method: 'post',
            url: '<?= base_url() ?>socket/jalan',
            data: {
              	status: 'Jalan',
              	driv_id: '<?php echo $this->session->userdata('data')['id'] ?>',
              	user_id: customerId 
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
	})


	<?php }} ?>
</script>