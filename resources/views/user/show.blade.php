@extends('layouts.default')



@section('content')

<div class="row">

		<section class="content">

			<div class="col-md-8 col-md-offset-2">


				<div class="panel panel-default">
					<div class="panel-heading">
				    		<h3 class="panel-title">{{user->user_name}}</h3>
				 	</div>

					<div class="panel-body">


						<div class="table-container">
    						<div class="video" style="text-align:center">
    						                      <iframe style="width:100%" height="315" src="{{$video->video_url}}" frameborder="0" allowfullscreen></iframe>
    						</div>
    						<div class="video">
    						{{$video->description}}
    						</div>


    			    		 <div class="row">

    							<div class="col-xs-12 col-sm-12 col-md-12">

    								<a href="{{ route('user.index') }}" class="btn btn-info btn-block" >Retour</a>
    							</div>

    					     </div>

						</div>
					</div>

				</div>
			</div>
		</section>



@endsection
