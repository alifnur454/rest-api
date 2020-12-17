<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Pengaturan_umumController extends Controller
{
    public function index()
    {
        $pengaturan_umum = DB::table('pengaturan_umum')->get();
        $data['pengaturan_umum']=$pengaturan_umum;
        return json_encode($data);
    }

    public function search($id)
    {
        $pengaturan_umum = DB::table('pengaturan_umum')->where('id',$id)->get();
        $data['pengaturan_umum']=$pengaturan_umum;
        return json_encode($data);
    }

    public function aw($nama_usaha)
    {
        $pengaturan_umum = DB::table('pengaturan_umum')->where('nama_usaha', 'LIKE' , '%'.$nama_usaha.'%')->get();
        $data['pengaturan_umum']=$pengaturan_umum;
        return json_encode($data);
    }

    public function create(Request $request)
    {
        DB::table('pengaturan_umum')->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function update(Request $request ,$id)
    {
        DB::table('pengaturan_umum')->where('pengaturan_umum.id', $id )->update($request->all());
        $berhasil = DB::table('pengaturan_umum')->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function delete($id)
    {
        DB::update ('update pengaturan_umum set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update pengaturan_umum set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }
}
