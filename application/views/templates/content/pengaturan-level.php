<?php $this->load->view('templates/header') ?>

<!-- Page Content -->
<div class="page-content">
  
  <!-- GGWP -->
  <div class="content clearfix">
		
		<div id="colors" class="container mb-5">

			<div class="section-title col-lg-8 col-md-10 ml-auto mr-auto text-center">
			  <h3 class="mb-4 text-uppercase">Setting level</h3>
			  <button class="btn btn-success btn-sm" id="add-btn"><i class="fa fa-plus"></i> ADD</button>
			</div>

			<div class="example col-md-10 ml-auto mr-auto">
			  <div class="row">
			    <div class="col-md-12">
			    	<table class="table table-striped table-bordered">
			    		<thead>
			    			<tr>
			    				<th>No</th>
			    				<th>NAME</th>
			    				<th>DESCIPTION</th>
			    				<th>ACTION</th>
			    			</tr>
			    		</thead>
			    		<tbody id="render-data">
			    		</tbody>
			    	</table>
			    </div>
			  </div>
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
	
	let stat

	function render()
	{
		$.ajax({
			url: '<?= base_url() ?>pengaturan/level/getAllData',
			method: 'post',
			data: null,
			dataType: 'json',
			success(data)
			{
				let html = ''
	            let no   = 1
	            let i

	            for (i = 0; i < data.length; i++)
	            {
	            	
	            	html += 
	            		'<tr>'+
	                	'<td>'+ no++ +'</td>'+
	                	'<td>'+ data[i].lev_nama +'</td>'+
	                	'<td>'+ data[i].lev_deskripsi +'</td>'+
	                    '<td>'
	                    	  	+ '<button class="btn btn-primary btn-sm" onclick="edit('+data[i].lev_id+')">'
		    						+ '<i class="fa fa-pencil"></i> EDIT'
		    					+ '</button>'

		    					+ '&nbsp;'

		    					+ '<button class="btn btn-danger btn-sm" onclick="deleted('+data[i].lev_id+')">'
		    						+ '<i class="fa fa-times"></i> DELETE'
		    					+ '</button>'
						
						'</td>'+
	                    '</tr>'
	            }

	            // console.log(data)

	            $('#render-data').html(html)	
			},
			error($xhr)
			{
				console.log($xhr)
			}
		})
	}

	// Get detail data
	function edit(id)
	{
		stat		= 'edit'

		$('#myLabel').html('EDIT DATA')
		$('#splash').modal('toggle')

		$.ajax({
			url: '<?= base_url() ?>pengaturan/level/getDetailData',
			method: 'post',
			data: {id:id},
			dataType: 'json',
			success(data)
			{
				$('#id').val(data.lev_id)
				$('#nama').val(data.lev_nama)
				$('#deskripsi').val(data.lev_deskripsi)
			} 
		})
	}

	// Confirm delete
	function deleted(id)
	{
		$('#myModal3').modal('toggle')
		$('#labelHapus').html('Delete Data')
		$('#contentHapus').html('Are you sure to delete this data ?')
		$('#idHapus').val(id)
	}

	$(() =>
	{
		render()

		// Add btn click function
		$('#add-btn').on('click', () =>
		{
			stat		= 'add'

			$('#myLabel').html('ADD DATA')

			$('#splash').modal('toggle')
			$('#id').val('')
			$('#nama').val('')
			$('#deskripsi').val('')
		})

		// Save data
		$('#form').submit((ev) =>
		{
			ev.preventDefault()

			let id 			= $('#id').val()
			let nama 		= $('#nama').val()
			let deskripsi 	= $('#deskripsi').val()

			if(stat == 'add')
			{
				$.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/add',
					data: {
						nama: nama,
						deskripsi: deskripsi
					},
					success(data)
					{
						render()

						$.message("Data added !!", 'LEVEL', 'success')
					}
				})
			}
			else
			{
				$.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/level/update',
					data: {
						id: id,
						nama: nama,
						deskripsi: deskripsi
					},
					success(data)
					{
						render()
						
						$.message("Data edited !!", 'LEVEL', 'success')
					}
				})
			}

			$('#splash').modal('toggle')
		})

		// Delete
		$('#clickHapus').on('click', () =>
		{
			let id 		= $('#id').val()

			$.ajax({
				method: 'post',
				url: '<?= base_url() ?>pengaturan/level/delete',
				data: {id:id},
				success(data)
				{
					render()

					$.message("Data deleted !!", 'LEVEL', 'success')
					$('#myModal3').modal('toggle')
				}
			})
		})
	})
</script>