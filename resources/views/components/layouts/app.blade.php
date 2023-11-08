<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ?? 'JMJ' }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  <script src="{{ asset('js/components.js') }}"></script>
  <link rel="modulepreload" href="{{ asset('js/iframe-alpine-964dceff.js') }}">
  <link rel="modulepreload" href="{{ asset('js/iframe-a81dc9a8.js') }}">
  <link rel="modulepreload" href="{{ asset('js/_commonjsHelpers-87174ba5.js') }}">
  <script type="module" src="{{ asset('js/iframe-alpine-964dceff.js') }}"></script>
  @livewireStyles
</head>

<body class="bg-gray-100">
  {{-- Navbar --}}
  @if(!isset($navbar))
  <div class="bg-gray-100">

    <nav x-data="{ open: false }" class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 justify-between">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button -->
            <button type="button"
              class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
              aria-controls="mobile-menu" @click="open = !open" aria-expanded="false"
              x-bind:aria-expanded="open.toString()">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <svg x-description="Icon when menu is closed." x-state:on="Menu open" x-state:off="Menu closed"
                class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5">
                </path>
              </svg>
              <svg x-description="Icon when menu is open." x-state:on="Menu open" x-state:off="Menu closed"
                class="hidden h-6 w-6" :class="{ 'block': open, 'hidden': !(open) }" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
              <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&amp;shade=600"
                alt="Your Company">
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
              <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
              <a href="#"
                class="inline-flex items-center border-b-2 border-indigo-500 px-1 pt-1 text-sm font-medium text-gray-900">Dashboard</a>
              <a href="#"
                class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Team</a>
              <a href="#"
                class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Projects</a>
              <a href="#"
                class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Calendar</a>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <button type="button"
              class="relative rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0">
                </path>
              </svg>
            </button>

            <!-- Profile dropdown -->
            <div x-data="Components.menu({ open: false })" x-init="init()"
              @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)"
              class="relative ml-3">
              <div>
                <button type="button"
                  class="relative flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                  id="user-menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()"
                  @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true"
                  x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()"
                  @keydown.arrow-down.prevent="onArrowDown()">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                    alt="">
                </button>
              </div>

              <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical"
                aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()"
                style="display: none;">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" x-state:on="Active" x-state:off="Not Active"
                  :class="{ 'bg-gray-100': activeIndex === 0 }" role="menuitem" tabindex="-1" id="user-menu-item-0"
                  @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 0)"
                  @mouseleave="onMouseLeave($event)" @click="open = false; focusButton()">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" :class="{ 'bg-gray-100': activeIndex === 1 }"
                  role="menuitem" tabindex="-1" id="user-menu-item-1" @mouseenter="onMouseEnter($event)"
                  @mousemove="onMouseMove($event, 1)" @mouseleave="onMouseLeave($event)"
                  @click="open = false; focusButton()">Settings</a>
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                  class="block px-4 py-2 text-sm text-gray-700" :class="{ 'bg-gray-100': activeIndex === 2 }"
                  role="menuitem" tabindex="-1" id="user-menu-item-2" @mouseenter="onMouseEnter($event)"
                  @mousemove="onMouseMove($event, 2)" @mouseleave="onMouseLeave($event)"
                  @click="open = false; focusButton()">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
  </div>

  <div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden" id="mobile-menu" x-show="open"
    style="display: none;">
    <div class="space-y-1 pb-4 pt-2">
      <a href="#"
        class="block border-l-4 border-indigo-500 bg-indigo-50 py-2 pl-3 pr-4 text-base font-medium text-indigo-700">Dashboard</a>
      <a href="#"
        class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">Team</a>
      <a href="#"
        class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">Projects</a>
      <a href="#"
        class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-500 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-700">Calendar</a>
    </div>
  </div>
  </nav>

  </div>
  @endif
  <main class="mx-auto w-full max-w-7xl py-10">
    {{ $slot }}
  </main>
  @livewireScripts
</body>

</html>