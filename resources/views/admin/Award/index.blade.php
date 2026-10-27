@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Award List</h4>

                        <a href="{{ route('admin.award.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Award
                        </a>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-responsive dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($awards as $item)
                                        <tr>

                                            {{-- Title --}}
                                            <td>{{ $item->title ?? '' }}</td>

                                            {{-- Description --}}
                                            <td>{{ $item->desc ?? '' }}</td>

                                             {{-- Award Image --}}
                                            <td>
                                                @if ($item->image && Storage::disk('public')->exists($item->image))
                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                        alt="{{ $item->title ?? 'Award Image' }}" width="80"
                                                        height="60" style="object-fit: cover; border-radius: 5px;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>

                                            {{-- Actions --}}
                                            <td>
                                                <a href="{{ route('admin.award.edit', $item->id) }}"
                                                    class="btn btn-info btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('admin.award.delete', $item->id) }}" method="POST"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this award?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                No award data found.
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
