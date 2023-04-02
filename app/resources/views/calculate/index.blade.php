@extends('layouts.app')

@section('title', 'Calculations overview')

@section('content')
    <div class="">
        <div class="flex justify-center">
            <a href="/calculations/create">NEW</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col">Coeficient</th>
                <th scope="col">Yearly Tax</th>
                <th scope="col">Result</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->coeficient }}</td>
                        <td>{{ $item->yearly_tax }}</td>
                        <th scope="row">{{ $item->result }}</th>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection
