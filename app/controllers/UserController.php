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
            if(isset($data['picture']))
            $image = Input::file('image');
            $destinationPath = asset('prof_images/');
            
            
            $user = new User();
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            if(isset($data['picture'])){
            $user->picture = true;
            }
            
            $user->save();
             if(isset($data['picture'])){
            $image->move($destinationPath, "$user->id.jpg");
             }
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
        
          $picture=asset(Auth::user()->images()['asset_path'].Auth::user()->images()['image']);
             
        
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
            $user->picture = true;
            $user -> save();
            $image->move("c:/wamp/www/forum/public/prof_images/","$user->id.jpg");
        
        
         return Redirect::to('user')->withMessage('Your picture has been changed!');
        }
        
        return Redirect::to('user')->withErrors($validator);
    }
    
    public function postChangemail(){

        $user= Auth::user();
        $data = Input::all();
        $rules = $rules = array(
            'email' => 'required|email|unique:users,email'
        );
         $validator = Validator::make($data, $rules);
         
        if ($validator->passes())
        {
            $user->email = $data['email'];
            $user->save();
             
         return Redirect::to('user')->withMessage('Your email has been changed!');
        }
        
        return Redirect::to('user')->withErrors($validator);
    }
    
    public function postNotify(){

        $user= Auth::user();
        $data = Input::all();
         if(isset($data['notification'])){
            $user->notification = true;
            $user->save();
         }
         else{
            $user->notification = false;
            $user->save();
         }
         return Redirect::to('user')->withMessage('Your notification settings have been changed!');
   
    }
}