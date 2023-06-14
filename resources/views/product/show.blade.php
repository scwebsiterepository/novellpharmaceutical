@extends('layouts.main')

@section('content')
    <main>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <a href="{{ route('dashboard') }}"><button  type="button" class="btn-close mb-2" aria-label="Close"></button></a>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/product/' . $product->image) }}" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration">Rp.{{ number_format($product->price, 0) }}</span>
                        </div>
                        <p class="lead">{{ $product->description}} </p>
                        <div class="d-flex">
                            <a href="https://wa.me/6283892458651/?text=Hallo saya minat dengan produk {{ $product->name }}" target="_blank" class="btn btn-success">
                            <i class="bi-whatsapp-fill me-1 "></i>
                            Hubungi Penjual
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection()