@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Multi Image</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.edit.multi.image', $multiImage->id) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf


                        {{-- New Image --}}
                        <div class="row mb-4">
                            <label for="multi_image"
                                class="col-sm-2 col-form-label text-secondary">
                                New Image
                            </label>

                            <div class="col-sm-10">
                                <input type="file"
                                    name="multi_image"
                                    id="multi_image"
                                    class="form-control rounded border border-2 p-1 @error('multi_image') is-invalid @enderror"
                                    accept="image/*">

                                @error('multi_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="mt-3">
                                    <img id="preview_image"
                                        src="#"
                                        alt="Preview"
                                        width="150"
                                        class="rounded border"
                                        style="display: none; object-fit: cover;">
                                </div>
                            </div>
                        </div>
                        {{-- Current Image --}}
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label text-secondary">
                                Current Image
                            </label>

                            <div class="col-sm-10">
                                <img src="{{ asset('storage/' . $multiImage->multi_image) }}"
                                    alt="Multi Image"
                                    width="150"
                                    class="rounded border mb-3"
                                    style="object-fit: cover;">

                                <input type="hidden"
                                    name="old_image"
                                    value="{{ $multiImage->multi_image }}">
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Image
                                </button>

                                <a href=""
                                    class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection