@extends('layouts.app')
@section('title', '收貨地址列表')

@section('content')
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <div class="card panel-default">
        <div class="card-header">
          收貨地址列表
          <a href="{{ route('user_addresses.create') }}" class="float-right">新增收貨地址</a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>收貨人</th>
                <th>地址</th>
                <th>郵遞區號</th>
                <th>電話</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
            @foreach($addresses as $address)
              <tr>
                <td>{{ $address->contact_name }}</td>
                <td>{{ $address->full_address }}</td>
                <td>{{ $address->zip }}</td>
                <td>{{ $address->contact_phone }}</td>
                <td>
                  <a href="{{ route('user_addresses.edit', ['user_address' => $address->id]) }}" class="btn btn-primary">修改</a>
                  <form action="{{ route('user_addresses.destory', ['user_address' => $address->id]) }}" method="post" style="display: inline-block">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger btn-del-address" type="button" data-id="{{ $address->id }}">刪除</button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scriptAfterJs')
<script>
$(document).ready(function() {
  $('.btn-del-address').click(function() {
    var id = $(this).data('id');

    swal({
      title: "確定要刪除該地址？",
      icon: "warning",
      buttons: ['取消', '確定'],
      dangerMode: true,
    })
    .then(function(willDelete) {
      if (!willDelete) {
        return;
      }

      axios.delete('/user_addresses/' + id)
        .then(function() {
          location.reload();
        })
    });
  });
});
</script>
@endsection