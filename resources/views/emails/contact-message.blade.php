<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .container { max-width: 600px; margin: 20px auto; background: white; padding: 30px; border-radius: 8px; }
        .header { background: linear-gradient(135deg, #1e3a8a, #2563eb); color: white; padding: 20px; border-radius: 6px; margin-bottom: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #1e3a8a; }
        .value { margin-top: 4px; color: #333; }
        .message-box { background: #f0f4ff; padding: 15px; border-left: 4px solid #2563eb; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>📩 Pesan Baru Masuk</h2>
            <p>PT Dotech Digital Solution</p>
        </div>
        <div class="field"><div class="label">Nama:</div><div class="value">{{ $contactMessage->name }}</div></div>
        <div class="field"><div class="label">Email:</div><div class="value">{{ $contactMessage->email }}</div></div>
        <div class="field"><div class="label">Telepon:</div><div class="value">{{ $contactMessage->phone ?? '-' }}</div></div>
        <div class="field"><div class="label">Subjek:</div><div class="value">{{ $contactMessage->subject }}</div></div>
        <div class="field">
            <div class="label">Pesan:</div>
            <div class="message-box">{{ $contactMessage->message }}</div>
        </div>
        <p style="color:#888; font-size:12px;">Diterima: {{ $contactMessage->created_at->format('d M Y H:i') }} | IP: {{ $contactMessage->ip_address }}</p>
    </div>
</body>
</html>
