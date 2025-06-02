@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/exam-seating.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        #student-table tbody tr {
            height: 30px; /* Reduce row height */
        }

         .form-select-sm {
            width: 40%; /* Increase dropdown width by 10% */
        }
    </style>
</head>
<div class="container mt-4">
    <h3>Exam Seating</h3>
    <form action="{{ route('exam-seating.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="department" class="form-label">Department</label>
                <select id="department" name="department" class="form-select">
                    <option value="all">All</option>
                    @foreach(\App\Models\Student::select('department')->distinct()->get() as $dept)
                        <option value="{{ $dept->department }}">{{ $dept->department }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="year" class="form-label">Year</label>
                <select id="year" name="year" class="form-select">
                    <option value="all">All</option>
                    @foreach(\App\Models\Student::select('year')->distinct()->get() as $yr)
                        <option value="{{ $yr->year }}">{{ $yr->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="regno_start" class="form-label">Reg No Start</label>
                <select id="regno_start" name="regno_start" class="form-select">
                    <option value="all">All</option>
                    @foreach(\App\Models\Student::select('register_number')->distinct()->get() as $regno)
                        <option value="{{ $regno->register_number }}">{{ $regno->register_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="regno_end" class="form-label">Reg No End</label>
                <select id="regno_end" name="regno_end" class="form-select">
                    <option value="all">All</option>
                    @foreach(\App\Models\Student::select('register_number')->distinct()->get() as $regno)
                        <option value="{{ $regno->register_number }}">{{ $regno->register_number }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="button" id="add-row" class="btn btn-secondary mt-3">Add</button>
        <div class="mt-4">
            <h5>Selected Values</h5>
            <table id="selected-values-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Reg No Start</th>
                        <th>Reg No End</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be dynamically added here -->
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary mt-3" id="show_data">Show</button>
    </form>
    <div>
        <table id="student-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Batch</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated via AJAX -->
            </tbody>
        </table>
    </div>
    @push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script>
        $(document).ready(function () {
            $('#student-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('exam-seating.students.data') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'student_id', name: 'student_id' },
                    { data: 'department', name: 'department' },
                    { data: 'year', name: 'year' },
                    { data: 'batch', name: 'batch' },
                    { data: 'email', name: 'email' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
    @endpush
    <!-- Main Content -->
    <div class="main_container">
        <div class="d-flex gap-2 mb-4 justify-content-end" style="height: 30px;">
            <div class="col-12 col-md-3  d-flex align-items-center">
                <label for="roomno" class="form-label me-2 mb-0" style="white-space: nowrap;">Room No</label>
                <input type="number" id="roomno" name="roomno" class="form-control form-control-sm" value="101" readonly>
            </div>
            <div class="col-12 col-md-3  d-flex align-items-center">
                <label for="search" class="form-label me-2 mb-0">Search</label>
                <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Search">
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm">Download</button>
            </div>
        </div>
        
        <div class="main-content row g-3 p-2 mt-2" style="background-color:rgb(237, 241, 245);">

<div class="row">
    <!-- Bench 1 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench1" class="bench bench1">
            <div class="student dept1">
                <h5>Seat No: L1</h5>
                <p>Siva  M</p>
                <p>421324622001</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C1</h5>
                <p>Kaviya K</p>
                <p>421323798011</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R1</h5>
                <p>Pooja M</p>
                <p>421323622001</p>
            </div>
        </div>
    </div>

    <!-- Bench 6 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench6" class="bench bench6">
            <div class="student dept1">
                <h5>Seat No: L6</h5>
                <p>Rishika S</p>
                <p>421324622006</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C6</h5>
                <p>Kani G</p>
                <p>421323798016</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R6</h5>
                <p>Sumitha R</p>
                <p>421323622006</p>
            </div>
        </div>
    </div>

    <!-- Bench 11 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench11" class="bench bench11">
            <div class="student dept1">
                <h5>Seat No: L11</h5>
                <p>Nithiya P</p>
                <p>421324622011</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C11</h5>
                <p>Arul T</p>
                <p>421323798021</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R11</h5>
                <p>Madhu K</p>
                <p>421323622011</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Bench 2 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench2" class="bench bench2">
            <div class="student dept1">
                <h5>Seat No: L2</h5>
                <p>Subashre J</p>
                <p>421324622002</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C2</h5>
                <p>Sandy S</p>
                <p>421323798012</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R2</h5>
                <p>Priya T</p>
                <p>421323622002</p>
            </div>
        </div>
    </div>

    <!-- Bench 7 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench7" class="bench bench7">
            <div class="student dept1">
                <h5>Seat No: L7</h5>
                <p>Arvind S</p>
                <p>421324622007</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C7</h5>
                <p>Neha P</p>
                <p>421323798017</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R7</h5>
                <p>Karthik G</p>
                <p>421323622007</p>
            </div>
        </div>
    </div>

    <!-- Bench 12 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench12" class="bench bench12">
            <div class="student dept1">
                <h5>Seat No: L12</h5>
                <p>Lakshmi K</p>
                <p>421324622012</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C12</h5>
                <p>Priya S</p>
                <p>421323798022</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R12</h5>
                <p>Dinesh M</p>
                <p>421323622012</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Bench 3 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench3" class="bench bench3">
            <div class="student dept1">
                <h5>Seat No: L3</h5>
                <p>Divya P</p>
                <p>421324622003</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C3</h5>
                <p>Arun B</p>
                <p>421323798013</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R3</h5>
                <p>Nisha G</p>
                <p>421323622003</p>
            </div>
        </div>
    </div>

    <!-- Bench 8 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench8" class="bench bench8">
            <div class="student dept1">
                <h5>Seat No: L8</h5>
                <p>Simran V</p>
                <p>421324622008</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C8</h5>
                <p>Nikhil R</p>
                <p>421323798018</p>
            </div>
            <div class="student dept3 ">
                <h5>Seat No: R8</h5>
                <p>Ashwini B</p>
                <p>421323622008</p>
            </div>
        </div>
    </div>

    <!-- Bench 13 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench13" class="bench bench13">
            <div class="student dept1">
                <h5>Seat No: L13</h5>
                <p>Arpita G</p>
                <p>421324622013</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C13</h5>
                <p>Manish R</p>
                <p>421323798023</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R13</h5>
                <p>Kumar P</p>
                <p>421323622013</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Bench 4 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench4" class="bench bench4">
            <div class="student dept1">
                <h5>Seat No: L4</h5>
                <p>Priya R</p>
                <p>421324622004</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C4</h5>
                <p>Rahul P</p>
                <p>421323798014</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R4</h5>
                <p>Swati K</p>
                <p>421323622004</p>
            </div>
        </div>
    </div>

    <!-- Bench 9 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench9" class="bench bench9">
            <div class="student dept1">
                <h5>Seat No: L9</h5>
                <p>Ramesh K</p>
                <p>421324622009</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C9</h5>
                <p>Priya J</p>
                <p>421323798019</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R9</h5>
                <p>Ravi A</p>
                <p>421323622009</p>
            </div>
        </div>
    </div>

    <!-- Bench 14 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench14" class="bench bench14">
            <div class="student dept1">
                <h5>Seat No: L14</h5>
                <p>Kavi R</p>
                <p>421324622014</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C14</h5>
                <p>Aarti S</p>
                <p>421323798024</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R14</h5>
                <p>Vikram D</p>
                <p>421323622014</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Bench 5 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench5" class="bench bench5">
            <div class="student dept1">
                <h5>Seat No: L5</h5>
                <p>Gaurav S</p>
                <p>421324622005</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C5</h5>
                <p>Kavya V</p>
                <p>421323798015</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R5</h5>
                <p>Amit K</p>
                <p>421323622005</p>
            </div>
        </div>
    </div>

    <!-- Bench 10 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench10" class="bench bench10">
            <div class="student dept1">
                <h5>Seat No: L10</h5>
                <p>Neelam R</p>
                <p>421324622010</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C10</h5>
                <p>Anshika M</p>
                <p>421323798020</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R10</h5>
                <p>Kiran G</p>
                <p>421323622010</p>
            </div>
        </div>
    </div>

    <!-- Bench 15 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench15" class="bench bench15">
            <div class="student dept1">
                <h5>Seat No: L15</h5>
                <p>Asha R</p>
                <p>421324622015</p>
            </div>
            <div class="student dept2">
                <h5>Seat No: C15</h5>
                <p>Sonal T</p>
                <p>421323798025</p>
            </div>
            <div class="student dept3">
                <h5>Seat No: R15</h5>
                <p>Rahul G</p>
                <p>421323622015</p>
            </div>
        </div>
    </div>


</div>

            <div>
                <nav class="mt-2 mb-4">
                    <ul class="pagination d-flex justify-content-end align-items-center mb-0">
                        <li class="page-item">
                            <a class="page-link" href="#" id="prevButton">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" id="nextButton" style="white-space:nowrap">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> <!-- End of bench-container -->
    
</div>
@endsection
<script src="{{ asset('js/exam-seating.js') }}"></script>



