
 <script src="<?php echo base_url(); ?>support_assets/js/jquery.min.js"></script>
 <script src="<?php echo base_url(); ?>support_assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>support_assets/js/jquery-ui.js"></script>
 
    <script src="<?php echo base_url(); ?>support_assets/js/jquery.validate.min.js"></script>
 <script src="<?php echo base_url(); ?>support_assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>support_assets/js/dataTables.bootstrap4.min.js"></script>

  <script src="<?php echo base_url(); ?>support_assets/js/main.js"></script>  
  <script src="<?php echo base_url(); ?>support_assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url(); ?>support_assets/vendors/js/vendor.bundle.addons.js"></script>
  <script src="<?php echo base_url(); ?>support_assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>support_assets/js/misc.js"></script>
  <script src="<?php echo base_url(); ?>support_assets/js/dashboard.js"></script>
  <script src="<?php echo base_url(); ?>support_assets/js/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>support_assets/js/jquery.datetimepicker.js"></script>
  <script>
 
  </script>

<script>

  jQuery.datetimepicker.setDateFormatter({
  parseDate: function(date, format) {
    var d = moment(date, format);
    return d.isValid() ? d.toDate() : false;
  },
  formatDate: function(date, format) {
    return moment(date).format(format);
  }
});
$('#event_date').datetimepicker({
  minDate : moment(),
  step: 15,
  format: 'YYYY-MM-DD H:mm',
  formatTime: "H:mm",
  formatDate: "YYYY-MM-DD"
});
        </script>
