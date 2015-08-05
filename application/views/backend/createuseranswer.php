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
                <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createuseranswersubmit");?>' enctype='multipart/form-data'>
                    <div class="panel-body">
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">User</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "user",$user,set_value( 'user'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Pillar</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "pillar",$pillar,set_value( 'pillar'), "id='pillarid' class='pillar chzn-select form-control'");?>
                            </div>
                        </div>
                        
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Test</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "test",$test,set_value( 'test'), 'id="testid" class="test chzn-select form-control"');?>
                            </div>
                        </div>
                        
                        
<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">test</label>
				  <div class="col-sm-4">
					<?php echo form_dropdown('test', $test, set_value('test'), 'id="testid" class="test chzn-select form-control" 	data-placeholder="Choose a test..."');
?>
				  </div>
				</div>
-->

				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">question</label>
				  <div class="col-sm-4">
						<select class="question form-control" name="question">

						</select>
				  </div>
				</div>

				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">option</label>
				  <div class="col-sm-4">
						<select class="option form-control" name="option">

						</select>
				  </div>
				</div>

<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Pincode</label>
				  <div class="col-sm-4">
					<select class="pincode form-control" name="pincode">

					</select>
				  </div>
				</div>
-->
				
                        
                        
                        
<!--
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Question</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "question",$question,set_value( 'question'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Option</label>
                            <div class="col-sm-4">
                                <?php echo form_dropdown( "option",$option,set_value( 'option'), "class='chzn-select form-control'");?>
                            </div>
                        </div>
-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="normal-field">Order</label>
                            <div class="col-sm-4">
                                <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ');?>'>
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
<script>
      
 function populate(data,$select,value)
{
	$select.html("");
    $select.append("<option value=''>SELECT A VALUE</option>");
	for(var i=0;i<data.length;i++)
	{
		$select.append("<option value='"+data[i].id+"'>"+data[i].name+"</option>");
	}
}

$(document).ready(function() {
	var $test=$("select.test");
	var $question=$("select.question");
	var $option=$("select.option");
	var $pillar=$("select.pillar");
    var new_base_url="<?php echo site_url(); ?>";
	
    $test.change(function(){
		$.getJSON(new_base_url+'/site/getquestionbytest',{test:$test.val(),pillar:$pillar.val()},function(data){
			populate(data,$question);
		});
	});
    
    $question.change(function(){
		$.getJSON(new_base_url+'/site/getoptionbyquestion',{question:$question.val()},function(data){
			populate(data,$option);
		});
	});
    
    
  
});  
    
</script>