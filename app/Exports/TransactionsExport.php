<?php

namespace App\Exports;
use App\Models\Appointment;
use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class TransactionsExport implements FromCollection, WithHeadings, WithStyles,WithMapping ,ShouldAutoSize
{
    public function collection()
    {
        return Transaction::with('user.patient','appointment.doctor.user')->get();
    }
    public function map($transaction): array
    {
        return [
            $transaction->appointment?->doctor?->user?->full_name ??'',
            '',
            $transaction->user?->full_name ??'',
            '',

            $transaction->created_at->format('d-m-Y h:i A'),
            '',

            Appointment::PAYMENT_METHOD[$transaction->type] ,
            '',

            getCurrencyFormat(getCurrencyCode(),$transaction->amount),
            '',

        ];
    }
    public function headings(): array
    {
        return [
            'Doctor Name',
            '',
            'Patient Name',
            '',
            'Date',
            '',

            'Payment Method',
            '',

            'Amount',
            '',

        ];
    }


    public function styles( $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'outline' => ['borderStyle' => Border::BORDER_THIN],
                ],
                'fill' => [

                    'startColor' => ['argb' => 'FFA0A0A0'],
                    'endColor' => ['argb' => 'FFFFFFFF'],
                ],
            ],
        ];
    }
}
