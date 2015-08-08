<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>
<!--<div id="container" style="height: 400px"></div>-->
<div id="nodata" style="display:none;">No Data Found</div>
<div class="well" style="text-align: left;background-color: white;color:black;width:275px;">
    <span style="font-size: 20px;"><b>Charts of Recent Test :-</b></span>
</div>
<div id="container2"></div>


<script>
    $(document).ready(function() {
   $.getJSON(
            "<?php echo base_url(); ?>index.php/json/generatejson", {
                id: "123"
            },
            function (data) {
               
                console.log(data);
                $("#container2").highcharts(data);
            }
        );
  
}); 
    

   
</script>


<?php //foreach($category as $key=>$val) // { // if($key==0) // { // echo $val; // } // else // { // echo ",".$val; // } // } ?>


