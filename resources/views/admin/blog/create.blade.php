
@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Add Blog</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.blog.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        {{-- Category --}}
                        <div class="row mb-4 align-items-center">
                            <label for="category_id"
                                   class="col-sm-2 col-form-label text-secondary">
                                Category
                            </label>

                            <div class="col-sm-10">
                                <select name="category_id"
                                        id="category_id"
                                        class="form-select @error('category_id') is-invalid @enderror">

                                    <option value="">Select Category</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Title --}}
                        <div class="row mb-4 align-items-center">
                            <label for="title"
                                   class="col-sm-2 col-form-label text-secondary">
                                Title
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="title"
                                       id="title"
                                       value="{{ old('title') }}"
                                       class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Tags --}}
                        <div class="row mb-4 align-items-center">
                            <label for="tags"
                                   class="col-sm-2 col-form-label text-secondary">
                                Tags
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="tags"
                                       id="tags"
                                       data-role="tagsinput"
                                       value="{{ old('tags') }}"
                                       placeholder="Laravel, PHP, Web Development"
                                       class="form-control @error('tags') is-invalid @enderror">

                                @error('tags')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-4">
                            <label for="desc"
                                   class="col-sm-2 col-form-label text-secondary pt-2">
                                Description
                            </label>

                            <div class="col-sm-10">
                                <textarea name="desc"
                                          id="desc"
                                          rows="5"
                                          class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>

                                @error('desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Image Upload --}}
                        <div class="row mb-4">
                            <label for="image"
                                   class="col-sm-2 col-form-label text-secondary pt-2">
                                Blog Image
                            </label>

                            <div class="col-sm-10">
                                <input type="file"
                                       name="image"
                                       id="image"
                                       accept="image/*"
                                       class="form-control mb-3 rounded border border-2 p-1 @error('image') is-invalid @enderror">

                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="image-preview-box mt-2">
                                    <img id="showImage"
                                         class="rounded border border-2 p-1"
                                         src="{{ url('upload/no_image.jpg') }}"
                                         alt="Blog Image Preview"
                                         width="100"
                                         height="100"
                                         style="object-fit: cover;">
                                </div>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Save Blog
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0];

        if (file) {
            document.getElementById('showImage').src =
                URL.createObjectURL(file);
        }
    });
</script>
@endsection
