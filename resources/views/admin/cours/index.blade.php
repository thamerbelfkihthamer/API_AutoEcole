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
                        <div id="calendar">
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
                            buttonText: {
                                today:    'today',
                                week:     'week',
                                day:      'day'
                            },
                            theme:true,
                            events:formattedeventdata,
                            selectable:true,
                            selectHelper:true,
                            droppable:true,
                            weekends:false,
                            businessHours:true,
                            defaultView:'agendaWeek',
                            eventLimit:true,
                                /*

                        events:function(start,end,callback,day){


                            $.ajax({
                                headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                                type: 'POST',
                                url: 'cours/getevent',
                                dataType: 'json',
                                data: {
                                    start: start.unix(),
                                    end: end.unix()
                                },
                                success: function(doc) {
                                    for(var i=0;i<doc.data.length;i++){
                                        /*
                                        newevent[0]= doc.data[i].type;
                                        newevent[1]= doc.data[i].starttime;
                                        newevent[2] = doc.data[i].endtime;
                                        eventArray.push(newevent);
                                        */
                        /*
                                        eventArray.push({
                                           title:doc.data[i].type,
                                           start: doc.data[i].starttime,
                                            end: doc.data[i].endtime
                                        });
                                    }
                                    //  console.log('eventarray taille'+eventArray.length);
                                    for(var k=0;k<eventArray.length;k++){
                                        formattedeventdata.push({
                                            title:eventArray[k][0],
                                            start:eventArray[k][1],
                                            end:eventArray[k][2]
                                        });
                                    }


                                   // console.log(formattedeventdata);
                                }
                            });
                            $('#calendar').fullCalendar('renderEvent', eventArray,true);
                            callback(eventArray);
                        },
                        */
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
                                            'starttime':start.format(),
                                            'endtime': end.format(),
                                            '_token': "<?= csrf_token()?>",
                                        }
                                    }else{
                                        var formDate= {
                                            'type' : typecour,
                                            'client_id':CondidatsId,
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
                                eventLimit: true, // allow "more" link when too many events






                        eventClick: function(event,jsEvent,view){
                           // alert(event.title);
                            alert("Event ID: " + event.id + " Start Date: " + event.start.format() + " End Date: " + event.end.format());
                            /*
                            swal({
                                title: 'edit Cour',
                                html:'<input type="text" name="type" class="input-field" id="thamer" value="" />'+
                                '<br><input type="text" id="description" name="sujet" class="input-field" />',
                                showCancelButton: true,
                                confirmButtonText: 'Save !',
                                closeOnConfirm: true
                            });
                            $("#thamer").val(event.title);
                            $("#description").val(event.description);
*/
                        }

                    });
                });
            </script>
        @stop

