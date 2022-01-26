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
			  <p>Say hello to your flagship application.</p>
			</div>

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

<?php $this->load->view('templates/footer') ?>