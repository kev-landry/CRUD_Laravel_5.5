@extends('layouts.default')

@section('content')

<div class="row">

    <section class="content">

        <div class="col-md-8 col-md-offset-2">
              @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Oups !</strong> Création impossible !<br><br>

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
                        <h3 class="panel-title">Ajouter un utilisateur</h3>
                </div>

                <div class="panel-body">


                    <div class="table-container">
                        <form method="POST" action="{{ route('user.store') }}"  role="form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <input type="text" name="user_name" id="user_name" class="form-control input-sm" placeholder="Nom">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <input type="email" name="user_email" id="user_email" class="form-control input-sm" placeholder="email">
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group" style="">
                                    <select name = "departement" class="selectpicker" style="">
                                        <option selected >Département</option>
                                        @foreach($departements_names as $departement_name)
                                        <option value="{{ $departement_name }}">{{ $departement_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="user_statut" id="user_statut" class="form-control input-sm" placeholder="Statut">
                                </div>
                            </div> -->
                        </div>

                     <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <input type="submit"  value="save" class="btn btn-success btn-block">
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
