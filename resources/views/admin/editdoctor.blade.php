@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Edit Doctor Details</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Doctor Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $doctor->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $doctor->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $doctor->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="specialization" class="form-label">Specialization</label>
            <input type="text" name="specialization" id="specialization" class="form-control" value="{{ $doctor->specialization }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="active" {{ $doctor->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $doctor->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Doctor Image</label>
            <input type="file" name="image" id="image" class="form-control">

            @if ($doctor->image)
                <div class="mt-2">
                    <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" alt="Doctor Image" width="100" class="rounded shadow">
                </div>
            @endif
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary px-4">Update Doctor</button>
            <a href="{{ route('showdoc') }}" class="btn btn-secondary px-4 ms-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
