@extends('layouts.app')

@section('content')

<div class="topbar">

    <div>

        <div class="page-title">
            Tasks
        </div>

        <div class="page-subtitle">
            View and manage all your tasks.
        </div>

    </div>

    <a href="{{ route('tasks.create') }}" class="add-button">
        + Add Task
    </a>

</div>

<style>

    .success {
        background: #DCFCE7;
        color: #166534;
        padding: 13px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .task-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        padding: 22px;
        margin-bottom: 14px;
    }

    .task-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .task-name {
        font-size: 17px;
        font-weight: bold;
    }

    .description {
        color: #6B7280;
        font-size: 13px;
        margin-top: 6px;
    }

    .due-date {
        color: #9CA3AF;
        font-size: 12px;
        margin-top: 8px;
    }

    .badge {
        display: inline-block;
        padding: 7px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: bold;
        margin-top: 10px;
    }

    .pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .completed {
        background: #DCFCE7;
        color: #166534;
    }

    .actions {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .btn {
        border: none;
        padding: 9px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-status {
        background: #DCFCE7;
        color: #166534;
    }

    .btn-edit {
        background: #F3F4F6;
        color: #374151;
    }

    .btn-delete {
        background: #FEE2E2;
        color: #991B1B;
    }

    .empty {
        background: white;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        padding: 40px;
        text-align: center;
        color: #6B7280;
    }

    @media (max-width: 700px) {

        .task-content {
            align-items: flex-start;
            flex-direction: column;
        }

        .actions {
            justify-content: flex-start;
        }

    }

</style>

@if(session('success'))

    <div class="success">
        {{ session('success') }}
    </div>

@endif

@forelse($tasks as $task)

    <div class="task-card">

        <div class="task-content">

            <div>

                <div class="task-name">
                    {{ $task->task_name }}
                </div>

                <div class="description">
                    {{ $task->description ?: 'No description' }}
                </div>

                <div class="due-date">

                    @if($task->due_date)

                        Due: {{ $task->due_date->format('M d, Y') }}

                    @else

                        No due date

                    @endif

                </div>

                @if($task->status === 'Completed')

                    <span class="badge completed">
                        Completed
                    </span>

                @else

                    <span class="badge pending">
                        Pending
                    </span>

                @endif

            </div>

            <div class="actions">

                <form
                    method="POST"
                    action="{{ route('tasks.status', $task) }}"
                >

                    @csrf
                    @method('PATCH')

                    <button class="btn btn-status">
                        {{ $task->status === 'Pending' ? 'Complete' : 'Pending' }}
                    </button>

                </form>

                <a
                    href="{{ route('tasks.edit', $task) }}"
                    class="btn btn-edit"
                >
                    Edit
                </a>

                <form
                    method="POST"
                    action="{{ route('tasks.destroy', $task) }}"
                    onsubmit="return confirm('Delete this task?');"
                >

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-delete">
                        Delete
                    </button>

                </form>

            </div>

        </div>

    </div>

@empty

    <div class="empty">
        No tasks found.
    </div>

@endforelse

@endsection