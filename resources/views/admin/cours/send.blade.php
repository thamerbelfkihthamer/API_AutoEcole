<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="{{asset('bower_components/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/bower_components/Materialize/dist/css/materialize.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet"/>
    <link href="{{ asset('app/css/index.css') }}" rel="stylesheet">

</head>
<body>


<div id="calendar">

</div>

<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/bootgrid/jquery.bootgrid.min.js') }}"></script>
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.js')}}"></script>
<script src="{{ asset('vendors/bower_components/Materialize/dist/js/materialize.js') }}"></script>
<script src="{{asset('bower_components/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();



        $('#calendar').fullCalendar({


            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },

            eventLimit:true,
            events: [
                {
                    title: 'My Event',
                    start: '2015-09-30',
                    description: 'This is a cool event'
                }
                // more events here
            ],
            buttonText: {
                today:    'today',
                month:    'month',
                week:     'week',
                day:      'day'
            },
            selectable:true,
            selectHelper:true,
            firstDay:1,
            weekends:false,
            businessHours:true,
            select: function(start, end) {

                swal({
                            title: 'Add Cour',
                            html: '<input type="text" class="input-field" id="thamer" placeholder="courname"/>'+'<br><input type="text" placeholder="f" id="description" class="input-field" /><br><input type="text" placeholder="text" id="des" class="input-field" />',
                            showCancelButton: true,
                            confirmButtonText: 'Save !',
                            closeOnConfirm: true
                        },
                        function(isConfirm)
                        {
                            var title = $('#thamer').val();
                            var description = $("#description").val();
                            if (title !== "") {
                                eventData = {
                                    title: title,
                                    description: description,
                                    start: start,
                                    end: end
                                };
                                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true

                            }

                            $('#calendar').fullCalendar('unselect');
                            setTimeout(function(){
                                if (isConfirm && title!=="") {

                                    // insertion de nouvelle cour
                                    var formDate= {
                                        'name' : title

                                    }
                                    $.post({
                                        url:'cours/send',
                                        date: formDate,
                                        datetype:'json',
                                        encode:true,
                                        error:function(xhr, textStatus, thrownError){
                                            sweetAlert('Oops...', 'Something ajax!', 'error');
                                        }


                                    }).done(function(data){
                                        swal(       'Save!',       'Your Cour done.',       'success'     );
                                    });
                                }
                                else{
                                    sweetAlert('Oops...', 'Something went wrong!', 'error');
                                }


                            },200);

                        });
            }









            //}
            /*
             swal({
             title: "An input!",
             text: 'Write something interesting:',
             type: 'input',
             showCancelButton: true,
             closeOnConfirm: true,
             animation: "slide-from-top"
             },
             function(inputValue){
             console.log("You wrote", inputValue);
             title = inputValue;
             if (title) {
             eventData = {
             title: title,
             start: start,
             end: end
             };
             $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
             }
             */

        });
    });



</script>

</body>
</html>