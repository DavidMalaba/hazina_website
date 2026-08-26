<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 24px 0; min-height: 500px;">

    <!-- iPhone Mockup Shell -->
    <div style="position: relative; width: 320px; height: 600px; background-color: #efeae2; border-radius: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border: 10px solid #1f2937; overflow: hidden; display: flex; flex-direction: column;">
        
        <!-- Notch -->
        <div style="position: absolute; top: 0; left: 0; right: 0; height: 20px; background-color: #1f2937; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; width: 50%; margin: 0 auto; z-index: 10; display: flex; justify-content: center; align-items: flex-end; padding-bottom: 4px;">
            <div style="width: 40px; height: 4px; background-color: #111827; border-radius: 9999px;"></div>
        </div>

        <!-- WhatsApp Header -->
        <div style="background-color: #075e54; color: white; padding: 12px 16px; display: flex; align-items: center; padding-top: 32px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); z-index: 0;">
            <button style="color: white; background: none; border: none; cursor: pointer; padding: 0; margin-right: 12px;">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px;" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
            <div style="width: 36px; height: 36px; background-color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; overflow: hidden; flex-shrink: 0; margin-right: 12px;">
                <img src="/images/logo.png" alt="Hazina" style="width: 24px; height: 24px; object-fit: contain;" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 100 100\'><rect width=\'100\' height=\'100\' fill=\'#075e54\'/></svg>'">
            </div>
            <div style="flex: 1; min-width: 0;">
                <h3 style="font-size: 14px; font-weight: 600; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.2;">Hazina Mining Hub</h3>
                <p style="font-size: 10px; color: #d1fae5; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">compte professionnel</p>
            </div>
        </div>

        <!-- WhatsApp Chat Background Image -->
        <div style="flex: 1; overflow-y: auto; padding: 16px; background-image: url('data:image/svg+xml;utf8,<svg width=\'100\' height=\'100\' xmlns=\'http://www.w3.org/2000/svg\'><g fill=\'#000000\' fill-opacity=\'0.03\'><path d=\'M20 10 L30 20 M80 90 L90 80\' stroke=\'#000000\' stroke-width=\'1\'/></g></svg>'); display: flex; flex-direction: column; gap: 16px;">
            
            <!-- Date Badge -->
            <div style="display: flex; justify-content: center;">
                <span style="background-color: #e1f3fb; color: #374151; font-size: 11px; padding: 4px 12px; border-radius: 8px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                    Aujourd'hui
                </span>
            </div>

            <!-- Encryption Notice -->
            <div style="display: flex; justify-content: center;">
                <div style="background-color: #fef1bf; color: #374151; font-size: 10px; padding: 6px 12px; border-radius: 8px; text-align: center; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); max-width: 90%; line-height: 1.4;">
                    <svg xmlns="http://www.w3.org/2000/svg" style="height: 12px; width: 12px; display: inline; margin-right: 4px; color: #4b5563; vertical-align: middle;" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                    Les messages sont chiffrés de bout en bout.
                </div>
            </div>

            <!-- Message Bubble -->
            <div style="display: flex;">
                <div style="background-color: white; border-radius: 8px; border-top-left-radius: 0; padding: 4px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); max-width: 85%; position: relative; border: 1px solid #f3f4f6; display: flex; flex-direction: column;">
                    <!-- Tail -->
                    <svg viewBox="0 0 8 13" style="position: absolute; left: -8px; top: 0; color: white; width: 8px; height: 12px;" fill="currentColor">
                        <path d="M1.533 3.568L8 12.193V1H2.812C1.042 1 .474 2.099 1.533 3.568z"></path>
                    </svg>
                    
                    @if($image)
                        <div style="width: 100%; border-radius: 6px; overflow: hidden; margin-bottom: 6px; background-color: #f3f4f6; min-height: 100px; display: flex; align-items: center; justify-content: center;">
                            @php
                                $imageUrl = '';
                                $imagePath = '';
                                
                                if (is_string($image)) {
                                    $imagePath = $image;
                                } elseif (is_array($image) && count($image) > 0) {
                                    $first = array_values($image)[0];
                                    if (is_string($first)) {
                                        $imagePath = $first;
                                    } elseif (is_object($first) && method_exists($first, 'temporaryUrl')) {
                                        $imageUrl = $first->temporaryUrl();
                                    }
                                } elseif (is_object($image) && method_exists($image, 'temporaryUrl')) {
                                    $imageUrl = $image->temporaryUrl();
                                }
                                
                                if (!$imageUrl && $imagePath) {
                                    if (str_starts_with($imagePath, 'http')) {
                                        $imageUrl = $imagePath;
                                    } else {
                                        $imageUrl = Storage::disk('public')->url($imagePath);
                                    }
                                }
                            @endphp
                            @if($imageUrl)
                                <img src="{{ $imageUrl }}" style="width: 100%; height: auto; display: block;">
                            @else
                                <span style="font-size: 10px; color: #9ca3af;">Image temporaire</span>
                            @endif
                        </div>
                    @endif
                    
                    <div style="padding: 4px; font-size: 13px; color: #1f2937; line-height: 1.4; white-space: pre-wrap; word-break: break-word;">{{ $content ?: 'Votre message s\'affichera ici...' }}</div>
                    
                    <div style="display: flex; justify-content: flex-end; align-items: center; padding: 0 4px 4px 4px;">
                        <span style="font-size: 10px; color: #9ca3af;">12:00</span>
                    </div>

                    @if($cta_text && $cta_url)
                        <div style="border-top: 1px solid #f3f4f6; padding: 8px 4px 4px 4px; display: flex; justify-content: center; align-items: center; margin-top: 2px;">
                            <a href="#" style="color: #0ea5e9; font-size: 13px; font-weight: 500; text-decoration: none; display: flex; align-items: center; gap: 6px;">
                                <svg xmlns="http://www.w3.org/2000/svg" style="height: 14px; width: 14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                </svg>
                                {{ $cta_text }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
        
        <!-- Input area -->
        <div style="background-color: #f0f0f0; padding: 8px; display: flex; align-items: center; gap: 8px;">
            <div style="background-color: white; border-radius: 9999px; flex: 1; height: 36px; padding: 0 16px; display: flex; align-items: center; color: #9ca3af; font-size: 14px;">
                Message...
            </div>
            <div style="background-color: #00a884; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                <svg xmlns="http://www.w3.org/2000/svg" style="height: 16px; width: 16px;" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
</div>
