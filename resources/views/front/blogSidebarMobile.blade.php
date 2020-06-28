@php
$categories = App\Blogcategory::all();
@endphp
<div class="col-12 pr-0 pl-md-3 pl-0 pt-3 d-md-none d-block">
    <div class="bg-primary p-3 mb-3">
        <div class=" search-Blog">
            <input type="text" class="form-control bg-white rounded-0 border-0 p-2 pr-4" style="height:37px;" id="" placeholder="Search">
            <a href="" class="iconsetting"> <i class="far fa-search " aria-hidden="true"></i></a>
        </div>
    </div>

    <div class="panel-group w-100 " id="accordionMenu" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default mb-4 bg-primary text-white">
            <div class="panel-heading " role="tab" id="sidebar-11" style="height:46px; overflow:hidden;">
                <h4 class="panel-title bg-primary text-white">
                    <a class="blog-anchor collapsed review pl-3 pr-3 side-heading text-white" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#sdbar-11" aria-expanded="false" aria-controls="sdbar-11">
                        Categories
                    </a>
                </h4>
            </div>
            <div id="sdbar-11" class="panel-collapse collapse cmnt " role="tabpanel" aria-labelledby="sidebar-11">
                <div class="panel-body cmntBody  pl-3 pr-3 pb-3 side-rating">
                    <p class="m-0">
                        <label class="container-checkbox star ">
                            <span class="text-white" style="font-size:15px;">Show all</span>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    @foreach($categories as $category)
                    <p class="m-0">
                        <label class="container-checkbox star ">
                            <span class="text-white" style="font-size:15px;">{{ getLocalizedString($category, 'name') }}</span>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    @endforeach
                    {{-- <p class="m-0">
                        <label class="container-checkbox star ">
                            <span class="text-white" style="font-size:15px;">Studying in UK</span>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    <p class="m-0">
                        <label class="container-checkbox star ">
                            <span class="text-white" style="font-size:15px;">Living in UK</span>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    <p class="m-0">
                        <label class="container-checkbox star ">
                            <span class="text-white" style="font-size:15px;">IELTS</span>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    <p class="m-0">
                        <label class="container-checkbox star ">
                            <span class="text-white" style="font-size:15px;">Visa</span>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </p>
                    <p class="m-0">
                        <label class="container-checkbox star ">
                            <span class="text-white" style="font-size:15px;">Tips</span>
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="panel panel-default mb-4 bg-primary text-white">
            <div class="panel-heading " role="tab" id="sidebar-22" style="height:46px; overflow:hidden;">
                <h4 class="panel-title bg-primary text-white">
                    <a class="blog-anchor collapsed review pl-3 pr-3 side-heading text-white" role="button" data-toggle="collapse" data-parent="#accordionMenu" href="#sdbar-22" aria-expanded="false" aria-controls="sdbar-22">
                        Archives
                    </a>
                </h4>
            </div>
            <div id="sdbar-22" class="panel-collapse collapse cmnt " role="tabpanel" aria-labelledby="sidebar-22">
                <div class="panel-body cmntBody  pl-3 pr-3 pb-3 side-rating">
                    <a class="row m-0 text-white">
                        <div class="col-9 p-0">May 2019</div>
                        <div class="col-3 p-0 text-right">30</div>
                    </a>
                    <a class="row m-0 text-white">
                        <div class="col-9 p-0">June 2019</div>
                        <div class="col-3 p-0 text-right">30</div>
                    </a>
                    <a class="row m-0 text-white">
                        <div class="col-9 p-0">July 2019</div>
                        <div class="col-3 p-0 text-right">30</div>
                    </a>
                    <a class="row m-0 text-white">
                        <div class="col-9 p-0">August 2019</div>
                        <div class="col-3 p-0 text-right">30</div>
                    </a>
                    <a class="row m-0 text-white">
                        <div class="col-9 p-0">September 2019</div>
                        <div class="col-3 p-0 text-right">30</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
