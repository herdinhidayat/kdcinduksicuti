<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Employee([
            'nama' => $row[1],
            'nikkaryawan' => $row[2],
            'sid' => $row[3],
            'fotodokumen' => $row[4],
            'usia' => $row[5],
            'jabatan' => $row[6],
            'perusahaan' => $row[7],
            'jeniskelamin' => $row[8],
            'nohp' => $row[9],
            'induksihr' => $row[10],
            'induksishe' => $row[11]
        ]);
    }
}
