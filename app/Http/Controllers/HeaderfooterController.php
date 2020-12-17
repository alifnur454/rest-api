<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HeaderfooterController extends Controller
{
    public function index()
    {
        $headerfooter = DB::table('headerfooter')->get();
        $data['headerfooter']=$headerfooter;
        return json_encode($data);
    }

    public function search($id)
    {
        $headerfooter = DB::table('headerfooter')->where('id',$id)->get();
        $data['headerfooter']=$headerfooter;
        return json_encode($data);
    }

    public function aw($header_invoice)
    {
        $headerfooter = DB::table('headerfooter')->where('header_invoice', 'LIKE' , '%'.$header_invoice.'%')->get();
        $data['headerfooter']=$headerfooter;
        return json_encode($data);
    }

    public function create(Request $request)
    {
        DB::table('headerfooter')->insert($request->all());
        $berhasil = ['Berhasil Menambahkan'];
        return json_encode($berhasil);
    }

    public function update(Request $request ,$id)
    {
        DB::table('headerfooter')->where('headerfooter.id', $id )->update($request->all());
        $berhasil = DB::table('headerfooter')->where( 'id', $id )->get();
        return json_encode('berhasil mengubah ' . $berhasil);
    }

    public function delete($id)
    {
        DB::update ('update headerfooter set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dihapus'];
        return json_encode($berhasil);
    }

    public function restore($id)
    {
        DB::update ('update headerfooter set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' Berhasil Dikembalikan'];
        return json_encode($berhasil);
    }
}
