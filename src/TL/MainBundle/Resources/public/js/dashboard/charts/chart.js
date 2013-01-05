$(function () {

    if($('.chart-feedback').length != 0) {
        var feedback = [ [0.6, 3], [2.6,4], [3.6, 3], [5.6,19], [6.6,33], [7.6,37], [8.6,88], [9.6, 77]];

        var plot = $.plot($(".chart-feedback"), [ 
            {  
                data: feedback,
                bars: { 
                    show: true,
                    barWidth: 0.8 
                }
            } ],
            {
                grid: { hoverable: true, clickable: true },
                yaxis: { min: 0, max: 100 },
                xaxis: { 
                    min: 0,
                    max: 10.6,
                    ticks: [
                        [1,1],    
                        [2,2],    
                        [3,3],    
                        [4,4],    
                        [5,5],    
                        [6,6],    
                        [7,7],    
                        [8,8],    
                        [9,9],    
                        [10,10]
                    ]
                }
            }
        );
    }

    if($('.chart-gender').length != 0) {
        var ages = [ [10.6, 4], [12.6,4], [13.6, 7], [14.6,14], [15.6,13], [16.6,7], [17.6,18], [18.6, 17], [19.6, 7], [20.6,14], [21.6,19], [22.6,27], [23.6,30], [24.6, 47], [25.6, 55], [26.6, 50], [27.6, 36], [28.6, 30], [29.6, 24], [30.6, 18], [31.6, 12], [32.6, 3] ];

        var ageChart = $.plot($(".chart-age"), [ 
            {  
                data: ages,
                bars: { 
                    show: true,
                    barWidth: 0.8 
                }
            } ],
            {
                grid: { hoverable: true, clickable: true },
                yaxis: { 
                    min: 0, 
                    max: 60,
                    tickFormatter: function(val, axis) { return val < axis.max ? val : "Customers";}
                },

                xaxis: { 
                    min: 10,
                    max: 35,
                    tickFormatter: function(val, axis) { return (val%5 == 0 && val < axis.max) ? val : "Age";}
               }
            }
        );
    }



    if($('.chart-age').length != 0) {
        var ages = [ [10.6, 4], [12.6,4], [13.6, 7], [14.6,14], [15.6,13], [16.6,7], [17.6,18], [18.6, 17], [19.6, 7], [20.6,14], [21.6,19], [22.6,27], [23.6,30], [24.6, 47], [25.6, 55], [26.6, 50], [27.6, 36], [28.6, 30], [29.6, 24], [30.6, 18], [31.6, 12], [32.6, 3] ];

        var ageChart = $.plot($(".chart-age"), [ 
            {  
                data: ages,
                bars: { 
                    show: true,
                    barWidth: 0.8 
                }
            } ],
            {
                grid: { hoverable: true, clickable: true },
                yaxis: { 
                    min: 0, 
                    max: 60,
                    tickFormatter: function(val, axis) { return val < axis.max ? val : "Customers";}
                },

                xaxis: { 
                    min: 10,
                    max: 35,
                    tickFormatter: function(val, axis) { return (val%5 == 0 && val < axis.max) ? val : "Age";}
               }
            }
        );
    }

    if($('.chart-feedback-daily').length != 0) {
        var ratings = (function() {

            var data = [];
            for(var i=0; i<=60; i++) {
                data[i] = [i, Math.floor(Math.random() * 3)+7];
            }
            return data;
        })();

        var feedbackChart = $.plot($(".chart-feedback-daily"), [
            {
                data: ratings,
                lines: {
                    show: true
                }
            }
        ],
        {
            colors: ["#aed267"],
            grid: { hoverable: true, clickable: true },
            yaxis: { 
                min: 0, 
                max: 10,
                axisLabel: "Rating"
            },

            xaxis: { 
                min: 0,
                max: 60,
                axisLabel: "Day"
            },
            series: {
                lines: { 
                    lineWidth: 2, 
                    fill: true,
                    fillColor: { colors: [ { opacity: 0.4 }, { opacity: 0 } ] },
                    //"#dcecf9"
                    steps: false
                }
            }
        });
    }




    if($('.chart').length != 0) {

        function showTooltip(x, y, contents) {
            $('<div id="tooltip" class="chart-tooltip">' + contents + '</div>').css( {
                position: 'absolute',
                display: 'none',
                top: y - 40,
                left: x - 5,
                'z-index': '9999',
                'color': '#fff',
                'font-size': '11px',
                opacity: 0.9
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $(".chart").bind("plothover", function (event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));

            if ($(".chart").length > 0) {
                if (item) {
                    if (previousPoint != item.dataIndex) {
                        previousPoint = item.dataIndex;
                        
                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                            y = item.datapoint[1].toFixed(2);
                        
                        showTooltip(item.pageX, item.pageY,
                                    item.series.label + " of " + x + " = " + y);
                    }
                }
                else {
                    $("#tooltip").remove();
                    previousPoint = null;            
                }
            }
        });

        $(".chart").bind("plotclick", function (event, pos, item) {
            if (item) {
                $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
                plot.highlight(item.series, item.datapoint);
            }
        });
    }
});
