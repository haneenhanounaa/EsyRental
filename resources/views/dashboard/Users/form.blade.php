<div class="mb-3">
  <label for="name" class="form-label">Name:</label>
  <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email:</label>
  <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="password" class="form-label">Password:</label>
  <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
  @if(isset($user))
      <small class="form-text text-muted">Leave blank to keep the current password.</small>
  @endif
</div>

<div class="mb-3">
  <label for="password_confirmation" class="form-label">Confirm Password:</label>
  <input type="password" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>

<div class="mb-3">
  <label for="role" class="form-label">Role:</label>
  <select name="role" class="form-control" required>
      <option value="admin" {{ (isset($user) && $user->role === 'admin') ? 'selected' : '' }}>Admin</option>
      <option value="user" {{ (isset($user) && $user->role === 'user') ? 'selected' : '' }}>User</option>
      <option value="client" {{ (isset($user) && $user->role === 'client') ? 'selected' : '' }}>Client</option>
  </select>
</div>
