<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js'); ?>" type="text/javascript"></script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-3d.js"></script>
<!--
<style>
    #container2 {
        height: 400px;
        min-width: 310px;
        max-width: 800px;
        margin: 0 auto;
    }
</style>
-->
<div id="container" style="height: 400px"></div>
<div id="container2"></div>
<?php //echo "hello"; //print_r($category); ?>
<script>
    //    $(function () {
    //        $('#container').highcharts({
    //            chart: {
    //                type: 'pie',
    //                options3d: {
    //                    enabled: true,
    //                    alpha: 45,
    //                    beta: 0,
    //                }
    //            },
    //            plotOptions: {
    //                pie: {
    //                    depth: 25
    //                }
    //            },
    //            series: [{
    //                data: [ <? php foreach($category as $key => $val)
    //                    {
    //                        if ($key == 0) {
    //                            echo $val;
    //                        } else {
    //                            echo ",".$val;
    //                        }
    //                        //    echo $val; 
    //    }
    //            ?> ]
    //                //            data: [2, 4, 6, 1, 3,,4,4,4,4]
    //        }]
    //        });
    //    });

    $(function () {
        $('#container2').highcharts({
            credits: {
                enabled: false
            },
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 15,
                    depth: 50
                }
            },
            title: {
                text: 'Your Pillar-Wise Average'
            },
            xAxis: {
                categories: [
                <?php
                    foreach($weightgraphbyuser as $key=>$value)
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
                    '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
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
                    foreach($weightgraphbyuser as $key=>$value)
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
                name: 'Me',
                data: [
                <?php
                    foreach($weightgraphbyuser as $key=>$value)
                    {
                        if($key==0)
                        {
                        echo $value->pillaraveragebyuserid;
                        }
                        else
                        {
                        echo ",".$value->pillaraveragebyuserid;
                        }
                    }
                    ?>
                ]

        }]
        });
    });
</script>


<?php //foreach($category as $key=>$val) // { // if($key==0) // { // echo $val; // } // else // { // echo ",".$val; // } // } ?>
