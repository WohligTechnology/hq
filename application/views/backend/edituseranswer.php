<section class="panel">
    <header class="panel-heading">
        Useranswer Details
    </header>
    <div class="panel-body">
        <form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/edituseranswersubmit");?>' enctype='multipart/form-data'>
            <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">User</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "user",$user,set_value( 'user',$before->user),"class='chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Pillar</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "pillar",$pillar,set_value( 'pillar',$before->pillar),"id='pillarid' class='pillar chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Test</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "test",$test,set_value( 'test',$before->test)," id='testid' class='test chzn-select form-control'");?>
                </div>
            </div>
            
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Question</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "question",$question,set_value( 'question',$before->question),"id='questionid' class='question chzn-select form-control'");?>
                </div>
            </div>
            <div class=" form-group">
                <label class="col-sm-2 control-label" for="normal-field">Option</label>
                <div class="col-sm-4">
                    <?php echo form_dropdown( "option",$option,set_value( 'option',$before->option),"id='optionid' class='option chzn-select form-control'");?>
                </div>
            </div>
            
            
<!--
                    <div class=" form-group onlyfor">
                        <label class="col-sm-2 control-label" for="normal-field">State</label>
                        <div class="col-sm-4">
                            <?php echo form_dropdown( 'state', $state,set_value('state',$before->state), 'id="stateid" class="state chzn-select form-control" 	data-placeholder="Choose a State..."'); ?>
                        </div>
                    </div>

                    <div class=" form-group onlyfor">
                        <label class="col-sm-2 control-label" for="normal-field">City</label>
                        <div class="col-sm-4">
                            <?php echo form_dropdown( 'city', $city,set_value('city',$before->city), 'id="cityid" class="city chzn-select form-control" 	data-placeholder="Choose a City..."'); ?>
                        </div>
                    </div>

                    <div class=" form-group onlyfor">
                        <label class="col-sm-2 control-label" for="normal-field">Area</label>
                        <div class="col-sm-4">
                            <?php echo form_dropdown( 'area', $area,set_value('area',$before->area), 'id="areaid" class="area chzn-select form-control" 	data-placeholder="Choose a Area..."'); ?>
                        </div>
                    </div>

                    <div class=" form-group onlyfor">
                        <label class="col-sm-2 control-label" for="normal-field">Pincode</label>
                        <div class="col-sm-4">
                            <?php echo form_dropdown( 'pincode',$pincode,set_value('pincode',$before->pincode), 'id="pincodeid" class="pincode chzn-select form-control" 	data-placeholder="Choose a Pincode..."'); ?>
                        </div>
                    </div>
-->

            
            
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Order</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">Time stamp</label>
                <div class="col-sm-4">
                    <input type="text" id="normal-field" class="form-control" name="timestamp" value='<?php echo set_value(' timestamp ',$before->timestamp);?>'>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href='<?php echo site_url("site/viewuseranswer"); ?>' class='btn btn-secondary'>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>
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
	var $pillar=$("select.pillar");
	var $question=$("select.question");
	var $option=$("select.option");
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