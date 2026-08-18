@extends('doctor.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Appointment List</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th></th>
                                    <th>Patient Name</th>
                                    <th>Doctor</th>
                                    <th>Appointment Date</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($appointments as $appointment)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $appointment->name }}</td>
    <td>{{ $appointment->doctor }}</td>
    <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d-m-Y') }}</td>
    <td>{{ $appointment->description ?? 'N/A' }}</td>
    <td>
        @if($appointment->image)
        <img src="{{ asset('uploads/' . $appointment->image) }}" alt="Appointment Image" width="100">

        @else
            N/A
        @endif
    </td>
    <td>{{ \Carbon\Carbon::parse($appointment->created_at)->format('d-m-Y H:i') }}</td>
</tr>
@empty
<tr>
    <td colspan="7" class="text-center">No appointments found.</td>
</tr>
@endforelse

                            </tbody>
                        </table>
                        <div class="mt-3">
    {{ $appointments->links() }}
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
