@extends('admin.layout') {{-- apne admin master layout ka naam likhein --}}
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container mt-5">
    <h2 class="text-center mb-4">All Registered Doctors</h2>

    <div class="table-responsive shadow-lg rounded">
        <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark" style="color: white !important;">


                <tr>
                <th style="color:white !important;">ID</th>
    <th style="color:white !important;">Image</th>
    <th style="color:white !important;">Name</th>
    <th style="color:white !important;">Email</th>
                    <th style="color:white !important;">Phone</th>
                    <th style="color:white !important;">Specialization</th>
                    <th style="color:white !important;">Status</th>
                    <th style="color:white !important;">Created At</th>
                    <th style="color:white !important;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>
                            @if($doctor->image)
                                <img src="{{ asset('uploads/doctors/' .$doctor->image) }}" alt="Doctor Image" width="60" height="60" style="object-fit: cover; border-radius: 50%;">
                            @else
                                <img src="{{ asset('assets/images/default-doctor.png') }}" width="60" height="60" alt="Default">
                            @endif
                        </td>
                     
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->specialization }}</td>
                        <td>
                            @if($doctor->status == 'active')
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $doctor->created_at->format('d M Y') }}</td>
                        <td>
    <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-sm btn-primary">Edit</a>

    <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">
            Delete
        </button>
    </form>
</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
