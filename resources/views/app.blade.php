<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ env('APP_NAME')}}</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <link href="assets/css/morris.css" rel="stylesheet">
    <link href="assets/css/style.min.css" rel="stylesheet">
    <link href="assets/css/pages/dashboard1.css" rel="stylesheet">
    <!-- <link href="assets/css/pages/footable-page.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/font_lao.css" rel="stylesheet"> -->
    <link href="assets/css/font_notosanlao.css" rel="stylesheet">
</head>
<body>

    @if(Auth::check())
        @php
        $user_auth_data = [
            'isLoggedin' => true,
            'user' => Auth::user()
        ];
        @endphp
    @else
        @php
        $user_auth_data = [
            'isLoggedin' => false
        ];
        @endphp
    @endif

    <script>
        window.Laravel = JSON.parse(atob(`{{ base64_encode(json_encode($user_auth_data)) }}`));
    </script>
        <div id="app"></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
