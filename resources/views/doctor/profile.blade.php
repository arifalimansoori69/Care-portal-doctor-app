@extends('doctor.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Manage Doctor Profiles</h2>

    {{-- ✅ Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow p-3 bg-white rounded">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Qualification</th>
                    <th>Experience</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Availability</th>
                    <th>Timing</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                <tr>
                    {{-- ✅ Update Form --}}
                    <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <td>{{ $doctor->id }}</td>

                        <td>
                            @if($doctor->image)
                                <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" alt="Doctor" width="60" height="60" class="rounded-circle mb-2">
                            @else
                                <img src="{{ asset('assets/images/doctor-placeholder.jpg') }}" alt="No Image" width="60" height="60" class="rounded-circle mb-2">
                            @endif
                            <input type="file" name="image" class="form-control form-control-sm mt-1">
                        </td>

                        <td><input type="text" name="name" class="form-control" value="{{ $doctor->name }}"></td>
                        <td><input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}"></td>
                        <td><input type="text" name="qualification" class="form-control" value="{{ $doctor->qualification }}"></td>
                        <td><input type="number" name="experience" class="form-control" value="{{ $doctor->experience }}"></td>
                        <td><input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}"></td>
                        <td><input type="email" name="email" class="form-control" value="{{ $doctor->email }}"></td>
                        <td><input type="text" name="availability" class="form-control" value="{{ $doctor->availability }}"></td>
                        <td><input type="text" name="timing" class="form-control" value="{{ $doctor->timing }}"></td>

                        <td>
                            <select name="status" class="form-select">
                                <option value="active" {{ $doctor->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $doctor->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </td>

                        <td>
                            {{-- ✅ Update Button --}}
                            <button type="submit" class="btn btn-sm btn-success mb-1">
                                <i class="fas fa-save"></i> Update
                            </button>

                            {{-- ✅ Delete Button --}}
                            <a href="#"
                               onclick="event.preventDefault(); 
                                        if(confirm('Are you sure you want to delete this doctor?')) 
                                        document.getElementById('delete-form-{{ $doctor->id }}').submit();"
                               class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </a>

                            <form id="delete-form-{{ $doctor->id }}" 
                                  action="{{ route('doctor.destroy', $doctor->id) }}" 
                                  method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </form>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center">No doctors found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- ✅ Optional: Auto-hide success message after 3 seconds --}}
<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) alert.style.display = 'none';
    }, 3000);
</script>
@endsection
