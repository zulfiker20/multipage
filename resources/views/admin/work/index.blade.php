
@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Work List</h4>

                    <a href="{{ route('admin.work.create') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Work
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-bordered table-responsive dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($works as $work)
                                    <tr>
                                        <td>{{ $work->name }}</td>
                                        <td>{{ $work->title }}</td>
                                        <td>
                                            @if ($work->image)
                                                <img src="{{ asset('storage/' . $work->image) }}"
                                                     alt="{{ $work->name }}"
                                                     width="100">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.work.edit', $work->id) }}"
                                               class="btn btn-sm btn-primary">
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.work.delete', $work->id) }}"
                                                  method="POST"
                                                  style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this work?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
