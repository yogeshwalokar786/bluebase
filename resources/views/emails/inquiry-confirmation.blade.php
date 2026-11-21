<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inquiry Received — Bluebase Technologies</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f4f6fa;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: #1e293b;
      line-height: 1.6;
    }
    .email-container {
      max-width: 620px;
      margin: 30px auto;
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
      border: 1px solid #e2e8f0;
    }
    .email-header {
      background: linear-gradient(135deg, #0a192f 0%, #0d213f 100%);
      padding: 36px 32px;
      text-align: center;
      border-bottom: 3px solid #0050e7;
    }
    .email-brand-title {
      font-size: 22px;
      font-weight: 800;
      color: #ffffff;
      margin: 0 0 6px 0;
      letter-spacing: -0.02em;
    }
    .email-brand-subtitle {
      font-size: 13px;
      color: #94a3b8;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin: 0;
    }
    .email-body {
      padding: 36px 32px;
    }
    .greeting {
      font-size: 18px;
      font-weight: 700;
      color: #0f172a;
      margin-top: 0;
      margin-bottom: 16px;
    }
    .intro-text {
      font-size: 15px;
      color: #475569;
      margin-bottom: 24px;
      line-height: 1.6;
    }
    .summary-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      padding: 20px 24px;
      margin-bottom: 28px;
    }
    .summary-title {
      font-size: 12px;
      font-weight: 700;
      color: #0050e7;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin: 0 0 14px 0;
    }
    .summary-table {
      width: 100%;
      border-collapse: collapse;
    }
    .summary-table td {
      padding: 7px 0;
      font-size: 14px;
      vertical-align: top;
    }
    .summary-label {
      color: #64748b;
      width: 35%;
      font-weight: 500;
    }
    .summary-val {
      color: #0f172a;
      font-weight: 600;
    }
    .steps-section {
      margin-bottom: 28px;
    }
    .section-heading {
      font-size: 15px;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 14px;
    }
    .step-item {
      display: flex;
      margin-bottom: 14px;
    }
    .step-num {
      flex-shrink: 0;
      width: 26px;
      height: 26px;
      border-radius: 50%;
      background: rgba(0, 80, 231, 0.1);
      color: #0050e7;
      font-size: 13px;
      font-weight: 700;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      line-height: 26px;
      text-align: center;
    }
    .step-content h4 {
      font-size: 14px;
      font-weight: 600;
      color: #0f172a;
      margin: 0 0 2px 0;
    }
    .step-content p {
      font-size: 13px;
      color: #64748b;
      margin: 0;
      line-height: 1.5;
    }
    .cta-button-wrap {
      text-align: center;
      margin: 30px 0 10px;
    }
    .cta-btn {
      display: inline-block;
      background: #0050e7;
      color: #ffffff !important;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      padding: 12px 28px;
      border-radius: 6px;
      letter-spacing: 0.02em;
    }
    .trust-badge-row {
      background: #f1f5f9;
      border-radius: 8px;
      padding: 14px;
      text-align: center;
      font-size: 12px;
      color: #475569;
      margin-top: 24px;
    }
    .email-footer {
      background: #0a192f;
      color: #94a3b8;
      padding: 28px 32px;
      text-align: center;
      font-size: 12px;
      line-height: 1.6;
    }
    .email-footer a {
      color: #60a5fa;
      text-decoration: none;
    }
    .footer-divider {
      height: 1px;
      background: rgba(255, 255, 255, 0.1);
      margin: 16px 0;
    }
  </style>
</head>
<body>

  <div class="email-container">
    
    <!-- Header -->
    <div class="email-header">
      <h1 class="email-brand-title">Bluebase Technologies</h1>
      <p class="email-brand-subtitle">Digital Engineering &bull; Web &bull; Mobile &bull; Custom Software</p>
    </div>

    <!-- Body Content -->
    <div class="email-body">
      <h2 class="greeting">Hello {{ $inquiry['name'] }},</h2>
      
      <p class="intro-text">
        Thank you for getting in touch with Bluebase Technologies. We have successfully received your inquiry. One of our technical leads is reviewing your requirements, and we will get back to you with an architecture outline and milestone scope within <strong>24 business hours</strong>.
      </p>

      <!-- Inquiry Summary Card -->
      <div class="summary-card">
        <h3 class="summary-title">Summary of Your Request</h3>
        <table class="summary-table">
          @if(!empty($inquiry['service']))
          <tr>
            <td class="summary-label">Area of Interest:</td>
            <td class="summary-val">{{ $inquiry['service'] }}</td>
          </tr>
          @endif

          @if(!empty($inquiry['company']))
          <tr>
            <td class="summary-label">Company / Brand:</td>
            <td class="summary-val">{{ $inquiry['company'] }}</td>
          </tr>
          @endif

          @if(!empty($inquiry['phone']))
          <tr>
            <td class="summary-label">Phone Contact:</td>
            <td class="summary-val">{{ $inquiry['phone'] }}</td>
          </tr>
          @endif

          @if(!empty($inquiry['message']))
          <tr>
            <td class="summary-label">Project Details:</td>
            <td class="summary-val">{{ \Illuminate\Support\Str::limit($inquiry['message'], 180) }}</td>
          </tr>
          @endif

          @if(!empty($inquiry['reference_id']))
          <tr>
            <td class="summary-label">Reference ID:</td>
            <td class="summary-val" style="font-family: monospace; color: #0050e7;">#{{ $inquiry['reference_id'] }}</td>
          </tr>
          @endif

          <tr>
            <td class="summary-label">Submitted On:</td>
            <td class="summary-val">{{ now()->format('M d, Y · h:i A T') }}</td>
          </tr>
        </table>
      </div>

      <!-- What Happens Next -->
      <div class="steps-section">
        <div class="section-heading">What to Expect Next</div>

        <table style="width: 100%; border-collapse: collapse;">
          <tr>
            <td style="width: 36px; vertical-align: top; padding-bottom: 12px;">
              <div class="step-num">1</div>
            </td>
            <td style="vertical-align: top; padding-bottom: 12px;">
              <div class="step-content">
                <h4>Requirement Review</h4>
                <p>A senior full-stack engineer examines your technical needs, timeline, and goals.</p>
              </div>
            </td>
          </tr>
          <tr>
            <td style="width: 36px; vertical-align: top; padding-bottom: 12px;">
              <div class="step-num">2</div>
            </td>
            <td style="vertical-align: top; padding-bottom: 12px;">
              <div class="step-content">
                <h4>Milestone Estimate &amp; Architecture Roadmap</h4>
                <p>We prepare a free proposal with fixed milestone sprints, pricing, and tech recommendations.</p>
              </div>
            </td>
          </tr>
          <tr>
            <td style="width: 36px; vertical-align: top;">
              <div class="step-num">3</div>
            </td>
            <td style="vertical-align: top;">
              <div class="step-content">
                <h4>Direct Developer Access</h4>
                <p>Collaborate directly with senior builders under complete IP ownership and NDA protection.</p>
              </div>
            </td>
          </tr>
        </table>
      </div>

      <!-- Call to Action -->
      <div class="cta-button-wrap">
        <a href="https://bluebasetechnologies.com/customer-stories" class="cta-btn" target="_blank">
          Explore Our Client Deliverables &rarr;
        </a>
      </div>

      <!-- Trust Assurance -->
      <div class="trust-badge-row">
        <strong>100% Confidentiality Guaranteed:</strong> All discussions, project ideas, and architectures are strictly covered under mutual non-disclosure and protected client IP ownership.
      </div>
    </div>

    <!-- Footer -->
    <div class="email-footer">
      <p style="margin: 0 0 8px 0; font-weight: 600; color: #f8fafc;">
        Bluebase Technologies Inc.
      </p>
      <p style="margin: 0 0 12px 0;">
        Remote-First Digital Engineering Studio &bull;
        <a href="mailto:info@bluebasetechnologies.com">info@bluebasetechnologies.com</a>
      </p>
      <div class="footer-divider"></div>
      <p style="margin: 0; font-size: 11px; color: #64748b;">
        You received this email because an inquiry was submitted with this address on <a href="https://bluebasetechnologies.com">bluebasetechnologies.com</a>. If you did not make this request, please reply to inform our team.
      </p>
    </div>

  </div>

</body>
</html>
