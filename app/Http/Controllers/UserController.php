<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepository;
use Cloudder;
use Exception;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\RegisterRequest;
use Auth;
use Response;
use App\Models\User;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->paginate(trans('common.limit'));

        return view('admin.user.index', compact('users'));
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->showById($id);
        return view('user.profile', compact('user'));
    }
    
    public function edit($id)
    {
        $user = $this->userRepository->showById($id);

        return view('user.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $user = $this->userRepository->showById($id);

            if ($request->hasFile('avatar')) {
                $filename = $request->avatar;
                Cloudder::upload($filename, config('common.path_cloud_avatar')."$user->name");
                $user->avatar = Cloudder::getResult()['url'];
            }
            $user->name = $request->get('name', '');
            $user->address = $request->get('address', '');
            $user->phone = $request->get('phone', '');
            $user->email = $request->get('email', '');
            $user->save();
            
        } catch (Exception $ex) {
            return redirect()->route('users.edit')->withError($ex->getMessage());
        }
        return redirect()->route('users.show', $id)->with(['message' => trans('message.update_successfully')]);
    }

    public function login(UserLoginRequest $request)
    {
        if ($request->ajax()) {
            $auth = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (Auth::attempt($auth)) {
                return Response::json(['success' => true, 'url' => route(Auth::user()->isAdmin() ? 'admin' : 'home')]);
            }

            return Response::json(['success' => false, 'messages' => trans('settings.login_error')]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function register(RegisterRequest $request)
    {
        if ($request->ajax()) {
            $userRegister = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];

            $authUser = User::create($userRegister);
            Auth::login($authUser);

            return Response::json(['success' => true, 'url' => route('home')]);
        }
    }
}