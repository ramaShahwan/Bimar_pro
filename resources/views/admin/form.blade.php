@extends('layout_admin.master')
@section('content')
<div id="page-wrapper">
            <div class="containerr">
                <form>
                  <div class="roww">
                    <h4>Account</h4>
                    <div class="input-groupp input-groupp-icon">
                      <input type="text" placeholder="Full Name"/>
                      <div class="input-icon"><i class="fa fa-user"></i></div>
                    </div>
                    <div class="input-groupp input-groupp-icon">
                      <input type="email" placeholder="Email Adress"/>
                      <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="input-groupp input-groupp-icon">
                      <input type="password" placeholder="Password"/>
                      <div class="input-icon"><i class="fa fa-key"></i></div>
                    </div>
                  </div>
                  <div class="roww">
                    <div class="col-halff">
                      <h4>Date of Birth</h4>
                      <div class="input-groupp">
                        <div class="col-thirdd">
                          <input type="text" placeholder="DD"/>
                        </div>
                        <div class="col-thirdd">
                          <input type="text" placeholder="MM"/>
                        </div>
                        <div class="col-thirdd">
                          <input type="text" placeholder="YYYY"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-halff">
                      <h4>Gender</h4>
                      <div class="input-groupp">
                        <input id="gender-male" type="radio" name="gender" value="male"/>
                        <label for="gender-male">Male</label>
                        <input id="gender-female" type="radio" name="gender" value="female"/>
                        <label for="gender-female">Female</label>
                      </div>
                    </div>
                  </div>
                  <div class="roww">
                    <h4>Payment Details</h4>
                    <div class="input-groupp">
                      <input id="payment-method-card" type="radio" name="payment-method" value="card" checked="true"/>
                      <label for="payment-method-card"><span><i class="fa fa-cc-visa"></i>Credit Card</span></label>
                      <input id="payment-method-paypal" type="radio" name="payment-method" value="paypal"/>
                      <label for="payment-method-paypal"> <span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
                    </div>
                    <div class="input-groupp input-groupp-icon">
                      <input type="text" placeholder="Card Number"/>
                      <div class="input-icon"><i class="fa fa-credit-card"></i></div>
                    </div>
                    <div class="col-halff">
                      <div class="input-groupp input-groupp-icon">
                        <input type="text" placeholder="Card CVC"/>
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                      </div>
                    </div>
                    <div class="col-halff">
                      <div class="input-groupp">
                        <select>
                          <option>01 Jan</option>
                          <option>02 Jan</option>
                        </select>
                        <select>
                          <option>2015</option>
                          <option>2016</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="roww">
                    <h4>Terms and Conditions</h4>
                    <div class="input-groupp">
                      <input id="terms" type="checkbox"/>
                      <label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
                    </div>
                  </div>
                </form>
              </div>
              <div class="table-container" style="margin-top: 40px;">
                <table class="program-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Program Code</th>
                            <th>Program Name EN</th>
                            <th>Program Name AR</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>AORND</td>
                            <td>System Orientation for Persons with Disabilities</td>
                            <td>النظام التوجيهي للأشخاص ذوي الإعاقة</td>
                            <td><input type="checkbox" class="toggle-switch" style="display: inline;"/></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>AR026</td>
                            <td>Alia Awwad</td>
                            <td>عليا عواد</td>
                            <td><input type="checkbox" class="toggle-switch"style="display: inline;" /></td>
                        </tr>
                        <tr >
                            <td>3</td>
                            <td>ISA</td>
                            <td>Sand Engineering and Fabrication</td>
                            <td>هندسة الرمل والتصنيع</td>
                            <td><input type="checkbox" class="toggle-switch" checked style="display: inline;"/></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>DAC</td>
                            <td>Digital Access Content</td>
                            <td>المحتوى الرقمي للوصول</td>
                            <td><input type="checkbox" class="toggle-switch" style="display: inline;"/></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Line</td>
                            <td>Long-standing Program</td>
                            <td>برنامج قائم منذ زمن طويل</td>
                            <td><input type="checkbox" class="toggle-switch" style="display: inline;"/></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
@endsection
