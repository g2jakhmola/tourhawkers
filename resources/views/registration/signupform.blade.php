@extends('master.master')
@section('content')
	
	{{ Form::open(array('url' => 'registration', 'class'=>'form-horizontal')) }}

		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Company Name</h1>
	               		<hr />
	               	</div>
	            </div> 

	            @if(count($errors) > 0)
	            	<div class="alert alert-danger">
	            		<strong>Whoomp!</strong> There were errors on registration <br><br>

	            		<ul>
	            			@foreach($errors->all() as $error)
	            				<li>{{ $error }}</li>
	            			@endforeach
	            		</ul>
	            	</div>
	           @endif

				<div class="main-login main-center">
				
					<span class="form-horizontal">
						
						<div class="form-group">
							{{-- <label for="name" class="cols-sm-2 control-label">Your Name</label> --}}

							
							{!! Form::label('name', 'Your Name', array('class'=>'cols-sm-2 control-label')) !!}

							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									{{-- <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/> --}}

									{!! Form::text('name', '', array('id'=>'name', 'class'=>'form-control', 'placeholder'=>'Enter Your Name')) !!}

								</div>
							</div>
						</div>

						<div class="form-group">
							{{-- <label for="email" class="cols-sm-2 control-label">Your Email</label> --}}

							{{ Form::label('email', 'Your Email', array('class'=>'cols-sm-2 control-label')) }}

							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									{{-- <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/> --}}

									{!! Form::text('email', '', array('id'=>'email', 'class' =>'form-control', 'placeholder' => 'Enter your Email')) !!}	
								</div>
							</div>
						</div>

						<div class="form-group">
							{{-- <label for="username" class="cols-sm-2 control-label">Username</label> --}}

							{{ Form::label('username', 'Username', array('class'=>'cols-sm-2 control-label')) }}

							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									
									{{-- <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/> --}}

									{!! Form::text('username', '', array('id'=>'username', 'class' =>'form-control', 'placeholder' => 'Enter your Username')) !!}

								</div>
							</div>
						</div>

						<div class="form-group">
							
							{{-- <label for="password" class="cols-sm-2 control-label">Password</label> --}}

							{{ Form::label('password', 'Password', array('class'=>'cols-sm-2 control-label')) }}

							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									
									{{-- <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/> --}}

									{{ Form::password('password', array('placeholder'=>'Enter your Password', 'class'=>'form-control', 'id'=>'password' ) )
									 }}

								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									{{-- <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/> --}}

									{!! Form::password('confirm', array('id'=>'confirm', 'class' =>'form-control', 'placeholder' => 'Confirm your Password')) 
									!!}
								</div>
							</div>
						</div>

						<div class="form-group ">
							{{-- <button type="button" class="btn btn-primary btn-lg btn-block login-button">Register</button> --}}

							{{ Form::submit('Register', array('class'=>'btn btn-primary btn-lg btn-block login-button')) }}
						</div>
						<div class="login-register">
				            {{ link_to('/','Login') }}
				         </div>
				        
					</span>
				</div>
			</div>
		</div>
 {!! Form::close() !!}

@stop()