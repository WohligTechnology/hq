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
Useranswer Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createuseranswersubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">User</label>
<div class="col-sm-4">
<?php echo form_dropdown("user",$user,set_value('user'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Pillar</label>
<div class="col-sm-4">
<?php echo form_dropdown("pillar",$pillar,set_value('pillar'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Question</label>
<div class="col-sm-4">
<?php echo form_dropdown("question",$question,set_value('question'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Option</label>
<div class="col-sm-4">
<?php echo form_dropdown("option",$option,set_value('option'),"class='chzn-select form-control'");?>
</div>
</div>
    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Test</label>
<div class="col-sm-4">
<?php echo form_dropdown("test",$test,set_value('test'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Order</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewuseranswer"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
