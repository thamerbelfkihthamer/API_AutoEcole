@extends('admin.index')
@section('title')
    Cours - index
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Cours | List </p>
                </header>
            </div>
        </div>

        @include('admin/cours.create')
        @include('admin/cours.ShowCour')
        <div class="row">
                <div class="col-lg-12" id="header">
                    <header>
                        <p class="text-center"> </p>
                    </header>
                </div><hr>
                <div class="col-lg-12 contenu">
                    <div class="col-lg-10 col-lg-offset-1"><hr>
                        <div id="calendar">

                        </div>
                    </div>
                </div>
        </div>
        </div>
@stop

@section('header')
<link href="{{asset('bower_components/select2/dist/css/select2.css')}}"  rel="stylesheet">
@stop

@section('footer')
    <script src="{{asset('bower_components/subscribe-betterjs/subscribe_better.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('bower_components/select2/dist/js/select2.js')}}" type="text/javascript"></script>
    <script>

        $(document).ready(function(){
            var CondidatsId = [],formattedeventdata = [],newevent = [], eventArray= [];
            var vehicule_id,condidat_id,teacher_id;
            var date = new Date();
            var d = date.getDate(),m = date.getMonth(),y = date.getFullYear();
            $(".js-example-placeholder-multiple").select2({
                placeholder: "Select a state"
            });
            var $eventLog = $(".js-event-log");
            var $eventSelect = $(".js-example-events");
            $eventSelect.on("select2:select", function (e) { log("select", e); });
            $eventSelect.on("select2:unselect", function (e) { log("unselect", e); });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
            /* Start gestion box */

            $("#selectcar").hide();
            $("#selectcondidatconduite").hide();
            $("#example-getting-started").hide();

            function showbox(){
                $(".sweet-overlay").fadeIn(300);
                $(".sweeta").slideDown(600);


            }

            function showcourbox(){
                $(".sweet-overlay").fadeIn(300);
                $(".sweetcourbox").slideDown(600);
            }


            $("#btnclose").on('click',function(){
                $(".sweet-overlay").fadeOut(300);
                $(".sweetcourbox").slideUp(600);
                $('.clientsss').empty();
                $('.moniteur').empty();
                $('.car').empty();
            });

            $("#cancel-box").on('click',function(){
                $(".sweet-overlay").fadeOut(600);
                $(".sweeta").slideUp(300);

            });

            /* End gestion box */

            /*  Start selectionner toutes les coures qui sont dans la base de donnée */




            /*  End selectionner toutes les coures qui sont dans la base de donnée */

            /* Start gestion fullcalendar */

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

                events:function(start, end, timezone, callback){
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                        type: 'POST',
                        url: 'cours/getevent',
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

                select: function(start, end) {
                    showbox();
                    var typecour ="code";
                    $("#save-event").unbind();
                    $("#selectcodeconduit").on('change',function(){
                        var optionSelected = $(this).find("option:selected");
                        typecour  = optionSelected.val();
                        if(typecour === "conduite"){
                            $("#selectcar").fadeIn(400);
                            $("#selectcondidatconduite").fadeIn(400);
                            $("#selectcondidat").fadeOut(400);
                            $(".select2-container").fadeOut(400);
                            $("#example-getting-started").fadeIn(400);
                            $("#selectcondidatcode").fadeOut(400);
                            $(".sweeta").animate({
                                height : '+=10px',
                            },400);
                        }
                        if(typecour==="code"){
                            $("#selectcar").fadeOut(400);
                            $("#selectcondidatconduite").fadeOut(400);
                            $("#example-getting-started").fadeOut(400);
                            $("#selectcondidat").fadeIn(400);
                            $(".select2-container").fadeIn(400);
                            $("#selectcondidatcode").fadeIn(400);
                            $(".sweeta").animate({height : '400px'},400);
                        }
                    });

                    $("#selectcar").on('change',function(){
                        var optionselected = $(this).find("option:selected");
                        vehicule_id = optionselected.val();
                    });

                    $("#selectcondidatconduite").on('change',function(){
                        var optionselected = $(this).find("option:selected");
                        condidat_id = optionselected.val();
                    });
                    $("#selectprof").on('change',function(){
                        var optionselected = $(this).find("option:selected");
                        teacher_id = optionselected.val();
                    });

                    $("#save-event").on('click',function(){
                        if (typecour !== "") {
                            $(".sweet-overlay").fadeOut(100);
                            $(".sweeta").slideUp(100);
                            eventData = {
                                title: typecour,
                                start: start,
                                end: end
                            };

                            $('#calendar').fullCalendar('renderEvent', eventData, false); // stick? = true
                            $('#calendar').fullCalendar('unselect');
                            // insertion de nouvelle cour
                            if(typecour ==="conduite"){
                                var formDate= {
                                    'type' : typecour,
                                    'vehicules_id':vehicule_id,
                                    'client_id':condidat_id,
                                    'moniteur_id':teacher_id,
                                    'starttime':start.format(),
                                    'endtime': end.format(),
                                    '_token': "<?= csrf_token()?>",
                                }
                            }else{
                                var formDate= {
                                    'type' : typecour,
                                    'client_id':CondidatsId,
                                    'moniteur_id':teacher_id,
                                    'starttime':start.format(),
                                    'endtime': end.format(),
                                    _token: "<?= csrf_token()?>",
                                }
                            }
                            $.ajax({
                                headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                                url:'cours/send',
                                type:'POST',
                                data: formDate,
                                dataType:'json',
                                encode:true,
                            }).done(function(data){
                                swal(       'Save!',       'Your Cour done.',       'success'     );
                            }).fail(function(data){
                                sweetAlert('Oops...', 'Something went wrong !', 'error');
                            });
                        }else{

                            setTimeout(function(){
                                sweetAlert('Oops...', 'Something went wrong !', 'error');
                            },1000);
                        }
                    });
                    $("#cancel-box").on('click',function(){
                        $(".sweet-overlay").fadeOut(600);
                        $(".sweeta").slideUp(300);
                        $(this).unbind();
                    });
                },
                editable: true,

                eventClick: function(event,jsEvent,view){
                    showcourbox();

                    var formDate= {
                        'eventid':event.id,
                    }
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                        url:'cours/getcondidat',
                        type:'post',
                        data: formDate,
                        dataType:'json',
                        encode:true,
                    }).done(function(data){
                        var tr;
                        var condidats=[];
                        for (var i = 0; i < data.success.length; i++) {
                            tr = $('<tr/>');
                            tr.append("<td>" + data.success[i].id + "</td>");
                            tr.append("<td>" + data.success[i].name + "</td>");
                            tr.append("<td>" + data.success[i].prenom + "</td>");
                            tr.append("<td>" + data.success[i].email + "</td>");
                            tr.append("<td>" + data.success[i].date_naisssance + "</td>");
                            tr.append("<td>" + data.success[i].tel + "</td>");
                            tr.append("<td>" + data.success[i].adresss + "</td>");
                            tr.append("<td>" + data.success[i].type_piece + "</td>");
                            tr.append("<td>" + data.success[i].num_piece + "</td>");
                            $('.clientsss').append(tr);
                            // add condidats to pdf table
                            var condidat=[
                                data.success[i].name,
                                data.success[i].prenom,
                                data.success[i].email,
                                data.success[i].date_naisssance,
                                data.success[i].tel,
                                data.success[i].adresss,
                                data.success[i].type_piece,
                                data.success[i].num_piece
                            ];
                            condidats.push(condidat);
                        }
                        for (var i = 0; i < data.moniteur.length; i++) {
                            tr = $('<tr/>');
                            tr.append("<td>" + data.moniteur[i].id + "</td>");
                            tr.append("<td>" + data.moniteur[i].name + "</td>");
                            tr.append("<td>" + data.moniteur[i].prenom + "</td>");
                            tr.append("<td>" + data.moniteur[i].email + "</td>");
                            tr.append("<td>" + data.moniteur[i].telephone + "</td>");
                            $('.moniteur').append(tr);
                        }
                        if(data.cour.type=="conduite") {
                            $('.carblock').show();
                            for (var i = 0; i < data.car.length; i++) {
                                tr = $("<tr/>");
                                tr.append("<td>" + data.car[i].id + "</td>");
                                tr.append("<td>" + data.car[i].name + "</td>");
                                tr.append("<td>" + data.car[i].matricule + "</td>");
                                tr.append("<td>" + data.car[i].date_fin_assurence + "</td>");
                                $('.car').append(tr);
                            }
                        }
                        else{
                            $('.carblock').hide();
                        }
                        /* print html data to pdf file */
                        var columns = ["First Name", "Last Name", "Email","Date naissance","Telephone","Adress","Type piece","Numero piece"];
                        var rows = [
                            [1, "Shaw", "Tanzania",],
                            [2, "Nelson", "Kazakhstan",],
                            [3, "Garcia", "Madagascar",],
                        ];

                        $("#printdata").on('click',function(){
                            var doc = new jsPDF('p', 'pt');
                            doc.autoTable(columns, condidats, {
                                styles: {
                                    fillColor: [100, 255, 255],
                                    fontSize:8,
                                },
                                columnStyles: {
                                    id: {fillColor: 255}
                                },
                                margin: {top: 60},
                                beforePageContent: function(data) {
                                    doc.text("Header", 40, 30);
                                }
                            });
                            doc.autoTable(columns, rows, {
                                styles: {fillColor: [100, 255, 255]},
                                columnStyles: {
                                    id: {fillColor: 255}
                                },
                                margin: {top: 200},
                                beforePageContent: function(data) {
                                    doc.text("Header", 40, 30);
                                }
                            });
                            doc.save('table.pdf');
                        });
                    }).fail(function(data){
                        sweetAlert('Oops...', 'Something went wrong !', 'error');
                        console.log(data);
                    });
                }


            });
        });
    </script>
@stop


