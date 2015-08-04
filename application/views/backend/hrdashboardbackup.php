




<div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <div class="pull-right">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <b><u>Sort By</u><b>
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createdepartmentsubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
  <div class="row">
						<label class="col-sm-1 control-label">Check</label>
						<div class="col-sm-2">
							<?php echo form_dropdown( 'check',$check,set_value( 'check'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					
      <div>
						<label class="col-sm-1 control-label">Branch</label>
						<div class="col-sm-2">
							<?php echo form_dropdown( 'branch',$branch,set_value( 'branch'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					
      </div>
	<div>
						<label class="col-sm-1 control-label">Department</label>
						<div class="col-sm-2">
							<?php echo form_dropdown( 'department',$department,set_value( 'department'), 'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."'); ?>
						</div>
					</div>
  
   <div>
						<label class="col-sm-1 control-label">Team</label>
						<div class="col-sm-2">
							<?php echo form_dropdown( 'team',$team,set_value( 'team'), 'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."'); ?>
						</div>
					</div>
    </div>
<div class="row">
<label class="col-sm-1 control-label " for="normal-field">&nbsp;</label>
<div class="col-sm-2 viewspace">
<button type="submit" class="btn btn-primary">View</button>
</div>
</div>
        
</form>
</div>
</section>
</div>
</div>
