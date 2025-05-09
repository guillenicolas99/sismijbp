@php
    $links = [
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => '/',
            'active' => request()->routeIs('dashboard'),
        ],
        [
            'header' => 'Administración',
        ],
        [
            'name' => 'Administrar roles',
            'route' => 'users.index',
            'icon' => '/',
            'active' => request()->routeIs('users.index'),
        ],
        [
            'header' => 'Eventos',
        ],
        [
            'name' => 'Eventos',
            'route' => 'eventos.index',
            'icon' => '/',
            'active' => request()->routeIs('eventos.index'),
        ],
        [
            'header' => 'Discípulos',
        ],

        [
            'name' => 'Discípulos',
            'route' => 'personas.index',
            'icon' => '/',
            'active' => request()->routeIs('personas.index'),
        ],

        [
            'name' => 'Discipulados',
            'route' => 'discipulados.index',
            'icon' => '/',
            'active' => request()->routeIs('discipulados.index'),
        ],

        [
            'header' => 'Redes',
        ],

        [
            'name' => 'Redes',
            'route' => 'redes.index',
            'icon' => '/',
            'active' => request()->routeIs('redes.index'),
        ],

        [
            'header' => 'Evangelismo y afirmación',
        ],

        [
            'name' => 'Evangelismo y afirmación',
            'route' => 'evangelismos.index',
            'icon' => '/',
            'active' => request()->routeIs('evangelismos.index'),
        ],
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                <li>
                    @isset($link['header'])
                        <div class="px-3 py-2 text-xs font-semibold text-gray-500 uppercase dark:text-gray-400">
                            {{ $link['header'] }}
                        </div>
                    @else
                        <a href="{{ route($link['route']) }}"
                            class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    @endisset
                </li>
            @endforeach
        </ul>
    </div>
</aside>
