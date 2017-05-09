<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use App\Models\User;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateUserRequest;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->all();

        return view('admin.user.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $user = $request->only('name', 'email', 'role', 'password');
        $user['role'] = intval($user['role']);
        $user['avatar'] = config('common.avatar_default');
        try {
            $data = $this->userRepository->store($user);
            return redirect()->route('admin.users.index');
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->withError($e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = $this->userRepository->showById($id);
        return view('admin.user.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $request->only(['name', 'email', 'role']);
        try {
        $user =$this->userRepository->updateById($user, $id);

        return redirect()->route('admin.users.index');
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->withError($e->getMessage());
        }
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
  
        try {
            $data = $this->userRepository->deleteById($ids);
            
            return redirect()->route('admin.users.index');
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->withError($e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $term = $request->input('term');
        $user = $this->userRepository->search($term);

        return view('admin.user.index', ['user' => $user, 'search' => true]);
    }
}