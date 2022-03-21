@extends('layouts.app')

@section('content')

<div class="container mt-4">
<div class="card shadow-dark p-4">
  <div class="row">
        <br>
        <h3 class="text-primary">Manage Tutor Payment </h3>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Post Id</th>
        <th scope="col">Post Name</th>
        <th scope="col">Post Participant</th>
        <th scope="col">Post Price</th>
        <th scope="col">Post Total Price</th>
        <th scope="col">Finish Date</th>
        <th scope="col">Tutor's Name</th>
        <th scope="col">Tutor's Email</th>
        <th scope="col">Tutor's Bank</th>
        <th scope="col">Tutor's Account Number</th>

        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
        <tr>
          <td>{{$loop->iteration}}</td>
            <td>PO{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->count_participant}}</td>
            <td>Rp.{{$post->price}}</td>
            <td>Rp.{{$post->count_participant * $post->price}}</td>
            <td>{{$post->final_date}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->user->email}}</td>
            <td>{{$post->user->bank}}</td>
            <td>{{$post->user->accountnumber}}</td>
            <td>
            <form action ="/posts/transfered"  class="form-inline" method="POST" >
                @csrf
                <input type="hidden" id="postId" name="postId" value="{{$post->id}}">
                <input type="submit" value="Selesai" class="btn btn-primary" />
            </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection
