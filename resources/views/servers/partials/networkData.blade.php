<div class="row">
<div class="col-md-12">
  <h3>{{ trans('servers.ipOverview') }}</h3>

 <table class="table table-hover">
<thead>
  <tr>
    <th>{{ trans('servers.ip') }}</th>
    <th>{{ trans('servers.ptr') }}</th>
    <th>Gateway</th>
    <th>Subnetmask</th>
    <th>Primary</th>
  </tr>
</thead>
<tbody>
  @foreach($IPoutput as $IP)
  @foreach($IP as $IPitem)

  <tr>
    <td><a href="{{url('ips/whois')}}/{!! $IPitem->ip->ip !!}">{!! $IPitem->ip->ip !!}</td>
    <td>{!! $IPitem->ip->reverseLookup !!}</td>
    <td>{!! $IPitem->ip->ipDetails->gateway !!}</td>
    <td>{!! $IPitem->ip->ipDetails->mask !!}</td>
    <td>{!! $IPitem->ip->isPrimary !!}</td>

  </tr>
@endforeach
@endforeach
</tbody>
</table>
</div>
</div>
