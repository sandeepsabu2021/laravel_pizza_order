@extends('pizza.master')
@php
@endphp
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
<section class="container my-2">
    <h2 class="mb-2 text-center">Orders</h2>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-sm-3">Date</th>
                    <th class="col-sm-4">Items</th>
                    <th class="col-sm-3">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ord as $o)
                <tr>
                    <td>{{$o->created_at}}</td>
                    <td>
                        @php
                        $item = str_split($o->p_ids, 1);
                        @endphp
                        @foreach($item as $i)
                        @foreach($menu as $m)
                        @if($i == $m->id)
                        <p>{{$m->name}}</p>
                        @endif
                        @endforeach
                        @endforeach
                    </td>
                    <td>Rs. {{$o->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
</section>
@stop