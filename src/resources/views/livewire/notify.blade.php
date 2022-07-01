<a wire:poll.750ms class="nav-link px-3 float-start" href="{{route('notifications.index')}}">
    <i class="bi bi-bell count_icon"></i>
    <span class="count">{{Auth::user()->unreadNotifications->count()}}</span>
</a>