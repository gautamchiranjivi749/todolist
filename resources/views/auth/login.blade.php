@extends("layout.auth")
@section("style")
<style>
    html,
body {
  height: 100%;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  /* margin-bottom: 10px; */
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>
@endsection

@section("content")
@endsection

<main class="form-signin w-100 m-auto">

<form method="POST" action="{{route('login.post')}}"> 
    @csrf
    {{-- <img class="mb-4" src="{{asset("assets\img\OIP.webp")}}" alt="" width="72" height="57">  --}}

   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
   <div class="mt-3 text-center">
     <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
   </div>
   
     <div class="form-floating"> 
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"> <label for="floatingInput">Email address</label> 
        @error("email")
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div> 
    <div class="form-floating" style="margin-bottom: 10px";>
         <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"> 
         <label for="floatingPassword">Password</label>  
        @error("password")
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div> 
         <div class="form-check text-start my-3"> 
            <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
             <label class="form-check-label" for="checkDefault">Remember me</label> 
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
            <div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button> 
            </div>
            <div class="mt-3 text-center">
                <span>Don't have an account? </span>
                <a href="{{route("register.post")}}">Register</a>
            </div>
           
            <p class="mt-5 mb-3 text-body-secondary">&copy; Gautam Pvt.Ltd.</p> 
        </form> 
</main>

