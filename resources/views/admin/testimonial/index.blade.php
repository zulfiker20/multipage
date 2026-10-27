@extends('layouts.app')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="container">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Testimonial List</h4>

                    <a href="{{ route('admin.testimonial.create') }}"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Testimonial
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
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($testimonials as $item)
                                    <tr>
                                        <td>{{ $item->name ?? '' }}</td>

                                        <td>{{ $item->title ?? '' }}</td>

                                        <td>
                                            <a href="{{ route('admin.testimonial.edit', $item->id) }}"
                                               class="btn btn-info btn-sm"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('admin.testimonial.delete', $item->id) }}"
                                                  method="POST"
                                                  style="display: inline-block;"
                                                  onsubmit="return confirm('Are you sure you want to delete this testimonial?')">

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
                                        <td colspan="3" class="text-center">No testimonials found.</td>
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