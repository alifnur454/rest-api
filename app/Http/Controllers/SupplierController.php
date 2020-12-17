<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $supplier = DB::table('supplier')->get();
        $data['supplier']=$supplier;
        return json_encode($data);
    }

    public function search($id)
    {
        $supplier = DB::table('supplier')->where('id',$id)->get();
        $data['supplier']=$supplier;
        return json_encode($data);
    }

    public function aw($nama_lengkap)
    {
        $supplier = DB::table('supplier')->where('nama_lengkap', 'LIKE' , '%'.$nama_lengkap.'%')->get();
        $data['supplier']=$supplier;
        return json_encode($data);
    }

    public function create(Request $request)
    {
        DB::table('supplier')->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function update(Request $request ,$id)
    {
        DB::table('supplier')->where('supplier.id', $id )->update($request->all());
        $berhasil = DB::table('supplier')->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function delete($id)
    {
        DB::update ('update supplier set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update supplier set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }
}
