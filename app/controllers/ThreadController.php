<?php
class ThreadController extends BaseController {
    
public function __construct()
    {
        $this->beforeFilter('auth', array('only' => array('getNew', 'getMythreads', 'getMycomments')));
        $this->beforeFilter('admin', array('only' => array('postDelete')));
    }
    
public function getIndex()
    {
        $categories = Category::all();
        return View::make('threads', array('categories' => $categories, 'threads' => 'threadsRecent', 'action'=> 'View all'));
    }

public function getCategory($category_id)
    {
        $category = array(Category::findOrFail($category_id));
        
        return View::make('threads', array('categories' => $category, 'threads' => 'threads', 'action'=> 'Back'));
    }
   
public function getNew($category_id) 
{
    $category = Category::findOrFail($category_id);
    return View::make('thread_add', array('category'=>$category));
    
}
public function postNew($category_id) 
{
     $data = Input::all();
     $category = Category::findOrFail($category_id);
    
        $rules = $rules = array(
            'title' => 'required|max:30',
            'comment' => 'required|max:500',
            'image'=> 'required|image|max:500'
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            $image = Input::file('image');
            $fileName = $image->getClientOriginalName();
            $destinationPath = asset('thread_images/');
            
            $thread = new Thread();
            $thread->title = $data['title'];
            $thread->comment = $data['comment'];
            $thread->picture = $fileName;
            $thread->user()->associate(Auth::user());
            $thread->category()->associate($category);
            $thread->save();
            
            $image->move(public_path().'/thread_images/', "$thread->id.jpg");
                  
            return Redirect::to('threads/category/'.$category_id)->withMessage('Thread added!');
        }
        
        return Redirect::to('threads/new/'.$category_id)->withErrors($validator);
}

public function getMythreads() 
{
    $threads = Auth::user()->threads;
    return View::make('my_threads', array('threads'=>$threads));    
}
public function getMycomments() 
{
    $comments = Auth::user()->comments;
    return View::make('my_comments', array('comments'=>$comments));    
}
public function getView($thread_id)
{
    $thread = Thread::findOrFail($thread_id);
    
    return View::make('thread_view', array('thread'=>$thread));
}

public function postComment($thread_id)
{
    $thread= Thread::findOrFail($thread_id);
    $data = Input::all();
    $username=$thread->user->username;
    
        $rules = $rules = array(
            'comment' => 'required|max:500',
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            $comment = new Comment();
            $comment->comment= $data['comment'];
            $comment->user()->associate(Auth::user());
            $comment->thread()->associate($thread);
            $comment->save();
            
            $thread= Thread::findOrFail($thread_id);
            
            if($thread->user->isNotified() && Auth::user()!=$thread->user){
            Mail::send('emails.comment', array('username'=>$username, 'path'=>url('threads/view', $thread_id)), function($message) use ($thread)
                 {
                 $message->to($thread->user->email)->subject('You have got a new reply!');
                 });
            }
         
            return Redirect::to('threads/view/'.$thread_id)->withMessage('Comment added!');
        }
        
        return Redirect::to('threads/view/'.$thread_id)->withErrors($validator);
}
public function getSearch()
{
    return View::make('search');
}
 public function postSearch() {
     
     $threads=Thread::where('title', 'LIKE', '%'.Input::get('search').'%');
    return View::make('search', array('threads'=>$threads));

    }
public function postDelete($thread_id) {
        $thread= Thread::findOrFail($thread_id);
        $thread->delete();
        return Redirect::back()->withMessage('Thread has been successfully deleted!');
}

public function postDeletecomment($comment_id) {
        $comment= Comment::findOrFail($comment_id);
        $comment->delete();
        return Redirect::back()->withMessage('Comment has been successfully deleted!');
}
}
