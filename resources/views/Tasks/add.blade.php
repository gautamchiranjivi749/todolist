@extends("layout.default")

@section("content")

<div class="d-flex align-items-center">
    {{-- <h2>Add New Task</h2> --}}
            <div class="container card shadow-sm " style="margin-top:100px; max-width: 500px">
                <div class="fs-3 fw-bold text-center mt-1">Add New Task</div>
                <form action="{{route('tasks.add.post')}}" method="POST" class="p-3 ">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" >
                         @error("title")
        <span class="text-danger">{{ $message }}</span>
        @enderror
                    </div>
                        <div class="mb-3">
                            <input type="datetime-local" name="deadline">
                             @error("deadline")
        <span class="text-danger">{{ $message }}</span>
        @enderror
                        </div>
                        <div class="mt-3">
                        <textarea class="form-control" name="description" rows="3"></textarea>
                         @error("description")
        <span class="text-danger">{{ $message }}</span>
        @enderror
                        {{-- <div class="mb-3">
                        <input type="checkbox" name="active" class="form-check-input " id="checkImportant">Active
                        <input type="checkbox" name="inactive" class="form-check-input " id="checkImportant">Inactive
                        </div> --}}
                        
                    </div>
                      @if(session()->has("success"))
                    <div class="alert alert-success">
                        {{ session()->get("success") }}
                    </div>
                    @endif
                    @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                    @endif
                    <button type="submit" class="btn btn-primary rounded-pill mt-3">Submit</button>
                </form>
            </div>
</div>
@endsection()