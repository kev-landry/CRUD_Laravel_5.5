<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Departement;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('id', 'DESC')->simplePaginate(5);

      $keyword = Input::get('keyword', '');

      $users_found = User::SearchKeyword($keyword)->get();

      return view('user.index', compact('users', 'keyword', 'users_found'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements_names = Departement::pluck('departement_name');
        $departements = departement::get();

        return view('user.create', compact('departements', 'departements_names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departement_name = $request->departement;
        $departement_id = Departement::where('departement_name', $departement_name)->value('id');
        $this->validate($request, [

              'user_name' => 'required',
              'user_email' => 'required',
              'departement' => 'required',
              //'user_statut' => 'required',
        ]);
        //dd($request->departement);
        //User::create($request->all());
        User::insert([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'departement_id' => $departement_id,
        ]);

        return redirect()->route('user.index')->with('success', 'L\'utilisateur a bien été ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'user_name' => 'required',
            'user_email' => 'required',
            'user_password' => 'required',
            'user_statut' => 'required',

        ]);

        User::find($id)->update($request->all());

        return redirect()->route('user.index')->with('success', 'L\'utilisateur a bien été édité !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('user.index')->with('success', 'L\'utilisateur a bien été effacé !');
    }
}
