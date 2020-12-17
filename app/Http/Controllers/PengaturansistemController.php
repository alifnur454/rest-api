<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengaturansistemController extends Controller
{
    public function all()
    {
        $pengaturan_sistems = DB::table('pengaturan_sistem')->get();
        $data['pengaturan_sistems']=$pengaturan_sistems;
        return json_encode($data);
    }

    public function index()
    {
        $pengaturan_sistem = DB::table('pengaturan_sistem')->select('pengaturan_cashbox.nama_akun as cashbox', 'pengaturan_sistem.cashbox_id','pengaturan_sistem.jatuh_tempo_kredit','pengaturan_sistem.nilai_pajak','pengaturan_sistem.pajak_transaksi','pengaturan_sistem.riwayat_harga_customer','pengaturan_sistem.notif_order','pengaturan_sistem.notif_chat','pengaturan_sistem.QR_code_nota_digital','pengaturan_sistem.ijinkan_jual_rugi','pengaturan_sistem.ijinkan_stock_kosong','pengaturan_sistem.ijinkan_print_sebelum_disimpan','pengaturan_sistem.edit_setelah_scan','pengaturan_sistem.berbagi_data_antrian','pengaturan_sistem.harga_dasar_dari_stock','pengaturan_sistem.produk_tampil_di_pengguna_lain','pengaturan_sistem.ukuran_gambar_produk' )->from('pengaturan_sistem')->join('pengaturan_cashbox', 'pengaturan_sistem.cashbox_id', 'pengaturan_cashbox.id')->get();
        $data['pengaturan_sistem']=$pengaturan_sistem;
        return json_encode($data);
    }


    public Function search($id)
    {
        $pengaturan_sistem = DB::table('pengaturan_sistem')->select('pengaturan_sistem.*','pengaturan_cashbox.nama_akun')->join('pengaturan_cashbox','pengaturan_cashbox.id','pengaturan_sistem.cashbox_id')->where('pengaturan_sistem.id',$id)->get();
        $data['pengaturan_sistem']=$pengaturan_sistem;
        return json_encode($data);
    }

    // public function aw($nama)
    // {
    //     $pengaturan_sistem = DB::table('pengaturan_sistem')->select('pengaturan_cashbox.nama_akun as cashbox', 'pengaturan_sistem.cashbox_id','pengaturan_sistem.jatuh_tempo_kredit','pengaturan_sistem.nilai_pajak','pengaturan_sistem.pajak_transaksi','pengaturan_sistem.riwayat_harga_customer','pengaturan_sistem.notif_order','pengaturan_sistem.notif_chat','pengaturan_sistem.QR_code_nota_digital','pengaturan_sistem.ijinkan_jual_rugi','pengaturan_sistem.ijinkan_stock_kosong','pengaturan_sistem.ijinkan_print_sebelum_disimpan','pengaturan_sistem.edit_setelah_scan','pengaturan_sistem.berbagi_data_antrian','pengaturan_sistem.harga_dasar_dari_stock','pengaturan_sistem.produk_tampil_di_pengguna_lain','pengaturan_sistem.ukuran_gambar_produk' )->from('pengaturan_sistem')->join('pengaturan_cashbox', 'pengaturan_sistem.cashbox_id', 'pengaturan_cashbox.id')->get();
    //     $data['pengaturan_sistem']=$pengaturan_sistem;
    //     return json_encode($data);
    // }

    public Function create(Request $request)
    {

        DB::table('pengaturan_sistem')->insert($request->all());
        $berhasil = ['Berhasil menambahkan produk'];
        return json_encode($berhasil);
        // DB::table('produk')->insert(array(
        //     'nama' => $nama,
        //     'kode' => $kode,
        //     'unit' => $unit,
        //     'harga_dasar' => $harga_dasar,
        //     'harga_jual' => $harga_jual,
        //     'keterangan' => $keterangan,
        //     'berat' => $berat,
        //     'status_olshop' => $status_olshop,
        //     'status_penjualan' => $status_penjualan,
        //     'status_pembelian' => $status_pembelian,
        //     'kategori_id' => $kategori_id,
        //     'total_stock' => $total_stock
        // ));
        // $berhasil = ['Berhasil menambahkan',$nama];
        // return json_encode($berhasil);
    }

    public Function update(Request $request,$id)
    {
        DB::table('pengaturan_sistem')->where('pengaturan_sistem.id',$id)->update($request->all());
        $berhasil = DB::table('pengaturan_sistem')->where('id',$id)->get();
        return json_encode('berhasil mengubah'. $berhasil);
        // DB::table('produk')->where('id',$id)->update(array(
        //     'nama' => $nama,
        //     'kode' => $kode,
        //     'unit' => $unit,
        //     'harga_dasar' => $harga_dasar,
        //     'harga_jual' => $harga_jual,
        //     'keterangan' => $keterangan,
        //     'berat' => $berat,
        //     'status_olshop' => $status_olshop,
        //     'status_penjualan' => $status_penjualan,
        //     'status_pembelian' => $status_pembelian,
        //     'kategori_id' => $kategori_id,
        //     'total_stock' => $total_stock
    //     ));
    //     $berhasil = ['Berhasil mengubah produk dengan id = ',$id,'menjadi', $nama];
    //     return json_encode($berhasil);
     }

    public Function delete($id)
    {
        DB::table('pengaturan_sistem')->where('id', $id)->update([ 'deleted'=> 1 ]);
        $berhasil = ['berhasil menghapus data pengaturan_sistem yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
    }
    public function restore($id)
 {
    DB::table('pengaturan_sistem')->where('id', $id)->update([ 'deleted'=> 0 ]);
    $berhasil = ['berhasil mengembalikan data pengaturan sistem yang dihapus dengan id :' .$id];
    return json_encode($berhasil);
 }

}
