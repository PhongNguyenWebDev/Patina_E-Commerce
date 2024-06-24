<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/clients/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
    <script src="assets/clients/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/clients/css/index.css">

    <script src="/assets/clients/js/index.js"></script>
    <title>{{ $title }}</title>
</head>

<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/625c309197.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    @if (Session::has('ssmsg'))
        <script>
            $.toast({
                heading: 'Thành công',
                text: '{{ Session::get('ssmsg') }}',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-center',
            })
        </script>
    @endif
    @if (Session::has('ermsg'))
        <script>
            $.toast({
                heading: 'Thất bại',
                text: '{{ Session::get('ermsg') }}',
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-center',
            })
        </script>
    @endif
</body>

</html>
