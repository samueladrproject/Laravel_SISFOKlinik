<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $initTable = User::join('role_groups_user', 'role_groups_user.id_user', '=', 'users.id')
            ->join('role_table', 'role_table.id_role', '=', 'role_groups_user.id_role');
        $resultFetch = $initTable->get()->toArray();
        $datas = [
            'titlePage' => 'Data User',
            'dataUser' => $resultFetch
        ];
        return view('pages.datamaster.datauser.index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $namaUser = DataPegawai::all();
        $role = DB::table('role_table')->get();
        $datas = [
            'titlePage' => 'Data User',
            'namaUser' => $namaUser,
            'roleName' => $role
        ];
        return view('pages.datamaster.datauser.create', $datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateReq = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'namauser' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        $dataUser = User::create([
            'name' => $validateReq['namauser'],
            'username' => $validateReq['username'],
            'email' => $validateReq['email'],
            'password' => Hash::make($validateReq['password'])
        ]);

        if ($dataUser) {
            $groupsPermission = DB::table('role_groups_user')->insert(
                array(
                    'id_user' => $dataUser->id,
                    'id_role' => $validateReq['role'],
                    'created_at' => Carbon::now()
                )
            );

            if ($groupsPermission) {
                //redirect dengan pesan sukses
                return redirect()->route('data-user.index')->with(['success' => 'Data Berhasil Disimpan!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('data-user.index')->with(['error' => 'Data Gagal Disimpan!']);
            }
        } else {
            return redirect()->route('data-user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($data_user)
    {
        $idUser = $data_user;

        $userDatabase = User::join('role_groups_user', 'role_groups_user.id_user', '=', 'users.id')
            ->where('users.id', $idUser)
            ->get()
            ->toArray()[0];

        $namaUser = DataPegawai::all();
        $role = DB::table('role_table')->get();

        $datas = [
            'titlePage' => 'Data User',
            'namaUser' => $namaUser,
            'roleName' => $role,
            'savedData' => $userDatabase
        ];

        return view('pages.datamaster.datauser.edit', $datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data_user, User $user)
    {
        $userDatabase = User::join('role_groups_user', 'role_groups_user.id_user', '=', 'users.id')
            ->where('users.id', $data_user)
            ->get()
            ->toArray()[0];

        $validateReq = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);

        if ($userDatabase['password'] == $validateReq['password']) {
            $validateReq['password'] = $userDatabase['password'];
        } else {
            $validateReq['password'] = Hash::make($validateReq['password']);
        }

        $updateDataUser = User::find($data_user)->update([
            'name' => $userDatabase['name'],
            'username' => $validateReq['username'],
            'email' => $validateReq['email'],
            'password' => $validateReq['password']
        ]);

        if ($updateDataUser) {
            $groupsPermission = DB::table('role_groups_user')->where('id_user', $data_user)->update(
                array(
                    'id_role' => $validateReq['role'],
                    'updated_at' => Carbon::now()
                )
            );

            if ($groupsPermission) {
                //redirect dengan pesan sukses
                return redirect()->route('data-user.index')->with(['success' => 'Data Berhasil Diupdate!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('data-user.index')->with(['error' => 'Data Gagal Diupdate!']);
            }
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-user.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($data_user)
    {
        $deleteDataUser = User::where('id', $data_user)->delete();

        if ($deleteDataUser) {
            DB::table('role_groups_user')->where('id_user', $data_user)->delete();
            //redirect dengan pesan sukses
            return redirect()->route('data-user.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('data-user.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
