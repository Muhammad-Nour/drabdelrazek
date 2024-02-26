<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use DB;
use Hash;



class AdminController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:users', ['only' => ['index']]);
        $this->middleware('permission:add_users', ['only' => ['create','store']]);
        $this->middleware('permission:edit_users', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_users', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $admins = Admin::orderBy('id','ASC')->paginate(5);
        return view('admin.admins.index',compact('admins'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('admin.admins.admin-create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $input = $request->validated();

        $input['password'] = Hash::make($input['password']);

        $admin = Admin::create($input);
        
        $admin->assignRole($request->input('roles_name'));

        return redirect()->back()->withInput()->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admins.show',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::pluck('name','name')->all();
        $adminRole = $admin->roles->pluck('name','name')->all();
        return view('admin.admins.admin-edit',compact('admin','roles','adminRole'));
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

        $input = $request->all();

        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
        
        $admin = Admin::find($id);
        
        $admin->update($input);
 
        $admin->syncRoles($request->input('roles_name'));
        
        return redirect(route('admins.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::find($id)->delete();
        $admins = Admin::orderBy('id','ASC')->paginate(5);
        return redirect(route('admins.index'))->with('msg',__('site.deletedMessage'));
    }
}
