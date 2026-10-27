@extends('layouts.app') 

@section('content') 
<div class="page-content"> 
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Default Datatable</h4>
                        <p class="card-title-desc">DataTables has most features enabled by
                            default, so all you need to do to use it with your own tables is to call
                            the construction function: <code>$().DataTable();</code>.
                        </p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

    <thead>
        <tr>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($multiImages as $item)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $item->multi_image) }}"
                        alt="Multi Image"
                        width="100"
                        height="70"
                        style="object-fit: cover;">
                </td>

                <td>
    <a href="{{ route('admin.edit.multi.image', $item->id) }}" class="btn btn-info btn-sm" title="Edit">
        <i class="fas fa-edit"></i>
    </a>

    <form action="{{ route('admin.delete.multi.image', $item->id) }}"
        method="POST"
        style="display: inline-block;"
        onsubmit="return confirm('Are you sure you want to delete this image?')">

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>
            </tr>
        @endforeach
    </tbody>
</table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> 
</div> 


@endsection
