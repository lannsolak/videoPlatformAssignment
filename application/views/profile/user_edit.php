

					
					<?php

    echo form_open_multipart('profile/user_edit');
    ?>
					
									<h3>Edit</h3>
										<table class="table">
											 <?php foreach($edit_user->result() as $data): ?>
											 
												<tr>
														<td>Name</td>
														<td>:</td>
														<td>
															<?php
															 echo form_hidden('id', $data->id);
															echo form_input(array('name' => 'txtname' , 'value' => $data->name));
															?>
														</td>
												</tr>
												<tr>
													<td>Email</td>
													<td>:</td>
													<td>
														<?php
														echo $data->email;
														?>
													</td>
											</tr>
											<tr>
													<td>Password</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtpassword' , 'value' => $data->password));
														?>
													</td>
											</tr>
											<tr>
													<td>Gender</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtgender' , 'value' => $data->gender));
														?>
													</td>
											</tr>
											<tr>
													<td>Country</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtcountry' , 'value' => $data->country));
														?>
													</td>
											</tr>
											<tr>
													<td>City</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtcity' , 'value' => $data->city));
														?>
													</td>
											</tr>
											<tr>
													<td>Zipcode</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtzipcode' , 'value' => $data->zipcode));
														?>
													</td>
											</tr>
											<tr>
													<td>Phone</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtphone' , 'value' => $data->phone));
														?>
													</td>
											</tr>
											<tr>
													<td>Skill</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtskill' , 'value' => $data->skill));
														?>
													</td>
											</tr>
											<tr>
													<td>Interest</td>
													<td>:</td>
													<td>
														<?php
														echo form_input(array('name' => 'txtinterest' , 'value' => $data->interest));
														?>
													</td>
											</tr>
											
											 <?php 
											 
											 endforeach ;?>
										</table>
										
										 <?php
											echo anchor('profile', form_button('btn_close', 'Close', 'class="btn btn-info btn_action"'));
											echo form_submit('btn_edit', 'Update');
											
										?>
										
	<?php
    echo form_close();
    ?>									
										
										
										
										
							  