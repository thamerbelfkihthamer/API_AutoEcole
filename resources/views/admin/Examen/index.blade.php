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
                    right: 'month,agendaWeek,agendaDay'
                },

                eventLimit:true,
                buttonText: {
                    today:    'today',
                    month:    'month',
                    week:     'week',
                    day:      'day'
                },
                eventColor: '#378006',
                selectable:true,
                selectHelper:true,
                firstDay:1,
                weekends:false,
                businessHours:true,
                select: function(start, end) {

                    swal({
                                title: 'Add Examen',
                                html: '<input type="text" class="input-field" id="thamer" placeholder="Examen"/><br><input type="text" placeholder="f" id="description" class="input-field" /><br><input type="text" placeholder="text" id="des" class="input-field" /><select id="selectcodeconduit" class="selectpicker"><option value="code">CODE</option> <option value="conduite">CONDUITE</option></select>',
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

                                        // insertion de nouvelle examen
                                        var formDate= {
                                            'name' : title,
                                            _token: "<?= csrf_token()?>",

                                        }

                                        $.ajax({
                                            headers: {'X-CSRF-TOKEN': '<?= csrf_token()?>'},
                                            url:'examen/send',
                                            type:'POST',
                                            data: formDate,
                                            dataType:'json',
                                            encode:true,
                                        }).done(function(data){
                                            console.log(data);
                                            swal(       'Save!',       'Your Cour done.',       'success'     );
                                        }).fail(function(data){
                                            sweetAlert('Oops...', 'Something went wrong ajaxxxxxxxx!', 'error');
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

@stop
