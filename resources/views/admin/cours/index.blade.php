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
        <!-- debut box -->
        <div class="sweet-overlay">
        </div>
        <div class="sweeta">
            <div class="container">
               <div class="row">
                   <div class="col-lg-3 col-lg-offset-1">
                       <h3> Add Cour</h3>
                       <div class="form-group"><hr>
                           <select id="selectcodeconduit" class="selectpicker">
                               <option disabled="disabled">Select Cour Type</option>
                               <option value="code" selected="selected">CODE</option>
                               <option value="conduite">CONDUITE</option>
                           </select><br>
                           <select id="selectprof">
                               <option disabled="disabled" selected="selected">Select Teacher</option>
                               @foreach($moniteurs as $moniteur)
                                   <option value="{{$moniteur->id}}">{{$moniteur->name}} {{$moniteur->prenom}}</option>
                               @endforeach
                           </select><br>
                           <select id="selectcar">
                               <option disabled="disabled" selected="selected">Select Car</option>
                               @foreach( $cars as $car)
                                   <option value="{{$car->id}}">{{$car->name}}</option>
                               @endforeach
                           </select><br>
                           <select id="selectcondidat" multiple="multiple" class="js-example-placeholder-multiple js-event-log js-example-events" placeholder="select condidat">
                               @foreach($clients as $client)
                                   <option  value="{{$client->id}}">{{$client->name}}{{$client->prenom}}</option>
                                @endforeach
                           </select>
                           <select id="selectcondidatconduite">
                               <option disabled="disabled" selected="selected">Select Condidat</option>
                               @foreach($clients as $client)
                                   <option  value="{{$client->id}}">{{$client->name}}{{$client->prenom}}</option>
                               @endforeach
                           </select><hr>
                           <input type="submit" class="btn btn-primary" value="Save !" id="save-event">
                           <input type="submit" class="btn btn-danger" value="Cancel" id="cancel-box">
                       </div>
                   </div>
               </div>
            </div>
        </div>

        <div class="sweetcourbox">
            <div class="container-fuild">
                <div class="row-fuild">
                    <button class="btn btn-danger" id="btnclose">
                        <i class="fa fa-times"></i>
                    </button>
                    <div class="col-lg-12" id="header">
                        <header>
                            <div class="col-lg-1">
                                <button class="btn btn-primary" id="printdata">
                                    <i class="fa fa-print"></i>
                                </button>
                            </div>
                            <p>Condidats List </p>
                        </header>
                    </div>
                </div>
                <div class="row-fuild">
                    <div class="col-lg-10  contenu">
                        <div class="table-responsive" id="clientid">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                <tr>
                                    <th data-column-id="id">N</th>
                                    <th data-column-id="firstname">First Name</th>
                                    <th data-column-id="lastname">Last Name</th>
                                    <th data-column-id="email">Email</th>
                                    <th data-column-id="datenaissance">Date naissance</th>
                                    <th data-column-id="telephone">Telephone</th>
                                    <th data-column-id="adress">Adress</th>
                                    <th data-column-id="piecetype">CIN/PASSPORT</th>
                                    <th data-column-id="numpiece">Resultat</th>
                                    <th data-column-id="delete"></th>
                                </tr>
                                </thead>
                                <tbody class="clientsss">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row-fuild carblock">
                    <div class="col-lg-12" id="header">
                        <header>
                            <p>Car </p>
                        </header>
                    </div>
                    <div class="row-fuild">
                        <div class="col-lg-10 contenu">
                            <div class="table-responsive" id="clientid">
                                <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="id">#</th>
                                        <th data-column-id="firstname"> Name</th>
                                        <th data-column-id="lastname">Matricule</th>
                                        <th data-column-id="cin">Date fin assurence</th>
                                    </tr>
                                    </thead>
                                    <tbody class="car">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fuild">
                    <div class="col-lg-12" id="header">
                        <header>
                            <p>Moniteur </p>
                        </header>
                    </div>
                    <div class="row-fuild">
                        <div class="col-lg-10 contenu">
                            <div class="table-responsive" id="clientid">
                                <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th data-column-id="id">#</th>
                                        <th data-column-id="firstname">First Name</th>
                                        <th data-column-id="lastname">Last Name</th>
                                        <th data-column-id="email">Email</th>
                                        <th data-column-id="telephone">Telephone</th>
                                    </tr>
                                    </thead>
                                    <tbody class="moniteur">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin box-->
        <div class="row">
                <div class="col-lg-12" id="header">
                    <header>
                        <p class="text-center"> </p>
                        <ul class="actions">
                            <a href="{{ route('cours.create') }}"><i class="md md-person-add"></i></a>
                        </ul>
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
<link href="{{asset('bower_components/subscribe-betterjs/subscribe_better.css')}}" rel="stylesheet">
<link href="{{asset('bower_components/select2/dist/css/select2.css')}}"  rel="stylesheet">
@stop

@section('footer')
    <script src="{{asset('bower_components/subscribe-betterjs/subscribe_better.min.js')}}"></script>
    <script src="{{asset('bower_components/select2/dist/js/select2.js')}}"></script>
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

            /*  Start selectionner toutes les coures qui sont dans la base de donn�e */




            /*  End selectionner toutes les coures qui sont dans la base de donn�e */

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
                        console.log(vehicule_id);
                    });

                    $("#selectcondidatconduite").on('change',function(){
                        var optionselected = $(this).find("option:selected");
                        condidat_id = optionselected.val();
                    });
                    $("#selectprof").on('change',function(){
                        var optionselected = $(this).find("option:selected");
                        teacher_id = optionselected.val();
                        var ss = optionselected.text();
                        console.log(ss);
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
                                console.log(data);
                                swal(       'Save!',       'Your Cour done.',       'success'     );
                            }).fail(function(data){
                                sweetAlert('Oops...', 'Something went wrong !', 'error');
                                console.log(data);
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
                            tr.append("<td>" + data.success[i].num_piece + "</td>");
                            tr.append("<td><input type='checkbox'></td>");

                            $('.clientsss').append(tr);
                            // add condidats to pdf table
                            var condidat=[
                                data.success[i].id,
                                data.success[i].name,
                                data.success[i].prenom,
                                data.success[i].email,
                                data.success[i].date_naisssance,
                                data.success[i].tel,
                                data.success[i].adresss,
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
                        var columns = ["N�","First Name", "Last Name", "Email","Date naissance","Telephone","Adress","CIN/PASSPORT","Resultat"];

                        $("#printdata").on('click',function(){
                            var doc = new jsPDF('p', 'pt'),margin=2,verticalOffset=margin;
                            doc.setFontSize(10);
                            doc.text(20,50,"Ecole : ");
                            doc.text(50,50,"tunis");
                            doc.text(20,80,"Date : ");
                            doc.text(50,80,"09/05/2016");
                            doc.text(400,65,"Nom d'examinateur : ");
                            doc.text(492,65,"Mohamed ben salah");
                            doc.setFontSize(14);
                            doc.text(250,120,'Liste des condidats');
                            doc.autoTable(columns,
                                          condidats,
                                    {
                                        styles:{
                                            fontSize:8,
                                            lineWidth:0.3,
                                            font: "helvetica", // helvetica, times, courier
                                            fontStyle:'normal',
                                            rowHeight:20,
                                            columnWidth:'auto',
                                        },
                                        startY:150,

                                    });
                            doc.save('cour.pdf');
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

