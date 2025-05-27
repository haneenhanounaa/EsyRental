<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    /* Delete Account Section */
    .delete-account-section {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .delete-account-header {
        margin-bottom: 1.5rem;
    }

    .delete-account-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .delete-account-description {
        font-size: 0.95rem;
        color: #666;
        line-height: 1.5;
    }

    .delete-account-button {
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .delete-account-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Modal Styles */
    .modal-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
    }

    .modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        position: relative;
        width: 100%;
        max-width: 500px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        margin: 1rem;
    }

    .modal-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.5rem;
    }

    .modal-description {
        font-size: 0.95rem;
        color: #666;
        line-height: 1.5;
        margin-bottom: 1.5rem;
    }

    .delete-account-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .confirm-delete-button {
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .confirm-delete-button:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .cancel-button {
        padding: 0.75rem 1.5rem;
        background: #f3f4f6;
        color: #4b5563;
        font-weight: 500;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .cancel-button:hover {
        background: #e5e7eb;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    @media (max-width: 640px) {
        .delete-account-section {
            padding: 1.5rem;
        }

        .modal-content {
            padding: 1.5rem;
        }
    }
</style>
<section class="delete-account-section" x-data="{ showModal: false }">
    <header class="delete-account-header">
        <h2 class="delete-account-title">
            {{ __('Delete Account') }}
        </h2>
        <p class="delete-account-description">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button class="delete-account-button" @click="showModal = true">
        {{ __('Delete Account') }}
    </button>

    <div x-show="showModal" x-transition class="modal-container">
        <div class="modal-overlay" @click="showModal = false"></div>
        
        <div class="modal-content" @click.stop>
            <form method="post" action="{{ route('profile.destroy') }}" class="delete-account-form">
                @csrf
                @method('delete')

                <h2 class="modal-title">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="modal-description">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" 
                           class="form-input"
                           placeholder="{{ __('Password') }}" required>
                    @error('password', 'userDeletion')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="button" class="cancel-button" @click="showModal = false">
                        {{ __('Cancel') }}
                    </button>
                    <button type="submit" class="confirm-delete-button">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('alpine:init', () => {
        // Ensure teleport is available
        if (!Alpine.hasMagicHelper('teleport')) {
            Alpine.magic('teleport', el => (selector) => {
                let target = document.querySelector(selector)
                if (!target) return
                target.appendChild(el)
                return () => {
                    if (el.parentNode) el.parentNode.removeChild(el)
                }
            })
        }
    });
</script>
