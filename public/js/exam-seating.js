document.addEventListener('DOMContentLoaded', () => {
    console.log('Exam Seating page loaded.');

    const departmentDropdown = document.getElementById('department');
    const yearDropdown = document.getElementById('year');
    const regnoStartInput = document.getElementById('regno_start');
    const regnoEndInput = document.getElementById('regno_end');
    const filterButton = document.getElementById('filter-students');
    const seatingOrderDropdown = document.getElementById('seating_order');
    const arrangeButton = document.getElementById('arrange-seating');
    const addRowBtn = document.getElementById('add-row');
    const showBtn = document.getElementById('show_data');
    const selectedTableBody = document.querySelector('#selected-values-table tbody');
    const studentTableBody = document.querySelector('#student-table tbody');

    let selectedCriteria = [];
    let studentsArray = [];

    function updateTable(students) {
        const tableBody = document.querySelector('#student-table tbody');
        tableBody.innerHTML = '';

        students.forEach((student, idx) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${idx + 1}</td>
                <td>${student.name}</td>
                <td>${student.student_id}</td>
                <td>${student.department}</td>
                <td>${student.year}</td>
                <td>${student.batch}</td>
                <td>${student.email}</td>
                <td>
                    <button class="btn btn-danger btn-sm remove-row">Remove</button>
                </td>
            `;
            tableBody.appendChild(row);
        });

        // Initialize DataTables
        if ($.fn.DataTable.isDataTable('#student-table')) {
            $('#student-table').DataTable().destroy();
        }
        $('#student-table').DataTable({
            pageLength: 10,
            order: [[0, 'asc']],
            columnDefs: [
                { targets: [0, 1, 2, 3, 4, 5, 6], orderable: true },
                { targets: [7], orderable: false }
            ]
        });
    }

    function filterStudents() {
        const department = departmentDropdown.value;
        const year = yearDropdown.value;
        const regnoStart = regnoStartInput.value;
        const regnoEnd = regnoEndInput.value;

        fetch('/exam-seating/filter-students', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ department, year, regno_start: regnoStart, regno_end: regnoEnd })
        })
        .then(response => response.json())
        .then(data => {
            updateTable(data);
        })
        .catch(error => console.error('Error:', error));
    }

    addRowBtn.addEventListener('click', () => {
        const department = departmentDropdown.value;
        const year = yearDropdown.value;
        const regnoStart = regnoStartInput.value;
        const regnoEnd = regnoEndInput.value;
        if (!department || !year || !regnoStart || !regnoEnd) {
            alert('Please select all fields.');
            return;
        }
        selectedCriteria.push([department, year, regnoStart, regnoEnd]);
        renderSelectedTable();
        // alert(JSON.stringify(selectedCriteria));
    });

    function renderSelectedTable() {
        selectedTableBody.innerHTML = '';
        selectedCriteria.forEach((item, idx) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item[0]}</td>
                <td>${item[1]}</td>
                <td>${item[2]}</td>
                <td>${item[3]}</td>
                <td>
                    <button class="btn btn-danger btn-sm remove-row" data-idx="${idx}">Remove</button>
                </td>
            `;
            selectedTableBody.appendChild(row);
        });
    }

    selectedTableBody.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-row')) {
            const idx = e.target.getAttribute('data-idx');
            selectedCriteria.splice(idx, 1);
            renderSelectedTable();
        }
    });

    showBtn.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent form submission and page refresh
        const filters = selectedCriteria.map(item => ({
            department: item[0],
            year: item[1],
            regno_start: item[2],
            regno_end: item[3]
        }));
        fetch('/exam-seating/filter-multi', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ filters })
        })
        .then(response => response.json())
        .then(data => {
            studentTableBody.innerHTML = '';
            studentsArray = [];
            if (Array.isArray(data) && data.length > 0) {
                data.forEach((student, idx) => {
                    // student is now an array: [name, register_number, department, year]
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${idx + 1}</td>
                        <td>${student[0]}</td>
                        <td>${student[2]}</td>
                        <td>${student[3]}</td>
                        <td>${student[1]}</td>
                    `;
                    studentTableBody.appendChild(row);
                    studentsArray.push(student);
                });
            } else {
                studentTableBody.innerHTML = '<tr><td colspan="5">No records found</td></tr>';
            }
        //    alert(JSON.stringify(studentsArray));
            renderStudentsArrayTable();
        })
        .catch(error => {
            alert('Error fetching students: ' + error);
            console.error('Error:', error);
        });
    });

    studentTableBody.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-student')) {
            e.target.closest('tr').remove();
        }
    });

    let studentsArrayTableBody = document.querySelector('#students-array-table tbody');
    function renderStudentsArrayTable() {
        const studentsArrayTableBody = document.querySelector('#students-array-table tbody');
        studentsArrayTableBody.innerHTML = '';
        if (Array.isArray(studentsArray) && studentsArray.length > 0) {
            studentsArray.forEach((student, idx) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${idx + 1}</td>
                    <td>${student[0]}</td>
                    <td>${student[2]}</td>
                    <td>${student[3]}</td>
                    <td>${student[4]}</td>
                    <td>${student[5]}</td>
                    <td>${student[1]}</td>
                    <td><button class="btn btn-danger btn-sm remove-student-array" data-idx="${idx}">Remove</button></td>
                `;
                studentsArrayTableBody.appendChild(row);
            });
        } else {
            studentsArrayTableBody.innerHTML = '<tr><td colspan="8">No records found</td></tr>';
        }
        // Only initialize DataTable once, not on every render
        if (!$.fn.DataTable.isDataTable('#students-array-table')) {
            $('#students-array-table').DataTable({
                pageLength: 10,
                searching: true,
                ordering: true,
                lengthChange: true,
                language: {
                    search: "Search:"
                }
            });
        } else {
            $('#students-array-table').DataTable().clear().rows.add($('#students-array-table tbody tr')).draw();
        }
    }

    function arrangeStudentsArray() {
        const order = seatingOrderDropdown.value;
        if (order === 'row') {
            // Sort studentsArray by department ascending, then by name ascending
            studentsArray.sort((a, b) => {
                if (a[2] === b[2]) {
                    return a[0].localeCompare(b[0]);
                }
                return a[2].localeCompare(b[2]);
            });
        } else if (order === 'pro') {
            // Sort studentsArray by year ascending, then by department ascending, then by name ascending
            studentsArray.sort((a, b) => {
                if (a[3] === b[3]) {
                    if (a[2] === b[2]) {
                        return a[0].localeCompare(b[0]);
                    }
                    return a[2].localeCompare(b[2]);
                }
                return a[3] - b[3];
            });
        }
        renderStudentsArrayTable();
    }

    // Add event listeners
    filterButton.addEventListener('click', filterStudents);
    departmentDropdown.addEventListener('change', filterStudents);
    yearDropdown.addEventListener('change', filterStudents);
    regnoStartInput.addEventListener('change', filterStudents);
    regnoEndInput.addEventListener('change', filterStudents);
    seatingOrderDropdown.addEventListener('change', arrangeStudentsArray);

    arrangeButton.addEventListener('click', () => {
        const seatingOrder = seatingOrderDropdown.value;
        const selectedStudents = Array.from(document.querySelectorAll('#student-table tbody tr'))
            .map(row => ({
                id: row.querySelector('td:nth-child(3)').textContent,
                name: row.querySelector('td:nth-child(2)').textContent,
                department: row.querySelector('td:nth-child(4)').textContent,
                year: row.querySelector('td:nth-child(5)').textContent,
                register_number: row.querySelector('td:nth-child(6)').textContent
            }));

        fetch('/exam-seating/arrange-students', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ seatingOrder, students: selectedStudents })
        })
        .then(response => response.json())
        .then(data => {
            const benchContainer = document.getElementById('bench-container');
            benchContainer.innerHTML = '';

            data.forEach((bench, idx) => {
                const benchDiv = document.createElement('div');
                benchDiv.className = `bench bench${idx + 1}`;

                bench.forEach(student => {
                    const studentDiv = document.createElement('div');
                    studentDiv.className = `student dept${student.department}`;
                    studentDiv.innerHTML = `
                        <span class="student-name">${student.name}</span>
                        <span class="student-id">${student.student_id}</span>
                    `;
                    benchDiv.appendChild(studentDiv);
                });

                benchContainer.appendChild(benchDiv);
            });
        })
        .catch(error => console.error('Error:', error));
    });

    function renderBenchesFromStudentsArray() {
        const benchesContainer = document.getElementById('benches-container');
        benchesContainer.innerHTML = '';
        // 15 benches, 3 departments per bench
        for (let i = 0; i < 15; i++) {
            const benchDiv = document.createElement('div');
            benchDiv.className = 'bench bench' + (i + 1);
            for (let dept = 1; dept <= 3; dept++) {
                const studentIdx = i * 3 + (dept - 1);
                if (studentsArray[studentIdx]) {
                    const student = studentsArray[studentIdx];
                    const studentDiv = document.createElement('div');
                    studentDiv.className = 'student dept' + dept;
                    studentDiv.innerHTML = `
                        <h5>Seat No: ${['L','C','R'][dept-1]}${i+1}</h5>
                        <p>${student[0]}</p>
                        <p>${student[1]}</p>
                    `;
                    benchDiv.appendChild(studentDiv);
                }
            }
            benchesContainer.appendChild(benchDiv);
        }
    }

    $(document).ready(function() {
        if ($.fn.DataTable.isDataTable('#students-array-table')) {
            $('#students-array-table').DataTable().destroy();
        }
        $('#students-array-table').DataTable({
            pageLength: 10,
            searching: true,
            ordering: true,
            lengthChange: true,
            language: {
                search: "Search:"
            }
        });
    });

 

    // Search functionality for benches
    document.getElementById('search').addEventListener('input', function () {
        let searchValue = this.value.trim().toLowerCase();
        document.querySelectorAll('.bench_container').forEach(container => {
            let found = false;
            container.querySelectorAll('p').forEach(p => {
                if (p.textContent.toLowerCase().includes(searchValue)) found = true;
            });
            container.style.backgroundColor = found && searchValue ? '#ffeeba' : '';
        });
    });
});

 function showAlert() {
        alert("Button was clicked!");

          
        // studentsArray should be an array of arrays or objects: [[name, regno], ...] or [{name, register_number}, ...]
        // For demo, you may want to console.log(studentsArray) here
        const seatLabels = ['L', 'C', 'R'];
        const benches = 15;
        const seatsPerClassroom = benches * 3;
        let totalStudents = studentsArray.length;
        let classroomsNeeded = Math.ceil(totalStudents / seatsPerClassroom);
        let studentIdx = 0;

        // Fill the first classroom (static HTML)
        for (let bench = 1; bench <= benches; bench++) {
            for (let dept = 0; dept < 3; dept++) {
                if (studentIdx >= totalStudents) break;
                let seat = seatLabels[dept] + bench;
                let nameElem = document.getElementById('name' + seat);
                let regElem = document.getElementById('reg' + seat);
                let student = studentsArray[studentIdx];
                if (student) {
                    // Support both array and object format
                    let name = Array.isArray(student) ? student[0] : student.name;
                    let reg = Array.isArray(student) ? student[1] : student.register_number;
                    if (nameElem) nameElem.textContent = name || '';
                    if (regElem) regElem.textContent = reg || '';
                }
                studentIdx++;
            }
        }

        // Remove any previously created extra classrooms
        document.querySelectorAll('.classroom.extra-seating').forEach(e => e.remove());

        // If more students, create extra classrooms dynamically
        for (let room = 1; room < classroomsNeeded; room++) {
            let classroomDiv = document.createElement('div');
            classroomDiv.className = 'classroom extra-seating mt-4 seating-page';
            classroomDiv.style.display = 'none';
            let benchesRow = document.createElement('div');
            benchesRow.className = 'row class_room';
            for (let bench = 1; bench <= benches && studentIdx < totalStudents; bench++) {
                let containerDiv = document.createElement('div');
                containerDiv.className = 'col-md-4 col-sm-6 bench_container';
                let benchDiv = document.createElement('div');
                benchDiv.className = 'bench bench' + bench;
                for (let dept = 0; dept < 3 && studentIdx < totalStudents; dept++) {
                    let seat = seatLabels[dept] + bench;
                    let student = studentsArray[studentIdx];
                    let name = Array.isArray(student) ? student[0] : student.name;
                    let reg = Array.isArray(student) ? student[1] : student.register_number;
                    let deptClass = 'dept' + (dept + 1);
                    let studentDiv = document.createElement('div');
                    studentDiv.className = 'student ' + deptClass;
                    studentDiv.innerHTML = `<h5>Seat No: ${seat}</h5><p>${name || ''}</p><p>${reg || ''}</p>`;
                    benchDiv.appendChild(studentDiv);
                    studentIdx++;
                }
                containerDiv.appendChild(benchDiv);
                benchesRow.appendChild(containerDiv);
            }
            classroomDiv.appendChild(benchesRow);
            document.querySelector('.main-content').appendChild(classroomDiv);
        }

        // Pagination logic (show only first classroom, hide others)
        let allClassrooms = document.querySelectorAll('.classroom');
        allClassrooms.forEach((el, idx) => {
            el.style.display = idx === 0 ? '' : 'none';
        });
        // Optionally, update pagination controls here
    

    }
