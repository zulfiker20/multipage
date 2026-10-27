@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Edit Award</h4>

                    <a href="{{ route('admin.award.index') }}"
                       class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.award.update', $award->id) }}"
                          method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Title
                            </label>

                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control @error('title') is-invalid @enderror"
                                   value="{{ old('title', $award->title) }}"
                                   placeholder="Enter award title">

                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="form-label">
                                Description
                            </label>

                            <textarea name="desc"
                                      id="desc"
                                      rows="5"
                                      class="form-control @error('desc') is-invalid @enderror"
                                      placeholder="Enter award description">{{ old('desc', $award->desc) }}</textarea>

                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update Award
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
@endsection
