@extends('layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Portfolio List</h4>

                        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Portfolio
                        </a>
                    </div>

                    <div class="card-body">

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>
                                    <tr>
                                        <th style="width: 60px;">SL</th>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Portfolio Image</th>
                                        <th style="width: 130px;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($portfolios as $key => $item)
                                        <tr>
                                            {{-- Serial Number --}}
                                            <td>{{ $key + 1 }}</td>

                                            {{-- Name --}}
                                            <td>{{ $item->name ?? '' }}</td>

                                            {{-- Title --}}
                                            <td>{{ $item->title ?? '' }}</td>

                                            {{-- Description --}}
                                            <td style="min-width: 200px; white-space: normal;">
                                                {{ \Illuminate\Support\Str::limit($item->desc ?? '', 100) }}
                                            </td>

                                            {{-- Portfolio Image --}}
                                            <td class="text-center">
                                                @if (!empty($item->image))
                                                    <img src="{{ asset('storage/' . $item->image) }}"
                                                        alt="{{ $item->name ?? 'Portfolio Image' }}" width="70"
                                                        height="70" class="rounded border p-1" style="object-fit: cover;"
                                                        onerror="this.onerror=null;this.src='{{ asset('upload/no_image.jpg') }}';">
                                                @else
                                                    <img src="{{ asset('upload/no_image.jpg') }}" alt="No Image"
                                                        width="70" height="70" class="rounded border p-1"
                                                        style="object-fit: cover;">
                                                @endif
                                            </td>

                                            {{-- Action Buttons --}}
                                            <td class="text-center">
                                                <a href="{{ route('admin.portfolio.edit', $item->id) }}"
                                                    class="btn btn-info btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('admin.portfolio.delete', $item->id) }}"
                                                    method="POST" style="display: inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this portfolio?')">

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
                                            <td colspan="6" class="text-center">
                                                No portfolio data found.
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
