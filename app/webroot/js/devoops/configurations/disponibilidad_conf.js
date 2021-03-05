

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
