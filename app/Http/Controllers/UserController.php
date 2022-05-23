<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Staff;
use App\StudentInfo;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        //dd($request->all()); // test if nakita lahat ng inputs from user.

        $validator = Validator::make($request->all(), [
            'reg_name'  => 'required|string|min:1|max:100',
            'reg_mname' => 'nullable|string|min:1|max:100',
            'reg_lname' => 'required|string|min:1|max:100',
            'reg_sname' => 'nullable|string|min:1|max:10',
            'email' => 'required|email|unique:users|max:255',
            'reg_passwd' => [
                    'required',
                    'string',
                    'min:8', // must be at least 8 characters in length
                    //'regex:/[a-z]/',  // must contain at least one lowercase letter
                    //'regex:/[A-Z]/', // must contain at least one uppercase letter
                    //'regex:/[0-9]/', // must contain at least one digit
                    //'regex:/[@$!%*#?&]/', // must contain a special character
                    'same:c_password' // must be confirmed
                ],
            'c_password' => 'required'
            ], $message = [
                'email.exists' => "Email already taken."
            ]);
            // dd($validator->fails());die;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->reg_user_type == 2) {
                /* if user is a faculty member */
                $this->saveFaculty($request->all());
            } else {
                /* if user is a student */
                $this->saveStudent($request->all());
            }
        }
    }

    public function saveFaculty($request)
    {
        $user = array(
            'email'     => $request['email'],
            'password'  => Hash::make($request['reg_passwd']),
            'user_type' => 2
        );

        $qry = Staff::where('fname', 'like', '%' . $request['reg_name'] . '%');
        if (isset($request['reg_mname'])) {
            $qry->where('mname', 'like', '%' . $request['reg_mname'] . '%');
        }
        if (isset($request['reg_sname'])) {
            $qry->where('sname', 'like', '%' . $request['reg_sname'] . '%');
        }
        $faculty = $qry->where('lname', 'like', '%' . $request['reg_lname'] . '%')->first();

        if (!$faculty) {

            $save_result = User::create($user);

            $profile = array(
                'user_id' => $save_result->id,
                'fname' => ucwords($request['reg_name']),
                'mname' => isset($request['reg_mname']) ? ucwords($request['reg_mname']) : '',
                'lname' => ucwords($request['reg_lname']),
                'sname' => isset($request['reg_sname']) ? ucwords($request['reg_sname']) : ''
            );

            $result = Staff::create($profile);

           if ($result->id) {
                return redirect('/')->with(['success' => 'Successfully registered'])->send();

            }else{
                return redirect('/')->with(['error' => 'Something wet wrong please try again'])->send();
            }
        } else {
                return redirect('/')->with(['errorExist' => "User already exist."])->send();
        }
    }

    public function saveStudent( $request)
    {
        $user = array(
            'email'     => $request['email'],
            'password'  => Hash::make($request['reg_passwd']),
            'user_type' => 3
        );

        $qry = StudentInfo::where('fname', 'like', '%' . $request['reg_name'] . '%');
        if (isset($request['reg_mname'])) {
            $qry->where('mname', 'like', '%' . $request['reg_mname'] . '%');
        }
        if (isset($request['reg_sname'])) {
            $qry->where('sname', 'like', '%' . $request['reg_sname'] . '%');
        }
        $student = $qry->where('lname', 'like', '%' . $request['reg_lname'] . '%')->first();

        if (!$student) {

            $save_result = User::create($user);

            $profile = array(
                'user_id' => $save_result->id,
                'fname' => ucwords($request['reg_name']),
                'mname' => isset($request['reg_mname']) ? ucwords($request['reg_mname']) : '',
                'lname' => ucwords($request['reg_lname']),
                'sname' => isset($request['reg_sname']) ? ucwords($request['reg_sname']) : ''
            );

            $result = StudentInfo::create($profile);

           if ($result->id) {
                return redirect('/')->with('success', 'Successfully registered.')->send();
            }

        } else {
            return redirect('/')->with(['errorExist' => "User already exist."])->send();
        }
    }
}