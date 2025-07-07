@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/exam-seating.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        #student-table tbody tr {
            height: 30px;
            /* Reduce row height */
        }

        .form-select-sm {
            width: 40%;
            /* Increase dropdown width by 10% */
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
    <div class="row mt-3">
        <div class="col-md-12">
            <h5>Students Array Table</h5>
            <table id="students-array-table" class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Year</th>
                        <th>Batch</th>
                        <th>Email</th>
                        <th>Register Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be dynamically added here -->
                </tbody>
            </table>
           
            </div>
        </div>
         <div class="row">
                <div class="col-12 col-md-3 mt-3 d-flex align-items-center">
                    <label for="roomno" class="form-label me-2 mb-0" style="white-space: nowrap;">Seating Order</label>
                    <select id="seating-order" class="form-select">
                        <option value="row">Row Wise</option>
                        <option value="column">Column Wise</option>
                        <option value="zigzag">Zigzag</option>
                    </select>
                </div>
                <div class="col-12 col-md-3  d-flex align-items-center">
                    <button class="btn btn-success mt-3" id="create_seating" onclick="showAlert()">Create Seating</button>
                </div>
    </div>
    <div>
        <table id="student-table" class="table table-striped table-bordered d-none">
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

            </tbody>
        </table>
       
<!-- JavaScript Function -->
    </div>
    @push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- <script>
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
    </script> -->
    @endpush
    <!-- Main Content -->
    <div class="main_container">


        <div class="main-content row g-3 p-2 mt-2" style="background-color:rgb(237, 241, 245);">

            <!-- <div class="d-flex gap-2 mb-4 justify-content-end" style="height: 30px;">

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
            </div> -->
            <div class="row mb-3 align-items-center">
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-success btn-sm me-2" id="export_excel">
                        <i class="bi bi-file-earmark-excel"></i> Export to Excel
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-danger btn-sm me-2" id="export_pdf">
                        <i class="bi bi-file-earmark-pdf"></i> Export to PDF
                    </button>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-primary btn-sm me-2" id="print_seating">
                        <i class="bi bi-printer"></i> Print
                    </button>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <span class="me-1"><i class="bi bi-search"></i></span>
                    <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Search">
                </div>
            </div>
            <div class="classroom" style="display:none">
                <div class="row class_room">
                    <!-- Bench 1 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench1" class="bench bench1">
                            <div class="student dept1">
                                <h5 id="seatL1">Seat No: L1</h5>
                                <p id="nameL1"></p>
                                <p id="regL1"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC1">Seat No: C1</h5>
                                <p id="nameC1"></p>
                                <p id="regC1"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR1">Seat No: R1</h5>
                                <p id="nameR1"></p>
                                <p id="regR1"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 6 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench6" class="bench bench6">
                            <div class="student dept1">
                                <h5 id="seatL6">Seat No: L6</h5>
                                <p id="nameL6"></p>
                                <p id="regL6"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC6">Seat No: C6</h5>
                                <p id="nameC6"></p>
                                <p id="regC6"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR6">Seat No: R6</h5>
                                <p id="nameR6"></p>
                                <p id="regR6"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 11 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench11" class="bench bench11">
                            <div class="student dept1">
                                <h5 id="seatL11">Seat No: L11</h5>
                                <p id="nameL11"></p>
                                <p id="regL11"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC11">Seat No: C11</h5>
                                <p id="nameC11"></p>
                                <p id="regC11"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR11">Seat No: R11</h5>
                                <p id="nameR11"></p>
                                <p id="regR11"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Bench 2 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench2" class="bench bench2">
                            <div class="student dept1">
                                <h5 id="seatL2">Seat No: L2</h5>
                                <p id="nameL2"></p>
                                <p id="regL2"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC2">Seat No: C2</h5>
                                <p id="nameC2"></p>
                                <p id="regC2"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR2">Seat No: R2</h5>
                                <p id="nameR2"></p>
                                <p id="regR2"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 7 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench7" class="bench bench7">
                            <div class="student dept1">
                                <h5 id="seatL7">Seat No: L7</h5>
                                <p id="nameL7"></p>
                                <p id="regL7"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC7">Seat No: C7</h5>
                                <p id="nameC7"></p>
                                <p id="regC7"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR7">Seat No: R7</h5>
                                <p id="nameR7"></p>
                                <p id="regR7"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 12 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench12" class="bench bench12">
                            <div class="student dept1">
                                <h5 id="seatL12">Seat No: L12</h5>
                                <p id="nameL12"></p>
                                <p id="regL12"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC12">Seat No: C12</h5>
                                <p id="nameC12"></p>
                                <p id="regC12"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR12">Seat No: R12</h5>
                                <p id="nameR12"></p>
                                <p id="regR12"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Bench 3 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench3" class="bench bench3">
                            <div class="student dept1">
                                <h5 id="seatL3">Seat No: L3</h5>
                                <p id="nameL3"></p>
                                <p id="regL3"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC3">Seat No: C3</h5>
                                <p id="nameC3"></p>
                                <p id="regC3"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR3">Seat No: R3</h5>
                                <p id="nameR3"></p>
                                <p id="regR3"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 8 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench8" class="bench bench8">
                            <div class="student dept1">
                                <h5 id="seatL8">Seat No: L8</h5>
                                <p id="nameL8"></p>
                                <p id="regL8"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC8">Seat No: C8</h5>
                                <p id="nameC8"></p>
                                <p id="regC8"></p>
                            </div>
                            <div class="student dept3 ">
                                <h5 id="seatR8">Seat No: R8</h5>
                                <p id="nameR8"></p>
                                <p id="regR8"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 13 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench13" class="bench bench13">
                            <div class="student dept1">
                                <h5 id="seatL13">Seat No: L13</h5>
                                <p id="nameL13"></p>
                                <p id="regL13"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC13">Seat No: C13</h5>
                                <p id="nameC13"></p>
                                <p id="regC13"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR13">Seat No: R13</h5>
                                <p id="nameR13"></p>
                                <p id="regR13"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Bench 4 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench4" class="bench bench4">
                            <div class="student dept1">
                                <h5 id="seatL4">Seat No: L4</h5>
                                <p id="nameL4"></p>
                                <p id="regL4"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC4">Seat No: C4</h5>
                                <p id="nameC4"></p>
                                <p id="regC4"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR4">Seat No: R4</h5>
                                <p id="nameR4"></p>
                                <p id="regR4"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 9 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench9" class="bench bench9">
                            <div class="student dept1">
                                <h5 id="seatL9">Seat No: L9</h5>
                                <p id="nameL9"></p>
                                <p id="regL9"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC9">Seat No: C9</h5>
                                <p id="nameC9"></p>
                                <p id="regC9"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR9">Seat No: R9</h5>
                                <p id="nameR9"></p>
                                <p id="regR9"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 14 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench14" class="bench bench14">
                            <div class="student dept1">
                                <h5 id="seatL14">Seat No: L14</h5>
                                <p id="nameL14"></p>
                                <p id="regL14"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC14">Seat No: C14</h5>
                                <p id="nameC14"></p>
                                <p id="regC14"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR14">Seat No: R14</h5>
                                <p id="nameR14"></p>
                                <p id="regR14"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Bench 5 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench5" class="bench bench5">
                            <div class="student dept1">
                                <h5 id="seatL5">Seat No: L5</h5>
                                <p id="nameL5"></p>
                                <p id="regL5"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC5">Seat No: C5</h5>
                                <p id="nameC5"></p>
                                <p id="regC5"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR5">Seat No: R5</h5>
                                <p id="nameR5"></p>
                                <p id="regR5"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 10 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench10" class="bench bench10">
                            <div class="student dept1">
                                <h5 id="seatL10">Seat No: L10</h5>
                                <p id="nameL10"></p>
                                <p id="regL10"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC10">Seat No: C10</h5>
                                <p id="nameC10"></p>
                                <p id="regC10"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR10">Seat No: R10</h5>
                                <p id="nameR10"></p>
                                <p id="regR10"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bench 15 -->
                    <div class="col-md-4 col-sm-6 bench_container">
                        <div id="bench15" class="bench bench15">
                            <div class="student dept1">
                                <h5 id="seatL15">Seat No: L15</h5>
                                <p id="nameL15"></p>
                                <p id="regL15"></p>
                            </div>
                            <div class="student dept2">
                                <h5 id="seatC15">Seat No: C15</h5>
                                <p id="nameC15"></p>
                                <p id="regC15"></p>
                            </div>
                            <div class="student dept3">
                                <h5 id="seatR15">Seat No: R15</h5>
                                <p id="nameR15"></p>
                                <p id="regR15"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- <div>
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
            </div> -->
        </div>
    </div> <!-- End of bench-container -->



</div>
@endsection
<script src="{{ asset('js/exam-seating.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
// Helper: Fill export table with all seating data
function fillExportTable(seatingData) {
    let tbody = document.querySelector('#export-table tbody');
    tbody.innerHTML = '';
    seatingData.forEach((stu, idx) => {
        let tr = document.createElement('tr');
        tr.innerHTML = `<td>${idx+1}</td><td>${stu.name}</td><td>${stu.department}</td><td>${stu.year}</td><td>${stu.seat}</td><td>${stu.room}</td>`;
        tbody.appendChild(tr);
    });
}
// Export to Excel (all rooms)
$('#export_excel').on('click', function() {
    if (!window.allSeatingData || !Array.isArray(window.allSeatingData) || window.allSeatingData.length === 0) {
        alert('No seating data to export!');
        return;
    }
    fillExportTable(window.allSeatingData);
    let table = document.getElementById('export-table');
    let wb = XLSX.utils.table_to_book(table, {sheet: "Seating"});
    XLSX.writeFile(wb, 'seating_order.xlsx');
});
// Export to PDF (all rooms)
$('#export_pdf').on('click', function() {
    if (!window.allSeatingData || !Array.isArray(window.allSeatingData) || window.allSeatingData.length === 0) {
        alert('No seating data to export!');
        return;
    }
    fillExportTable(window.allSeatingData);
    let table = document.getElementById('export-table');
    html2canvas(table).then(function(canvas) {
        let imgData = canvas.toDataURL('image/png');
        let doc = new jspdf.jsPDF('l', 'pt', 'a4');
        let pageWidth = doc.internal.pageSize.getWidth();
        let pageHeight = doc.internal.pageSize.getHeight();
        let imgWidth = canvas.width;
        let imgHeight = canvas.height;
        let ratio = Math.min(pageWidth / imgWidth, pageHeight / imgHeight);
        let x = (pageWidth - imgWidth * ratio) / 2;
        let y = 20;
        doc.addImage(imgData, 'PNG', x, y, imgWidth * ratio, imgHeight * ratio);
        doc.save('seating_order.pdf');
    });
});
// Print (only visible classroom)
$('#print_seating').on('click', function() {
    let classroom = document.querySelector('.classroom:visible, .classroom:not([style*="display: none"])');
    if (!classroom) classroom = document.querySelector('.classroom');
    if (!classroom) return;
    let printWindow = window.open('', '', 'height=600,width=900');
    printWindow.document.write('<html><head><title>Print Seating</title>');
    printWindow.document.write('<link rel="stylesheet" href="/css/exam-seating.css">');
    printWindow.document.write('</head><body >');
    printWindow.document.write(classroom.outerHTML);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.focus();
    setTimeout(function(){ printWindow.print(); printWindow.close(); }, 500);
});
// Search (show only matching benches in visible classroom)
$('#search').on('input', function(e) {
    let searchValue = this.value.trim().toLowerCase();
    let classroom = document.querySelector('.classroom:visible, .classroom:not([style*="display: none"])');
    if (!classroom) classroom = document.querySelector('.classroom');
    if (!classroom) return;
    $(classroom).find('.bench_container').each(function() {
        let found = false;
        $(this).find('p').each(function() {
            if ($(this).text().toLowerCase().includes(searchValue)) found = true;
        });
        $(this).toggle(found || !searchValue);
    });
});
$('#search').on('keypress', function(e) {
    if (e.which === 13) { // Enter key
        $(this).trigger('input');
    }
});
</script>

<!-- Hidden export table -->
<table id="export-table" class="d-none">
    <thead>
        <tr>
            <th>Serial No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Year</th>
            <th>Seat/Place</th>
            <th>Room No</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>