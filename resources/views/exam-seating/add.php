@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/exam-seating.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<div class="container mt-4">
    <h3>Exam Seating</h3>
    <form id="parent-form" action="{{ route('exam-seating.store') }}" method="POST" class="mb-4">
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
                    <th>Register Number</th>
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
            const parentForm = document.getElementById('parent-form');
            const selectedValuesTableBody = document.querySelector('#selected-values-table tbody');
            const studentTableBody = document.querySelector('#student-table tbody');

            parentForm.addEventListener('submit', function (event) {
                event.preventDefault();

                // Clear existing student records
                studentTableBody.innerHTML = '';

                const rows = Array.from(selectedValuesTableBody.querySelectorAll('tr')).map(row => ({
                    department: row.cells[0].textContent.trim() || null,
                    year: row.cells[1].textContent.trim() || null,
                    regno_start: row.cells[2].textContent.trim() || null,
                    regno_end: row.cells[3].textContent.trim() || null,
                }));

                // Fetch records for each row in the selected-values-table
                Promise.all(rows.map(row => {
                    const queryParams = new URLSearchParams({
                        department: row.department || '',
                        year: row.year || '',
                        regno_start: row.regno_start || '',
                        regno_end: row.regno_end || ''
                    });

                    return fetch(`{{ url('/exam-seating/get-students') }}?${queryParams.toString()}`)
                        .then(response => response.json())
                        .catch(error => {
                            console.error('Error fetching records:', error);
                            return [];
                        });
                })).then(results => {
                    // Combine all fetched student records
                    const allStudents = results.flat();

                    // Populate the student table
                    allStudents.forEach((student, index) => {
                        const studentRow = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${student.name}</td>
                                <td>${student.student_id}</td>
                                <td>${student.department}</td>
                                <td>${student.year}</td>
                                <td>${student.batch}</td>
                                <td>${student.email}</td>
                                <td>${student.register_number}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm remove-row">Remove</button>
                                </td>
                            </tr>
                        `;
                        studentTableBody.insertAdjacentHTML('beforeend', studentRow);
                    });
                });
            });

            // Event delegation for removing rows
            studentTableBody.addEventListener('click', function (event) {
                if (event.target.classList.contains('remove-row')) {
                    const row = event.target.closest('tr');
                    row.remove();
                }
            });
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
            <div class="col-md-4 col-sm-6  bench_container">
                <div id="bench1" class="bench bench1">
                    <div class="student">
                        <h5>Student 1</h5>
                        <p>Roll No: 001</p>
                    </div>
                    <div class="student">
                        <h5>Student 2</h5>
                        <p>Roll No: 002</p>
                    </div>
                    <div class="student">
                        <h5>Student 3</h5>
                        <p>Roll No: 003</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6  bench_container">
                <div id="bench2" class="bench bench2">
                    <div class="student">
                        <h5>Student 4</h5>
                        <p>Roll No: 004</p>
                    </div>
                    <div class="student">
                        <h5>Student 5</h5>
                        <p>Roll No: 005</p>
                    </div>
                    <div class="student">
                        <h5>Student 6</h5>
                        <p>Roll No: 006</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container ">
                <div id="bench3" class="bench bench3">
                    <div class="student">
                        <h5>Student 7</h5>
                        <p>Roll No: 007</p>
                    </div>
                    <div class="student">
                        <h5>Student 8</h5>
                        <p>Roll No: 008</p>
                    </div>
                    <div class="student">
                        <h5>Student 9</h5>
                        <p>Roll No: 009</p>
                    </div>
                </div>
            </div>
            <!-- New Row -->
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench4" class="bench bench4">
                    <div class="student">
                        <h5>Student 10</h5>
                        <p>Roll No: 010</p>
                    </div>
                    <div class="student">
                        <h5>Student 11</h5>
                        <p>Roll No: &nbsp; 011</p>
                    </div>
                    <div class="student">
                        <h5>Student 12</h5>
                        <p>Roll No: 012</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench5" class="bench bench5">
                    <div class="student">
                        <h5>Student 13</h5>
                        <p>Roll No: 013</p>
                    </div>
                    <div class="student">
                        <h5>Student 14</h5>
                        <p>Roll No: 014</p>
                    </div>
                    <div class="student">
                        <h5>Student 15</h5>
                        <p>Roll No: 015</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench6" class="bench bench6">
                    <div class="student">
                        <h5>Student 16</h5>
                        <p>Roll No: 016</p>
                    </div>
                    <div class="student">
                        <h5>Student 17</h5>
                        <p>Roll No: 017</p>
                    </div>
                    <div class="student">
                        <h5>Student 18</h5>
                        <p>Roll No: 018</p>
                    </div>
                </div>
            </div>
            <!-- Additional Row -->
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench7" class="bench bench7">
                    <div class="student">
                        <h5>Student 19</h5>
                        <p>Roll No: 019</p>
                    </div>
                    <div class="student">
                        <h5>Student 20</h5>
                        <p>Roll No: 020</p>
                    </div>
                    <div class="student">
                        <h5>Student 21</h5>
                        <p>Roll No: 021</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench8" class="bench bench8">
                    <div class="student">
                        <h5>Student 22</h5>
                        <p>Roll No: 022</p>
                    </div>
                    <div class="student">
                        <h5>Student 23</h5>
                        <p>Roll No: 023</p>
                    </div>
                    <div class="student">
                        <h5>Student 24</h5>
                        <p>Roll No: 024</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench9" class="bench bench9">
                    <div class="student">
                        <h5>Student 25</h5>
                        <p>Roll No: 025</p>
                    </div>
                    <div class="student">
                        <h5>Student 26</h5>
                        <p>Roll No: 026</p>
                    </div>
                    <div class="student">
                        <h5>Student 27</h5>
                        <p>Roll No: 027</p>
                    </div>
                </div>
            </div>
            <!-- Additional Row -->
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench10" class="bench bench10">
                    <div class="student">
                        <h5>Student 28</h5>
                        <p>Roll No: 028</p>
                    </div>
                    <div class="student">
                        <h5>Student 29</h5>
                        <p>Roll No: 029</p>
                    </div>
                    <div class="student">
                        <h5>Student 30</h5>
                        <p>Roll No: 030</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench11" class="bench bench11">
                    <div class="student">
                        <h5>Student 31</h5>
                        <p>Roll No: 031</p>
                    </div>
                    <div class="student">
                        <h5>Student 32</h5>
                        <p>Roll No: 032</p>
                    </div>
                    <div class="student">
                        <h5>Student 33</h5>
                        <p>Roll No: 033</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench12" class="bench bench12">
                    <div class="student">
                        <h5>Student 34</h5>
                        <p>Roll No: 034</p>
                    </div>
                    <div class="student">
                        <h5>Student 35</h5>
                        <p>Roll No: 035</p>
                    </div>
                    <div class="student">
                        <h5>Student 36</h5>
                        <p>Roll No: 036</p>
                    </div>
                </div>
            </div>
            <!-- Additional Row -->
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench13" class="bench bench13">
                    <div class="student">
                        <h5>Student 37</h5>
                        <p>Roll No: 037</p>
                    </div>
                    <div class="student">
                        <h5>Student 38</h5>
                        <p>Roll No: 038</p>
                    </div>
                    <div class="student">
                        <h5>Student 39</h5>
                        <p>Roll No: 039</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench14" class="bench bench14">
                    <div class="student">
                        <h5>Student 40</h5>
                        <p>Roll No: 040</p>
                    </div>
                    <div class="student">
                        <h5>Student 41</h5>
                        <p>Roll No: 041</p>
                    </div>
                    <div class="student">
                        <h5>Student 42</h5>
                        <p>Roll No: 042</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 bench_container">
                <div id="bench15" class="bench bench15">
                    <div class="student">
                        <h5>Student 43</h5>
                        <p>Roll No: 043</p>
                    </div>
                    <div class="student">
                        <h5>Student 44</h5>
                        <p>Roll No: 044</p>
                    </div>
                    <div class="student">
                        <h5>Student 45</h5>
                        <p>Roll No: 045</p>
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



