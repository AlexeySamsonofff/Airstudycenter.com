@extends('front.index1_new')
@section('title', 'Accommodations')
@section('content')
<div id="bg-clr">
    @include('front.layout.navigation')
</div>
<section>
    <div class="container p-0 accdin-result">
        <div class="row m-0 mb-5">
            <div class="col-md-8 p-md-0">
                <nav aria-label="breadcrumb " class="bg-transparent brdcrm">
                    <p class="breadcrumb text-break pl-0 d-inline-block bg-transparent">                            
                        <span class="breadcrumb-item " aria-current="page"><h3 class="font-weight-bold"> Thank you. </h3></span>
                    
                    </p>
                </nav>  
               
                @if (Session::has('success'))
                <div class="bg-primary text-white" style="padding:20px;">
                    <h3 class="text-center" style="font-weight:500;"><i class="far fa-check-circle"></i> {{ Session::get('success') }}</i></h3>
                </div>                 
                @endif

                @include('front.layout.payment_success')
                
            </div> 
        </div> 
    </div>       
    
</section>
@endsection
