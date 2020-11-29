@extends('admin_layout')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">
      Danh sách Email đăng ký nhận tin
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
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list_email as $key => $email)
            <tr>
              <td>{{$email->email_id}}</td>
              <td>{{$email->email}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
