@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

  <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="mb-3">
        <label for="category" class="form-label d-block fw-bold">
          Category <span class="text-muted fw-normal">(up to 3)</span>
        </label>

        @foreach ($all_categories as $category)
          <div class="form-check form-check-inline">
            @if (in_array($category->id,$selected_categories))
              <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}" checked>
            @else
              <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}">
            @endif
            <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
          </div>
        @endforeach
        <!-- ERROR -->
        @error('category')
          <div class="text-danger small">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea name="description" id="description" rows="3" class="form-control">{{ old('description',$post->description) }}</textarea>
        <!-- ERROR -->
        @error('description')
          <div class="text-danger small">{{ $message }}</div>
        @enderror
      </div>

      <div class="row mb-4">
        <div class="col-6">
          <label for="image" class="form-label fw-bold">Image</label>
          <img src="{{ $post->image }}" alt="post is {{ $post->id }}" class="img-thumbnail w-100">
          <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
          <div id="image-info" class="form-text">
            The acceptable formats are jpeg, jpg, png, and gif only. <br>
            Max file size is 1048kb.
          </div>
          <!-- error -->
          @error('image')
            <div class="text-danger small">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <button type="submit" class="btn btn-warning px-5">Save</button>
    </form>

@endsection