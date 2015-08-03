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
Test Pillar Expected Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createtestpillarexpectedsubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">

<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Pillar</label>
<div class="col-sm-4">
<?php echo form_dropdown("pillar",$pillar,set_value('pillar'),"class='chzn-select form-control'");?>
</div>
</div>

    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Test</label>
<div class="col-sm-4">
<?php echo form_dropdown("test",$test,set_value('test'),"class='chzn-select form-control'");?>
</div>
</div>

    <div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Expected Value</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="expectedvalue" value='<?php echo set_value('expectedvalue');?>'>
</div>
</div>
    
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewtestpillarexpected"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
