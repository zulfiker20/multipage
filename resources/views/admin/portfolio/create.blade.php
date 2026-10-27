@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Add Portfolio</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.portfolio.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        {{-- Name --}}
                        <div class="row mb-4 align-items-center">
                            <label for="name"
                                class="col-sm-2 col-form-label text-secondary">
                                Name
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                    name="name"
                                    id="name"
                                    value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
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
                                Portfolio Image
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
                                        alt="Portfolio Image Preview"
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
                                    Save Portfolio
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection