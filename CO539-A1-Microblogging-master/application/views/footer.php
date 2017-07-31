<!-- Close the main content div (opened in the header)  -->
</div>

<!-- 
	Required by Zurb Foundation, php echoes added to make it work with CodeIgniter.
	Checks for Zepto support and loads jQuery if necessary, loads the scripts and initialises Foundation
-->
<script>
  document.write('<script src=' +
  ('__proto__' in {} ? '<?php echo base_url("js/vendor/zepto")?>' : '<?php echo base_url("js/vendor/jquery")?>') +
  '.js><\/script>')
  </script>
  <script src="<?php echo base_url('js/foundation/foundation.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.alerts.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.clearing.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.cookie.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.dropdown.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.forms.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.joyride.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.magellan.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.orbit.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.placeholder.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.reveal.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.section.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.tooltips.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.topbar.js')?>"></script>
  <script src="<?php echo base_url('js/foundation/foundation.interchange.js')?>"></script>
  <script>
    $(document).foundation();
</script>

</body>
</html>