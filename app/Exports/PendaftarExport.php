<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use App\Enums\StatusPendaftaran;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PendaftarExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithStyles,
    ShouldAutoSize
{
    protected $search;
    protected $status;
    protected $nomor = 0;

    public function __construct($search = null, $status = null)
    {
        $this->search = $search;
        $this->status = $status;
    }

    /**
     * Mengambil data pendaftar dari database.
     */
    public function collection(): Collection
    {
        $query = Pendaftaran::with('kelas.kategori')
            ->latest('id_pendaftaran');

        // Filter berdasarkan status pendaftaran
        if ($this->status !== null && $this->status !== '') {
            $query->where('status_pendaftaran', $this->status);
        }

        // Pencarian berdasarkan nama, email, atau nomor telepon
        if ($this->search !== null && $this->search !== '') {
            $search = $this->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_pendaftar', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nomor_telepon', 'like', "%{$search}%");
            });
        }

        return $query->get();
    }

    /**
     * Membuat judul kolom Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama Pendaftar',
            'Email',
            'Nomor Telepon',
            'Nama Kelas',
            'Kategori',
            'Status',
            'Tanggal Daftar',
        ];
    }

    /**
     * Mengatur data setiap baris Excel.
     */
    public function map($pendaftar): array
    {
        $this->nomor++;

        $status = $pendaftar->status_pendaftaran;

        // Mengambil nilai Enum jika status berupa Enum
        if ($status instanceof StatusPendaftaran) {
            $status = $status->value;
        }

        return [
            $this->nomor,
            $pendaftar->nama_pendaftar,
            $pendaftar->email,
            $pendaftar->nomor_telepon,
            $pendaftar->kelas->judul_kelas ?? '-',
            $pendaftar->kelas->kategori->nama_kategori ?? '-',
            ucfirst((string) $status),
            $pendaftar->created_at?->format('d-m-Y H:i') ?? '-',
        ];
    }

    /**
     * Mengatur tampilan dan format Excel.
     */
    public function styles(Worksheet $sheet): array
{
    $sheet->getRowDimension(1)->setRowHeight(25);

    return [
        1 => [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => 'FFFFFF',
                ],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => [
                    'rgb' => '2563EB',
                ],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ],
    ];
}
}
