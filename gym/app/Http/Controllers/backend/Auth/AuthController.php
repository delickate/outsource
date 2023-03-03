<?php

namespace App\Http\Controllers\backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\UserLogin;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginPageView(){
        return view('Auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'status'=>1])) {

            try{
                $userID = auth()->user()->id;
                $lastLogin = UserLogin::where('user_id',$userID)->orderBy('id','DESC')->first();
                if(isset($lastLogin->ip)){
                    User::find($userID)->update([
                        'lastLoginIp' => $lastLogin->ip,
                        'lastLoginTime' => $lastLogin->created_at,
                        'browser_info' => $lastLogin->browser_info
                    ]);
                }
                $browser_info = $request->header('User-Agent');
                UserLogin::create([ 'user_id' => $userID, 'ip' => $request->ip(), 'browser_info' => $browser_info  ]);
                return redirect()->route('dashboard')->with('last_login','1');
            }catch(Exception $e){
                return redirect()->route('dashboard');
            }

            
        }else{
            return redirect()->back()->with('error',"Credentials Doesn't Match");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('loginpage')->with('success','User Logged Out ');
    }

    public function change_password(){
        return view('Auth.change_password');
    }

    public function save_password(Request $request){
        $credentials = $request->validate([
            'current_password' => ['required'],
            'password' =>  ['required', 'confirmed', Password::min(6)],
            'password_confirmation' => ['required']
        ]);
 
        if (! Hash::check($request->current_password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records.']
            ]);
        }

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        Auth::logout();
        return redirect()->route('loginpage')->with('success','Password update succesfully and Login again.');
        // return redirect()->back()->with('success',"Password update succesfully!");
    }



    
}
