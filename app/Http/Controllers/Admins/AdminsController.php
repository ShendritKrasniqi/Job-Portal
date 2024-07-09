<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Job\Job;
use App\Models\Category\Category;
use App\Models\Job\Application;
use Illuminate\Support\Facades\Hash;


class AdminsController extends Controller
{
    public function viewLogin(){

        return view("admins.view-login");
    }



    public function checkLogin(Request $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
        
    }

    public function index(){

        $jobs = Job::select()->count();
        $categories = Category::select()->count();
        $admins = Admin::select()->count();
        $application = Application::select()->count();
   


        return view("admins.index", compact('jobs', 'categories', 'admins', 'application'));

    }

    public function admins(){
        $admins = Admin::all();

        return view("admins.all-admins", compact('admins'));
    }


    public function createAdmins(){
        

        return view("admins.create-admins");
    }

    
    public function storeAdmins(Request $request){

        Request()->validate([
            "name" => "required|max:40",
            "email" => "required|max:40",
            "pasword" => "required",

        ]);


        $createAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password,),
        ]);

        if( $createAdmins){
            return redirect('admin/all-admin/')->with('create', 'Admin creted successfully');
        }
    }
    

    public function displayCategories(){
        
        $categories = Category::all();


        return view("admins.display-categories", compact('categories'));
    }


    public function createCategories(){
        
        return view("admins.create-categories");

    }


    public function storeCategories(Request $request)
    {
        // Validate the input
        $request->validate([
            "name" => "required|max:40",
        ]);
    
        // Create a new category
        $createCategory = Category::create([
            'name' => $request->name,
        ]);
    
        // Check if the category was created successfully
        if ($createCategory) {
            return redirect('admin/display-categories')->with('create', 'Category created successfully');
        }
    
        // Optionally, you could handle the case where the category creation fails
        return back()->with('error', 'Failed to create category');
    }



 
}
