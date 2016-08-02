<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
  <div class="col-md-12">
<table cellpadding="20" cellspacing="20" width="600">
    <tr>
      <td><b>Pool<b></td>
      <td>{!! $PayAsYouGo["pool"] !!}</td>
    </tr>

    <tr>
      <td><b>Model ID</b></td>
      <td>{!! $PayAsYouGo["model"] !!}</td>
    </tr>

    <tr>
      <td><b>Model</b></td>
      <td>{!! $PayAsYouGo["modelLabel"] !!}</td>
    </tr>

    <tr>
      <td><b>Operating System</b></td>
      <td>{!! $PayAsYouGo["osLabel"] !!} - {!! $PayAsYouGo["osId"] !!}</td>
    </tr>
</table>
</div>
</div>
</body>
</html>
