<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        <style type="text/css">
        @font-face{
        font-family:'Open Sans';
        font-style:normal;
        font-weight:400;
        src:local('Open Sans'),
            local('OpenSans'),
            url('http://fonts.gstatic.com/s/opensans/v10/cJZKeOuBrn4kERxqtaUH3bO3LdcAZYWl9Si6vvxL-qU.woff') format('woff');
          }
</style>
    </head>
    <body>
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
      <tr>
        <td align="center" valign="top">
        <table border="0" cellpadding="2" cellspacing="0" width="600" id="emailContainer">
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
