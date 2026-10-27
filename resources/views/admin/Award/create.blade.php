@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Add Award</h4>

                    <a href="{{ route('admin.award.index') }}"
                       class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.award.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Title
                            </label>

                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title') }}"
                                   placeholder="Enter award title">

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="desc" class="form-label">
                                Description
                            </label>

                            <textarea name="desc"
                                      id="desc"
                                      rows="5"
                                      class="form-control @error('desc') is-invalid @enderror"
                                      placeholder="Enter award description">{{ old('desc') }}</textarea>

                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Award Image --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Award Image
                            </label>

                            <input type="file"
                                   name="image"
                                   id="image"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   class="form-control @error('image') is-invalid @enderror"
                                   onchange="previewImage(event)">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="text-muted">
                                Allowed formats: JPG, JPEG, PNG, WEBP.
                                Maximum size: 2MB.
                            </small>

                            {{-- Image Preview --}}
                            <div class="mt-3">
                                <img id="imagePreview"
                                     src="#"
                                     alt="Image Preview"
                                     style="display: none; max-width: 200px; max-height: 200px; object-fit: cover; border-radius: 5px;">
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Award
                        </button>

                        <a href="{{ route('admin.award.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
    function previewImage(event) {
        const image = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            image.src = URL.createObjectURL(file);
            image.style.display = 'block';
        } else {
            image.src = '#';
            image.style.display = 'none';
        }
    }
</script>
@endsection