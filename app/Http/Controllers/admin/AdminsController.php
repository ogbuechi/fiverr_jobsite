<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\Newsletter;
use App\Models\Company;
use App\Models\EmployerAccess;
use App\Models\EmployerProduct;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminsController extends Controller
{
    public function resumeAccess(){
        $industry_type = [];
        return view('admin.resume_access', compact('industry_type'));
    }
    public function inactiveResumes(){
        $title = 'Inactive Resumes';
        $users = User::whereRoleIs('jobseekers')->get();
        return view('admin.users.user-list', compact('users','title'));
    }

    public function jobseekerNewsletter(){
        $title = 'Jobseeker';
        $users = User::whereRoleIs('jobseeker')->get();
        return view('admin.users.newsletter', compact('users','title'));
    }

    public function employerNewsletter(){
        $title = 'Employer';
        $users = User::whereRoleIs('employer')->get();
        return view('admin.users.newsletter', compact('users','title'));
    }

    public function newsletterSubmit(Request $request){
        $user_ids = $request->users;
        if(!$user_ids){
            return redirect()->back()->with('failure', 'Please select a user');
        }
        $request->session()->put('user_ids',$user_ids);
        $title = $request->title;
        return view('admin.users.submit', compact('user_ids','title'));

    }

    public function newsletterSend(Request $request){
        $user_ids = $request->session()->get('user_ids');
        $title = $request->title;
        $data['subject'] = $title;
        $data['message'] = $request->message;
        $users = User::select('id','email')->whereIn('id',$user_ids)->get();
        foreach ($users as $user){
            Mail::to($user->email)->send(new Newsletter($data));
        }
        return redirect()->route('admin.jobseeker.newsletter')->with('success','Mails successfully sent');
//        return view('admin.users.submit', compact('user_ids','title'));

    }

    public function inactiveCompanies(){
        $title = 'Inactive Companies';
        $jobs = Job::pluck('company_id');
        $companies = Company::whereNotIn('id',$jobs)->get();
        return view('admin.users.companies', compact('companies','title'));
    }

    public function resumeSearch(Request $request){
        $title = 'Resumes Search Result';
       $users = User::whereRoleIs('jobseekers')->whereFunctionArea($request->functional_area)->orWhere('industry',$request->industry_type)->get();

        if(count($users) < 1){
            return redirect()->back()->with('failure','No result found');
        }
        return view('admin.users.user-list', compact('users','title'));
    }

    public function employeeDBAccess(){
        $title = 'Employee Database Access Management';
        $db_access = EmployerAccess::wherePaid(true)->pluck('user_id');
        $users = User::whereIn('id',$db_access)->whereRoleIs('employer')->get();

        return view('admin.users.employee-db-access', compact('users','title'));
    }

    public function employeeJobAccess(){
        $title = 'Employee Job Posting Access management';
        $db_access = EmployerProduct::wherePaid(true)->pluck('user_id');
        $users = User::whereIn('id',$db_access)->whereRoleIs('employer')->get();

        return view('admin.users.employee-job-access', compact('users','title'));
    }

    public function employeeDBAccessOrders(){
        $title = 'Employee Database Access Orders';
     $db_access = EmployerAccess::wherePaid(true)->get();

        return view('admin.users.employee-db-access-orders', compact('db_access','title'));
    }

    public function employeeJobAccessOrders(){
        $title = 'Employee Job Access Orders';
     $db_access = EmployerProduct::wherePaid(true)->get();

        return view('admin.users.employee-job-access-orders', compact('db_access','title'));
    }

    public function packagePurchased(){
        $title = 'Purchased Packages';
        $packages = [];

        return view('admin.packages.purchased', compact('packages','title'));
    }

}
