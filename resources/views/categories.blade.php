@extends('layout.layout')

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add new
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action>
        @csrf
        <input class="form-control form-control-lg" type="text" name="category" placeholder="Category name">
      <button type="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $key => $category)
    <tr>
      <td><?= $key+1 ?></td>

      <td><?= $category->name ?></td>
      <td><a href="/categories/<?= $category->id ?>" class="btn btn-danger">Hapus</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection