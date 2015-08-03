<section class="panel">
		    <header class="panel-heading">
				  Test Questions
			</header>
			<div class="panel-body">
				<form class="form-horizontal row-fluid" method="post" action="<?php echo site_url('site/edittestquestionsubmit');?>" enctype= "multipart/form-data">
					<div class="form-row control-group row-fluid" >
						<label class="control-label span3" for="normal-field">ID</label>
						<div class="controls span9">
						  <input type="text" id="normal-field" class="row-fluid" name="id" value="<?php echo $before->id;?>">
						</div>
					</div>
	
					<div class="form-group">
						<label class="col-sm-2 control-label">Questions</label>
						<div class="col-sm-4">
						 <?php 
						 foreach($table as $row)
						 {	 ?>
								<input type="checkbox" id="inlineCheckbox1" name="question[]" value="<?php echo $row->id; ?>" <?php if(in_array($row->id,$before['selectedquestions'])) echo 'checked'; ?>>&nbsp;<?php echo $row->question; ?> <br>
					<?php	 }
						 ?>
						</div>
					</div>
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
							<button type="submit" class="btn btn-info">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</section>









<!--
<div class="row" style="padding:1% 0">
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createtestquestion"); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
</div>
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">

<div class="drawchintantable">
<?php $this->chintantable->createsearch("test question List");?>
    <form>
<thead>
<tr>

</tr>
</thead>
<tbody>
</tbody>
</form>
<?php $this->chintantable->createpagination();?>
</div>
</section>
-->
<!--
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.question + "</td>><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/edittestquestion?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deletetestquestion?id='); ?>"+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
-->
<!--
</div>
</div>
-->
