<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hazina Startup' }}</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f8fafc; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased; color: #1e293b; }
        .wrapper { width: 100%; table-layout: fixed; background-color: #f8fafc; padding-bottom: 60px; }
        .main { background-color: #ffffff; margin: 40px auto; width: 100%; max-width: 600px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); border: 1px solid #f1f5f9; }
        
        .header { background-color: #ffffff; padding: 40px 30px 20px; text-align: center; border-bottom: 1px solid #f1f5f9; }
        .logo-container { margin-bottom: 20px; }
        .logo-img { height: 40px; width: auto; }
        .header h1 { color: #0f172a; font-size: 24px; margin: 0; font-weight: 700; }
        .header p { color: #10b981; font-size: 14px; margin-top: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; }
        
        .content { padding: 40px 30px; }
        .greeting { font-size: 18px; font-weight: 600; margin-bottom: 20px; color: #0f172a; }
        .text { font-size: 15px; line-height: 1.6; color: #475569; margin-bottom: 30px; }
        
        .card { background-color: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
        .card-title { font-size: 13px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; display: block; border-bottom: 1px solid #e2e8f0; padding-bottom: 10px; }
        .card-row { margin-bottom: 10px; font-size: 14px; display: table; width: 100%; }
        .card-label { display: table-cell; font-weight: 600; color: #64748b; width: 35%; vertical-align: top; }
        .card-value { display: table-cell; font-weight: 500; color: #0f172a; width: 65%; vertical-align: top; }
        .card-row:last-child { margin-bottom: 0; }
        
        .button-container { text-align: center; margin: 30px 0; }
        .button { display: inline-block; padding: 12px 24px; background-color: #10b981; color: #ffffff; text-decoration: none; font-weight: 600; border-radius: 8px; font-size: 15px; text-transform: uppercase; letter-spacing: 0.5px; }
        
        .otp-box { text-align: center; margin: 40px 0; }
        .otp-code { display: inline-block; padding: 15px 30px; background-color: #f1f5f9; color: #0f172a; font-size: 32px; font-weight: bold; letter-spacing: 5px; border-radius: 8px; border: 1px solid #e2e8f0; }
        
        .footer { background-color: #f1f5f9; padding: 30px; text-align: center; border-top: 1px solid #e2e8f0; }
        .footer p { font-size: 13px; color: #64748b; margin: 0 0 10px 0; }
        .logo-text { font-weight: 800; color: #0f172a; font-size: 16px; letter-spacing: -0.5px; }
        .logo-dot { color: #10b981; }
    </style>
</head>
<body>
    <div class="wrapper">
        <table class="main" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
                <td class="header">
                    <div class="logo-container">
                        <img src="{{ asset('images/logo.png') }}" alt="Hazina Logo" class="logo-img">
                    </div>
                    @if(isset($headerTitle))
                        <h1>{{ $headerTitle }}</h1>
                    @endif
                    @if(isset($headerSubtitle))
                        <p>{{ $headerSubtitle }}</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="content">
                    @if(isset($greeting))
                        <div class="greeting">{{ $greeting }}</div>
                    @endif
                    
                    {{ $slot }}
                    
                </td>
            </tr>
            <tr>
                <td class="footer">
                    <p>Cet email a été envoyé par Hazina Startup.<br>Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer ce message.</p>
                    <div class="logo-text">Hazina<span class="logo-dot">.</span></div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
