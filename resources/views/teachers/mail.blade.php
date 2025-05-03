<!DOCTYPE html>
<html>
<head>
    <title>{{ is_array($data) ? $data['subject'] : 'Test Email' }}</title>
</head>
<body>
<h1>Hello from {{ is_array($data) ? $data['name'] : $data }}</h1>
<p>{{ is_array($data) ? $data['message'] : 'This is a test email.' }}</p>
<p>Thank you for using our application!</p>
{{--@dd('testst')--}}
</body>
</html>
