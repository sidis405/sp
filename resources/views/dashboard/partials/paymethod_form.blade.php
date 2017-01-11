<form action="/metodi" method="POST">

<div class="row">
@include('errors.errors')
                <div class="col-sm-8">
                {{ csrf_field() }}
                  <div class="input-block">
                    <h4>Metodo di pagamento</h4>
                    <div class="payment-method-box">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="radio-inline">
                            <label for="paypal-method">
                              <input id="payment_paypal" class="payment_option" type="radio" name="pay-method" value="payment_paypal" 
                              @if($user->payment_paypal == "1") checked="checked" @endif
                              >Paypal
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="radio-inline">
                            <label for="iban-method">
                              <input id="payment_iban" class="payment_option"  type="radio" name="pay-method" value="payment_iban" 
                              @if($user->payment_iban == "1") checked="checked" @endif
                              >IBAN
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="input-block paypal_section" style="@if($user->payment_paypal != "1") display:none @endif">
                    <h4>Intestatario Email Paypal</h4>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input type="email" name="payment_detail_paypal_email" value="{{old('name', $user->payment_detail_paypal_email)}}"   title="" placeholder="Email Paypal" class="form-control paypal_field">
                        </div>
                      </div>
                    </div>
                    
                </div>
                  <div class="input-block iban_section"style="@if($user->payment_iban != "1") display:none @endif">
                    <h4>Intestatario conto IBAN</h4>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input type="text" name="payment_detail_iban_name" value="{{old('name', $user->payment_detail_iban_name)}}"  title="" placeholder="Nome" class="form-control iban_field">
                        </div>
                        <div class="form-group">
                          <input type="text" name="payment_detail_iban_surname" value="{{old('name', $user->payment_detail_iban_surname)}}"  title="" placeholder="Cognome" class="form-control iban_field">
                        </div>
                        <div class="form-group">
                          <input type="text" name="payment_detail_iban_number" value="{{old('name', $user->payment_detail_iban_number)}}"  title="" placeholder="IBAN" class="form-control iban_field">
                        </div>
                      </div>
                    </div>
                    <!-- <div class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp; Salva Impostazioni Pagamento</div><br> -->
                  </div>
                  <div class="input-block">
                     
                      <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i>&nbsp; Salva Impostazoni</button><br>
                    </div>
                </div>
                <div class="col-sm-4">
                      &nbsp;
                </div>
              </div>
              </form>