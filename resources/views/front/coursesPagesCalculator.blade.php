@php
$schools = App\School::all();
@endphp

<div class="d-md-none block w-100" style="height:99px; "></div>
<div class="to-stick-calcutater" style="position: sticky;">
    <div class="Enquiery bg-primary p-2 text-white mb-3">
        <h3 class="text-center  mt-3 mb-3" style="font-weight: 800;">@lang('school.your_enquiry')</h3>       
            <div class="panel-group w-100" id="accordionMenu" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 calculator_schools" name="course" id="">
                        <option value="">@lang('school.select_school')</option>
                        @foreach($schools as $school)
                        <option class="course-option school-{{$school->id}}" value="{{$school->id}}">{{ getLocalizedString($school, 'name') }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="selectFields">
                    <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                        <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 calc_courses" name="course" id="">
                            <option value="">@lang('school.select_course')</option>
                        </select>
                    </div>
                    <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                        <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation_weeks" name="weeks" id="">
                            <option value="0">@lang('school.select_weeks')</option>
                        </select>
                    </div>
                    <div class="dATEp m-2 mt-3 mb-3">
                        <div class="input-group bg-white" id="dateMusibt">
                            <input class="form-control bg-transparent rounded-0 border-0" type="text" placeholder="DD/MM/YYYY" id="from" readonly="readonly">
                        </div>
                    </div>
                    <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                        <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation_type" name="accommodation" id="">
                            <option value="">@lang('school.select_accommodation')</option>
                        </select>
                    </div>
                    <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                        <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 transport_price" name="transport" id="">
                            <option value="">@lang('school.select_transport')</option>
                        </select>
                    </div>
                    <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
                        <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 insurance_fee" name="insurance" id="">
                            <option value="">@lang('school.select_insurance')</option>
                        </select>
                    </div>
                    <div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool" style="position: relative !important;">
                        <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 visa_fee" name="visa" id="">
                            <option value="">@lang('school.select_visa')</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row m-0 texting pl-2 pr-2 pb-3">
                <div class="col-12" id="calculations">
                    <div class="row">
                        <div class="col-8 p-0"> Course Fee <span id="course_title"></span></div>
                        <div class="col-3 p-0 text-right">£<span id="course_fee">0.00</span></div>
                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".calc_courses"></i> </div>
                    </div>
                    <div class="row accommodation_section" style="display:none">
                        <div class="col-8 p-0"> Accommodation Fee</div>
                        <div class="col-3 p-0 text-right">£<span id="accommodation_fee">0.00</span></div>
                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".accommodation_type"></i> </div>
                    </div>
                    <div class="row transport_total" style="display:none">
                        <div class="col-9 p-0"> Airport <span id="airport_type"></span></div>
                        <div class="col-2 p-0 text-right">£<span id="transport_fee"></span></div>
                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".transport_price"></i> </div>
                    </div>
                    <div class="row insurance_fee_section" style="display:none">
                        <div class="col-8 p-0"> Insurance Fee</div>
                        <div class="col-3 p-0 text-right">£<span id="insurance_fee"></span></div>
                        <div class="col-1 p-0 text-right"><i class="far fa-times remove_calc_item" data-selector=".insurance_fee"></i> </div>
                    </div>
                    <div class="row visa_fee_section" style="display:none">
                        <div class="col-8 p-0"> Visa Fee</div>
                        <div class="col-3 p-0 text-right">£<span id="visa_fee"></span></div>
                        <div class="col-1 p-0 text-right"> <i class="far fa-times remove_calc_item" data-selector=".visa_fee"></i> </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 mt-3 mb-3" style="border-top:1px solid #b9d6dae0;"></div>
                    </div>
                    <div class="row">
                        <div class="col-8 p-0"> School registration fee <i class="far fa-info-circle position-relative"><span>This fee is charged for the admin
                                    fee, course materials and enrolment paper work.</span></i></div>
                        <div class="col-4 p-0 text-right">£<span id="registration_fee">0.00</span></div>
                    </div>
                    <div class="row">
                        <div class="col-8 p-0"> Air Study Center Discount %<span id="discount_percent"></span></div>
                        <div class="col-4 p-0 text-right">£<span id="discount_amount">0.00</span></div>
                        <div class="col-12 p-0 mt-3 mb-3" style="border-top:1px solid #b9d6dae0;"></div>
                    </div>
                    <div class="row">
                        <div class="col-8 p-0 text-white"> TOTAL</div>
                        <div class="col-4 p-0 text-white text-right">£<span id="cart_total">0.00</span></div>
                    </div>
                </div>
            </div>
            <div class="pl-2 pb-3 pr-2">
                <button  class="btn btn-block btn-lg btn-Book rounded-0 ">Book now!</button>
            </div>
    </div>
</div>

<script>
    var courseSelectsUrl = '{{route("schoolSelects")}}';
    $('.calculator_schools').on('change', function(){
        var schoolId = $(this).val();
        if(schoolId){
            $.ajax({
                url: courseSelectsUrl,
                type: "post",
                data: {'schoolId' : schoolId},
                success: function (response) {
                    console.log(response);
                    var res = $.parseJSON(response);
                    console.log(res);
                    if(res.success == true){
                        $('#selectFields').html(res.data);
                        $('#calculations').html(res.calculations);
                        $('#registration_fee').html(res.school.registration_fee);
                        $(".calc_courses")
                            .val(g_selected_course)
                            .trigger('change');                            
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }
    });
    $( document ).ready(function() {    
        $('#from').datepicker({
            firstDay: 1,
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [(day == 1)];
            }
        });
    });    
</script>

