@extends('layouts.app')

@section('content')
    <h2>{{ isset($course) ? 'Edit Course' : 'Create Course' }}</h2>

    <form method="POST" action="{{ isset($course) ? route('dashboard.courses.update', $course) : route('dashboard.courses.store') }}">
        @csrf
        @if(isset($course))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="title" class="form-label">Course Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $course->title ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="instructor_id" class="form-label">Instructor</label>
            <select name="instructor_id" class="form-select">
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->id }}" {{ isset($course) && $course->instructor_id == $instructor->id ? 'selected' : '' }}>
                        {{ $instructor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
