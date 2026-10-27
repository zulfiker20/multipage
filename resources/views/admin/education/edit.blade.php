
@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Education</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.education.update', $education->id) }}"
                          method="POST">
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
                                       value="{{$education->title }}"
                                       class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Year --}}
                        <div class="row mb-4 align-items-center">
                            <label for="year"
                                   class="col-sm-2 col-form-label text-secondary">
                                Year
                            </label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="year"
                                       id="year"
                                       min="0"
                                       max="9999"
                                       value="{{ $education->year}}"
                                       class="form-control @error('year') is-invalid @enderror">

                                @error('year')
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
                                          class="form-control @error('desc') is-invalid @enderror">{{ $education->desc }}</textarea>

                                @error('desc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Update Education
                                </button>

                                <a href="{{ route('admin.education.index') }}"
                                   class="btn btn-secondary">
                                    Cancel
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
