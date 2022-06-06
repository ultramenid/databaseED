<div class="relative" x-data="{ isProfileMenuOpen: false}">
    <button
      title="Profile"
      @click="isProfileMenuOpen = !isProfileMenuOpen"
      @click.away="isProfileMenuOpen = false"
      @keydown.escape="isProfileMenuOpen = false"
      aria-label="Account"
      aria-haspopup="true"
      class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
    >
      <img
        class="object-cover w-8 h-8 rounded-full"
        src="{{asset('assets/minecraft.png')}}"
        alt=""
        aria-hidden="true"
      />
    </button>
    <template x-if="isProfileMenuOpen">
      <ul
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-0"
        x-transition:leave-end="opacity-100"
        class="z-20 absolute right-0 w-36 p-2 mt-2 space-y-2 text-gray-600 bg-gray-300 rounded-md shadow-md "
        aria-label="submenu"
      >
        <li class="flex">
          <a
            class="inline-flex items-center w-full px-2 py-1 text-sm  transition-colors duration-150 rounded-md hover:bg-gray-200 hover:text-gray-800 "
            href="{{url('/cms/page/logout')}}"
          >
            <svg
              class="w-4 h-4 mr-3"
              aria-hidden="true"
              fill="none"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
              ></path>
            </svg>
            <span>Log out</span>
          </a>
        </li>
      </ul>
    </template>
</div>
