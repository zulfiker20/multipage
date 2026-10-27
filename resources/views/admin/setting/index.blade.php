@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Setting</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.setting.store', $settings?->id) }}"
                          method="POST">

                        @csrf

                        {{-- Number --}}
                        <div class="row mb-4 align-items-center">
                            <label for="number"
                                   class="col-sm-2 col-form-label text-secondary">
                                Number
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="number"
                                       id="number"
                                       value="{{ $settings?->number }}"
                                       class="form-control @error('number') is-invalid @enderror">

                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Short Description --}}
                        <div class="row mb-4">
                            <label for="short_description"
                                   class="col-sm-2 col-form-label text-secondary pt-2">
                                Short Description
                            </label>

                            <div class="col-sm-10">
                                <textarea name="short_description"
                                          id="short_description"
                                          rows="4"
                                          class="form-control @error('short_description') is-invalid @enderror">{{ $settings?->short_description }}</textarea>

                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="row mb-4 align-items-center">
                            <label for="adress"
                                   class="col-sm-2 col-form-label text-secondary">
                                Address
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="adress"
                                       id="adress"
                                       value="{{ $settings?->adress }}"
                                       class="form-control @error('adress') is-invalid @enderror">

                                @error('adress')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row mb-4 align-items-center">
                            <label for="email"
                                   class="col-sm-2 col-form-label text-secondary">
                                Email
                            </label>

                            <div class="col-sm-10">
                                <input type="email"
                                       name="email"
                                       id="email"
                                       value="{{ $settings?->email }}"
                                       class="form-control @error('email') is-invalid @enderror">

                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Facebook --}}
                        <div class="row mb-4 align-items-center">
                            <label for="facebook"
                                   class="col-sm-2 col-form-label text-secondary">
                                Facebook URL
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="facebook"
                                       id="facebook"
                                       value="{{ $settings?->facebook }}"
                                       class="form-control @error('facebook') is-invalid @enderror">

                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Twitter --}}
                        <div class="row mb-4 align-items-center">
                            <label for="twitter"
                                   class="col-sm-2 col-form-label text-secondary">
                                Twitter URL
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="twitter"
                                       id="twitter"
                                       value="{{ $settings?->twitter }}"
                                       class="form-control @error('twitter') is-invalid @enderror">

                                @error('twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Copyright --}}
                        <div class="row mb-4 align-items-center">
                            <label for="copyright"
                                   class="col-sm-2 col-form-label text-secondary">
                                Copyright
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="copyright"
                                       id="copyright"
                                       value="{{ old('copyright', $settings?->copyright) }}"
                                       class="form-control @error('copyright') is-invalid @enderror">

                                @error('copyright')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Update Setting
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