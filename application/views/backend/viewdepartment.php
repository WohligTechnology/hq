<div class="row" style="padding:1% 0">
    <div class="col-md-10">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createdepartment"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
	<div class="col-md-2">
	
		<a class="btn btn-secondary"  href="<?php echo site_url('site/uploaddepartmentcsv'); ?>"><i class="icon-trash"></i>Upload CSV</a> &nbsp; 
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <!--
<header class="panel-heading">
department Details
</header>
-->
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("Department List");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">Name</th>
                            <th data-field="deptid">Dept id</th>
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
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.deptid + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editdepartment?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' href='<?php echo site_url('site/deletedepartment?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>
