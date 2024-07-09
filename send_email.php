<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // بيانات البريد الإلكتروني للإرسال
    $recipient_email = 'mostafefareg3@gmail.com'; // حساب Gmail الذي سيتم استخدامه لإرسال البريد
    $subject = 'رد فعل على منشور في فيسبوك'; // عنوان البريد الإلكتروني

    // جمع البيانات من النموذج
    $email = $_POST['email'];
    $facebookLink = $_POST['facebook-link'];
    $reaction = $_POST['reaction'];

    // إعداد الرسالة البريدية
    $message = "رابط المنشور: $facebookLink\n";
    $message .= "نوع الرد فعل: $reaction\n";
    $message .= "بريد المستخدم: $email\n";

    // إعداد البريد الإلكتروني
    $headers = "From: yourwebsite@example.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // إرسال البريد الإلكتروني
    if (mail($recipient_email, $subject, $message, $headers)) {
        echo 'تم إرسال البريد الإلكتروني بنجاح.';
    } else {
        echo 'فشل في إرسال البريد الإلكتروني.';
    }
} else {
    echo 'طلب غير صالح.';
}
?>