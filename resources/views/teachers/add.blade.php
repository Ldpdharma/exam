@extends('layouts.app')

@section('content')
    <main class="app-main">
        <div class="app-content-header">
            <h3>{{ $main_title }}</h3>
        </div>
        <div class="app-content">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('teachers.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <!-- First Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="teacher_id" class="form-label">Teacher ID</label>
                                    <input type="text" name="teacher_id" class="form-control"
                                        value="{{ old('teacher_id') }}" required>
                                    @error('teacher_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" name="department" class="form-control"
                                        value="{{ old('department') }}" required>
                                    @error('department')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Second Column -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" value="{{ old('dob') }}"
                                        required>
                                    @error('dob')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}"
                                        required>
                                    @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Third Row -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="qualification" class="form-label">Qualification</label>
                                    <input type="text" name="qualification" class="form-control"
                                        value="{{ old('qualification') }}" required>
                                    @error('qualification')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-primary mt-3 me-2" href="{{ route('teachers') }}"
                                style="color:white;">Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Add Teacher</button>
                        </div>
                    </form>
                    <hr class="mx-auto my-4"
                        style="width: 90%; height: 2px; border: none; background: #ccc; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);">
                    <form action="{{ route('teachers.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
                            <div style="max-width: 300px;">
                                <label for="import_file_teacher" class="form-label text-center">Import Teachers
                                    (Excel/CSV)</label>
                                <input type="file" name="import_file_teacher" class="form-control" id="import_file_teacher"
                                    accept=".csv, .xlsx" required>
                                @error('import_file_teacher')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4"style="max-width: 300px;">
                                <button type="submit" class="btn btn-success w-100 mt-2">Import Teacher</button>
                            </div>
                            <div class="mt-4" style="max-width: 300px;">
                                <a href="{{ asset('storage/upload/teacher_sample_data.csv') }}" class="btn btn-warning w-100 mt-2" style="color:white;">Download Sample File</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
