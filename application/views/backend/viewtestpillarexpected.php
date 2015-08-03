<div class="row" style="padding:1% 0">
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createtestpillarexpected"); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
</div>
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<!--
<header class="panel-heading">
useranswer Details
</header>
-->
<div class="drawchintantable">
<?php $this->chintantable->createsearch("test pillar expected List");?>
<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
<thead>
<tr>
<th data-field="id">ID</th>
<!--<th data-field="question">Question</th>-->
<!--<th data-field="option">Option</th>-->
<th data-field="test">Test</th>
<th data-field="pillar">Pillar</th>
<th data-field="expectedvalue">Expected Value</th>
<th data-field="action">Action</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
<?php $this->chintantable->createpagination();?>
</div>
</section>
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.test + "</td><td>" + resultrow.pillar + "</td><td>" + resultrow.expectedvalue + "</td>><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/edittestpillarexpected?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deletetestpillarexpected?id='); ?>"+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
