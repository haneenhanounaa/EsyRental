<section class="profile-section">
    <header class="profile-header">
        <h2 class="profile-title">
            {{ __('Profile Information') }}
        </h2>
        <p class="profile-description">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="profile-form">
        @csrf
        @method('patch')

        <div class="form-fields">
            <div class="form-group">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" name="name" type="text" 
                       class="form-input"
                       value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" name="email" type="email" 
                       class="form-input"
                       value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="verification-notice">
                        <p class="verification-text">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="verification-button">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="verification-success">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-button">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                     class="success-message">
                    <svg class="success-icon" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ __('Saved.') }}
                </div>
            @endif
        </div>
    </form>
</section>

<style>
    /* Base Styles */
    .profile-section {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    /* Header Styles */
    .profile-header {
        margin-bottom: 2rem;
    }

    .profile-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .profile-description {
        font-size: 1rem;
        color: #666;
        line-height: 1.5;
    }

    /* Form Styles */
    .profile-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .form-fields {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

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

    /* Verification Styles */
    .verification-notice {
        padding: 1rem;
        background-color: #fffbeb;
        border-radius: 8px;
        margin-top: 1rem;
    }

    .verification-text {
        font-size: 0.875rem;
        color: #92400e;
    }

    .verification-button {
        font-weight: 500;
        color: #1d4ed8;
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
    }

    .verification-button:hover {
        text-decoration: underline;
    }

    .verification-success {
        font-size: 0.875rem;
        color: #047857;
        margin-top: 0.5rem;
    }

    /* Button Styles */
    .form-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
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

    .submit-button:active {
        transform: translateY(0);
    }

    /* Success Message */
    .success-message {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        color: #047857;
    }

    .success-icon {
        width: 1.25rem;
        height: 1.25rem;
        stroke: currentColor;
    }

    /* Responsive Adjustments */
    @media (max-width: 640px) {
        .profile-section {
            padding: 1.5rem;
            border-radius: 12px;
        }
        
        .profile-title {
            font-size: 1.5rem;
        }
    }
</style>