@extends('admin.index')
@section('title')
    Examen - index
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class=" col-lg-12" id="header">
                <header>
                    <p>Home | Examen | List </p>
                </header>
            </div>
        </div>
        @include('admin/Examen.create')
        @include('admin/Examen.show')
        <div class="row">
            <div class=" col-lg-12" id="header">
                <header>
                    <p class="text-center">Examen</p>
                </header>
            </div><hr>
            <div class=" col-lg-12 contenu">
                <div class=" col-lg-10 col-lg-offset-1"><hr>
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
    <script src="{{asset('bower_components/select2/dist/js/select2.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){

            /* Start variable declaration*/
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var CondidatsId = [];
                var typeexamen,car_id,moniteur_id,condidat_id;
            var moniteurcol =[];
            var vehiculecol = [];
            var moniteurrow = [];
            var vehiculerow = [];
            var moniteurhome = [];
            var vehiculehome =[];
            /*End variable declaration */

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

            /*------------------------------------------------
                         Start full calendar
             ------------------------------------------------*/


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

                /*--------------------------------------------------------------
                                  Start  render all examen to calander
                ----------------------------------------------------------------*/
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


                /*--------------------------------------------------------------
                                 End  render all examen to calander
                 ----------------------------------------------------------------*/

                /*--------------------------------------------------------------
                                   Start  Select and create examen
                 ----------------------------------------------------------------*/

                select: function(start, end) {
                    $("#addexamen").modal();
                    $("#labcar").hide();
                    $("#labconduit").hide();

                     typeexamen ="code";
                    $("#saveExamen").unbind();
                    $("#selectcodeconduit").on('change',function() {

                        var optionselected = $(this).find("option:selected");
                         typeexamen = optionselected.val();
                        if (typeexamen === "conduite") {
                            $("#labcar").fadeIn(1000);
                            $("#labconduit").fadeIn(1000);
                            $("#condidats").fadeOut(1000);
                        }
                        if (typeexamen === "code") {
                            $("#labcar").fadeOut(1000);
                            $("#labconduit").fadeOut(1000);
                            $("#condidats").fadeIn(1000);
                            var optionselected = $(this).find("option:selected");
                            typeexamen = optionselected.val();
                          }
                    });

                    /*--------------------------------------------------------------
                                 Start On change listener for all select box
                     ----------------------------------------------------------------*/

                    $("#selectcar").on('change', function () {
                        var optionselected = $(this).find("option:selected");
                        car_id = optionselected.val();
                    });
                    $("#selectprof").on('change', function () {
                        var optionselected = $(this).find("option:selected");
                        moniteur_id = optionselected.val();
                    });
                    $("#selectcondidatconduite").on('change', function () {
                        var optionselected = $(this).find("option:selected");
                        condidat_id = optionselected.val();
                    });

                    /*--------------------------------------------------------------
                               End On change listener for all select box
                     ----------------------------------------------------------------*/


                    /*--------------------------------------------------------------
                                     Start Save Examen processing
                     ----------------------------------------------------------------*/
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

                    /*--------------------------------------------------------------
                                  End Save Examen processing
                     ----------------------------------------------------------------*/


                },
                /*--------------------------------------------------------------
                                 End  Select and create examen
                 ----------------------------------------------------------------*/


                /*---------------------------------------------------------------
                                     Start examen click processing
                 ---------------------------------------------------------------*/
                editable: true,
                eventClick: function(event,jsEvent,view){
                    if($("#showexamen").modal()){
                        $('.clientsss').empty();
                        $('.moniteur').empty();
                        $('.car').empty();
                    }


                    var formDate= {
                        'eventid':event.id,
                        'type':event.title,
                    }

                    $.ajax({
                        headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                        url:'examen/getcondidatsexamen',
                        type:'POST',
                        data: formDate,
                        dataType:'json',
                        encode:true,
                    }).done(function(data){
                        var tr;
                        var condidats=[];
                        for (var i = 0; i < data.condidats.length; i++) {
                            tr = $('<tr/>');
                            tr.append("<td>" + data.condidats[i].id + "</td>");
                            tr.append("<td>" + data.condidats[i].name + "</td>");
                            tr.append("<td>" + data.condidats[i].prenom + "</td>");
                            tr.append("<td>" + data.condidats[i].email + "</td>");
                            tr.append("<td>" + data.condidats[i].date_naisssance + "</td>");
                            tr.append("<td>" + data.condidats[i].tel + "</td>");
                            tr.append("<td>" + data.condidats[i].adresss + "</td>");
                            tr.append("<td>" + data.condidats[i].num_piece + "</td>");
                            $('.clientsss').append(tr);
                            // add condidats to pdf table
                            var condidat=[
                                data.condidats[i].name,
                                data.condidats[i].prenom,
                                data.condidats[i].email,
                                data.condidats[i].date_naisssance,
                                data.condidats[i].tel,
                                data.condidats[i].adresss,
                                data.condidats[i].type_piece,
                                data.condidats[i].num_piece
                            ];
                            condidats.push(condidat);
                        }
                         for(var i=0;i<data.examinateur.length;i++) {
                             tr = $('<tr/>');
                             tr.append("<td>" + data.examinateur[i].id + "</td>");
                             tr.append("<td>" + data.examinateur[i].name + "</td>");
                             tr.append("<td>" + data.examinateur[i].prenom + "</td>");
                             tr.append("<td>" + data.examinateur[i].email + "</td>");
                             tr.append("<td>" + data.examinateur[i].telephone + "</td>");
                             $('.moniteur').append(tr);
                             moniteurrow = [
                                 data.examinateur[i].id,
                                 data.examinateur[i].name,
                                 data.examinateur[i].prenom,
                                 data.examinateur[i].email,
                                 data.examinateur[i].telephone
                             ]
                             moniteurhome.push(moniteurrow);
                         }
                        if(data.examen.type=="conduite") {
                            $('.carblock').show();
                            for (var i = 0; i < data.vehicule.length; i++) {
                                tr = $("<tr/>");
                                tr.append("<td>" + data.vehicule[i].id + "</td>");
                                tr.append("<td>" + data.vehicule[i].name + "</td>");
                                tr.append("<td>" + data.vehicule[i].matricule + "</td>");
                                tr.append("<td>" + data.vehicule[i].date_fin_assurence + "</td>");
                                $('.car').append(tr);
                                vehiculerow = [
                                        data.vehicule[i].id,
                                                data.vehicule[i].name,
                                                data.vehicule[i].matricule,
                                                data.vehicule[i].date_fin_assurence
                                        ]
                                vehiculehome.push(vehiculerow);
                            }
                        }
                        else{
                            $('.carblock').hide();
                        }
                        /*---------------------------------------------------------
                                         Start print html data to pdf file
                         ------------------------------------------------------------*/
                        var columns = ["First Name", "Last Name", "Email","Date naissance","Telephone","Adress","Type piece","Numero piece"];
                        moniteurcol = ["#","Fist Name","LastName","Email","Telephone"];
                        vehiculecol =["#","Name","Matricule","Date fin assurence"];

                        $("#printexamen").on('click',function(){
                            var doc = new jsPDF('p', 'pt');
                            doc.autoTable(moniteurcol, moniteurhome, {
                                styles: {fillColor: [100, 255, 255],
                                    fontSize:8,},
                                columnStyles: {
                                    id: {fillColor: 255}
                                },
                                margin: {top: 200},
                                beforePageContent: function(data) {
                                    doc.text("Examinateur", 40, 170);

                                }
                            });
                            moniteurhome = [];
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
                                    doc.text("Condidats", 40, 30);
                                }
                            });
                            condidats = [];
                            if(data.examen.type=="conduite") {
                                doc.autoTable(vehiculecol, vehiculehome, {
                                    styles: {
                                        fillColor: [100, 255, 255],
                                        fontSize: 8,
                                    },
                                    columnStyles: {
                                        id: {fillColor: 255}
                                    },
                                    margin: {top: 300},
                                    beforePageContent: function (data) {
                                        doc.text("Vehicule", 40, 270);
                                    }
                                });
                                vehiculehome =[];
                            }
                            doc.save('examen.pdf');
                        });
                    }).fail(function(data){
                        sweetAlert('Oops...', 'Something went wrong !', 'error');
                        console.log(data);
                    });

                    /*---------------------------------------------------------
                                    End print html data to pdf file
                     ------------------------------------------------------------*/

                }

                /*----------------------------------------------------------------
                                    End examen click processing
                 -----------------------------------------------------------------*/
            });
        });
    </script>
@stop
