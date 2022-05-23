<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\StudentEducBackground;
use App\StudentExperience;
use App\StudentInfo;
use App\StudentAwardsAchievement;
use App\StudentCertification;
use App\StudentProjects;
use App\StudentSeminar;
use App\Regions;
use App\Provinces;
use App\Cities;
use App\StudentSkills;
use App\StudentOrganization;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;

class StudentController extends Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['educations'] = StudentEducBackground::where('privacy_type', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('from','desc')->get();
        $data['experiences'] = StudentExperience::where('privacy_status', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('end_date','desc')->get();
        $data['awardsachievement'] = StudentAwardsAchievement::where('privacy_status', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('date_given','desc')->get();
        $data['certification'] = StudentCertification::where('privacy_status', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('date_give','desc')->get();
        $data['seminar'] = StudentSeminar::where('user_id', Auth::user()->id)->orderBy('date_given','desc')->get();
        $data['project'] = StudentProjects::where('user_id', Auth::user()->id)->orderBy('date_established','desc')->get();
        $data['skills'] = StudentSkills::where('user_id', Auth::user()->id)->select('id','skills')->get();
        $data['prof_pic'] = StudentInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['check'] = StudentExperience::where('user_id', Auth::user()->id)->value('privacy_status');
        $data['org'] = StudentOrganization::where('user_id', Auth::user()->id)->get();

        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->select('fname')->get();
        $data['student_mname'] = StudentInfo::where('user_id', Auth::user()->id)->value('mname');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');
        $data['certification_status'] = StudentInfo::where('user_id', Auth::user()->id)->value('status');
        $data['email'] = User::where('user_type', 2)->value('email');

        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['objective'] = StudentInfo::where('user_id', Auth::user()->id)->value('objective');
        return view('student.dashboard', $data);
    }

    public function getProfileView($id)
    {
        $data['title'] = "view";
        $data['educations'] = StudentEducBackground::where('privacy_type', '!=', 0)->where('user_id', $id)->orderBy('from','desc')->get();
        $data['experiences'] = StudentExperience::where('privacy_status', '!=', 0)->where('user_id', $id)->orderBy('end_date','desc')->get();
        $data['awardsachievement'] = StudentAwardsAchievement::where('privacy_status', '!=', 0)->where('user_id', $id)->orderBy('date_given','desc')->get();
        $data['certification'] = StudentCertification::where('privacy_status', '!=', 0)->where('user_id', $id)->orderBy('date_give','desc')->get();
        $data['seminar'] = StudentSeminar::where('user_id', $id)->orderBy('date_given','desc')->get();
        $data['project'] = StudentProjects::where('user_id',$id)->orderBy('date_established','desc')->get();
        $data['skills'] = StudentSkills::where('user_id',$id)->select('id','skills')->get();
        $data['prof_pic'] = StudentInfo::where('user_id',Auth::user()->id)->value('prof_pic');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');
        $data['student_mname'] = StudentInfo::where('user_id', Auth::user()->id)->value('mname');
        $data['userfname'] = StudentInfo::where('user_id', $id)->select('fname')->value('fname');
        $data['user_profpic'] = StudentInfo::where('user_id',$id)->select('prof_pic')->value('prof_pic');
        $data['organization'] = StudentOrganization::where('user_id',$id)->get();
        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['userlname'] = StudentInfo::where('user_id',  $id)->value('lname');
        $data['objective'] = StudentInfo::where('user_id', Auth::user()->id)->value('objective');
        $data['objective'] = StudentInfo::where('user_id', $id)->value('objective');
        
        return view('student.profile_student_view', $data);
    }

    public function messages()
    {
        $data['title'] = "Messages";
        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = StudentInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_mname'] = StudentInfo::where('user_id', Auth::user()->id)->value('mname');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');

        return view('student.messages', $data);
    }

    public function getProfile()
    {
        $data['title'] = "Edit Profile";
        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['regions'] = Regions::orderBy('name', 'ASC')->get();
        $data['provinces'] = Provinces::orderBy('name', 'ASC')->get();
        $data['cities'] = Cities::orderBy('name', 'ASC')->get();
        $data['profile'] = StudentInfo::where('user_id', Auth::user()->id)->get();
        $data['prof_pic'] = StudentInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_mname'] = StudentInfo::where('user_id', Auth::user()->id)->value('mname');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');
        $data['objective'] = StudentInfo::where('user_id', Auth::user()->id)->value('objective');
        $data['email'] = User::where('id', Auth::user()->id)->value('email');
        $data['signature'] = StudentInfo::where('user_id', Auth::user()->id)->value('signature');
        return view('student.edit_profile', $data);
    }




    public function saveProfile(Request $request)
    {


            if($request->hasFile('prof_pic')) {
                $fileWithExt = $request->file('prof_pic')->getClientOriginalName();
                $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
                $extensiion = $request->file('prof_pic')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extensiion;
                $path = $request->file('prof_pic')->storeAs('public/documents', $fileNameToStore);
            } else {
                $fileNameToStore = NULL;
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
            'objective'     => $request->objective,


        );

        if(isset($request->p_id))
        {
            $result = StudentInfo::where('id',$request->p_id)->update($data);
        } else {
            $result = StudentInfo::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }


    public function getAssociates()
    {
        $data['title'] = "Associates";
        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = StudentInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_mname'] = StudentInfo::where('user_id', Auth::user()->id)->value('mname');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');


        return view('student.associates', $data);
    }

    public function saveEduc(Request $request)
    {
        //dd($request->all());die; //$POST['institution_name']
        if ($request->level == "Vocational") {
            $text = $request->vocational;
        } elseif ($request->level == "College") {
            $text = $request->course;
        } elseif ($request->level == "Senior High") {
            $text = $request->strandtrack;
        } elseif ($request->level == "High School") {
            $text = $request->highschool;
        }
        elseif($request->level === "Elementary") {
            $text=$request->elementary;
        }
        else {

        }


        $data = array(
            'user_id'               => Auth::user()->id,
            'educ_level'            => $request->level,
            'institution_name'      => $request->institution_name,
            'institution_address'   => $request->institution_addr,
            'degree'                => $text,
            'from'                  => $request->from,
            'to'                    => $request->to,
            'privacy_type'          => 2
        );

        if(isset($request->eid))
        {
            $result = StudentEducBackground::where('id',$request->eid)->update($data);
        } else {
            $result = StudentEducBackground::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }

    public function editEduc(Request $request)
    {
        $data = StudentEducBackground::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function saveExperience(Request $request)
    {
    //dd($request->all());die;// $POST['institution_name']
        $data = array(
            'user_id'       => Auth::user()->id,
            'job_title'     => $request->job_title,
            'job_address'   => $request->company_addr,
            'company'       => $request->company_name,
            'start_date'    => date("Y-m-d", strtotime($request->start_date_experience)),
            'end_date'      => date("Y-m-d", strtotime($request->end_date_experience)),
            'privacy_status'=> 2
        );

        if(isset($request->ex_id))
        {
            $result = StudentExperience::where('id',$request->ex_id)->update($data);
        } else {
            $result = StudentExperience::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }

    public function editExperience(Request $request)
    {
        $data = StudentExperience::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function deleteExperience(Request $request)
    {
        $result = StudentExperience::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function deleteEduc(Request $request)
    {
        $result = StudentEducBackground::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function saveSkills(Request $request)
    {
        // dd($request->all());die;
        $data = array(
            'user_id' => Auth::user()->id,
            'skills'  => $request->skills_input,
        );

        if(isset($request->skid))
        {
            $result = StudentSkills::where('id',$request->skid)->update($data);
        } else {
            $result = StudentSkills::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }

    public function editSkills(Request $request)
    {
        $data = StudentSkills::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function deleteSkills(Request $request)
    {
        $result = StudentSkills::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function saveAwardsAchievement(Request $request)
    {
        if($request->hasFile('attachment_filename')) {
            $fileWithExt = $request->file('attachment_filename')->getClientOriginalName();
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
            $extensiion = $request->file('attachment_filename')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extensiion;
            $path = $request->file('attachment_filename')->storeAs('public/documents', $fileNameToStore);
        } else {
            $fileNameToStore = NULL;
        }

       //dd($request->all());die;// $POST['institution_name']
         $data = array(
             'user_id'           => Auth::user()->id,
             'title'             => $request->title,
             'description'       => $request->description,
             'issuer'            => $request->issuer,
             'type'              => $request->type,
             'venue'             => $request->venue,
             'date_given'        => date("Y-m-d", strtotime($request->from_date)),
             'attachment_filename'  => $fileNameToStore,
             'privacy_status'    => 2,
             'approval_status'   => 2
         );

         if(isset($request->aid))
         {
             $result = StudentAwardsAchievement::where('id',$request->aid)->update($data);
         } else {
             $result = StudentAwardsAchievement::insert($data);
         }

         if($result) {
             return redirect()->back()->with(['msg' => 'Successfully Added!']);
         } else {
             return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
         }
    }

    public function editAwardsAchievement(Request $request)
    {
        $data = StudentAwardsAchievement::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function deleteAwardsAchievement(Request $request)
    {
        $result = StudentAwardsAchievement::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function saveCertification(Request $request)
    {
        if($request->hasFile('attachment_filename')) {
            $fileWithExt = $request->file('attachment_filename')->getClientOriginalName();
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
            $extensiion = $request->file('attachment_filename')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extensiion;
            $path = $request->file('attachment_filename')->storeAs('public/documents', $fileNameToStore);
        } else {
            $fileNameToStore = NULL;
        }

            //dd($request->all());die;// $POST['institution_name']
            $data = array(
                'user_id'               => Auth::user()->id,
                'cert_name'             => $request->cert_name,
                'cert_author'           => $request->cert_author,
                'cert_address'          => $request->cert_address,
                'type'                  => $request->type,
                'date_give'             => date("Y-m-d", strtotime($request->date)),
                'attachment_file'       => $fileNameToStore,
                'expiration'            => date("Y-m-d", strtotime($request->from_date)),
                'privacy_status'        => 2,
                'approval_status'       => 2
            );

            if(isset($request->cid))
            {
                $result = StudentCertification::where('id',$request->cid)->update($data);
            } else {
                $result = StudentCertification::insert($data);
            }

            if($result) {
                return redirect()->back()->with(['msg' => 'Successfully Added!']);
            } else {
                return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
            }


    }

    public function editCertification(Request $request)
    {
        $data = StudentCertification::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function deleteCertification(Request $request)
    {
        $result = StudentCertification::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function saveProjects(Request $request)

    {

        if($request->hasFile('file_upload')) {
            $fileWithExt = $request->file('file_upload')->getClientOriginalName();
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
            $extensiion = $request->file('file_upload')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extensiion;
            $path = $request->file('file_upload')->storeAs('public/documents', $fileNameToStore);
        } else {
            $fileNameToStore = NULL;
        }

            //dd($request->all());die;// $POST['institution_name']
            $data = array(
                'user_id'               => Auth::user()->id,
                'project_title'         => $request->project_title,
                'position'              => $request->position,
                'project_description'   => $request->project_description,
                'date_established'      => date("Y-m-d", strtotime($request->date_established)),
                'url'                   => $request->url,
                'file_upload'           => $fileNameToStore
            );

            if(isset($request->pid))
            {
                $result = StudentProjects::where('id',$request->pid)->update($data);
            } else {
                $result = StudentProjects::insert($data);
            }

            if($result) {
                return redirect()->back()->with(['msg' => 'Successfully Added!']);
            } else {
                return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
            }





    }

    public function editProjects(Request $request)
    {
        $data = StudentProjects::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function deleteProjects(Request $request)
    {
        $result = StudentProjects::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function saveSeminar(Request $request)
    {
        if($request->hasFile('attachment_filename')) {
            $fileWithExt = $request->file('attachment_filename')->getClientOriginalName();
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);
            $extensiion = $request->file('attachment_filename')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extensiion;
            $path = $request->file('attachment_filename')->storeAs('public/documents', $fileNameToStore);
        } else {
            $fileNameToStore = NULL;
        }

        //dd($request->all());die;// $POST['institution_name']
        $data = array(
            'user_id'               => Auth::user()->id,
            'title'                 => $request->seminar_title,
            'venue'                 => $request->seminar_venue,
            'type'                 => $request->seminar_type,
            'date_given'            => date("Y-m-d", strtotime($request->from_date)),
            'attachment_filename'   => $fileNameToStore
        );

        if(isset($request->s_id))
        {
            $result = StudentSeminar::where('id',$request->s_id)->update($data);
        } else {
            $result = StudentSeminar::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }

    public function editSeminar(Request $request)
    {
        $data = StudentSeminar::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function deleteSeminar(Request $request)
    {
        $result = StudentSeminar::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function getProvinces(Request $request)
    {
        return Provinces::where('region_id', '=', $request->region_id)->get();
    }

    public function getCities(Request $request)
    {
        return Cities::where('province_id', '=', $request->province_id)->get();
    }

    public function searchStudent(Request $request)
    {
        $data['title'] = "Search results";
        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = StudentInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_mname'] = StudentInfo::where('user_id', Auth::user()->id)->value('mname');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');


        $keyword = $request->studentName;
        $data['results'] = StudentInfo::where('fname', 'LIKE', "%$keyword%")
                    ->orWhere('mname', 'LIKE', "%$keyword%")
                    ->orWhere('lname', 'LIKE', "%$keyword%")
                    ->orWhere('prof_pic', 'LIKE', "%$keyword%")
                    ->get();


        return view('student.search', $data);
    }

    public function saveOrg(Request $request)
    {

        $data = array(

            'user_id'       => Auth::user()->id,
            'org_name'     => $request->org_name,
            'org_associated_with' => $request->org_associated_with,
            'position'     => $request->position,
            'start_date'   => $request->start_date,
            'end_date'       => $request->end_date,

        );

        if(isset($request->org_id))
        {
            $result = StudentOrganization::where('id',$request->org_id)->update($data);
        } else {
            $result = StudentOrganization::insert($data);
        }

        if($result) {
            return redirect()->back()->with(['msg' => 'Successfully Added!']);
        } else {
            return redirect()->back()->with(['msg' => 'Oops! Error on saving.'])->withInput();
        }
    }

    public function editOrg(Request $request)
    {
        $data = StudentOrganization::where('id', $request->i)->get();

        return response()->json($data, 200);
    }

    public function deleteOrg(Request $request)
    {
        $result = StudentOrganization::where('id', $request->i)->delete();
        return response()->json($result, 200);
    }

    public function GeneratePDF()
    {
        $data['educations'] = StudentEducBackground::where('privacy_type', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('from','desc')->get();
        $data['experiences'] = StudentExperience::where('privacy_status', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('end_date','desc')->get();
        $data['awardsachievement'] = StudentAwardsAchievement::where('privacy_status', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('date_given','desc')->get();
        $data['certification'] = StudentCertification::where('privacy_status', '!=', 0)->where('user_id', Auth::user()->id)->orderBy('date_give','desc')->get();
        $data['seminar'] = StudentSeminar::where('user_id', Auth::user()->id)->orderBy('date_given','desc')->get();
        $data['project'] = StudentProjects::where('user_id', Auth::user()->id)->orderBy('date_established','desc')->get();
        $data['skills'] = StudentSkills::where('user_id', Auth::user()->id)->select('id','skills')->get();
        $data['prof_pic'] = StudentInfo::where('user_id', Auth::user()->id)->value('prof_pic');

        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->selectRaw("CONCAT(fname,' ' ,mname, '.' ' ',lname) as fullname")->value('fullname');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');
        $data['student_address'] = StudentInfo::where('user_id', Auth::user()->id)->value('address');
        $data['student_brgy'] = StudentInfo::where('user_id', Auth::user()->id)->value('brgy');
        $data['student_city'] = StudentInfo::where('user_id', Auth::user()->id)->value('city');
        $data['student_province'] = StudentInfo::where('user_id', Auth::user()->id)->value('province');
        $data['student_contact_num'] = StudentInfo::where('user_id', Auth::user()->id)->value('contact_num');
        $data['student_objective'] = StudentInfo::where('user_id', Auth::user()->id)->value('objective');

        $pdf = PDF::loadView('myPDF', $data);
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'isPhpEnabled' => true]);
        return $pdf->stream('resume.pdf');
    }

    public function changePrivacyEduc(Request $request)
    {
        $result = StudentEducBackground::where('id', $request->i)->update(['privacy_type' => $request->v]);


        if ($result) {
            return response()->json(['msg' => 'Success'], 200);
        } else {
            return response()->json(['msg' => 'Error'], 500);
        }

    }
    public function changePrivacyExp(Request $request)
    {
        $result = StudentExperience::where('id', $request->i)->update(['privacy_status' => $request->v]);


        if ($result) {
            return response()->json(['msg' => 'Success'], 200);
        } else {
            return response()->json(['msg' => 'Error'], 500);
        }

    }
    public function changePrivacyCer(Request $request)
    {
        $result = StudentCertification::where('id', $request->i)->update(['privacy_status' => $request->v]);


        if ($result) {
            return response()->json(['msg' => 'Success'], 200);
        } else {
            return response()->json(['msg' => 'Error'], 500);
        }

    }

    public function changePrivacyAward(Request $request)
    {
        $result = StudentCertification::where('id', $request->i)->update(['privacy_status' => $request->v]);


        if ($result) {
            return response()->json(['msg' => 'Success'], 200);
        } else {
            return response()->json(['msg' => 'Error'], 500);
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
        $data['student_name'] = StudentInfo::where('user_id', Auth::user()->id)->value('fname');
        $data['prof_pic'] = StudentInfo::where('user_id', Auth::user()->id)->value('prof_pic');
        $data['student_mname'] = StudentInfo::where('user_id', Auth::user()->id)->value('mname');
        $data['student_lname'] = StudentInfo::where('user_id', Auth::user()->id)->value('lname');


        return view('student.change_password', $data);
    }


}

