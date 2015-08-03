<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewtest'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Test Details
			</header>
			<div class="panel-body">
				<form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createtestsubmit');?>" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-sm-2 control-label" for="normal-field">Name</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label" for="normal-field">Units</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="units" value="<?php echo set_value('units');?>">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label" for="normal-field">Startdate</label>
						<div class="col-sm-4">
							<input type="date" id="normal-field" class="form-control" name="startdate" value="<?php echo set_value('startdate');?>">
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
						<label class="col-sm-2 control-label">Schedule</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'schedule',$schedule,set_value( 'schedule'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
				
						
					<div class=" form-group">
						<label class="col-sm-2 control-label">Check</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'check',$check,set_value( 'check'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
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
						<label class="col-sm-2 control-label">Branch</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'branch',$branch,set_value( 'branch'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
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
							<a href="<?php echo site_url('site/viewtest'); ?>" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</div>
