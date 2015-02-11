



<div class="container-fluid">
	

		
		<div class="row">
		  
					<div class="col-md-10">
					<div class="vdolist">
						<h1 class="panel-title">My Profile</h1>
					</div>
					<div class="col-md-3 photoprofile" style="float:left;">
					
						<img src="<?php echo base_url()?>/uploads/sokry.jpg" width="200" height="250"/>
						<?php echo form_open_multipart('profile/do_upload');?>
						<?php echo "<input type='file' name='userfile' size='20' />"; ?>
						<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
						<?php echo "</form>"?>
						
					</div>
					<div class="col-md-7">

							 <?php foreach($records->result() as $record): ?>
							 <table class="table table-bordered">
					
							
							 <tr>
								<td>N&ordm; </td><td><?php echo $record->id ; ?></td>
							</tr>
							 <tr>
								<td>Name </td><td><?php echo $record->name ; ?></td>
							</tr>
							 <tr>
								<td>Email </td><td><?php echo $record->email ; ?></td>
							</tr>
							 <tr>
								<td>Password </td><td><?php echo $record->password ; ?></td>
							</tr>
							 <tr>
								<td>Gender </td><td><?php echo $record->gender ; ?></td>
							</tr>
							 <tr>
								<td>Country </td><td><?php echo $record->country ; ?></td>
							</tr>
							 <tr>	
								<td>City </td><td><?php echo $record->city ; ?></td>
							</tr>
							 <tr>
								<td>Zipcode </td><td><?php echo $record->zipcode ; ?></td>
							</tr>
							<tr>
								<td>Phone </td><td><?php echo $record->phone ; ?> </td>
							</tr>
								<td>Skill </td><td><?php echo $record->skill ; ?></td>
							</tr>
							<tr>
								<td>Interest </td><td><?php echo $record->interest ; ?></td>
							</tr>
							
							
								</table>
								<?php echo anchor('profile/user_edit/' . $record->id, '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="btn-user">
Edit
</button>');
								
								?>
							<?php endforeach; ?>
							
							 
					
					</div>
					</div>
						
					
					<div class="col-md-2">
						<p>
						 <button type="button" class="btn btn-default btn-lg">Upload</button>
						</p>
					</div>
		</div>

		<div class="row">

			<div class="col-md-12">

				<div class="vdolist">
						<h1 class="panel-title">My Videos List</h1>
				</div>
				<table class="table table-bordered">
								<tr>
									<td>ID</td>
									<td>Title</td>
									<td>Description</td>
									<td>Size</td>
									<td>Extention</td>
									<td>Length</td>
									<td>Path</td>
									<td>Thumbnail</td>

									<td>Views</td>
									<td>Likes</td>
									<td>Status</td>
									<td>User Name</td>
									<td>Action</td>
								</tr>
  
				<?php 
								foreach ($vdouser -> result() as $vdolistall) : ?>

								
									<tr>
										<td><?php echo $vdolistall->id ; ?></td>

										<td><?php echo $vdolistall->title ; ?></td>
										<td><?php echo $vdolistall->description ; ?></td>

										<td><?php echo $vdolistall->size ; ?></td>
										<td><?php echo $vdolistall->extension ; ?></td>
										<td><?php echo $vdolistall->length ; ?></td>
										<td><?php echo $vdolistall->path ; ?></td>
										<td><?php echo $vdolistall->thumbnail ; ?></td>
										<td><?php echo $vdolistall->views ; ?></td>
										<td><?php echo $vdolistall->likes ; ?></td>
										<td><?php echo $vdolistall->status ; ?></td>
										<td><?php echo $vdolistall->name ; ?></td>
										<td><?php echo anchor('profile/vdo_edit/' . $vdolistall->id, 'Edit');
								
								?>&nbsp;|&nbsp;<?php echo anchor('profile/delete_vdo/' . $vdolistall->id, 'Delete');
								
								?></td>
										
									</tr>

								<?php endforeach ;?>
				
				</table>		
						
			</div>
		</div>

 
		<div class="row">

			<div class="col-md-12">

				<div class="vdolist">
						<h1 class="panel-title">My Contest Videos</h1>
				</div>
				<table class="table table-bordered">
								<tr>
									<td>ID</td>
									<td>Title</td>
									<td>Description</td>
									<td>Prize</td>
									<td>Contace Address</td>
									<td>Status</td>
									<td>Startdate</td>
									<td>Enddate</td>
									<td>EndVotedate</td>
									<td>Resultdate</td>
									
								</tr>
  
				<?php 
								foreach ($contestvdo -> result() as $vdocontest) : ?>

								
									<tr>
										<td><?php echo $vdocontest->id ; ?></td>
										<td><?php echo $vdocontest->title ; ?></td>
										<td><?php echo $vdocontest->description ; ?></td>

										<td><?php echo $vdocontest->prize ; ?></td>
										<td><?php echo $vdocontest->contact_detail ; ?></td>
										<td><?php echo $vdocontest->status ; ?></td>
										

										<td><?php echo $vdocontest->startdate ; ?></td>
										<td><?php echo $vdocontest->enddate ; ?></td>
										<td><?php echo $vdocontest->endvotedate ; ?></td>
										<td><?php echo $vdocontest->resultdate ; ?></td>
										  	 	 
									</tr>

								<?php endforeach ;?>
				
				</table>		
						
			</div>
		</div>





</div>