<div class="min-h-screen bg-slate-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-slate-900">
            Configuration de votre compte
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            Bienvenue ! Veuillez entrer votre code de vérification et choisir un mot de passe.
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            
            @if($success)
                <div class="rounded-md bg-green-50 p-4 mb-6">
                    <div class="flex">
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Compte configuré avec succès !</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Vous pouvez maintenant vous connecter à votre compte.</p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('filament.admin.auth.login') }}" class="font-medium text-green-800 hover:text-green-700">Aller à la connexion &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @if($error)
                    <div class="rounded-md bg-red-50 p-4 mb-6">
                        <div class="flex">
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">{{ $error }}</h3>
                            </div>
                        </div>
                    </div>
                @endif

                <form wire:submit="save" class="space-y-6">
                    <div>
                        <label for="code" class="block text-sm font-medium text-slate-700">
                            Code de sécurité (reçu par email)
                        </label>
                        <div class="mt-1">
                            <input wire:model="code" id="code" type="text" required class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm text-center tracking-widest font-mono text-xl" placeholder="------">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-slate-700">Nouveau mot de passe</label>
                        <div class="mt-1">
                            <input wire:model="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                        </div>
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Confirmer le mot de passe</label>
                        <div class="mt-1">
                            <input wire:model="password_confirmation" id="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                            Enregistrer et continuer
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
