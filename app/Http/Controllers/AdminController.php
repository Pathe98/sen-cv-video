<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Mettez à jour le chemin du modèle User
use App\Models\Post; // Mettez à jour le chemin du modèle Post
use illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


    Public function index(){
        
        if(Auth::id())
        {
            $role = Auth()->user()->role;
            

            if($role == 'user'){
                return view('dashboard');
            }


            else if($role == 'admin'){
                return view('admin.adminhome');
            }

            else{
                redirect()->back();
            }
        }
    }
    public function admin()
    {
        $totalUsers = User::count(); // Utilisez une minuscule pour la variable ($totalUsers au lieu de $TotalUsers)
        $totalPosts = Post::count(); // Utilisez une minuscule pour la variable ($totalPosts au lieu de $TotalPosts)
        $list = User::all();
        
        return view('admin.admindashboard',compact('totalUsers', 'totalPosts', 'list'));
    }

    public function list()
    {
        $users = User::all();
        return view('admin.listeUser', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        
        if ($user) {
            $user->delete();
            $user->posts()->delete();
            return redirect('/admindashboard/list')->with('status', "L'utilisateur a été supprimé");
        } else {
            return redirect('/admindashboard/list')->with('status', "Utilisateur introuvable");
        }
    }
}
