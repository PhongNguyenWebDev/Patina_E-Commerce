<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/clients/js/index.js') }}"></script>
    <title>{{ $title }}</title>
</head>


<body>
    <div id="loading" class="loading-overlay">
        <div class="spinner"></div>
    </div>
    @include('client.blocks.header')
    @yield('content')
    @include('client.blocks.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/625c309197.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
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
    <script>
        function showLoading() {
            document.getElementById('loading').style.display = 'flex';
        }

        function hideLoading() {
            document.getElementById('loading').style.display = 'none';
        }

        function fetchData() {
            showLoading(); // Hiển thị loading khi bắt đầu gửi yêu cầu

            // Thực hiện yêu cầu AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'your-api-endpoint', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Xử lý dữ liệu từ server
                    console.log(xhr.responseText);
                }
                hideLoading(); // Ẩn loading khi nhận được phản hồi
            };
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchData(); // Gửi yêu cầu AJAX khi trang đã tải xong
        });
    </script>

</body>

</html>
