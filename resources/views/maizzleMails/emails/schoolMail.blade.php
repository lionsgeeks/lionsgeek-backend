<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no, url=no">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark"> <!--[if mso]>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings xmlns:o="urn:schemas-microsoft-com:office:office">
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <style>
    td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
  </style>
  <![endif]-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"
        media="screen">
    <style>
        @media (max-width: 600px) {
            .sm-p-6 {
                padding: 24px !important
            }

            .sm-px-4 {
                padding-left: 16px !important;
                padding-right: 16px !important
            }
        }
    </style>
</head>

<body style="margin: 0; width: 100%; padding: 0; -webkit-font-smoothing: antialiased; word-break: break-word">
    <div role="article" aria-roledescription="email" aria-label lang="en">
        <div class="sm-px-4"
            style="background-color: #f8fafc; font-family: Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif">
            <table align="center" style="margin: 0 auto" cellpadding="0" cellspacing="0" role="none">
                <tr>
                    <td style="width: 552px; max-width: 100%">
                        <div role="separator" style="line-height: 24px">&zwj;</div>
                        <table style="width: 100%" cellpadding="0" cellspacing="0" role="none">
                            <tr>
                                <td class="sm-p-6"
                                    style="border-radius: 8px; background-color: #fffffe; padding: 24px 36px; border: 1px solid #e2e8f0">
                                    <table align="center" style="margin: 0 auto" cellpadding="0" cellspacing="0"
                                        role="none">
                                        <tr>
                                            <a class="sm-p-6" href="https://lionsgeek.ma" style="padding: 20px 36px">
                                                <img src="https://media.licdn.com/dms/image/v2/D4E0BAQEI5pl3PyS-Eg/company-logo_200_200/company-logo_200_200/0/1734088749325/lionsgeek_logo?e=2147483647&v=beta&t=2tZP_cpgMZO4IFtfyB0GNKXIrPO5I5w6a8iUlnrhntQ"
                                                    width="90" alt="LionsGeek"
                                                    style="max-width: 100%; vertical-align: middle">
                                            </a>
                                        </tr>
                                    </table>
                                    <div role="separator" style="line-height: 24px">&zwj;</div>
                                    <h1
                                        style="margin: 0 0 24px; font-size: 24px; line-height: 32px; font-weight: 600; color: #0f172a">
                                        Welcome to the {{ $school }} School! Your Journey Starts Soon
                                    </h1>
                                    <div role="separator" style="line-height: 4px">&zwj;</div>
                                    <p style="font-size: 16px; line-height: 24px; color: #475569">Dear
                                        {{ $full_name }},</p>
                                    <div role="separator" style="line-height: 4px">&zwj;</div>
                                    <p style="font-size: 16px; line-height: 24px; color: #475569">
                                        We are excited to invite you to join
                                        the {{ $school }} School at LionsGeek!
                                        Your passion and potential have earned you a place in this dynamic and inspiring
                                        environment where creativity meets innovation.
                                    </p>
                                    <div role="separator" style="line-height: 4px">&zwj;</div>
                                    <p style="font-size: 16px; line-height: 24px; color: #475569">Here are your
                                        important details:</p>
                                    <div role="separator" style="line-height: 4px">&zwj;</div>
                                    <ul style="font-size: 16px; line-height: 24px; color: #475569">
                                        <li style="margin-top: 12px">Program: {{ $school }}</li>
                                        <li style="margin-top: 12px">Start Date:
                                            {{ \Carbon\Carbon::parse($day)->format('Y-m-d') }} at
                                            9:30 am
                                        </li>
                                        <li style="margin-top: 12px">Location: 4eme étage, Ain Sebaa Center, Route de
                                            Rabat-، Km 8,
                                            Casablanca 20050</li>
                                    </ul>
                                    <div role="separator" style="line-height: 4px">&zwj;</div>
                                    <p style="font-size: 16px; line-height: 24px; color: #475569">
                                        Prepare to unlock new skills, work on exciting projects,
                                        and collaborate with like-minded peers. From mastering
                                        the art of coding to creating impactful projects,
                                        your journey begins here.
                                    </p>
                                    <div role="separator" style="line-height: 4px">&zwj;</div>
                                    <p style="font-size: 16px; line-height: 24px; color: #475569">
                                        Stay tuned for more information, and get ready for an unforgettable experience!
                                    </p>
                                    <div role="separator" style="line-height: 4px">&zwj;</div>

                                    <div style="text-align:center">
                                        <a href="https://backend.mylionsgeek.ma/participant/confirmation/school/{{ $full_name }}/{{$id}}"
                                            style="padding: 10px 20px; background-color:#000; color: #fff; text-decoration: none;
                                            border-radius: 10px;
                                            ">
                                            Click To Confirm Your Attendance
                                        </a>
                                    </div>


                                    <div role="separator" style="line-height: 4px">&zwj;</div>
                                    <p style="font-size: 16px; line-height: 24px; color: #475569">
                                        Welcome aboard,
                                    </p>
                                    <p style="font-size: 16px; line-height: 24px; color: #475569">
                                        LionsGeek
                                    </p> <span dir="rtl">
                                        <h1
                                            style="margin: 0 0 24px; font-size: 24px; line-height: 32px; font-weight: 600; color: #0f172a">
                                            مرحبا بيك فمدرسة {{ $school }} !رحلتك غاتبدى قريبا
                                        </h1>
                                        <div role="separator" style="line-height: 4px">&zwj;</div>
                                        <p style="font-size: 16px; line-height: 24px; color: #475569">عزيزنا
                                            {{ $full_name }},</p>
                                        <div role="separator" style="line-height: 4px">&zwj;</div>
                                        <p style="font-size: 16px; line-height: 24px; color: #475569">
                                            فرحانين بزاف باش نبلغوك بالدعوة للالتحاق بمدرسة {{ $school }} مع
                                            LionsGeek!
                                            الحماس والموهبة ديالك عطاوك الفرصة باش تكون جزء من هاد البيئة الحماسية
                                            والملهمة
                                            اللي كاتجمع بين الإبداع والابتكار.
                                        </p>
                                        <div role="separator" style="line-height: 4px">&zwj;</div>
                                        <p style="font-size: 16px; line-height: 24px; color: #475569">ها التفاصيل المهمة
                                            ديالك:</p>
                                        <div role="separator" style="line-height: 4px">&zwj;</div>
                                        <ul style="font-size: 16px; line-height: 24px; color: #475569">
                                            <li style="margin-top: 12px">البرنامج: {{ $school }}</li>
                                            <li style="margin-top: 12px">تاريخ البداية:
                                                {{ \Carbon\Carbon::parse($day)->format('Y-m-d') }} مع 9:30 صباحا </li>
                                            <li style="margin-top: 12px">الموقع: الطابق الرابع، عين السبع سنتر، طريق
                                                الرباط، كيلومتر 8،
                                                الدار البيضاء 20050
                                            </li>
                                        </ul>
                                        <div role="separator" style="line-height: 4px">&zwj;</div>
                                        <p style="font-size: 16px; line-height: 24px; color: #475569">
                                            وجد راسك باش تكتسب مهارات جديدة، تخدم على مشاريع زوينة، وتتعامل مع زملاء
                                            عندهم
                                            نفس الطموحات. من إتقان فن البرمجة إلى إنشاء محتوى مؤثر، الرحلة ديالك كاتبدا
                                            هنا.
                                        </p>
                                        <div role="separator" style="line-height: 4px">&zwj;</div>
                                        <p style="font-size: 16px; line-height: 24px; color: #475569">
                                            تابع معنا التحديثات، ووجد راسك لتجربة مميزة ما غتنساهاش!
                                        </p>
                                        <div role="separator" style="line-height: 4px">&zwj;</div>


                                        <div style="text-align:center">
                                            <a href="https://backend.mylionsgeek.ma/participant/confirmation/school/{{ $full_name }}/{{$id}}"
                                            style="padding: 10px 20px; background-color:#000; color: #fff; text-decoration: none;
                                            border-radius: 10px;
                                            ">
                                                انقر هنا لتأكيد حضورك
                                            </a>
                                        </div>


                                        <div role="separator" style="line-height: 4px">&zwj;</div>
                                        <p style="font-size: 16px; line-height: 24px; color: #475569">
                                            مرحبا بيك معانا،
                                        </p>
                                        <p style="font-size: 16px; line-height: 24px; color: #475569">
                                            LionsGeek
                                        </p>
                                    </span>
                                    <div role="separator" style="line-height: 24px">&zwj;</div>
                                    <div role="separator"
                                        style="height: 1px; line-height: 1px; background-color: #cbd5e1; margin-top: 24px; margin-bottom: 24px">
                                        &zwj;</div>
                                    <table align="center" style="margin: 0 auto" cellpadding="0" cellspacing="0"
                                        role="none">
                                        <tr
                                            style="margin-bottom: 24px; font-size: 16px; line-height: 24px; font-weight: 700">
                                            <p style="padding: 12px; color: #475569">Follow Us on :</p>
                                        </tr>
                                        <tr>
                                            <td class="sm-p-6" href="https://lionsgeek.ma"
                                                style="padding-left: 36px; padding-right: 36px; padding-bottom: 32px">
                                                <div style="font-weight: 600">
                                                    <a href="https://www.instagram.com/lions_geek?igsh=MWNhb2F6eGRjOTZvcg=="
                                                        style="padding: 4px; color: #E1306C">Instagram</a>
                                                    <a href="https://www.facebook.com/LionsGeek?mibextid=ZbWKwL"
                                                        style="padding: 4px; color: #1877F2">Facebook</a>
                                                    <a href="https://www.tiktok.com/@lions_geek?_t=8sZ3ZyKrqvG&_r=1"
                                                        style="padding: 4px; color: #25F4EE">Tiktok</a>
                                                    <a href="https://x.com/LionsGeek?t=oZV_osSHbR3MV7uSV3AIIA&s=09"
                                                        style="padding: 4px; color: #1DA1F2">X
                                                        (Twitter)</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
