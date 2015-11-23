
    <!-- Modal -->
    <div class="modal fade" id="addexamen" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 style="color:green;" class="text-center"> add Examen</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <select id="selectcodeconduit" class="selectpicker">
                                <option disabled="disabled">Select Cour Type</option>
                                <option value="code" selected="selected">CODE</option>
                                <option value="conduite">CONDUITE</option>
                            </select><br>
                        </div>
                        <div class="form-group">
                            <select id="selectprof">
                                <option disabled="disabled" selected="selected">Select Teacher</option>
                                @foreach($moniteurs as $moniteur)
                                    <option value="{{$moniteur->id}}">{{$moniteur->name}} {{$moniteur->prenom}}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <div class="form-group">
                            <select id="selectcar">
                                <option disabled="disabled" selected="selected">Select Car</option>
                                @foreach( $cars as $car)
                                    <option value="{{$car->id}}">{{$car->name}}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <div class="form-group">
                            <select id="selectcondidat" multiple="multiple" class="js-example-placeholder-multiple js-event-log js-example-events" placeholder="select condidat">
                                @foreach($clients as $client)
                                    <option  value="{{$client->id}}">{{$client->name}}{{$client->prenom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="selectcondidatconduite">
                                <option disabled="disabled" selected="selected">Select Condidat</option>
                                @foreach($clients as $client)
                                    <option  value="{{$client->id}}">{{$client->name}}{{$client->prenom}}</option>
                                @endforeach
                            </select><hr>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked>Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <p>Not a member? <a href="#">Sign Up</a></p>
                    <p>Forgot <a href="#">Password?</a></p>
                </div>
            </div>
        </div>
    </div>
