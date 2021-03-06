<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> - 选项卡 &amp; 面板</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/tpb/Public/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/tpb/Public/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/tpb/Public/css/animate.css" rel="stylesheet">
    <link href="/tpb/Public/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="/tpb/Public/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/tpb/Public/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeIn">

    <!--标题开始-->
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>创建投票项目<small class="m-l-sm">Now,开启你的投票之旅吧!</small></h5>
                </div>
            </div>

        </div>
    </div>
    <!--标题结束-->




    <!--选项卡开始-->
    <div class="row">
        <div class="col-sm-10">
            <div class="tabs-container" id="mytab">
                <ul class="nav nav-tabs">

                    <li class="active">
                        <a data-toggle="tab" href="#tab-1" aria-expanded="true">投票基本设置</a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#tab-2" aria-expanded="false">
                            投票封面
                        </a>
                    </li>

                    <li><a data-toggle="tab" href="#tab-3" aria-expanded="false">投票模板</a>
                    </li>

                    <li>
                        <a data-toggle="tab" href="#tab-4" aria-expanded="false">效果预览</a>
                    </li>

                </ul>


                <div class="tab-content">

                    <!--投票基本设置开始-->
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <h1 style="font-size: 20px;">投票基本设置</h1>


                            <form class="form-horizontal m-t" id="form1">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">投票名称：</label>
                                    <div class="col-sm-8">
                                        <input id="votename" name="votename" class="form-control" type="text">

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">投票形式：</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="voteway" id="voteway">
                                            <option value="每日限投N票(不可重复投给一个人)">每日限投N票(不可重复投给一个人)</option>
                                            <option value="一次投N票(不可重复投给一个人)">一次投N票(不可重复投给一个人)</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">票数设置：</label>
                                    <div class="col-sm-8">
                                        <input id="votenums" name="votenums" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error">
										<span class="help-block m-b-none">
										<i class="fa fa-info-circle"></i>请输入投票形式下的票数，票数应该为正整数</span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">投票开始时间：</label>
                                    <div class="col-sm-8">
                                        <input placeholder="开始日期" class="form-control layer-date" id="startime"  name="startime" type="text">


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">投票结束时间：</label>
                                    <div class="col-sm-8">
                                        <input placeholder="结束日期" class="form-control layer-date" id="endtime" name="endtime" type="text">
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="checkbox" id="agree" name="agree"> 我已经认真阅读并同意投票项目注意事项
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <button class="btn btn-info" type="submit">保存基本配置进入下一步</button>
                                    </div>
                                </div>
                            </form>


                            <div style="height: 10px;"></div>
                        </div>
                    </div>
                    <!--投票基本设置结束-->



                    <!--投票封面开始-->
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <h1 style="font-size: 20px;">投票封面</h1>

                            <form class="form-horizontal m-t" id="form2" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">投票封面：</label>
                                    <div class="col-sm-8">
                                        <label for="doc2">
                                            <img id="preview2" src="/tpb/Public/img/up2.png"
                                                 style="display:block;width: 130px;height: 130px;"/>
                                        </label>
                                        <input  id="doc2"  name="file2" type="file" onchange="javascript:setImagePreview2();" style="position:absolute;clip:rect(0 0 0 0);">

                                        <input type="hidden" name="isimg" value=""  id="isimg" class="form-control"  />



                                        <span class="help-block m-b-none">
										<i class="fa fa-info-circle"></i>请在此配置投票项目封面，作为微信图文消息的封面图</span>

                                    </div>


                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">封面描述：</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" id="picdes" name="picdes"></textarea>


                                         <span class="help-block m-b-none">
										 <i class="fa fa-info-circle"></i>封面描述作为微信图文消息中的描述文字</span>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-group">

                                        <div class="col-sm-8 col-sm-offset-3" style="margin-top: 10px;">
                                            <div class="alert alert-danger" id="warncnt">
                                                警告信息
                                            </div>
                                        </div>

                                        <div class="col-sm-8 col-sm-offset-3">
                                            <button class="btn btn-info" type="submit">保存封面配置进入下一步</button>
                                        </div>



                                    </div>


                                </div>

                            </form>


                        </div>
                    </div>
                    <!--投票封面结束-->



                    <!--投票模板和投票规则的设定开始-->
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            <h1 style="font-size: 20px;">投票模板选择</h1>


                            <form class="form-horizontal m-t" id="form3">
                                <!--选择模板-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">选择模板：</label>
                                    <div class="col-sm-8">

                                        <select class="form-control" name="templateid" onchange="setImg()" id="templateid">
                                            <option value="模板一">模板一</option>
                                            <option value="模板二">模板二</option>
                                            <option value="模板三">模板三</option>
                                            <option value="模板四">模板四</option>
                                        </select>

                                    </div>
                                </div>
                                <!--选择模板-->

                                <!--样式模板-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">样式模板：</label>
                                    <div class="col-sm-8">

                                        <img id="template_img" src="/tpb/Public/img/mb1.jpg"
                                             style="display:block;width: 250px;height: 350px;"/>

                                    </div>
                                </div>
                                <!--样式模板-->


                                <!--投票规则-->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">投票规则：</label>
                                    <div class="col-sm-8">
                                        <div class="summernote" name="voterule"id="voterule">
                                           <ol>
                                               <li>
                                                   投票本着公平公正的原则，不允许刷票！
                                               </li>
                                               <li>
                                                   本次投票，投票验证码为身份证后六位
                                               </li>
                                           </ol>
                                        </div>
                                   </div>
                                </div>
                                <!--投票规则-->

                                <!--提交-->
                                <div class="form-group">

                                    <div class="col-sm-8 col-sm-offset-3" style="margin-top: 10px;">
                                        <div class="alert alert-success" id="warncnt3">
                                            警告信息
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <button class="btn btn-info" type="submit">保存模板配置进入下一步</button>
                                        </div>
                                    </div>



                                </div>
                            </form>



                        </div>


                    </div>
                    <!--投票模板和投票规则的设定结束-->



                    <!--效果预览图开始-->
                    <div id="tab-4" class="tab-pane">
                        <div class="panel-body">
                            <div style='float:left;background: url("/tpb/Public/img/phone.png") no-repeat 0 0; background-size:350px 697px;width: 350px;height: 687px; position: relative;padding:94px 36px 98px 36px;'>
                                <iframe frameborder="0" src="/tpb/Public/index.html"  style="width:280px;height:506px;"></iframe>
                            </div>

                            <div style="float: left;margin-top: 15px;margin-left: 36px;">
                                <div>
                                    <img src="/tpb/Public/img/ewm.jpg" style="width: 344px;height: 344px;"/>
                                </div>

                                <div style="text-align: center;margin-top: 10px;">
                                     扫描二维码进入投票页面
                                </div>
                            </div>

                        </div>


                    </div>
                    <!--效果预览图结束-->


                </div>


            </div>
        </div>


    </div>
    <!--选项卡结束-->
</div>

<!-- 全局js -->
<script src="/tpb/Public/js/jquery.min.js?v=2.1.4"></script>
<script src="/tpb/Public/js/bootstrap.min.js?v=3.3.6"></script>



<!-- 自定义js -->
<script src="/tpb/Public/js/content.js?v=1.0.0"></script>


<!-- jQuery Validation plugin javascript-->
<script src="/tpb/Public/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/tpb/Public/js/plugins/validate/messages_zh.min.js"></script>
<script src="/tpb/Public/js/demo/form-validate-demo.js"></script>

<!--引入日期-->
<script src="/tpb/Public/js/plugins/layer/laydate/laydate.js"></script>


<!-- SUMMERNOTE -->
<script src="/tpb/Public/js/plugins/summernote/summernote.min.js"></script>
<script src="/tpb/Public/js/plugins/summernote/summernote-zh-CN.js"></script>


<!--引入关于form表单的ajax提交-->
<script src="/tpb/Public/js/jquery.form.min.js"></script>


<script type="text/javascript">

    <!--预览图片-->
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




    //日期范围限制
    var start = {
        elem: '#startime',
        format: 'YYYY-MM-DD hh:mm:ss',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16 23:59:59', //最大日期
        istime: true,
        istoday: false,
        choose: function (datas) {
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas; //将结束日的初始值设定为开始日
        }
    };
    var end = {
        elem: '#endtime',
        format: 'YYYY-MM-DD hh:mm:ss',
        min: laydate.now(),
        max: '2099-06-16 23:59:59',
        istime: true,
        istoday: false,
        choose: function (datas) {
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);


    //点击进入上一步
    function goback(i){
        alert(i);
        $('#mytab li:eq(i) a').tab('show');
    }


    //根据选择的模板，设置模板样式图片
    function  setImg(){
        var i= $("#templateid option:selected").val();
        if(i==="模板一"){
            $("#template_img").attr("src","/tpb/Public/img/mb1.jpg");
        }else if (i=="模板二"){
            $("#template_img").attr("src","/tpb/Public/img/mb2.png");
        }else if (i=="模板三"){
            $("#template_img").attr("src","/tpb/Public/img/mb3.png");
        }else if (i=="模板四"){
            $("#template_img").attr("src","/tpb/Public/img/mb4.png");
        }
    }





    $(document).ready(function () {

         $("#warncnt").hide();
        $("#warncnt3").hide();



        $('.summernote').summernote({
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['fontname',['fontname']],
                ['para', ['ul', 'ol', 'paragraph']],
            ],
            lang: 'zh-CN',
            height:200,

        });


        // validate signup form on keyup and submit
        var icon = "<i class='fa fa-times-circle'></i> ";
        $("#form1").validate({
            rules: {
                votename: "required",
                votenums: {
                    required: true,
                    digits:true,
                    min:1
                },
                startime: {
                    required: true,

                },
                agree: "required"
            },
            messages: {
                votename: icon + "请输入项目名称！",
                votenums: {
                    required: icon + "请输入正确票数",
                    digits: icon + "请输入正确票数",
                    min:icon + "输入的票数应不小于1",
                },
                startime: {
                    required: icon + "请输入项目开始时间",
                },
                agree: {
                    required: icon + "必须同意协议后才能创建投票项目",
                    element: '#agree-error'
                }
            },
            submitHandler: function(form) {
                //在此进行ajax，提交表单，并返回，如数据正确，进入下一个操作页面

                $('#mytab li:eq(1) a').tab('show');
                return false;
            }
        });

        //第二个表单
        $("#form2").validate({

            rules: {
                picdes: "required",
                isimg:"required",

            },
            messages: {
                picdes: icon + "请输入封面描述",
                isimg:  icon + "请上传封面图片",
            },
            submitHandler: function(form) {

                $(form).ajaxSubmit({
                    url: "<?php echo U('Vote/updateImg');?>",
                    type: "post",
                    dataType:'json',
                    enctype: 'multipart/form-data',
                    success: function (data)
                    {
                        if(data['status']){
                            $("#warncnt").hide();
                            $('#mytab li:eq(2) a').tab('show');
                        }else{
                            $("#warncnt").html(data['info']);
                            $("#warncnt").show();
                        }

                    }
                });
                return false;


            }
        });


        //第三个表单
        $("#form3").validate({
            rules: {
                voterule:"required",
            },
            messages: {
                voterule:icon + "请输入编写投票规则",
            },
            submitHandler: function(form) {

                $(form).ajaxSubmit({
                    url: "<?php echo U('Vote/createVote');?>",
                    type: "post",
                    data:{
                        'votename':$("#votename").val(),
                        'voteway':$("#voteway option:selected").val(),
                        'votenums':$("#votenums").val(),
                        'startime':$("#startime").val(),
                        'endtime':$("#endtime").val(),
                        'picdes':$("#picdes").val(),
                        'templateid':$("#templateid option:selected").val(),
                        'voterule':$(".summernote").code()
                    },
                    dataType:'json',
                    success: function (data)
                    {
                          if(data['status']){
                              $("#warncnt3").html(data['info']);
                              $("#warncnt3").show();
                              setTimeout(function(){
                                  $('#mytab li:eq(3) a').tab('show');
                              },3000);
                             // $("#warncnt3").hide();;
                          }else{
                              $("#warncnt3").html(data['info']);
                              $("#warncnt3").show();
                          }
                    }
                });
                return false;


            }
        });

    });
</script>


</body>

</html>