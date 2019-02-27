<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
      type="text/css"/>
<link href="{{asset('/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{asset('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
      type="text/css"/>
<link href="{{asset('/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet"
      type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('/assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components"
      type="text/css"/>
<link href="{{asset('/assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('/assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
      type="text/css"/>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{asset('/assets/pages/css/login.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->

<link href="{{asset('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet"
      type="text/css">
<link href="{{asset('/assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="{{asset('/assets/pages/css/lock.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN THEME LAYOUT STYLES -->
<link href="{{asset('/assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css"
      id="style_color">
<link href="{{asset('/assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css">
<!-- END THEME LAYOUT STYLES -->
<link rel="shortcut icon" href="favicon.ico">
