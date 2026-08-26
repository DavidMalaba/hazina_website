import re

def patch_file(filepath, name_prop='name', email_prop='email', phone_prop='phone'):
    with open(filepath, 'r') as f:
        content = f.read()
    
    # 1. Properties
    content = content.replace('public $newsletter_opt_in = true;', 'public $opt_in_email = true;\n    public $opt_in_sms = true;\n    public $opt_in_whatsapp = true;')
    
    # 2. Rules
    content = content.replace("'newsletter_opt_in' => 'boolean',", "'opt_in_email' => 'boolean',\n        'opt_in_sms' => 'boolean',\n        'opt_in_whatsapp' => 'boolean',")
    
    # 3. Create Model
    content = content.replace("'newsletter_opt_in' => $this->newsletter_opt_in,", f"'opt_in_email' => $this->opt_in_email,\n            'opt_in_sms' => $this->opt_in_sms,\n            'opt_in_whatsapp' => $this->opt_in_whatsapp,")
    
    # 4. Subscriber logic
    old_subscriber_logic = """        if ($this->newsletter_opt_in) {
            \\App\\Models\\NewsletterSubscriber::firstOrCreate(
                ['email' => $this->""" + email_prop + """],
                [
                    'name' => $this->""" + name_prop + """,
                    'phone' => $this->""" + phone_prop + """,
                    'status' => \\App\\Enums\\SubscriberStatus::Active,
                ]
            );
        }"""
        
    new_subscriber_logic = """        if ($this->opt_in_email || $this->opt_in_sms || $this->opt_in_whatsapp) {
            $subscriber = \\App\\Models\\NewsletterSubscriber::firstOrNew(['email' => $this->""" + email_prop + """]);
            $subscriber->name = $this->""" + name_prop + """;
            if ($this->""" + phone_prop + """) {
                $subscriber->phone = $this->""" + phone_prop + """;
            }
            $subscriber->status = \\App\\Enums\\SubscriberStatus::Active;
            $subscriber->accepts_email = $this->opt_in_email;
            $subscriber->accepts_sms = $this->opt_in_sms;
            $subscriber->accepts_whatsapp = $this->opt_in_whatsapp;
            $subscriber->save();
        }"""
    
    # For Step1, the code is slightly different: 
    # $registration->update(['newsletter_opt_in' => $this->newsletter_opt_in]);
    # $registration->user->email, $registration->name, $registration->phone
    if "Step1.php" in filepath:
        content = content.replace("$registration->update(['newsletter_opt_in' => $this->newsletter_opt_in]);", 
                                  "$registration->update([\n            'opt_in_email' => $this->opt_in_email,\n            'opt_in_sms' => $this->opt_in_sms,\n            'opt_in_whatsapp' => $this->opt_in_whatsapp\n        ]);")
        content = content.replace("if ($this->newsletter_opt_in) {", "if ($this->opt_in_email || $this->opt_in_sms || $this->opt_in_whatsapp) {")
        content = content.replace(
"""            \\App\\Models\\NewsletterSubscriber::firstOrCreate(
                ['email' => $registration->user->email],
                [
                    'name' => $registration->name,
                    'phone' => $registration->phone,
                    'status' => \\App\\Enums\\SubscriberStatus::Active,
                ]
            );""",
"""            $subscriber = \\App\\Models\\NewsletterSubscriber::firstOrNew(['email' => $registration->user->email]);
            $subscriber->name = $registration->name;
            if ($registration->phone) {
                $subscriber->phone = $registration->phone;
            }
            $subscriber->status = \\App\\Enums\\SubscriberStatus::Active;
            $subscriber->accepts_email = $this->opt_in_email;
            $subscriber->accepts_sms = $this->opt_in_sms;
            $subscriber->accepts_whatsapp = $this->opt_in_whatsapp;
            $subscriber->save();"""
        )
    else:
        content = content.replace(old_subscriber_logic, new_subscriber_logic)
        
    with open(filepath, 'w') as f:
        f.write(content)
        
patch_file('app/Livewire/Contact.php')
patch_file('app/Livewire/BecomePartner.php', name_prop='company_name')
patch_file('app/Livewire/Cohorts/Register/Step1.php')
