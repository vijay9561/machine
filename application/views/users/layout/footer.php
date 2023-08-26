<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6">
          <div class="footer-info">
            <h3>Mera-Machine</h3>
            <p>
              B1,b3,kalyani city near a.s.club <br>
              tisgaon 431136 Aurangabad<br><br>
              <strong>Phone:</strong><a href="tel:9762727232"> +91 9762727232</a><br>
              <strong>Email:</strong> <a href="mailto:meramachine07@gmail.com">meramachine07@gmail.com</a><br>
            </p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url(); ?>">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url(); ?>about">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url(); ?>termsAndCondition">Terms & Condition</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url(); ?>privacyPolicy">Privacy policy</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url(); ?>sparePart">Spare Part</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url(); ?>engineerOrSupervisor">Engg/ Supervisor </a></li>

          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="<?php echo site_url(); ?>cell-machine">Sell Machine</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url(); ?>sellBuyMachine">Buy Machine</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url(); ?>drivers">Drivers</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url(); ?>owner">Owners</a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url(); ?>mechanics">Mechanics </a></li>
            <li><i class="bx bx-chevron-right"></i><a href="<?php echo site_url(); ?>learningPath">Learning Path </a></li>
            
          </ul>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>MeraMachine</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo site_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo site_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo site_url(); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?php echo site_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo site_url(); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo site_url(); ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="<?php echo site_url(); ?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/js/min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo site_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/state.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#carousel').flexslider({
      animation: "slide",
      controlNav: true,
      animationLoop: false,
      slideshow: false,
      itemWidth: 210,
      itemMargin: 5,
      asNavFor: '#slider'
    });

    $('#slider').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      sync: "#carousel",
      start: function(slider) {
        $('body').removeClass('loading');
      }
    });
  });

  function viewDriverDetails(id) {
    $.ajax({
      type: "POST",
      url: BASE_URL + 'viewInformationForDriver',
      type: "POST",
      data: {
        id: id
      },
      success: function(data) {
        obj = JSON.parse(data);
        if (obj.code == 200) {
          if(obj.profile_image ==""){
            $('#fetchImage').html('<img style="width:100%" src="<?php echo base_url() . 'assets/img/' ?>default.png" />');
          }else{
          $('#fetchImage').html('<img style="width:100%" src="<?php echo base_url() . 'assets/driver/' ?>' + obj.profile_image + '" />');
          } 
          $('#fetchTables').html('<thead><tr><th>Full Name (आपका नाम)</th><td>' + obj.full_name + '</td></tr>' +
            '<tr><th>Mobile no. (मोबइल न.)</th><td><a style="width:100%" class="btn btn-success  btn-block" href="tel:' + obj.mobile_no + '">Call</a></td></tr>' +
            '<tr><th>Age (आपकी उम्र)</th><td>' + obj.age + '</td></tr>' +
            '<tr><th>Which driver are you? (आप कौन से ड्राइवर हैं)?</th><td>' + obj.operator_type + '</td></tr>' +
            '<tr><th>District (जिला)</th><td>' + obj.district + '</td></tr>' +
            '<tr><th>State (राज्य)</th><td>' + obj.state + '</td></tr>' +
            '<tr><th>Your experience (आपका अनुभव)</th><td>' + obj.your_experience + '</td></tr>' +
            '<tr><th>Do you have a license with you? (क्या आपके पास लाइसेंस है?)</th><td>' + obj.license + '</td></tr>' +
            '<tr><th>About you (आपके बारे में)</th><td>' + obj.about_you + '</td></tr></thead>'
          );
        }
      }
    });
  }

  function viewOwnerDetails(id) {
    $.ajax({
      type: "POST",
      url: BASE_URL + 'viewInformationForOwner',
      type: "POST",
      data: {
        id: id
      },
      success: function(data) {
        obj = JSON.parse(data);
        if (obj.code == 200) { 
          if(obj.profile_image ==""){
            $('#fetchImageOwner').html('<img style="width:100%" src="<?php echo base_url() . 'assets/img/' ?>default.png" />');
          }else{
          $('#fetchImageOwner').html('<img style="width:100%" src="<?php echo base_url() . 'assets/owner/' ?>' + obj.profile_image + '" />');
          }
          $('#fetchTablesOwner').html('<thead><tr>' +
            '<th>Name (दुकान फर्म ,या अपका नाम )</th><td>' + obj.owner_farm + '</td></tr>' +
            '<tr><th>Mobile no. (मोबइल न.)</th><td><a style="width:100%"  class="btn btn-success  btn-block" href="tel:' + obj.mobile_no + '">Call</a></td></tr>' +
            '<tr><th>Name of the machine (मशीन का नाम)</th><td>' + obj.machine_name + '</td></tr>' +
            '<tr><th>District (जिला)</th><td>' + obj.district + '</td></tr>' +
            '<tr><th>State (राज्य)</th><td>' + obj.state + '</td></tr>' +
            '<tr><th>Address (पता)</th><td>' + obj.address + '</td></tr>' +
            '<tr><th>More info (अधिक जानकारी)</th><td>' + obj.more_details + '</td></tr>'
          );
        }
      }
    });
  }

  function viewMechanicsDetails(id) {
    $.ajax({
      type: "POST",
      url: BASE_URL + 'viewInformationForMchanics',
      type: "POST",
      data: {
        id: id
      },
      success: function(data) {
        obj = JSON.parse(data);
        if (obj.code == 200) {
          if(obj.profile_image ==""){
            $('#fetchImageMchanics').html('<img style="width:100%" src="<?php echo base_url() . 'assets/img/' ?>default.png" />');
          }else{
          $('#fetchImageMchanics').html('<img style="width:100%" src="<?php echo base_url() . 'assets/mechanics/' ?>' + obj.profile_image + '" />');
          }
          $('#fetchTablesMechanics').html('<thead><tr>' +
            '<th>Name (दुकान फर्म ,या अपका नाम )</th><td>' + obj.full_name + '</td></tr>' +
            '<tr><th>Mobile no. (मोबइल न.)</th><td><a style="width:100%"  class="btn btn-success btn-block" href="tel:' + obj.mobile_no + '">Call</a></td></tr>' +
            '<tr><th>Address (पता)</th><td>' + obj.address + '</td></tr>' +
            '<tr><th>District (जिला)</th><td>' + obj.district + '</td></tr>' +
            '<tr><th>State (राज्य)</th><td>' + obj.state + '</td></tr>' +
            '<tr><th>Which machine do you work with? (आप कौन सी मशीन के काम करते हैं)</th><td>' + obj.machine_details + '</td></tr>'
          );
        }
      }
    });
  }

  function viewEngineerDetails(id) {
    $.ajax({
      type: "POST",
      url: BASE_URL + 'viewInformationForCivil',
      type: "POST",
      data: {
        id: id
      },
      success: function(data) {
        obj = JSON.parse(data);
        if (obj.code == 200) {
          if(obj.profile_image ==""){
            $('#fetchImageEnginger').html('<img style="width:100%" src="<?php echo base_url(); ?>assets/img/default.png" />');
          }else{
          $('#fetchImageEnginger').html('<img style="width:100%" src="<?php echo base_url() . 'assets/civil/' ?>' + obj.profile_image + '" />');
          }
          $('#fetchTablesEngineer').html('<thead><tr>' +
            '<th>Your full name (आपका पूरा नाम) </th><td>' + obj.full_name + '</td></tr>' +
            '<th>Qualification (योग्यता)</th><td>' + obj.qualification + '</td></tr>' +
            '<tr><th>Mobile no (मोबइल न.)</th><td><a style="width:100%"  class="btn btn-success btn-block" href="tel:' + obj.mobile_no + '">Call</a></td></tr>' +
            '<tr><th>Address (पता)</th><td>' + obj.address + '</td></tr>' +
            '<tr><th>District (जिला)</th><td>' + obj.district + '</td></tr>' +
            '<tr><th>State (राज्य)</th><td>' + obj.state + '</td></tr>' +
            '<tr><th>Experience Details (आपका अनुभव)</th><td>' + obj.your_experience + '</td></tr>'
          );
        }
      }
    });
  }
</script>

<div class="modal fade" id="ViewEngineerDiv" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Engineer Or Supervisor Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" id="fetchImageEnginger"></div>
          <div class="col-md-8">
            <table class="table table-bordered" id="fetchTablesEngineer"></table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div class="modal fade" id="ViewDrivers" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Driver Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" id="fetchImage"></div>
          <div class="col-md-8">
            <table class="table table-bordered" id="fetchTables"></table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div class="modal fade" id="ViewOnwerDiv" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Owner Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" id="fetchImageOwner"></div>
          <div class="col-md-8">
            <table class="table table-bordered" id="fetchTablesOwner"></table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="ViewMechanicsDiv" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Mechanics Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4" id="fetchImageMchanics"></div>
          <div class="col-md-8">
            <table class="table table-bordered" id="fetchTablesMechanics"></table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form method="post" id="submitFormLog" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

          <div class="alert alert-danger" id="error_message_login" style="display:none;"></div>
          <div class="alert alert-success" id="success_message_login" style="display:none;"></div>

          <div class="form-group">
            <input type="text" name="login_name" class="form-control" placeholder="Your Name" id="login_name" required>
          </div>
          <div class="form-group">
            <input type="text" name="login_mobile" class="form-control" placeholder="Mobile No" id="login_mobile">
          </div>
          <div class="form-group" style="text-align: center;">
            <input type="submit" class="btn btn-primary btn-block" id="submit_login_details" value="Login Users">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


<script>
  $("#submitFormLog").validate({
    ignore: ":hidden",
    rules: {
      login_name: {
        required: true,
        minlength: 3,
        maxlength: 100,
      },
      login_mobile: {
        required: true,
        minlength: 10,
        maxlength: 10,
        number: true,
      },
    },
    messages: {
      login_name: {
        required: "<span>Please enter full name </span>",
        maxlength: "<span>Please enter  full name min 3 or 100 character </span>",
        minlength: "<span>please enter min 3 digit character</span>",
      },
      login_mobile: {
        required: "<span>Please enter your mobile number </span>",
        maxlength: "<span>Please enter mobile no  10 digit </span>",
        minlength: "<span>Please enter mobile no  10 digit </span>",
        number: "<span>Please enter only digit value </span>",
      },
    },
    submitHandler: function(form) {
      var formData = new FormData($("#submitFormLog")[0]);
      $.ajax({
        type: "POST",
        url: BASE_URL + 'login_users',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#submit_login_details').addClass('sanding').attr("disabled", true);
          $('#submit_login_details').html('<i class="fa fa-refresh fa-pulse fa-fw"></i><span>Submiting...</span>');
        },
        success: function(data) {
          obj = JSON.parse(data);
          if (obj.code == 400) {
            $('#error_message_login').show();
            $('#error_message_login').html(obj.message);
            $('#submit_login_details').prop('disabled', false);
            $('#submit_login_details').html('Login');
            $('#submit_login_details').addClass('sanding').attr("disabled", false);
            setTimeout(function() {
              $('#error_message_login').hide();
            }, 10000);
            return false;
          } else {
            $('#success_message_login').show();
            $('#success_message_login').html(obj.message);
            setTimeout(function() {
              location.reload();
            }, 1000);
          }
        }
      });
    }
  });

  function searchcity() {
    var state = $("#state1").val();
    var district = $("#district1").val();
    if (state == '') {
      alert("Please select state");
      return false;
    }
    if (district == '') {
      alert("Please select district");
      return false;
    }
    if (state !== '' && district !== '') {
      var newUrl = window.location.origin + window.location.pathname + "?district=" + district + '&state=' + state;
      window.location.href = newUrl;
      return false;
    }
  }
</script>