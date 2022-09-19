<nav>

    <div class="container flex items-center justify-between p-6 mx-auto text-gray-600 capitalize">

        <a href="/">
            <img src="/assets/img/logo.png" alt="logo brand" width='75px'>
            <p class='font-bold'>Volley win</p>
        </a>

        <div>
            <a href="/" class="{{request()->routeIs('home') ? 'active' : '' }} border-b-2 border-transparent transition-colors duration-300 transform pb-2 hover:border-[#cc5200] mx-1.5 sm:mx-6">HOME</a>

            <a href="/equipes" class="{{ request()->routeIs('equipes.*') ? 'active' : '' }} border-b-2 border-transparent transition-colors duration-300 transform pb-2 hover:border-[#cc5200] mx-1.5 sm:mx-6">EQUIPES</a>

            <a href="/joueurs" class="{{ request()->routeIs('joueurs.*') ? 'active' : ''  }} border-b-2 border-transparent transition-colors duration-300 transform pb-2 hover:border-[#cc5200] mx-1.5 sm:mx-6">JOUEURS</a>
        </div>

    </div>
</nav>
