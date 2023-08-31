<x-app-layout>
    <x-slot name="header">
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create New Task') }}
                </h2>
            </div>
    </x-slot>

    <div class="shadow-md rounded-lg w-[100%] lg:w-[70vw] sm:w-[60%] p-[3rem] bg-white mt-[3rem] flex flex-col items-center mx-auto">
        @if(session('successMessage'))
        <div 
            style="padding:1rem;margin:.7rem 0;color:#166534;background-color:#dcfce7;border-radius:.5rem;"
            class="text-center w-[70%]">
            {{session('successMessage')}}
        </div>
        @endif
    <form method="POST" action="{{ route('tasks.store') }}" class="w-[70%] max-w-[500px]">
        @csrf

        <!-- Description -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="block mt-1 w-full rounded-md border-1 border-slate-300 my-1" type="text" name="description" autofocus ></textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>
        
        <!-- Department -->
        <div class="mt-4">
            <x-input-label for="department" :value="__('Department')" />
            <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" />
            <x-input-error :messages="$errors->get('department')" class="mt-2" />
        </div>

        <!-- Users -->
        <div class="flex flex-col mt-4">
            <x-input-label for="user_id" :value="__('Assign to')" />
            <select 
            class="p-2 rounded-md text-slate-600 border-1 border-slate-300 my-1"
            name="user_id" id="user_id" required>
                @if($users)
                    @foreach($users as $user)
                        <option value="{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
                @endif
            </select>
            @error('user_id')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status -->
        <div class="flex flex-col mt-4">
            <x-input-label for="status" :value="__('Status')" />
            <select
             class="p-2 text-slate-600 rounded-md border-1 border-slate-300 my-1"
             name="status" id="status">
                <option value="pending">Pending</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
                <option value="canceled">Canceled</option>
            </select>
            @error('status')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('dashboard') }}">
                {{ __('Back') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>

    </div>
</x-app-layout>