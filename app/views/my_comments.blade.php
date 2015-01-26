@extends('main')
@section('content')

<div class="pure-u-1">
<div class="pure-menu pure-menu-open pure-menu-horizontal" id="category-menu">
    <a href="mythreads" class="pure-menu-heading">{{{ Auth::user()->username }}}</a>

    <ul>
        <li><a href="/user">Back</a></li> 
    </ul>
</div>
    
    <h3 class="pure-u-1">My comments:</h3>
    
@forelse ($comments as $comment)
    <div class="pure-u-1">
    </div>
      <div class="pure-u-1">
        <div class="large-12 columns">
           <table class="pure-table pure-table-horizontal">
               <tr class="pure-u-1-1">
                   <td>
                       <div class="row">                          
                <div class="large-3 columns small-3"><img src="{{ asset( $comment->user->images()['asset_path'].$comment->user->images()['image'] ) }}" /></div>
                <div class="large-9 columns small-9">
  
                    <p ><strong ><a href="{{{url('threads/view',$comment->thread->id)}}}" class="thread-link">{{{$comment->thread->title}}} </a></strong><small><i>{{{$comment->created_at}}}</i></small></p> 
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
</div>

@stop


