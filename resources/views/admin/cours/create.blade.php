<!-- Modal -->
<div class="modal fade" id="addcour" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:green;" class="text-center"> add Cour</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="selectcodeconduit">Select Cour :</label>
                        <select id="selectcodeconduit" class="form-control">
                            <option value="code" selected="selected">CODE</option>
                            <option value="conduite">CONDUITE</option>
                        </select><br>
                    </div>
                    <div class="form-group">
                        <label for="selectprof">Select Teacher :</label>
                        <select  class="form-control" id="selectprof">
                            @foreach($moniteurs as $moniteur)
                                <option value="{{$moniteur->id}}">{{$moniteur->name}} {{$moniteur->prenom}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group" id="labcar">
                        <label for="selectcar">Select Car :</label>
                        <select id="selectcar" class="form-control">
                            @foreach( $cars as $car)
                                <option value="{{$car->id}}">{{$car->name}}</option>
                            @endforeach
                        </select><br>
                    </div>
                    <div class="form-group" id="condidats">
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-2">
                                <label  for="selectcondidat">Select Condidats :</label>
                                <select id="selectcondidat" multiple="multiple" class="js-example-placeholder-multiple js-event-log js-example-events" placeholder="select condidat">
                                    @foreach($clients as $client)
                                        <option  value="{{$client->id}}">{{$client->name}}{{$client->prenom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="labconduit">
                        <label for="selectcondidatconduite">Select Condidat :</label>
                        <select id="selectcondidatconduite" class="form-control">
                            @foreach($clients as $client)
                                <option  value="{{$client->id}}">{{$client->name}}{{$client->prenom}}</option>
                            @endforeach
                        </select><hr>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div  id="save-cour" class="btn btn-default btn-success pull-left"><span class="glyphicon glyphicon-ok-sign"></span> Save</div>
                <button type="submit" class="btn btn-default btn-danger pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>
