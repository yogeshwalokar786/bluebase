<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Website Lead Received</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f1f5f9;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: #0f172a;
      line-height: 1.5;
    }
    .admin-container {
      max-width: 600px;
      margin: 24px auto;
      background: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid #cbd5e1;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .admin-header {
      background: #0a192f;
      color: #ffffff;
      padding: 24px 28px;
      border-bottom: 3px solid #10b981;
    }
    .lead-badge {
      display: inline-block;
      background: #10b981;
      color: #ffffff;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      padding: 3px 8px;
      border-radius: 4px;
      margin-bottom: 8px;
    }
    .admin-title {
      font-size: 20px;
      font-weight: 700;
      margin: 0;
    }
    .admin-body {
      padding: 28px;
    }
    .detail-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 24px;
    }
    .detail-table th, .detail-table td {
      padding: 10px 12px;
      border-bottom: 1px solid #e2e8f0;
      text-align: left;
      font-size: 14px;
    }
    .detail-table th {
      color: #64748b;
      font-weight: 600;
      width: 30%;
      background: #f8fafc;
    }
    .detail-table td {
      color: #0f172a;
      font-weight: 500;
    }
    .message-box {
      background: #f8fafc;
      border-left: 4px solid #0050e7;
      padding: 16px 20px;
      border-radius: 0 8px 8px 0;
      margin-bottom: 24px;
      font-size: 14px;
      color: #334155;
      white-space: pre-wrap;
    }
    .admin-cta {
      display: inline-block;
      background: #0050e7;
      color: #ffffff !important;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      padding: 10px 22px;
      border-radius: 6px;
    }
  </style>
</head>
<body>

  <div class="admin-container">
    <div class="admin-header">
      <span class="lead-badge">New Website Lead</span>
      <h2 class="admin-title">{{ $inquiry['name'] ?? 'Website Visitor' }}</h2>
      <p style="margin: 4px 0 0; font-size: 13px; color: #94a3b8;">
        Submitted via {{ ucfirst($inquiry['type'] ?? 'contact') }} Form &bull; {{ now()->format('M d, Y h:i A') }}
      </p>
    </div>

    <div class="admin-body">
      <table class="detail-table">
        <tr>
          <th>Full Name</th>
          <td><strong>{{ $inquiry['name'] ?? 'N/A' }}</strong></td>
        </tr>
        <tr>
          <th>Email Address</th>
          <td>
            <a href="mailto:{{ $inquiry['email'] ?? '' }}" style="color: #0050e7; text-decoration: underline;">
              {{ $inquiry['email'] ?? 'N/A' }}
            </a>
          </td>
        </tr>
        @if(!empty($inquiry['phone']))
        <tr>
          <th>Phone Number</th>
          <td>
            <a href="tel:{{ $inquiry['phone'] }}" style="color: #0050e7;">
              {{ $inquiry['phone'] }}
            </a>
          </td>
        </tr>
        @endif
        @if(!empty($inquiry['company']))
        <tr>
          <th>Company / Brand</th>
          <td>{{ $inquiry['company'] }}</td>
        </tr>
        @endif
        @if(!empty($inquiry['service']))
        <tr>
          <th>Interested Service</th>
          <td><span style="color: #0050e7; font-weight: 600;">{{ $inquiry['service'] }}</span></td>
        </tr>
        @endif
        @if(!empty($inquiry['ip_address']))
        <tr>
          <th>IP Address</th>
          <td style="font-family: monospace; color: #64748b;">{{ $inquiry['ip_address'] }}</td>
        </tr>
        @endif
      </table>

      @if(!empty($inquiry['message']))
      <div style="font-weight: 600; font-size: 13px; color: #475569; margin-bottom: 8px;">Project Message / Notes:</div>
      <div class="message-box">{{ $inquiry['message'] }}</div>
      @endif

      <div style="text-align: center; margin-top: 24px;">
        <a href="{{ url('/admin/leads/inquiries') }}" class="admin-cta" target="_blank">
          View in Admin Leads Portal &rarr;
        </a>
      </div>
    </div>
  </div>

</body>
</html>
