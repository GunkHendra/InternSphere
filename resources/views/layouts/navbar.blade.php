<nav class=" fixed w-full top-0 flex justify-between items-center px-6 py-4 shadow-md text-sm">
    <a href="/" class="flex items-center space-x-4">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo InternSphere" class="max-h-8 max-w-8">
      <span>{{ config('app.name', 'InternSphere') }}</span>
    </a>
    <div>
      <ul class="flex justify-between space-x-4">
        <li><a href="/" class="{{ ($title === "Home") ? "text-black" : "text-slate-500" }}">Home</a></li>
        <li><a href="/internship" class="{{ ($title === "Internship") ? "text-black" : "text-slate-500" }}">Internship</a></li>
        <li><a href="/company" class="{{ ($title === "Company") ? "text-black" : "text-slate-500" }}">Company</a></li>
        <li><a href="/mynetwork" class="{{ ($title === "My Network") ? "text-black" : "text-slate-500" }}">My Network</a></li>
        <li><a href="/message" class="{{ ($title === "Message") ? "text-black" : "text-slate-500" }}">Message</a></li>
        <li><a href="/profile" class="{{ ($title === "Profile") ? "text-black" : "text-slate-500" }}">Profile</a></li>
      </ul>
    </div>
</nav>

