@extends('main')
@section('content')

@foreach($errors->all() as $message)
<p class="error_msg">{{ $message }}</p>
@endforeach

<div class="pure-menu pure-menu-open pure-menu-horizontal pure-u-1" id="category-menu">
    <ul >
        <li><a href="user">My profile</a></li>
        <li><a href="{{{url('threads/mythreads')}}}">My threads</a></li>
        <li><a href="threads/mycomments">My comments</a></li>     
    </ul>
</div>


<h3>Your Profile Information </h3>

<div class="pure-u-1 large-12 columns">
    <table class="pure-table pure-table-horizontal pure-u-1 " id="picture-table">
        <tr class="pure-u-1-1">
      <td style="width:25%;">
        <img src="{{{ $picture }}}" class="pure-img"/>
    </td>
    
    <td>
        {{ Form::open(array('url'=>'user/change', 'files' => true, 'class'=>'pure-form-aligned'))}}
        <fieldset>
        <div class="pure-control-group">
        {{ Form::label('image', 'Change your picture') }}
        {{ Form::file('image') }}
        </div>
            <div class="pure-control-group">   
        {{ Form::submit('Change', $attributes=array('type'=>'submit', 'class'=>'pure-button pure-button-primary'))}}
            </div> 
       </fieldset>
        {{ Form::close() }}
    </td>
  </tr>
  </table>
</div>

<div class="pure-u-1 large-12 columns">
    <table class="pure-table pure-table-horizontal profile-table pure-u-1" id="profile-table">  
    <tbody class="pure-u-1 ">
        <tr class="pure-u-1 ">
            <td style="">Username:</td>
            <td style="">{{{Auth::user()->username}}}</td>
    
  </tr>
  <tr>
    <td style="">Email:</td>
    {{ Form::open(array('url'=>'user/changemail', 'class'=>'pure-form'))}}
    <td style="">{{ Form::email('email',Auth::user()->email , array('placeholder'=>Auth::user()->email))}}</td>
    <td>{{ Form::submit('Change', $attributes=array('type'=>'submit', 'class'=>'pure-button'))}}</td>{{ Form::close() }}
    <td>
    @if (Auth::user()->isNotified())
    {{Form::open(array('url'=>'user/notify', 'class'=>'pure-form'))}}
    {{Form::checkbox('notification', '', array('checked'=>'checked'))}} 
    @else
    {{Form::open(array('url'=>'user/notify', 'class'=>'pure-form'))}}
    {{Form::checkbox('notification')}}
    @endif
    {{ Form::label('notification', 'Send notifications to my email') }}
    {{Form::submit('Save', $attributes=array('class'=>'pure-button'))}}
    {{Form::close()}}
    </td>
  </tr>
  </tbody>
  </table>
</div>

@stop
