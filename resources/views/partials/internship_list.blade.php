@if ($internship->first() === null)
    <div class="p-4 mb-2 bg-white shadow-md rounded-lg">
        There's nothing to see here yet...
    </div>
@endif
<ul>
@foreach ($internship as $intern)
    <div class="p-4 bg-white shadow-md rounded-lg @if (!$loop->last) mb-2 @endif">
        <li><a href="/internship/{{ $intern->slug }}" class="font-medium text-3xl">{{ $intern->title }}</a></li>
        <li><a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a></li>
        <hr class="my-2">
        <li>{{ $intern->excerpt }}</li>
        <a class="text-sky-300" href="/internship/{{ $intern->slug }}"> Read more >></a>
    </div>
@endforeach
</ul>
