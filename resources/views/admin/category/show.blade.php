@extends('admin.layout.admin')


@section('content')

@if(!empty($products))
    <section>
        <h3>products</h3>
        <table class="table">
            <tr>
                <th>Product</th>

            </tr>
            @forelse($products as $product)
                <tr>
                    <td>{{$product->name}}</td>

                </tr>
            @empty
                <h3>No Data</h3>
            @endforelse
        </table>

        @endif



    </section>


    @endsection
