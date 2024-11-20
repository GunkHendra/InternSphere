 <nav class="bg-black fixed w-full top-0 flex justify-between items-center px-8 py-4 shadow-md z-50">
  <a href="/" class="flex items-center" id="logo">
      <img src="{{ asset('assets/logo.png') }}" alt="Logo InternSphere" class="max-h-8 max-w-8">
      <span class="ml-4 text-white">{{ config('app.name', 'InternSphere') }}</span>
  </a>
  <div class="flex flex-col justify-end text-end space-y-2">
    <div class="md:hidden">
      <button id="menu-toggle" class="text-white focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
      </button>
    </div>
    <div class="hidden md:flex" id="navbar-menu">
        <ul class="md:flex justify-between gap-4">
            <li><a href="/" class="{{ ($title === 'Home') ? 'text-white' : 'text-slate-400' }}">Home</a></li>
            <li><a href="/internship" class="{{ ($title === 'Internship') ? 'text-white' : 'text-slate-400' }}">Internship</a></li>
            <li><a href="/company" class="{{ ($title === 'Company') ? 'text-white' : 'text-slate-400' }}">Company</a></li>
            @auth
            <li class="relative">
                <button id="profile-dropdown-toggle" class="{{ ($title === 'Profile') ? 'text-white' : 'text-slate-400' }}">Profile</button>
                <ul id="profile-dropdown" class="absolute right-0 mt-2 hidden shadow-lg">
                    <li><a href="/profile" class="block px-4 py-2 bg-white text-black rounded-t-md">Profile</a></li>
                    <li class="bg-red-600 rounded-b-md">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-white block w-full text-left px-4 py-2">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <li><a href="/about" class="{{ ($title === 'About Us') ? 'text-white' : 'text-slate-400' }}">About Us</a></li>
            <li><a href="/login" class="{{ ($title === 'Login') ? 'text-white' : 'text-slate-400' }}">Login</a></li>
            @endauth
        </ul>
    </div>
  </div>
</nav>

<script>
  document.getElementById('menu-toggle').addEventListener('click', function() {
    const menu = document.getElementById('navbar-menu');
    menu.classList.toggle('hidden');
  });

  document.getElementById('profile-dropdown-toggle').addEventListener('click', function(event) {
    event.preventDefault();
    const dropdown = document.getElementById('profile-dropdown');
    dropdown.classList.toggle('hidden');
  });

  document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('profile-dropdown');
    const toggle = document.getElementById('profile-dropdown-toggle');
    
    if (!toggle.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
  });
</script>

