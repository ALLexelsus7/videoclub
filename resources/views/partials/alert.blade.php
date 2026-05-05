{{-- Alertas de notificación reutilizables --}}
@if(session('info'))
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-6 shadow-md rounded flex items-center" role="alert">
        <svg class="w-6 h-6 mr-2 fill-current" viewBox="0 0 20 20">
            <path d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"/>
        </svg>
        <span>{{ session('info') }}</span>
    </div>
@endif