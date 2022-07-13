<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class Faq extends Controller
{
    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $faq   = DB::table('faq')->orderBy('id','ASC')->get();

        $data = array( 'title'     => 'FAQ', 
                        'faq'  => $faq,
                        'content'   => 'admin/faq/index'
                    );
                    // dd($data);
        return view('admin/layout/wrapper',$data);
    }

 
    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_faq       = $request->id;
            for($i=0; $i < sizeof($id_faq);$i++) {
                DB::table('faq')->where('id',$id_faq[$i])->delete();
            }
            return redirect('admin/faq')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }
    }
    // edit data
    public function edit($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $faq   = DB::table('faq')->where('id',$id)->orderBy('id','ASC')->first();

        $data = array(  'title'     => 'Edit Data kirim',
                        'faq'     => $faq,
                        'content'   => 'admin/faq/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //tambah
    public function tambah(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'pertanyaan'     => 'required',
                            'jawaban' => 'required'
                            ]);

        $jawaban = $request->jawaban;
        if(!empty($jawaban)) {
            DB::table('faq')->insert([
                'pertanyaan'        => $request->pertanyaan,
                'jawaban'           => $jawaban,
                'created_at'        => date('Y-m-d H:i:s'),                
            ]);
            return redirect('admin/faq')->with(['sukses' => 'Data telah ditambah']);
        }else{
            // UPLOAD START       
            DB::table('faq')->insert([
                'pertanyaan'         => $request->pertanyaan,
                'jawaban'           => $request->jawaban,
                'created_at'        => date('Y-m-d H:i:s'),
            ]);
            return redirect('admin/faq')->with(['sukses' => 'Data telah ditambah']);
        }
    }

    public function proses_edit(Request $request)
    {
    	if(Session()->get('username')=="") 
        { 
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
    	request()->validate([
					        'pertanyaan'     => 'required',
                            'jawaban'     => 'required'
					        ]);
        
        
        DB::table('faq')->where('id',$request->id)->update([
            'pertanyaan'          => $request->pertanyaan,
            'jawaban'          => $request->jawaban,
            'created_at'         => date('Y-m-d H:i:s'),
        ]);
       
        return redirect('admin/faq')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id)
    {
    	if(Session()->get('username')=="") 
        { 
            return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);
        }
    	DB::table('faq')->where('id',$id)->delete();
    	return redirect('admin/faq')->with(['sukses' => 'Data telah dihapus']);
    }

}