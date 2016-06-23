<div class="container-fluid bleeding">
      <div class="registration-form">
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <h1 id="register">Registrati</h1>
            <form class="form-horizontal" action="/auth/register" method="POST">
            {{csrf_field()}}
              <div class="form-group">
                <input type="text" name="name" value="{{ old('name') }}"  placeholder="Nome" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text"  name="surname" value="{{ old('surname') }}"  placeholder="Cognome" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="text"  name="username" value="{{ old('username') }}" placeholder="Nickname" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="email"  name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Conferma password" class="form-control" required>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <input type="checkbox" required>
                  <label>Ho letto e accetto i <a href="#">Termini e le Condizioni</a></label>
                </div>
                <div class="col-sm-6"><button type="subbmit" class="btn btn-primary btn-lg btn-block">Continua</button></div>
              </div>
            </form>
          </div>
          <div class="col-sm-3"></div>
        </div>
      </div>
    </div>