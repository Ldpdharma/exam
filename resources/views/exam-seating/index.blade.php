@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/exam-seating.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
 
</head>
<div class="container mt-4">
    <h3>Exam Seating</h3>
    <form action="{{ route('exam-seating.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="department" class="form-label">Department</label>
                <select id="department" name="department" class="form-select">
                    <option value="">All</option>
                    @foreach(\App\Models\Student::select('department')->distinct()->get() as $dept)
                        <option value="{{ $dept->department }}">{{ $dept->department }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="year" class="form-label">Year</label>
                <select id="year" name="year" class="form-select">
                    <option value="">All</option>
                    @foreach(\App\Models\Student::select('year')->distinct()->get() as $yr)
                        <option value="{{ $yr->year }}">{{ $yr->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="regno_start" class="form-label">Reg No Start</label>
                <select id="regno_start" name="regno_start" class="form-select">
                    <option value="">All</option>
                    @foreach(\App\Models\Student::select('register_number')->distinct()->get() as $regno)
                        <option value="{{ $regno->register_number }}">{{ $regno->register_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="regno_end" class="form-label">Reg No End</label>
                <select id="regno_end" name="regno_end" class="form-select">
                    <option value="">All</option>
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

        <button type="submit" class="btn btn-primary mt-3">Show</button>
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
                @if(isset($students) && count($students) > 0)
                    @foreach($students as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->department }}</td>
                            <td>{{ $student->year }}</td>
                            <td>{{ $student->batch }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->register_number }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-row">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" class="text-center">No records found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            const table = $('#student-table').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                lengthChange: true,
                pageLength: 5,
                language: {
                    search: "Filter records:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });

            // Fix: Ensure event delegation is properly set up for dynamically added rows
            $('#student-table tbody').on('click', '.remove-row', function() {
                const row = $(this).closest('tr'); // Get the closest table row
                table.row(row).remove().draw(); // Remove the row from DataTable and redraw
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            const addRowButton = document.getElementById('add-row');
            const selectedValuesTableBody = document.querySelector('#selected-values-table tbody');

            addRowButton.addEventListener('click', function () {
                const department = document.getElementById('department').value || 'All';
                const year = document.getElementById('year').value || 'All';
                const regnoStart = document.getElementById('regno_start').value || 'All';
                const regnoEnd = document.getElementById('regno_end').value || 'All';

                const row = `
                    <tr>
                        <td>${department}</td>
                        <td>${year}</td>
                        <td>${regnoStart}</td>
                        <td>${regnoEnd}</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
                        </td>
                    </tr>
                `;
                selectedValuesTableBody.insertAdjacentHTML('beforeend', row);
            });

            selectedValuesTableBody.addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-row')) {
                    const row = event.target.closest('tr');
                    row.remove();
                }
            });

            const parentForm = document.getElementById('parent-form');
            parentForm.addEventListener('submit', function (event) {
                const selectedValuesTableBody = document.querySelector('#selected-values-table tbody');
                const studentTableBody = document.querySelector('#student-table tbody');

                event.preventDefault();

                const rows = Array.from(selectedValuesTableBody.querySelectorAll('tr'));
                rows.forEach(row => {
                    const department = row.cells[0].textContent;
                    const year = row.cells[1].textContent;
                    const regnoStart = row.cells[2].textContent;
                    const regnoEnd = row.cells[3].textContent;


                    // Fetch records for each row
                    fetch(`{{ url('/exam-seating/get-students') }}?department=${department}&year=${year}&regno_start=${regnoStart}&regno_end=${regnoEnd}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log(`Records for Department: ${department}, Year: ${year}, Reg No Start: ${regnoStart}, Reg No End: ${regnoEnd}`, data);
                            // You can append the fetched data to the student table here
                        })
                        .catch(error => console.error('Error fetching records:', error));
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Fetch student data using AJAX
            fetch('{{ route('students.get') }}')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('student-table-body');
                    tableBody.innerHTML = ''; // Clear existing rows

                    data.forEach((student, index) => {
                        const row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${student.name}</td>
                                <td>${student.student_id}</td>
                                <td>${student.department}</td>
                                <td>${student.year}</td>
                                <td>${student.batch}</td>
                                <td>${student.email}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error fetching student data:', error));
        });
    </script>
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
            <div class="student">
                <h5>Seat No: L1</h5>
                <p>Anjali R</p>
                <p>421324622001</p>
            </div>
            <div class="student">
                <h5>Seat No: C1</h5>
                <p>Vikram K</p>
                <p>421323798011</p>
            </div>
            <div class="student">
                <h5>Seat No: R1</h5>
                <p>Pooja M</p>
                <p>421323622001</p>
            </div>
        </div>
    </div>

    <!-- Bench 6 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench6" class="bench bench6">
            <div class="student">
                <h5>Seat No: L6</h5>
                <p>Radhika J</p>
                <p>421324622006</p>
            </div>
            <div class="student">
                <h5>Seat No: C6</h5>
                <p>Suman T</p>
                <p>421323798016</p>
            </div>
            <div class="student">
                <h5>Seat No: R6</h5>
                <p>Sumit D</p>
                <p>421323622006</p>
            </div>
        </div>
    </div>

    <!-- Bench 11 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench11" class="bench bench11">
            <div class="student">
                <h5>Seat No: L11</h5>
                <p>Sunil P</p>
                <p>421324622011</p>
            </div>
            <div class="student">
                <h5>Seat No: C11</h5>
                <p>Shruti T</p>
                <p>421323798021</p>
            </div>
            <div class="student">
                <h5>Seat No: R11</h5>
                <p>Ashok K</p>
                <p>421323622011</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Bench 2 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench2" class="bench bench2">
            <div class="student">
                <h5>Seat No: L2</h5>
                <p>Karan J</p>
                <p>421324622002</p>
            </div>
            <div class="student">
                <h5>Seat No: C2</h5>
                <p>Meena S</p>
                <p>421323798012</p>
            </div>
            <div class="student">
                <h5>Seat No: R2</h5>
                <p>Ravi T</p>
                <p>421323622002</p>
            </div>
        </div>
    </div>

    <!-- Bench 7 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench7" class="bench bench7">
            <div class="student">
                <h5>Seat No: L7</h5>
                <p>Arvind S</p>
                <p>421324622007</p>
            </div>
            <div class="student">
                <h5>Seat No: C7</h5>
                <p>Neha P</p>
                <p>421323798017</p>
            </div>
            <div class="student">
                <h5>Seat No: R7</h5>
                <p>Karthik G</p>
                <p>421323622007</p>
            </div>
        </div>
    </div>

    <!-- Bench 12 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench12" class="bench bench12">
            <div class="student">
                <h5>Seat No: L12</h5>
                <p>Lakshmi K</p>
                <p>421324622012</p>
            </div>
            <div class="student">
                <h5>Seat No: C12</h5>
                <p>Priya S</p>
                <p>421323798022</p>
            </div>
            <div class="student">
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
            <div class="student">
                <h5>Seat No: L3</h5>
                <p>Divya P</p>
                <p>421324622003</p>
            </div>
            <div class="student">
                <h5>Seat No: C3</h5>
                <p>Arun B</p>
                <p>421323798013</p>
            </div>
            <div class="student">
                <h5>Seat No: R3</h5>
                <p>Nisha G</p>
                <p>421323622003</p>
            </div>
        </div>
    </div>

    <!-- Bench 8 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench8" class="bench bench8">
            <div class="student">
                <h5>Seat No: L8</h5>
                <p>Simran V</p>
                <p>421324622008</p>
            </div>
            <div class="student">
                <h5>Seat No: C8</h5>
                <p>Nikhil R</p>
                <p>421323798018</p>
            </div>
            <div class="student">
                <h5>Seat No: R8</h5>
                <p>Ashwini B</p>
                <p>421323622008</p>
            </div>
        </div>
    </div>

    <!-- Bench 13 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench13" class="bench bench13">
            <div class="student">
                <h5>Seat No: L13</h5>
                <p>Arpita G</p>
                <p>421324622013</p>
            </div>
            <div class="student">
                <h5>Seat No: C13</h5>
                <p>Manish R</p>
                <p>421323798023</p>
            </div>
            <div class="student">
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
            <div class="student">
                <h5>Seat No: L4</h5>
                <p>Priya R</p>
                <p>421324622004</p>
            </div>
            <div class="student">
                <h5>Seat No: C4</h5>
                <p>Rahul P</p>
                <p>421323798014</p>
            </div>
            <div class="student">
                <h5>Seat No: R4</h5>
                <p>Swati K</p>
                <p>421323622004</p>
            </div>
        </div>
    </div>

    <!-- Bench 9 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench9" class="bench bench9">
            <div class="student">
                <h5>Seat No: L9</h5>
                <p>Ramesh K</p>
                <p>421324622009</p>
            </div>
            <div class="student">
                <h5>Seat No: C9</h5>
                <p>Priya J</p>
                <p>421323798019</p>
            </div>
            <div class="student">
                <h5>Seat No: R9</h5>
                <p>Ravi A</p>
                <p>421323622009</p>
            </div>
        </div>
    </div>

    <!-- Bench 14 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench14" class="bench bench14">
            <div class="student">
                <h5>Seat No: L14</h5>
                <p>Kavi R</p>
                <p>421324622014</p>
            </div>
            <div class="student">
                <h5>Seat No: C14</h5>
                <p>Aarti S</p>
                <p>421323798024</p>
            </div>
            <div class="student">
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
            <div class="student">
                <h5>Seat No: L5</h5>
                <p>Gaurav S</p>
                <p>421324622005</p>
            </div>
            <div class="student">
                <h5>Seat No: C5</h5>
                <p>Kavya V</p>
                <p>421323798015</p>
            </div>
            <div class="student">
                <h5>Seat No: R5</h5>
                <p>Amit K</p>
                <p>421323622005</p>
            </div>
        </div>
    </div>

    <!-- Bench 10 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench10" class="bench bench10">
            <div class="student">
                <h5>Seat No: L10</h5>
                <p>Neelam R</p>
                <p>421324622010</p>
            </div>
            <div class="student">
                <h5>Seat No: C10</h5>
                <p>Anshika M</p>
                <p>421323798020</p>
            </div>
            <div class="student">
                <h5>Seat No: R10</h5>
                <p>Kiran G</p>
                <p>421323622010</p>
            </div>
        </div>
    </div>

    <!-- Bench 15 -->
    <div class="col-md-4 col-sm-6 bench_container">
        <div id="bench15" class="bench bench15">
            <div class="student">
                <h5>Seat No: L15</h5>
                <p>Asha R</p>
                <p>421324622015</p>
            </div>
            <div class="student">
                <h5>Seat No: C15</h5>
                <p>Sonal T</p>
                <p>421323798025</p>
            </div>
            <div class="student">
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



