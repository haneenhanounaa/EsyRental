<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Apartment Search</title>

    <style>
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

        /* Main Content Spacing */
        main {
            padding-top: 80px;
            /* Add padding to account for fixed navbar */
        }

        /* Search Section */
        .search-hero {
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.1) 0%, rgba(0, 242, 254, 0.1) 100%);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 3rem;
        }

        /* Image Fallback */
        .img-fallback {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            color: #6c757d;
            height: 100%;
        }

        /* Card Hover Effect */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styles */
        .hover-primary:hover {
            color: var(--bs-primary) !important;
            transform: translateY(-2px);
            transition: all 0.2s ease;
        }

        .hover-white:hover {
            color: white !important;
        }

        footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <!-- Modern Navigation -->
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
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm"
        style="background: linear-gradient(135deg, #1a1a1a, #2d2d2d) !important;">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('website.index') }}">
                <i class="bi bi-house-heart me-2"></i>
                <span class="gradient-text">{{ config('app.name') }}</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
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
                                $readNotifications = $user->readNotifications->take(5 - $unreadNotifications->count());
                                $totalUnread = $unreadNotifications->count();
                            @endphp

                            <a class="nav-link position-relative p-2 rounded-circle bg-dark bg-opacity-25" href="#"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-bell-fill fs-5"></i>
                                @if ($totalUnread > 0)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                        style="font-size: 0.6rem;">
                                        {{ $totalUnread }}
                                    </span>
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-end p-0 shadow-lg" style="width: 320px; border: none;">
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
                                                            class="text-muted">{{ $notification->created - at->diffForHumans() }}</small>
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
    </nav> --}}

    <main class="flex-shrink-0">
        <!-- Hero Search Section -->
        <div class="container py-5">
            <div class="search-hero animate__animated animate__fadeIn">
                <div class="text-center mb-5">
                    <h1 class="fw-bold mb-3 display-5">Find Your Perfect Stay</h1>
                    <p class="lead text-muted">Discover apartments in your desired location</p>
                </div>

                <form action="{{ route('website.filter') }}" method="GET" class="mb-5">
                    <div class="input-group shadow-lg rounded-pill overflow-hidden">
                        <span class="input-group-text bg-white border-0 ps-4">
                            <i class="bi bi-geo-alt text-primary"></i>
                        </span>
                        <input type="text" name="location" placeholder="Search by city or neighborhood"
                            class="form-control border-0 py-3" value="{{ request('location') }}">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-search me-2"></i>Search
                        </button>
                    </div>
                </form>
            </div>

            @if (request('location'))
                @if ($apartments->isEmpty())
                    <div class="text-center py-5 animate__animated animate__fadeIn">
                        <div class="img-fallback mb-4" style="height: 200px;">
                            <i class="bi bi-building-slash" style="font-size: 4rem;"></i>
                        </div>
                        <h4 class="fw-bold mb-2">No apartments found</h4>
                        <p class="text-muted">Try adjusting your search location</p>
                    </div>
                @else
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($apartments as $apartment)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm overflow-hidden card-hover">
                                    <div class="position-relative">
                                        @if ($apartment->image)
                                            <img src="{{ asset($apartment->image) }}" class="card-img-top"
                                                alt="{{ $apartment->title }}"
                                                style="height: 220px; object-fit: cover;">
                                        @else
                                            <div class="img-fallback" style="height: 220px;">
                                                <i class="bi bi-building" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        <div class="position-absolute top-0 end-0 m-3">
                                            <span class="badge bg-success bg-opacity-90 text-white">Available</span>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="card-title fw-bold mb-0">{{ $apartment->title }}</h5>
                                            <div class="text-warning">
                                                <i class="bi bi-star-fill"></i>
                                                <span class="text-dark">4.8</span>
                                            </div>
                                        </div>
                                        <p class="card-text text-muted mb-1">
                                            <i class="bi bi-geo-alt-fill text-primary me-1"></i>
                                            {{ $apartment->location }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <p class="text-dark fw-bold mb-0">
                                                ${{ $apartment->price }} <span class="text-muted fw-normal">/
                                                    night</span>
                                            </p>
                                            <a href="{{ route('client.bookings.create', $apartment->id) }}"
                                                class="btn btn-outline-primary rounded-pill px-3">
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="text-center py-5 animate__animated animate__fadeIn">
                    <div class="img-fallback mb-4" style="height: 200px;">
                        <i class="bi bi-search-heart" style="font-size: 4rem;"></i>
                    </div>
                    <h4 class="fw-bold mb-2">Where would you like to stay?</h4>
                    <p class="text-muted">Enter a location to discover available apartments</p>
                </div>
            @endif
        </div>
    </main>

    <footer class="bg-dark py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="small text-white-50 mb-4">
                        &copy; {{ date('Y') }} Esay Rental. All rights reserved.
                    </div>

                    <div class="bg-dark bg-opacity-25 p-4 rounded-4 border border-secondary mb-4">
                        <h5 class="text-white mb-3">Have questions?</h5>
                        <p class="text-white-50 mb-3">
                            We're here to help you with any inquiries
                        </p>
                        <a href="mailto:Haneen@domain.com"
                            class="btn btn-outline-light btn-sm rounded-pill px-3 mb-3">
                            <i class="bi bi-envelope me-1"></i> Haneen@domain.com
                        </a>

                        <div class="mt-3">
                            <h6 class="text-white mb-3">Follow Us</h6>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ $settings['twitter'] }}" class="text-white fs-5 hover-primary">
                                    <i class="bi bi-twitter-x"></i>
                                </a>
                                <a href="{{ $settings['facebook'] }}" class="text-white fs-5 hover-primary">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="{{ $settings['linkedin'] }}" class="text-white fs-5 hover-primary">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                                <a href="{{ $settings['instagram'] ?? '#' }}" class="text-white fs-5 hover-primary">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-center gap-3 small">
                        <a href="#" class="text-white-50 text-decoration-none hover-white">Privacy Policy</a>
                        <a href="#" class="text-white-50 text-decoration-none hover-white">Terms of Service</a>
                        <a href="#" class="text-white-50 text-decoration-none hover-white">Contact Us</a>
                        <a href="#" class="text-white-50 text-decoration-none hover-white">About</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
