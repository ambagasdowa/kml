<!--@import 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css';
@import 'https://code.highcharts.com/css/highcharts.css';-->
<style>
.carousel {
    background: #fff;
    margin-top: 5px;
    padding: 3px 30px;
}
.carousel-inner >.item {
    height: 275px;
}
.paymentdetails {
    height: 265px;
    border: 1px #434348 solid;
    margin-right: 2px;
    padding: 5px;
    width: 32.5%;
    float: left;
}
.carousel-control {
    width: 0px !important;
}
.controls {
    background-color: #7070db;
    padding: 5px;
    border-radius: 15px;
    font-size: 18px !important;
}
</style>

<!--
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/js/highcharts.js"></script>
<script src="https://code.highcharts.com/js/modules/exporting.js"></script>
-->

<div class="container-fluid">
<div class="row" style="margin:20px;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="item active">
                <div class="paymentdetails">
                    <div id="lineChart1" style="width:100%; height:100%;"></div>
                </div>
                <div class="paymentdetails">
                    <div id="lineChart2" style="width:100%; height:100%;"></div>
                </div>
                <div class="paymentdetails">
                    <div id="lineChart3" style="width:100%; height:100%;"></div>
                </div>
            </div>
            <div class="item">
                <div class="paymentdetails">
                    <div id="lineChart4" style="width:100%; height:100%;"></div>
                </div>
                <div class="paymentdetails">
                    <div id="lineChart5" style="width:100%; height:100%;"></div>
                </div>
                <div class="paymentdetails">
                    <div id="lineChart6" style="width:100%; height:100%;"></div>
                </div>
            </div>
            <div class="item">
                <div class="paymentdetails">
                    <div id="lineChart7" style="width:100%; height:100%;"></div>
                </div>
                <div class="paymentdetails">
                    <div id="lineChart8" style="width:100%; height:100%;"></div>
                </div>
                <div class="paymentdetails">
                    <div id="lineChart9" style="width:100%; height:100%;"></div>
                </div>
            </div>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="controls glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="controls glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
</div>


<script>
$(function () {
    Highcharts.chart('lineChart1', {

        title: { text: 'usage 1' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart2', {

        title: { text: 'usage 2' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart3', {

        title: { text: 'Usage 3' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart4', {

        title: { text: 'Usage 4' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart5', {

        title: { text: 'Usage 5' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart6', {

        title: { text: 'Usage 6' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart7', {

        title: { text: 'Usage 7' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart8', {

        title: { text: 'Usage 8' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});
$(function () {
    Highcharts.chart('lineChart9', {

        title: { text: 'Usage 9' },
        xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']},
        tooltip: { shared: true,  useHTML: true, headerFormat: '<table><tr><td>Month: </td><td>{point.key}</td></tr>',
            pointFormat: '<tr><td>Name entered as:  </td><td><strong>{point.myData}</strong></td></tr>'+'<tr><td style="color: {series.color}">{series.name}: </td>' +
                '<td style="text-align: right"><b>${point.y}</b></td></tr>',
            footerFormat: '</table>',
            valueDecimals: 2
        },
        series: [{
            name: 'Values',
            data: [{ y: 3.00,  myData: 'abcd'  }, { y: 7.98, myData: 'wxyz'}, {y: 10.99, myData: 'efghi'},{ y: 15.65, myData: 'Ram'},{y: 23.7, myData: 'Rahim'},
                    {y: 19.45, myData: 'Suresh'}, { y: 13.23,myData: 'Mahesh'},{y: 19.98,myData: 'Ganesh'},{y: 19.87,myData: 'Pune' },{y: 16.78, myData: 'Delhi'},
                    {y: 14.76, myData: 'Mumbai'}, { y: 18.29,myData: 'New Delhi'}]
        }]
    });
});

</script>
