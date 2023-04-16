@extends('layouts.app')

@section('title', 'Calculations overview')

@section('content')
    <div class="content">
        <div class="flex justify-center">
            <a href="/calculations/create">NEW</a>
        </div>

        <div class="flex flex-col">
            <div class="flex justify-center">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Average</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($averageResults as $averageResult)
                            <tr>
                                <td>{{ $averageResult['type'] }}</td>
                                <td>{{ $averageResult['result'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Price</th>
                <th scope="col">Type</th>
                <th scope="col">Coeficient</th>
                <th scope="col">Result</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->coeficient }}%</td>
                        <th scope="row">{{ $item->result }}</th>
                    </tr>
                @endforeach
            </tbody>
          </table>
@endsection

@push('css')
    <style>
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }
        .table th, .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }
        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }
        .table .table {
            background-color: #fff;
        }
    </style>
@endpush

