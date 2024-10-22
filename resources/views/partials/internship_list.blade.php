{{-- @foreach ($internship as $intern)
    <div class="p-4 bg-white shadow-md rounded-lg mb-4">
        <div class="flex items-center gap-4 mb-2">
            @if($intern->company && $intern->company->logo)
                <img src="{{ asset('assets/logo/' . $intern->company->logo) }}" alt="{{ $intern->company->company_name }} logo" class="w-12 h-12">
            @else
                <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-12 h-12">
            @endif
            <a href="/internship/{{ $intern->slug }}" class="font-medium text-xl md:text-2xl">{{ $intern->title }}</a>
        </div>
        <a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a>
        <p class="text-sm md:text-base">{{ $intern->excerpt }}</p>

        <hr>
        <p class="mt-2">
            Rating: {{ $intern->averageRating() ? round($intern->averageRating(), 2) : 'No rating yet' }} / 5
        </p>
        <p class="text-sm">{{ $intern->commentsCount() }} comments</p>
    </div>
@endforeach --}}

<ul id="internship-list">
    @foreach ($internship as $intern)
        <div class="p-4 bg-white shadow-md rounded-lg @if (!$loop->last) mb-2 @endif cursor-pointer internship-item" onclick="showDetails('{{ $intern->id }}')" id="intern-{{ $intern->id }}">
            <div class="flex items-center gap-4 mb-2">
                @if($intern->company && $intern->company->logo)
                    <img src="{{ asset('assets/logo/' . $intern->company->logo) }}" alt="{{ $intern->company->company_name }} logo" class="w-12 h-12">
                @else
                    <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-12 h-12">
                @endif
                <a href="/internship/{{ $intern->slug }}" class="font-medium text-xl md:text-2xl">{{ $intern->title }}</a>
            </div>
            <li><a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a></li>
            <hr class="my-2">
            <li>{{ $intern->excerpt }}</li>
            <p class="mt-2">
                Rating: {{ $intern->averageRating() ? round($intern->averageRating(), 2) : 'No rating yet' }} / 5
            </p>
            <p class="text-sm">{{ $intern->commentsCount() }} comments</p>
            <span class="text-sky-300">Read more >></span>
        </div>
    @endforeach
</ul>
