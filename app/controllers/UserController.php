<?php
class UserController extends BaseController {
    

public function getRegister()
    {
        return View::make('register');
    }
    
public function postRegister()
    {
        $data = Input::all();
        
        $rules = $rules = array(
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|confirmed',
            'image'=> 'image|max:500'
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            $image = Input::file('image');
            $fileName = $image->getClientOriginalName();
            $destinationPath = asset('prof_images/');
            
            
            $user = new User();
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->picture = $fileName;
            $user->save();
            
            $image->move($destinationPath, "$user->id.jpg");
          
            Auth::login($user);
            
            return Redirect::to('user')->withMessage('Successfully registered!');
        }
        
        return Redirect::to('user/register')->withErrors($validator);
    }
    
     public function getLogin()
    {
        return View::make('login');
    }
    
    public function postLogin()
    {
        if (!empty(Input::get('remember')))
        {
            $remember_auth = true;
        } else {
            $remember_auth = false;
        }

        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), $remember_auth))
        {
            return Redirect::intended('user')->withMessage('Successfully logged in!');
        }
        
        return Redirect::to('user/login')->withErrors(array('loginfailed' => 'Login failed!'));
    }
     public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    
    public function getIndex()
    {
        if (Auth::guest())
        {
            
            return Redirect::to('user/login');
        }
        
        if (is_null(Auth::user()->picture)){
                 $picture='https://www.statereforum.org/sites/default/files/styles/nashp_user_large/public/pictures/default_user_picture.png?itok=1l3g10WZ';
                } else 
                 {
                $picture=asset('prof_images/'.Auth::user()->id.'.jpg');
                 }
        
        return View::make('user', array('picture' => $picture));
                
    }
    public function postChange(){
        
        $user= Auth::user();
        $data = Input::all();
        $rules = $rules = array(
            'image'=> 'required|image|max:500'
        );
         $validator = Validator::make($data, $rules);
         
        if ($validator->passes())
        {
        $image = Input::file('image');
        $fileName = $image->getClientOriginalName();
        $destinationPath=asset('prof_images');
        if(isset($user->picture)){
            unlink("c:/wamp/www/forum/public/prof_images/$user->id.jpg");
        } 
            $user->picture = $fileName;
            $user -> save();
            $image->move("c:/wamp/www/forum/public/prof_images/","$user->id.jpg");
        
        
         return Redirect::to('user')->withMessage('Your picture has been changed!');
        }
        
        return Redirect::to('user')->withErrors($validator);
    }
}