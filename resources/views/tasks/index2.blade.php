<x-app-layout>
<x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List of Tasks') }}
            </h2>
            @can('create', App\Models\Task::class)
            <a 
            class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
            href="{{ route('tasks.create') }}">Add New Task</a>
            @endcan
        </div>
    </x-slot>
    @if(session('successMessage'))
                <div 
                    style="padding:.5rem;margin:.7rem 0;color:#166534;background-color:#dcfce7;border-radius:.5rem;"
                    class="text-center">
                    {{session('successMessage')}}
                </div>
            @endif
    <div class="lg:w-[70vw] w-[100%] p-6 bg-white my-2 flex justify-center mx-auto overflow-x-auto">
        <!-- If tasks exist show table else show no tasks -->
        @if(count($tasks) > 0)
        <table class="w-[100%] table-auto">
            <thead>
                <tr class="border-b border-slate-200 text-slate-700 even:bg-slate-100 odd:bg-white">
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Department</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">User</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0 @endphp
                @foreach($tasks as $task)
                <tr 
                @class([
                    'odd:bg-slate-100',
                    'even:bg-white',
                    'hover:bg-slate-200',
                    'cursor-pointer',
                    'row',
                    'space-x-3',
                    'border-l-4 border-slate-400' => $task->status == 'pending',
                    'border-l-4 border-amber-500' => $task->status == 'ongoing',
                    'border-l-4 border-green-500' => $task->status == 'completed',
                    'border-l-4 border-rose-500' => $task->status == 'canceled',
                ])>
                    <td class="p-3 text-sm text-left">{{ $i += 1 }}</td> 
                    <td class="p-3 text-sm text-left">{{ $task->description }}</td>
                    <td class="p-3 text-sm text-left">{{ $task->department }}</td>
                    <td class="p-3 text-sm text-left">{{ $task->user->name}}</td>
                    <td class="p-3 text-sm text-left">{{ $task->status }}</td>
                    <td class="p-3 text-sm text-left">{{ $task->created_at }}</td>
                    <td class="p-3 text-sm text-left">
                    @can('acceptTask', App\Models\Task::class)
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                            @if($task->status === "pending")
                                <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    <a href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'ongoing']) }}">Accept</a>
                                </div>
                                <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    <a href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'declined']) }}">Decline</a>
                                </div>
                            @endif

                        @if($task->status === "ongoing")
                            <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                <a href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'completed']) }}">Mark as complete</a>
                            </div>
                            <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                <a href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'canceled']) }}">Abort</a>
                            </div>
                        @endif

                        @if($task->status === "declined")
                            <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                <a href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'ongoing']) }}">Accept</a>
                            </div>
                        @endif

                        @if($task->status === "completed")
                            <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-slate-500 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                <a href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'completed', 'show'=> 0]) }}">Remove</a>
                            </div>
                        @endif
                        @if($task->status === "canceled")
                            <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-slate-500 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                <a href="{{ route('task.updateTaskStatus', ['task_id' => $task->id, 'status' => 'canceled', 'show'=> 0]) }}">Remove</a>
                            </div>
                        @endif
                    </x-slot>
                    </x-dropdown>
                    @endcan

                    <!-- FOR MANAGER -->
                    @can('delete', App\Models\Task::class)
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            @can('view', App\Models\Task::class)
                            <x-slot name="content">
                            <!-- @if($task->status === "pending") -->
                                <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    <a href="{{ route('tasks.show', ['task' => $task]) }}">View</a>
                                </div>
                                <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
                                </div>
                                <div class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    <!-- <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}">Delete</a> -->
                                    @can('delete', App\Models\Task::class)
                                        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <!-- {{ method_field('delete') }} -->
                                        <button type="submit">Delete</button> 
                                    </form>
                                    @endcan
                                </div>
                            <!-- @endif -->
                    </x-slot>
                    @endcan
                    </x-dropdown>
                    @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <div>
                <p>No tasks available</p>
            </div>
        @endif
    </div>
</x-app-layout>