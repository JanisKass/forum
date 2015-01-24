@extends('main')
@section('content')

@foreach($errors->all() as $message)
<p class="error_msg">{{ $message }}</p>
@endforeach

<div class="pure-menu pure-menu-open pure-menu-horizontal pure-u-1">
    <ul >
        <li><a href="user">My profile</a></li>
        <li><a href="{{{url('threads/user', Auth::user()->username)}}}">My threads</a></li>
        <li><a href="user/my_comments">My comments</a></li>     
    </ul>
</div>


<h3 class="pure-u-1">Your Profile Information </h3>

<div class="pure-u-1">
    <table class="pure-table pure-table-horizontal pure-u-1">
        <tr class="pure-u-1-1">
      <td>
        <img src="{{{ $picture }}}" class="pure-img"/>
    </td>
    <td >
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

<div class="pure-u-1">
    <table class="pure-table pure-table-horizontal pure-u-1">  
    <tbody class="pure-u-1">
   <tr>
    <td>Username:</td>
    <td>{{{Auth::user()->username}}}</td>
    <td></td>
    <td></td>
  </tr>
  <tr >
    <td>Email:</td>
    <td >{{{Auth::user()->email}}}</td>
    <td>{{ Form::submit('Change', $attributes=array('type'=>'submit', 'class'=>'pure-button'))}}</td>
    <td>
    @if (Auth::user()->isNotified())
    {{Form::checkbox('notification', '', array('checked'=>'checked'))}} 
    @else
    {{Form::checkbox('notification')}}
    @endif
    {{ Form::label('notification', 'Send notifications to my email') }}
    </td>
  </tr>
  </tbody>
  </table>
</div>

@stop
