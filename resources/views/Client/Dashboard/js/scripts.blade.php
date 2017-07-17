<script>
$(document).ready(function() {
  $(".button-collapse").sideNav();
  $("nav").find(".dropdown-content").css({
    "margin-top": $('nav').height()
  });

  $(window).resize(function(){

    if($(window).width() > 992){
      $('#main').css({
        'margin-left': $('.side-nav').width()
      });


    }

    // if($(window).width() > 1366){ //iPad Pro
    //   $('#nav').addClass('container');
    //   $('#main').addClass('container');
    //
    // }
    if($(window).width() <= 1366){
      $('.row .col').css({
        'padding': '0'
      });
    }

  });



  $('ul.tabs').tabs();
  window.dispatchEvent(new Event('resize'));
  // $('.side-nav').on('click', function(){
  //   console.log('slide out clicked!');
  //   $(this).sideNav('hide');
  // });
  $('#dataTable').DataTable({
        // responsive: true,
        // columnDefs: [
        //     {
        //         targets: [ 0, 1, 2 ],
        //         className: 'mdl-data-table__cell--non-numeric'
        //     }
        // ],
        // lengthChange: false,
        dom: 'Bfrtip',


    } );

    $('#dt-tabs a').on('click',function(){

      console.log(this.id);

      if(this.id == "all"){
          $('tbody tr').show();
        }else{
          showType(this.id);
          hideType(this.id);
        }
      });

      function showType(type){
        $('tbody tr[type="'+type+'"]').show();
      }

      function hideType(type){
          $('tbody tr').not("[type='"+type+"']").hide();
        }



        $('.datepicker').pickadate({
         selectMonths: true, // Creates a dropdown to control month
         selectYears: 15 // Creates a dropdown of 15 years to control year
       });

       $('.timepicker').pickatime({
        default: 'now', // Set default time
        fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
        twelvehour: false, // Use AM/PM or 24-hour format
        donetext: 'OK', // text for done-button
        cleartext: 'Clear', // text for clear-button
        canceltext: 'Cancel', // Text for cancel-button
        autoclose: false, // automatic close timepicker
        ampmclickable: true, // make AM PM clickable
        aftershow: function(){} //Function for after opening timepicker
      });

       $('select').material_select();




});
</script>
