@extends('main')
@section('content')

<div class="pure-u-1">

@foreach ( $categories as $category )

<div class="pure-menu pure-menu-open pure-menu-horizontal">
    <a href="{{{ url('threads/category', $category->id) }}}" class="pure-menu-heading">{{{ $category->name }}}</a>

    <ul>
        @if(Request::url() === 'http://forum.dev/threads')
        <li><a href="{{{ url('threads/category', $category->id) }}}">{{{$action}}}</a></li>
        @else
        <li><a href="/threads">{{{$action}}}</a></li>
        @endif
        <li><a href="{{{ url('threads/category', $category->id, '/new') }}}">+ New thread</a></li>
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
            
                <p><strong>{{{$thread->title}}}</strong></p> 
                <p>{{{$thread->comment}}}</p>
              <ul class="inline-list">
                <li><a href="" class="pure-button">View</a></li>     
                @if(Auth::user())
                <li><a href="" class="pure-button">Reply</a></li>
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


