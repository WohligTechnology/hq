<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
	
	
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				User Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createusersubmit');?>" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="normal-field">Name</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>
					<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Username</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="username" value="<?php echo set_value('username');?>">
				  </div>
				</div>
-->

					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Email</label>
						<div class="col-sm-4">
							<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="description-field">Password</label>
						<div class="col-sm-4">
							<input type="password" id="description-field" class="form-control" name="password" value="">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="description-field">Confirm Password</label>
						<div class="col-sm-4">
							<input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">SocialId</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid');?>">
						</div>
					</div>

					<div class=" form-group">
						<label class="col-sm-2 control-label">logintype</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'logintype',$logintype,set_value( 'logintype'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>

					<div class=" form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'status',$status,set_value( 'status'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
						</div>
					</div>

					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Image</label>
						<div class="col-sm-4">
							<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
						</div>
					</div>

					<div class=" form-group">
						<label class="col-sm-2 control-label">Select Accesslevel</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'accesslevel',$accesslevel,set_value( 'accesslevel'), 'id="accesslevelid" onchange="operatorcategories()" class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
						</div>
					</div>

					<!--
				<div class=" form-group categoryclass" style="display:none;">
				  <label class="col-sm-2 control-label">Category</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('category[]',$category,set_value('category'),'id="select10" class="chzn-select form-control" 	data-placeholder="Choose a category..." multiple');
					?>
				  </div>
				</div>
-->

					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">json</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="json" value="<?php echo set_value('json');?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Username</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="username" value="<?php echo set_value('username');?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'gender',$gender,set_value( 'gender'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Age</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="age" value="<?php echo set_value('age');?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">Marital Status</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'maritalstatus',$maritalstatus,set_value( 'maritalstatus'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">Designation</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'designation',$designation,set_value( 'designation'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">Department</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'department',$department,set_value( 'department'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Number Of Yrs in Organization</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="noofyearsinorganization" value="<?php echo set_value('noofyearsinorganization');?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Span Of Control</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="spanofcontrol" value="<?php echo set_value('spanofcontrol');?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Description</label>
						<div class="col-sm-8">
							<textarea name="description" id="" cols="20" rows="10" class="form-control tinymce">
								<?php echo set_value( 'description');?>
							</textarea>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label" for="normal-field">Employee Id</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="employeeid" value="<?php echo set_value('employeeid');?>">
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">Branch</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'branch',$branch,set_value( 'branch'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">language</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'language',$language,set_value( 'language'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">Team</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'team',$team,set_value( 'team'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-primary">Save</button>
							<a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>
<script type="text/javascript">
	function operatorcategories() {
		console.log($('#accesslevelid').val());
		if ($('#accesslevelid').val() == 2) {
			$(".categoryclass").show();
		} else {
			$(".categoryclass").hide();
		}

	}
</script>