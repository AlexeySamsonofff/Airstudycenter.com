@extends('front.index1_new')
@section('title', 'FAQs')
@section('content')
<div class="container-fluid bg-school text-white p-0 position-relative" style="background-image:url({{ asset('front/dpassets/img/school.png') }}); height:450px;">
    @include('front.layout.navigation')
    <h1 class="text-center text-white font-weight-normal pt-5 all-center" style="font-size: 45px;">Frequently Asked Questions</h1>
</div>
<div class="container pt-5 pb-5  FAQ">
    <h2 class="font-weight-bold HeadingS1 mb-md-4 mb-3 text-center">FAQs </h2>
    <p class="w-78 text-center m-auto text-dark color-dark" style="font-weight:bold;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore
        magna aliquyam erat, sed diam voluptua.</p>
    <div class="row m-0 mt-5 mb-5 ">
        <div class="col-md-6">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($faqs1 as $faq1)
                <div class="panel panel-default">
                    <div class="panel-heading" id="faq-{{ $loop->iteration }}" role="tab">
                        <h4 class="panel-title"><a class="collapsed fntb color-dark" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapseFsix"><i class="fa fa-plus"></i> {{getLocalizedString($faq1, 'title')}}</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="faq-{{ $loop->iteration }}">
                        <div class="panel-body">
                            <p>{!! getLocalizedString($faq1,'description') !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach($faqs2 as $faq2)
                <div class="panel panel-default">
                    <div class="panel-heading" id="faq2-{{ $loop->iteration }}" role="tab">
                        <h4 class="panel-title"><a class="collapsed fntb color-dark" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2-{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapseFsix"><i class="fa fa-plus"></i> {{getLocalizedString($faq2, 'title')}}</a></h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse2-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="faq2-{{ $loop->iteration }}">
                        <div class="panel-body">
                            <p>{!! getLocalizedString($faq2,'description') !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>