@extends('admin_layout')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Danh sách lời nhắn
    </h6>
    

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table
        class="table table-bordered"
        id="dataTable"
        width="100%"
        cellspacing="0"
      >
        <thead>
          <tr>
            <th>ID</th>
            <th style="width: 150px">Tên người nhắn</th>
            <th>Email</th>
            <th style="width: 150px">Tiêu đề</th>
            <th style="width: 400px">Lời nhắn</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_message as $key => $mess)
            <tr>
              <td>{{$mess->contact_id}}</td>
              <td>{{$mess->name}}</td>
              <td>{{$mess->email}}</td>
              <td>{{$mess->title}}</td>
              <td>{{$mess->message}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
