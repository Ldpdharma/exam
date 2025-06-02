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
        alert(JSON.stringify(selectedCriteria));
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

    showBtn.addEventListener('click', () => {
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
            let studentsArray = [];
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
            alert(JSON.stringify(studentsArray));
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

    // Add event listeners
    filterButton.addEventListener('click', filterStudents);
    departmentDropdown.addEventListener('change', filterStudents);
    yearDropdown.addEventListener('change', filterStudents);
    regnoStartInput.addEventListener('change', filterStudents);
    regnoEndInput.addEventListener('change', filterStudents);

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
});
