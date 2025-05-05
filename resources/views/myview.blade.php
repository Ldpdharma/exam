@extends('layouts.app')

@section('content')
<main class="app-main">
    <div class="container mt-4">
        <h2 class="text-center">Welcome, {{ $student->name }}</h2>
        <p class="text-center">This is your personalized view.</p>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title">Exam Details</h5>
            </div>
            <div class="card-body">
                <table id="examTable1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Exam Name</th>
                            <th>Room No</th>
                            <th>Floor</th>
                            <th>Block</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mathematics</td>
                            <td>101</td>
                            <td>1</td>
                            <td>A</td>
                            <td>02-05-2025</td>
                            <td>10:00 AM</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Physics</td>
                            <td>102</td>
                            <td>1</td>
                            <td>B</td>
                            <td>04-05-2025</td>
                            <td>12:00 PM</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Chemistry</td>
                            <td>103</td>
                            <td>2</td>
                            <td>C</td>
                            <td>06-05-2025</td>
                            <td>02:00 PM</td>
                        </tr>
                    </tbody>
                </table>
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
        $('#examTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('myview.data') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'exam_name', name: 'exam_name' },
                { data: 'room_no', name: 'room_no' },
                { data: 'floor', name: 'floor' },
                { data: 'block', name: 'block' },
                { data: 'date', name: 'date' },
                { data: 'time', name: 'time' }
            ]
        });
    });
</script>
@endpush