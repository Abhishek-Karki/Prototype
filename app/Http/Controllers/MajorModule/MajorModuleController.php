<?php

namespace App\Http\Controllers\MajorModule;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Major;
use App\MajorModule;
use App\Module;
use Illuminate\Http\Request;
use Session;

class MajorModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $majormodule = MajorModule::where('major_id', 'LIKE', "%$keyword%")
				->orWhere('module_id', 'LIKE', "%$keyword%")

                ->paginate($perPage);
        } else {
            $majormodule = MajorModule::paginate($perPage);
        }

        return view('major-module.index', compact('majormodule'));
    }

    public function majorModules($id){
        $major = Major::where('id', '=', "$id")->paginate(10);

        echo $major->modules;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        //echo $modules;
        return view('major-module.create', compact('modules'));
    }

    public function createMajorModules(Request $request,$id){
       //echo $id;
        $major = Major::find($id);
        $modules = Module::pluck('name','id');
        //echo $modules;
        return view('major-module.create', compact('modules','major'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        MajorModule::create($requestData);

        Session::flash('flash_message', 'MajorModule added!');

        return redirect('major-module/'.$request->get('major_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
/*        $majormodule = MajorModule::findOrFail($id);

        return view('major-module.show', compact('majormodule'));*/
        $major = Major::find($id);
        $modules = $major->modules;
        //echo $major;
        return view('major-module.show', compact('major','modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $majorId = Major::find($id);
        $majormodule = MajorModule::where('major-id', '=', "$majorId");

        return view('major-module.edit', compact('majormodule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $majormodule = MajorModule::findOrFail($id);
        $majormodule->update($requestData);

        Session::flash('flash_message', 'MajorModule updated!');

        return redirect('major-module');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MajorModule::destroy($id);

        Session::flash('flash_message', 'MajorModule deleted!');

        return redirect('major-module');
    }

    public function customDestroy(Request $request, $majorId, $moduleId){
        // echo memberId;
//        echo "$majorId" . " $moduleId";
        $majorModuleId = MajorModule::where('major_id', '=', "$majorId")
            ->where('module_id', '=', "$moduleId")->get();//->id;
        $this->destroy($majorModuleId[0]->id);
    }
}
