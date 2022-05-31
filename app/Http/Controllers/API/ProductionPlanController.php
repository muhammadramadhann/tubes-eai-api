<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductionPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductionPlanResource;

class ProductionPlanController extends Controller
{
    //
    public function index()
    {
        $production = ProductionPlan::latest()->paginate(5);

        return new ProductionPlanResource(true, 'List Data Production Plan', $production);
    }
    
}
