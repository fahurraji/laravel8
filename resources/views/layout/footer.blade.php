<!-- Footer Start -->
<div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
  <div class="row pt-5">
      <div class="col-lg-7 col-md-6">
          <div class="row">
              <div class="col-md-6 mb-5">
                  <h3 class="text-primary mb-4">Alamat</h3>
                  <p><i class="fa fa-map-marker-alt mr-2"></i>Jl. Kenari No.74, Mariana, Kec. Pontianak Kota,</p>
                  <p><i class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i>Kota Pontianak, Kalimantan Barat 78244</p>
                  <p><i class="fa fa-phone-alt mr-2"></i>+62821-5087-5992</p>
                  <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                  <div class="d-flex justify-content-start mt-4">
                      <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-twitter"></i></a>
                      <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-outline-light btn-social mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                      <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                  </div>
              </div>
              <div class="col-md-6 mb-5">
                  <h3 class="text-primary mb-4">Quick Links</h3>
                  <div class="d-flex flex-column justify-content-start">
                      <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                      <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                      <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                      <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Pricing Plan</a>
                      <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                  </div>
              </div>
          </div>
      </div>
 
  </div>
</div>
<div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: #3E3E4E !important;">
  <div class="row">
      <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
          <p class="m-0 text-white">&copy; <a href="#">Kalimantan Cargo Services</a>. All Rights Reserved. 
  
          Designed by <a href="#"></a>
          <br>Distributed By: <a href="#" target="_blank">ThemeWagon</a>
          </p>
      </div>
  
  </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



{{-- <script src="lib/easing/easing.min.js"></script> --}}
{{-- <script src="lib/waypoints/waypoints.min.js"></script> --}}
{{-- <script src="{{asset('assets/lib/counterup/counterup.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/aws/js/owl.carousel.min.js')}}"></script> --}}

<!-- Contact Javascript File -->
{{-- <script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script> --}}

<!-- Template Javascript -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
    $('input').bind('input', function() {
        var c = this.selectionStart,
            r = /[^a-z0-9]/gi,
            v = $(this).val();
        if(r.test(v)) {
            $(this).val(v.replace(r, ''));
            c--;
        }
        this.setSelectionRange(c, c);
        });
</script>
</body>

</html>