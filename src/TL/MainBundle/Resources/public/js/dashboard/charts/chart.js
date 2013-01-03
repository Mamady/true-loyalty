$(function () {
    try {
    var feedback = [ [0.6, 3], [2.6,4], [3.6, 3], [5.6,19], [6.6,33], [7.6,37], [8.6,88], [9.6, 77]];

    var plot = $.plot($("#chart"), [ 
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
    $("#chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

        if ($("#chart").length > 0) {
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

    $("#chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });
    } catch(e) {
    }
});
