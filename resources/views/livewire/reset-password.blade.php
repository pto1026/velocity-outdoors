<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                 alt="Your Company">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Reset your password</h2>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST" wire:submit.prevent="submit">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                           class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                           placeholder="Email address" wire:model.lazy="email">
                    @error('email') <span class="text-red-700 font-bold flex justify-center items-center">{{ $message }}</span>@enderror
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                           class="relative block w-full appearance-none rounded-none border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                           placeholder="Password" wire:model="password">
                    @error('password') <span class="text-red-700 font-bold flex justify-center items-center">{{ $message }}</span>@enderror
                </div>
                <div>
                    <label for="confirm" class="sr-only">Confirm Password</label>
                    <input id="confirm" name="confirm" type="password" required
                           class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                           placeholder="Confirm Password" wire:model="confirm">
                    @error('confirm') <span class="text-red-700 font-bold flex justify-center items-center">{{ $message }}</span>@enderror
                </div>
            </div>
            <div>
                <button type="submit"
                        class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            <!-- Heroicon name: mini/lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd"
                    d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                    clip-rule="evenodd"/>
            </svg>
          </span>
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>
