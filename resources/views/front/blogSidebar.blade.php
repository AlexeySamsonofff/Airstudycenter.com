
@php
$categories = App\Blogcategory::all();
@endphp
<div class="bg-primary pl-3 pr-3 pt-3">
    <div class=" search-Blog">
        <input type="text" class="form-control bg-white rounded-0 border-0 p-2 pr-4" style="height:37px;" id="" placeholder="Search">
        <a href="" class="iconsetting"> <i class="far fa-search " aria-hidden="true"></i></a>
    </div>
</div>
<div class="panel-group w-100 ">
    <div class="panel panel-default mb-4 bg-primary text-white">
        <div class="panel-heading " id="" style="height:46px; overflow:hidden;">
            <h4 class="panel-title bg-primary text-white">
                <p class=" review p-3 mb-0 side-heading text-whit">
                    Categories
                </p>
            </h4>
        </div>
        <div id="" class="">
            <div class=" cmntBody  pl-3 pr-3 pb-3 side-rating">
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
            </div>
        </div>
    </div>
    <div class="panel panel-default mb-4 bg-primary text-white">
        <div class="panel-heading " id="sidebar-12" style="height:46px; overflow:hidden;">
            <h4 class="panel-title bg-primary text-white">
                <p class=" review p-3 mb-0 side-heading text-whit">
                    Archives
                </p>
            </h4>
        </div>
        <div id="sdbar-12" class="">
            <div class=" cmntBody  pl-3 pr-3 pb-3 side-rating">
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
