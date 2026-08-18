<?php

namespace App\Http\Traits;

use App\Models\UrunGrubu;
use App\Models\UrunKart;
use App\Models\AnaGrup;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

trait ProductGroupTrait
{
    public function GetAllProductGroups(): Collection
    {
        /* $ProductGroups = UrunGrubu::where('Dil_id', session()->get('locale_id'))
        ->orderBy('Sirano')->get();
*/
        $ProductGroups = UrunGrubu::orderBy('Sirano')->get();
        return $ProductGroups;
        // return session()->get('locale');
    }

    public function GetProductGroup($ProductGroupId)
    {
        $ProductGroup = UrunGrubu::find($ProductGroupId);
        return $ProductGroup;
    }
    public function GetAllMainGroup(): Collection
    {
        $ProductGroups = AnaGrup::orderBy('Sirano')->get();
        return $ProductGroups;
    }
    public function GetSubMainGroups($AnaGrup): Collection
    {
        $ProductGroups = UrunGrubu::where("AnaGrup", $AnaGrup)->orderBy('Sirano')->get();
        return $ProductGroups;
    }
}
