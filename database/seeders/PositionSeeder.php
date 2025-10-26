<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Department;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = Department::active()->get();

        foreach ($departments as $dept) {
            $this->createPositionsForDepartment($dept);
        }
    }

    private function createPositionsForDepartment(Department $department)
    {
        $positions = $this->getPositionsByDepartment($department->code);

        foreach ($positions as $position) {
            Position::firstOrCreate(
                [
                    'department_id' => $department->id,
                    'code' => $position['code']
                ],
                [
                    'name' => $position['name'],
                    'description' => $position['description'],
                    'level' => $position['level'],
                    'is_active' => true,
                ]
            );
        }
    }

    private function getPositionsByDepartment($departmentCode)
    {
        $allPositions = [
            'MKT' => [
                ['code' => 'MKT_STAFF_01', 'name' => 'Marketing Staff', 'description' => 'Junior marketing staff', 'level' => 'staff'],
                ['code' => 'MKT_STAFF_02', 'name' => 'Marketing Executive', 'description' => 'Marketing executive position', 'level' => 'staff'],
                ['code' => 'MKT_SUP_01', 'name' => 'Marketing Supervisor', 'description' => 'Supervises marketing team', 'level' => 'supervisor'],
                ['code' => 'MKT_MGR_01', 'name' => 'Marketing Manager', 'description' => 'Manages marketing department', 'level' => 'manager'],
                ['code' => 'MKT_DIR_01', 'name' => 'Marketing Director', 'description' => 'Leads marketing strategy', 'level' => 'director'],
            ],
            'SLS' => [
                ['code' => 'SLS_STAFF_01', 'name' => 'Sales Staff', 'description' => 'Junior sales staff', 'level' => 'staff'],
                ['code' => 'SLS_EXEC_01', 'name' => 'Sales Executive', 'description' => 'Sales executive position', 'level' => 'staff'],
                ['code' => 'SLS_SUP_01', 'name' => 'Sales Supervisor', 'description' => 'Supervises sales team', 'level' => 'supervisor'],
                ['code' => 'SLS_MGR_01', 'name' => 'Sales Manager', 'description' => 'Manages sales department', 'level' => 'manager'],
                ['code' => 'SLS_DIR_01', 'name' => 'Sales Director', 'description' => 'Leads sales strategy', 'level' => 'director'],
            ],
            'HR' => [
                ['code' => 'HR_STAFF_01', 'name' => 'HR Staff', 'description' => 'Junior HR staff', 'level' => 'staff'],
                ['code' => 'HR_EXEC_01', 'name' => 'HR Executive', 'description' => 'HR executive position', 'level' => 'staff'],
                ['code' => 'HR_SUP_01', 'name' => 'HR Supervisor', 'description' => 'Supervises HR team', 'level' => 'supervisor'],
                ['code' => 'HR_MGR_01', 'name' => 'HR Manager', 'description' => 'Manages HR department', 'level' => 'manager'],
                ['code' => 'HR_DIR_01', 'name' => 'HR Director', 'description' => 'Leads HR strategy', 'level' => 'director'],
            ],
            'FIN' => [
                ['code' => 'FIN_STAFF_01', 'name' => 'Finance Staff', 'description' => 'Junior finance staff', 'level' => 'staff'],
                ['code' => 'FIN_EXEC_01', 'name' => 'Finance Executive', 'description' => 'Finance executive position', 'level' => 'staff'],
                ['code' => 'FIN_SUP_01', 'name' => 'Finance Supervisor', 'description' => 'Supervises finance team', 'level' => 'supervisor'],
                ['code' => 'FIN_MGR_01', 'name' => 'Finance Manager', 'description' => 'Manages finance department', 'level' => 'manager'],
                ['code' => 'FIN_DIR_01', 'name' => 'Finance Director', 'description' => 'Leads finance strategy', 'level' => 'director'],
            ],
            'IT' => [
                ['code' => 'IT_STAFF_01', 'name' => 'IT Support', 'description' => 'IT support staff', 'level' => 'staff'],
                ['code' => 'IT_DEV_01', 'name' => 'Junior Developer', 'description' => 'Junior software developer', 'level' => 'staff'],
                ['code' => 'IT_DEV_02', 'name' => 'Senior Developer', 'description' => 'Senior software developer', 'level' => 'staff'],
                ['code' => 'IT_SUP_01', 'name' => 'IT Supervisor', 'description' => 'Supervises IT team', 'level' => 'supervisor'],
                ['code' => 'IT_MGR_01', 'name' => 'IT Manager', 'description' => 'Manages IT department', 'level' => 'manager'],
                ['code' => 'IT_DIR_01', 'name' => 'IT Director', 'description' => 'Leads IT strategy', 'level' => 'director'],
            ],
            'PROD' => [
                ['code' => 'PROD_STAFF_01', 'name' => 'Production Staff', 'description' => 'Production line staff', 'level' => 'staff'],
                ['code' => 'PROD_SUP_01', 'name' => 'Production Supervisor', 'description' => 'Supervises production team', 'level' => 'supervisor'],
                ['code' => 'PROD_MGR_01', 'name' => 'Production Manager', 'description' => 'Manages production operations', 'level' => 'manager'],
                ['code' => 'PROD_DIR_01', 'name' => 'Operations Director', 'description' => 'Leads operations strategy', 'level' => 'director'],
            ],
            'RND' => [
                ['code' => 'RND_RES_01', 'name' => 'Junior Researcher', 'description' => 'Junior research position', 'level' => 'staff'],
                ['code' => 'RND_RES_02', 'name' => 'Senior Researcher', 'description' => 'Senior research position', 'level' => 'staff'],
                ['code' => 'RND_SUP_01', 'name' => 'Research Supervisor', 'description' => 'Supervises research team', 'level' => 'supervisor'],
                ['code' => 'RND_MGR_01', 'name' => 'R&D Manager', 'description' => 'Manages R&D department', 'level' => 'manager'],
                ['code' => 'RND_DIR_01', 'name' => 'R&D Director', 'description' => 'Leads research strategy', 'level' => 'director'],
            ],
        ];

        return $allPositions[$departmentCode] ?? [];
    }
}
