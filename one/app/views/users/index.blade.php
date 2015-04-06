@extends('layouts.basic')

@section('maincontent')

    <h1>Users</h1>

    @if($users->count() > 0)

        @foreach($users as $u)

            <li>{{$u->emailaddress . " " . $u->password}}</li>

        @endforeach

    @else

        <p>No users to show.</p>

    @endif

@stop