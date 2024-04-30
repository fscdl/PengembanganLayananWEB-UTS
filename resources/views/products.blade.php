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
        
        <div>
          <label for="">Name</label>
          <input class="form-control form-control-lg" type="text" name="name" placeholder="Name">
        </div>
        <div>
          <label for="">Category</label>
          <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value="<?= $category->id ?>"><?= $category->name ?></option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="">Supplier</label>
          <select class="form-control" name="supplier_id">
            @foreach($suppliers as $supplier)
            <option value="<?= $supplier->id ?>"><?= $supplier->name ?></option>
            @endforeach
          </select>
        </div>

        <div>
          <label for="">Price</label>
          <input class="form-control form-control-lg" type="number" name="price" placeholder="Price">
        </div>

        <div>
          <label for="">Stocks</label>
          <input class="form-control form-control-lg" type="number" value="100" name="stocks" placeholder="Stocks">
        </div>
        <br />

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
      <th scope="col">Category</th>
      <th scope="col">Supplier</th>
      <th scope="col">Harga</th>
      <th scope="col"></th>


      
    </tr>
  </thead>
  <tbody>
    @foreach($products as $key => $product)
    <tr>
      <td><?= $key+1 ?></td>

      <td><?= $product->name ?></td>
      <td><?= $product->category->name ?></td>
      <td><?= $product->supplier->name ?></td>
      <td>Rp. <?= $product->price ?></td>
      <td><a href="/products/<?= $product->id ?>">Hapus </a> / <a href="/products/sells/<?= $product->id ?>">Jual</a></td>
      
    </tr>
    @endforeach
  </tbody>
</table>
@endsection