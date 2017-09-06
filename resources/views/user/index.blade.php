@extends('layouts.default')

@section('content')
  <div class="row">
    <section class="content">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">CRUD</h3>
          </div>
          <form method="GET" action="{{ route('user.index') }}"  role="search">
              <div class="input-group custom-search-form">
                  <input type="text" class="form-control" name="keyword" keyword="search" placeholder="Rechercher">
                  <span class="input-group-btn">
                      <button class="btn btn-default-sm" type="submit">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
          </form>
          <div class="panel-body">
              @if(Session::has('success'))
                  <div class="alert alert-info">
                    {{Session::get('success')}}
                  </div>
              @endif
              <div class="row">
                  <div class="col-md-12">
            <div class="pull-left">
              <h3>Utilisateurs</h3>
            </div>
            <div class="pull-right">
                    <a style="margin-top:10px;" href="{{ route('user.create')}}" class="btn btn-info">Ajouter</a>
            </div>
        </div>
        </div>
            <div class="table-container">
                <table id="table1" class="table table-bordered table-striped">
                  <thead>
                   <th><input type="checkbox" id="checkall"/></th>
                   <th>Utilsateur</th>
                   <th>Email</th>
                   <th>Département</th>
                   <th colspan="2" style="text-align: center">Action</th>
                  </thead>
                  <tbody>
                      @if($users->count())
                        @if($keyword)
                            @foreach($users_found as $user_found)
                              <tr>
                                  <td><input type="checkbox" class=""/></td>
                                  <td>{{ $user_found->user_name }}</td>
                                  <td>{{ $user_found->user_email }}</td>
                                  @if($user_found->departement)
                                      <td>{{ $user_found->departement->departement_name }}</td>
                                  @else
                                      <td>Aucun</td>
                                  @endif
                                  <td><a class="btn btn-primary btn-xs" href="{{action('UserController@edit', $user_found->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                  <td>
                                      <form class="" action="{{ action('UserController@destroy', $user_found->id)}}" method="post">
                                          {{csrf_field()}}
                                          <input name="_method" type="hidden" value="delete">
                                          <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                      </form>
                                  </td>
                              </tr>
                          @endforeach
                        @else
                            @foreach($users as $user)
                                <tr>
                                    <td><input type="checkbox" class=""/></td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->user_email }}</td>
                                    @if($user->departement)
                                        <td>{{ $user->departement->departement_name }}</td>
                                    @else
                                        <td>Aucun</td>
                                    @endif
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
                        @endif
                    @else
                        <tr>
                            <td colspan="7">Aucun résultats trouvés !</td>
                        </tr>
                    @endif
                  </tbody>
                </table>
                {{ $users->render() }}

              </div>
            </div>
        </div>
      </div>
    </section>
@endsection
