@extends('layouts.basic')

@section('maincontent')

    <h1>Create a New User</h1>

    {{Form::open(['route'=>'users.store'])}}

    <div>

        {{Form::label('emailaddress', 'Email Address: ')}}

        {{Form::text('emailaddress')}}
        {{$errors->first('emailaddress', '<span class="error">:message<span>')}}

    </div>

    <div>

        {{Form::label('password', 'Password(2-30 chars): ')}}

        {{Form::text('password')}}
        {{$errors->first('password', '<span class="error">:message<span>')}}

    </div>

    <div>

        {{Form::label('confirm', 'Confirm password: ')}}

        {{Form::text('confirm')}}
        {{$errors->first('confirm', '<span class="error">:message<span>')}}

    </div>

    <div>

        {{Form::label('captcha', 'Type this!: ')}}
        {{HTML::image(Captcha::img(), 'Captcha image')}}
        {{Form::text('captcha')}}
        {{$errors->first('captcha', '<span class="error">:message<span>')}}

    </div>

    <div>

        {{Form::submit('Create User')}}

    </div>

    {{Form::close()}}

@stop

