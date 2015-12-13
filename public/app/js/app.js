/**
 * Created by ThamerBelfki on 15/09/2015.
 */

$(document).ready(function () {



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



});