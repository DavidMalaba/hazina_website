<div class="min-h-screen bg-slate-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900">
            Vérification de sécurité
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            Veuillez entrer le code à 6 chiffres envoyé à votre adresse email.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            
            @if($error)
                <div class="rounded-md bg-red-50 p-4 mb-6">
                    <div class="flex">
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">{{ $error }}</h3>
                        </div>
                    </div>
                </div>
            @endif

            <form wire:submit="verify" class="space-y-6">
                <div>
                    <label for="code" class="block text-sm font-medium text-slate-700">
                        Code OTP
                    </label>
                    <div class="mt-1">
                        <input wire:model="code" id="code" name="code" type="text" required class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm text-center text-2xl tracking-widest font-mono" placeholder="------">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        Vérifier
                    </button>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-slate-500">
                            Vous n'avez pas reçu le code ?
                        </span>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <button wire:click="resend" class="text-sm font-medium text-emerald-600 hover:text-emerald-500">
                        Renvoyer le code
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
