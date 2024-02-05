<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {
        DB::table('users')
            ->updateOrInsert(
                ['email' => 'gonces@gmail.com'], // Valores usados para buscar o registro
                [
                    'name' => 'Gonçens', // Valores para atualizar ou inserir
                    'password' => '123456',
                    'updated_at'=> now(),
                    'created_at'=> now(),
                ]
            );

//          Vai buscar todos os usurários da base de dados
            // $users = DB::table('users')->get();
//          Vai buscar um só usuário, sempre sendo o primeiro que encontra
            // $myUser = DB:: table('users')
            // ->where('email', 'sarateste@gmail.com')
            // ->first();
            // dd($myUser);

        return view('users.utilizador');
    }

    public function allUsers()
    {

        $hello = 'Finalmente código';
        $helloAgain = 'Mais um Hello';
        $daysOfWeek = $this->getWeekDays();
        $info = $this->courseInfo();
        $users = $this->getContacts();

        // dd($info);
        //var_dump();


        return view('users.all_users', compact(
            'hello',
            'helloAgain',
            'daysOfWeek',
            'info',
            'users'
        ));
    }

    public function viewUser($id){

        $myUser = db::table('users')
        ->where('id', $id)
        ->first();
        return view('users.view', compact('myUser'));

    }

    public function createUser(Request $request){
        $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required|string|max:10',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.all')->with('message', 'utilizador adicionado com sucesso');

    }

    public function updateUser(Request $request){

        // validação de entrada de dados
        $request->validate([
            'phone' => 'min:9|max:15',

        ]);

        User::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.all')->with('message', 'utilizador atualizado com sucesso');

    }

    public function deleteUser($id){
        //delete on cascade *(Precisa apagar )
        Db::table('tasks')
        ->where('user_id', ($id))
        ->delete();

        Db::table('users')
            ->where('id', ($id))
            ->delete();

        return back();
    }



    private function getWeekDays()
    {
        $daysOfWeek = ['Segunda', 'Terça', 'Quarta', 'Quinta'];
        return $daysOfWeek;
    }


    private function courseInfo(){
        $courseInfo = ['name' => 'Software Developer', 'year' => 2024, 'modules' => ['PHP', 'WebServices', 'Java'],['Teste', 10, 'Átylla', 'Severa']];
        return $courseInfo;
    }

    private function getContacts(){

        // $users = [
        //     ['id'=>1, 'name'=>'Sara', 'Phone'=>'91222222', 'Email'=>'sara@gmail.com'],
        //     ['id'=>2, 'name'=>'Renato', 'Phone'=>'91222222', 'Email'=>'renato@gmail.com'],
        //     ['id'=>3, 'name'=>'Rita', 'Phone'=>'91222222', 'Email'=>'rita@gmail.com'],
        //     ['id'=>4, 'name'=>'Fernando', 'Phone'=>'91222222', 'Email'=>'Fernando@gmail.com']
        // ];
        $users = DB::table('users')
        ->get();

        return $users;
    }


}
