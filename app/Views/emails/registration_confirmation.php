<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EventHub Registration Confirmation</title>
</head>
<body style="margin:0; padding:0; background:#f3f6fa; color:#111827; font-family:Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f3f6fa; margin:0; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:640px; background:#ffffff; border-radius:24px; overflow:hidden; box-shadow:0 18px 45px rgba(15, 23, 42, 0.12);">
                    <tr>
                        <td style="padding:34px 32px; background:linear-gradient(135deg, #111827, #0ea5e9); color:#ffffff;">
                            <div style="font-size:14px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; opacity:.9;">EventHub</div>
                            <h1 style="margin:12px 0 0; font-size:30px; line-height:1.2; font-weight:800;">Registration Confirmed</h1>
                            <p style="margin:14px 0 0; font-size:16px; line-height:1.6; color:#e0f2fe;">
                                Thank you for registering, <?= esc($attendee['fullname'], 'html') ?>. Your event slot has been recorded successfully.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:32px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #e5e7eb; border-radius:18px; overflow:hidden;">
                                <tr>
                                    <td style="padding:22px 24px; background:#f8fafc;">
                                        <div style="font-size:13px; font-weight:700; color:#0ea5e9; letter-spacing:1px; text-transform:uppercase;">Event Details</div>
                                        <h2 style="margin:8px 0 0; font-size:24px; line-height:1.3; color:#111827;">
                                            <?= esc($event['title'], 'html') ?>
                                        </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:8px 24px 24px;">
                                        <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td style="padding:14px 0; border-bottom:1px solid #eef2f7; color:#6b7280; width:36%;">Date</td>
                                                <td style="padding:14px 0; border-bottom:1px solid #eef2f7; color:#111827; font-weight:700;">
                                                    <?= esc(date('F d, Y', strtotime($event['date'])), 'html') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:14px 0; border-bottom:1px solid #eef2f7; color:#6b7280;">Venue</td>
                                                <td style="padding:14px 0; border-bottom:1px solid #eef2f7; color:#111827; font-weight:700;">
                                                    <?= esc($event['venue'], 'html') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:14px 0; color:#6b7280;">Course/Department</td>
                                                <td style="padding:14px 0; color:#111827; font-weight:700;">
                                                    <?= esc($attendee['course'], 'html') ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-top:20px;">
                                <tr>
                                    <td style="padding:18px 20px; background:#ecfdf5; border:1px solid #bbf7d0; border-radius:16px;">
                                        <div style="font-size:15px; line-height:1.6; color:#166534;">
                                            Please keep this email as your official confirmation receipt. Present your registered name and email address at the event entrance.
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:24px 0 0; font-size:14px; line-height:1.7; color:#6b7280;">
                                If any details are incorrect, contact the EventHub administrator before the event date.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:22px 32px; background:#111827; color:#9ca3af; text-align:center; font-size:13px; line-height:1.6;">
                            EventHub - Event Registration & Management System<br>
                            BSIT Advanced Web Development Final Project
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
