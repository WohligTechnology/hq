<div class="row" style="padding:1% 0">
  
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            
  
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("List Of Questions");?>
                <a href="<?php echo site_url("site/edittestquestion?id=").$this->input->get('id'); ?>" class="btn btn-info pullrightside">Cancel</a>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                        
                            <th data-field="test">Test</th>
                            <th data-field="question">Question</th>
<!--                                <th data-field="datetimestatus">Datetimestatus</th>-->
                                <th data-field="dateandtime">Dateandtime</th>
                                <th data-field="sendstatus">Sendstatus</th>
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
                if(resultrow.sendstatus==0){
                resultrow.sendstatus="Not Send"
                }
                else if(resultrow.sendstatus==1){
                resultrow.sendstatus="Send"
                }
                return "<tr><td>" + resultrow.test + "</td><td>" + resultrow.question + "</td><td>" + resultrow.dateandtime + "</td><td>" + resultrow.sendstatus + "</td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div>
