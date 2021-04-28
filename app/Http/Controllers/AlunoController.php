<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::paginate(2);
        return view('list-aluno ', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-aluno');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|min:3|unique:aluno',
            'last_name'=> 'required|min:5',
            'address'=> 'max:50',
            'email'=>'required|email',
            'curso'=> 'required',
        ]);


        $aluno = new Aluno();

        $aluno->name = $request->input('name');
        $aluno->last_name = $request->input('last_name');
        $aluno->birth = $request->input('birthday');
        $aluno->gender = $request->input('gender');
        $aluno->address = $request->input('address');
        $aluno->city = $request->input('city');
        $aluno->state = $request->input('state');
        $aluno->cep = $request->input('cep');
        $aluno->email = $request->input('email');
        $aluno->cel_number = $request->input('cel_number');
        $aluno->curso = $request->input('curso');

        $aluno->save();
        return redirect('/aluno');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);

        if(isset($aluno)){

            return view('edit-aluno', compact('aluno'));
        }
        return redirect('/aluno');

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
        $request->validate([
            'name'=> 'required|min:3',
            'last_name'=> 'required|min:5',
            'address'=> 'max:50',
            'email'=>'required|email',
            'curso'=> 'required',
        ]);

        $aluno = Aluno::find($id);
        if(isset($aluno)){

            $aluno->name = $request->input('name');
            $aluno->last_name = $request->input('last_name');
            $aluno->birth = $request->input('birthday');
            $aluno->gender = $request->input('gender');
            $aluno->address = $request->input('address');
            $aluno->city = $request->input('city');
            $aluno->state = $request->input('state');
            $aluno->cep = $request->input('cep');
            $aluno->email = $request->input('email');
            $aluno->cel_number = $request->input('cel_number');
            $aluno->curso = $request->input('curso');

            $aluno->save();
            return redirect('/aluno');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $aluno = Aluno::find($id);

        if(isset($aluno)){

            $aluno->delete();
        }
        return redirect('/aluno');
    }
}
