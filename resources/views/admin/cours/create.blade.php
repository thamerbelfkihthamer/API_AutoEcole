

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

