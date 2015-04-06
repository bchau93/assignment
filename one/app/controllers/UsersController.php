<?php

class UsersController extends \BaseController
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return View::make("users/index", ['users' => $this->user->all()]);
    }

    public function create()
    {
        return View::make('users.create');
    }

    public function store()
    {
        $input = Input::all();

        $this->user->fill($input);

        $this->user->emailaddress = Input::get('emailaddress');
        $this->user->password = Input::get('password');
        $this->user->confirm = Input::get('confirm');
        //$this->user->captcha = Input::get('captcha');

        if (!($this->user->isValid())) {

            return Redirect::back()->withInput()->withErrors($this->user->messages);

        }// else if ($this->user->password == $confirm) {

            $this->user->password = Hash::make(Input::get('password'));
            $this->user->save();

            return Redirect::route('users.index');

        //}
    }

    public function show($id)

    {

        return View::make('users.show',

            ['u'=>$this->user->whereId($id)->first()]);

    }

}