<?php include(app_path() . '/php/admin_lib_slider.php') ?>

<div class="account_block">
    <a href="{{route('sign.reset')}}" style="font-family: 'Permanent Marker', cursive;"
       class="links"><span>Password</span></a>
    <a class="links"
       onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><span><i class="fas fa-sign-out-alt"></i></span></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
