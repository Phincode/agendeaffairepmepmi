<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PhpParser\Node\Stmt\Break_;

class AppAccess extends Controller
{
    public function connexionview(Request $request)
    {
        return view('connexion.index');
    }

    public function connexion(LoginRequest $request)
    {
        $data= $request->validated();
       // dd($data);
        
        if (Auth::attempt($data,false)) {
            // Authentication passed...
            $request->session()->regenerate();
            $role=Auth::user()->role;
            switch($role->name){
                case 'AG':
                     return redirect('dashboard/index');
                    break;
                case 'RAN':
                    return redirect('dashboard/index');
                       break;
                case 'AS':
                    return redirect('dashboard/index');
                       break;
                case 'Banque':
                    return redirect('dashboard/index');
                        break;
                case 'SC':
                     return redirect('dashboard/index');
                    break;        

            }

        }else{
            return back()->with('error','email ou mot de passe incorrecte');
        }
        


       
    }



}
