@extends('layouts.app') 

@section('content') 
<div class="page-content"> 
    <div class="container-fluid"> 
        <div class="container"> 
            <div class="card"> 
                <div class="card-header"> 
                    <h4>Home Banner</h4> 
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
                    
                    <form action="{{ route('banner.update') }}" method="POST" enctype="multipart/form-data"> 
                        @csrf 
                        @method('PUT') 
                        
                        <!-- Title --> 
                        <div class="row mb-4 align-items-center"> 
                            <label for="title" class="col-sm-2 col-form-label text-secondary">Title</label> 
                            <div class="col-sm-10"> 
                                <input type="text" name="title" id="title" value="{{ old('title', $banner->title ?? '') }}" class="form-control @error('title') is-invalid @enderror"> 
                            </div> 
                        </div> 
                        
                        <!-- Short Title --> 
                        <div class="row mb-4 align-items-center"> 
                            <label for="short_title" class="col-sm-2 col-form-label text-secondary">Short Title</label> 
                            <div class="col-sm-10"> 
                                <input type="text" name="short_title" id="short_title" value="{{ old('short_title', $banner->short_title ?? '') }}" class="form-control @error('short_title') is-invalid @enderror"> 
                            </div> 
                        </div> 
                        
                        <!-- Video URL --> 
                        <div class="row mb-4 align-items-center"> 
                            <label for="video_url" class="col-sm-2 col-form-label text-secondary">Video URL</label> 
                            <div class="col-sm-10"> 
                                <input type="text" name="video_url" id="video_url" value="{{ old('video_url', $banner->video_url ?? '') }}" class="form-control @error('video_url') is-invalid @enderror"> 
                            </div> 
                        </div> 
                        
                        <!-- Home Slide Image Upload --> 
                        <div class="row mb-4"> 
                            <label for="home_slide" class="col-sm-2 col-form-label text-secondary pt-2">Home Slide</label> 
                            <div class="col-sm-10"> 
                                <input type="file" name="home_slide" id="home_slide" accept="image/*" class="form-control mb-3 rounded border border-2 p-1 @error('home_slide') is-invalid @enderror"> 
                                
                                <!-- Current Image Preview --> 
                                <div class="image-preview-box mt-2"> 
                                    <img id="showImage" class="rounded border border-2 p-1" src="{{ (!empty($banner->home_slide)) ? url('upload/home_slide/'.$banner->home_slide) : url('upload/no_image.jpg') }}" alt="Home Slide Preview" width="100px" style="height: 100px; object-fit: cover;"> 
                                </div> 
                            </div> 
                        </div> 
                        
                        <div class="row"> 
                            <div class="col-sm-2"></div> 
                            <div class="col-sm-10"> 
                                <button type="submit" class="btn btn-primary"> Update Banner </button> 
                            </div> 
                        </div> 
                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 

<!-- Vanilla JavaScript (No jQuery Required) --> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#home_slide').change(function(e) {
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
