@extends('layouts.app') 

@section('content') 
<div class="page-content"> 
    <div class="container-fluid"> 
        <div class="container"> 
            <div class="card"> 
                <div class="card-header"> 
                    <h4>About Section</h4> 
                </div> 
                <div class="card-body"> 
                    @if(session('success')) 
                        <div class="alert alert-success"> {{ session('success') }} </div> 
                    @endif 
                    @if($errors->any()) 
                        <div class="alert alert-danger"> 
                            <ul class="mb-0"> 
                                @foreach($errors->all() as $error) 
                                    <li>{{ $error }}</li> 
                                @endforeach 
                            </ul> 
                        </div> 
                    @endif 
                    
                    <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf 

                        <!-- Title --> 
                        <div class="row mb-4 align-items-center"> 
                            <label for="title" class="col-sm-2 col-form-label text-secondary">Title</label> 
                            <div class="col-sm-10"> 
                                <input type="text" name="title" id="title" value="{{ old('title', $about->title ?? '') }}" class="form-control @error('title') is-invalid @enderror"> 
                            </div> 
                        </div> 
                        
                        <!-- Short Title --> 
                        <div class="row mb-4 align-items-center"> 
                            <label for="short_title" class="col-sm-2 col-form-label text-secondary">Short Title</label> 
                            <div class="col-sm-10"> 
                                <input type="text" name="short_title" id="short_title" value="{{ old('short_title', $about->short_title ?? '') }}" class="form-control @error('short_title') is-invalid @enderror"> 
                            </div> 
                        </div> 

                        <!-- Short Description --> 
                        <div class="row mb-4"> 
                            <label for="short_description" class="col-sm-2 col-form-label text-secondary pt-2">Short Description</label> 
                            <div class="col-sm-10"> 
                                <textarea name="short_description" id="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', $about->short_description ?? '') }}</textarea>
                            </div> 
                        </div> 

                        <!-- Long Description --> 
                        <div class="row mb-4"> 
                            <label for="long_description" class="col-sm-2 col-form-label text-secondary pt-2">Long Description</label> 
                            <div class="col-sm-10"> 
                                <textarea name="long_description" id="long_description" rows="6" class="form-control @error('long_description') is-invalid @enderror">{{ old('long_description', $about->long_description ?? '') }}</textarea>
                            </div> 
                        </div> 
                        
                        <!-- About Image Upload --> 
                        <div class="row mb-4"> 
                            <label for="about_image" class="col-sm-2 col-form-label text-secondary pt-2">About Image</label> 
                            <div class="col-sm-10"> 
                                <input type="file" name="about_image" id="about_image" accept="image/*" class="form-control mb-3 rounded border border-2 p-1 @error('about_image') is-invalid @enderror"> 
                                
                                <!-- Current Image Preview --> 
                                <div class="image-preview-box mt-2"> 
                                    <img id="showImage" class="rounded border border-2 p-1" src="{{ (!empty($about->about_image)) ? url('upload/about_images/'.$about->about_image) : url('upload/no_image.jpg') }}" alt="About Image Preview" width="100px" style="height: 100px; object-fit: cover;"> 
                                </div> 
                            </div> 
                        </div> 
                        
                        <div class="row"> 
                            <div class="col-sm-2"></div> 
                            <div class="col-sm-10"> 
                                <button type="submit" class="btn btn-primary"> Update About </button> 
                            </div> 
                        </div> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 

<!-- JavaScript for Image Preview --> 
<script src="https://jquery.com"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#about_image').change(function(e) {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endsection
