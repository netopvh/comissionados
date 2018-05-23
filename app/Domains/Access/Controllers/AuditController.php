<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 23/04/2018
 * Time: 15:47
 */

namespace App\Domains\Access\Controllers;

use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;

class AuditController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('audit.index');
    }

}