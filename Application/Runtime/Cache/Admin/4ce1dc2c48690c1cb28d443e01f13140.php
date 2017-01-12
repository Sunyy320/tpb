<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>我的项目</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/tpb/Public/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/tpb/Public/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/tpb/Public/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/tpb/Public/css/animate.css" rel="stylesheet">
    <link href="/tpb/Public/css/style.css?v=4.1.0" rel="stylesheet">

    <link href="/tpb/Public/css/bootstrap-editable.css" rel="stylesheet">
    <link href="/tpb/Public/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <style type="text/css">
        .table th, .table td {
            text-align: center;
            vertical-align: middle!important;
        }
    </style>


</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">

    <!--标题栏开始-->
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>管理我的项目<small class="m-l-sm">Now,进行项目编辑！</small></h5>
        </div>
    </div>
    <!--标题栏结束-->


    <!-- Panel Other -->
    <div class="ibox float-e-margins">

        <div class="ibox-content">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <!-- Example Events -->
                    <div class="example-wrap">
                        <h4 class="example-title">项目管理</h4>
                        <div class="example">

                            <div class="alert alert-success" id="examplebtTableEventsResult" role="alert">
                                 查看简单项目配置，并可以对项目配置进行更改！
                            </div>


                            <table data-toggle="table" data-url="<?php echo U('Vote/getAll');?>" id="table">
                                <thead>
                                <tr>
                                    <th data-field="id">项目编号</th>
                                    <th data-field="votename">项目名称</th>
                                    <th data-field="voteway">投票形式</th>
                                    <th data-field="votenums">设置票数</th>
                                    <th data-field="templetid">使用模板</th>
                                    <th data-field="startime">开始时间</th>
                                    <th data-field="endtime">结束时间</th>
                                    <th data-field="voterule">投票规则</th>
                                    <th data-field="picdes">封面描述</th>
                                    <th data-field="operation"
                                        data-formatter="actionFormatter"
                                        data-events="actionEvents">操作</th>
                                </tr>
                                </thead>
                            </table>


                        </div>
                    </div>
                    <!-- End Example Events -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Panel Other -->
</div>

<!-- 全局js -->
<script src="/tpb/Public/js/jquery.min.js?v=2.1.4"></script>
<script src="/tpb/Public/js/bootstrap.min.js?v=3.3.6"></script>

<!-- 自定义js -->
<script src="/tpb/Public/js/content.js?v=1.0.0"></script>


<!-- Bootstrap table -->
<script src="/tpb/Public/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/tpb/Public/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/tpb/Public/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>


<script src="/tpb/Public/js/bootstrap-editable.js"></script>
<script src="/tpb/Public/js/plugins/toastr/toastr.min.js"></script>



</body>
<script>

    $(function(){
        toastr.options.positionClass = 'toast-top-center';

        //隐藏id,行
        $('#table').bootstrapTable('hideColumn', 'id');
    });

    var API_URL = "<?php echo U('Vote/getAll');?>";
    var $table = $('#table').bootstrapTable({url: API_URL});

    function actionFormatter(value, row, index) {
        return '<a href="#" class="update" >修改</a> ' + '<a href="#" class="delete">删除</a>';
    }

    window.actionEvents = {
        'click .update': function(e, value, row) {
            window.location.href="<?php echo U('Vote/updateVote');?>?id="+row.id;
        },
        'click .delete' : function(e, value, row) {
            if (confirm('确定删除该记录吗?')) {
                $.ajax({
                    url:"<?php echo U('Vote/deleteVote');?>",
                    type: 'POST',
                    data:{"vote_id":row.id},
                    success: function (data) {
                        if(data['status']){
                            $table.bootstrapTable('refresh');
                            toastr.success('恭喜您，删除成功!',1500);
                        }
                    }, error: function () {
                        toastr.error('哎呀呀！出现异常啦，删除失败，请稍后重试',1500);
                    }
                })
            }
        }
    }










</script>








</html>