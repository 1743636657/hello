
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/Admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/themer.css" media="screen">
<link  rel="icon" href="{{ Config::get('app.icon') }}">
<title>{{ Config::get('app.title') }}</title>
<link rel="stylesheet" type="text/css" href="/Admin/css/pages_pages.css">

    
</head>

<body>

    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/Admin/images/logo.png.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
            
            
          
            <!-- 管理员登录信息 -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/Admin/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, John Doe
                    </div>
                    <ul>
                        <li><a href="#">头像管理</a></li>
                        <li><a href="#">修改密码</a></li>
                        <li><a href="index.html">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                    <input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- 菜单 -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-user"></i> 用户管理</a>
                        <ul>
                            <li><a href="/admin/user">用户列表</a></li>
                            <li><a href="/admin/user/create">用户添加</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-user"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/sort">分类列表</a></li>
                            <li><a href="/admin/sort/create">分类添加</a></li>
                        </ul>
                    </li>
                   
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
                <!-- 显示自动验证的错误信息 -->
                @if (count($errors) > 0)
                    <div class="mws-form-message error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <!-- 读取模版的提示信息 -->
                @if(session('success'))
                <div class="mws-form-message success">
                    {{  session('success') }}
                </div>
                @endif        
                

                @if(session('error'))
                <div class="mws-form-message error">
                    {{  session('error') }}
                </div>
                @endif

                <!-- 内容开始 -->
                @section('content')

                @show
            
                <!-- 内容结束 -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
                Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/Admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/Admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/Admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/Admin/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/Admin/js/demo/demo.table.js"></script>

</body>
</html>
