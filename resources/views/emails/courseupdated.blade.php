<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php
$style = [
    /* Layout ------------------------------ */
    'body' => 'margin: 0; padding: 0; width: 100%;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
    /* Masthead ----------------------- */
    'email-masthead' => 'padding: 8px 12px; text-align: left;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',
    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
    /* Body ------------------------------ */
    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
    /* Type ------------------------------ */
    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',
    /* Buttons ------------------------------ */
    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="{{ $style['email-wrapper'] }}" align="left">
            <table width="100%" cellpadding="0" cellspacing="0">
                <!-- Logo -->
                <tr>
                    <td style="{{ $style['email-masthead'] }}" bgcolor="#1c202b">
                        <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="http://software.ecademictube.com" target="_blank">
                            <img width="80px" height="80px" src="http://software.ecademictube.com/public/images/e56396d9-529e-4688-b8e6-b09311c4d4b7.jpg">
                        </a>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td style="{{ $style['email-body'] }}" width="100%">
                        <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">

                                    <p style="{{ $style['paragraph'] }}">
                                        To check all of your work details and total extra price <br />
                                        Log on - <a href="http://software.ecademictube.com">software.ecademictube.com </a><br />
                                        Username- {{$user->email}} <br />
                                        Password-123456
                                    </p>
                                    <!-- Greeting -->
                                    <h1 style="{{ $style['header-1'] }}">
                                        Hello <span style="text-transform:uppercase;">{{ $user->name}},
                                    </h1>

                                    <!-- Intro -->

                                    <p style="{{ $style['paragraph'] }}">
                                        Your Course is updated by {{ config('app.name') }} on semester {{$semester->semester_name}}.
                                    </p>


                                    <!-- Action Button -->

                                    <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">

                                        <tr>
                                            <td style="text-align: left">
                                                Student Name
                                            </td>
                                            <td>
                                                {{ $course->student_name  }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Tutor's Name
                                            </td>
                                            <td>
                                                {{ $course->tutor_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Subject Name
                                            </td>
                                            <td>
                                                {{ $course->subject_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Online/Offline/Both
                                            </td>
                                            <td>
                                                {{ $course->on_off_line }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Website
                                            </td>
                                            <td>
                                                <a href="http://{{$course->website_link}}" target="_blank">{{$course->website_link}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                User Id
                                            </td>
                                            <td>
                                                {{$course->user_id}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Password
                                            </td>
                                            <td>
                                                {{$course->password}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Type
                                            </td>
                                            <td>
                                                {{$course->type}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Tutor's Price
                                            </td>
                                            <td>
                                                {{$course->tutor_price}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Next Due Dates
                                            </td>
                                            <td>
                                                {{$course->next_due_date}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Grades
                                            </td>
                                            <td>
                                                {{$course->grades}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Branch Name
                                            </td>
                                            <td>
                                                {{$course->branch_name}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Comment
                                            </td>
                                            <td>
                                                {{$course->student_contact_no}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="text-align: left">
                                                Branch Name
                                            </td>
                                            <td>
                                                {{ $course->branch_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Subject name
                                            </td>
                                            <td>
                                                {{ $course->subject_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Online/Offline/Both
                                            </td>
                                            <td>
                                                {{ $course->on_off_line }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Website
                                            </td>
                                            <td>
                                                <a href="http://{{$course->website_link}}" target="_blank">{{$course->website_link}}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                User Id
                                            </td>
                                            <td>
                                                {{ $course->user_id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Password
                                            </td>
                                            <td>
                                                {{ $course->password }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Team Member's Name
                                            </td>
                                            <td>
                                                {{ $course->student_contact_no }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Tutor's comment
                                            </td>
                                            <td>
                                                {{ $course->mobile }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left">
                                                Student's comment
                                            </td>
                                            <td>
                                                {{ $course->comment }}
                                            </td>
                                        </tr>
                                    </table>


                                    <!-- Outro -->

                                    <p style="{{ $style['paragraph'] }}">
                                        Thank you
                                    </p>


                                    <!-- Salutation -->
                                    <p style="{{ $style['paragraph'] }}">
                                        Regards,<br>{{ config('app.name') }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td>
                        <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                    <p style="{{ $style['paragraph-sub'] }}">
                                        &copy; {{ date('Y') }}
                                        <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                        All rights reserved.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>