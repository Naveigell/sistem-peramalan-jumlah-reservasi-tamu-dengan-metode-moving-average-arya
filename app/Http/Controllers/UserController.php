<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserResetRequest;
use Yajra\DataTables\Facades\DataTables;
use Facades\App\Repositories\RoleRepository;
use App\Http\Requests\Masters\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('users.index')->with('status', 'Data Has Been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        return redirect()->route('users.index')->with('status', 'Data Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('status', 'Data Has Been Deleted');
    }

    public function dataTable(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')
                    ->get();

        $datatables = DataTables::of($users);

        return $datatables->addcolumn('no', 'x')
                        ->addcolumn('action','
                            <a title="Ubah Data" href="{!! route("users.edit", ["user" => $id]) !!}"><span class="btn btn-sm btn-info"><span class="fas fa-edit"></span> Ubah</span></a>
                             | 
                            <a  title="Hapus Data" class="del" href="#" onclick="delData(\'#form-del-{{ $id }}\')">
                                <span class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Hapus</span>
                            </a>
                            <form id="form-del-{{ $id }}" action="{{ route("users.destroy", ["user" => $id]) }}" method="POST" style="display: none" class="form-del">
                                @csrf
                                @method("DELETE")
                            </form>
                            ')
                        ->rawColumns(['action'])
                        ->make(true);
    }

    public function getReset()
    {
        return view('users.reset');
    }

    public function postReset(UserResetRequest $request)
    {
        if (Auth::attempt(['email' => auth()->user()->email, 'password' => $request->old_password])) {
            $user = User::findOrFail(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('status', 'Password Success Reset');
        }
        else {
            return redirect()->back()->with('error', 'Old Password Not Match');
        }
    }

    public function getLocation()
    {
        $locations = Location::pluck('name', 'id')->toArray();
        return view('users.location', compact('locations'));
    }

    public function postLocation(Request $request)
    {
        $user = auth()->user();
        $user->location_id = $request->location_id;
        $user->save();
        return redirect()->route('dashboard')->with('status', 'Berhasil Mengubah Kelompok');
    }
}