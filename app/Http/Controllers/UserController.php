<?php

namespace App\Http\Controllers;

use App\Mail\message_email;
use App\Mail\VerifyEmail;
use App\Mail\messageemail;
use App\Models\Article;
use App\Models\User;
use App\Models\verifyUser;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;



class UserController extends Controller
{
    //
    function ferstpage()
    {
        if(Cookie::has('name')){
            return redirect('product');
            }else
              return view('pages/index');
    }

    
    function create()
    {
        return view('pages/create_acount');
    }
    function contact()
    {
        return view('pages/send_me');
    }
    // add user 
    function add(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password1'=>'required',
            'password2'=>'required'
        ]);
      
        $users=new User();
            $users->name=$request->input('name');
            $users->email=$request->input('email');
            $users->password=Hash::make($request->input('password1'));
        if($request->input('password1')==$request->input('password2'))
        {
            $nom=$request->input('name');
            $users->save();
          $ver=new verifyUser();
          $ver->token= Str::random(60);
          $ver->user_id=$users->id;
            $ver->save();
            Mail::to($users->email)->send(new VerifyEmail($users,$ver));

        return redirect()->route('ferstpage')
                       ->with('nom',$nom);
        }else{
           return redirect()->route('create')
            ->with('nom','erreur pass')
            ->withInput();
        }
 
    }

    // log in 
    function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
         $userf=User::where('email',$request->input('email'))->first();
                                                
                                            
        if($userf!='')
        {   
            
            if( Hash::check($request->input('password'), $userf->password))
            {
                if($userf->email_verified_at)
                {    
               // Cookie::put('name', $userf->name);
                Cookie::queue('name',$userf->name);
                //$request->session()->put('name',$userf->name);
                 return redirect()->route('product')->with('articles',$userf->name);
                                                    
                }
                else
                return redirect()->back()->with('erreur','email no verificat');
            }
            else
            return redirect()->back()->with('erreur','password incorrect');
        }else
        {
            return redirect()->back()->with('erreur','you not have acount');
        }
    }

    // log out 
    function logout()
    {
        Cookie::queue(Cookie::forget('name'));
        return redirect('/');
    }
    // send 
    function send(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'gmail'=>'required',
            'message'=>'required'
        ]);
        $data=[
            'name'=>$request->name,
            'gmail'=>$request->gmail,
            'message'=>$request->message
        ];
          Mail::to('ekouiness@gmail.com')->send(new message_email($data));
          return redirect('/');
    }
    // virefication
    function verification($token)
    {
        $virificat=verifyUser::where('token',$token)->first();
        if(isset($virificat))
        {
            $userv=User::where('id',$virificat->user_id)->first();
            if(!$userv->email_verified_at)
            {
                $userv->email_verified_at=Carbon::now();
                $userv->save();
                return redirect()->route('ferstpage')
                                ->with('return','email verificat');
            }else
            return redirect()->route('ferstpage')
                         ->with('return','email was verificat');
        }else
        return redirect()->route('ferstpage')
                         ->with('erreur','link false!');
    }
    //GOOGLE

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email', $googleUser->email)->first();

            if ($existUser) {
                // Auth::loginUsingId($existUser->id);
                Cookie::queue('name',$existUser->name);
                 return redirect()->route('product')->with('articles',$existUser->name);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->email_verified_at=Carbon::now();
                $user->Google_Id = $googleUser->id;
                $user->password = Hash::make(md5(rand(1, 10000)));
                $user->save();
                Cookie::queue('name',$existUser->name);
                return redirect()->route('product')->with('articles',$googleUser->name);
            }
            return redirect()->to('/');
        } catch (Exception $e) {
            return 'error';
        }
    }

      //fb

      public function redirectToProviderfb()
      {
          return Socialite::driver('facebook')->redirect();
      }
  
      public function handleProviderfbCallback()
      {
          try {
              $fbUser = Socialite::driver('facebook')->user();
              $existUser = User::where('social_id', $fbUser->id)->first();
  
              if ($existUser) {
                  // Auth::loginUsingId($existUser->id);
                  Cookie::queue('name',$existUser->name);
                   return redirect()->route('product')->with('articles',$existUser->name);
              } else {
                  $user = new User;
                  $user->name = $fbUser->name;
                  $user->social_id = $fbUser->email;
                  $user->fb_id = $fbUser->id;
                  $user->social_type= 'facebook';
                  $user->password = Hash::make(md5(rand(1, 10000)));
                  $user->save();
                  Cookie::queue('name',$existUser->name);
                  return redirect()->route('product')->with('articles',$fbUser->name);
              }
              return redirect()->to('/');
          } catch (Exception $e) {
              return 'error';
          }
      }

}
