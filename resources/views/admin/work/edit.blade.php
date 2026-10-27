
@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Work</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.work.update', $work->id) }}"
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
                                       value="{{ old('name', $work->name) }}"
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
                                       value="{{ old('title', $work->title) }}"
                                       class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Image Upload --}}
                        <div class="row mb-4">
                            <label for="image"
                                   class="col-sm-2 col-form-label text-secondary pt-2">
                                Work Image
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
                                         src="{{ $work->image
                                             ? asset('storage/' . $work->image)
                                             : url('upload/no_image.jpg') }}"
                                         alt="Work Image Preview"
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
                                    Update Work
                                </button>

                                <a href=""
                                   class="btn btn-secondary">
                                    Back
                                </a>
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
