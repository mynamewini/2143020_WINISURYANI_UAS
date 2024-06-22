@extends('layouts.dashboard')

@section('content')
    <div class="page-heading">
        <h3>
            {{ $title }}
        </h3>
    </div>
    <div class="page-content">
        <section class="row">
            {{-- Table Pendapatan --}}
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Order</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($incomes as $income)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('operator.orders.show', $income->order_id) }}">
                                                    {{ $income->order_id }}
                                                </a>
                                            <td>
                                                {{ $income->created_at->format('d F Y') }}
                                            </td>
                                            <td>
                                                {{ $income->description }}
                                            </td>
                                            <td>
                                                Rp. {{ number_format($income->amount, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- Total Pendapatan --}}
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total Pendapatan</th>
                                        <th>
                                            Rp. {{ number_format($totalIncome, 0, ',', '.') }}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
