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
                        @if (auth()->user()->hasRole('admin') || auth()->user()->can('create-exams'))
                            <a href="{{ route('exams.create') }}" class="btn btn-primary float-end">
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
                                <table class="table table-bordered table-hover" id="examsTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Name</th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Department</th>
                                            <th>Subject</th>
                                            <th>Session</th>
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
    </main>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<script>
    $(document).ready(function () {
        $('#examsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('exams.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'exam_name', name: 'exam_name' },
                { data: 'date', name: 'date' },
                { data: 'day', name: 'day' },
                { data: 'department', name: 'department' },
                { data: 'subject', name: 'subject' },
                { data: 'session', name: 'session' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
