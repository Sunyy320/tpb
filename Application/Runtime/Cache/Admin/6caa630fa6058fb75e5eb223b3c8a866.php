<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 树形视图</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="/tpb/Public/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/tpb/Public/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="/tpb/Public/css/animate.css" rel="stylesheet">
    <link href="/tpb/Public/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/tpb/Public/css/plugins/treeview/bootstrap-treeview.css" rel="stylesheet">

    <link href="/tpb/Public/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
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
            <h5>投票人员管理<small class="m-l-sm">Now,进行项目编辑！</small></h5>
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
                        <h4 class="example-title">人员管理</h4>
                        <div class="example">

                            <!--提示信息开始-->
                            <div class="alert alert-success" id="examplebtTableEventsResult" role="alert">
                                对投票项目的候选人员和投票人员进行编辑，也可以直接导入数据，避免了繁琐的输入！
                            </div>
                            <!--提示信息结束-->


                            <div class="col-sm-12">
                                <div class="ibox float-e-margins">
                                    <!--标题开始-->
                                    <div class="ibox-title">
                                        <h5>投票列表</h5>
                                    </div>
                                    <!--标题结束-->


                                    <!--主体内容开始-->
                                    <div class="ibox-content">
                                        <!--树形列表开始-->
                                        <div class="col-sm-3">
                                            <div id="treeview11" class="test"></div>
                                        </div>
                                        <!--树形列表结束-->


                                        <div class="col-sm-9">

                                            <!--投票人隐藏图标-->
                                            <div class="btn-group hidden-xs" id="toolbar" role="group" style="display: none">
                                                <button type="button" class="btn btn-outline btn-default" data-toggle="modal" data-target="#addTpr">
                                                    <i class="glyphicon glyphicon-plus" aria-hidden="true">添加人员</i>
                                                </button>

                                                <button type="button" class="btn btn-outline btn-default">
                                                    <i class="glyphicon glyphicon-upload" aria-hidden="true">上传excel</i>
                                                </button>

                                            </div>


                                            <!--候选人隐藏图标-->
                                            <div class="btn-group hidden-xs" id="toolbar2" role="group" style="display: none">
                                                <button type="button" class="btn btn-outline btn-default" onclick="addHxr()">
                                                    <i class="glyphicon glyphicon-plus" aria-hidden="true">添加人员</i>
                                                </button>

                                            </div>

                                            <input type="hidden" id="iswhich" value=""/>

                                            <!--投票人表格-->
                                            <table data-toggle="table" id="tabletpr">
                                                <thead>
                                                <tr>

                                                    <th data-field="id">编号</th>
                                                    <th data-field="personame">姓名</th>
                                                    <th data-field="department">部门</th>
                                                    <th data-field="joinflag">身份标识</th>
                                                    <th data-field="daynums">已投票数</th>
                                                    <th data-field="isfull">可否再投</th>
                                                    <th data-field="status">投票人资格</th>
                                                    <th data-field="operation"
                                                        data-formatter="actionFormatter"
                                                        data-events="actionEvents">操作</th>
                                                </tr>
                                                </thead>
                                            </table>


                                            <!--候选人表格-->
                                            <table data-toggle="table" id="tablehxr"
                                            style="display: none">
                                                <thead>
                                                <tr>

                                                    <th data-field="id">编号</th>
                                                    <th data-field="perpic">图片</th>
                                                    <th data-field="personame">姓名</th>
                                                    <th data-field="department">部门</th>
                                                    <th data-field="joinflag">身份标识</th>
                                                    <th data-field="brifintro">简介</th>
                                                    <th data-field="daynums">获得票数</th>
                                                    <th data-field="lables">标签</th>
                                                    <th data-field="status">候选人资格</th>
                                                    <th data-field="operation"
                                                        data-formatter="actionFormatter"
                                                        data-events="actionEvents">操作</th>
                                                </tr>
                                                </thead>
                                            </table>


                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                    <!--主体内容结束-->
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>

<!--增加投票人开始-->
<div class="modal fade" id="addTpr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">增加投票人</h4>
            </div>


            <!--增加投票人信息表单-->
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="addTprForm">

                    <input type="hidden" id="info" value="" name="info" >

                    <div class="form-group">
                        <label for="personame" class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="personame" name="personame" placeholder="请输入名字">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="joinflag" class="col-sm-2 control-label">标识</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="joinflag"
                                   name="joinflag" placeholder="请输入投票人身份验证">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="department" class="col-sm-2 control-label">部门</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="department"
                                   name="department" placeholder="请输入所在部门">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">可否投票</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status"  id="status">
                                <option value="0">是</option>
                                <option value="1">否</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="alert alert-danger" id="warntpr">
                                警告信息
                            </div>
                        </div>

                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-default">增加投票人</button>
                        </div>
                    </div>



                </form>

            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--增加投票人结束-->


<!--增加候选人-->
<div class="modal fade" id="addHxr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">增加候选人</h4>
            </div>


            <!--增加投票人信息表单-->
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="addHxrForm">

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="personame" placeholder="请输入名字" id="personame2">
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">标识</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="joinflag" placeholder="请输入候选人身份验证" id="joinflag2">
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">部门</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="department" placeholder="请输入所在部门" id="department2">
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">资格</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" >
                                <option value="0">拥有候选人资格</option>
                                <option value="1">没有候选人资格</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">照片</label>
                        <div class="col-sm-10">
                            <label for="doc2">
                                <img id="preview2" src="/tpb/Public/img/up2.png"
                                     style="display:block;width: 130px;height: 130px;"/>
                            </label>
                            <input  id="doc2"  name="file2" type="file" onchange="javascript:setImagePreview2();" style="position:absolute;clip:rect(0 0 0 0);">

                            <input type="hidden" name="isimg" value=""  id="isimg" class="form-control"  />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">简介</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" name="brifintro" row="2" id="brifintro2"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">特点</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="lables" id="lables2" placeholder="请候选人特点或标签">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="alert alert-danger" id="warnhxr">
                                警告信息
                            </div>
                        </div>

                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-default">增加投票人</button>
                        </div>
                    </div>



                </form>
            </div>




        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--增加候选人结束-->


<!--编辑候选人开始-->
<div class="modal fade" id="editHxr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">编辑候选人</h4>
            </div>


            <!--编辑候选人信息表单-->
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="editHxrForm">

                    <input type="hidden" value="" name="id" id="hxrid3"/>

                    <!--名字-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="personame" placeholder="请输入名字" id="personame3">
                        </div>
                    </div>

                    <!--标识-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">标识</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="joinflag" placeholder="请输入候选人身份验证" id="joinflag3">
                        </div>
                    </div>

                    <!--部门-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">部门</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="department" placeholder="请输入所在部门" id="department3">
                        </div>
                    </div>

                    <!--资格-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">资格</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" id="status3">
                                <option value="0">拥有候选人资格</option>
                                <option value="1">没有候选人资格</option>
                            </select>
                        </div>
                    </div>

                    <!--照片-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">照片</label>
                        <div class="col-sm-10">
                            <label for="doc3">
                                <img id="preview3" src="/tpb/Public/img/up2.png"
                                     style="display:block;width: 130px;height: 130px;"/>
                            </label>
                            <input  id="doc3"  name="file2" type="file" onchange="javascript:setImagePreview3();" style="position:absolute;clip:rect(0 0 0 0);">

                            <input type="hidden" name="isimg" value=""  id="isimg3" class="form-control"  />
                        </div>
                    </div>


                    <!--简介-->
                    <div class="form-group">
                        <label class="col-sm-2 control-label">简介</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="brifintro" row="2" id="brifintro3"></textarea>
                        </div>
                    </div>


                    <!--获得票数-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">获得票数</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="daynums" id="daynums3" placeholder="获得票数">
                        </div>
                    </div>

                    <!--特点-->
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">特点</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                   name="lables" id="lables3" placeholder="请候选人特点或标签">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="alert alert-danger" id="warnhxr3">
                                警告信息
                            </div>
                        </div>

                        <div class="col-sm-offset-5 col-sm-10">
                            <button type="submit" class="btn btn-default">确定编辑</button>
                        </div>
                    </div>



                </form>
            </div>




        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--编辑候选人结束-->


<!--编辑投票人开始-->
<div class="modal fade" id="editTpr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">编辑投票人</h4>
            </div>


            <!--编辑投票人信息表单-->
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="editTprForm">

                    <input type="hidden" value="" name="id" id="tprid"/>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="personame4" name="personame" placeholder="请输入名字">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">标识</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="joinflag4"
                                   name="joinflag" placeholder="请输入投票人身份验证">
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">部门</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="department4"
                                   name="department" placeholder="请输入所在部门">
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">可否投票</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="isfull"  id="isfull4">
                                <option value="0">是</option>
                                <option value="1">否</option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label  class="col-sm-2 control-label">已投票数</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="daynums4"
                                   name="daynums" placeholder="已经投过的票数">
                        </div>
                    </div>



                    <div class="form-group">
                        <label  class="col-sm-2 control-label">资格</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status"  id="status4">
                                <option value="0">拥有投票人资格</option>
                                <option value="1">禁止投票</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <div class="alert alert-danger" id="warntpr4">
                                警告信息
                            </div>
                        </div>

                        <div class="col-sm-offset-5 col-sm-10">
                            <button type="submit" class="btn btn-default">确定修改</button>
                        </div>
                    </div>



                </form>

            </div>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--编辑投票人结束-->


<!-- 全局js -->
<script src="/tpb/Public/js/jquery.min.js?v=2.1.4"></script>
<script src="/tpb/Public/js/bootstrap.min.js?v=3.3.6"></script>

<!-- 自定义js -->
<script src="/tpb/Public/js/content.js?v=1.0.0"></script>


<!-- Bootstrap-Treeview plugin javascript -->
<script src="/tpb/Public/js/plugins/treeview/bootstrap-treeview.js"></script>



<!-- Bootstrap table -->
<script src="/tpb/Public/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/tpb/Public/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/tpb/Public/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>


<script src="/tpb/Public/js/bootstrap-editable.js"></script>
<script src="/tpb/Public/js/plugins/toastr/toastr.min.js"></script>


<!-- jQuery Validation plugin javascript-->
<script src="/tpb/Public/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/tpb/Public/js/plugins/validate/messages_zh.min.js"></script>


<!--引入关于form表单的ajax提交-->
<script src="/tpb/Public/js/jquery.form.min.js"></script>


</body>
<script>

    <!--图片上传-->
    function setImagePreview2(avalue) {
        var docObj=document.getElementById("doc2");

        var imgObjPreview=document.getElementById("preview2");
        if(docObj.files &&docObj.files[0])
        {
            //火狐下，直接设img属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '130px';
            imgObjPreview.style.height = '130px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();

            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        }
        else
        {
            //IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
            //必须设置初始大小
            localImagId.style.width = "130px";
            localImagId.style.height = "130px";
            //图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            }
            catch(e)
            {
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
        }
        $("#isimg").val("true");
        return true;
    }

    //下面用于图片上传预览功能
    function setImagePreview3(avalue) {
        var docObj=document.getElementById("doc3");

        var imgObjPreview=document.getElementById("preview3");
        if(docObj.files &&docObj.files[0])
        {
            //火狐下，直接设img属性
            imgObjPreview.style.display = 'block';
            imgObjPreview.style.width = '130px';
            imgObjPreview.style.height = '130px';
            //imgObjPreview.src = docObj.files[0].getAsDataURL();

            //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
            imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
        }
        else
        {
            //IE下，使用滤镜
            docObj.select();
            var imgSrc = document.selection.createRange().text;
            var localImagId = document.getElementById("localImag");
            //必须设置初始大小
            localImagId.style.width = "130px";
            localImagId.style.height = "130px";
            //图片异常的捕捉，防止用户修改后缀来伪造图片
            try{
                localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
            }
            catch(e)
            {
                alert("您上传的图片格式不正确，请重新选择!");
                return false;
            }
            imgObjPreview.style.display = 'none';
            document.selection.empty();
        }
        $("#isimg3").val("true");
        return true;
    }



    //打开候选人弹出框
    function addHxr(){
        $("#preview2").attr("src","/tpb/Public/img/up2.png");
        $("#addHxr").modal('show');
    }


    var API_URL = "<?php echo U('Person/getPerByProid');?>";
    var $tabletpr = $('#tabletpr').bootstrapTable({url: API_URL});
    var $tablehxr = $('#tablehxr').bootstrapTable({url: API_URL});


    function actionFormatter(value, row, index) {
        return '<a href="#" class="update" >修改</a> ' + '<a href="#" class="delete">删除</a>';
    }

    window.actionEvents = {
        'click .update': function (e, value, row) {
            var tmp=""+$("#iswhich").val();
            if (tmp.indexOf("hxr")>=0){
                $("#hxrid3").val(row.id);
                $("#personame3").val(row.personame);
                $("#department3").val(row.department);
                $("#joinflag3").val(row.joinflag);
                $("#daynums3").val(row.daynums);
                $("#brifintro3").val(row.brifintro);
                $("#lables3").val(row.lables);
                $("#preview3").attr("src",row.perpic);


                $("#status3 option").removeAttr("selected"); //移除属性selected

                if(row.status=="有"){
                    $("#status3").find("option[value='0']").attr("selected",true);
                }else{
                    $("#status3").find("option[value='1']").attr("selected",true);
                }

                $("#warnhxr3").hide();

                $('#editHxr').modal('show');
            }else{
                $("#tprid").val(row.id);
                $("#personame4").val(row.personame);
                $("#department4").val(row.department);
                $("#joinflag4").val(row.joinflag);
                $("#daynums4").val(row.daynums);

                $("#isfull4 option").removeAttr("selected"); //移除属性selected
                $("#status4 option").removeAttr("selected"); //移除属性selected


                if(row.isfull=="是"){
                    $("#isfull4").find("option[value='0']").attr("selected",true);
                }else{
                    $("#isfull4").find("option[value='1']").attr("selected",true);
                }

                if(row.status=="有"){
                    $("#status4").find("option[value='0']").attr("selected",true);
                }else{
                    $("#status4").find("option[value='1']").attr("selected",true);
                }

                $("#warntpr4").hide();
                $('#editTpr').modal('show');
            }
        },
        'click .delete': function (e, value, row) {
            if (confirm('确定删除该记录吗?')) {
                $.ajax({
                    url: "<?php echo U('Person/deletePer');?>",
                    type: 'POST',
                    data: {
                        "id": row.id,
                        'iswhich':$("#iswhich").val()
                    },
                    success: function (data) {
                        if (data['status']) {
                            var tmp=""+$("#iswhich").val();
                            var str="<?php echo U('Person/getPerByProid');?>?id="+tmp;
                            if (tmp.indexOf("hxr")>=0){
                                $("#tablehxr").bootstrapTable("refresh",{'url':str});
                            }else{
                                $("#tabletpr").bootstrapTable("refresh",{'url':str});
                            }
                            toastr.success('恭喜您，删除成功!',1500);
                        }
                    }, error: function () {
                        toastr.error('哎呀呀！出现异常啦，删除失败，请稍后重试', 1500);
                    }
                })
            }
        }
    }


    var defaultd=<?php echo ($data); ?>;

    $('#treeview11').treeview({
        color: "#428bca",
        data:  defaultd,
        onNodeSelected: function (event, node) {
            //将数值转换为字符串
            var values=""+node.tags;
            $("#iswhich").val(values);

            $("#toolbar").hide();
            $("#toolbar2").hide();
            $("#tabletpr").hide();
            $("#tablehxr").hide();


            if (values.indexOf("hxr")>=0){
                //$("#info2").val(values);
                $("#toolbar2").show();
                $("#tablehxr").show();
            }else{
                $("#info").val(values);
                $("#toolbar").show();
                $("#tabletpr").show();
            }

            $.ajax({
                url: "<?php echo U('Person/getPerByProid');?>",
                type: 'GET',
                data: {"id":node.tags},
                success: function (data2) {
                    if(values.indexOf("hxr")>=0){
                        $tablehxr.bootstrapTable('load',data2);
                    }else{
                        $tabletpr.bootstrapTable('load',data2);
                    }

                }, error: function () {
                    toastr.error('哎呀呀！加载出现错误了，请稍后重试', 1500);
                }
            });
        }
    });



    $(document).ready(function () {
        toastr.options.positionClass = 'toast-top-center';

        $('#tabletpr').bootstrapTable('hideColumn', 'id');
        $('#tablehxr').bootstrapTable('hideColumn', 'id');
        $('#tablehxr').bootstrapTable('hideColumn', 'perpic');



        $("#warntpr").hide();
        $("#warntpr4").hide();
        $("#warnhxr").hide();
        $("#warnhxr3").hide();

        var icon = "<i class='fa fa-times-circle'></i> ";
        //增加投票人表单验证
        $("#addTprForm").validate({
            rules: {
                personame: "required",
                joinflag: "required",
                department: "required",
            },
            messages: {
                personame: icon + "请输入投票人姓名！",
                joinflag: icon + "请输入投票人身份验证！",
                department: icon + "请输入投票人所在部门！",
            },
            submitHandler: function(form) {

                $(form).ajaxSubmit({
                    url: "<?php echo U('Person/addTpr');?>",
                    type: "post",
                    dataType:'json',
                    success: function (data)
                    {
                         if(data['status']){
                             $("#warntpr").hide();
                             $("#addTpr").modal('hide');
                             var str="<?php echo U('Person/getPerByProid');?>?id="+$("#info").val();
                             $("#tabletpr").bootstrapTable("refresh",{'url':str});
                             $("#joinflag").val("");
                             $("#personame").val("");
                             $("#department").val("");

                         }else {
                             $("#warntpr").html(data['info']);
                             $("#warntpr").show();
                         }
                    }
                });
                return false;
            }
        });


        //增加候选人表单
        $("#addHxrForm").validate({
            rules: {
                personame: "required",
                joinflag: "required",
                department: "required",
                brifintro: "required",
                isimg:"required",
            },
            messages: {
                personame: icon + "请输入候选人姓名！",
                joinflag: icon + "请输入候选人身份验证！",
                department: icon + "请输入候选人所在部门！",
                brifintro:icon + "请输入候选人简介！",
                isimg:  icon + "请上传候选人照片",
            },
            submitHandler: function(form) {

                $(form).ajaxSubmit({
                    url: "<?php echo U('Person/addHxr');?>",
                    type: "post",
                    enctype: 'multipart/form-data',
                    dataType:'json',
                    data:{
                        'iswhich':$("#iswhich").val()
                    },
                    success: function (data)
                    {
                        if(data['status']){
                            $("#warnhxr").hide();
                            $("#addHxr").modal('hide');
                            var str="<?php echo U('Person/getPerByProid');?>?id="+$("#iswhich").val();
                            $("#tablehxr").bootstrapTable("refresh",{'url':str});

                            $("#personame2").val("");
                            $("#joinflag2").val("");
                            $("#brifintro2").val("");
                            $("#department2").val("");
                            $("#lables2").val("");
                        }else {
                            $("#warnhxr").html(data['info']);
                            $("#warnhxr").show();
                        }
                    }
                });
                return false;
            }
        });



        //编辑投票人表单验证
        $("#editTprForm").validate({
            rules: {
                personame: "required",
                joinflag: "required",
                department: "required",
                daynums:"required",
            },
            messages: {
                personame: icon + "请输入投票人姓名！",
                joinflag: icon + "请输入投票人身份验证！",
                department: icon + "请输入投票人所在部门！",
                daynums:icon + "请输入已投票数！",
            },
            submitHandler: function(form) {

                $(form).ajaxSubmit({
                    url: "<?php echo U('Person/updateTpr');?>",
                    type: "post",
                    data:{
                      'iswhich':$("#iswhich").val()
                    },
                    dataType:'json',
                    success: function (data)
                    {
                        if(data['status']){
                            $("#warntpr4").hide();
                            $("#editTpr").modal('hide');
                            var str="<?php echo U('Person/getPerByProid');?>?id="+$("#iswhich").val();
                            $("#tabletpr").bootstrapTable("refresh",{'url':str});
                            toastr.success('编辑投票人成功!',1500);
                        }else {
                            $("#warntpr4").html(data['info']);
                            $("#warntpr4").show();
                        }
                    }
                });
                return false;
            }
        });


        //编辑候选人表单验证
        $("#editHxrForm").validate({
            rules: {
                personame: "required",
                joinflag: "required",
                department: "required",
                daynums:"required",
                brifintro:"required",

            },
            messages: {
                personame: icon + "请输入候选人姓名！",
                joinflag: icon + "请输入候选人身份验证！",
                department: icon + "请输入候选人所在部门！",
                daynums:icon + "请输入获得票数！",
                brifintro:icon + "请输入候选人简介！",
            },
            submitHandler: function(form) {

                $(form).ajaxSubmit({
                    url: "<?php echo U('Person/updateHxr');?>",
                    type: "post",
                    data:{
                        'iswhich':$("#iswhich").val()
                    },
                    dataType:'json',
                    success: function (data)
                    {

                        if(data['status']){
                            $("#warnhxr3").hide();
                            $("#editHxr").modal('hide');
                            var str="<?php echo U('Person/getPerByProid');?>?id="+$("#iswhich").val();
                            $("#tablehxr").bootstrapTable("refresh",{'url':str});
                            toastr.success('编辑候选人成功!',1500);
                        }else {
                            $("#warnhxr3").html(data['info']);
                            $("#warnhxr3").show();
                        }
                    }
                });
                return false;
            }
        });
    });



</script>

</html>