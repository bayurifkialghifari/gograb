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
			  <h3 class="mb-4 text-uppercase">Your profile</h3>
			</div>

			<div class="example col-md-10 ml-auto mr-auto">
				<form id="form">
				  	<?php if($this->session->userdata('data')['level'] == 'Driver') : ?>
				  		<div class="row">
						    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
						      <label>STATUS</label>
						      <input required="" type="text" id="status" readonly="" class="form-control" value="<?= $this->session->userdata('data')['level'] ?>">
						    </div>
						</div>

						<div class="row pt-3">
						    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
						      <label>Name</label>
						      <input required="" type="text" id="nama" class="form-control" value="<?= $this->session->userdata('data')['nama'] ?>">
						    </div>
						</div>

						<div class="row pt-3">
						    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
						      <label>Email</label>
						      <input required="" type="text" id="email" class="form-control" value="<?= $this->session->userdata('data')['email'] ?>">
						    </div>
						</div>

						<div class="row pt-3">
						    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
						      <label>Motorcycle</label>
						      <br>
						      <button type="button" class="btn btn-primary btn-sm" id="complete-motor">Complete it</button>
						    </div>
						</div>

						<div class="row pt-3">
						    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
						      <label>KTP</label>
						      <input required="" type="text" id="ktp" class="form-control" value="">
						    </div>
						</div>

						<div class="row pt-3">
						    <div class="color-wrapper col-lg-12 col-md-12 col-sm-12">
						      <label>Address</label>
						      <textarea required="" id="alamat" class="form-control"> </textarea>
						    </div>
						</div>
				  	<?php endif; ?>
				  	<input type="submit" id="save" class="btn btn-success btn-sm mt-5" value="Save">
				</form>
			</div>

		</div>

	</div>
	<!-- GGWP -->

</div>

<!-- Modal -->
<div class="modal fade" id="splash" tabindex="-1" role="dialog" aria-hidden="true">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<h3 class="modal-title" id="myLabel"></h3>
      		</div>
      		<form role="form" id="form" method="post">
	        	<div class="modal-body">
	          		<input type="hidden" id="id" value="0" name="id">
	      			<div class="row">
	        			<div class="col-md-12">
	          				<div class="form-group">
	            				<label for="tanggal">Name</label>
	            				<input type="text" class="form-control" name="nama" id="nama" required="">
	          				</div>
	        			</div>
	      			</div>
	      			<div class="row">
	        			<div class="col-md-12">
	          				<div class="form-group">
	            				<label for="tanggal">Description</label>
	            				<textarea class="form-control" name="deskripsi" id="deskripsi" required="">
	            				</textarea>
	          				</div>
	        			</div>
	      			</div>
	        	</div>
	        	<hr>
	        	<div class="modal-footer">
	          		<button type="submit" class="btn btn-success btn-border">Save</button>
	          		<button class="btn btn-danger btn-border" data-dismiss="modal">Cancel</button>
	        	</div>
      		</form>
    	</div>
  	</div>
</div>

<?php $this->load->view('templates/footer') ?>

<script type="text/javascript">
	$(() =>
	{
		$('#form').submit((ev) =>
		{
			ev.preventDefault()
		})

		$('#complete-motor').on('click', () =>
		{
			$('#splash').modal('toggle')
		})
	})
</script>