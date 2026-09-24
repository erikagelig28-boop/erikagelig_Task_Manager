@extends('layouts.app')

@section('content')

<div class="topbar">

    <div>

        <div class="page-title">
            My Tasks
        </div>

        <div class="page-subtitle">
            Stay organized and manage your tasks.
        </div>

    </div>

    <a href="{{ route('tasks.create') }}" class="add-button">
        + Add Task
    </a>

</div>

<style>

    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 35px;
    }

    .stat-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        padding: 24px;
        transition: 0.2s;
    }

    .stat-card:hover {
        border-color: #16A34A;
        transform: translateY(-2px);
    }

    .stat-label {
        color: #6B7280;
        font-size: 13px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-number {
        font-size: 34px;
        font-weight: bold;
        color: #166534;
        margin-top: 10px;
    }

    .section-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 18px;
    }

    .task-card {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        padding: 20px;
        margin-bottom: 14px;
        transition: 0.2s;
    }

    .task-card:hover {
        border-color: #BBF7D0;
        box-shadow: 0 4px 15px rgba(22, 163, 74, 0.06);
    }

    .task-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .task-name {
        font-size: 16px;
        font-weight: bold;
        color: #1F2937;
    }

    .task-description {
        color: #6B7280;
        font-size: 13px;
        margin-top: 6px;
    }

    .task-date {
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
    }

    .pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .completed {
        background: #DCFCE7;
        color: #166534;
    }

    .empty {
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-radius: 14px;
        padding: 35px;
        text-align: center;
        color: #6B7280;
    }

    @media (max-width: 700px) {

        .stats {
            grid-template-columns: 1fr;
        }

        .task-content {
            align-items: flex-start;
            flex-direction: column;
        }

    }

</style>

<div class="stats">

    <div class="stat-card">

        <div class="stat-label">
            Total Tasks
        </div>

        <div class="stat-number">
            {{ $totalTasks }}
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-label">
            Pending
        </div>

        <div class="stat-number">
            {{ $pendingTasks }}
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-label">
            Completed
        </div>

        <div class="stat-number">
            {{ $completedTasks }}
        </div>

    </div>

</div>

<div class="section-title">
    Recent Tasks
</div>

@forelse($recentTasks as $task)

    <div class="task-card">

        <div class="task-content">

            <div>

                <div class="task-name">
                    {{ $task->task_name }}
                </div>

                <div class="task-description">
                    {{ $task->description ?: 'No description' }}
                </div>

                <div class="task-date">

                    @if($task->due_date)

                        Due {{ $task->due_date->format('M d, Y') }}

                    @else

                        No due date

                    @endif

                </div>

            </div>

            <div>

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

        </div>

    </div>

@empty

    <div class="empty">

        <p>No tasks yet.</p>

        <br>

        <a href="{{ route('tasks.create') }}" class="add-button">
            Create Your First Task
        </a>

    </div>

@endforelse

@endsection