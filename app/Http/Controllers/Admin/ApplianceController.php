<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ApplianceRepository;
use App\Models\Appliance;

class ApplianceController extends Controller
{
    private $appRepository;

    public function __construct(ApplianceRepository $appRepository)
    {
        $this->appRepository = $appRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = $this->appRepository->paginate(trans('common.limit'));

        return view('appliance.index', compact('apps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('appliance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app['name'] = $request->name;
        $app['status'] = $request->status;
        $app['electric_value'] = $request->electric_value;
        try {
            $data = $this->appRepository->store($app);
            return redirect()->route('admin.appliances.index');
        } catch (Exception $e) {
            return redirect()->route('admin.appliances.index')->withError($e->getMessage());
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
        $app = $this->appRepository->showById($id);

        return view('appliance.edit', compact('app'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestOnly = $request->only('name', 'status', 'electric_value');
        $this->appRepository->updateById($requestOnly, $id);

        return redirect()->route('admin.appliances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         try {
            $data = $this->appRepository->deleteById($id);
        } catch (Exception $e) {
            return redirect()->route('admin.appliances.index')->withError($e->getMessage());
        }

        return redirect()->route('admin.appliances.index');
    }
}
