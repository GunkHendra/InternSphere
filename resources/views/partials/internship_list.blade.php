@foreach ($internship as $intern)
    <div class="p-4 bg-white shadow-md rounded-lg mb-4">
        <div class="flex items-center gap-4">

            @if($intern->company && $intern->company->logo)
                <img src="{{ asset('assets/logo/' . $intern->company->logo) }}" alt="{{ $intern->company->company_name }} logo" class="w-12 h-12">
            @else
                <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-12 h-12">
            @endif
            <a href="/internship/{{ $intern->slug }}" class="font-medium text-xl md:text-2xl">{{ $intern->title }}</a>
        </div>
        <a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a>
        <p class="text-sm md:text-base">{{ $intern->excerpt }}</p>

        <p class="mt-2 flex items-center justify-left">
            Rating: {{ $intern->averageRating() ? round($intern->averageRating(), 2) : 'No rating yet' }} / 5
            <span class="ml-1 mb-1">
                <!-- Manual star icon addition -->
                <img src="{{ asset('assets/icon/Star_Full.png') }}" alt="Full Star" class="inline w-35 h-10">
            </span>
        </p>
        <p class="text-sm">{{ $intern->commentsCount() }} comments</p>
    </div>
@endforeach
