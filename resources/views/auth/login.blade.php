<div class="auth-container">
    <div class="auth-card">
        <!-- Session Status -->
        @if (session('status'))
            <div class="auth-session-status">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <h1 class="auth-title">{{ __('Log in to your account') }}</h1>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" name="email" type="email" 
                       class="form-input"
                       value="{{ old('email') }}" required autofocus autocomplete="username">
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" name="password" type="password" 
                       class="form-input"
                       required autocomplete="current-password">
                @error('password')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="remember-me">
                <label for="remember_me" class="remember-me-label">
                    <input id="remember_me" type="checkbox" name="remember" class="remember-me-checkbox">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a class="forgot-password-link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="submit-button">
                    {{ __('Log in') }}
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

    /* Remember Me */
    .remember-me {
        display: flex;
        align-items: center;
    }

    .remember-me-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #4b5563;
        cursor: pointer;
    }

    .remember-me-checkbox {
        width: 1rem;
        height: 1rem;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        appearance: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .remember-me-checkbox:checked {
        background-color: #3b82f6;
        border-color: #3b82f6;
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: center;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .forgot-password-link {
        font-size: 0.875rem;
        color: #3b82f6;
        text-decoration: none;
        text-align: center;
    }

    .forgot-password-link:hover {
        text-decoration: underline;
    }

    .submit-button {
        padding: 0.75rem;
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

    /* Session Status */
    .auth-session-status {
        padding: 1rem;
        background-color: #ecfdf5;
        color: #065f46;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        font-size: 0.875rem;
        text-align: center;
    }

    @media (max-width: 640px) {
        .auth-card {
            padding: 1.5rem;
        }
        
        .auth-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }
    }
</style>