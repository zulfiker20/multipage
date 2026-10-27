@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@section('content')
    <div class="page-content">
        <div class="container mt-1">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 text-dark fw-bold">Edit Profile Page</h5>
                </div>
                <div class="card-body p-4">
        
                    <!-- PUT Route Execution Form mapping matching UI action -->
                    <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
        
                        <!-- Name -->
                        <div class="row mb-4 align-items-center">
                            <label for="name" class="col-sm-2 col-form-label text-secondary">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" value="{{ old('name', $adminData->name) }}" class="form-control @error('name') is-invalid @enderror">
                            </div>
                        </div>
        
                        <!-- User Email -->
                        <div class="row mb-4 align-items-center">
                            <label for="email" class="col-sm-2 col-form-label text-secondary">User Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" value="{{ old('email', $adminData->email) }}" class="form-control @error('email') is-invalid @enderror">
                            </div>
                        </div>
        
                        <!-- UserName -->
                        <div class="row mb-4 align-items-center">
                            <label for="username" class="col-sm-2 col-form-label text-secondary">UserName</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" id="username" value="{{ old('username', $adminData->username) }}" class="form-control @error('username') is-invalid @enderror">
                               
                            </div>
                        </div>
        
                       <!-- Profile Image Upload -->
<div class="row mb-4">
    <label for="image" class="col-sm-2 col-form-label text-secondary pt-2">Profile Image</label>
    <div class="col-sm-10">
        <!-- onchange="previewImage(event)" ti bad diye jQuery selector use kora hoyeche -->
        <input type="file" name="image" id="image" class="form-control mb-3 rounded border border-2 p-1 @error('image') is-invalid @enderror">

        <!-- Current Profile Image -->
        <div class="image-preview-box mt-2">
            <!-- Ekhane id="showImage" add kora hoyeche -->
            <img id="showImage" class="rounded border border-2 p-1" src="{{ (!empty($adminData->image))? url('upload/admin_images/'.$adminData->image):url('upload/no_image.jpg') }}" alt="Profile Preview" width="100px" style="height: 100px; object-fit: cover;">
        </div>
    </div>
</div>

        
                        <!-- Update Profile -->
                        <div class="row">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn text-white px-4 fw-semibold" style="background-color: #0b4554; border-color: #0b4554;">
                                    Update Profile
                                </button>
                            </div>
                        </div>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Live Image Preview jQuery Code -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                // Input file choice korar por image selector src replace hobe
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
