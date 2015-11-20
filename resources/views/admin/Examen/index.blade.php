@extends('admin.index')
@section('title')
    Examen - index
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Examen | List </p>
                </header>
            </div>
        </div>
        @include('admin/Examen.addExamen')
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">Examen</p>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                    <div id="calendar">
                    </div>
            </div>
        </div>
    </div>

@stop

@section('header')

@stop

@section('footer')
    <script>
        $(document).ready(function(){
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            function slecta(){
                $("select").on('change',function(){
                    //console.log($("#selectcodeconduit option:selected").text());
                    var optionSelected = $(this).find("option:selected");
                    var valueSelected  = optionSelected.val();
                    var textSelected   = optionSelected.text();
                    console.log(this.value);
                });
            }



            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek,agendaDay'
                },
                minTime:"08:00:00",
                maxTime:"20:00:00",
                scrollTime:'15:00:00',
                allDaySlot:false,
                buttonText: {
                    today:    'today',
                    week:     'week',
                    day:      'day'
                },
                theme:true,
                selectable:true,
                selectHelper:true,
                droppable:true,
                weekends:false,
                businessHours:
                {
                    start: '8:00', // a start time (10am in this example)
                    end: '18:00', // an end time (6pm in this example)
                    dow: [ 1, 2, 3, 4 ]
                    // days of week. an array of zero-based day of week integers (0=Sunday)
                    // (Monday-Thursday in this example)
                },
                defaultView:'agendaWeek',
                eventLimit:true,

                select: function(start, end) {
                    $("#myModal").modal();
                }
            });
        });
    </script>
@stop
