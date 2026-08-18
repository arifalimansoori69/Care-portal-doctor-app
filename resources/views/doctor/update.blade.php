@extends('doctor.layout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Doctor Profile</h2>

    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $doctor->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Specialization</label>
            <input type="text" name="specialization" value="{{ $doctor->specialization }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Qualification</label>
            <input type="text" name="qualification" value="{{ $doctor->qualification }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Experience (years)</label>
            <input type="number" name="experience" value="{{ $doctor->experience }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $doctor->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Availability</label>
            <input type="text" name="availability" value="{{ $doctor->availability }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Timing</label>
            <input type="text" name="timing" value="{{ $doctor->timing }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select">
                <option value="active" {{ $doctor->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $doctor->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            @if($doctor->image)
                <img src="{{ asset('uploads/doctors/'.$doctor->image) }}" width="100" class="mb-2 rounded-circle">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('doctor.profile') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
