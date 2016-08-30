@extends('master.master')
@section('content')
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog adjustmargin">
  <div class="modal-content">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
  {{
    Form::open(array('url'=>'signme', 'class' => 'form col-md-12 center-block')) 
  }}

      <div class="modal-header">
          
           {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
           --}}
          
          {{-- {{
             Form::button('x', array('class'=>'text-center close', 'data-dismiss'=>'modal', 'aria-hidden' => 'true')) 
          }} --}}


          @if(count($errors) > 0)
          <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Whoomp!!</strong> There were an errors <br> <br>

            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <p class="text-center" style="color:red">
          @if(Session::has("error"))
              {{ Session::get("error") }}
          @endif
          </p>

          @if( Auth::check() )
          User is login
          @endif

          <h1 class="text-center">Login </h1>
      </div>

     
      <div class="modal-body">
          
            <div class="form-group">
             {{--  <input type="text" class="form-control input-lg" placeholder="Email"> --}}

             {!!
              Form::text('email', '', array('class'=>'form-control input-lg', 'placeholder' => 'Enter your Email'))
             !!}

            </div>
            <div class="form-group">
             
              {{-- <input type="password" class="form-control input-lg" placeholder="Password"> --}}

              {{ Form::password('password', array('placeholder'=>'Enter your Password', 'class'=>'form-control input-lg', 'id'=>'password' ) )
                   }}

            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"> {{ link_to('registerationform','Registeration') }} </span><span><a href="#">Need help?</a></span>
            </div>
          
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
          </div>    
      </div>
  </div>
  </div>
</div>
  @stop()

