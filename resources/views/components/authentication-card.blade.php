<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <a href="{{ url('/') }}" style="color: rgba(0, 0, 0, .9); padding-top: .3125rem; padding-bottom: .3125rem; margin-right: 1rem; font-size: 1.25rem; white-space: nowrap;"><h1 style="color: #12784A !important; font-size: 50px; font-weight: 1000;">E-Stylish</h1></a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
