@extends('layout.layout')

@section('content')

<br />
<form method="post" action>


    @csrf
    <div>
        <label for="">Name</label>
    <input disabled class="form-control" type="text" name="nama" value="<?= $product->name ?>">

    </div>

    <div>
        <label for="">Price</label>
    <input disabled class="form-control" type="text" name="price" value="<?= $product->price ?>">

    </div>

    <div>
        <label for="">Qty</label>
    <input  class="form-control" type="number" name="qty">

    </div>
    <div>
        <button type="submit">Save</button>
    </div>


</form>
@endsection