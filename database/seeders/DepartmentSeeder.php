<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Pemasaran',
                'code' => 'MKT',
                'description' => 'Departemen yang bertanggung jawab atas pemasaran dan promosi produk perusahaan',
                'is_active' => true,
            ],
            [
                'name' => 'Penjualan',
                'code' => 'SLS',
                'description' => 'Departemen yang mengurus penjualan dan hubungan dengan pelanggan',
                'is_active' => true,
            ],
            [
                'name' => 'Sumber Daya Manusia',
                'code' => 'HR',
                'description' => 'Departemen yang mengelola sumber daya manusia dan administrasi karyawan',
                'is_active' => true,
            ],
            [
                'name' => 'Keuangan',
                'code' => 'FIN',
                'description' => 'Departemen yang mengurus keuangan dan akuntansi perusahaan',
                'is_active' => true,
            ],
            [
                'name' => 'Teknologi Informasi',
                'code' => 'IT',
                'description' => 'Departemen yang mengurus infrastruktur TI dan pengembangan sistem',
                'is_active' => true,
            ],
            [
                'name' => 'Produksi/Operasi',
                'code' => 'PROD',
                'description' => 'Departemen yang mengurus produksi dan operasional harian',
                'is_active' => true,
            ],
            [
                'name' => 'Riset dan Pengembangan',
                'code' => 'RND',
                'description' => 'Departemen yang melakukan riset dan pengembangan produk baru',
                'is_active' => true,
            ],
        ];

        foreach ($departments as $dept) {
            Department::firstOrCreate(
                ['code' => $dept['code']],
                $dept
            );
        }
    }
}
