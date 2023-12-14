@extends('layout.adminlayout')


@section('body')


<div class="row">
    <div class="col-sm-12 mt-5">
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

                {{-- @foreach ($displayData as $item)

                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->address}}</td>
                    <td><a href="" class="btn btn-secondary">Edit</a>&nbsp;&nbsp;
                        <a href="" class="btn btn-warning">Delete</a>
                    </td>
                </tr>

                @endforeach --}}

            </tbody>
          </table>
    </div>
</div>
@endsection

