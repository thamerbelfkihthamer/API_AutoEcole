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
        @include('admin/Examen.create')
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
    <link href="{{asset('bower_components/select2/dist/css/select2.css')}}"  rel="stylesheet">
@stop

@section('footer')
    <script src="{{asset('bower_components/select2/dist/js/select2.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var CondidatsId = [];
            var typeexamen,car_id,moniteur_id,condidat_id;

            /* Start multiple select */

                $(".js-example-placeholder-multiple").select2({
                    placeholder: "Select a state"
                });
                var $eventLog = $(".js-event-log");
                var $eventSelect = $(".js-example-events");
                $eventSelect.on("select2:select", function (e) { log("select", e); });
                $eventSelect.on("select2:unselect", function (e) { log("unselect", e); });

            function log (name, evt) {
                if (!evt) {
                    var args = "{}";
                } else {
                    if(name ==="select"){
                        CondidatsId.push(evt.params.data.id);
                    }
                    else if(name === "unselect"){
                        var index =  CondidatsId.indexOf(evt.params.data.id);
                        if(index > -1){
                            CondidatsId.splice(index,1);
                        }
                    }
                }
            }

            /* End multiple select*/


console.log(CondidatsId);
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

                /*Start  push all examen to calander */
                events:function(start, end, timezone, callback){
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                        type: 'POST',
                        url: 'examen/getexamen',
                        dataType: 'json',
                        success: function(list) {
                            var events = [];
                            for(var i=0; i < list.length; i++){
                                events.push({
                                    title : list[i].type,
                                    start: list[i].starttime,
                                    end: list[i].endtime,
                                    id:list[i].id
                                });
                            }
                            callback(events);
                        },
                        error:function(list){
                            console.log(list);
                        }
                    });
                },

                /* End push all examen to calander*/

                select: function(start, end) {
                    $("#addexamen").modal();
                    $("#selectcar").hide();
                    $("#labcar").hide();
                    $("#selectmoniteur").hide();

                     typeexamen ="code";
                    $("#saveExamen").unbind();
                    $("#selectcodeconduit").on('change',function() {

                        var optionselected = $(this).find("option:selected");
                         typeexamen = optionselected.val();
                        if (typeexamen === "conduite") {
                            $("#selectcar").fadeIn(1000);
                            $("#labcar").fadeIn(1000);
                            $("#selectmoniteur").fadeIn(1000);
                        }
                        if (typeexamen === "code") {
                            var optionselected = $(this).find("option:selected");
                            typeexamen = optionselected.val();
                          }
                    });

                    $("#selectcar").on('change', function () {
                        var optionselected = $(this).find("option:selected");
                        car_id = optionselected.val();
                    });
                    $("#selectprof").on('change', function () {
                        var optionselected = $(this).find("option:selected");
                        moniteur_id = optionselected.val();
                    });
                    $("#selectcondidat").on('change', function () {
                        var optionselected = $(this).find("option:selected");
                        condidat_id = optionselected.val();
                    });

                    $("#save-Examen").on('click',function(){
                        $("#addexamen").modal("hide");
                        if(typeexamen !==""){
                            eventData = {
                                title: typeexamen,
                                start: start,
                                end: end
                            };
                            $('#calendar').fullCalendar('renderEvent', eventData, false); // stick? = true
                            $('#calendar').fullCalendar('unselect');

                            if(typeexamen==="code"){
                                var formDate= {
                                    'type' : typeexamen,
                                    'client_id':CondidatsId,
                                    'moniteur_id':moniteur_id,
                                    'starttime':start.format(),
                                    'endtime': end.format(),
                                    _token: "<?= csrf_token()?>",
                                }
                            }
                            if(typeexamen==="conduite"){
                                var formDate= {
                                    'type' : typeexamen,
                                    'vehicules_id':car_id,
                                    'client_id':condidat_id,
                                    'moniteur_id':moniteur_id,
                                    'starttime':start.format(),
                                    'endtime': end.format(),
                                    '_token': "<?= csrf_token()?>",
                                }

                            }

                            $.ajax({
                                headers:{'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                                url:'examen/addexamen',
                                type:'POST',
                                data:formDate,
                                dataType:'json',
                                encode:true,
                            }).done(function(data){
                                swal('Save!','Your Cour done.','success');
                            }).error(function(data){
                                sweetAlert('Oops...', 'Something went wrong !', 'error');
                            });
                        }
                        else{
                            setTimeout(function(){
                                sweetAlert('Oops...', 'Something went wrong !', 'error');
                                },1000);
                        }
                    });


                }
            });
        });
    </script>
@stop
