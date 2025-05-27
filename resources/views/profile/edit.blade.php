<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ __('Profile') }} | {{ config('app.name') }}</title>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Core theme CSS -->
    <link href="{{ asset('website/css/styles.css') }}" rel="stylesheet" />
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            background-color: #f8fafc;
            color: #334155;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        /* Navbar Styles */
        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Profile Container */
        .profile-container {
            padding-top: 100px;
            padding-bottom: 50px;
        }

        /* Profile Card */
        .profile-card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: var(--transition);
            background: white;
        }

        .profile-card:hover {
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .profile-card-header {
            background: var(--primary-gradient);
            color: white;
            padding: 1.5rem;
            border-bottom: none;
        }

        .profile-card-body {
            padding: 2rem;
        }

        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: #4facfe;
            box-shadow: 0 0 0 0.25rem rgba(79, 172, 254, 0.25);
        }

        /* Button Styles */
        .btn-primary {
            background: var(--primary-gradient);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: var(--transition);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 242, 254, 0.3);
        }

        .btn-danger {
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        /* Section Divider */
        .section-divider {
            display: flex;
            align-items: center;
            margin: 2rem 0;
            color: #64748b;
        }

        .section-divider::before,
        .section-divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-divider::before {
            margin-right: 1rem;
        }

        .section-divider::after {
            margin-left: 1rem;
        }

        /* Avatar Styles */
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid white;
            box-shadow: var(--card-shadow);
            margin: -70px auto 20px;
            display: block;
            background: var(--primary-gradient);
            color: white;
            font-size: 48px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .profile-container {
                padding-top: 80px;
            }
            
            .profile-card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation -->
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
                        <!-- Your existing navbar items here -->
                        <!-- ... -->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Profile Content -->
        <div class="profile-container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <!-- Profile Information Card -->
                        <div class="profile-card mb-5 animate__animated animate__fadeIn">
                            <div class="profile-card-header text-center">
                                <h2 class="mb-0">{{ __('Profile Information') }}</h2>
                            </div>
                            
                            <!-- Avatar -->
                            <div class="profile-avatar">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            
                            <div class="profile-card-body">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <!-- Update Password Card -->
                        <div class="profile-card mb-5 animate__animated animate__fadeIn animate__delay-1s">
                            <div class="profile-card-header text-center">
                                <h2 class="mb-0">{{ __('Update Password') }}</h2>
                            </div>
                            <div class="profile-card-body">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <!-- Delete Account Card -->
                        <div class="profile-card animate__animated animate__fadeIn animate__delay-2s">
                            <div class="profile-card-header text-center bg-danger">
                                <h2 class="mb-0">{{ __('Delete Account') }}</h2>
                            </div>
                            <div class="profile-card-body">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>