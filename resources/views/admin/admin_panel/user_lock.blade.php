<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Panel | User Lock Screen 1</title>
    @include('admin.admin_panel.Base')
</head>
<body class="">
<div class="page-lock">
    <div class="page-logo">
        <a class="brand" href="index.html">
            <img src="{{asset('/assets/pages/img/logo-big.png')}}" alt="logo"/> </a>
    </div>
    <div class="page-body">
        <div class="lock-head"> Locked</div>
        <div class="lock-body">
            <div class="pull-left lock-avatar-block">
                <img src="{{asset('/assets/pages/media/profile/photo3.jpg')}}" class="lock-avatar"></div>
            <form class="lock-form pull-left" action="/userlogin" method="post">
                @csrf
                <h4>Amanda Smith</h4>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                           placeholder="Password" name="password"/></div>
                <div class="form-actions">
                    <button type="submit" class="btn red uppercase">Login</button>
                </div>
            </form>
        </div>
        <div class="lock-bottom">
            <a href="">Not Amanda Smith?</a>
        </div>
    </div>
    @include('admin.admin_panel.footer')

</div>

</body>

</html>
