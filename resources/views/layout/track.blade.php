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
  [aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
  display: none;
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
        <div class="col-md-12">
          <div class="accordion" id="accordionExample">
              @if (!empty($resi))
              <?php $x=1; ?>
              @foreach ($resi as $rs)
              
              <div class="card">
                <div class="card-header" id="heading<?php echo $x;?>">
                  <h2 class="mb-0">
                    <h5><a class="card-link" data-toggle="collapse" data-target="#collapse<?php echo $x;?>" aria-expanded="false" aria-controls="collapse<?php echo $x;?>">
                      <span class="collapsed"><i class="fa fa-plus"></i></span> 
                      <span class="expanded"><i class="fa fa-minus"></i></span>&nbsp;
                      <?php echo "Status Pengiriman Barang Dengan Resi ".$rs->nmr_ekpedisi; ?>
                    </a></h5>
                  </h2>
                </div>

                <?php 
                $log = DB::table('log_status_kirim')
                              ->join('status_kirim', 'status_kirim.id', '=', 'log_status_kirim.id_status')
                              ->select('log_status_kirim.*','status_kirim.keterangan')
                              ->where('nmr_resi',$rs->nmr_ekpedisi)->get(); 
                  ?>
                {{--  isi pencarian --}}
                <div id="collapse<?php echo $x;?>" class="collapse" aria-labelledby="heading<?php echo $x;?>" data-parent="#accordionExample">
                  <div class="card-body">
                      <section class="">                         
                          <ul class="timeline-with-icons">
                              <?php foreach($log as $lg) { ?>

                              <li class="timeline-item mb-5">
                                  <span class="timeline-icon">
                                  <i class="fas fa-truck text-primary fa-sm fa-fw"></i>
                                  </span>
                        
                                  <h6 class="fw-bold"><?php echo $lg->keterangan; ?></h6>
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
              <?php $x++; ?>
              @endforeach
              @elseif (!empty($api))
              <?php $x=1; ?>
              @foreach ($api as $ap)

              @php
                  $resi = DB::table('pengiriman')
                          ->select('nmr_resi')
                          ->where('nmr_ekpedisi',$ap->number)->first();
                  // print_r($resi);exit;
              @endphp

               <div class="card">
                <div class="card-header" id="heading<?php echo $x;?>">
                  <h2 class="mb-0">
                    <h5><a class="card-link" data-toggle="collapse" data-target="#collapse<?php echo $x;?>" aria-expanded="false" aria-controls="collapse<?php echo $x;?>">
                      <span class="collapsed"><i class="fa fa-plus"></i></span> 
                      <span class="expanded"><i class="fa fa-minus"></i></span>&nbsp;
                      <?php echo "Status Pengiriman Barang Dengan Resi ".$resi->nmr_resi?>
                    </a></h5>
                  </h2>
                </div>
                {{--  isi pencarian --}}
                <div id="collapse<?php echo $x;?>" class="collapse" aria-labelledby="heading<?php echo $x;?>" data-parent="#accordionExample">
                  <div class="card-body">
                    <section class="">                         
                      <ul class="timeline-with-icons">
                        <li class="timeline-item mb-5">
                          
                            {{-- @foreach ($ap->track_info as $t) --}}
                            @foreach ($ap->track_info->tracking->providers as $r)
                            @foreach ($r->events as $ress)
                            <span class="timeline-icon">
                              <i class="fas fa-truck text-primary fa-sm fa-fw"></i>
                            </span>
                            <h6 class="fw-bold"><?php echo "$ress->location - "."$ress->description"; ?></h6>
                             @php
                                 $tgl = date("Y-m-d H:i:s", strtotime($ress->time_utc));
                             @endphp
                            <p class="text-muted mb-2 fw-bold"><?php echo "$tgl" ?></p>
                            
                            @endforeach
                            @endforeach
                        </li>
                      </ul>
                    </section>
                  </div>
                </div>
              </div>
              <?php $x++; ?>
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
</div>
<!-- Quote Request Start -->




