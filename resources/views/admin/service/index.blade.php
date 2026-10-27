
@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Service List</h4>

                    <a href="{{ route('admin.service.create') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Service
                    </a>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-bordered table-responsive dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Description</th>
                                    <th>Big Image</th>
                                    <th>Small Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($services as $item)
                                    <tr>
                                        <td>{{ $item->title ?? '' }}</td>

                                        <td>{{ $item->sub_title ?? '' }}</td>

                                        <td>
                                            {{ \Illuminate\Support\Str::limit($item->desc ?? '', 80) }}
                                        </td>

                                        <td>
                                            @if($item->big_image)
                                                <img
                                                    src="{{ asset('storage/' . $item->big_image) }}"
                                                    alt="Big Service Image"
                                                    width="100"
                                                    height="50"
                                                    style="object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if($item->small_image)
                                                <img
                                                    src="{{ asset('storage/' . $item->small_image) }}"
                                                    alt="Small Service Image"
                                                    width="100"
                                                    height="50"
                                                    style="object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.service.edit', $item->id) }}"
                                               class="btn btn-info btn-sm"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form
                                                action="{{ route('admin.service.delete', $item->id) }}"
                                                method="POST"
                                                style="display: inline-block;"
                                                onsubmit="return confirm('Are you sure you want to delete this service?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            No services data found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
