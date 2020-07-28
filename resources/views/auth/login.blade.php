@extends('layouts.app')

@section('content')
<div class="container box">
    <div class="row">
         <div class="col-lg-4 col-sm-12">
             <img src="{{ asset('images/home.png') }}" class="img-fluid" />
         </div>
         
         <div class="col-lg-8 col-sm-12">
             <h1 class="text-center mt-4">ورود به سیستم رزگری ساعتی</h1>
             <br /><br /><br />
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <form method="POST" action="{{ route('login') }}">
                             @csrf
 
                             <div class="d-flex align-items-end form-bg">
         
                             <div class="col-1 text-center">
                                 
                                 <i class="fas fa-envelope-open-text"></i>
                             </div>
                             <div class="col-11">
                                 <input type="email" class="form-control @error('email') is-invalid @enderror  my-input" placeholder="emial" 
                                 name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                             </div>
         
                             </div>
                             <br />
         
         
                             <div class="d-flex align-items-end form-bg">
         
                             <div class="col-1 text-center">
                 
                                 <i class="fas fa-unlock-alt"></i>
                             </div>
                             <div class="col-11">
                                 <input type="password" class="form-control @error('password') is-invalid @enderror my-input" placeholder="password" 
                                 name="password" required autocomplete="current-password"/>
                             </div>
         
         
                             </div>
                             <br />
                             <button type="submit" class="btn btn-outline-success form-btn text-center" style="width: 100%">
                                 ورود
                                 <i class="fas fa-paper-plane"></i>
                             </button>
         
         
                         </form>
                     </div>
                 </div>
 
             </div>
             <br /><br /><br />
 
         </div>
 
    </div>
 </div>
@endsection
