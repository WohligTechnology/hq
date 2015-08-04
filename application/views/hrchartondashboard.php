<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>
<!--<div id="container" style="height: 400px"></div>-->
<div id="nodata" style="display:none;">No Data Found</div>
<?php print_r($weightgraph);?>
<?php 
        for($i=0;$i<count($weightgraph);$i++)
        { 
        ?>
<div id="container<?php echo $i; ?>"></div>
<!--<div id="container1"></div>-->
<?php } ?>

<script>
    
    $(function () {
        <?php
if(empty($weightgraph))
{
    ?>
$('#nodata').show();
        <?php
}
        for($i=0;$i<count($weightgraph);$i++)
        { 
        ?>
        $('#container<?php echo $i; ?>').highcharts({
            credits: {
                enabled: false
            },
            chart: {
                type: 'column',
//                options3d: {
//                    enabled: true,
//                    alpha: 15,
//                    beta: 15,
//                    depth: 50
//                }
            },
            title: {
                text: 'Pillar-Wise Average of <?php echo $weightgraph[$i][0]->testname;?>'
            },
            xAxis: {
                categories: [
                <?php
                    foreach($weightgraph[$i] as $key=>$value)
                    {
                        if($key==0)
                        {
                        echo "'$value->name'";
                        }
                        else
                        {
                        echo ","."'$value->name'";
                        }
                    }
                    
                    ?>
            ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Score'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Pillar',
                data: [
                <?php
                    foreach($weightgraph[$i] as $key=>$value)
                    {
                        if($key==0)
                        {
                        echo "$value->weight";
                        }
                        else
                        {
                        echo ","."$value->weight";
                        }
                    }
                    ?>
                ]

        }, {
                name: 'Expected',
                data: [
                <?php
                    foreach($weightgraph[$i] as $key=>$value)
                    {
                        if($key==0)
                        {
                        echo "$value->testexpectedweight";
                        }
                        else
                        {
                        echo ","."$value->testexpectedweight";
                        }
                    }
                    ?>
                ]

        }, {
                name: 'Actual',
                data: [
                <?php
                    foreach($weightgraph[$i] as $key=>$value)
                    {
                        if($key==0)
                        {
                        echo $value->pillaraveragevalues;
                        }
                        else
                        {
                        echo ",".$value->pillaraveragevalues;
                        }
                    }
                    ?>
                ]

        }]
        });
        <?php } ?>
    });
    
   
</script>


<?php //foreach($category as $key=>$val) // { // if($key==0) // { // echo $val; // } // else // { // echo ",".$val; // } // } ?>
