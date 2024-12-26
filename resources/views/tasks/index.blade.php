@extends('layouts.app')

@section('title', 'Tasks List')
@section('header-title', 'Task Management')

@section('content')
    <div class="pull-right">
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">Create New Task</a>
        <br>
    </div>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3"  id="tasks-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tasks-table').DataTable(); 
        });
    </script>
@endpush
