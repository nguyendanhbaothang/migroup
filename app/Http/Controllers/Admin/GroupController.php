<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',Group::class);
        $groups = Group::paginate(4);
        $users= User::get();
        $param = [
            'groups' => $groups,
            'users' => $users
        ];
        return view('admin.group.index', $param );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Group::class);
        return view('admin.group.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
        $group=new Group();
        $group->name=$request->name;
        $group->save();
        alert()->success('Thêm tên quyền','thành công');
        return redirect()->route('group.index');
    } catch (\Exception) {
        alert()->success('Thêm tên quyền','thất bại');
        return redirect()->route('group.index');
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
        $this->authorize('update',Group::class);
        $group = Group::find($id);
        return view('admin.group.edit', compact('group') );
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
        try {
        $group = Group::find($id);
        $group->name = $request->name;
        $group->save();
        alert()->success('Sửa tên quyền','thành công');
        return redirect()->route('group.index');
    } catch (\Exception) {
        alert()->success('Sửa tên quyền','thất bại');
        return redirect()->route('group.index');
    }
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
        $this->authorize('delete',Group::class);
        Group::find($id)->delete();
        alert()->success('Xóa tên quyền','thành công');
        return redirect()->route('group.index');
    } catch (\Exception) {
        alert()->success('Xóa tên quyền','thất bại');
        return redirect()->route('group.index');
    }
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $group=Group::find($id);

        $current_user = Auth::user();
        $userRoles = $group->roles->pluck('id', 'name')->toArray();
        // dd($userRoles);
        $roles = Role::all()->toArray();
        $group_names = [];
        /////lấy tên nhóm quyền
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'userRoles' => $userRoles,
            'roles' => $roles,
            'group_names' => $group_names,
        ];
        return view('admin.group.detail',$params);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function group_detail(Request $request,$id)
    {

        $group= Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);
        alert()->success('Cấp quyền','thành công');
        return redirect()->route('group.index');
    }
}
