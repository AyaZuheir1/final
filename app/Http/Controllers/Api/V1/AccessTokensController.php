<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AccessTokensController extends Controller
{
    public function index()
    {
        if (!Auth::guard('sanctum')->user()->tokenCan('classroom.read')) {
            abort(403, 'Sorry, you do not have authrization');
        }
        return Auth::guard('sanctum')->user()->tokens;
    }
    public function store(Request $request, $guard)
    {
        $request->validate([
            'email' => 'sometimes | required | email',
            'username' => 'sometimes | required | string',
            'password' => 'required',
            'device_name' => 'sometimes | required',
            // 'abilities' => 'array',
        ]);
        // $guard =  strtolower(route('guard'));
        // dd($guard);
        $name = $request->post('device_name', $request->userAgent());

        if($guard == 'admin'){
            $admin = Admin::where('username',$request->username)->first();
            if($admin && Hash::check($request->password, $admin->password)){
                $token = $admin->createToken($name, ['*'], now()->addDays(30));
                return Response::json([
                    'token' => $token->plainTextToken,
                    'admin' => $admin,
                ]);
            }
        }else{
        $user = User::whereEmail($request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($name, ['*'], now()->addDays(30));
            return Response::json([
                'token' => $token->plainTextToken,
                'user' => $user,
            ]);
        }
    }
        return Response::json(['msg' => 'Invalid credentials']);
    }
    public function destroy($id = null)
    {
        $user = Auth::guard('sanctum')->user();

        if ($id) {
            if ($id == 'current') {
                $user->currentAccessToken()->delete();
            } else {
                $user->tokens()->findOrFail($id)->delete();
            }
        } else {
            $user->tokens()->delete();
        }
    }
}
