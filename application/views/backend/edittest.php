	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/edittestsubmit');?>" enctype= "multipart/form-data">
				<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
				
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name',$before->name);?>">
				  </div>
				</div>

			 <div class="form-group">
						<label class="col-sm-2 control-label" for="normal-field">Units</label>
						<div class="col-sm-4">
							<input type="text" id="normal-field" class="form-control" name="units" value="<?php echo set_value('units',$before->units);?>">
						</div>
					</div>
                    <div class="form-group">
						<label class="col-sm-2 control-label" for="normal-field">Startdate</label>
						<div class="col-sm-4">
							<input type="date" id="normal-field" class="form-control" name="startdate" value="<?php echo set_value('startdate',$before->startdate);?>">
						</div>
					</div>
			
					<div class=" form-group">
						<label class="col-sm-2 control-label">Schedule</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'schedule',$schedule,set_value( 'schedule',$before->schedule), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
                  <div class=" form-group">
						<label class="col-sm-2 control-label">Check</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'check',$check,set_value( 'check',$before->check), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div> 
                  <div class=" form-group">
						<label class="col-sm-2 control-label">Designation</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'designation',$designation,set_value( 'designation',$before->designation), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					<div class=" form-group">
						<label class="col-sm-2 control-label">Department</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'department',$department,set_value( 'department',$before->department), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
					
					<div class=" form-group">
						<label class="col-sm-2 control-label">Branch</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'branch',$branch,set_value( 'branch',$before->branch), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
				
						<div class=" form-group">
						<label class="col-sm-2 control-label">Team</label>
						<div class="col-sm-4">
							<?php echo form_dropdown( 'team',$team,set_value( 'team',$before->team), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
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
<script type="text/javascript">
    function operatorcategories() {
        console.log($('#accesslevelid').val());
        if($('#accesslevelid').val()==2)
        {
            $( ".categoryclass" ).show();
        }
       
        else
        {
            $( ".categoryclass" ).hide();
        }
       
    }
</script>