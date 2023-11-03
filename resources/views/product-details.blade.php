@extends('layouts.front')

@section('content')

<!-- content -->
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://placehold.co/700x700/png">
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="https://placehold.co/700x700/png" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://placehold.co/700x700/png" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="https://placehold.co/700x700/png" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://placehold.co/700x700/png" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="https://placehold.co/700x700/png" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://placehold.co/700x700/png" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="https://placehold.co/700x700/png" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://placehold.co/700x700/png" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="https://placehold.co/700x700/png" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://placehold.co/700x700/png" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="https://placehold.co/700x700/png" />
                    </a>
                </div>
                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        Quality Men's Hoodie for Winter, Men's Fashion <br />
                        Casual Hoodie
                    </h4>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                                4.5
                            </span>
                        </div>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                        <span class="text-success ms-2">In stock</span>
                    </div>

                    <div class="mb-3">
                        <span class="h5">$40.00</span>
                        <span class="text-muted">/per box</span>
                    </div>

                    <p>
                        Modern look and quality demo item is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown clothing low-top shirts for
                        men.
                    </p>

                    <div class="row">
                        <dt class="col-3">Type:</dt>
                        <dd class="col-9">Regular</dd>

                        <dt class="col-3">Color</dt>
                        <dd class="col-9">Brown</dd>

                        <dt class="col-3">Material</dt>
                        <dd class="col-9">Cotton, Jeans</dd>

                        <dt class="col-3">Brand</dt>
                        <dd class="col-9">Reebook</dd>
                    </div>

                    <hr />

                    <div class="row mb-4">
                        <div class="col-md-4 col-6">
                            <label class="mb-2">Size</label>
                            <select class="form-select border border-secondary" style="height: 35px;">
                                <option>Small</option>
                                <option>Medium</option>
                                <option>Large</option>
                            </select>
                        </div>
                        <!-- col.// -->
                        <div class="col-md-4 col-6 mb-3">
                            <label class="mb-2 d-block">Quantity</label>
                            <div class="input-group mb-3" style="width: 170px;">
                                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" class="form-control text-center border border-secondary" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1" value="1" />
                                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('razorpay.payment') }}" method="post">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{config('razorpay.key')}}"
                            data-amount= "{{ 40 * 100 }}"
                            data-buttontext="Pay with Razorpay"
                            data-name="Acme Store"
                            data-description="Test Transaction"
                            data-image=""
                            data-prefill.name="John Doe"
                            data-prefill.email="john@example.com"
                            data-theme.color="#ff7529">
                        </script>
                        <!-- <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{config('razorpay.')}}"
                            data-amount= "50000"
                            data-currency="INR"
                            data-order_id="order_9A33X8uLDaKFqS"
                            data-buttontext="Pay with Razorpay"
                            data-name="Acme Store"
                            data-description="Test Transaction"
                            data-image=""
                            data-prefill.name="John Doe"
                            data-prefill.email="john@example.com"
                            data-theme.color="#ff7529">
                        </script> -->
                        
                    </form>
                </div>
            </main>
        </div>
    </div>
</section>
<!-- content -->

@endsection