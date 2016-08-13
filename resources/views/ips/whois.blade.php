@extends('layouts.app')
@section('content')
<div class="well">
<pre>
<?php system("whois $lookup"); ?>
</pre>
</div>
@endsection
