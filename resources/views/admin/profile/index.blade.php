@extends('layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid px-4 mt-4">
            <div class="row">
                
                <!-- Left Side: Profile Information Card (6 Columns) -->
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center p-5">
                            <!-- Profile Picture Placeholders -->
                            <img src="{{ (!empty($adminData->image))? url('upload/admin_images/'.$adminData->image):url('upload/no_image.jpg') }}" 
                                 alt="Admin Profile" 
                                 class="rounded-circle img-fluid border border-3 border-light shadow-sm mb-3" 
                                 style="width: 120px; height: 120px; object-fit: cover;">
                            
                            <hr class="my-4">
                            
                            <!-- Profile Details -->
                            <div class="text-start">
                                <div class="mb-3">
                                    <span class="text-muted d-block small fw-semibold uppercase">Full Name</span>
                                    <span class="text-dark fw-medium">{{ $adminData->name }}</span>
                                </div>
                                <div class="mb-3">
                                    <span class="text-muted d-block small fw-semibold uppercase">Email Address</span>
                                    <span class="text-dark fw-medium">{{ $adminData->email }}</span>
                                </div>
                                <div class="mb-3">
                                    <span class="text-muted d-block small fw-semibold uppercase">Username</span>
                                    <span class="text-dark fw-medium">{{ $adminData->username ?? 'N/A' }}</span>
                                </div>

                                <div class="mb-3">
                                    <a href="{{route('admin.profile.edit')}}" class="btn btn-primary fw-semibold shadow-sm">
                                        <i class="ri-edit-box-line me-1"></i> Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
              
        
            </div>
        </div>

    </div>
@endsection
