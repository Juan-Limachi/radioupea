<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center fixed-top topbar-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-center justify-content-lg-start">
        <i class="bi bi-phone d-flex align-items-center"><span> (+591) 65412389</span></i>
        <i class="bi bi-clock ms-4 d-none d-lg-flex align-items-center"><span>Lunes - Viernes: 09:00 AM - 17:00
                PM</span></i>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <div class="logo me-auto">
            <h1><a href="#">RADIO UPEA</a></h1>
            <div class="d-flex flex-column align-items-center">
                <audio id="audio">
                    <source src="https://streamradio.upea.bo/stream" type="audio/mpeg">
                </audio>
                <button class="stream" id="playPauseBTN" onclick="playPause()">
                    <span id="playPauseText">Play</span>
                    <i id="playPauseIcon" class="fa-solid fa-play"></i>
                </button>
            </div>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="/">PORTADA</a></li>
                <li><a class="nav-link scrollto" href="/#equipo">EQUIPO</a></li>

                <li><a class="nav-link scrollto <?php if (request()->routeIs('portadaProgramas')) {
                    echo 'active';
                } ?> "
                        href="{{ route('portadaProgramas') }}">PROGRAMAS</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link scrollto <?php if (request()->routeIs('portadaNoticias')) {
                        echo 'active';
                    } ?>" href="" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        NOTICIAS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item <?php if ($categoria === 'todo') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/todo">TODO</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'INSTITUCIONAL') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/INSTITUCIONAL">INSTITUCIONAL</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'SEGURIDAD') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/SEGURIDAD">SEGURIDAD</a></li>
                        <li><a class="dropdown-item <?php if ($categoria === 'POLÍTICA') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/POLÍTICA">POLÍTICA</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'SOCIALES') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/SOCIALES">SOCIALES</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'EL ALTO') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/EL ALTO">EL ALTO</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'NACIONAL') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/NACIONAL">NACIONAL</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'INTERNACIONAL') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/INTERNACIONAL">INTERNACIONAL</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'ECONOMÍA') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/ECONOMÍA">ECONOMÍA</a>
                        </li>
                        <li><a class="dropdown-item <?php if ($categoria === 'DEPORTES') {
                            echo 'active';
                        } ?>" href="/portadaNoticias/DEPORTES">DEPORTES</a>
                        </li>

                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="/#contact">CONTACTANOS</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <?php if(Auth::user()) { ?>
        <a href="{{ route('usuarios') }}" class="book-a-table-btn scrollto">VOLVER</a>
        <?php } else { ?>
        <a href="{{ route('login') }}" class="book-a-table-btn scrollto">ACCEDER</a>
        <?php } ?>
    </div>
</header>
<!-- End Header -->
