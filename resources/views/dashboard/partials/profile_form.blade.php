<form action="/profilo" method="POST" enctype="multipart/form-data">
               {{csrf_field()}}
               <input type="hidden" name="user_id" value="{{$currentUser->id}}">
                <div class="row">
                @include('errors.errors')
                  <div class="col-sm-8">
                    <div class="input-block">
                      <h4>Dati Personali</h4>
                      <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" value="{{old('name', $user->name)}}" required="required" placeholder="Nome" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Cognome</label>
                        <input type="text" name="surname" value="{{old('surname', $user->surname)}}" required="required" placeholder="Nome" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Nickname</label>
                        <input type="text" name="username" value="{{old('username', $user->username)}}"  placeholder="Nickname" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{old('email', $user->email)}}" required="required" placeholder="Email" class="form-control">
                      </div>
                    </div>
                    <div class="input-block">
                      <h4>Link Personali</h4>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="social_facebook" value="{{old('social_facebook', $user->social_facebook)}}"  placeholder="es: http.//facebook.com/mioprofilo" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Google</label>
                            <input type="text" name="social_google" value="{{old('social_google', $user->social_google)}}"  placeholder="es: https://plus.google.com/u/0/12345/posts" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Twitter</label>
                            <input type="text" name="social_twitter" value="{{old('social_twitter', $user->social_twitter)}}"  placeholder="es: http://twitter.com/mioprofilo" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="social_website" value="{{old('social_website', $user->social_website)}}"  placeholder="es: http://miosito.com" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="input-block">
                      <h4>Descrizione personale</h4>
                      <div class="row">
                        <div class="col-sm-12">
                          <textarea name="description" value="personal_description" rows="3"  class="form-control" placeholder="Scrivi qualcosa su di te">{{$user->description}}</textarea>
                        </div>
                      </div>
                    </div>

                    <div class="input-block">

                      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp; Salva Profilo</button><br>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="row">
                      <div class="col-md-12">
                          <div class="profile-pic-settings-box" style="background-image: url('{{$user->avatar}}');"></div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-xs-12" style="display:none;">
                              <div class="btn-upload-image-container">
                                <a class="btn btn-default btn-lg btn-block btn-upload btn-upload-image" onClick="$('#article-featured-image').trigger('click');">
                                  <i class="fa fa-camera"></i> Carica foto
                                </a>
                              </div>
                            </div>
                            <div class="col-xs-12">
                              <div class="btn-upload-image-container">
                                <input type="file" name="profileImage" class="file-loading" id="profile-image" >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </form>
