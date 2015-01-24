@extends('main')
@section('content')

<div class="pure-u-1">
<div class="pure-menu pure-menu-open pure-menu-horizontal">
    <a href="user" class="pure-menu-heading">{{{ Auth::user()->username }}}</a>

    <ul>
        <li><a href="/user">Back</a></li> 
    </ul>
</div>
    
    <h1>My threads</h1>
@foreach ($threads as $thread )
    
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

</div>

@stop


