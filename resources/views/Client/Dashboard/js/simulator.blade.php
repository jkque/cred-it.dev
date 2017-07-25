<script>
$(document).ready(function() {
 $('select').material_select();
 $('.datepicker').pickadate();
 $("form input[type='submit']").on('click', function(e){
 	e.preventDefault();
 	$(this).attr('disabled',true);
 	$("form").submit();
 });
 });

 </script>
