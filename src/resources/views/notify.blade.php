<x-layout::app>
    <x-slot name="header">
    {{trans('mess::messages.notifications')}} 
    </x-slot>
    @livewire('notifications')
</x-layout::app>
