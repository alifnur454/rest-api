<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengurangansaldoController extends Controller
{
    public function index()
    {
        $pengurangan_saldo = DB::table('pengurangan_saldo')->get();
        $data['pengurangan_saldo']=$pengurangan_saldo;
        return json_encode($data);
    }

    public function search($id)
    {
        $pengurangan_saldo = DB::table('pengurangan_saldo')->where('id',$id)->get();
        $data['pengurangan_saldo']=$pengurangan_saldo;
        return json_encode($data);
    }

    public function aw($tanggal)
    {
        $pengurangan_saldo = DB::table('pengurangan_saldo')->where('tanggal', 'LIKE' , '%'.$tanggal.'%')->get();
        $data['pengurangan_saldo']=$pengurangan_saldo;
        return json_encode($data);
    }

    public function create(Request $request)
    {
        DB::table('pengurangan_saldo')->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function update(Request $request ,$id)
    {
        DB::table('pengurangan_saldo')->where('pengurangan_saldo.id', $id )->update($request->all());
        $berhasil = DB::table('pengurangan_saldo')->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function delete($id)
    {
        DB::update ('update pengurangan_saldo set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update pengurangan_saldo set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }
}
