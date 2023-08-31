<form Method="POST" action="{{ route('tasks.store') }}" class="row g-3">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hiddenn="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Create New Task</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" 
                        name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" 
                        name="department" id="floatingInput" placeholder="Enter your department">
                        <label for="floatingInput">Department</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="user_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        @if($users)
                            @foreach($users as $user)
                                <option value="{{$user->id}}">
                                    {{$user->name}}
                                </option>
                            @endforeach
                        @endif 
                        </select>
                        <label for="floatingSelect">Assign to</label>
                    </div>
                    <div class="form-floating mb-3">
                    @error('user_id')
                        <div style="color:red;">{{ $message }}</div>
                        @enderror
                            <select name="status" class="form-select" id="floatingSelect2" aria-label="Floating label select example">
                                <option selected value="pending">Pending</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="completed">Completed</option>
                                <option value="canceled">Canceled</option>
                            </select>
                            <label for="floatingSelect2">Status</label>
                        </div>
                    </div>
                <div class="modal-footer">
                    <form action="{{route('dashboard')}}">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Back</button>
                    </form>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
 </form>