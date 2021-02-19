<html>
<head>

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
<body>
<!--  //////////////Graph code////////////////////////////////////-->

<div id="printableArea">
<div id="chart-container" align="center">FusionCharts will render here</div>
</div>
<!--  //////////////Graph code////////////////////////////////////-->

<?php 
$c1 = 4;
$c2 = 7;
$c3 = 3;
$c4 = 6;


$c11 = array("label"=>"bar1", "value" => $c1);
$c22 = array("label"=>"bar2", "value" => $c2);
$c33 = array("label"=>"bar3", "value" => $c3);
$c44 = array("label"=>"bar4", "value" => $c4);

$totalarra1 = array($c11, $c22, $c33, $c44);

$totalarra = json_encode($totalarra1);

?>





   <script type="text/javascript" language="javascript" src="{{ URL::asset('js/fusioncharts.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ URL::asset('js/fusioncharts.charts.js') }}"></script>
<script type="text/javascript">
    FusionCharts.ready(function(){
        var dataset = <?php echo $totalarra; ?>;
    var fusioncharts = new FusionCharts({
    type: 'column3d',
    renderAt: 'chart-container',
    width: '720',
    height: '380',
    dataFormat: 'json',
    dataSource: {
        "chart": {
    	"caption": "Graphical Report",
        //"subCaption": "Sales by quarter",
        "xAxisName": "X-Axis Name",
        "yAxisName": "<?php echo 'Y-Axis Name'; ?>",
        "numberPrefix": " ",
        "paletteColors": "#0075c2,#1aaf5d,#f2c500",
        "bgColor": "#ffffff",                
        "showBorder": "0",
        "showCanvasBorder": "0",
        "usePlotGradientColor": "0",
        "plotBorderAlpha": "10",
        "legendBorderAlpha": "0",
        "legendBgAlpha": "0",
        "legendShadow": "0",
        "showHoverEffect" : "1",
        "valueFontColor": "#ffffff",
        "rotateValues": "1",
        "placeValuesInside": "1",
        "divlineColor": "#999999",
        "divLineIsDashed": "1",
        "divLineDashLen": "1",
        "divLineGapLen": "1",
        "canvasBgColor": "#ffffff",
        "captionFontSize": "14",
        "subcaptionFontSize": "14",
        "subcaptionFontBold": "0"
        },

        "data": dataset
    }
});
    fusioncharts.render();
    });
</script>
<!--  //////////////Graph code////////////////////////////////////-->
</body>
</html>