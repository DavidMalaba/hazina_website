<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $campaign->email_subject }}</title>
    <style type="text/css">
        /* Reset CSS */
        body, p, div, h1, h2, h3, h4, h5, h6 { margin: 0; padding: 0; }
        body, p, div { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #334155; }
        img { -ms-interpolation-mode: bicubic; max-width: 100%; height: auto; border: 0; }
        table { border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; }
        
        /* Layout */
        body { background-color: #f1f5f9; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; margin: 0; padding: 0; }
        .email-container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); }
        .email-wrapper { padding: 40px 20px; background-color: #f1f5f9; }
        
        /* Header */
        .header { background-color: #1c252e; padding: 35px 40px; text-align: center; border-bottom: 4px solid #94ef1e; }
        .header img { max-height: 50px; width: auto; }
        
        /* Content */
        .content-body { padding: 40px; background-color: #ffffff; }
        .greeting { font-size: 20px; font-weight: 700; color: #1c252e; margin-bottom: 25px; }
        .newsletter-content h1, .newsletter-content h2, .newsletter-content h3 { color: #1c252e; margin-top: 30px; margin-bottom: 15px; font-weight: 700; }
        .newsletter-content p { margin-bottom: 20px; }
        .newsletter-content a { color: #2563eb; text-decoration: none; font-weight: 500; }
        .newsletter-content a:hover { text-decoration: underline; }
        .newsletter-content img { border-radius: 8px; margin: 20px 0; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); }
        .newsletter-content ul, .newsletter-content ol { margin-bottom: 20px; padding-left: 20px; }
        .newsletter-content li { margin-bottom: 10px; }
        
        .cta-button-container { text-align: center; margin: 35px 0 20px 0; }
        .cta-button { display: inline-block; background-color: #94ef1e; color: #1c252e; text-decoration: none; font-weight: 700; font-size: 16px; padding: 14px 28px; border-radius: 8px; transition: background-color 0.2s; }
        .cta-button:hover { background-color: #7ccf10; text-decoration: none; }
        
        /* Footer */
        .footer { background-color: #f8fafc; padding: 30px 40px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer p { font-size: 13px; color: #64748b; margin-bottom: 10px; line-height: 1.5; }
        .footer a { color: #64748b; text-decoration: underline; }
        .footer .social-links { margin: 20px 0; }
        .footer .social-links a { margin: 0 10px; color: #94a3b8; text-decoration: none; font-weight: bold; font-size: 14px; }
        .unsubscribe-box { margin-top: 30px; padding-top: 20px; border-top: 1px dashed #cbd5e1; }
        
        /* Responsive */
        @media screen and (max-width: 600px) {
            .email-wrapper { padding: 20px 10px; }
            .header { padding: 25px 20px; }
            .content-body { padding: 30px 20px; }
            .footer { padding: 30px 20px; }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            
            <!-- Header section -->
            <div class="header">
                <a href="{{ config('app.url') }}" target="_blank">
                    <!-- Assurez-vous d'avoir un logo avec fond transparent ou clair/sombre adapté -->
                    <img src="{{ config('app.url') }}/images/logo.png" alt="{{ config('app.name') }}" />
                </a>
            </div>
            
            <!-- Body section -->
            <div class="content-body">
                <div class="greeting">
                    Bonjour {{ explode(' ', $subscriber->name)[0] }},
                </div>
                
                <div class="newsletter-content">
                    {!! $campaign->email_content !!}
                </div>
                
                @if($campaign->cta_text && $campaign->cta_url)
                <div class="cta-button-container">
                    <a href="{{ $campaign->cta_url }}" class="cta-button" target="_blank">{{ $campaign->cta_text }}</a>
                </div>
                @endif
            </div>
            
            <!-- Footer section -->
            <div class="footer">
                <div class="social-links">
                    <a href="#" target="_blank">LinkedIn</a> &bull; 
                    <a href="#" target="_blank">Twitter</a> &bull; 
                    <a href="{{ config('app.url') }}" target="_blank">Site Web</a>
                </div>
                
                <p>
                    <strong>{{ config('app.name') }}</strong><br>
                    Lubumbashi, Haut-Katanga<br>
                    République Démocratique du Congo
                </p>
                
                <div class="unsubscribe-box">
                    <p>
                        Vous recevez cet e-mail car vous êtes abonné(e) à notre newsletter.<br>
                        Si vous ne souhaitez plus recevoir de messages de notre part, vous pouvez 
                        <a href="{{ $unsubscribeUrl }}">vous désabonner ici</a>.
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
