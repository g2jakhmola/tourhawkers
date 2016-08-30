<div class="text-center" style="color:red">
        @if(Session::has("success"))

          {{ Session::get("success") }}

        @endif

        @if(Session::has("error"))

          {{ Session::get("error") }}

        @endif
      </div>

@if( Auth::check() )
    Hi Welcome : {{ Auth::user()->name }}
@endif

{{ link_to('/logout', "Logout") }}

