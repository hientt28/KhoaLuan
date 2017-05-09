<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->paginate(trans('common.limit'));

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category['name'] = $request->name;
        $category['description'] = $request->description;
        $this->categoryRepository->store($category);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $categories = $this->categoryRepository->showById($id);
        } catch (Exception $ex) {
            return redirect()->route('categories.index')->withError($ex->getMessage());
        }

        return view('category.detail', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->showById($id);

        return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $requestOnly = $request->only('name', 'description');
        $this->categoryRepository->updateById($requestOnly, $id);

        return redirect()->route('categories.index');
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
            $data = $this->categoryRepository->deleteById($id);
        } catch (Exception $e) {
            return redirect()->route('categories.index')->withError($e->getMessage());
        }

        return redirect()->route('categories.index');
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
