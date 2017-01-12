<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>票易投主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">


    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/tpb/Public/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/tpb/Public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/tpb/Public/css/animate.css" rel="stylesheet">
    <link href="/tpb/Public/css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i></div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="clear">
                  <span class="block m-t-xs" style="font-size:20px;">
                    <i class="fa fa-book"></i>
                    <strong class="font-bold">票易投</strong>
                  </span>
                </span>
                            </a>
                        </div>
                        <div class="logo-element">票易投</div>
                    </li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope">当前用户</span>
                    </li>
                    <li class="line dk"></li>
                    <li>
                        <a class="J_menuItem" href="/tpb/Public/404.html">
                            <i class="fa fa-user"></i>
                            <span class="nav-label"><?php echo (session('username')); ?></span>
                        </a>
                    </li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope">菜单</span>
                    </li>
                    <li class="line dk"></li>
                    <li>
                        <a class="J_menuItem" href="/tpb/Public/index_v1.html">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                        </a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Vote/manager');?>">
                            <i class="fa  fa-desktop"></i>
                            <span class="nav-label">我的项目</span>
                        </a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Vote/index');?>">
                            <i class="fa fa-pencil-square-o"></i>
                            <span class="nav-label">创建投票</span>
                        </a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="<?php echo U('Person/index');?>">
                            <i class="fa fa-cogs"></i>
                            <span class="nav-label">人员管理</span>
                        </a>
                    </li>

                    <li>
                        <a class="J_menuItem" href="/tpb/Public/404.html">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">投票结果</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->

        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="<?php echo U('Login/logout');?>">
                                注销
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe id="J_iframe" width="100%" height="100%" src="/tpb/Public/index_v1.html" frameborder="0" data-id="/tpb/Public/index_v1.html" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->

    </div>

    <!-- 全局js -->
    <script src="/tpb/Public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/tpb/Public/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/tpb/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/tpb/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/tpb/Public/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="/tpb/Public/js/hAdmin.js?v=4.1.0"></script>
    <script type="text/javascript" src="/tpb/Public/js/index.js"></script>

    <!-- 第三方插件 -->
    <script src="/tpb/Public/js/plugins/pace/pace.min.js"></script>

</body>

</html>