<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Willkommen bei Bitree!</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f6f8fa; color: #222;">
    <div style="max-width: 480px; margin: 2rem auto; background: #fff; border-radius: 1rem; box-shadow: 0 2px 16px #0001; padding: 2rem;">
        <h2 style="color: #2563eb;">Willkommen bei Bitree, {{ $user->username }}!</h2>
        <p>Dein Account wurde erfolgreich erstellt.</p>
        <p>Du kannst dich jetzt mit deiner E-Mail <b>{{ $user->email }}</b> anmelden.</p>
        <p>Viel Spaß beim Verwalten deiner Links!</p>
        <hr style="margin: 2rem 0;">
        <small style="color: #888;">Diese E-Mail wurde automatisch generiert. Bei Fragen antworte einfach auf diese Nachricht.</small>
    </div>
</body>
</html>
