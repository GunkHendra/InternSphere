<nav class="bg-black fixed w-full top-0 flex justify-between items-center px-6 py-4 shadow-md text-sm">
    <a href="/" class="flex items-center">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo InternSphere" class="max-h-8 max-w-8">
      <span class="ml-4 text-white">{{ config('app.name', 'InternSphere') }}</span>
    </a>
    <div>
      <ul class="flex justify-between gap-4">
        <li><a href="/" class="{{ ($title === "Home") ? "text-white" : "text-slate-400" }}">Home</a></li>
        <li><a href="/internship" class="{{ ($title === "Internship") ? "text-white" : "text-slate-400" }}">Internship</a></li>
        <li><a href="/company" class="{{ ($title === "Company") ? "text-white" : "text-slate-400" }}">Company</a></li>
        {{-- <li><a href="/mynetwork" class="{{ ($title === "My Network") ? "text-white" : "text-slate-400" }}">My Network</a></li> --}}
        <li><a href="/message" class="{{ ($title === "Message") ? "text-white" : "text-slate-400" }}">Message</a></li>
        @auth
          <li><a href="/profile" class="{{ ($title === "Profile") ? "text-white" : "text-slate-400" }}">Profile</a></li>
        @else
          <li><a href="/login" class="{{ ($title === "Login") ? "text-white" : "text-slate-400" }}">Login</a></li>
        @endauth
      </ul>
    </div>
</nav>

