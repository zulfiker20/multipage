@extends('layouts.app') 

@section('content') 
<div class="page-content"> 
    <div class="container-fluid"> 
        <div class="container"> 
            <div class="card"> 
                <div class="card-header"> 
                    <h4>Add Multi Image</h4> 
                </div> 
                <div class="card-body"> 
                    <form action="{{route('admin.store.multi.image')}}" method="POST" enctype="multipart/form-data"> 
                        @csrf 
                        
                        <!-- Multi Image Upload --> 
                        <div class="row mb-4"> 
                            <label for="multi_image" class="col-sm-2 col-form-label text-secondary pt-2">Multi Image</label> 
                            <div class="col-sm-10"> 
                                <input type="file" name="multi_images[]" id="multi_image" multiple="" class="form-control mb-3 rounded border border-2 p-1 @error('multi_images') is-invalid @enderror"> 
                                
                                <div class="row mt-2" id="preview_images"></div> 
                            </div> 
                        </div> 
                        
                        <div class="row"> 
                            <div class="col-sm-2"></div> 
                            <div class="col-sm-10"> 
                                <button type="submit" class="btn btn-primary"> Add Multi Image </button> 
                            </div> 
                        </div> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 
@endsection
