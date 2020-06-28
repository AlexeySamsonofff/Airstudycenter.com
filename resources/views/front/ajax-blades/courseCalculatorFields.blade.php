<div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 calc_courses" name="course" id="">
        <option value="">@lang('school.select_course')</option>
        @foreach($courses as $course)
        <option class="course-option course-{{$course->courseId}}" value="{{$course->course_title}}" data-course-fee="{{ $course->ppw1 }}" data-ppw1="{{ $course->ppw1 }}" data-ppw2="{{ $course->ppw2 }}" data-ppw3="{{ $course->ppw3 }}" data-ppw4="{{ $course->ppw4 }}" data-ppw5="{{ $course->ppw5 }}" data-ppw6="{{ $course->ppw6 }}" data-ppw7="{{ $course->ppw7 }}" data-ppw8="{{ $course->ppw8 }}" data-ppw9="{{ $course->ppw9 }}" data-ppw10="{{ $course->ppw10 }}" data-ppw11="{{ $course->ppw11 }}" data-ppw12="{{ $course->ppw12 }}" data-ppw13="{{ $course->ppw13 }}" data-course-discount={{ $course->discount ?: 0 }}>{{ $course->course_title }}</option>
        @endforeach
    </select>
</div>
<div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation_weeks" name="weeks" id="">
        <option value="0">@lang('school.select_weeks')</option>
        @for($i = 1 ; $i <= 52 ; $i++) <option value="{{ $i }}">{{$i}} @lang('header.week')</option>
            @endfor
    </select>
</div>
<div class="dATEp m-2 mt-3 mb-3">
    <div class="input-group bg-white" id="dateMusibt">
        <input class="form-control bg-transparent rounded-0 border-0" type="text" placeholder="DD/MM/YYYY" id="from">
    </div>
</div>
<div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 accommodation_type" name="accommodation" id="">
        <option value="">@lang('school.select_accommodation')</option>
        @foreach($accommodations as $accommodation)
        <option value="{{$accommodation->typeName}}" data-accommodation-per-week="{{ $accommodation->price }}">{{ $accommodation->typeName }}</option>
        @endforeach
    </select>
</div>
<div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 transport_price" name="transport" id="">
        <option value="">@lang('school.select_transport')</option>
        @foreach($transports as $transport)
        <option value="{{ $transport->airport_name }}" data-transport-price="{{ $transport->pick_up }}" data-airport-type="@lang('school.pick') ({{ explode(' ',trim($transport->airport_name))[0] }})">{{ getLocalizedString($transport, 'airport_name') }} @lang('school.pickup')</option>
        <option value="{{$transport->airport_name}}-dual" data-transport-price="{{ $transport->pick_up_and_drop }}" data-airport-type="@lang('school.pick_and_drop') ({{ explode(' ',trim($transport->airport_name))[0] }})">{{ getLocalizedString($transport, 'airport_name') }} @lang('school.pickup_and_drop')</option>
        @endforeach
    </select>
</div>
<div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool " style="position: relative !important;">
    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 insurance_fee" name="insurance" id="">
        <option value="">@lang('school.select_insurance')</option>
        @foreach($insurances as $insurance)
        <option value="{{$insurance->name}}" data-insurance-price="{{ $insurance->price }}">{{ getLocalizedString($insurance, 'name') }}</option>
        @endforeach
    </select>
</div>
<div class="panel panel-default m-2 mt-3 mb-3  serchDropdownAfter  serchSelectSchool" style="position: relative !important;">
    <select class="serchDropdown pr-3 form-control btn w-100 text-left text-muted rounded-0 visa_fee" name="visa" id="">
        <option value="">@lang('school.select_visa')</option>
        @foreach($visas as $visa)
        <option value="{{$visa->name}}" data-visa-price="{{ $visa->price }}">{{ getLocalizedString($visa, 'name') }}</option>
        @endforeach
    </select>
</div>

<script>
    $('.calc_courses').on('change', function(){
        updateCourse();
        updateDiscount();
        updateTotal();
    });
    $('.accommodation_type').on('change', function(){
        updateAccommodation();
        updateTotal();
    });
    $('.transport_price').on('change', function(){
        updateTransportFee();
        updateTotal();
        select_changed();
    });
    $('.insurance_fee').on('change', function(){
        updateInsuranceFee();
        updateTotal();
    });
    $('.visa_fee').on('change', function(){
        updateVisaFee();
        updateTotal();
    });
    $('.accommodation_weeks').on('change', function(){
        updateAccommodation();
        updateCourse();
        updateDiscount();
        updateTotal();
    });

    function updateTotal(){
        var schoolRegistrationFee = {{ $school->registration_fee }};
        var courseWeeks = $('.accommodation_weeks').val();
        var courseFee = getValue('.calc_courses', getPriceSlab(courseWeeks));
        courseFee = courseFee * courseWeeks;
        var discountPercent = getValue('.calc_courses', 'courseDiscount');
        var offAmount = getPercent(courseFee, discountPercent);
        courseFee = parseFloat(courseFee) - parseFloat(offAmount);

        var accommodationFee = getValue('.accommodation_type', 'accommodationPerWeek');
        var accommodationWeeks = $('.accommodation_weeks').val();
        var accommodationCharges = accommodationFee * accommodationWeeks;

        var transportPrice = getValue('.transport_price', 'transportPrice');
        var insuranceFee = getValue('.insurance_fee', 'insurancePrice');
        var visaFee = getValue('.visa_fee', 'visaPrice');


        var total = courseFee + accommodationCharges + transportPrice + insuranceFee + visaFee + schoolRegistrationFee;
        $('#cart_total').text(getNumber(total));
    }
    function getValue(selector, dataAttrName){
        var value = $(selector).find(':selected').data(dataAttrName);
        if(typeof value == 'undefined'){
            return 0;
        } else {
            return value;
        }
    }
    function select_changed(dataAttrName){

        $(getValue('.transport_price', 'transportPrice')).each(function(){
        $(this).removeClass('yellow');
        });
        $(getValue('.table_transport', 'transportType')).each(function(){
            var selected = $(this).data('transportType');
            $('#'+selected).addClass('yellow');
        });
    }
    function updateTransportFee(){
        var transportPrice = getValue('.transport_price', 'transportPrice');
        if(transportPrice == 0){
            $('.transport_total').hide(250);
        } else {
            var airportType = getValue('.transport_price', 'airportType');
            $('#airport_type').text(airportType);
            $('#transport_fee').text(getNumber(transportPrice));
            $('.transport_total').show(250);
        }
        showMessage('Transport Fee Updated', true);
    }
    function updateInsuranceFee(){
        var insurancePrice = getValue('.insurance_fee', 'insurancePrice');
        if(insurancePrice == 0){
            $('.insurance_fee_section').hide(250);
        } else {
            $('#insurance_fee').text(getNumber(insurancePrice));
            $('.insurance_fee_section').show(250);
            showMessage('Insurance Fee Updated', true);
        }
    }
    function updateVisaFee(){
        var visaPrice = getValue('.visa_fee', 'visaPrice');
        if(visaPrice == 0){
            $('.visa_fee_section').hide(250);
        } else {
            $('#visa_fee').text(getNumber(visaPrice));
            $('.visa_fee_section').show(250);
        }
        showMessage('Visa Fee Updated', true);
    }
    function updateDiscount(){
        var discountPercent = getValue('.calc_courses', 'courseDiscount');
        var courseWeeks = $('.accommodation_weeks').val();
        // var courseFee = getValue('.calc_courses', 'courseFee');
        var courseFee = getValue('.calc_courses', getPriceSlab(courseWeeks));
        courseFee = courseFee * courseWeeks;
        // console.log(courseFee);
        var offAmount = getPercent(courseFee, discountPercent);
        $('#discount_percent').text(discountPercent);
        $('#discount_amount').text(offAmount);
    }
    function updateCourse(){
        var courseName = $('.calc_courses').val();
        var courseWeeks = $('.accommodation_weeks').val();
        var courseFee = getValue('.calc_courses', getPriceSlab(courseWeeks));
        if(courseWeeks > 0){
            $('#course_fee').text(getNumber(courseFee * courseWeeks));
        } else {
            $('#course_fee').text(getNumber(courseFee));
        }

        $('#course_title').text("("+courseName+")");
        showMessage('Course Updated', true);
    }
    function updateAccommodation(){
        var accommodationFee = getValue('.accommodation_type', 'accommodationPerWeek');
        var accommodationWeeks = $('.accommodation_weeks').val();
        var accommodationCharges = accommodationFee * accommodationWeeks;
        if(accommodationCharges == 0){
            $('.accommodation_section').hide(250);
        } else {
            $('#accommodation_fee').text(getNumber(accommodationCharges));
            $('.accommodation_section').show(250);
        }
        showMessage('Accommodation Updated', true);
    }
    function getNumber(num) {
        num = parseFloat(num);
        var n = num.toFixed(2);
        return n;
    }
    // $('.remove_calc_item').on('click', function(){
    $(document).on('click','.remove_calc_item',function(){
    // $(document).on('click', function(){
        var selector = $(this).data('selector');
        switch(selector){
            case '.accommodation_type':
                $('.table_accommodation').removeClass('activeCart');
                break;
            case '.insurance_fee':
                $('.table_insurance').removeClass('activeCart');
                break;
            case '.visa_fee':
                $('.table_visa').removeClass('activeCart');
                break;
            case '.transport_price':
                $('.table_transport').removeClass('activeCart');
                break;
        }
        $(selector).prop('selectedIndex', 0);
        $(selector).trigger('change');
    });
    function getPercent(amount, percent){
        amount = parseInt(amount);
        percent = parseInt(percent);
        return (percent*amount/100).toFixed(2);
    }

    function showMessage(message, type){
        if(type === true){
            $('.success-toast-text').text(message);
            $('.success-toast').show(250);
            setTimeout(function() {
                $(".success-toast").hide(250);
                $('.success-toast-text').text("");
            }, 3000);

        } else {
            $('.failed-toast-text').text(message);
            $('.failed-toast').show(250);
            setTimeout(function() {
                $(".failed-toast").hide(250);
                $('.failed-toast-text').text("");
            }, 3000);
        }
    }
    function getPriceSlab(weeks){
        var slab = 'ppw1';
        if(weeks > 0){
            if(weeks >= 1 && weeks <= 4){
                slab = 'ppw1';
            } else if (weeks >= 5 && weeks <= 8){
                slab = 'ppw2';
            } else if (weeks >= 9 && weeks <= 12){
                slab = 'ppw3';
            } else if (weeks >= 13 && weeks <= 16){
                slab = 'ppw4';
            } else if (weeks >= 17 && weeks <= 20){
                slab = 'ppw5';
            } else if (weeks >= 21 && weeks <= 24){
                slab = 'ppw6';
            } else if (weeks >= 25 && weeks <= 28){
                slab = 'ppw7';
            } else if (weeks >= 29 && weeks <= 32){
                slab = 'ppw8';
            } else if (weeks >= 33 && weeks <= 36){
                slab = 'ppw9';
            } else if (weeks >= 37 && weeks <= 40){
                slab = 'ppw10';
            } else if (weeks >= 41 && weeks <= 44){
                slab = 'ppw11';
            } else if (weeks >= 45 && weeks <= 48){
                slab = 'ppw12';
            } else if (weeks >= 49 && weeks <= 52){
                slab = 'ppw13';
            } else {
                slab = 'ppw1';
            }
        } else {
            slab = 'ppw1';
        }
        return slab;
    }
</script>
