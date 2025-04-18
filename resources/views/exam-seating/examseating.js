const parentForm = document.getElementById('parent-form');
parentForm.addEventListener('submit', function (event) {
    alert("hello");
    event.preventDefault();
    const rows = Array.from(selectedValuesTableBody.querySelectorAll('tr'));
    let allStudents = [];

    Promise.all(rows.map(row => {
        const department = row.cells[0].textContent;
        const year = row.cells[1].textContent;
        const regnoStart = row.cells[2].textContent;
        const regnoEnd = row.cells[3].textContent;

        return fetch(`{{ url('/exam-seating/get-students') }}?department=${department}&year=${year}&regno_start=${regnoStart}&regno_end=${regnoEnd}`)
            .then(response => response.json())
            .then(data => {
                allStudents = allStudents.concat(data);
            });
    })).then(() => {
        populateStudentTable(allStudents);
        populateSeatingLayout(allStudents);
    }).catch(error => {
        console.error('Error fetching records:', error);
    });
});


function populateStudentTable(students) {
    const studentTable = $('#student-table').DataTable();
    studentTable.clear();
    students.forEach((student, index) => {
        studentTable.row.add([
            index + 1,
            student.name,
            student.student_id,
            student.department,
            student.year,
            student.batch,
            student.email,
            student.register_number,
            `<button class="btn btn-danger btn-sm remove-row">Remove</button>`
        ]);
    });
    studentTable.draw();
}


function populateSeatingLayout(students) {
    const benches = document.querySelectorAll('.bench');
    benches.forEach(bench => bench.innerHTML = ''); // Clear existing

    let studentIndex = 0;

    benches.forEach((bench, index) => {
        for (let i = 0; i < 3; i++) {
            if (studentIndex >= students.length) break;
            const student = students[studentIndex];
            const studentDiv = document.createElement('div');
            studentDiv.classList.add('student');
            studentDiv.innerHTML = `
                <h5>${student.name}</h5>
                <p>Roll No: ${student.register_number}</p>
            `;
            bench.appendChild(studentDiv);
            studentIndex++;
        }
    });
}
