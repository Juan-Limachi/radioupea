<!DOCTYPE html>
<html lang="en">

<!-- ======= Footer ======= -->
@include('components.head')
<!-- ======= End Footer ======= -->

<body>

    <!-- loader part  -->
    <div class="loader-container">
        <img class="w-96" src="{{ asset('medias/assets/img/logo.gif') }}" alt="">
    </div>

    <!-- ======= Header ======= -->
    @include('components.header')
    <!-- ======= End Header ======= -->

    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="12000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active"
                        style="background-image: url({{ asset('medias/assets/img/upea_7.jpg') }})">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">
                                    <span>RADIO UPEA</span>
                                </h2>
                                <p class="animate__animated animate__fadeInUp"><strong> PENSANDO EN TI </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item"
                        style="background-image: url({{ asset('medias/assets/img/upea_2.jpg') }})">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">
                                    <span>RADIO UPEA</span>
                                </h2>
                                <p class="animate__animated animate__fadeInUp"><strong> PENSANDO EN TI </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item"
                        style="background-image: url({{ asset('medias/assets/img/upea_6.jpg') }})">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">
                                    <span>RADIO UPEA</span>
                                </h2>
                                <p class="animate__animated animate__fadeInUp"><strong> PENSANDO EN TI </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="carousel-item"
                        style="background-image: url({{ asset('medias/assets/img/upea_1.jpg') }})">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">
                                    <span>RADIO UPEA</span>
                                </h2>
                                <p class="animate__animated animate__fadeInUp"><strong> PENSANDO EN TI </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <main id="main">

        <!-- ======= Equipo ======= -->
        @include('components.equipo')
        <!-- ======= End Equipo ======= -->

        <!-- ======= Programas ======= -->
        @include('components.programas')
        <!-- ======= End Programas ======= -->

        <!-- ======= Noticias ======= -->
        @include('components.noticias')
        <!-- ======= End Noticias ======= -->

        <!-- ======= Contact ======= -->
        @include('components.contact')
        <!-- ======= End Contact ======= -->

    </main>

    <!-- ======= Footer ======= -->
    @include('components.footer')
    <!-- ======= End Footer ======= -->

    <!-- ======= Footer ======= -->
    @include('components.scripts')
    <!-- ======= End Footer ======= -->

</body>

</html>
