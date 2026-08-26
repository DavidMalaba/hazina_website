@php
$buttonHtml = '';
if ($cta_text && $cta_url) {
    $buttonHtml = "
        <div style='text-align: center; margin: 35px 0 20px 0;'>
            <a href='{$cta_url}' style='display: inline-block; background-color: #94ef1e; color: #1c252e; text-decoration: none; font-weight: 700; font-size: 16px; padding: 14px 28px; border-radius: 8px;' target='_blank'>{$cta_text}</a>
        </div>
    ";
}

$html = "
<!DOCTYPE html>
<html>
<head>
    <style>
        body { margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; color: #334155; }
        .wrapper { padding: 20px 10px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .header { background-color: #1c252e; padding: 25px; text-align: center; border-bottom: 4px solid #94ef1e; color: white; font-weight: bold; font-size: 20px; }
        .body { padding: 30px; }
        .greeting { font-size: 20px; font-weight: 700; color: #1c252e; margin-bottom: 25px; }
        .content h1, .content h2, .content h3 { color: #1c252e; }
        .footer { background-color: #f8fafc; padding: 20px; text-align: center; border-top: 1px solid #e2e8f0; font-size: 12px; color: #64748b; }
    </style>
</head>
<body>
    <div class='wrapper'>
        <div class='container'>
            <div class='header'>
                Hazina Mining Hub
            </div>
            <div class='body'>
                <div class='greeting'>Bonjour Prénom,</div>
                <div class='content'>" . ($content ?: '<p style="color:#9ca3af;font-style:italic">Commencez à écrire votre e-mail...</p>') . "</div>
                {$buttonHtml}
            </div>
            <div class='footer'>
                Vous recevez cet e-mail car vous êtes abonné(e) à notre newsletter.
            </div>
        </div>
    </div>
</body>
</html>
";
@endphp

<div x-data="{ device: 'desktop' }" class="flex flex-col h-full space-y-4">

    <!-- Device Toggles -->
    <div class="flex justify-center space-x-2 bg-gray-100 p-2 rounded-lg border border-gray-200">
        <button type="button" @click="device = 'desktop'" :class="{ 'bg-white shadow-sm ring-1 ring-gray-200 text-emerald-600': device === 'desktop', 'text-gray-500 hover:text-gray-700': device !== 'desktop' }" class="px-3 py-1.5 rounded-md text-sm font-medium transition-all flex items-center space-x-1">
            <x-heroicon-o-computer-desktop class="w-4 h-4" />
            <span>Desktop</span>
        </button>
        <button type="button" @click="device = 'tablet'" :class="{ 'bg-white shadow-sm ring-1 ring-gray-200 text-emerald-600': device === 'tablet', 'text-gray-500 hover:text-gray-700': device !== 'tablet' }" class="px-3 py-1.5 rounded-md text-sm font-medium transition-all flex items-center space-x-1">
            <x-heroicon-o-device-tablet class="w-4 h-4" />
            <span>Tablet</span>
        </button>
        <button type="button" @click="device = 'mobile'" :class="{ 'bg-white shadow-sm ring-1 ring-gray-200 text-emerald-600': device === 'mobile', 'text-gray-500 hover:text-gray-700': device !== 'mobile' }" class="px-3 py-1.5 rounded-md text-sm font-medium transition-all flex items-center space-x-1">
            <x-heroicon-o-device-phone-mobile class="w-4 h-4" />
            <span>Mobile</span>
        </button>
    </div>

    <!-- Preview Subject -->
    <div class="px-4 py-3 bg-white border border-gray-200 rounded-lg shadow-sm">
        <span class="text-xs font-bold text-gray-500 uppercase">Sujet :</span>
        <span class="ml-2 text-sm text-gray-900 font-medium">{{ $subject ?: '(Sans sujet)' }}</span>
    </div>

    <!-- Iframe Container -->
    <div class="flex-1 bg-gray-200 rounded-xl overflow-hidden border-4 border-gray-300 shadow-inner flex justify-center py-8 relative transition-all duration-300 min-h-[500px]">
        
        <div class="transition-all duration-500 ease-in-out h-full overflow-hidden shadow-2xl bg-white"
             :class="{
                 'w-full max-w-4xl rounded-md': device === 'desktop',
                 'w-[768px] rounded-2xl border-8 border-gray-800': device === 'tablet',
                 'w-[375px] rounded-[2rem] border-[12px] border-gray-800 relative': device === 'mobile'
             }">
             
             <!-- iPhone Notch Simulation -->
             <div x-show="device === 'mobile'" class="absolute top-0 inset-x-0 h-6 bg-gray-800 rounded-b-xl w-1/2 mx-auto z-10 flex justify-center items-end pb-1">
                 <div class="w-12 h-1.5 bg-gray-900 rounded-full"></div>
             </div>

            <iframe 
                srcdoc="{{ $html }}" 
                class="w-full h-full border-0 bg-[#f1f5f9]"
                sandbox="allow-same-origin allow-scripts"
            ></iframe>
        </div>
    </div>
</div>
