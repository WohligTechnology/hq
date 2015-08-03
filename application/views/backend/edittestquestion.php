<section class="panel">
<header class="panel-heading">
testquestion Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/edittestquestionsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Question</label>
<div class="col-sm-4">
<?php echo form_dropdown("question",$question,set_value('question',$before->question),"class='chzn-select form-control'");?>
</div>
</div>

    <div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Test</label>
<div class="col-sm-4">
<?php echo form_dropdown("test",$test,set_value('test',$before->test),"class='chzn-select form-control'");?>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewtestquestion"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
