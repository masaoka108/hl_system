<?php $this->assign('title', '月別売上'); ?>

<div class="cM_Top20 cM_Left20 cM_Right20">


<!--
  <div id="chart1"></div>


<script>

$(document).ready(function () {
    var s1 = [[2002, 112000], [2003, 122000], [2004, 104000], [2005, 99000], [2006, 121000],
    [2007, 148000], [2008, 114000], [2009, 133000], [2010, 161000], [2011, 173000]];

    var s2 = [[2002, 10200], [2003, 10800], [2004, 11200], [2005, 11800], [2006, 12400],
    [2007, 12800], [2008, 13200], [2009, 12600], [2010, 13100]];

    var s3 = [[2002, 9200], [2003, 20800], [2004, 2200], [2005, 1800], [2006, 10840],
    [2007, 14200], [2008, 1320], [2009, 16000], [2010, 17100]];

    plot1 = $.jqplot("chart1", [s1, s2, s3], {
        // Turns on animatino for all series in this plot.
        animate: true,
        // Will animate plot on calls to plot1.replot({resetAxes:true})
        animateReplot: true,
        cursor: {
            show: true,
            zoom: false,
            looseZoom: true,
            showTooltip: false
        },

        //s1,s2,s3　それぞれの設定
        series:[
            {
                pointLabels: {
                    show: false
                },
                renderer: $.jqplot.BarRenderer,
                showHighlight: false,
                //yaxis: 'y2axis',
                rendererOptions: {
                    // Speed up the animation a little bit.
                    // This is a number of milliseconds.
                    // Default for bar series is 3000.
                    animation: {
                        speed: 2500
                    },
                    barWidth: 15,
                    barPadding: -15,
                    barMargin: 0,
                    highlightMouseOver: false
                }
            },
            {
                rendererOptions: {
                    // speed up the animation a little bit.
                    // This is a number of milliseconds.
                    // Default for a line series is 2500.
                    animation: {
                        speed: 2500
                    }
                }
            },
            {
                rendererOptions: {
                    // speed up the animation a little bit.
                    // This is a number of milliseconds.
                    // Default for a line series is 2500.
                    animation: {
                        speed: 2500
                    }
                }
            }

        ],
        axesDefaults: {
            pad: 0
        },
        axes: {
            // These options will set up the x axis like a category axis.
            xaxis: {
/*
              renderer:$.jqplot.DateAxisRenderer,// プラグイン
              min: '2002-01-01',                 // 軸開始の値
              max: '2011-12-01',                 // 軸終了の値
              tickInterval:'1 year',           // 目盛りの間隔
              tickOptions:{formatString:'%Y/%m'} // 表示フォーマット
*/

                //showTicks:false,
                tickInterval: 0,
                drawMajorGridlines: false,
                drawMinorGridlines: true,
                drawMajorTickMarks: false,
                tickOptions: {
                    //formatString: "$%'d"
                    formatString: "%d",
                    markSize:1
                },
                rendererOptions: {
                tickInset: 0.5,
                //tickInset: 2,
                minorTicks: 1
            }
            },
            yaxis: {
                tickOptions: {
                    //formatString: "$%'d"
                    formatString: "%'d"
                },
                rendererOptions: {
                    forceTickAt0: true
                }
            },
            y2axis: {
                tickOptions: {
                    formatString: "$%'d"
                    //formatString: "%d"
                    //%d：整数      %f：小数     %g：データ値       %s:文字列
                },
                rendererOptions: {
                    // align the ticks on the y2 axis with the y axis.
                    alignTicks: true,
                    forceTickAt0: true
                }
            }
        },
        highlighter: {
            show: true,
            showLabel: true,
            tooltipAxes: 'y',
            sizeAdjust: 7.5 , tooltipLocation : 'ne'
        }
    });

});



</script>
-->
  <div style="width:80%" id="line"></div>

  <script>
  $(document).ready(function(){

        // オプション
        options = {
          animate: true,
          // Will animate plot on calls to plot1.replot({resetAxes:true})
          animateReplot: true,
          cursor: {
              show: true,
              zoom: false,
              looseZoom: true,
              showTooltip: false
          },

          axesDefaults: {
              pad: 0,
          },
          //データ　それぞれの設定
          series:[
              {

                color:"orange",
                  pointLabels: {
                      show: false
                  },
                  renderer: $.jqplot.BarRenderer,
                  showHighlight: true,
                  //yaxis: 'y2axis',
                  rendererOptions: {
                      // Speed up the animation a little bit.
                      // This is a number of milliseconds.
                      // Default for bar series is 3000.
                      animation: {
                          speed: 2500
                      },
                      barWidth: 15,
                      barPadding: -15,
                      barMargin: 0,
                      highlightMouseOver: false
                  }
              },
              {
                  rendererOptions: {
                      // speed up the animation a little bit.
                      // This is a number of milliseconds.
                      // Default for a line series is 2500.
                      animation: {
                          speed: 2500
                      }
                  }
              },
          ],


          highlighter: { //折れ線ポイントにマウスをのせると数値を表示する
              //show: true,
              //sizeAdjust: 7.5
              show: true,
              showLabel: true,
              tooltipAxes: 'y',
              sizeAdjust: 7.5 , tooltipLocation : 'ne'
          },
          grid: { //グリッドのカスタマイズ
              drawGridLines: false,
              //gridLineColor: '#eee',
              gridLineColor: '#BDBDBD',
              borderColor: '#ccc',
              background: '#fff',
              shadow: false,
          },
          seriesDefaults: { //シャドウをOFF
              shadow: false
          },
          seriesColors:['#428BCA'], //グラフの色
          title:{text:"<?php echo $target_year?>年 月別売上"}, //タイトル
          axes:{ // 軸
            // 横軸(x軸)
            xaxis:{
              renderer: $.jqplot.CategoryAxisRenderer,
              //renderer:$.jqplot.DateAxisRenderer,// プラグイン
              min: '<?php echo $MinDate?>',                 // 軸開始の値
              max: '<?php echo $MaxDate?>',                 // 軸終了の値
              tickInterval:'1 months',           // 目盛りの間隔
              tickOptions:{formatString:'%Y/%m'}, // 表示フォーマット
              rendererOptions: {
              //tickInset: 0.5,
              //minorTicks: 10
              }
            }
          },
          axesDefaults: {
              min:0 //目盛は0以上を表示
          }
        }

      // 表示データ
      data = <?php echo $data?>;

      plot1 = $.jqplot(
          "line",
          data,      // 表示データ
          options    // オプション
        );

  });
  </script>




<!--

<canvas id="hoge" ></canvas>
<script>

ccchart.base('', {config : {
    //"type" : "line", //チャート種類
    //"useVal" : "yes", //値を表示
    //"xScaleFont" : "100 16px 'meiryo'", //水平軸目盛フォント
    //"yScaleFont" : "100 16px 'meiryo'", //垂直軸目盛フォント
    //"hanreiFont" : "bold 16px 'meiryo'", //凡例フォント
    //"valFont" : "bold 16px 'meiryo'", //値フォント
    //"paddingTop" : "25", //上パディング
    //"paddingRight" : "140", //右パディング
    //"colorSet" : ["blue"], //データ列の色
    "useShadow" : "no", //影
    //"height" : "300", //チャート高さ
    //"width" : "900", //チャート幅
    //"useMarker" : "arc", //マーカー種類
    //"markerWidth" : "7", //マーカー大きさ
    //"valYOffset" : "8", //値オフセット
    //"valXOffset" : "-8", //値オフセット
    //"bg" : "#fff", //背景色
    "textColor" : "#000", //テキスト色
    "lineWidth" : "1", //ラインの太さ
  }});


var chartdata1 = {

  "config": {
    "title": "売上一覧",
    "subTitle": "2016年月別",
    "type": "bar",
    "xColor":"#000",
    "yColor":"#000",
    "colorSet":
        ["red","#FF9114","#3CB000","#00A8A2","#0036C0","#C328FF","#FF34C0"],
    "bgGradient": {
            "direction":"vertical",
            "from":"#fff",
            "to":"#fff"
            //"from":"#687478",
            //"to":"#222222"
        }


  },

  "data": [
    ["年/月","1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"],
    ["売上",207220,231290,375800,420800,93820,336300,157150,119300,0,0,0,0],
    ["利益",16740,192400,283500,327700,75900,191600,114500,92000,0,0,0,0]
//    ["ジュース",60,435,456,352,567,678,1260],
//    ["ウーロン",200,123,312,200,402,300,512]
  ]
};
ccchart.init('hoge', chartdata1)
</script>





<canvas id="hoge2"></canvas>
<script>
var chartdata2 = {

  "config": {
    "title": "Bar Chart",
    "subTitle": "Canvasを使ったシンプルなチャートです",
    "width": "700px",
    "type": "bar",
    "xColor":"#000",
    "yColor":"#000",

    "lineWidth": "8",
    "borderWidth": "70",
    "markerWidth": "20",
    "scaleShowLabels" : "true",
"datasetStroke" : "true",

"animation" : "true",

    "colorSet":
          ["red","#FF9114","#3CB000","#00A8A2","#0036C0","#C328FF","#FF34C0"],
    "bgGradient": {
            "direction":"vertical",
            "from":"#687478",
            "to":"#fff"
          }
  },

  "data": [
//    ["年度",2007,2008,2009,2010,2011,2012,2013],
//    ["紅茶",435,332,524,688,774,825,999],
//    ["コーヒー",600,335,584,333,457,788,900],

    ["年/月","1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"],
    ["売上",207220,231290,375800,420800,93820,336300,157150,119300,119300,119300,119300,119300,0],
    ["利益",16740,192400,283500,327700,75900,191600,114500,92000,75900,191600,191600,119300,0]


//    ["ジュース",60,435,456,352,567,678,1260],
//    ["ウーロン",200,123,312,200,402,300,512]
  ]
};
ccchart.init('hoge2', chartdata2)
</script>
-->

</div>
