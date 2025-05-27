<section class="password-section">
    <header class="password-header">
        <h2 class="password-title">
            {{ __('Update Password') }}
        </h2>
        <p class="password-description">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="password-form">
        @csrf
        @method('put')

        <div class="password-fields">
            <div class="form-group">
                <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                <div class="password-input-wrapper">
                    <input id="update_password_current_password" name="current_password" type="password" 
                           class="form-input"
                           autocomplete="current-password">
                    <button type="button" class="password-toggle">
                        <svg class="eye-icon" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                </div>
                @error('current_password', 'updatePassword')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                <div class="password-input-wrapper">
                    <input id="update_password_password" name="password" type="password" 
                           class="form-input"
                           autocomplete="new-password">
                    <button type="button" class="password-toggle">
                        <svg class="eye-icon" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                </div>
                @error('password', 'updatePassword')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <div class="password-input-wrapper">
                    <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                           class="form-input"
                           autocomplete="new-password">
                    <button type="button" class="password-toggle">
                        <svg class="eye-icon" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                </div>
                @error('password_confirmation', 'updatePassword')
                    <p class="form-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-button">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
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
    /* Password Section Styles */
    .password-section {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .password-header {
        margin-bottom: 2rem;
    }

    .password-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .password-description {
        font-size: 1rem;
        color: #666;
        line-height: 1.5;
    }

    .password-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .password-fields {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    /* Password Input Wrapper */
    .password-input-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
        color: #666;
        padding: 0.25rem;
    }

    .password-toggle:hover {
        color: #333;
    }

    .eye-icon {
        width: 1.25rem;
        height: 1.25rem;
    }

    /* Reuse styles from profile section where applicable */
    .form-group, .form-label, .form-input, .form-error, 
    .form-actions, .submit-button, .success-message, 
    .success-icon {
        /* These classes use the same styles as in the profile section */
    }

    @media (max-width: 640px) {
        .password-section {
            padding: 1.5rem;
            border-radius: 12px;
        }
        
        .password-title {
            font-size: 1.5rem;
        }
    }
</style>

<script>
    document.querySelectorAll('.password-toggle').forEach(function(button) {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('input');
            const icon = this.querySelector('svg');
            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
            }
        });
    });
</script>