<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Rekening_model;
use App\Models\Berita_model;
use App\Models\Staff_model;
use App\Models\Download_model;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
    	$site_config   = DB::table('konfigurasi')->first();
        

        $data = array(  'title'         => $site_config->namaweb.' - '.$site_config->tagline,
                        'deskripsi'     => $site_config->namaweb.' - '.$site_config->tagline,
                        'keywords'      => $site_config->namaweb.' - '.$site_config->tagline,
                        'site_config'   => $site_config,
                        'content'       => 'home/index'
                    );
        return view('layout/wrapper',$data);
    }

    // Homepage
    public function javawebmedia()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $layanan = DB::table('berita')->where(array('jenis_berita' => 'Layanan','status_berita' => 'Publish'))->orderBy('urutan', 'ASC')->get();

        $data = array(  'title'     => 'Tentang '.$site_config->namaweb,
                        'deskripsi' => 'Tentang '.$site_config->namaweb,
                        'keywords'  => 'Tentang '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/aws'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function kontak()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Menghubungi '.$site_config->namaweb,
                        'deskripsi' => 'Kontak '.$site_config->namaweb,
                        'keywords'  => 'Kontak '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/kontak'
                    );
        return view('layout/wrapper',$data);
    }

    public function track(Request $request)
    {
        $site_config   = DB::table('konfigurasi')->first();

        $nmr_resi = $request->nmr_resi;
        $exp =$nmr_resi;
        $resi = preg_split("/[-\s;,_.:]+/",$exp);
        // cek nomor expedisi jika ada gunakan nomor eksepdisi untuk melakukan tracking jika tidak gunakan nmr_resi internal
        $cek_nmr_expedisi = DB::table('pengiriman')
                            ->select('layanan','nmr_ekpedisi')
                            ->whereIN('nmr_resi',$resi)->get(); 
        
        $data =array();
        // var_dump($cek_nmr_expedisi);exit;
        if($cek_nmr_expedisi->count() > 0 ){
           
            $nmr_cari = null;
            $nmr_track = null;
            foreach($cek_nmr_expedisi as $ck){
                $layanan = $ck->layanan;
                // print_r($layanan);exit;
                // ====cek jenis layanan tracking via api atau manual=====
                if($layanan == '1')
                {
                    // $resi = DB::table('log_status_kirim')->whereIN('nmr_resi',$resi)->groupBy('nmr_resi')->get();
                    $nmr_cari = DB::table('pengiriman')
                                ->select('nmr_resi as nmr_ekpedisi')
                                ->where('layanan','1')
                                ->whereIN('nmr_resi',$resi)->get(); 
                    
                }
                else if($layanan== '2')
                {
                    $nmr_track = DB::table('pengiriman')
                                ->select('nmr_ekpedisi as nmr_ekpedisi')
                                ->where('layanan','2')
                                ->whereIN('nmr_resi',$resi)->get();
                    // print_r($nmr_track);exit;
                       
                }
                // print_r($resi);exit;
                // $data =array('resi'=>$resi);
                $data = array(  
                    'title'     => 'Menghubungi '.$site_config->namaweb,
                    'deskripsi' => 'Kontak '.$site_config->namaweb,
                    'keywords'  => 'Kontak '.$site_config->namaweb,
                    'site_config'      => $site_config,
                    'resi'=> $nmr_cari,
                    'track' => $nmr_track,
                    'api'=> null,
                    'content'   => 'home/track'
                );
               
            }
            // dd($data);exit;
            // === cek nomor tracking ke API jika ada kirim request data ke API
            if($nmr_track != null ){
                foreach($nmr_track as $row){
                    $data2[] = array("number"=>$row->nmr_ekpedisi);
                }
                $post = json_encode($data2);
                // dd($post);exit;
                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://api.17track.net/track/v2/gettrackinfo');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

                $headers = array();
                $headers[] = "17token:5AFFA2C69919E824E9F8E121DD87216C";
                $headers[] = "Content-Type: application/json";
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }

                curl_close($ch);
                // print_r($result);
                $hasil = json_decode($result);
                if($hasil->data->rejected){
                    $data['api'] = null;
                }else{
                    $data['api'] = $hasil->data->accepted;
                }
                
            }
            // dd($data);exit;
            return view('layout/result',$data);
        }else{
            $data = array(  
                'title'     => 'Menghubungi '.$site_config->namaweb,
                'deskripsi' => 'Kontak '.$site_config->namaweb,
                'keywords'  => 'Kontak '.$site_config->namaweb,
                'site_config'      => $site_config,
                'resi'=> 0,
                'track' => 0,
                'content'   => 'home/track',
                'api'=> 0
            );
            return view('layout/result',$data);
        }
        
    }

    public function result()
    {
        $status = DB::table('log_status_kirim')->groupBy('nmr_resi')->get();
        return view('layout/result',$status);
    }

    public function faq()
    {
        $faq = DB::table('faq')->orderBy('id','ASC')->get() ;
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Menghubungi '.$site_config->namaweb,
                        'deskripsi' => 'Kontak '.$site_config->namaweb,
                        'keywords'  => 'Kontak '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'faq'       => $faq,
                        'content'   => 'home/faq'
                    );
        return view('layout/faq',$data);
    }

}
