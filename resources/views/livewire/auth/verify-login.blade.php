<div class="min-h-screen bg-slate-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center">
            <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-600/30">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
        </div>
        <h2 class="mt-6 text-center text-3xl font-black tracking-tight text-slate-900">
            Vérifiez votre email
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            Nous avons envoyé un code à 6 chiffres à <span class="font-bold text-slate-800">{{ $email }}</span>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-2xl sm:px-10 border border-slate-100">
            
            @if (session()->has('resent'))
                <div class="mb-4 rounded-xl bg-emerald-50 p-4 border border-emerald-100">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-emerald-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-emerald-800">
                                {{ session('resent') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <form wire:submit.prevent="verify" class="space-y-6">
                
                <div>
                    <label for="otp" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2 text-center">
                        Code de sécurité
                    </label>
                    <div class="mt-1">
                        <input wire:model="otp" id="otp" name="otp" type="text" inputmode="numeric" pattern="[0-9]*" maxlength="6" required autocomplete="one-time-code"
                            class="appearance-none block w-full px-3 py-4 border border-slate-200 rounded-xl shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-2xl text-center tracking-widest font-mono transition-colors"
                            placeholder="••••••">
                    </div>
                    @error('otp') <p class="mt-2 text-sm text-red-600 font-medium text-center">{{ $message }}</p> @enderror
                </div>

                <div>
                    <button type="submit" wire:loading.attr="disabled"
                        class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-emerald-600/20 text-sm font-bold text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all disabled:opacity-70">
                        <span wire:loading.remove>Se connecter</span>
                        <span wire:loading class="flex items-center gap-2">
                            <svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Vérification...
                        </span>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center space-y-2">
                <button wire:click="resend" type="button" class="text-sm font-medium text-emerald-600 hover:text-emerald-500 block w-full">
                    Je n'ai pas reçu le code
                </button>
                <a href="{{ route('login') }}" class="text-sm font-medium text-slate-500 hover:text-slate-700 block w-full mt-2">
                    Changer d'adresse email
                </a>
            </div>
        </div>
    </div>
</div>
