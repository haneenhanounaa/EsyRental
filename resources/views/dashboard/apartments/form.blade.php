<div class="mb-3">
  <label>Title</label>
  <input type="text" name="title" class="form-control" value="{{ old('title', $apartment->title ?? '') }}" required>
</div>

<div class="mb-3">
  <label>Description</label>
  <textarea name="description" class="form-control" required>{{ old('description', $apartment->description ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label>Location</label>
  <input type="text" name="location" class="form-control" value="{{ old('location', $apartment->location ?? '') }}" required>
</div>

<div class="mb-3">
  <label>Price</label>
  <input type="number" name="price" class="form-control" value="{{ old('price', $apartment->price ?? '') }}" required>
</div>

<div class="mb-3">
  <label>Rooms</label>
  <input type="number" name="rooms" class="form-control" value="{{ old('rooms', $apartment->rooms ?? '') }}" required>
</div>

{{-- <div class="mb-3">
  <label>Number of Nights</label>
  <input type="number" name="number_of_nights" class="form-control" value="{{ old('number_of_nights', $apartment->number_of_nights ?? '') }}" required>
</div> --}}

<div class="mb-3">
  <label>Guests</label>
  <input type="number" name="num_guests" class="form-control" value="{{ old('num_guests', $apartment->num_guests ?? '') }}" required>
</div>

<div class="mb-3">
  <label>Image</label>
  <input type="file" name="image" class="form-control">
</div>
