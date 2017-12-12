<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
  /**
   * @param Request $request
   * @return mixed
   */
  public function authenticate(Request $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      // Authentication passed...
      $response = array(
          'status' => true,
          'msg' => 'Wellcome, '.Auth::user()->name.'!'
      );
    } else {
      $response = array(
          'status' => false,
          'msg' => 'Auth fail!',
      );
    }

    return Response::json($response);
  }

  /**
   * @param Request $request
   */
  public function register(Request $request)
  {
    $validator = $this->validator($request->all());

    if ($validator->fails()) {
      return Response::json([
        'status' => false,
        'request' => $request,
        'validator' => $validator
      ]);
    }

    $this->create($request->all());
    $this->authenticate($request);

    return Response::json([
      'status' => true,
      'msg' => 'Register success'
    ]);
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
        'name' => 'required|max:255|unique:users',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:2',
    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  protected function create(array $data)
  {
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);
  }

  public function logout() {
    Auth::logout();
    return redirect()->back();
  }
}
