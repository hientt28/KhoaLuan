<?php

namespace App\Http\Controllers;

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
        $this->appRepository->store($app);

        return redirect()->route('appliances.index');
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

        return redirect()->route('appliances.index');
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
            return redirect()->route('appliances.index')->withError($e->getMessage());
        }

        return redirect()->route('appliances.index');
    }

    // public function importExcel(Request $request)
    // {
    //     if ($request->hasFile('fileCategory')) {
    //         $path = $request->file('fileCategory')->getRealPath();
    //         $categoryExcel = Excel::load($path)->get();
    //         if (!empty($categoryExcel) && $categoryExcel->count()) {
    //             foreach ($categoryExcel as $key => $value) {
    //                 $insert[] = ['name' => $value->name, 'parent_id' => $value->parent_id];
    //             }
    //             if (!empty($insert)) {
    //                 $this->categoryRepository->insert($insert);
    //             }
    //         }
    //     }
    //     return redirect()->route('admin.categories.index');
    // }

    // public function downloadExcel($type)
    // {
    //     $data  = Category::get()->toArray();

    //     return Excel::create('fileDownloadCategory', function ($excel) use ($data) {
    //         $excel->sheet('mySheet', function ($sheet) use ($data) {
    //             $sheet->fromArray($data);
    //         });
    //     })->download($type);
    // }
}
