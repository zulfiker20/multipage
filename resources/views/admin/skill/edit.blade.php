@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Skill</h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.skill.update', $skill->id) }}"
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
                                       value="{{ old('title', $skill->title) }}"
                                       class="form-control @error('title') is-invalid @enderror"
                                       required>

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- Percentage --}}
                        <div class="row mb-4 align-items-center">
                            <label for="percentage"
                                   class="col-sm-2 col-form-label text-secondary">
                                Percentage (%)
                            </label>

                            <div class="col-sm-10">
                                <input type="number"
                                       name="percentage"
                                       id="percentage"
                                       value="{{ old('percentage', $skill->percentage) }}"
                                       min="0"
                                       max="100"
                                       step="1"
                                       class="form-control @error('percentage') is-invalid @enderror"
                                       required>

                                @error('percentage')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="row">
                            <div class="col-sm-2"></div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    Update Skill
                                </button>

                                <a href="{{ route('admin.skill.index') }}"
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
@endsection