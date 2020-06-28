<div class="col-md-4 content-desktop" style="background-color:white;border: 1px solid;border-color: rgba(18, 100, 112, 0.3);border-radius: 5px; margin-top: -50px; height: 480px">
    <div class="row" style="padding-top: 30px">
        <div class="form-group col-md-3">
            <?php 
        if (Auth::check()) {
            $id = auth::user()->id;
            $userprofile =DB::table('users')->where('id', $id)->first();
        }
        ?>
            @if (isset($userprofile->image) && $userprofile->image != '')
                <img src="{{asset('/normal_images/'.$userprofile->image)}}" alt="User Avatar" class="rounded-circle" style="width: 72px;">
            @else
                <img src="{{asset('/normal_images/21548244636.jpg')}}" alt="User Avatar" class="rounded-circle" style="width: 72px;">
            @endif
        </div>
        <div class="form-group col-md-6">
            <p style="font-weight:bold;"> {{$userprofile->name}}</p>
            <p style="color: #037f91"> {{$userprofile->email}}</p>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 dropdown-item">
            <a href="{{App::make('url')->to('/inbox')}}" style="color: #374354"><h5 class="{{ Request::is('inbox') ? 'left-menu-active' : '' }}"><i class="far fa-envelope"> Inbox</i></h5></a>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 dropdown-item">
            <a href="{{App::make('url')->to('/userprofile')}}" style="color: #374354"><h5 class="{{ Request::is('userprofile') ? 'left-menu-active' : '' }}"><i class="far fa-user"> My profile</i></h5></a>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 dropdown-item">
            <a href="{{App::make('url')->to('/wishlistcourse')}}" style="color: #374354"><h5 class="{{ Request::is('wishlistcourse') ? 'left-menu-active' : '' }}"><i class="far fa-heart"> Wishlist</i></h5></a>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 dropdown-item">
            <a href="{{App::make('url')->to('/payment')}}" style="color: #374354"><h5 class="{{ Request::is('payment') ? 'left-menu-active' : '' }}"><i class="far fa-history"> Payment history</i></h5></a>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 dropdown-item">
            <a href="{{App::make('url')->to('/credit')}}" style="color: #374354"><h5 class="{{ Request::is('credit') ? 'left-menu-active' : '' }}"><i class="far fa-coins"> My credits</i></h5></a>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12 dropdown-item">
        <a href="{{App::make('url')->to('/invitefriend')}}" style="color: #374354"><h5 class="{{ Request::is('invitefriend') ? 'left-menu-active' : '' }}"><i class="far fa-users"> Invite friends</i></h5></a>
        </div>
    </div>
</div>
<div class="content-mobile" style="width:100%">
    <div style="background-color:white;border: 1px solid;border-color: rgba(18, 100, 112, 0.3);border-radius: 5px; margin-top: -50px; margin-left: 50px; margin-right: 50px">
        <div class="row" style="padding-top: 30px;">
            <div class="form-group" style="padding-left: 30px;width: 102px">
            @if (isset($userprofile->image) && $userprofile->image != '')
                <img src="{{asset('/normal_images/'.$userprofile->image)}}" alt="User Avatar" class="rounded-circle" style="width: 72px;">
            @else
                <img src="{{asset('/normal_images/21548244636.jpg')}}" alt="User Avatar" class="rounded-circle" style="width: 72px;">
            @endif
            </div>
            <div class="form-group" style="margin-left:14px">
                <p style="font-weight:bold;"> {{$userprofile->name}}</p>
                <p style="color: #037f91"> {{$userprofile->email}}</p>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-xl-4 col-md-12 mt-1 pl-md-2 pr-md-2 mb-1" style="padding-left:10px;padding-right:10px">
            <div class=" serchDropdownAfter search1 btn-white border" style="margin-top:40px">
                <select class="serchDropdown pr-3  form-control btn w-100  text-left text-muted  rounded-0 " id="lmenu-select" name="lmenu-select" style="border-color: #107786; color: #107786 !important;">
                    <option value="1" {{ Request::is('inbox') ? 'selected' : '' }}>Inbox</option>
                    <option value="2" {{ Request::is('userprofile') ? 'selected' : '' }}>My profile</option>
                    <option value="3" {{ Request::is('wishlistcourse') ? 'selected' : '' }}>Wishlist</option>
                    <option value="4" {{ Request::is('payment') ? 'selected' : '' }}>Payment history</option>
                    <option value="5" {{ Request::is('credit') ? 'selected' : '' }}>My credits</option>
                    <option value="6" {{ Request::is('invitefriend') ? 'selected' : '' }}>Invite friends</option>
                </select>
            </div>
        </div>             
    </div>
</div>
<script>
$(document).ready(function() {    
    $('#lmenu-select').on('change', function() {
        var url = '';
        if (this.value == 1) {
            url = '{{ route('inbox') }}';
        } else if(this.value == 2) { 
            url = '{{ url('/userprofile') }}'; 
        } else if(this.value == 3) { 
            url = '{{ route('wishlistcourse') }}'; 
        } else if(this.value == 4) { 
            url = '{{ route('payment') }}'; 
        } else if(this.value == 5) { 
            url = '{{ route('credit') }}'; 
        } else if(this.value == 6) { 
            url = '{{ route('invitefriend') }}'; 
        }

        if(url != '') {
            location.href = url;
        }
    });
});
</script>