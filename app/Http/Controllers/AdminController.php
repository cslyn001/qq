<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Organization;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use App\Regions;
use App\Provinces;
use App\Cities;
use Carbon\Carbon;
use App\AdminInfo;
use App\Announcement;
use App\password_resets;
use App\StudentInfo;
use App\badge;
use App\Staff;
use App\StudentCertification;
use App\StudentSeminar;
use App\StudentAwardsAchievement;


class AdminController extends Controller
{
    public function index()
    {

        $data['title'] = "Admin Report";
        $user = User::count();
        $student = StudentInfo::count();
        $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        return view('admin.adminreport',$data,compact ('user','student'));

    }
    
        public function getProvinces(Request $request)
    {
        return Provinces::where('region_id', '=', $request->region_id)->get();
    }

    public function getCities(Request $request)
    {
        return Cities::where('province_id', '=', $request->province_id)->get();
    }


    public function getOrgList()
    {
        $data['title'] = "Organization List";
        $data['orgs'] = Organization::get();
        $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        return view('admin.orgs_list', $data);
    }

    public function saveOrganization(Request $request)
    {
        $data = array(

            'org_name' => $request->org_name,
            'org_code' => strtoupper($request->org_code),
            'org_associated_with' => $request->org_with,
            'created_at' => Carbon::now()
        );

        if(isset($request->org_id))
        {
            $result = Organization::where('id',$request->org_id)->update($data);
        } else {
            $result = Organization::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }


public function getAnnouncements()
{
    $data['title'] = "announcements";
    $data['anoun'] = Announcement::get();
    $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
    $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
    $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
    return view('admin.anouncements', $data);
}

public function saveAnnouncements(Request $request)
{
    $data = array(
        'title' => $request->title,
        'content' => $request->content,
        'updated_by' => $request->updated_by,
        'created_at' => Carbon::now()
    );

    if(isset($request->anou_id))
        {
            $result = Announcement::where('id',$request->anou_id)->update($data);
        } else {
            $result = Announcement::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }


    public function changePassword(Request $request)
{
    $data = User::where('id', Auth::user()->id)->update(['password' => Hash::make($request['user_password'])]);

    if ($data) {
        return redirect()->back()->with('msg', 'Successfully changed.')->send();
    } else {
        return false;
    }
}

    public function getChangePassword()
{
    $data['title'] = "changepassword";
    $data['pass'] = User::get();
    $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
    $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
    $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');

    return view('admin.change_password', $data);
}

public function ResetPassword(Request $request)
{
    $data = User::where('id', Auth::user()->id)->update(['password' => Hash::make($request['user_password'])]);

    if ($data) {
        return redirect()->back()->with('msg', 'Successfully changed.')->send();
    } else {
        return false;
    }
}

    public function getResetPassword()
{
    $data['title'] = "changepassword";
    $data['reset'] = User::get();

    return view('admin.user_list', $data);
}

    public function getUserList()
    {
        $data['title'] = "User List";
        $data['users'] = User::join('student_info', 'users.id', '=', 'student_info.user_id')->where('users.user_type', 3)->get();
         $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        return view('admin.user_list', $data);
    }

    public function getFacultyList()
    {
        $data['title'] = "Faculty List";
        $data['users'] = User::join('staffs', 'users.id', '=', 'staffs.user_id')->where('users.user_type', 2)->get();
         $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        return view('admin.faculty_list', $data);
    }


    public function getMessages()
    {
        $data['title'] = "Messages";
        $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');

        return view('admin.messages', $data);
    }

 

    public function getProfile()
    {
        $data['title'] = "Edit Profile";
        $data['profile'] = User::where('id', auth()->user()->id)->get();
        $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        return view('admin.edit_profile1', $data);
    }


 public function getAdminReport()
    {
        $data['title'] = "Admin Report";
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $user = User::count();
        $student = StudentInfo::count();
        $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        return view('admin.adminreport',$data,compact ('user','student'));
    }

    public function getAdminBadge()
    {
        $data['title'] = "Badge";
        $user = badge::count();
        $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        return view('admin.badge',$data,compact ('user'));

    }

    public function editannouncements(Request $request)
    {
        $data = Announcement::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function editOrganizations(Request $request)
    {
        $data = Organization::where('id', $request->i)->get();

        return response()->json($data, 200);
    }


    public function deleteAnnouncements(Request $request)
    {

        $result = Announcement::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function deleteOrganizations(Request $request)
    {

        $result = Organization::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function deleteUserManagement(Request $request)
    {

        $result = User::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function deleteAdminManagement(Request $request)
    {

        $result = User::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }




    public function getAdminProfile()
    {
        $data['title'] = "Edit Profile";
        $data['student_name'] = AdminInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = AdminInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = AdminInfo::where('user_id', Auth::user()->id)->value('lname');
        $data['regions'] = Regions::orderBy('name', 'ASC')->get();
        $data['provinces'] = Provinces::orderBy('name', 'ASC')->get();
        $data['cities'] = Cities::orderBy('name', 'ASC')->get();
        $data['profile'] = AdminInfo::where('user_id', Auth::user()->id)->get();

        return view('admin.edit_profile1', $data);
    }

    public function saveAdminProfile(Request $request)
    {

        if($request->hasFile('prof_pic')){
            $filenameWithExt = $request->file('prof_pic')->getClientOriginalName();
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('prof_pic')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
          $path = $request->file('prof_pic')->storeAs('public/documents', $fileNameToStore);
              } else {
                $fileNameToStore= NULL;
            }
           // @dd($prof_pic);die;
        // if($request->hasFile('prof_pic')) {
        //     $fileWithExt = $request->file('prof_pic')->getClientOriginalName();
        //     $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
        //     $extensiion = $request->file('prof_pic')->getClientOriginalExtension();
        //     $fileNameToStore = $filename.'_'.time().'.'.$extensiion;
        //     $path = $request->file('prof_pic')->storeAs('public/documents', $fileNameToStore);
        // } else {
        //     $fileNameToStore = NULL;
        // }


        // dd($request->all());die; $POST['institution_name']
        $data = array(

            'user_id'               => Auth::user()->id,
            'fname'                 => $request->fname,
            'mname'                 => $request->mname,
            'lname'                 => $request->lname,
            'sname'                 => $request->sname,
            'contact_num'           => $request->contact_num,
            'email'                 => $request->email,
            'address'               => $request->address,
            'birthday'              => $request->birthday,
            'brgy'                  => $request->brgy,
            'province'              => $request->province,
            'region'                => $request->region,
            'city'                  => $request->city,
            'bio'                   => $request->bio,
            'sex'                   => $request->sex,
            // "attachment_filename"   => $attachment_filename,
            'prof_pic'              => $fileNameToStore,


        );

        if(isset($request->p_id))
        {
            $result = AdminInfo::where('id',$request->p_id)->update($data);
        } else {
            $result = AdminInfo::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }

    }

}






