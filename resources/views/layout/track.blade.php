<style>
    .timeline-with-icons {
      border-left: 1px solid hsl(0, 0%, 90%);
      position: relative;
      list-style: none;
    }
  
    .timeline-with-icons .timeline-item {
      position: relative;
    }
  
    .timeline-with-icons .timeline-item:after {
      position: absolute;
      display: block;
      top: 0;
    }
  
    .timeline-with-icons .timeline-icon {
      position: absolute;
      left: -48px;
      background-color: hsl(217, 88.2%, 90%);
      color: hsl(217, 88.8%, 35.1%);
      border-radius: 50%;
      height: 31px;
      width: 31px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>

  <?php 
//   $status = DB::table('log_status_kirim')->groupBy('nmr_resi')->get();
  ?> 
  
  <!--  Quote Request Start -->
  <div class="container-fluid bg-secondary my-5">
    <div class="container">
        <div class="row align-items-center">
            {{-- batas collapse acordion dimulai --}}
            <div class="accordion" id="accordionExample">
                @if ($resi->count() > 0)
                @foreach ($resi as $rs)
               
               
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <?php echo "Status Pengiriman Barang Dengan Resi ".$rs->nmr_resi; ?>
                      </button>
                    </h2>
                  </div>
                 

                  <?php 
                  $log = DB::table('log_status_kirim')
                                ->join('status_kirim', 'status_kirim.id', '=', 'log_status_kirim.id_status')
                                ->select('log_status_kirim.*','status_kirim.keterangan')
                                ->where('nmr_resi',$rs->nmr_resi)->get(); 
                    ?>
  
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <section class="">                         
                            <ul class="timeline-with-icons">
                                <?php foreach($log as $lg) { ?>
  
                                <li class="timeline-item mb-5">
                                    <span class="timeline-icon">
                                    <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                    </span>
                          
                                    <h5 class="fw-bold"><?php echo $lg->keterangan; ?></h5>
                                    <p class="text-muted mb-2 fw-bold"><?php echo $lg->created_at; ?></p>
                                </li>
                              <?php 
                                }
                                ?>
                            </ul>
                        </section>
                    </div>
                  </div>
                </div>
                   
                 @endforeach
                 @else
                 <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          <?php echo "Nomor Resi tidak ditemukan, silahkan periksa kembali"?>
                        </button>
                      </h2>
                    </div>
                 </div>

                 @endif
              </div>
               {{-- batas collapse acordion berakhir --}}
        </div>
    </div>
  </div>
  <!-- Quote Request Start -->
  
  
  
  
  