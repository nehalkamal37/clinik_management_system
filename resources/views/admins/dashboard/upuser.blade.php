@extends('admins.dashboard.app')


@section('content')


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container mt-xl-50 mt-sm-30 mt-15">
                <!-- Title -->
                <div class="hk-pg-header align-items-top">
                    <div>
						<h2 class="hk-pg-title font-weight-600 mb-10">Customer Management</h2>
						<p>Questions about onboarding lead data? <a href="#">Learn more.</a></p>
					</div>
					<div class="d-flex w-500p">
						<select class="form-control custom-select custom-select-sm mr-15">
							<option selected="">Latest Products</option>
							<option value="1">CRM</option>
							<option value="2">Projects</option>
							<option value="3">Statistics</option>
						</select>
						<select class="form-control custom-select custom-select-sm mr-15">
							<option selected="">USA</option>
							<option value="1">USA</option>
							<option value="2">India</option>
							<option value="3">Australia</option>
						</select>
						<select class="form-control custom-select custom-select-sm">
							<option selected="">December</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="1">April</option>
							<option value="2">May</option>
							<option value="3">June</option>
							<option value="1">July</option>
							<option value="2">August</option>
							<option value="3">September</option>
							<option value="1">October</option>
							<option value="2">November</option>
							<option value="3">December</option>
						</select>
					</div>
                </div>
                <!-- /Title -->

                <!-- Row -->
               
                <!-- /Row -->
            </div>
            <!-- /Container -->


            <div class="row">
                <div class="col-sm">
                    <form>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="firstName">First name</label>
                                <input class="form-control" id="firstName" placeholder="" value="" type="text">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lastName">Last name</label>
                                <input class="form-control" id="lastName" placeholder="" value="" type="text">
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" placeholder="you@example.com" type="email">
                        </div>

                        <div class="form-group">
                            <label for="email">Password</label>
                            <input class="form-control" id="password" placeholder="Password" type="password">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input class="form-control" id="address" placeholder="1234 Main St" type="text">
                        </div>

                        
                        <div class="form-group">
                            <label for="input_tags">Date range</label>
                            <input class="form-control" type="text" name="daterange" value="01/01/2018 - 01/15/2018">
                        </div>

                        <div class="form-group">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input class="form-control" id="address2" placeholder="Apartment or suite" type="text">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-10">
                                <label for="country">Country</label>
                                <select class="form-control custom-select d-block w-100" id="country">
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-10">
                                <label for="state">State</label>
                                <select class="form-control custom-select d-block w-100" id="state">
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-10">
                                <label for="zip">Zip</label>
                                <input class="form-control" id="zip" placeholder="" type="text">
                            </div>
                        </div>
                        <hr>
                        <div class="custom-control custom-checkbox mb-15">
                            <input class="custom-control-input" id="same-address" type="checkbox" checked="">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" id="save-info" type="checkbox">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>
                        <hr>

                        <h6 class="form-group">Payment</h6>

                        <div class="d-block mt-20 mb-30">
                            <div class="custom-control custom-radio mb-10">
                                <input id="credit" name="paymentMethod" class="custom-control-input" checked="" type="radio">
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio mb-10">
                                <input id="debit" name="paymentMethod" class="custom-control-input" type="radio">
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" class="custom-control-input" type="radio">
                                <label class="custom-control-label" for="paypal">PayPal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="cc-name">Name on card</label>
                                <input class="form-control" id="cc-name" placeholder="" type="text">
                                <small class="form-text text-muted">Full name as displayed on card</small>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="cc-number">Credit card number</label>
                                <input class="form-control" id="cc-number" placeholder="" data-mask="9999-9999-9999-9999" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="cc-expiration">Expiration</label>
                                <input class="form-control" id="cc-expiration" placeholder="" data-mask="99-99" type="text">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="cc-cvv">CVV</label>
                                <input class="form-control" id="cc-cvv" data-mask="999" placeholder="" type="text">
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>

@endsection