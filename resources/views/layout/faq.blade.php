<style>
      [aria-expanded="false"] > .expanded, [aria-expanded="true"] > .collapsed {
		display: none;
	}
</style>

@include('layout/head')
@include('layout/header')

<div class="container-fluid bg-secondary my-5">
    <div class="container">
        <div class="row align-items-center">
            {{-- batas collapse acordion dimulai --}}
            <div class="col-md-12">
                <h5>FAQ</h5>
            </div>
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                @if ($faq->count() > 0)
                <?php $x=1; ?>
                @foreach ($faq as $fq)
                    <div class="card">
                    <div class="card-header" id="heading<?php echo $x;?>">
                        <h2 class="mb-0">
                        <h5></h5><a class="card-link" data-toggle="collapse" data-target="#collapse<?php echo $x;?>" aria-expanded="false" aria-controls="collapse<?php echo $x;?>">
                            <span class="collapsed"><i class="fa fa-plus"></i></span> 
                            <span class="expanded"><i class="fa fa-minus"></i></span>&nbsp;
                            <?php echo "Status Pengiriman Barang Dengan Resi ".$fq->pertanyaan; ?>
                        </a></h5>
                        </h2>
                    </div>
                
                    <div id="collapse<?php echo $x;?>" class="collapse" aria-labelledby="heading<?php echo $x;?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo $fq->jawaban; ?>
                        </div>
                    </div>
                    </div>
                    <?php  $x++;?>
                 @endforeach
                 
                 @else
                 <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          {{-- <?php echo "Nomor Resi tidak ditemukan, silahkan periksa kembali"?> --}}
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



@include('layout/footer')