<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CaseStudy;
use App\Models\Backend\Notice;
use App\Models\Backend\ProjectComponent;
use App\Models\Backend\ProjectResource;
use App\Models\Backend\Publication;
use App\Models\Nepali\CaseStudy as NepaliCaseStudy;
use App\Models\Nepali\Notice as NepaliNotice;
use App\Models\Nepali\ProjectComponent as NepaliProjectComponent;
use App\Models\Nepali\ProjectResource as NepaliProjectResource;
use App\Models\Nepali\Publication as NepaliPublication;
use App\Models\Tamang\CaseStudy as TamangCaseStudy;
use App\Models\Tamang\Notice as TamangNotice;
use App\Models\Tamang\ProjectComponent as TamangProjectComponent;
use App\Models\Tamang\ProjectResource as TamangProjectResource;
use App\Models\Tamang\Publication as TamangPublication;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function dashboard()
    {
        $data['title'] = get_phrase("Dashboard");
        session(['language' => 'english']);

        $data['components'] = ProjectComponent::where('status', 1)->count();
        $data['casestudies'] = CaseStudy::where('status', 1)->count();
        $data['reports'] = ProjectResource::where('type', 'Report')->count();
        $data['dataanalytics'] = ProjectResource::where('type', 'Data & Analytics')->count();
        $data['knowledgeproducts'] = ProjectResource::where('type', 'Knowledge Products')->count();
        $data['publications'] = Publication::where('status', 1)->count();
        $data['notices'] = Notice::count();

        return view('backend.dashboard', $data);
    }

    public function dashboard_ne()
    {
        session(['language' => 'nepali']);
        $title = get_phrase("Dashboard");

        $data['components'] = NepaliProjectComponent::where('status', 1)->count();
        $data['casestudies'] = NepaliCaseStudy::where('status', 1)->count();
        $data['reports'] = NepaliProjectResource::where('type', 'Report')->count();
        $data['dataanalytics'] = NepaliProjectResource::where('type', 'Data & Analytics')->count();
        $data['knowledgeproducts'] = NepaliProjectResource::where('type', 'Knowledge Products')->count();
        $data['publications'] = NepaliPublication::where('status', 1)->count();
        $data['notices'] = NepaliNotice::count();

        return view('backend.dashboard', compact('title'));
    }

    public function dashboard_tmg()
    {
        session(['language' => 'tamang']);
        $title = get_phrase("Dashboard");

        $data['components'] = TamangProjectComponent::where('status', 1)->count();
        $data['casestudies'] = TamangCaseStudy::where('status', 1)->count();
        $data['reports'] = TamangProjectResource::where('type', 'Report')->count();
        $data['dataanalytics'] = TamangProjectResource::where('type', 'Data & Analytics')->count();
        $data['knowledgeproducts'] = TamangProjectResource::where('type', 'Knowledge Products')->count();
        $data['publications'] = TamangPublication::where('status', 1)->count();
        $data['notices'] = TamangNotice::count();

        return view('backend.dashboard', compact('title'));
    }

    public function backupDatabase()
    {

        $DbName = env('DB_DATABASE');
        $get_all_table_query = "SHOW TABLES ";
        $result = DB::select($get_all_table_query);

        $except = ['migrations', 'password_resets'];

        $prep = "Tables_in_$DbName";
        foreach ($result as $res) {
            if (in_array($res->$prep, $except) === false) {
                $tables[] =  $res->$prep;
            }
        }

        $connect = DB::connection()->getPdo();

        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $table_value_array = str_replace("'", "\'", $table_value_array);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }

        date_default_timezone_set('Asia/Kathmandu');
        $file_name = 'uploads/database_backup_on_' . date('Y-m-d_H-i-s') . '-' . Str::random(5) . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }
}
