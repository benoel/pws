@extends('layouts.invoice')

@section('content')
<div class="invoice-box">
    <div class="header-invoice">
        <h3>PT. PRIMANTARA WISESA SEJAHTERA</h3>
        <h4>Gedung Pasar pagi Lt. 8 Jl .ASEMKA No. 1 Jakarta Barat</h4>
        <h4>Kode Pos. 11110, Telp. (021) 6320070, Fax, (021) 6310565</h4>
        <h4><strong>TO :</strong></h4>
        <div class="note" style="font-size: 14px; padding: 3px; line-height: 15px;">
            Bpk / Ibu :<br>
            {{ $rent->user->name}} {{ $rent->user->company != null ? ' / '.$rent->user->company : ''}} <br>
            {{ $rent->user->address}} <br>
            Telp : {{ $rent->user->phone_number }}
        </div>
    </div>
    <div class="right">
        <h2>INVOICE</h2>
        <table>
            <tr>
                <td>Nomor</td>
                <td>: {{ $rent->invoice_number}}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{ $rent->created_at->format('d M Y')}}</td>
            </tr>
        </table>
    </div>

    <table cellpadding="0" cellspacing="0">
        <tr class="heading">
            <td>
                No
            </td>
            <td>
                Deskripsi
            </td>
            <td>
                Lama Sewa
            </td>
            <td>
                Harga
            </td>
            <td style="text-align: right;">
                Total
            </td>
        </tr>


        <tr class="item" style="height: 130px">
            <td>
                1
            </td>
            <td>BIAYA SEWA UNIT : {{ $rent->unit->unit_identity }} </td>
            <td>{{ $rent->rent_length}} Bulan</td>
            <td>Rp {{ number_format($rent->unit->cost, 0, '.', '.')}} </td>
            <td style="text-align: right;">{{ $rent->subtotal }}</td>
        </tr>
    </table>
    <span style="font-style: italic; font-size: 14px; border-bottom: 1px solid #333;">Terbilang : {{ Terbilang::make($rent->grand_total) }} rupiah</span>
    <table class="table-grand-total">
        <tr>
            <td>Sub Total</td>
            <td class="grand-total-detail">{{ $rent->subtotal }}</td>
        </tr>
        <tr>
            <td>Ppn 10%</td>
            <td class="grand-total-detail">Rp {{ number_format($rent->ppn, 0, '.', '.') }}</td>
        </tr>
        <tr>
            <td>Pph 10%</td>
            <td class="grand-total-detail">Rp {{ number_format($rent->pph, 0, '.', '.') }}</td>
        </tr>
        <tr>
            <td>Biaya Service</td>
            <td class="grand-total-detail">Rp {{ number_format($rent->service_charge, 0, '.', '.') }}</td>
        </tr>
        <tr style="font-weight: 600;">
            <td>Grand Total</td>
            <td class="grand-total-detail">Rp {{ number_format($rent->grand_total, 0, '.', '.') }}</td>
        </tr>
    </table>

    <div class="buttom-invoice">
        <div class="note" style="margin-top: 40px;">
            <span style="font-style: italic; border-bottom: 1px solid #333;">Keterangan:</span> <br>
            pembayaran selain tunai harap dilakukan dengan Giro / cek atas nama : <br>
            <table class="keterangan">
                <tr>
                    <td>BANK</td>
                    <td>MANDIRI CAB BATU CEPER</td>
                </tr> 
                <tr>
                    <td>A/N</td>
                    <td>PT. PRIMANTARA WISESA SEJAHTERA</td>
                </tr>
                <tr>
                    <td>REK NO.</td>
                    <td>117650 98643 765</td>
                </tr>
            </table>
        </div>

        <div class="paraf" style="top: -125px;">
            <div class="text">
                Paraf
                <br><br><br><br>
                (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
            </div>
        </div>
    </div>
</div>
@endsection

