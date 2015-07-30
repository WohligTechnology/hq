<div class="row" style="padding:1% 0">
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createoptions"); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
</div>
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<!--
<header class="panel-heading">
options Details
</header>
-->
<div class="drawchintantable">
<?php $this->chintantable->createsearch("Options List");?>
<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
<thead>
<tr>
<th data-field="id">ID</th>
<!--<th data-field="question">Question</th>-->
<th data-field="representation">Representation</th>
<!--<th data-field="actualorder">Actual Order</th>-->
<th data-field="image">Image</th>
<th data-field="order">Order</th>
<th data-field="weight">Weight</th>
<!--<th data-field="optiontext">Option Text</th>-->
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
	var image="<a href='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' width='80px' height='80px'></a>";
                if(resultrow.image=="")
                {
                image="No Receipt Available";
                }
				if(resultrow.representation==0)
                {
               resultrow.representation="Pictorial"
                }
				if(resultrow.representation==1)
                {
               resultrow.representation="Text"
                }
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.representation + "</td><td>" + image + "</td><td>" + resultrow.order + "</td><td>" + resultrow.weight + "</td><td>" + resultrow.text + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editoptions?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deleteoptions?id='); ?>"+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
