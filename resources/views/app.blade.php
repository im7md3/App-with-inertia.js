<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
      a,a:hover,a:visited,a:focus{text-decoration: none}
    </style>
  </head>
  <body>
    @inertia

    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('js/noty/noty.css') }}">
    <script src="{{ asset('js/noty/noty.min.js') }}"></script>
  </body>
</html>