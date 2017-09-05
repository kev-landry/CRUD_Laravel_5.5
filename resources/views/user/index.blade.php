@extends('layouts.default')

@section('content')
  <div class="row">
    <section class="content">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"></h3>
          </div>
          <div class="panel-body">
            <div class="pull-left">
              <h3>Utilisateurs</h3>
          </div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('user.create')}}" class="btn btn-info">Ajouter</a>
            </div>
          </div>
          <div class="table-container">
            <table id="table1" class="table table-bordered table-striped">
              <thead>
               <th><input type="checkbox" id="checkall"/></th>
               <th>Utilsateur</th>
               <th>Email</th>
               <th>Mot de passe</th>
               <th>Statut</th>
               <th colspan="3" style="text-align: center">Action</th>
              </thead>
              <tbody>
                  @if($users->count())
                  @foreach($users as $user)
                    <tr>
                        <td><input type="checkbox" class=""/></td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->user_email }}</td>
                        <td>{{ $user->user_password }}</td>
                        <td>{{ $user->user_statut }}</td>
                        <td><a class="btn btn-primary btn-xs" href="{{action('UserController@show', $user->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
                        <td><a class="btn btn-primary btn-xs" href="{{action('UserController@edit', $user->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td>
                            <form class="" action="{{ action('UserController@destroy', $user->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="delete">
                                <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="7">Aucun résultats trouvés !</td>
                    </tr>
                @endif
              </tbody>
            </table>

          </div>
        </div>
        </div>
      </div>
    </section>
@endsection
