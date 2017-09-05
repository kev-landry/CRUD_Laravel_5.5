@extends('layouts.default')

@section('content')

	<div class="row">

		<section class="content">

			<div class="col-md-8 col-md-offset-2">
				  @if (count($errors) > 0)

			        <div class="alert alert-danger">

			            <strong>Oups!</strong> il y a un problème !<br><br>

			            <ul>

			                @foreach ($errors->all() as $error)

			                    <li>{{ $error }}</li>

			                @endforeach

			            </ul>

			        </div>

			    @endif
			    @if(Session::has('success'))
				    <div class="alert alert-info">
				      {{Session::get('success')}}
				    </div>
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">
				    		<h3 class="panel-title">Editer les informations de : {{$user->user_name}}</h3>
				 	</div>

					<div class="panel-body">


						<div class="table-container">
    						<form method="POST" action="{{ route('user.update', $user->id) }}"  role="form">
    						{{ csrf_field() }}
    						<input name="_method" type="hidden" value="PATCH">
			    			<div class="row">
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			                <input type="text" name="user_name" value="{{$user->user_name}}" id="user_name" class="form-control input-sm" placeholder="Nom">
			    					</div>
			    				</div>
			    				<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						<input type="email" name="user_email" value="{{$user->user_email}}" id="user_email" class="form-control input-sm" placeholder="Email">
			    					</div>
			    				</div>
								<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						<input type="text" name="user_password" value="{{$user->user_password}}" id="user_password" class="form-control input-sm" placeholder="Mot de passe">
			    					</div>
			    				</div>
								<div class="col-xs-3 col-sm-3 col-md-3">
			    					<div class="form-group">
			    						<input type="text" name="user_statut" value="{{$user->user_statut}}" id="user_statut" class="form-control input-sm" placeholder="Statut">
			    					</div>
			    				</div>
			    			</div>

			    		 <div class="row">

							<div class="col-xs-12 col-sm-12 col-md-12">
								<input type="submit"  value="Update" class="btn btn-success btn-block">
								<a href="{{ route('user.index') }}" class="btn btn-info btn-block" >Retour</a>
							</div>

					     </div>
			    		</form>
						</div>
					</div>

				</div>
			</div>
		</section>

@endsection
