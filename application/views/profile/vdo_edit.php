
				
					<?php

				    echo form_open_multipart('profile/vdo_edit');
				    ?>
					
									<h3>Edit VDO</h3>
										<table class="table">
											 <?php foreach($edit_vido->result() as $data): ?>
											 
												<tr>
														<td>Title</td>
														<td>:</td>
														<td>
															<?php
															 echo form_hidden('id', $data->id);
															echo form_input(array('name' => 'vtitle' , 'value' => $data->title));
															?>
														</td>
												</tr>
												<tr>
													<td>Description</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vdescription' , 'value' => $data->description));
														?>
													</td>
												</tr>
												<tr> 	 	 	 	 	
													<td>Size</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vsize' , 'value' => $data->size));
														?>
													</td>
												</tr>
												<tr>
													<td>Extention</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vextention' , 'value' => $data->extension));
														?>
													</td>
												</tr>
												<tr>
													<td>Length</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vlenght' , 'value' => $data->length));
														?>
													</td>
												</tr>
												<tr>
													<td>Path</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vpath' , 'value' => $data->path));
														?>
													</td>
												</tr>
												<tr>
													<td>Thumbnail</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vthumbnail' , 'value' => $data->thumbnail));
														?>
													</td>
												</tr>
												<tr>
													<td>Views</td> 	 	
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vviews' , 'value' => $data->views));
														?>
													</td>
												</tr>
												<tr>
													<td>Likes</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vlikes' , 'value' => $data->likes));
														?>
													</td>
												</tr>
												<tr>
													<td>Status</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'vstatus' , 'value' => $data->status));
														?>
													</td>
												</tr>
											 <?php 
											 
											 endforeach ;?>
										</table>
										
										 <?php
											echo anchor('profile', form_button('btn_close', 'Close', 'class="btn btn-info btn_action"'));
											echo form_submit('update_vdo', 'Update');
											
										?>
										
	<?php
    echo form_close();
    ?>									
										
										
										
										
							  