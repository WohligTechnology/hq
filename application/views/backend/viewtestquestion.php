<div class="row" style="padding:1% 0">
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createtestquestion"); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
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
<!--
<script>
function drawtable(resultrow) {
return "<tr><td>" + resultrow.question + "</td>><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/edittestquestion?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deletetestquestion?id='); ?>"+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
-->
</div>
</div>
