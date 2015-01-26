@extends('main')
@section('content')

<h3>Search for threads:</h3>
<div class="pure-u-1">
    {{Form::open(array('url'=>'threads/search', 'class'=>'pure-form pure-form-aligned pure-u-1'))}}
    {{ Form::text('search') }}
    {{ Form::submit('Search', $attributes=array('type'=>'submit', 'class'=>'pure-button pure-button-primary'))}}
    {{Form::hidden('yes','', array('name'=>'searching', 'value'=>'yes') )}}
    {{Form::close()}}
    </div>

@if (isset($threads))
@foreach($threads as $thread )
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
                <li><a href="{{{ url('threads/view', $thread->id) }}}" class="pure-button">View</a></li>     
                @if(Auth::user())
                <li><a href="{{{ url('threads/view', $thread->id) }}} #comment" class="pure-button">Reply</a></li>
                 @endif 
                 @if($thread->comments()->count()==1)
                <li style="font-size:12px">{{{$thread->comments()->count()}}} comment</small></li>
                @else 
                <li style="font-size:12px">{{{$thread->comments()->count()}}} comments</small></li>
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
 
@endforeach
@endif
 

@stop