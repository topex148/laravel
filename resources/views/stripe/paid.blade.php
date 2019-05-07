@extends('layouts.menu')

@section('content')

<!-- CART -->
<section>
  <div class="container">

    <!-- CHECKOUT -->
    <form class="row clearfix" method="POST" action="/LaTesis/public/plan/formulario" id="payment-form">
      {{csrf_field()}}

      <div class="col-lg-8 col-sm-5">
        <div class="heading-title">
          <h4>Payment Method</h4>
        </div>



          <div class="toggle-transparent toggle-bordered-full clearfix">
            <div class="toggle active">
              <div class="toggle-content">

                <div class="row">
                  <div class="col-lg-12">
                    <label for="name_on_card">Name on Card *</label>
                    <input id="name_on_card" name="name_on_card" type="text" class="form-control required" autocomplete="off" />
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <label for="credit_card_type">Credit Card Type *</label>
                    <select id="credit_card_type" name="credit_card_type" class="form-control pointer required">
                      <option value="">Select...</option>
                      <option value="AE">American Express</option>
                      <option value="VI">Visa</option>
                      <option value="MC">Mastercard</option>
                      <option value="DI">Discover</option>
                    </select>
                  </div>
                </div>

                <!--
                <div class="row">
                  <div class="col-lg-12">
                    <label for="payment:cc_number">Credit Card Number *</label>
                    <input id="payment:cc_number" name="payment[cc_number]" type="text" class="form-control required" autocomplete="off" />
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <label for="payment:cc_exp_month">Card Expiration *</label>

                    <div class="row mb-0">
                      <div class="col-lg-6 col-sm-6">
                        <select id="payment:cc_exp_month" name="payment[cc_exp_month]" class="form-control pointer required">
                          <option value="0">Month</option>
                          <option value="01">01 - January</option>
                          <option value="02">02 - February</option>
                          <option value="03">03 - March</option>
                          <option value="04">04 - April</option>
                          <option value="05">05 - May</option>
                          <option value="06">06 - June</option>
                          <option value="07">07 - July</option>
                          <option value="08">08 - August</option>
                          <option value="09">09 - September</option>
                          <option value="10">10 - October</option>
                          <option value="11">11 - November</option>
                          <option value="12">12 - December</option>
                        </select>
                      </div>

                      <div class="col-lg-6 col-sm-6">
                        <select id="payment:cc_exp_year" name="payment[cc_exp_year]" class="form-control pointer required">
                          <option value="0">Year</option>
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                          <option value="2025">2025</option>
                        </select>
                      </div>

                    </div>

                  </div>
                </div>


                <div class="row">
                  <div class="col-lg-12">
                    <label for="payment:cc_cvv">CVV2 *</label>
                    <input id="payment:cc_cvv" name="payment[cc_cvv]" type="text" class="form-control required" autocomplete="off" maxlength="4" />
                  </div>
                </div>
                -->

                <div class="form-group">

                  <label for="card-element">Tarjeta de Credito</label>

                  <div id="card-element">
                    <!-- A Stripe Element will be inserted here. -->
                  </div>

                  <!-- Used to display form errors. -->
                  <div id="card-errors" role="alert"></div>

                </div>

              </div>
            </div>
          </div>




        <!-- TOTAL / PLACE ORDER -->
        <div class="toggle-transparent toggle-bordered-full clearfix">
          <div class="toggle active">
            <div class="toggle-content">

              <span class="clearfix">
                <span class="float-right">$120.75</span>
                <strong class="float-left">Subtotal:</strong>
              </span>
              <span class="clearfix">
                <span class="float-right">$0.00</span>
                <span class="float-left">Discount:</span>
              </span>
              <span class="clearfix">
                <span class="float-right">$8.00</span>
                <span class="float-left">Shipping:</span>
              </span>

              <hr />

              <span class="clearfix">
                <span class="float-right fs-20">$128.75</span>
                <strong class="float-left">TOTAL:</strong>
              </span>

              <hr />

              <button class="btn btn-primary btn-lg btn-block fs-15"><i class="fa fa-mail-forward"></i> Place Order Now</button>
            </div>
          </div>
        </div>
        <!-- /TOTAL / PLACE ORDER -->


          </div>
        </div>
      </div>
      <!-- /CREATE ACCOUNT -->

    </form>
    <!-- /CHECKOUT -->

  </div>
</section>
<!-- /CART -->


@endsection
