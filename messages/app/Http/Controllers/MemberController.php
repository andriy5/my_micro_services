<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller {

  public function showAllMembers()
  {
      return response()->json(Member::all());
  }

  /**
   * Register a new Member (⚠ without jwt verification ⚠)
   * 
   * @param Request $request
   * @return Response
   */
  public function registerMember(Request $request) {
    $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|email|unique:members',
      'password' => 'required|between:8,255',
    ]);

    try {

      $user = new Member;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $plainPassword = $request->input('password');
      $user->password = app('hash')->make($plainPassword);

      $user->save();

      //return successful response
      return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

    } catch (\Exception $e) {
        //return error message
        return response()->json(['message' => 'User Registration Failed!'], 409);
    }
  }

  /**
   * Connect a Member
   * 
   * @param Request $request
   * @return Response
   */
  public function loginMember(Request $request) {
    $this->validate($request, [
      'email' => 'required|string',
      'password' => 'required|string',
    ]);

    
    $credentials = $request->only(['email', 'password']);
    
    // return "test";
    $token = Auth::attempt($credentials);
    // var_dump($credentials);
    // return "test";
    // if (! $token = Auth::attempt($credentials)) {
    //   // return "test";
    //   return response()->json(['message' => 'Unauthorized'], 401);
    // }

    return $this->respondWithToken($token);
  }
}