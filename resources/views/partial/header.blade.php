<nav class="flex items-center justify-between w-full py-2 px-16 text-gray-600 capitalize z-10">

    <a href="/">
        <img src="/assets/img/logo.png" alt="logo brand" width='75px'>
        <p class='font-bold'>Volley win</p>
    </a>

    <div class='flex gap-14'>
        <a href="/"
            class="{{ request()->routeIs('home') ? 'active' : '' }} navLink text-xl font-extrabold border-b-2 border-transparent transition-colors duration-300 transform pb-2 hover:border-[#cc5200] tracking-widest">HOME</a>

        <a href="/equipes"
            class="{{ request()->routeIs('equipes.*') ? 'active' : '' }} navLink text-xl font-extrabold border-b-2 border-transparent transition-colors duration-300 transform pb-2 hover:border-[#cc5200] tracking-widest">EQUIPES</a>

        <a href="/joueurs"
            class="{{ request()->routeIs('joueurs.*') ? 'active' : '' }} navLink text-xl font-extrabold border-b-2 border-transparent transition-colors duration-300 transform pb-2 hover:border-[#cc5200] tracking-widest">JOUEURS</a>
    </div>

</nav>
