<?php

namespace App\Http\Controllers\Major;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Major;
use Illuminate\Http\Request;
use Session;

class MajorsController extends Controller
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
            $majors = Major::where('name', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $majors = Major::paginate($perPage);
        }

        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('majors.create');
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
        
        Major::create($requestData);

        Session::flash('flash_message', 'Major added!');

        return redirect('majors');
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
        $major = Major::findOrFail($id);

        return view('majors.show', compact('major'));
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
        $major = Major::findOrFail($id);

        return view('majors.edit', compact('major'));
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
        
        $major = Major::findOrFail($id);
        $major->update($requestData);

        Session::flash('flash_message', 'Major updated!');

        return redirect('majors');
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
        Major::destroy($id);

        Session::flash('flash_message', 'Major deleted!');

        return redirect('majors');
    }
}
