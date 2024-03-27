<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>{{ 'RADIO UPEA' }}</title>

    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('medias/assets/img/logo.png') }}">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i"
        rel="stylesheet" />

    <!-- CSS Files -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css" />
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('medias/assets/css/portada.css') }}">
    @if (Request::is('/'))
        <link rel="stylesheet" href="{{ asset('medias/assets/css/loader.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('medias/assets/css/stream.css') }}">
    <link rel="stylesheet" href="{{ asset('medias/assets/css/botones.css') }}">
    <link rel="stylesheet" href="{{ asset('medias/assets/css/pagination.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    @if (Request::is('/'))
        <script src="{{ asset('medias/assets/js/loader.js') }}"></script>
    @endif
</head>
