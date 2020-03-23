<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/">{{config('app.name')}}</a></h5>
    {{--<nav class="my-2 my-md-0 mr-md-3">--}}
        {{--<a class="p-2 text-dark" href="{{ route('admin.teams.index') }}">{{__('Équipes')}}</a>--}}
        {{--<a class="p-2 text-dark" href="{{ route('admin.matches.index') }}">Matchs</a>--}}
        {{-- <a class="p-2 text-dark" href="{{ route('admin.match_dates') }}">Match par dates</a> --}}
        {{--<a class="p-2 text-dark" href="{{ route('admin.groups.index') }}">Groupes</a>--}}
        {{--<a class="p-2 text-dark" href="{{ route('admin.players.index') }}">Joueurs</a>--}}
        {{--<a class="p-2 text-dark" href="{{ route('admin.pushes.index') }}">Push</a>--}}
        {{--<a class="p-2 text-dark" href="{{ route('admin.sponsors.index') }}">Sponseurs</a>--}}
    {{--</nav>--}}

    @auth
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/logout"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    @endauth
</div>
