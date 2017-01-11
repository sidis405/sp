<form action="/password" method="POST">
  {{csrf_field()}}
  <div class="row">
  @include('errors.errors')
    <div class="col-sm-8">
      <div class="input-block">
        <h4>Dati Personali</h4>
        <div class="form-group">
          <label>Password Attuale</label>
          <input type="password" name="current_password" value="" required="required" pattern="" title="" placeholder="Password Attuale" class="form-control">
        </div>
        <div class="form-group">
          <label>Nuova Password</label>
          <input type="password" name="new_password" value="" required="required" pattern="" title="" placeholder="Nuova Password" class="form-control">
        </div>
        <div class="form-group">
          <label>Ripeti Password</label>
          <input type="password" name="repeat_password" value="" required="required" pattern="" title="" placeholder="Ripeti Password" class="form-control">
        </div>
      </div>
      <div class="input-block">
        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp; Aggiorna Password</button><br>
      </div>
    </div>
    <div class="col-sm-4">
      &nbsp;
    </div>
  </div>
</form>