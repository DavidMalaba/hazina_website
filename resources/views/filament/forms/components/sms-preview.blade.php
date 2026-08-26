<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px 0; min-height: 500px;">

    <!-- iPhone Mockup Shell -->
    <div style="position: relative; width: 320px; height: 600px; background-color: #f2f2f7; border-radius: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border: 10px solid #1f2937; overflow: hidden; display: flex; flex-direction: column;">
        
        <!-- Notch -->
        <div style="position: absolute; top: 0; left: 0; right: 0; height: 20px; background-color: #1f2937; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; width: 50%; margin: 0 auto; z-index: 10; display: flex; justify-content: center; align-items: flex-end; padding-bottom: 4px;">
            <div style="width: 40px; height: 4px; background-color: #111827; border-radius: 9999px;"></div>
        </div>

        <!-- iMessage Header -->
        <div style="background-color: rgba(242, 242, 247, 0.9); backdrop-filter: blur(12px); padding: 8px 16px; display: flex; flex-direction: column; align-items: center; padding-top: 32px; border-bottom: 1px solid #d1d5db; z-index: 0;">
            <div style="width: 48px; height: 48px; background-color: #d1d5db; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 4px; color: white; font-size: 20px; font-weight: 500; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                H
            </div>
            <h3 style="font-size: 12px; font-weight: 600; color: black; margin: 0; display: flex; align-items: center;">
                Hazina
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 12px; width: 12px; margin-left: 4px; color: #9ca3af;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </h3>
        </div>

        <!-- Chat Area -->
        <div style="flex: 1; overflow-y: auto; padding: 16px; display: flex; flex-direction: column;">
            
            <!-- Date Badge -->
            <div style="display: flex; justify-content: center; margin-bottom: 16px; margin-top: 8px;">
                <span style="color: #8e8e93; font-size: 10px; font-weight: 500; letter-spacing: 0.025em;">
                    Aujourd'hui 12:00
                </span>
            </div>

            <!-- SMS Bubble -->
            <div style="display: flex; flex-direction: column; gap: 4px; align-items: flex-start; max-width: 85%;">
                <span style="font-size: 10px; color: #6b7280; margin-left: 12px;">Hazina</span>
                <div style="background-color: #e9e9eb; color: black; padding: 8px 16px; border-radius: 1rem; border-bottom-left-radius: 2px; font-size: 15px; line-height: 1.4; position: relative; word-break: break-word; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                    <div style="white-space: pre-wrap;">{{ $content ?: 'Votre SMS s\'affichera ici...' }}</div>
                </div>
            </div>
            
            <!-- Character Count Warning -->
            @if($content)
            <div style="margin-top: 16px; display: flex; justify-content: center;">
                <div style="background-color: white; border: 1px solid {{ strlen($content) > 160 ? '#fecaca' : '#e5e7eb' }}; color: {{ strlen($content) > 160 ? '#ef4444' : '#6b7280' }}; padding: 6px 12px; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); display: flex; align-items: center; gap: 8px; font-size: 10px;">
                    <svg xmlns="http://www.w3.org/2000/svg" style="height: 16px; width: 16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>
                        <strong>{{ strlen($content) }}</strong> caractères 
                        <span>{{ strlen($content) > 160 ? '(Sera envoyé en ' . ceil(strlen($content) / 160) . ' SMS)' : '(1 SMS)' }}</span>
                    </span>
                </div>
            </div>
            @endif

        </div>
        
        <!-- Input area -->
        <div style="background-color: #f2f2f7; padding: 8px; border-top: 1px solid #d1d5db; padding-bottom: 24px; display: flex; align-items: center; gap: 12px; padding-left: 16px; padding-right: 16px;">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 24px; width: 24px; color: #8e8e93;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <div style="border: 1px solid #c6c6c8; background-color: white; border-radius: 9999px; flex: 1; height: 32px; padding: 0 12px; display: flex; align-items: center; color: #c6c6c8; font-size: 14px; box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);">
                iMessage
            </div>
        </div>
    </div>
</div>
