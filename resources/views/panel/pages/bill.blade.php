@extends('panel.layout')
@section('content')

<section id="billing-details" class="section py-5" style="background-color: #f8f9fa;">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="bg-white rounded-4 shadow-sm p-4 p-lg-5">
                    <h3 class="fw-bold mb-4">Billing Details</h3>
                    <form action="#" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">First Name</label>
                                <input type="text" class="form-control rounded-1 shadow-none" placeholder="John" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-muted text-uppercase">Last Name</label>
                                <input type="text" class="form-control rounded-1 shadow-none" placeholder="Doe" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted text-uppercase">Email Address</label>
                                <input type="email" class="form-control rounded-1 shadow-none" placeholder="john@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold text-muted text-uppercase">Country</label>
                                <select name="country" class="form-select rounded-1 shadow-none" required>
                                    <option value="" selected disabled>Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="CA">Canada</option>
                                    <option value="AU">Australia</option>
                                    <option value="DE">Germany</option>
                                    <option value="BD">Bangladesh</option>
                                </select>
                            </div>
                        </div>

                        <hr class="my-5">

                        <h4 class="fw-bold mb-3">Payment Method</h4>
                        <div class="d-flex flex-column gap-3 mb-4">
                            <div class="form-check border rounded-3 p-3 position-relative">
                                <input class="form-check-input ms-0 me-3 mt-1" type="radio" name="paymentMethod" id="creditCard" checked>
                                <label class="form-check-label d-flex align-items-center stretched-link cursor-pointer" for="creditCard">
                                    <i class="bi bi-credit-card fs-4 me-3 text-dark"></i>
                                    <span class="fw-medium">Credit / Debit Card</span>
                                </label>
                            </div>
                            <div class="form-check border rounded-3 p-3 position-relative">
                                <input class="form-check-input ms-0 me-3 mt-1" type="radio" name="paymentMethod" id="paypal">
                                <label class="form-check-label d-flex align-items-center stretched-link cursor-pointer" for="paypal">
                                    <i class="bi bi-paypal fs-4 me-3 text-primary"></i>
                                    <span class="fw-medium">PayPal</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-3 fw-bold text-uppercase rounded-1 mt-4">Complete Purchase</button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-white rounded-4 shadow-sm p-4 sticky-top" style="top: 120px;">
                    <h5 class="fw-bold mb-4 pb-2 border-bottom">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Car Rent site</span>
                        <span class="fw-bold">$ 430.99</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="text-muted">Platform Fee</span>
                        <span class="fw-bold">$ 10.00</span>
                    </div>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between mb-0">
                        <span class="fw-bold h4">Total</span>
                        <span class="fw-bold h4 text-primary">$ 440.99</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection