
@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Add Service</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.service.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

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

                        {{-- Sub Title --}}
                        <div class="row mb-4 align-items-center">
                            <label for="sub_title"
                                   class="col-sm-2 col-form-label text-secondary">
                                Sub Title
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="sub_title"
                                       id="sub_title"
                                       value="{{ old('sub_title') }}"
                                       class="form-control @error('sub_title') is-invalid @enderror">

                                @error('sub_title')
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

                        {{-- Big Image --}}
                        <div class="row mb-4">
                            <label for="big_image"
                                   class="col-sm-2 col-form-label text-secondary pt-2">
                                Big Image
                            </label>

                            <div class="col-sm-10">
                                <input type="file"
                                       name="big_image"
                                       id="big_image"
                                       accept="image/*"
                                       class="form-control mb-3 rounded border border-2 p-1 @error('big_image') is-invalid @enderror">

                                @error('big_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="image-preview-box mt-2">
                                    <img id="showBigImage"
                                         class="rounded border border-2 p-1"
                                         src="{{ url('upload/no_image.jpg') }}"
                                         alt="Big Image Preview"
                                         width="100"
                                         height="100"
                                         style="object-fit: cover;">
                                </div>
                            </div>
                        </div>

                        {{-- Small Image --}}
                        <div class="row mb-4">
                            <label for="small_image"
                                   class="col-sm-2 col-form-label text-secondary pt-2">
                                Small Image
                            </label>

                            <div class="col-sm-10">
                                <input type="file"
                                       name="small_image"
                                       id="small_image"
                                       accept="image/*"
                                       class="form-control mb-3 rounded border border-2 p-1 @error('small_image') is-invalid @enderror">

                                @error('small_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="image-preview-box mt-2">
                                    <img id="showSmallImage"
                                         class="rounded border border-2 p-1"
                                         src="{{ url('upload/no_image.jpg') }}"
                                         alt="Small Image Preview"
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
                                    Save Service
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
    document.getElementById('big_image').addEventListener('change', function (event) {
        if (event.target.files && event.target.files[0]) {
            document.getElementById('showBigImage').src =
                URL.createObjectURL(event.target.files[0]);
        }
    });

    document.getElementById('small_image').addEventListener('change', function (event) {
        if (event.target.files && event.target.files[0]) {
            document.getElementById('showSmallImage').src =
                URL.createObjectURL(event.target.files[0]);
        }
    });
</script>
@endsection
