function pieHover(event, pos, obj) 
{
    if (!obj)
                return;
    percent = parseFloat(obj.series.percent).toFixed(2);
    $("#hover").html('<span style="font-weight: bold; color: '+obj.series.color+'">'+obj.series.label+' ('+percent+'%)</span>');
}
function pieClick(event, pos, obj) 
{
    if (!obj)
                return;
    percent = parseFloat(obj.series.percent).toFixed(2);
    alert(''+obj.series.label+': '+percent+'%');
}



$(function () {

    if($('.chart-gender').length != 0) {
		var genders = [ 
            {
                label: "Male",
                data: 55
            },
            {
                label: "Female",
                data: 45
            }
        ];
	
        $.plot($(".chart-gender"), genders, 
        {
            series: {
                pie: { 
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 2/3,
                        formatter: function(label, series){
                            return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
                        },
                        threshold: 0.1,
                        background: {
                            opacity: 0.5,
                            color: '#000'
                        }
                    }
                }
            },
            legend: {
                show: false
            }
        });

//        $(".chart-pie").bind("plothover", pieHover);
//        $(".chart-pie").bind("plotclick", pieClick);
	
    }
});

