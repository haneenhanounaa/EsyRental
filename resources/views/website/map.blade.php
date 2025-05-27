<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('website/css/styles.css') }}" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    
    <style>
           .focus-glow:focus {
            border-color: rgba(13, 110, 253, 0.5);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        .review-form .btn-primary {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            border: none;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .review-form .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        /* Navbar Styles */
        .gradient-text {
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link-content {
            position: relative;
            z-index: 2;
        }

        .nav-link-underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #4facfe 0%, #00f2fe 100%);
            transition: width 0.3s ease;
        }

        .nav-link:hover .nav-link-underline {
            width: 100%;
        }

        .navbar-brand i {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover i {
            transform: scale(1.2);
        }

        .avatar-initials {
            width: 32px;
            height: 32px;
            font-weight: 600;
        }
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .map-container {
            width: 100%;
            height: calc(100vh - 136px);
            /* Adjust 136px based on header + footer height */
        }

        #map {
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body class="d-flex flex-column">
    <div class="wrapper">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm"
            style="background: linear-gradient(135deg, #1a1a1a, #2d2d2d) !important;">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('website.index') }}">
                    <i class="bi bi-house-heart me-2"></i>
                    <span class="gradient-text">{{ config('app.name') }}</span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link position-relative px-3" href="{{ route('website.index') }}">
                                <span class="nav-link-content">Home</span>
                                <span class="nav-link-underline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link position-relative px-3" href="{{ route('website.map') }}">
                                <span class="nav-link-content">Map</span>
                                <span class="nav-link-underline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link position-relative px-3" href="{{ route('website.filter') }}">
                                <span class="nav-link-content">Filter</span>
                                <span class="nav-link-underline"></span>
                            </a>
                        </li>

                        <!-- Notifications Dropdown -->
                        @auth
                            <li class="nav-item dropdown mx-2">
                                @php
                                    $user = auth()->user();
                                    $unreadNotifications = $user->unreadNotifications;
                                    $readNotifications = $user->readNotifications->take(
                                        5 - $unreadNotifications->count(),
                                    );
                                    $totalUnread = $unreadNotifications->count();
                                @endphp

                                <a class="nav-link position-relative p-2 rounded-circle bg-dark bg-opacity-25"
                                    href="#" data-bs-toggle="dropdown">
                                    <i class="bi bi-bell-fill fs-5"></i>
                                    @if ($totalUnread > 0)
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                            style="font-size: 0.6rem;">
                                            {{ $totalUnread }}
                                        </span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end p-0 shadow-lg"
                                    style="width: 320px; border: none;">
                                    <div class="p-3 border-bottom bg-primary text-white">
                                        <h6 class="mb-0 fw-bold">Notifications</h6>
                                    </div>

                                    <div class="list-group" style="max-height: 400px; overflow-y: auto;">
                                        @forelse($unreadNotifications as $notification)
                                            <a href="{{ $notification->data['url'] ?? '#' }}?notification_id={{ $notification->id }}"
                                                class="list-group-item list-group-item-action bg-light bg-opacity-10">
                                                <div class="d-flex align-items-start">
                                                    <div class="me-2 text-primary">
                                                        <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between">
                                                            <small
                                                                class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                            <span class="badge bg-primary rounded-pill">New</span>
                                                        </div>
                                                        <p class="mb-0 small">{{ $notification->data['message'] }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                        @endforelse

                                        @forelse($readNotifications as $notification)
                                            <a href="{{ $notification->data['url'] ?? '#' }}"
                                                class="list-group-item list-group-item-action">
                                                <div class="d-flex align-items-start">
                                                    <div class="me-2 text-muted">
                                                        <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="d-flex justify-content-between">
                                                            <small
                                                                class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                        </div>
                                                        <p class="mb-0 small">{{ $notification->data['message'] }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                        @endforelse

                                        @if ($unreadNotifications->isEmpty() && $readNotifications->isEmpty())
                                            <div class="p-4 text-center text-muted">
                                                <i class="bi bi-bell-slash fs-4 mb-2"></i>
                                                <p class="mb-0">No notifications yet</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endauth

                        <!-- User Dropdown -->
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                    id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar-sm me-2">
                                        <div
                                            class="avatar-initials bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                    </div>
                                    <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="navbarDropdownUser"
                                    style="border: none;">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                                class="bi bi-person me-2"></i> Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger"><i
                                                    class="bi bi-box-arrow-right me-2"></i> Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item ms-lg-2">
                                <a class="btn btn-outline-light btn-sm px-3 rounded-pill me-2"
                                    href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm px-3 rounded-pill"
                                    href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Map Container -->
        {{-- <div class="map-container">
            <iframe 
                loading="lazy" 
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBl4DHGkIt2_N1yeFg3Vw-FmC8WXbAeoXI&q=Space+Needle,31.525822,34.447954">
            </iframe>
        </div> --}}
        {{-- @foreach ($apartments as $apartment)
            <div class="map-container" style="height:900px;" id="map-{{ $apartment->id }}"></div>

            @push('scripts')
                <script>
                    function initMap{{ $apartment->id }}() {
                        const apartmentLocation = {
                            lat: {{ $apartment->latitude }},
                            lng: {{ $apartment->longitude }}
                        };

                        const map = new google.maps.Map(document.getElementById('map-{{ $apartment->id }}'), {
                            zoom: 15,
                            center: apartmentLocation
                        });

                        new google.maps.Marker({
                            position: apartmentLocation,
                            map: map,
                            title: "{{ $apartment->title }}",
                            icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                        });
                    }

                    document.addEventListener('DOMContentLoaded', function() {
                        initMap{{ $apartment->id }}();
                    });
                </script>
            @endpush
        @endforeach --}}
        <div class="map-container" id="map" style="height: 900px;"></div>

        @push('scripts')
            <script>
                function initMap() {
                    const map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: {
                            lat: 31.5043930,
                            lng: 34.463680
                        } // Default center, adjust as needed
                    });

                    const apartments = @json($apartments);

                    apartments.forEach(apartment => {
                        if (apartment.latitude && apartment.longitude) {
                            const position = {
                                lat: parseFloat(apartment.latitude),
                                lng: parseFloat(apartment.longitude)
                            };

                            new google.maps.Marker({
                                position: position,
                                map: map,
                                title: apartment.title,
                                icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                            });
                        }
                    });
                }

                document.addEventListener('DOMContentLoaded', initMap);
            </script>
        @endpush

        <!-- Footer-->
        <footer class="bg-dark py-4">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                        <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('website/js/scripts.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBl4DHGkIt2_N1yeFg3Vw-FmC8WXbAeoXI"></script>
    @stack('scripts')
</body>


</html>
