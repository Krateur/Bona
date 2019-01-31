<?php

namespace App\Http\Controllers\Admin;

use App\Navbar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class navbarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $names = Navbar::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.navbar.index', compact('names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.navbar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',
            'image' => 'required|image'
        ]);
        $name = new Navbar();
        $name->name = $request->get('name');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('image/' .$filename);
            Image::make($image)->resize(1600, 691)->save($location);
            $name->image = $filename;
        }
        $name->save();
        Session::flash('success', 'The blog post has successfully saved');
        return redirect()->route('admin.navbar.index');
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
        $name = Navbar::find($id);
        return view('admin.navbar.edit', compact('name'));
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
        $this->validate($request, [
            'name' => 'required|max:10',
            'image' => 'required|image'
        ]);
        $name = Navbar::find($id);
        $name->name = $request->get('name');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('image/' .$filename);
            Image::make($image)->resize(1600, 691)->save($location);
            $name->image = $filename;
        }
        $name->save();
        Session::flash('success', 'The blog post has successfully updated');
        return redirect()->route('admin.navbar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = Navbar::find($id);
        $name->delete();
        Session::flash('success', 'The blog post has successfully deleted');
        return redirect()->route('admin.navbar.index');
    }
}
