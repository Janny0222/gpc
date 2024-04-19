<div class="flex fixed top-0 left-0 z-40 h-screen">
    <div class="dark:bg-gray-800 h-screen p-5 pt-8 w-64 relative">
        <x-icons.outline.arrow-left class="h-6 w-6 text-white text-3xl cursor-pointer rounded absolute -right-0 top-9 border border-gray-800" x-on:click="toggleMaintenanceContent" />
    </div>
</div>
@push('scripts')

<script>
    function toggleMaintenanceContent() {
        
            alert('Hellow World!')
        
    }
    
</script>

@endphp