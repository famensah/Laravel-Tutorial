@extends('layouts.default')
@section('page-title', 'Your Tasks')
@section('content')

    <!-- @if(session('successMessage'))
        <div 
            style="padding:.5rem;margin:.7rem 0;color:#166534;background-color:#dcfce7;border-radius:.5rem;"
            class="text-center">
            {{session('successMessage')}}
        </div>
    @endif -->
    <div class="lg:w-[70vw] w-[100%] p-6 bg-white my-2 flex justify-center mx-auto overflow-x-auto">

        <!-- If tasks exist show table else show no tasks -->
        @if(count($tasks) > 0)
        <div class="table-responsive px-4">
            <table class="table no-wrap">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-700 even:bg-slate-100 odd:bg-white">
                        <th class="p-3">#</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Department</th>
                        <th class="p-3">User</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody> 
                @php 
                    $i = 0 
                @endphp
                @foreach($tasks as $task)
                <tr 
                @class([
                    'table-light' => $task->status == 'pending',
                    'table-warning' => $task->status == 'ongoing',
                    'table-success' => $task->status == 'completed',
                    'table-danger' => $task->status == 'canceled',
                ])>
                    <td class="p-3 text-sm text-left">{{ $i += 1 }}</td> 
                    <td class="p-3 text-sm text-left">{{ $task->description }}</td>
                    <td class="p-3 text-sm text-left">{{ $task->department }}</td>
                    <td class="p-3 text-sm text-left">{{ $task->user->name}}</td>
                    <td class="p-3 text-sm text-left">{{ $task->status }}</td>
                    <td class="p-3 text-sm text-left">{{ $task->created_at }}</td>
                    <td class="p-3 text-sm text-left">
                    @can('acceptTask', App\Models\Task::class)
                    <div class="dropdown rounded-2">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Edit
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @if($task->status === "pending")
                            <li><a class="dropdown-item" href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'ongoing', 'show'=> 1]) }}">Accept</a></li>
                            <li><a class="dropdown-item" href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'declined', 'show'=> 1]) }}">Decline</a></li>
                        @endif
                        @if($task->status === "ongoing")
                            <li><a class="dropdown-item" href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'completed', 'show'=> 1]) }}">Mark as complete</a></li>
                            <li><a class="dropdown-item" href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'canceled', 'show'=> 1]) }}">Abort</a></li>
                        @endif
                        @if($task->status === "declined")
                            <li><a class="dropdown-item" href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'ongoing', 'show'=> 1]) }}">Accept</a></li>
                        @endif
                        @if($task->status === "completed")
                            <li><a class="dropdown-item" href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'completed', 'show'=> 0]) }}">Remove</a>
                            </li>
                        @endif
                        @if($task->status === "canceled")
                            <li><a class="dropdown-item" href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'canceled', 'show'=> 0]) }}">Remove</a>
                            </li>
                        @endif
                        </ul>
                    </div>
                    @endcan

                    <!-- FOR MANAGER -->
                    @can('delete', App\Models\Task::class)
                    <div class="dropdown rounded-2">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Edit
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @can('view', App\Models\Task::class)
                            <li><a class="dropdown-item" href="{{ route('tasks.show', ['task' => $task]) }}">View</a></li>
                            <li><a class="dropdown-item" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a></li>
                            <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                            @csrf
                            @method('DELETE')
                            <!-- {{ method_field('delete') }} -->
                            <button type="submit">Delete</button> 
                        </form>
                        @endcan
                        </ul>
                    </div>
                    @endcan
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        @else
            <div class="container d-flex align-items-center justify-content-center vh-100">
                <p>No tasks available</p>
            </div>
        @endif
    </div>
@stop


