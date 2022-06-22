<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class Kiriman extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kirim   = DB::table('pengiriman')->orderBy('id','DESC')->get();

        $data = array(  'title'     => 'Data kirim',
                        'kirim'     => $kirim,
                        'content'   => 'admin/kiriman/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Edit
    public function edit($id_kirim)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kirim   = DB::table('pengiriman')->where('id',$id_kirim)->orderBy('id','DESC')->first();

        $data = array(  'title'     => 'Edit Data kirim',
                        'kirim'     => $kirim,
                        'content'   => 'admin/kiriman/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_kirimnya       = $request->id;
            for($i=0; $i < sizeof($id_kirimnya);$i++) {
                DB::table('pengiriman')->where('id',$id_kirimnya[$i])->delete();
            }
            return redirect('admin/kiriman')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }

    // tambah
    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nmr_ekpedisi'     => 'required|unique:pengiriman',
                            'nama_pengirim'     => 'required|unique:pengiriman',
                            
                            ]);
        // // UPLOAD START
        // $resi   = $request->nmr_resi;
        $pertama = date('ymd');
        $kedua = rand(100,999);
        $resi = 'KCS'.$pertama.$kedua;


        if(!empty($resi)) {
            DB::table('pengiriman')->insert([
                'nmr_resi'         => $resi,
                'nmr_ekpedisi'        => $request->nmr_ekpedisi,
                'nama_pengirim'    => $request->nama_pengirim,
                'alamat_pengirim'         => $request->alamat_pengirim,
                'telp_pengirim'        => $request->telp_pengirim,
                'nama_tujuan'         => $request->nama_tujuan,
                'alamat_tujuan'        => $request->alamat_tujuan,
                'negara_tujuan'    => $request->negara_tujuan,
                'telp_tujuan'         => $request->telp_tujuan,
                'status_kirim'        => $request->status_kirim,
                'berat'         => $request->berat,
                'total'        => $request->total,
                'created_by'       => Session()->get('id_user'),
                
            ]);
            DB::table('log_status_kirim')->insert([
                'nmr_resi'         => $resi,
                'id_status'        => $request->status_kirim,
                'created_at'       => date('Y-m-d H:i:s'),
                'created_by'       => Session()->get('id_user'),
            ]);
            return redirect('admin/kiriman')->with(['sukses' => 'Data telah ditambah']);
        }else{
            // UPLOAD START       
            DB::table('pengiriman')->insert([
                'nmr_resi'         => $resi,
                'nmr_ekpedisi'        => $request->nmr_ekpedisi,
                'nama_pengirim'    => $request->nama_pengirim,
                'alamat_pengirim'         => $request->alamat_pengirim,
                'telp_pengirim'        => $request->telp_pengirim,
                'nama_tujuan'         => $request->nama_tujuan,
                'alamat_tujuan'        => $request->alamat_tujuan,
                'negara_tujuan'    => $request->negara_tujuan,
                'telp_tujuan'         => $request->telp_tujuan,
                'status_kirim'        => $request->status_kirim,
                'berat'         => $request->berat,
                'total'        => $request->total,
                'created_by'       => Session()->get('id_user'),
            ]);
            DB::table('log_status_kirim')->insert([
                'nmr_resi'         => $resi,
                'id_status'        => $request->status_kirim,
                'created_at'       => date('Y-m-d H:i:s'),
                'created_by'       => Session()->get('id_user'),
            ]);
            return redirect('admin/kiriman')->with(['sukses' => 'Data telah ditambah']);
        }
    }

    // edit
    public function proses_edit(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                           'nmr_resi'      => 'required'
                            ]);
       
        $resi                  = $request->nmr_resi;
        if(!empty($resi)) {
            DB::table('pengiriman')->where('id',$request->id)->update([
                'nmr_resi'         => $request->nmr_resi,
                'nmr_ekpedisi'        => $request->nmr_ekpedisi,
                'nama_pengirim'    => $request->nama_pengirim,
                'alamat_pengirim'         => $request->alamat_pengirim,
                'telp_pengirim'        => $request->telp_pengirim,
                'nama_tujuan'         => $request->nama_tujuan,
                'alamat_tujuan'        => $request->alamat_tujuan,
                'negara_tujuan'    => $request->negara_tujuan,
                'telp_tujuan'         => $request->telp_tujuan,
                'status_kirim'        => $request->status_kirim,
                'berat'         => $request->berat,
                'total'        => $request->total,
                'created_by'       => Session()->get('id_user'),
            ]);
            return redirect('admin/kiriman')->with(['sukses' => 'Data telah diupdate']);
        }else{
            DB::table('pengiriman')->where('id',$request->id_kirim)->update([
                'nmr_resi'         => $request->nmr_resi,
                'nmr_ekpedisi'        => $request->nmr_ekpedisi,
                'nama_pengirim'    => $request->nama_pengirim,
                'alamat_pengirim'         => $request->alamat_pengirim,
                'telp_pengirim'        => $request->telp_pengirim,
                'nama_tujuan'         => $request->nama_tujuan,
                'alamat_tujuan'        => $request->alamat_tujuan,
                'negara_tujuan'    => $request->negara_tujuan,
                'telp_tujuan'         => $request->telp_tujuan,
                'status_kirim'        => $request->status_kirim,
                'berat'         => $request->berat,
                'total'        => $request->total,
                'created_by'       => Session()->get('id_user'),
            ]);
            return redirect('admin/kiriman')->with(['sukses' => 'Data telah diupdate']);
        }
    }

    // Delete
    public function delete($id_kirim)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $resi = DB::table('pengiriman')->where('id',$id_kirim)->value('nmr_resi');
        
        DB::table('pengiriman')->where('id',$id_kirim)->delete();
        DB::table('log_status_kirim')->where('nmr_resi',$resi)->delete();
        return redirect('admin/kiriman')->with(['sukses' => 'Data telah dihapus']);
    }
}
