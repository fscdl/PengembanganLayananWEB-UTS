@extends('layout.layout')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Supplier</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Subtotal</th>



      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($transactions as $key => $transaction)
    <tr>
      <td><?= $key+1 ?></td>

      <td><?= $transaction->product->name ?></td>
      <td><?= $transaction->product->category->name ?></td>
      <td><?= $transaction->product->supplier->name ?></td>
      <td><?= $transaction->product->price ?></td>

      <td><?= $transaction->qty ?></td>

      <td><?= $transaction->subtotal ?></td>



    </tr>
    @endforeach
  </tbody>
</table>
@endsection