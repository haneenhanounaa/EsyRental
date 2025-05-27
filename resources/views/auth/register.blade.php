<div class="auth-container">
    <div class="auth-card">
        @if (session()->has('booking_apartment_title'))
            <div class="booking-alert">
                You're booking "{{ session('booking_apartment_title') }}" for ${{ session('booking_apartment_price') }} per night
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <h1 class="auth-title">{{ __('Create your account') }}</h1>

            <!-- Name -->
            <div class="form-group">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" name="name" type="text" 
                       class="form-input"
                       value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" name="email" type="email" 
                       class="form-input"
                       value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" name="password" type="password" 
                       class="form-input"
                       required autocomplete="new-password">
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" name="password_confirmation" type="password" 
                       class="form-input"
                       required autocomplete="new-password">
                @error('password_confirmation')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-actions">
                <a class="auth-link" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="submit-button">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Auth Container */
    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background-color: #f8fafc;
    }

    .auth-card {
        width: 100%;
        max-width: 450px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        padding: 2.5rem;
    }

    .auth-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 2rem;
        text-align: center;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    /* Booking Alert */
    .booking-alert {
        padding: 1rem;
        background-color: #e0f2fe;
        color: #0369a1;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
        text-align: center;
    }

    /* Form Group */
    .form-group {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .form-label {
        font-size: 0.875rem;
        font-weight: 500;
        color: #333;
    }

    .form-input {
        padding: 0.75rem 1rem;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.2s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-error {
        font-size: 0.875rem;
        color: #ef4444;
        margin-top: 0.25rem;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 0.5rem;
    }

    .auth-link {
        font-size: 0.875rem;
        color: #3b82f6;
        text-decoration: none;
    }

    .auth-link:hover {
        text-decoration: underline;
    }

    .submit-button {
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .submit-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 640px) {
        .auth-card {
            padding: 1.5rem;
        }
        
        .auth-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
    }
</style>