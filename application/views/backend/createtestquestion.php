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
Test Question Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createtestquestionsubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">

<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Question</label>
<div class="col-sm-4">
<?php echo form_dropdown("question",$question,set_value('question'),"class='chzn-select form-control'");?>
</div>
</div>

    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Test</label>
<div class="col-sm-4">
<?php echo form_dropdown("test",$test,set_value('test'),"class='chzn-select form-control'");?>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewtestquestion"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
