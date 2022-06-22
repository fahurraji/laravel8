<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class Status extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $status   = DB::table('status_kirim')->orderBy('id','ASC')->get();

        $data = array( 'title'     => 'Update Status', 
                        'status'  => $status,
                        'content'   => 'admin/status/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

 
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_status       = $request->id;
            for($i=0; $i < sizeof($id_status);$i++) {
                DB::table('status_kirim')->where('id',$id_status[$i])->delete();
            }
            return redirect('admin/status')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }
    // edit data
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $status   = DB::table('status_kirim')->where('id',$id)->orderBy('id','ASC')->first();

        $data = array(  'title'     => 'Edit Data kirim',
                        'status'     => $status,
                        'content'   => 'admin/status/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //tambah
    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'keterangan'     => 'required|unique:status_kirim'
                            
                            ]);

        $ket = $request->keterangan;
        if(!empty($ket)) {
            DB::table('status_kirim')->insert([
                'keterangan'         => $ket,
                'created_at'        => date('Y-m-d H:i:s'),
                'created_by'       => Session()->get('id_user'),
                
            ]);
            return redirect('admin/status')->with(['sukses' => 'Data telah ditambah']);
        }else{
            // UPLOAD START       
            DB::table('status_kirim')->insert([
                'keterangan'         => $request->keterangan,
                'created_at'        => date('Y-m-d H:i:s'),
                'created_by'       => Session()->get('id_user'),
            ]);
            return redirect('admin/status')->with(['sukses' => 'Data telah ditambah']);
        }
    }

    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") 
        { 
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
    	request()->validate([
					        'keterangan'     => 'required'
					        ]);
        
        
        DB::table('status_kirim')->where('id',$request->id)->update([
            'keterangan'          => $request->keterangan,
            'created_at'         => date('Y-m-d H:i:s'),
            'created_by'      => Session()->get('id_user'),
        ]);
       
        return redirect('admin/status')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
    	if(Session()->get('username')=="") 
        { 
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
    	DB::table('status_kirim')->where('id',$id)->delete();
    	return redirect('admin/status')->with(['sukses' => 'Data telah dihapus']);
    }

}