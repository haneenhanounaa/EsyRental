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

    <style>
        header.bg-dark {
            background: url('2.png') no-repeat center center;
            background-size: cover;
            color: white;
            /* Ensures text stays visible */
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
            /* Enhances text readability */
        }

        /* Notifications dropdown styles
        .dropdown-menu {
            max-height: 400px;
            overflow-y: auto;
        }

        .icon-circle {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .badge-counter {
            position: absolute;
            transform: scale(0.7);
            transform-origin: top right;
            right: -0.25rem;
            top: -0.25rem;
        }

        .nav-item.dropdown {
            position: relative;
        }

        .dropdown-item {
            white-space: normal;
        } */
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="{{ route('website.index') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('website.index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                            </ul>
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

                                <a class="nav-link position-relative" href="#" data-bs-toggle="dropdown">
                                    <i class="bi bi-bell-fill"></i>
                                    @if ($totalUnread > 0)
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ $totalUnread }}
                                        </span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end p-0" style="width: 300px;">
                                    <div class="p-3 border-bottom">
                                        <h6 class="mb-0">Notifications</h6>
                                    </div>

                                    <div class="list-group" style="max-height: 300px; overflow-y: auto;">
                                        {{-- Unread Notifications --}}
                                        @forelse ($unreadNotifications as $notification)
                                            <a href="{{ $notification->data['url'] ?? '#' }}?notification_id={{ $notification->id }}"
                                                class="list-group-item list-group-item-action bg-light">
                                                <div class="d-flex justify-content-between">
                                                    <small
                                                        class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                    <span class="badge bg-primary">New</span>
                                                </div>
                                                <p class="mb-0">{{ $notification->data['message'] }}</p>
                                            </a>
                                        @empty
                                            {{-- No unread notifications --}}
                                        @endforelse

                                        {{-- Read Notifications --}}
                                        @forelse ($readNotifications as $notification)
                                            <a href="{{ $notification->data['url'] ?? '#' }}"
                                                class="list-group-item list-group-item-action">
                                                <div class="d-flex justify-content-between">
                                                    <small
                                                        class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                                <p class="mb-0">{{ $notification->data['message'] }}</p>
                                            </a>
                                        @empty
                                            {{-- No read notifications --}}
                                        @endforelse

                                        @if ($unreadNotifications->isEmpty() && $readNotifications->isEmpty())
                                            <div class="p-3 text-center text-muted">No notifications</div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endauth


                        <!-- User Dropdown -->
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownUser" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        </ul>
        </div>
        </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">We are here to secure your apartment with
                                complete comfort.
                            </h1>
                            <p class="lead  fw-normal text-white mb-4">Large and small apartments suitable for adults
                                and children at the best prices
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
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
                                <div class="card h-100 shadow border-0 d-flex flex-column position-relative">
                                    <img class="card-img-top" src="{{ asset($apartment->image) }}"
                                        alt="Apartment Image" style="height: 200px; object-fit: cover;">

                                    <div class="card-body flex-grow-1 d-flex flex-column">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                            {{ $apartment->category }}
                                        </div>
                                        @auth
                                            @if (auth()->user()->role === 'client')
                                                {{-- Authenticated client: Go to booking page --}}
                                                <a class="text-decoration-none link-dark stretched-link"
                                                    href="{{ route('bookings.create', $apartment->id) }}">
                                                    <h5 class="card-title mb-3">{{ $apartment->title }}</h5>
                                                </a>
                                            @else
                                                {{-- Logged-in but not a client: Do nothing or show a disabled link --}}
                                                <div class="text-muted">
                                                    <h5 class="card-title mb-3">{{ $apartment->title }}</h5>
                                                </div>
                                            @endif
                                        @else
                                            {{-- Guest user: Redirect to login --}}
                                            <a class="text-decoration-none link-dark stretched-link"
                                                href="{{ route('login') }}">
                                                <h5 class="card-title mb-3">{{ $apartment->title }}</h5>
                                            </a>
                                        @endauth

                                        <p class="card-text mb-3 flex-grow-1">
                                            {{ Str::limit($apartment->description, 100) }}</p>
                                    </div>

                                    <div class="card-footer p-3 bg-transparent border-top-0">
                                        <div class="d-flex align-items-center">
                                            <div class="small">
                                                <div class="fw-bold">{{ $apartment->owner->name }}</div>
                                                <div class="text-muted">
                                                    {{ $apartment->created_at->format('M d, Y') }} &middot;
                                                    {{ rand(3, 10) }} min read
                                                </div>
                                                <p class="fw-bold text-dark">${{ $apartment->price }} For ONE Night
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <!-- Call to action-->
                <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
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
                </aside>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Your Website 2023</div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('website/js/scripts.js') }}"></script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.list-group-item.bg-light').forEach(item => {
                item.addEventListener('click', function(e) {
                    const url = new URL(this.href);
                    const notificationId = url.searchParams.get('notification_id');

                    if (notificationId) {
                        e.preventDefault();

                        fetch(`/notifications/${notificationId}/mark-as-read`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        }).then(() => {
                            // Remove the "New" badge and background
                            this.classList.remove('bg-light');
                            const badge = this.querySelector('.badge');
                            if (badge) badge.remove();

                            // Update counter
                            const counter = document.querySelector('.badge.bg-danger');
                            if (counter) {
                                const count = parseInt(counter.textContent) - 1;
                                counter.textContent = count > 0 ? count : '';
                                if (count <= 0) counter.remove();
                            }

                            // Navigate to the URL
                            window.location.href = url.pathname;
                        });
                    }
                });
            });
        });
    </script> --}}
</body>

</html>
