@extends("layout.default")
@section("content")
<!-- Begin page content --> 
<main class="flex-shrink-0 mt-5">
    <div class="container" style="max-width: 600px">
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
                    
            <div class="my-3 p-3 bg-body rounded shadow-sm mt-5">
                 <h6 class="border-bottom pb-2 mb-0">List of Tasks</h6>

                 @foreach ($tasks as $task)
                          
                          <div class="d-flex text-muted pt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l14 0" />
                                    <path d="M13 18l6 -6" />
                                    <path d="M13 6l6 6" />
                            </svg>
                                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                                        <div class="d-flex justify-content-between">
                                         <strong class="text-gray-dark">{{$task->title}} | {{$task->deadline}}</strong>
                                     <a href="{{route('tasks.status.update',$task->id)}}"
                                                 class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M5 12l5 5l10 -10" /></svg>
                                        </a>
                                        <a href="{{route('tasks.delete',$task->id)}}"
                                          class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 7h16" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                        </a>
                                        </div>
                                            <span class="d-block">{{$task->description}}</span>
                                    </div>
                                </div>
                                
                       @endforeach     
                     </div>
                    <div>
                         {{ $tasks->links() }}
                    </div>
                   
                    
                </div>
    </div>
</main>
@endsection