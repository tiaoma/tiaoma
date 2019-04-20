$(function(){
	/*$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
  */  if($("#datetimeStart").length>0){
     //日期时间选择器
    
    $("#datetimeStart").datetimepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        minView: "month",
        maxView: "decade",
        todayBtn: true,
        pickerPosition: "bottom-left"
    }).on("click",function(ev){
        $("#datetimeStart").datetimepicker("setEndDate", $("#datetimeEnd").val());
    });
    $("#datetimeEnd").datetimepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        minView: "month",
        maxView: "decade",
        todayBtn: true,
        pickerPosition: "bottom-left"
    }).on("click", function (ev) {
        $("#datetimeEnd").datetimepicker("setStartDate", $("#datetimeStart").val());
    });
    
}




});
function getDataChar(selType,title)
{
    var i=0;
    $.ajax({
        url:$("input[name='getdateUrl']").val(),
        dataType:'json',
        data:{'select_times':selType.select_times,'select_studyType':selType.select_studyType,isajax:1},
        success:function(data){              
            
            barChart('main',title,data.list);
                         
        }
    });
}
//统计树状图
function barChart(obj,title,data,rotatenum)
{
    var xAxis = new Array();
    var seriesData = new Array();
    for(var i=0;i<data.length;i++)
    {
        xAxis.push(data[i]['name']);
        seriesData.push(data[i]['value']);
    }

    //console.log(seriesData);return;

    rotatenum = rotatenum==undefined?0:rotatenum;
require.config({
        paths: {
            echarts: $("input[name='themebaseUrl']").val()+''
        }
    });
    require(
        [
            'echarts',
            'echarts/theme/blue',  
            'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
        ],
        function (ec,theme) {

    var myChart = ec.init(document.getElementById(obj),theme);
    myChart.setOption({
        tooltip : {
            show:true,
            trigger: 'axis'
        },
        legend: {
            show:true,
            data:[title]
        },
        toolbox: {
            show : false,
            
        },
        calculable : false,
        grid:
            {
                x:50,
                y:80,
                x2:50,
                y2:100
            }
        ,
        xAxis : [
        {
            axisLabel:{   
                rotate:rotatenum,                         
                interval:0                  
                /*formatter: function(v){ 

                  return v;
               }  */                         
            },
            type : 'category',
            data :xAxis
        }
        ],
        yAxis : [
        {
            type : 'value',
            splitArea : {show : true}
        }
        ],
        series : [
        {
            name:title,
            type:'bar',
            barMaxWidth:10,
            itemStyle: {
                normal: {
                   
                    label : {
                        show: true, position: 'top'
                    }
                }
            },
            data:seriesData
        }

        ],noDataLoadingOption:{                     
                    text:"暂无数据"                      
                    ,x:"center"                    
                    ,y:"center"                     
                    ,effect :"dynamicLine"                    
                }
    });  
    }
    );  
}

 
  
    
