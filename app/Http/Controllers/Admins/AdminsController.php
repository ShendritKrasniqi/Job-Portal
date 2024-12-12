<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use App\Models\Job\Job;
use App\Models\Category\Category;
use App\Models\Job\Application;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use File;


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

    
    public function storeAdmins(Request $request) {
       
        $request->validate([
            "name" => "required|max:40",
            "email" => "required|max:40|email|unique:admins,email", 
            "password" => "required",
        ]);
    
        $createAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
    
        if ($createAdmins) {
            return redirect()->route('view.admins')->with('create', 'Admin created successfully'); 
        }
    
        return back()->with('error', 'Failed to create admin');
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

    public function editCategories($id){
        
        $category = Category::find($id);

        return view("admins.edit-categories", compact('category'));

    }



    public function updateCategories(Request $request, $id){

        Request()->validate([
            "name" => "required|max:40",
        ]);

    $categoryUpdate = Category::find($id);
    $categoryUpdate->update([
        "name" => $request->name,
    ]);

    if( $categoryUpdate){
        return redirect('/admin/display-categories/')->with('update', 'Category updated successfully');
    }
}

public function deleteCategories($id){
        
    $deleteCategory = Category::find($id);
    $deleteCategory->delete();

    if( $deleteCategory){
        return redirect('/admin/display-categories/')->with('delete', 'Category Deleted successfully');
    }
}

//jobs
    public function allJobs(){
            
        $jobs = Job::all();

        return view('admins.all-jobs', compact('jobs'));

    }


    public function createJobs(){
            
        
        $categories = Category::all();

        return view('admins.create-jobs', compact('categories'));

    }

 

    

    public function storeJobs(Request $request) {
        $request->validate([
            "job_title" => "required|max:40",
            "job_region" => "required|max:40",
            "company" => "required",
            "job_type" => "required",
            "vacancy" => "required",
            "experience" => "required",
            "salary" => "required",
            "gender" => "required",
            "application_deadline" => "required|date",  // Ensuring it's a date format
            "jobdescription" => "required",
            "responsibilities" => "required",
            "education_experience" => "required",
            "otherbenifits" => "required",
            "category" => "required",
            "image" => "image|nullable", // Allowing image to be nullable
        ]);
    
        // Initialize variables for fields
        $myimage = null;
        if ($request->hasFile('image')) {
            $destinationPath = 'assets/images/';
            $myimage = $request->image->getClientOriginalName();
            $request->image->move(public_path($destinationPath), $myimage);
        }
    
        // Creating job record
        $createJobs = Job::create([
            'job_title' => $request->job_title,
            'job_region' => $request->job_region,
            'company' => $request->company,
            'job_type' => $request->job_type,
            'vacancy' => $request->vacancy,
            'experience' => $request->experience,
            'salary' => $request->salary,
            'gender' => $request->gender,
            'application_deadline' => $request->application_deadline,
            'jobdescription' => $request->jobdescription,
            'responsibilities' => $request->responsibilities,
            'education_experience' => $request->education_experience,
            'otherbenifits' => $request->otherbenifits,
            'category' => $request->category,
            'image' => $myimage,  // Saving image name only if exists
        ]);
    
        if ($createJobs) {
            return redirect('admin/display-jobs/')->with('create', 'Job created successfully');
        } else {
            return back()->with('error', 'Failed to create job');
        }
    }
    

    public function deleteJobs($id){
            
        
        $deleteJob = Job::find($id);

        if (File::exists(public_path('assets/images/' . $deleteJob->image))) {
            File::delete(public_path('assets/images/' . $deleteJob->image));
        } else {
            
            // dd('File does not exist');
        }

        $deleteJob->delete();


        if( $deleteJob){
            return redirect('admin/display-jobs/')->with('delete', 'Job Deleted successfully');
        }

    }

    //apps

    public function displayApps(){
            
        
        $apps = Application::all();

        return view('admins.all-apps', compact('apps'));
    }


    public function deleteApps($id){
            
        
        $deleteApp = Application::find($id);

        $deleteApp->delete();

        if( $deleteApp){
            return redirect('admin/display-apps/')->with('delete', 'Application Deleted successfully');
        }

    }

    public function logout()
{
    Auth::guard('admin')->logout(); // Log out the admin user
    return redirect()->route('view.login'); // Redirect to the admin login page
}


    
}
