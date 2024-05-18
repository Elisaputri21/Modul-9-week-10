@extends('layouts.app')
@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Employee</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control @error('firstName') is-invalid @enderror" type="text"
                                name="firstName" id="firstName" value="{{ $employee->firstname }}"
                                placeholder="Enter First Name">
                            @error('firstName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control @error('lastName') is-invalid @enderror" type="text"
                                name="lastName" id="lastName" value="{{ $employee->lastname }}"
                                placeholder="Enter Last Name">
                            @error('lastName')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"
                                id="email" value="{{ $employee->email }}" placeholder="Enter Email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input class="form-control @error('age') is-invalid @enderror" type="text" name="age"
                                id="age" value="{{ $employee->age }}" placeholder="Enter Age">
                            @error('age')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select name="position" id="position" class="form-select">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}"
                                        {{ old('position') == $position->id ? 'selected' : '' }}>
                                        {{ $position->code . ' - ' . $position->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="age" class="form-label">Curriculum Vitae
                                (CV)</label>
                            @if ($employee->original_filename)
                                <h5>{{ $employee->original_filename }}</h5>
                                <a href="{{ route('employees.downloadFile', ['employeeId' => $employee->id]) }}"
                                    class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-download me-1"></i> Download CV
                                </a>
                            @else
                                <h5>Tidak ada</h5>
                            @endif
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="cv" class="form-label">Upload New CV</label>
                            <input type="file" class="form-control" name="cv" id="cv">
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
