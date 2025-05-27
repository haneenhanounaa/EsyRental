<!DOCTYPE html>
<html lang="en"lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('website/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


    <style>
        header.bg-dark {
            background: url('2.png') no-repeat center center;
            background-size: cover;
            color: white;
            /* Ensures text stays visible */
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            /* Enhances text readability */
        }


        .review-form {
            background: rgba(30, 30, 30, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
        }

        .rating-stars {
            display: flex;
            justify-content: center;
            gap: 8px;
            direction: rtl;
            /* Right to left for better UX */
        }

        .rating-stars input {
            display: none;
        }

        .rating-stars label {
            color: #444;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .rating-stars input:checked~label,
        .rating-stars label:hover,
        .rating-stars label:hover~label {
            color: #ffc107;
        }

        .rating-stars input:checked+label {
            color: #ffc107;
            transform: scale(1.1);
        }

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

        /* Hero Header Styles */
        .hero-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            min-height: 600px;
            display: flex;
            align-items: center;
            padding-top: 80px;
            /* Account for fixed navbar */
        }

        .hero-content h1 {
            font-size: 2.8rem;
            line-height: 1.2;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .hero-header {
                text-align: center;
                height: auto;
                padding: 120px 0 80px;
            }

            .hero-content h1 {
                font-size: 2.2rem;
            }
        }

        /* Button hover effects */
        .btn-primary {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 242, 254, 0.3);
        }

        .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Dropdown styles */
        .dropdown-menu {
            border-radius: 10px;
            overflow: hidden;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: rgba(79, 172, 254, 0.1);
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
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



        <!-- Modern Hero Header -->

        <header class="hero-header">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-5 align-items-center justify-content-center h-100">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="hero-content text-center text-xl-start">
                            <h1 class="display-4 fw-bold text-white mb-4 animate__animated animate__fadeInDown">
                                We are here to secure your apartment with complete comfort
                            </h1>
                            <p class="ldisplay-4 fw-bold text-white mb-4 animate__animated animate__fadeInDown">
                                Large and small apartments suitable for adults and children at the best prices
                            </p>
                            <div
                                class="d-flex gap-3 justify-content-center justify-content-xl-start animate__animated animate__fadeIn animate__delay-2s">
                                <a href="{{ route('website.filter') }}"
                                    class="btn btn-primary btn-lg px-4 py-2 rounded-pill shadow-sm">
                                    <i class="bi bi-search me-2"></i> Find Apartments
                                </a>

                                @guest
                                    <a href="{{ route('register') }}"
                                        class="btn btn-outline-light btn-lg px-4 py-2 rounded-pill">
                                        <i class="bi bi-person-plus me-2"></i> Join Now
                                    </a>
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- Blog preview section-->
        <section class="py-5">

            <div class="container px-5 my-5">


                <div class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                        @foreach ($apartments as $apartment)
                            <div class="col">
                                <div
                                    class="card h-100 shadow border-0 d-flex flex-column position-relative bg-dark text-light">

                                    <!-- Image -->
                                    <img class="card-img-top" src="{{ asset($apartment->image) }}"
                                        alt="Apartment Image"
                                        style="height: 350px; object-fit: cover; border-bottom: 1px solid #444; border-radius: 0.5rem 0.5rem 0 0;">

                                    <!-- Body -->
                                    <div class="card-body flex-grow-1 d-flex flex-column">
                                        <div class="badge bg-secondary bg-gradient rounded-pill mb-2">
                                            {{ $apartment->category }}
                                        </div>

                                        <h5 class="card-title mb-3 text-white">{{ $apartment->title }}</h5>

                                        <p class="card-text text-light-50 mb-3 flex-grow-1">
                                            {{ Str::limit($apartment->description, 200) }}
                                        </p>

                                        <!-- Book Now Button (only for logged-in clients) -->
                                        @auth
                                            @if (auth()->user()->role === 'client')
                                                <div class="mt-auto pt-3">
                                                    <a href="{{ route('client.bookings.create', $apartment->id) }}"
                                                        class="btn btn-primary w-100 py-2 fw-bold">
                                                        <i class="bi bi-calendar-check me-2"></i> Book Now
                                                    </a>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>

                                    <!-- Footer -->
                                    <div class="card-footer p-3 bg-dark border-top border-secondary text-light small">
                                        <div class="fw-bold">{{ $apartment->owner->name }}</div>
                                        <div class="fw-bold">{{ $apartment->location }}</div>
                                        <div class="text-light-50">
                                            {{ $apartment->created_at->format('M d, Y') }} &middot;
                                            {{ rand(3, 10) }} min read
                                        </div>
                                        <p class="fw-bold text-white mt-2">${{ $apartment->price }} For ONE Night</p>

                                        <!-- Rating -->
                                        @if ($apartment->reviews->count())
                                            @php $avg = $apartment->reviews->avg('rating'); @endphp
                                            <div class="mt-3">
                                                <div class="d-flex align-items-center gap-2 text-warning fw-semibold">
                                                    <span>⭐ {{ number_format($avg, 1) }}/5</span>
                                                    <span class="text-light-50">({{ $apartment->reviews->count() }}
                                                        reviews)</span>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Latest Reviews -->
                                        @if ($apartment->reviews->count())
                                            <div class="mt-3" style="max-height: 100px; overflow-y: auto;">
                                                @foreach ($apartment->reviews as $review)
                                                    <div
                                                        class="bg-secondary bg-opacity-10 text-light p-3 rounded mb-2">
                                                        <div class="d-flex justify-content-between mb-1">
                                                            <span class="fw-bold">{{ $review->user->name }}</span>
                                                            <span class="text-warning small">⭐
                                                                {{ $review->rating }}</span>
                                                        </div>
                                                        <p class="fst-italic small">"{{ $review->comment }}"</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <!-- Review Form -->
                                        @auth
                                            <form action="{{ route('reviews.store') }}" method="POST"
                                                class="mt-4 review-form">
                                                @csrf
                                                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">

                                                <div class="mb-3">
                                                    <label class="form-label text-light fw-semibold small">Your
                                                        Rating</label>
                                                    <div class="rating-stars mb-2">
                                                        @for ($i = 5; $i >= 1; $i--)
                                                            <input type="radio"
                                                                id="star{{ $i }}_{{ $apartment->id }}"
                                                                name="rating" value="{{ $i }}"
                                                                {{ $i == 5 ? 'checked' : '' }}>
                                                            <label for="star{{ $i }}_{{ $apartment->id }}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="currentColor"
                                                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                            </label>
                                                        @endfor
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="comment_{{ $apartment->id }}"
                                                        class="form-label text-light fw-semibold small">Your Review</label>
                                                    <textarea name="comment" id="comment_{{ $apartment->id }}" rows="3"
                                                        class="form-control bg-dark text-light border-secondary focus-glow"
                                                        placeholder="Share your experience with this property..." required></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                                                    <i class="bi bi-send-fill me-2"></i> Submit Review
                                                </button>
                                            </form>
                                        @else
                                            <div
                                                class="mt-4 p-3 border border-info bg-dark rounded d-flex align-items-center gap-2 shadow-sm">
                                                <i class="bi bi-info-circle text-info fs-5"></i>
                                                <div class="text-light small">
                                                    Please
                                                    <a href="{{ route('login') }}"
                                                        class="btn btn-sm btn-outline-info ms-1 px-3 py-1 rounded-pill fw-semibold">
                                                        Log in
                                                    </a>
                                                    to leave a review.
                                                </div>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- Call to action-->
                {{-- <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                    <div
                        class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                        <div class="mb-4 mb-xl-0">
                            <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                            <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                        </div>
                        <div class="ms-xl-4">
                            <div class="input-group mb-2">
                                <input class="form-control" type="text" placeholder="Email address..."
                                    aria-label="Email address..." aria-describedby="button-newsletter" />
                                <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign
                                    up</button>
                            </div>
                            <div class="small text-white-50">We care about privacy, and will never share your data.
                            </div>
                        </div>
                    </div>
                </aside> --}}
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Main Footer Content - Centered -->
                <div class="col-lg-8 text-center">
                    <!-- Copyright -->
                    <div class="small text-white-50 mb-4">
                        &copy; {{ date('Y') }} Esay Rental. All rights reserved.
                    </div>

                    <!-- Contact Card - Now integrated into footer design -->
                    <div class="bg-dark bg-opacity-25 p-4 rounded-4 border border-secondary mb-4">
                        <h5 class="text-white mb-3">Have questions?</h5>
                        <p class="text-white-50 mb-3">
                            We're here to help you with any inquiries
                        </p>
                        <a href="mailto:Haneen@domain.com"
                            class="btn btn-outline-light btn-sm rounded-pill px-3 mb-3">
                            <i class="bi bi-envelope me-1"></i> Haneen@domain.com
                        </a>

                        <!-- Social Links -->
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

                    <!-- Additional Links -->
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

    <style>
        /* Add this to your CSS */
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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('website/js/scripts.js') }}"></script>

</body>

</html>
