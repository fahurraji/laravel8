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

    .preserveLines {
        white-space: pre-wrap;
    }
  </style>

<?php 
$status = DB::table('log_status_kirim')->groupBy('nmr_resi')->get();
?>
<!-- Header Start -->
<div class="jumbotron jumbotron-fluid mb-5">
    <div class="container text-center py-5">
        <h1 class="text-primary mb-4">Safe & Faster</h1>
        <h1 class="text-white display-3 mb-5">Kalimantan Cargo Service</h1>
        <div class="mx-auto" style="width: 100%; max-width: 600px;">
            <form action="{{ asset('track') }}" method="get" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="row form-group">
                    <textarea name="nmr_resi" rows="5" class="form-control" id="nmr_resi" placeholder="Masukkan Tracking ID Maksimal 10"></textarea>
                    {{-- <input type="text" name="nmr_resi" id="nmr_resi" class="form-control border-light" style="padding: 30px;text-transform:uppercase" placeholder="Tracking Id" value="" required> --}}
                </div>
                {{-- <div class="input-group-append"> --}}
                    <button type="submit" name="submit" class="btn btn-primary px-3">Track & Trace</button>
                {{-- </div>   --}}
            </form>
        </div>
    </div>
</div>
<!-- Header End -->


<!--  Quote Request Start -->




<!-- Services Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <h6 class="text-primary text-uppercase font-weight-bold">Our Services</h6>
            <h1 class="mb-4">Best Logistic Services</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-3 col-md-6 text-center mb-5">
                <div class="d-flex align-items-center justify-content-center bg-primary mb-4 p-4">
                    <i class="fa fa-2x fa-plane text-dark pr-3"></i>
                    <h6 class="text-white font-weight-medium m-0">Air Freight</h6>
                </div>
                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet diam sea est diam</p>
                <a class="border-bottom text-decoration-none" href="">Read More</a>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-5">
                <div class="d-flex align-items-center justify-content-center bg-primary mb-4 p-4">
                    <i class="fa fa-2x fa-ship text-dark pr-3"></i>
                    <h6 class="text-white font-weight-medium m-0">Ocean Freight</h6>
                </div>
                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet diam sea est diam</p>
                <a class="border-bottom text-decoration-none" href="">Read More</a>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-5">
                <div class="d-flex align-items-center justify-content-center bg-primary mb-4 p-4">
                    <i class="fa fa-2x fa-truck text-dark pr-3"></i>
                    <h6 class="text-white font-weight-medium m-0">Land Transport</h6>
                </div>
                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet diam sea est diam</p>
                <a class="border-bottom text-decoration-none" href="">Read More</a>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-5">
                <div class="d-flex align-items-center justify-content-center bg-primary mb-4 p-4">
                    <i class="fa fa-2x fa-store text-dark pr-3"></i>
                    <h6 class="text-white font-weight-medium m-0">Cargo Storage</h6>
                </div>
                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet diam sea est diam</p>
                <a class="border-bottom text-decoration-none" href="">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->


<!-- Features Start -->
{{-- <div class="container-fluid bg-secondary my-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid w-100" src="img/feature.jpg" alt="">
            </div>
            <div class="col-lg-7 py-5 py-lg-0">
                <h6 class="text-primary text-uppercase font-weight-bold">Why Choose Us</h6>
                <h1 class="mb-4">Faster, Safe and Trusted Logistics Services</h1>
                <p class="mb-4">Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duo</p>
                <ul class="list-inline">
                    <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Best In Industry</h6>
                    <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>Emergency Services</h6></li>
                    <li><h6><i class="far fa-dot-circle text-primary mr-3"></i>24/7 Customer Support</h6></li>
                </ul>
                <a href="" class="btn btn-primary mt-3 py-2 px-4">Learn More</a>
            </div>
        </div>
    </div>
</div> --}}
<!-- Features End -->




<!-- Testimonial Start -->
{{-- 
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center pb-2">
            <h6 class="text-primary text-uppercase font-weight-bold">Testimonial</h6>
            <h1 class="mb-4">Our Clients Say</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="position-relative bg-secondary p-4">
                <i class="fa fa-3x fa-quote-right text-primary position-absolute" style="top: -6px; right: 0;"></i>
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid rounded-circle" src="img/testimonial-1.jpg" style="width: 60px; height: 60px;" alt="">
                    <div class="ml-3">
                        <h6 class="font-weight-semi-bold m-0">Client Name</h6>
                        <small>- Profession</small>
                    </div>
                </div>
                <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita</p>
            </div>
            <div class="position-relative bg-secondary p-4">
                <i class="fa fa-3x fa-quote-right text-primary position-absolute" style="top: -6px; right: 0;"></i>
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid rounded-circle" src="img/testimonial-2.jpg" style="width: 60px; height: 60px;" alt="">
                    <div class="ml-3">
                        <h6 class="font-weight-semi-bold m-0">Client Name</h6>
                        <small>- Profession</small>
                    </div>
                </div>
                <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita</p>
            </div>
            <div class="position-relative bg-secondary p-4">
                <i class="fa fa-3x fa-quote-right text-primary position-absolute" style="top: -6px; right: 0;"></i>
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid rounded-circle" src="img/testimonial-3.jpg" style="width: 60px; height: 60px;" alt="">
                    <div class="ml-3">
                        <h6 class="font-weight-semi-bold m-0">Client Name</h6>
                        <small>- Profession</small>
                    </div>
                </div>
                <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita</p>
            </div>
            <div class="position-relative bg-secondary p-4">
                <i class="fa fa-3x fa-quote-right text-primary position-absolute" style="top: -6px; right: 0;"></i>
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid rounded-circle" src="img/testimonial-4.jpg" style="width: 60px; height: 60px;" alt="">
                    <div class="ml-3">
                        <h6 class="font-weight-semi-bold m-0">Client Name</h6>
                        <small>- Profession</small>
                    </div>
                </div>
                <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita</p>
            </div>
        </div>
    </div>
</div> --}}
<!-- Testimonial End -->


