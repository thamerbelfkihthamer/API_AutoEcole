/**
 * Created by ThamerBelfki on 15/09/2015.
 */

$(document).ready(function () {

    $('.datepicker').pickadate();

       /* Start  car notification  */



    $("#click").on('click',function(){
        $.ajax({
            headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
            type:'POST',
            url:'vehicules/getnotification',
            data:'test',
            dataType:'json',
            success: function(list) {
                console.log(list)
            },
            error:function(list){
               alert(list);
            }
        });
    });

/*

    $(".dropdown-menu li a").on('click',function(){
        $.ajax({
            headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
            type:'POST',
            url:'vehicules/getnotification',
            data:'test',
            dataType:'json',
            encode:true,
            success: function(list) {
                console.log(list)
            },
            error:function(list){
                console.log(list);
            }
        });
        $(".sweet-overlay").fadeIn(300);
        $(".notificationinformation").slideDown(600);
        $("#closenotif").on('click',function(){
            $(".sweet-overlay").fadeOut(2000);
            $(".notificationinformation").slideUp(300);
        });
    });
    */

    /* End car notification*/
});