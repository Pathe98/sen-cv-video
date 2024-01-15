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
//     public function admindashboard()
//     {
//         $totalUsers = User::count(); // Utilisez une minuscule pour la variable ($totalUsers au lieu de $TotalUsers)
//         $totalPosts = Post::count(); // Utilisez une minuscule pour la variable ($totalPosts au lieu de $TotalPosts)
//         $list = User::all();
        
//         return view('/',compact('totalUsers', 'totalPosts', 'list'));
//     }

//     public function listUser()
//     {
//         $users = User::all();
//         return view('admin/listUser', compact('users'));
//     }

//     public function deleteUser($id)
//     {
//         $user = User::find($id);
        
//         if ($user) {
//             $user->delete();
//             return redirect('/admin/list')->with('status', "L'utilisateur a été supprimé");
//         } else {
//             return redirect('/admin/list')->with('status', "Utilisateur introuvable");
//         }
//     }
}
