<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class Track extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $sqlStmt ="SELECT m1.*
                    FROM vw_log_status m1 
                    LEFT JOIN vw_log_status m2 ON (m1.nmr_resi=m2.nmr_resi AND m1.id_status <m2.id_status)
                    WHERE m2.id_status is null";
        $track = DB::select(DB::raw($sqlStmt));

        $data = array( 'title'     => 'Update Status Kiriman', 
                        'track'    => $track,
                        'content'  => 'admin/track/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

 
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_track       = $request->id;
            for($i=0; $i < sizeof($id_track);$i++) {
                DB::table('log_status_kirim')->where('id',$id_track[$i])->delete();
            }
            return redirect('admin/track')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }
    // edit data
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        
        $track   = DB::table('log_status_kirim')->join('status_kirim', 'status_kirim.id', '=', 'log_status_kirim.id_status')
                        ->select('log_status_kirim.id','log_status_kirim.nmr_resi','log_status_kirim.id_status','status_kirim.keterangan','log_status_kirim.created_at')
                        ->orderBy('log_status_kirim.id','ASC')
                        ->where('log_status_kirim.id',$id)->first();

        $status = DB::table('status_kirim')->orderBy('id','ASC')->get();

        $data = array(  'title'     => 'Edit Data kirim',
                        'track'     => $track,
                        'status'    => $status,
                        'content'   => 'admin/track/edit'
                    );
        // dd($status);
        return view('admin/layout/wrapper',$data);
    }

    //tambah
    public function tambah(Request $request)    
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'keterangan'     => 'required|unique:track_kirim'
                            
                            ]);

        $ket = $request->keterangan;
        if(!empty($ket)) {
            DB::table('log_status_kirim')->insert([
                'keterangan'         => $ket,
                'created_at'        => date('Y-m-d H:i:s'),
                'created_by'       => Session()->get('id_user'),
                
            ]);
            return redirect('admin/track')->with(['sukses' => 'Data telah ditambah']);
        }else{
            // UPLOAD START       
            DB::table('log_status_kirim')->insert([
                'keterangan'         => $request->keterangan,
                'created_at'        => date('Y-m-d H:i:s'),
                'created_by'       => Session()->get('id_user'),
            ]);
            return redirect('admin/track')->with(['sukses' => 'Data telah ditambah']);
        }
    }

    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") 
        { 
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
        request()->validate([
            'nmr_resi'     => 'required',
            'id_status' => 'required'
            
            ]);
        
        $status = $request->id_status;
      
        if(!empty($status)) {
            DB::table('log_status_kirim')->insert([
                'nmr_resi'          => $request->nmr_resi,
                'id_status'         => $status,
                'created_at'        => date('Y-m-d H:i:s'),
                'created_by'       => Session()->get('id_user'),      
            ]);
           
        }else{
    
        }
       
        return redirect('admin/track')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
    	if(Session()->get('username')=="") 
        { 
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
    	DB::table('log_status_kirim')->where('id',$id)->delete();
    	return redirect('admin/track')->with(['sukses' => 'Data telah dihapus']);
    }

}