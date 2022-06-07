<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$title}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    @extends('layout')
    @section('content')
    <div class="form-center">
        <form action="{{ route('send.email') }}" method="post">
        @csrf
            @if(session()->has('message'))
                <div>
                    {{ session()->get('message') }}
                </div>
            @endif
        <div data-validate = "Name is required">
            <input type="text" name="name" placeholder="Name">
                
            @error('name')
                <span> {{ $message }} </span>
            @enderror
        </div>

        <div data-validate = "Valid email is required: ex@abc.xyz">
            <input type="text" name="email" placeholder="Email">
                
        <div data-validate = "Subject is required">
            <input type="text" name="subject" placeholder="Subject">
                
            @error('subject')
                <span> {{ $message }} </span>
            @enderror
        </div>

        <div data-validate = "Message is required">
            <textarea name="content" placeholder="Message"></textarea>
            @error('content')
                <span> {{ $message }} </span>
            @enderror
        </div>
        
        <br>
        <div>
            <button class="button-30" type="submit">Envoyer l'email</button>
        </div>
        </form>
    </div>
    @endsection


	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>
</body>
</html>