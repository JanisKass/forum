@extends('main')
@section('content')

<div class="pure-u-1">
@foreach($errors->all() as $message)
<p class="error_msg">{{ $message }}</p>
@endforeach

@foreach ( $categories as $category )

<div class="pure-menu pure-menu-open pure-menu-horizontal" id="category-menu">
    <a href="{{{ url('threads/category', $category->id) }}}" class="pure-menu-heading">{{{ $category->name }}}</a>

    <ul>
        @if(Request::url() === 'http://forum.dev/threads')
        <li><a href="{{{ url('threads/category', $category->id) }}}">{{{$action}}}</a></li>
        @else
        <li><a href="/threads">{{{$action}}}</a></li>
        @endif
        <li><a href="{{{ url('threads/new', $category->id) }}}">+ New thread</a></li>
    </ul>
</div>

@foreach ($category->$threads as $thread )
    
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
               
                <li><a href="{{{ url('threads/view', $thread->id) }}}" class="pure-button" >View</a></li>     
                @if(Auth::user())
                <li><a href="{{{ url('threads/view', $thread->id) }}} #comment" class="pure-button">Reply</a></li>
                @endif 
                @if($thread->comments()->count()==1)
                <li style="font-size:12px">{{{$thread->comments()->count()}}} comment </li>
                @else 
                <li style="font-size:12px">{{{$thread->comments()->count()}}} comments</li>
                @endif
                 @if ( Auth::user() and Auth::user()->isAdmin() )
                 <li>
                 {{Form::open(array('url' => url('threads/delete', $thread->id)))}}
                 {{Form::submit('Delete', $attributes=array('type'=>'submit', 'class'=>'pure-button', 'id'=>'admin-button'))}}
                 {{ Form::close() }}
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
@endforeach

</div>

@stop


