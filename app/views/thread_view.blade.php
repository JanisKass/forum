@extends('main')
@section('content')


<div class="pure-menu pure-menu-open pure-menu-horizontal" id="category-menu">
    <a href="{{{ url('threads/category', $thread->category_id) }}}" class="pure-menu-heading">{{{ $thread->category->name }}}</a>

    <ul>
        <li><a href="{{{ url('threads/category', $thread->category_id) }}}">Back</a></li>   
    </ul>
    
</div>
      <div class="pure-u-1">
        
        <div class="large-12 columns">
          <table class="pure-table pure-table-horizontal">
              <tr class="pure-u-1-1">
            <td>
                <div class="row">
                <div class="large-3 columns small-3 "><img src="{{ asset( $thread->images()['asset_path'].$thread->images()['image'] ) }}" /></div>
                <div class=" large-9 columns small-9">
            
                <p><strong>{{{$thread->title}}}</strong> <strong class="user">{{{$thread->user->username}}}</strong> <small><i>{{{$thread->created_at}}}</i></small></p> 
                <p>{{{$thread->comment}}}</p>
              <ul class="inline-list"> 
                @if(Auth::user())
                <li><a href="#comment" class="pure-button">Reply</a></li>
                @endif
                  @if ( Auth::user() and Auth::user()->isAdmin() )
                 <li>
                 {{Form::open(array('url' => url('threads/delete', $thread->id)))}}
                 {{Form::submit('Delete', $attributes=array('type'=>'submit', 'class'=>'pure-button', 'id'=>'admin-button'))}}
                 {{Form::close()}}
                 </li>
                 @endif
              </ul>
                </div>
                 </td>
                </tr>
                </table>
            </div>
            </div>
          
     <h3>Comments:</h3>          
          
@forelse ($thread->comments as $comment)
      <div class="pure-u-1">
        <div class="large-8 columns">
           <table class="pure-table pure-table-horizontal">
               <tr class="pure-u-1-1">
                   <td>
                       <div class="row">                          
                <div class="large-3 columns small-3"><img src="{{ asset( $comment->user->images()['asset_path'].$comment->user->images()['image'] ) }}" /></div>
                <div class="large-9 columns small-9">
                    <p ><strong class="user">{{{$comment->user->username}}} </strong><small><i>{{{$comment->created_at}}}</i></small></p> 
                <p> {{{$comment->comment}}}   
                 @if ( Auth::user() and Auth::user()->isAdmin() )
                
                 {{Form::open(array('url' => url('threads/deletecomment', $comment->id)))}}
                 {{Form::submit('Delete', $attributes=array('type'=>'submit', 'class'=>'pure-button', 'id'=>'admin-button'))}}
                 {{ Form::close()}}
                 @endif
                </p> 
                </div>
                       
                </td>
               </tr>
                </table>
              </div>
      </div> 
            
 @empty
 <div class="pure-u-1">
     <h3>No comments</h3>
 </div>               
@endforelse

@if (Auth::user())
{{ Form::open(array('url' => url('threads/comment', $thread->id), 'class'=>'pure-form pure-form-aligned pure-u-1'))}}

<fieldset class="pure-u-2-3">
   
@foreach($errors->get('comment') as $message)
<div class="error_msg">{{ $message }}</div>
@endforeach

<div class="pure-control-group">
{{ Form::label('comment', 'Comment:') }}
{{ Form::textarea('comment') }}
</div>

<div>
{{ Form::submit('Add comment', $attributes=array('type'=>'submit', 'class'=>'pure-button pure-button-primary'))}}
</div>

 </fieldset>
{{ Form::close() }}
@else
<a href="/user/login" class="pure-button pure-button-primary">Sing in to add comments!</a>
@endif


@stop


