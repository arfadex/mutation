<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\User;
use App\Models\DetailDemande;
use App\Models\Lycee;

class DemandeController extends Controller
{
    public function create()
    {
        return view('demande.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username'
        ]);

        $user = User::where('username', $request->username)->firstOrFail();

        $demande = new Demande();
        $demande->dateDem = now();
        $demande->idProfesseur = $user->idProfesseur;
        $demande->save();

        $request->session()->put('demande_id', $demande->idDemande);

        return redirect()->route('demande.show', ['id' => $demande->idDemande]);
    }

    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        $lycees = Lycee::all();
        $detailDemandes = DetailDemande::where('idDemande', $demande->idDemande)->get();
        return view('demande.show', compact('demande', 'lycees', 'detailDemandes'));
    }

    public function addLycee(Request $request)
    {
        $demandeId = $request->session()->get('demande_id');
        $detailDemande = new DetailDemande();
        $detailDemande->idDemande = $demandeId;
        $detailDemande->idLycee = $request->lycee_id;
        $detailDemande->numOrdre = $request->num_ordre;
        $detailDemande->created_at = now()->format('Y-m-d H:i:s');
        $detailDemande->updated_at = now()->format('Y-m-d H:i:s');
        $detailDemande->save();
    
        return redirect()->back();
    }

    public function showLatestMutation(Request $request)
    {
        $user = $request->user();

        $latestDemande = Demande::where('idProfesseur', $user->idProfesseur)
            ->orderBy('dateDem', 'desc')
            ->first();

        if ($latestDemande) {
            $detailDemandes = DetailDemande::where('idDemande', $latestDemande->idDemande)
                ->join('lycees', 'detail_demandes.idLycee', '=', 'lycees.idLycee')
                ->select('lycees.nomLycee', 'lycees.ville')
                ->get();
        } else {
            $detailDemandes = collect();
        }

        return view('demande.latestMutation', compact('detailDemandes'));
    }

    public function countDemandesByUsername($username)
    {
    $user = User::where('username', $username)->firstOrFail();
    $demandesCount = Demande::where('idProfesseur', $user->idProfesseur)->count();

    return response()->json(['demandes_count' => $demandesCount]);
    }
}
