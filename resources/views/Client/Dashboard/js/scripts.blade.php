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

    if($(window).width() > 1366){ //iPad Pro
      $('#nav').addClass('container');
      $('#main').addClass('container');

    }
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
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]

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




});
</script>