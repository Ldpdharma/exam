@extends('layouts.app')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">{{ $main_title }}</h3>
                    </div>
                    <div class="col-sm-6">
                        @if (auth()->user()->hasRole('admin') || auth()->user()->can('create-teachers'))
                            <a href="{{ route('students.create') }}" class="btn btn-primary float-end">
                                <i class="bi bi-plus-circle"></i> Add Student
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $sub_title }}</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="studentTable">
                                    <thead>
                                        <tr>
                                            <th>SI.NO</th>
                                            <th>Name</th>
                                            <th>Student ID</th>
                                            <th>Department</th>
                                            <th>Year</th>
                                            <th>Batch</th>
                                            <th>Mobile</th> 
                                            <th>Email</th>
                                            <th>register_number</th>
                                            <th>roll_number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be populated via AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<script>
    $(document).ready(function () {
        $('#studentTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('students.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'student_id', name: 'student_id' },
                { data: 'department', name: 'department' },
                { data: 'year', name: 'year' },
                { data: 'batch', name: 'batch' },
                { data: 'mobile', name: 'mobile' },
                { data: 'email', name: 'email' },
                { data: 'register_number', name: 'register_number' },
                { data: 'roll_number', name: 'roll_number' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
