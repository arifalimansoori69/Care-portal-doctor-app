@extends('admin.layout')

@push('styles')
<style>
    .main-content {
        margin-left: 250px;
        padding: 20px;
        transition: all 0.3s;
    }
    
    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            width: 100%;
        }
    }
    
    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }
    
    .required:after {
        content: " *";
        color: red;
    }
</style>
@endpush

@section('content')
<div class="main-content">
    <div class="container">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Add New Doctor</h4>
            </div>
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('adddoctor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label required">Doctor Name</label>
                            <input type="text" name="name" id="name" class="form-control" 
                                   value="{{ old('name') }}" 
                                   placeholder="Enter doctor's full name" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label required">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                   value="{{ old('email') }}" 
                                   placeholder="Enter email address" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label required">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" 
                                   value="{{ old('phone') }}" 
                                   placeholder="Enter phone number" required>
                        </div>

                        <!-- Specialization -->
                        <div class="col-md-6 mb-3">
                            <label for="specialization" class="form-label required">Specialization</label>
                            <input type="text" name="specialization" id="specialization" class="form-control" 
                                   value="{{ old('specialization') }}" 
                                   placeholder="e.g., Cardiologist, Dentist" required>
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label required">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label required">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" 
                                       class="form-control" placeholder="Enter password" 
                                       required minlength="8" autocomplete="new-password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <small class="text-muted">Minimum 8 characters</small>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label required">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="password_confirmation" 
                                       class="form-control" placeholder="Confirm password" 
                                       required minlength="8" autocomplete="new-password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-4">
                            <label for="image" class="form-label">Profile Photo</label>
                            <input type="file" name="image" id="image" class="form-control" 
                                   onchange="previewImage(this)">
                            <small class="text-muted">Accepted formats: jpg, png, jpeg. Max size: 2MB</small>
                            <div class="mt-2" id="imagePreview" style="display: none;">
                                <img id="preview" src="#" alt="Preview" style="max-width: 150px; max-height: 150px;" class="img-thumbnail">
                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-3">
                        <a href="{{ route('adddoctor.create') }}" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus-circle me-1"></i> Add Doctor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Image preview function
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            imagePreview.style.display = 'none';
        }
    }
    
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush



@push('scripts')
<script>
    // Image preview functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Image preview
        const imageInput = document.getElementById('image');
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('preview');
                        const imagePreview = document.getElementById('imagePreview');
                        if (preview) {
                            preview.src = e.target.result;
                            imagePreview.style.display = 'block';
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Form validation
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('password_confirmation');
                
                if (password.value !== confirmPassword.value) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                    return false;
                }
                
                if (password.value.length < 8) {
                    e.preventDefault();
                    alert('Password must be at least 8 characters long!');
                    return false;
                }
                
                return true;
            });
        }
    });
</script>
@endpush

