<!DOCTYPE html>
<html lang="en">

<!-- ======= Head ======= -->
@include('components.head')
<!-- ======= End Head ======= -->

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        
        <!-- ======= Header ======= -->
        @include('components.header')
        <!-- ======= End Header ======= -->

        <section id="portada">
            <div>
                <!-- Slide 1 -->
                <div class="carousel-item active"
                    style="background-image: url({{ asset('medias/assets/img/logo2.jpg') }})">
                </div>
            </div>
        </section>

        <!-- Page Content -->
        <main id="main">
            {{-- {{ $slot }} --}}
            @yield('contenido')
        </main>
    </div>

    <!-- ======= Footer ======= -->
    @include('components.footer')
    <!-- ======= End Footer ======= -->

    <!-- ======= Footer ======= -->
    @include('components.scripts')
    <!-- ======= End Footer ======= -->

</body>

</html>
