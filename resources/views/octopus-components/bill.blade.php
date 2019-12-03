<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold">INVOICE</h2>
											<h4 class="h4 m-none text-dark text-bold">#76598345</h4>
										</div>
										<div class="col-sm-6 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												<logo class="logo title"> {{ config('app.name', 'AirBNB-Spider') }}</logo>

												<br>
												Business Address
												<br>
												Phone: (858) 225 4858
												<br>
												{{ config('app.name', 'AirBNB-Spider') }}.Help@gmail.com
											</address>
											<div class="ib">

											</div>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">To:</p>
												<address>
													Karl Strauss
													<br>
													123 Pearl St, San Deigo Ca
													<br>
													Phone:

												</address>
											</div>
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-none">
													<span class="text-dark">Invoice Date:</span>
													<span class="value">05/20/2019</span>
												</p>
												<p class="mb-none">
													<span class="text-dark">Due Date:</span>
													<span class="value">06/20/2014</span>
												</p>
											</div>
										</div>
									</div>
								</div>

								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id" class="text-semibold">#</th>
												<th id="cell-item" class="text-semibold">Item</th>
												<th id="cell-desc" class="text-semibold">Description</th>
												<th id="cell-price" class="text-center text-semibold">Price</th>
												<th id="cell-qty" class="text-center text-semibold">Quantity</th>
												<th id="cell-total" class="text-center text-semibold">Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>123456</td>
												<td class="text-semibold text-dark">Weekly Collection</td>
												<td>Monthly Service Fee</td>
												<td class="text-center">$85.00</td>
												<td class="text-center">1</td>
												<td class="text-center">$85.00</td>
											</tr>
											<tr>
												<td>654321</td>
												<td class="text-semibold text-dark">Additional Bins</td>
												<td>Based on your usage.</td>
												<td class="text-center">$2.00</td>
												<td class="text-center">12</td>
												<td class="text-center">$24.00</td>
											</tr>
										</tbody>
									</table>
								</div>

								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<tr class="b-top-none">
														<td colspan="2">Subtotal</td>
														<td class="text-left">$109.00</td>
													</tr>
													<tr>
														<td colspan="2">Service Tax</td>
														<td class="text-left">$2.00</td>
													</tr>
													<tr class="h4">
														<td colspan="2">Grand Total</td>
														<td class="text-left">$111.00</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="text-right mr-lg">
								<a href="#" class="btn btn-default">Pay Bill</a>
								<a href="pages-invoice-print.html" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</section>
